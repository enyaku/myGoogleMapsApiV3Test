var map;
var directions;

function initialize() {
  if (GBrowserIsCompatible()) {
    map = new GMap2(document.getElementById("map_canvas"));
    map.setCenter(new GLatLng(35.16809,136.911621), 13);

    directions = new GDirections(map, document.getElementById("route"));
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
  var od = directions.getDistance();
  var ot = directions.getDuration();

  document.getElementById("iddistance").innerHTML = od.meters + "m, " + od.html;
  document.getElementById("idtime").innerHTML = ot.seconds + "秒, " + ot.html;
}