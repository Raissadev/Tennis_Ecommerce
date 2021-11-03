var lat = document.getElementById("lat");
var long = document.getElementById("long");

function getLocation()
  {
if (navigator.geolocation)
{
navigator.geolocation.getCurrentPosition(showPosition);
}
else{alert("O seu navegador não suporta Geolocalização.");}
}
function showPosition(position)
{
lat.value=position.coords.latitude;
long.value=position.coords.longitude; 
}


