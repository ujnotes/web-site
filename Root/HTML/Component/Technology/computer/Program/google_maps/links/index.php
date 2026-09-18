<div id='message'>
	<p>
		Return "https://maps.google.com?q=Point@"+latLng.lat+","+latLng.lng;.
	</p>
	<p>
		Return "https://www.google.com/maps/place/"+latLngToDms(latLng)+"/@"+latLng.lat+","+latLng.lng+",12z";.
	</p>
	<p>
		Return "http://maps.google.com/maps?&amp;z=10&amp;q="+latLng.lat+"+"+latLng.lng+"&amp;ll="+latLng.lat+"+"+latLng.lng;.
	</p>
	<p>
		Return "https://maps.google.com/maps?daddr="+latLng.lat+','+latLng.lng+"&amp;amp;ll=";.
	</p>
	<p>
		Return "http://maps.google.com/maps?q=loc:"+latLng.lat+','+latLng.lng.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
