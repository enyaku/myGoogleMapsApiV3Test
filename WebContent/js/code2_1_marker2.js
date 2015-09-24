

var map;
var directions;

//アイコンを作成
var iconBase = new GIcon();
iconBase.shadow = "http://maps.gstatic.com/intl/ja_jp/mapfiles/ms/icons/dithshadow.gif";
iconBase.shadowSize = new GSize(37, 34);
iconBase.imageSize = new GSize(32, 32);
iconBase.iconAnchor = new GPoint(16, 32);
iconBase.infoWindowAnchor = new GPoint(16, 8);


function initialize() {

	
	
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(successCallback,errorCallback);
		
	} else {
	    document.getElementById("map_canvas").innerHTML =  "Geolocationが利用できません";
	}
	
	

}


function successCallback(position) {
    //成功したときの処理
    //result = '緯度:' + position.coords.latitude + '<br />';
    //result += '経度:' + position.coords.longitude + '<br />';
    //document.getElementById("map_canvas").innerHTML = result;
    
	

	  
    if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map_canvas"));

    	//var gmap = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    	
        map.setCenter(new GLatLng(position.coords.latitude,position.coords.longitude), 12);
        

	    directions = new GDirections(map, null);
	    GEvent.addListener(directions, "load", onGDirectionsLoad);
	    

        
      }
    
  
}
function errorCallback(error) {
   //失敗のときの処理
   document.getElementById("map_canvas").innerHTML = 'Geolocationが利用できません';
}



function dispRoute() {
  var from = document.getElementById("from").value;
  var step = document.getElementById("step").value;
  var to = document.getElementById("to").value;

  directions.clear();

  var pointArray = [from,step,to];
  //directions.loadFromWaypoints(pointArray, {locale: "ja_JP", getSteps: true});
  
  var option = {locale: 'ja_JP', getSteps: true, travelMode: G_TRAVEL_MODE_WALKING};
  
  directions.loadFromWaypoints(pointArray, option);
  
  
}


function onGDirectionsLoad(){ 
  var od = directions.getDistance();
  var ot = directions.getDuration();

  var html = "ルート全体 " + od.html + " " + ot.html + "<br />";

  var routeNum = directions.getNumRoutes();

  for (var i = 0 ; i < routeNum ; i++){
    var route = directions.getRoute(i);
    var ord = route.getDistance();
    var ort = route.getDuration();

    html += "Route[" + i + "] " + ord.html + " " + ort.html + "<br />";

    var stepNum = route.getNumSteps();
    for (var j = 0 ; j < stepNum ; j++){
      var step = route.getStep(j);

      
      //ルートの各ポイントに説明を表示する
      var dStep = route.getStep(j);
      var latlng = dStep.getLatLng();
      var htmlStr = dStep.getDescriptionHtml();
      var marker = createMarker(latlng, j + 1, htmlStr);
      map.addOverlay(marker);
      
      html += "YYStep[" + j + "] " + latlng + " " + htmlStr + "<br />";
      
      
      contents = step.getDescriptionHtml();
      var osd = step.getDistance();
      var ost = step.getDuration();

      html += "Step[" + j + "] " + contents + " " + osd.html + " " + ost.html + "<br />";
      
    }
  }

  document.getElementById("route").innerHTML = html;
}

function createMarker(latlng, markerIdx, htmlStr) { 
    //マーカーを作る
    var markerIcon = new GIcon(iconBase,
         "http://gmaps-samples.googlecode.com/svn/trunk/markers/red/marker" + markerIdx + ".png");
    var markerOpts = {
      icon : markerIcon
    };
    var marker = new GMarker(latlng, markerOpts);
    marker.bindInfoWindowHtml(htmlStr);
    return marker; 
  }


function clearRoute() {
	  directions.clear();
	  map.clearOverlays();
	}


