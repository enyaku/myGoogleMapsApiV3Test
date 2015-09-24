
function initialize() {
  if (GBrowserIsCompatible()) {
	var map = new GMap2(document.getElementById("map"));

    map.setCenter(new GLatLng(35.6069973,139.714774), 13);

    
  }
}
