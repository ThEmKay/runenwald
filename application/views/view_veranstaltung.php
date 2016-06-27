 <div class="col-md-6">
   <h3>
    {titel}
   </h3>
   <p>
      <b>{angemeldet_sc}</b> von max. <b>{teilnehmer_sc}</b> Spieler-Charakteren angemeldet.
   </p>
    <div class="progress" style="background-color:#D3D3D3">
      <div class="progress-bar progress-bar-warning" role="progressbar" style="width:{anteil_sc}%;">
        &nbsp;
      </div>
    </div>
   <p>
       <b>{angemeldet_nsc}</b> von max. <b>{teilnehmer_nsc}</b> Nicht-Spieler-Charakteren angemeldet.
   </p>
    <div class="progress" style="background-color:#D3D3D3">
      <div class="progress-bar progress-bar-warning" role="progressbar" style="width:{anteil_nsc}%;">
        &nbsp;
      </div>
    </div>
   <ul style="padding:0;margin:0;list-style-type:none;font-size:1.5em">
      <li style="margin-bottom:5px">
	<table style="width:100%":>
	  <tr>
	    <th>Bis</th>
	    <th>Preis SC</th>
   	    <th>Preis NSC</th>
	  </tr>
	  {preis}
	  <tr>
	    <td>{datum}</td>
  	    <td>{preis_sc} &euro;</td>
  	    <td>{preis_nsc} &euro;</td>
	  </tr>
      {/preis}
	</table>
      </li>
      <li style="margin-bottom:5px">
		Con-Zahler Zuschlag: <b>{con_zahler}&euro;</b>      
      </li>
      <li style="margin-bottom:5px">
        <span class="glyphicon glyphicon-calendar"></span> {start_datum}
      </li>
   </ul>
    <div id="map" style="height:350px;margin-top:15px"></div>
    <script>
        var map = L.map('map').setView([{lat}, {lon}], 16);
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        L.marker([{lat}, {lon}]).addTo(map).bindPopup('{location_name}').openPopup();
    </script>
 </div>
 <div class="col-md-6" style="border-left: 1px solid #999;min-height:650px">
    {anmeldung}
 </div>
