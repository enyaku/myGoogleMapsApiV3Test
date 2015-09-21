var map;
var directions;

function initialize() {
  if (GBrowserIsCompatible()) {
    map = new GMap2(document.getElementById("map_canvas"));
    map.setCenter(new GLatLng(34.696602,135.519447), 13);

    directions = new GDirections(map, null);
    GEvent.addListener(directions, "load", onGDirectionsLoad);
  }
}

function dispRoute() {
  var from = document.getElementById("from").value;
  var step = document.getElementById("step").value;
  var to = document.getElementById("to").value;

  directions.clear();

  var pointArray = [from,step,to];
  directions.loadFromWaypoints(pointArray, {locale: "ja_JP"});
}

function onGDirectionsLoad(){ 
  var html = "";

  var routeNum = directions.getNumRoutes();
  for (var i = 0 ; i < routeNum ; i++){
    var route = directions.getRoute(i);
    var startObj = route.getStartGeocode();
    var endObj = route.getEndGeocode();

    html += "Route[" + i + "] " + startObj.address + " >> " + endObj.address + "<br />";
  }

  document.getElementById("route").innerHTML = html;
}