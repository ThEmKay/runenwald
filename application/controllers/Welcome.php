<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


  private function getData(){

        // Datenbankabfrage der zuletzt angelegten Veranstaltung, die gleichzeitig auch auf Aktiv gesetzt ist (flag_aktiv = true)
        $q = $this->db->query('SELECT
                                  v.id,
                                  v.titel,
                                  v.location_name,
                                  v.location_lat,
                                  v.con_zahler,
                                  v.location_lon,
								  v.teilnehmer_sc + v.teilnehmer_nsc AS max_teilnehmer,
                                  v.teilnehmer_sc,
                                  v.teilnehmer_nsc,
                                  (SELECT count(name) FROM teilnehmer WHERE
                                                                        veranstaltung_id = v.id
                                                                      AND
                                                                        sc = false) AS angemeldet_nsc,
                                  (SELECT count(name) FROM teilnehmer WHERE
                                                                        veranstaltung_id = v.id
                                                                      AND
                                                                        sc = true) AS angemeldet_sc,
                                  v.preis,
                                  v.start_datum,
                                  v.flag_anmeldung_moeglich
                               FROM
                                  veranstaltung v
                               WHERE
                                  v.flag_aktiv = TRUE
                               ORDER BY v.id DESC
                               LIMIT 1');

	$r = $q->row_array();
	if(!empty($r)){

		$r['angemeldete_teilnehmer'] = $r['angemeldet_sc']+$r['angemeldet_nsc'];
		$q = $this->db->query("SELECT * FROM preis WHERE veranstaltung_id = ".$r['id']."");
		$r['preis'] = $q->result_array();
		if(!empty($r['preis'])){
			foreach($r['preis'] as &$preisstaffel){

				$datum = explode('-', $preisstaffel['datum']);
				$preisstaffel['datum'] = $datum[2].".".$datum[1].".".$datum[0];
			}


		}

	}

	return $r;

  }

	public function index(){
        // Laden der ben�tigten Hilfsmittel des PHP Frameworks
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->library('parser');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('email');
							   


        // Aussehen der Fehlermeldungen festlegen
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" style="padding:10px;margin-bottom:5px"><span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;', '</div>');

        // Daten aus der DB ranholen
        $r = $this->getData();

        $parse = "";
        // Wenn eine aktive Veranstaltung in der DB gefunden wurde, kommt diese zur Anzeige
        if(!empty($r)){

            $parseForm = "";
            // NUR WENN gerade eine Anmeldung durchgef�hrt wurde sonst else (Prevent Doublesubmit).
            //  Nach dem Neu-Laden der Seite geht's definitiv ins else!
            if($this->session->userdata('gerade_angemeldet')){
                $parseForm = $this->doSuccessMsg($r);
            }else{
                // Nur wenn die Anmeldung freigeschaltet ist, gehts hier weiter
                if($r['flag_anmeldung_moeglich']){
                    // Sollte die Veranstaltung ausgebucht sein, wird das entsprechend angezeigt
                    if($r['teilnehmer_sc'] > 0 && $r['angemeldete_teilnehmer'] >= $r['max_teilnehmer']){
                        $parseForm = '<div class="alert alert-danger" role="alert" style="margin-top:20px">
                                        <b>Ausgebucht!</b>
                                      </div>';
                    // Falls nicht, kommt das normale Formular zur Anzeige
                    }else{

                        $this->load->helper('captcha');

                        $c = create_captcha(array('word'	=> 'Random word',
                                                  'img_path'	=> './captcha/',
                                                  'img_url'	=> base_url('captcha'),
                                                  'img_width'	=> '150',
                                                  'img_height' => 30,
                                                  'expiration' => 7200));

                        // Festlegen der Regeln zur Formularvalidierung
                        $this->form_validation->set_rules('name', 'Vor- und Nachname', 'trim|min_length[5]|required');
                        $this->form_validation->set_rules('email', 'E-Mail Adresse', 'trim|valid_email|required');
                        $this->form_validation->set_rules('email2', 'E-Mail Adresse wiederholen', 'trim|required|matches[email]');
                        $this->form_validation->set_rules('strasse', 'Sra&szlig;e', 'trim|required');
                        $this->form_validation->set_rules('hausnummer', 'Hausnummer', 'trim|required');
                        $this->form_validation->set_rules('plz', 'Postleitzahl', 'trim|required|exact_length[5]');
                        $this->form_validation->set_rules('ort', 'Ort', 'trim|required');
                        $this->form_validation->set_rules('geburtsdatum', 'Geburtsdatum', 'trim|required|valid_date|exact_length[10]');
                        $this->form_validation->set_rules('chkNSC', 'Art des Charakters', 'trim|required|integer');
                        $this->form_validation->set_rules('sonstiges', 'Sonstiges', 'trim');
                        $this->form_validation->set_rules('agb', 'AGBs gelesen und akzeptiert', 'required');
								$this->form_validation->set_rules('g-recaptcha-response', 'Captcha', 'captcha');

								$sErrorMsg = '';
								if($this->input->post('submit') && !$this->input->post('g-recaptcha-response')){
									$sErrorMsg.= '<div class="alert alert-danger" style="padding:10px;margin-bottom:5px">
													  		<span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;
													  		Bitte beweise, dass Du <b>kein</b> Bot bist!
													  </div>';
								}

                        if($this->form_validation->run()){
                            if(intval($this->input->post('chkNSC')) == 1){
                                $isSC = 1;
                            }else{
                                $isSC = 0;
                            }
                            if($this->db->insert('teilnehmer', array('veranstaltung_id' => intval($r['id']),
                                                                     'email' => $this->input->post('email'),
								     'strasse' => $this->input->post('strasse'),
								     'hausnummer' => $this->input->post('hausnummer'),
								     'plz' => $this->input->post('plz'),
								     'ort' => $this->input->post('ort'),
								     'sonstiges' => $this->input->post('sonstiges'),
								     'geburtsdatum' => $this->input->post('geburtsdatum'),
                             'sc' => $isSC,
                             'name' => $this->input->post('name')))){
                               // Ist das Speichen in der DB erfolgreich, wird vor�bergehend in die Session geschrieben, dass gerade
                               // eine Anmeldung stattgefunden hat. Danach erfolgt eine Weiterleitung um den Formular-Cache des Browsers
                               // zu leeren (wegen Mehrfachsubmit via Refresh)
                               $this->session->set_userdata('gerade_angemeldet', true);


								$isSC == 1 ? $spielertyp = 'SC' : $spielertyp = 'NSC';
								$isSC == 1 ? $spielerpreis = 45 : $spielerpreis = 30;

								$config['mailtype'] = 'html';
								$this->email->initialize($config);							   
							   $this->email->from('noreply@runenwald.de', 'Runenwald Orga');
							   $this->email->to($this->input->post('email'));
							   $this->email->subject('Anmeldungsbestätigung');
							   $this->email->message('<h3>Hallo '.$this->input->post('name').',</h3>
															  <p>hiermit bestätigen wir Deine Anmeldung zu unserer Veranstaltung <b>'. $r['titel'].'</b> am
															  		<b>'.date('d.m.Y', mysql_to_unix($r['start_datum'])).'</b> als <i>'.$spielertyp.'</i> und bitten Dich, den '.$spielerpreis.'&euro; schnellstmöglich auf folgendes Konto zu überweisen:
															  </p>
															  <p><b>ACHTUNG: Die Höhe des Staffelpreises richtet sich nach dem Datum des Geldeingangs. Eventuell musst du etwas nachbezahlen!</b></p>
															  <p>Inhaber: Karina Bley</p>
															  <p>Kontonummer: 1050069010</p>
															  <p>BLZ: 12030000</p>
															  <p>Deutsche Kreditbank AG</p>
 															  <p>IBAN: DE79 120300001050069010</p>
															  <p>BIC: BYLADEM1001</p>
															  <br />
															  <p>Du wirst noch einmal von uns informiert, sobald dein Geld eingetroffen ist.</p>
															  <br />
															  <br />
															  <br />
															  <p>Viele Grüße</p>
															  <br />
															  <p>Die Runenwald-Orga</p>');
							  //$this->email->send();





                               redirect(site_url(), 'location');
                            }
                        }

                        $parseForm = $this->parser->parse('view_form_anmeldung', array('errorMsg' => $sErrorMsg), true);
                    }
                }else{
                  // Ist die Anmeldung NICHT freigeschaltet, kommt diese Meldung!
                  $parseForm = '<div style="margin-top:20px" class="alert alert-info" role="alert">Die Anmeldung f&uuml;r diese Veranstaltung ist <b>noch nicht</b> m&ouml;glich. Bitte schaue zu einem sp&auml;teren Zeitpunkt nochmal vorbei.</div>';
                }
            }

            $sc = 0;
            $nsc = 0;
            // Nur wenn mindestens eine Person angemeldet ist, weil sonst Division durch 0
            
            if(intval($r['angemeldet_sc']) != 0){
              $sc = intval($r['angemeldet_sc'])/intval($r['teilnehmer_sc'])*100;
            }

            if(intval($r['angemeldet_nsc']) >= 0){
                $nsc = intval($r['angemeldet_nsc'])/intval($r['teilnehmer_nsc'])*100;
            }

            // Layout parsen
            $parse = $this->parser->parse('view_veranstaltung', array('titel' => $r['titel'],
                                                                      'location_name' => $r['location_name'],
                                                                      'lat' => $r['location_lat'],
                                                                      'lon' => $r['location_lon'],
                                                                      'angemeldet_sc' => $r['angemeldet_sc'],
                                                                      'angemeldet_nsc' => $r['angemeldet_nsc'],
                                                                      'teilnehmer_sc' => $r['teilnehmer_sc'],
                                                                      'teilnehmer_nsc' => $r['teilnehmer_nsc'],
                                                                      'con_zahler' => $r['con_zahler'],
                                                                      'preis' => $r['preis'] ,
                                                                      //'anmeldungen_prozent' => intval($r['angemeldete_teilnehmer'])/intval($r['max_teilnehmer'])*100,
                                                                      'anteil_sc' => $sc,
                                                                      'anteil_nsc' => $nsc,
                                                                      'start_datum' => date('d.m.Y H:i', mysql_to_unix($r['start_datum'])),
                                                                      'anmeldung' => $parseForm), true);

        }else{
            // Sollte in Zukunft keine Veranstaltung anliegen, kommt eine entsprechende Meldung, sonst nix :)
            $parse = $this->parser->parse('view_keine_veranstaltung', array(), true);
        }

        $this->parser->parse('welcome_message', array('content' => $parse));
    }


    private function doSuccessMsg(&$r){
        $this->session->unset_userdata('gerade_angemeldet');
        return '<div class="alert alert-success" role="alert" style="margin-top:20px">
            <p>
              <b>Erfolg!</b> Du bist jetzt zur Veranstaltung <i>\''.$r['titel'].'\'</i> angemeldet. Danke f&uuml;r dein Vertrauen und viel Spa&szlig;!
            </p>
				<p>Bitte &uuml;berweise den aktuellen Staffelpreis auf das folgende Konto: <b>ACHTUNG, die Höhe des Staffelpreises richtet sich nach dem Datum des Geldeingangs. Eventuell musst du etwas nachbezahlen!</b></p>
			   <p>Inhaber: Karina Bley</p>
				<p>Kontonummer: 1050069010</p>
				<p>BLZ: 12030000</p>
				<p>Deutsche Kreditbank AG</p>
 				<p>IBAN: DE79 120300001050069010</p>
				<p>BIC: BYLADEM1001</p>
          </div>
          <a href="'.site_url().'"><button class="btn-link">Noch jemanden anmelden</button></a>';
    }



}

function captcha($s){

   $c = curl_init();

   curl_setopt($c, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
   curl_setopt($c, CURLOPT_POSTFIELDS, 'secret=6LcSKRgTAAAAADK_RTF7wUBuGtEuMikFbq1pmlh7&response='.$s.'&remoteip='.$_SERVER['REMOTE_ADDR']);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, true);

	$response = curl_exec($c);

   $oreturn = json_decode($response);

	return $oreturn->success;

}

function valid_date($s){
    $a = explode('.', $s);
    return checkdate($a[1], $a[0], $a[2]);
}
