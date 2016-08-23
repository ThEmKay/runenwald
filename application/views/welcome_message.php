<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>

  <!-- Begin Cookie Consent plugin by Silktide - http://silktide.com/cookieconsent -->
  <script type="text/javascript">
  	  window.cookieconsent_options = {"message":"Diese Webseite verwendet Cookies. Wenn Du in den Einstellungen Deines Webbrowsers Cookies zugelassen hast und diese Webseite weiterhin benutzt, bist Du mit der Verwendung von Cookies einverstanden.","dismiss":"Okay!","learnMore":"Weitere Informationen","link":null,"theme":"dark-top"};
  </script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/cookieconsent.min.js"></script>
  <!-- End Cookie Consent plugin -->  
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Welcome to CodeIgniter</title>
</head>
<body style="padding-bottom:50px">

<div class="container" style="width:970px !important">
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
  		var js, fjs = d.getElementsByTagName(s)[0];
  		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/de_DE/sdk.js#xfbml=1&version=v2.5";
		fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));</script> 
  <div class="row" style="text-align:right;padding:5px 0px 5px 0px">
    <div class="fb-like" data-href="https://www.facebook.com/runenwaldorga/?fref=ts" data-width="150" data-layout="button_count" 
	 data-action="like" data-show-faces="true" data-share="true"></div>
    <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#impressum">
      <span class="glyphicon glyphicon-info-sign"></span>&nbsp;Impressum
    </button>
    <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#kontakt">
      <span class="glyphicon glyphicon-pencil"></span>&nbsp;Kontakt
    </button>
  </div>
  <div class="row" style="margin-bottom:5px;height:280px;repeat:no-repeat;background-size:100% 100%;background-image:url(./bilder/RWLogo.jpg);-webkit-box-shadow: 10px 10px 20px -5px rgba(0,0,0,0.31);
                          -moz-box-shadow: 10px 10px 20px -5px rgba(0,0,0,0.31);
                          box-shadow: 10px 10px 20px -5px rgba(0,0,0,0.31);;">
    &nbsp;
  </div>
  <div class="row">
    {content}
  </div>

