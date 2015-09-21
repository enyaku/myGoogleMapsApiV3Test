
var map;
var directions;

function initialize() {
  if (GBrowserIsCompatible()) {
    map = new GMap2(document.getElementById("map_canvas"));
    map.setCenter(new GLatLng(35.670756, 139.823215), 13);

    directions = new GDirections(map, document.getElementById("route"));

    GEvent.addListener(directions, "load", onGDirectionsLoad);
    GEvent.addListener(directions, "addoverlay", onGDirectionsAddOverlay);
    GEvent.addListener(directions, "error", onGDirectionsError);
  }
}

function dispRoute() {
  var from = document.getElementById("from").value;
  var to = document.getElementById("to").value;

  directions.clear();

  var pointArray = [from,to];
  var option = {locale: "ja_JP"};
  directions.loadFromWaypoints(pointArray, option);
}

function onGDirectionsLoad(){ 
  alert("ルート案内の表示を開始します");
}

function onGDirectionsAddOverlay(){ 
  alert("ルート案内の表示が終了しました");
}

function onGDirectionsError(){ 
  var errCode = directions.getStatus().code;
  document.getElementById('route').innerHTML = "エラーが発生しました:" + errCode;
}


