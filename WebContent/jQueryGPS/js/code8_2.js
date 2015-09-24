
var map;
var directions;


function initialize2() {
  if (GBrowserIsCompatible()) {
	var map = new GMap2(document.getElementById("map"));

    map.setCenter(new GLatLng(35.6069973,139.714774), 13);

    
  }
}

function initialize() {
  if (GBrowserIsCompatible()) {
    map = new GMap2(document.getElementById("map"));
    map.setCenter(new GLatLng(35.6069973,139.714774), 13);

    directions = new GDirections(map, document.getElementById("route"));

    GEvent.addListener(directions, "load", onGDirectionsLoad);
    GEvent.addListener(directions, "addoverlay", onGDirectionsAddOverlay);
    GEvent.addListener(directions, "error", onGDirectionsError);
  }
}

function dispRoute() {
  var from = document.getElementById("from").value;
  var to = document.getElementById("to").value;

  var flag;

  
  var option;
  if (document.getElementById("flagTravelMode").value == "0"){
	  option = {locale: 'ja_JP', travelMode: G_TRAVEL_MODE_WALKING};
  }else if (document.getElementById("flagTravelMode").value == "1"){
	  //option = {locale: 'ja_JP', travelMode: G_TRAVEL_MODE_DRIVING};
	  
	  if (document.getElementById("highway").value == "0"){
		    flag = false;
		    
		  }else{
		    flag = true;
		  }
	  option = {locale: 'ja_JP', avoidHighways: flag,travelMode: G_TRAVEL_MODE_DRIVING};
  }
  
  directions.clear();

  var pointArray = [from,to];
  //var option = {locale: "ja_JP", avoidHighways: flag, G_TRAVEL_MODE_DRIVING: flagTravelM};
  //var option = {locale: 'ja_JP', travelMode: G_TRAVEL_MODE_DRIVING};
  //var option = {locale: 'ja_JP', avoidHighways: flag, travelMode: G_TRAVEL_MODE_DRIVING};
  

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