<!-- Impressum -->
<div class="modal fade" id="impressum" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Impressum</h4>
      </div>
      <div class="modal-body">
        <h1>Markus Weller</h1> <h2>Anschrift</h2> <p> Markus Weller<br> Asterweg 54<br> 35390 Gießen<br> <b>Web</b> runenwald.de<br> <b>E-Mail</b> markus93.weller@googlemail.com<br> </p> <p> </p> <h2>Datenschutzerklärung Allgemein</h2> <p> Die Erhebung und Verwendung personenbezogener Daten der Nutzer unserer Internetseiten findet ausschließlich unter Beachtung der datenschutzrechtlichen Gesetze der Bundesrepublik Deutschland statt. Im Folgenden teilen wir Ihnen mit, auf welche Art, in welchem Umfang und zu welchem Zweck wir Ihre personenbezogenen Daten erheben und nutzen. Die Informationen zum Datenschutz können Sie auf dieser Website ständig abrufen.<br><br>Übermittlung und Speicherung von Daten aus technischen Gründen und zu Zwecken von Statistik und Marktforschung.<br><br>Wenn Sie auf unsere Website zugreifen, übermittelt Ihr Internet-Browser aus technischen Gründen automatisch bestimmte Daten an unseren Server. Dies sind zum Beispiel Datum und Uhrzeit des Seitenaufrufes, die URL der Website, die Sie zuvor besucht haben, die von unserer Website abgerufenen Dateien, gesendete Datenmengen, Typ und Version Ihres Webbrowsers, Ihr Betriebssystem und Ihre IP-Adresse. Wie speichern diese Daten getrennt von anderen Daten, die Sie ggf. bei Nutzung unseres Internetangebotes auf unserer Website eingeben. Diese Daten können wir also nicht Ihrer Person zuordnen; sie werden lediglich statistisch ausgewertet und danach gelöscht.<br><br>Erhebung und Nutzung von Bestandsdaten <br><br>Die Nutzung unserer Webseite ist in den meisten Fällen ohne eine Angabe personenbezogener Daten (z.B. Name, Adresse, Emailadresse, Telefonnummer) möglich. Kommt zwischen Ihnen und uns ein Vertrag zustande oder soll ein solcher inhaltlich abgeändert werden, erheben und verwenden wir personenbezogene Daten von Ihnen. Die Erhebung und Nutzung Ihrer Daten erfolgt nur in dem für diese Zwecke erforderlichen Umfang. Von uns erhobene personenbezogene Daten geben wir ohne Ihre ausdrückliche Zustimmung nicht an Dritte weiter.<br><br>Eine Weitergabe von Bestandsdaten an Behörden erfolgt nur, soweit wir dazu im Einzelfall auf Basis bestehender Gesetze, etwa für Zwecke der Strafverfolgung, Gefahrenabwehr oder zum Schutz von Urheberrechten, verpflichtet sind.<br><br>Erhebung und Nutzung von Nutzungsdaten<br><br>Um die Nutzung unseres Internetangebotes zu ermöglichen, die Nutzungsmöglichkeiten zu verbessern oder Dienstleistungen abzurechnen, erheben und nutzen wir im erforderlichen Umfang personenbezogene Daten der Besucher unserer Internetseiten. Diese umfassen zum Beispiel Identifikationsmerkmale des Nutzers sowie Anfang, Ende und Umfang des Besuchs auf unseren Webseiten.<br><br>Wir dürfen für Zwecke des Marketing, der Marktforschung und der nutzergerechten Gestaltung unseres Internetangebotes Nutzungsprofile erstellen, soweit wir dafür Pseudonyme verwenden. Einer solchen Verwendung Ihrer Nutzerdaten dürfen Sie widersprechen. Wir dürfen derartige Nutzerprofile nicht mit Daten über den Träger des Pseudonyms in Verbindung bringen.<br><br>Eine Weitergabe von Nutzungsdaten an Behörden erfolgt nur, soweit wir dazu im Einzelfall auf Basis bestehender Gesetze, etwa für Zwecke der Strafverfolgung, Gefahrenabwehr oder zum Schutz von Urheberrechten, verpflichtet sind.<br><br>Verwendung von Cookies<br><br>Um die Anwendungsmöglichkeiten unseres Internetangebotes zu verbessern und für die Nutzer komfortabler zu machen, verwenden wir sogenannte „Cookies“, kleine Textdateien, die auf Ihrem Computer gespeichert werden und die Informationen über Ihre Nutzung unserer Website und des Internet enthalten. Sie können das Abspeichern von Cookies auf Ihrem Computer durch entsprechende Einstellungen in Ihrem Browser unterbinden. Es ist jedoch möglich, dass Sie dadurch unser Internetangebot nicht in komplettem Umfang nutzen können.<br><br>Auskunftsrecht des Nutzers<br><br>Als Nutzer unseres Internetangebotes dürfen Sie von uns Auskunft über die zu Ihrer Person oder Ihrem Pseudonym bei uns gespeicherten Daten fordern. Eine solche Auskunft kann auf Wunsch auch auf elektronischem Weg erfolgen.<br><br>Datenzugriff durch Unbefugte<br><br>Eine Datenübermittlung über das Internet beinhaltet immer das Risiko, dass unbefugte Dritte Zugriff auf Ihre Daten nehmen. Ein vollkommener Schutz Ihrer Kommunikation etwa per E-Mail kann nicht gewährleistet werden.<br><br>Zusendung unverlangter Werbung an uns<br><br>Wir widersprechen hiermit ausdrücklich jeglicher Nutzung unserer im Rahmen der Impressumpflicht veröffentlichten Kontaktdaten durch Dritte zum Zwecke der Zusendung unverlangter Werbe- und Informationsmaterialien. Wir behalten uns rechtliche Schritte gegen die Absender unverlangt zugesandter Spam-Mails oder anderer Werbesendungen vor. <br> </p> <h2>Disclaimer</h2> <p> Haftung für Inhalte unserer Websites<br><br>Nach § 7 Abs.1 Telemediengesetz (TMG) sind wir als Diensteanbieter für eigene Inhalte auf diesen Internetseiten im Rahmen der allgemeinen Gesetze verantwortlich. Gemäß den §§ 8 bis 10 TMG haben wir als Diensteanbieter allerdings nicht die Pflicht, übermittelte oder gespeicherte fremde Informationen zu überwachen oder nach Hinweisen auf rechtswidrige Tätigkeiten zu suchen. Gesetzliche Verpflichtungen zur Entfernung oder Sperrung von Inhalten oder Informationen oder zur Sperrung von Nutzungsmöglichkeiten unseres Internetauftritts sind davon ausgenommen. Eine Haftung kann jedoch erst von dem Zeitpunkt an eintreten, zu dem wir von einer konkreten Rechtsverletzung Kenntnis erhalten haben. Sobald wir von einer Rechtsverletzung im Rahmen unseres Internetangebotes erfahren, werden wir die entsprechenden Inhalte umgehend entfernen.&nbsp; &nbsp;<br><br>Haftung für Links<br><br>Unser Internetangebot enthält Links zu externen Websites Dritter. Wir weisen ausdrücklich darauf hin, dass wir keinerlei Einfluss auf die Inhalte dieser Websites haben. Für die Inhalte dieser fremden Internetseiten können wir dementsprechend keinerlei Haftung oder Gewähr übernehmen. Verantwortlich ist deren jeweiliger Anbieter bzw. Betreiber. Wir haben diese Seiten zum Zeitpunkt der Verlinkung auf mögliche Gesetzesverstöße geprüft und keine rechtswidrigen Inhalte gefunden. Eine ständige Kontrolle verlinkter Seiten ist jedoch nicht möglich. Eine Überprüfung kann allenfalls bei Vorliegen konkreter Hinweise auf eine Rechtsverletzung stattfinden. Erfahren wir von einer Rechtsverletzung auf den verlinkten Seiten, werden wir den entsprechenden Link umgehend von unserer Website entfernen. <br><br>Urheberrecht<br><br>Für die auf unseren Internetseiten veröffentlichten Inhalte und Werke gilt das deutsche Urheberrecht. Jede Vervielfältigung, Bearbeitung, Verbreitung und Verwertung erfordert die schriftliche Zustimmung des jeweiligen Autors oder Erstellers. Downloads und Kopien dieser Seiten sind ausschließlich für den privaten, nichtkommerziellen Gebrauch zulässig. &nbsp;<br><br>Unsere Seiten können Inhalte aufweisen, die nicht vom Betreiber selbst erstellt wurden. Bei diesen Inhalten wurden die Urheberrechte Dritter beachtet. Inhalte, an denen Dritte das Urheberrecht innehaben, sind entsprechend gekennzeichnet. Stellen Sie auf unseren Internetseiten trotzdem einen Urheberrechtsverstoß fest, bitten wir, uns dies mitzuteilen. Wir werden den entsprechenden Inhalt dann umgehend von unseren Webseiten entfernen. </p> <p> Dieses Impressum wurde erstellt mit dem Impressum-Generator vom <a href="//www.anwalt-suchservice.de" target="_blank">Anwalt-Suchservice</a>. </p> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Schlie&szlig;en</button>
      </div>
    </div>
  </div>
</div>

<!-- Kontakt -->
<div class="modal fade" id="kontakt" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Kontakt</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Schlie&szlig;en</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>
