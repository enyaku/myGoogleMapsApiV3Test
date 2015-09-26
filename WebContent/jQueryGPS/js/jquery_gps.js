//////////////////////////////////////////////////
//
//	jQuery GPS
//
//////////////////////////////////////////////////
$(function(){
	//GPS情報取得を開始
	$('#start_gps').click(function(){
		navigator.geolocation.watchPosition(
			function(position){
				$('#latitude').html(position.coords.latitude); //緯度
				$('#longitude').html(position.coords.longitude); //経度

				//GoogleMapLOAD
				if (GBrowserIsCompatible()) {
					map = new GMap2(document.getElementById("map"));
					map.addControl(new GLargeMapControl());

					map.addControl(new GMapTypeControl());

					var latlng = new GLatLng(position.coords.latitude,position.coords.longitude);
					map.setCenter(latlng, 15, G_NORMAL_MAP);
					get_area_name(latlng);
					 dispRoute();

					//var marker = new GMarker(latlng);
					//map.addOverlay(marker);
					
			        var markerIcon1 = new GIcon();
			        markerIcon1.image = "./img/icon.png";
			        markerIcon1.iconSize = new GSize(42, 56);

			        var opt1 = {icon:markerIcon1};

			        var marker1 = new GMarker(new GLatLng(position.coords.latitude,position.coords.longitude), opt1);

			        map.addOverlay(marker1);
			        
			       


					GEvent.addListener(map,'click',function(overlay, point){
						if(point){
							document.getElementById('click_lat').value = point.y;
							document.getElementById('click_long').value = point.x;
							
					        var element = document.getElementById('geolocation');
					        element.innerHTML = '緯度,経度: ' + point.y     + ',' +
					                             point.x    + '' +
					                            '<hr />' + element.innerHTML;
					        
						}
					});
				}
			}
		);
	});
});


function get_area_name(latLng_now){
    // 座標から住所名を取得
    var geocoder = new google.maps.Geocoder();
      geocoder.geocode({latLng: latLng_now}, function(results, status){
      if(status == google.maps.GeocoderStatus.OK){
          document.getElementById("area_name").innerHTML = results[0].formatted_address+'付近にいます';
      } else {
        // エラーの場合
      }
    });
  }



var map;
var directions;

var curr_latitude;
var curr_longitude;

window.onload=function(){
	//fnDate()
	setInterval(function(){
	fnDate();
	},10000);
}

//js 
function fnDate(){
	var oDiv=document.getElementById("div1");
	var date=new Date();
	var year=date.getFullYear();//
	var month=date.getMonth();//
	var data=date.getDate();//
	var hours=date.getHours();//
	var minute=date.getMinutes();//
	var second=date.getSeconds();//
	var time=year+"-"+fnW((month+1))+"-"+fnW(data)+" "+fnW(hours)+":"+fnW(minute)+":"+fnW(second);
	oDiv.innerHTML=time;
}
//
function fnW(str){
	var num;
	str>10?num=str:num="0"+str;
	return num;
} 


//アイコンを作成
var iconBase = new GIcon();
iconBase.shadow = "http://maps.gstatic.com/intl/ja_jp/mapfiles/ms/icons/dithshadow.gif";
iconBase.shadowSize = new GSize(37, 34);
iconBase.imageSize = new GSize(32, 32);
iconBase.iconAnchor = new GPoint(16, 32);
iconBase.infoWindowAnchor = new GPoint(16, 8);



function initialize() {
  if (GBrowserIsCompatible()) {
    map = new GMap2(document.getElementById("map"));
//35.670756, 139.823215
    map.setCenter(new GLatLng(35.670756, 139.823215), 15);

    //directions = new GDirections(map, null);

    directions = new GDirections(map, document.getElementById("route"));
    
    GEvent.addListener(directions, "load", onGDirectionsLoad);
    GEvent.addListener(directions, "addoverlay", onGDirectionsAddOverlay);
    GEvent.addListener(directions, "error", onGDirectionsError);
    
  }
}

function dispRoute2() {
	//alert("11111");
	//getCurrentPosition2();
	//alert("22222");
  var from = document.getElementById("from").value;
  //var step = document.getElementById("step").value;
  var to = document.getElementById("to").value;

  directions.clear();

  var pointArray = [from,to];
  //directions.loadFromWaypoints(pointArray, {locale: "ja_JP", getSteps: true});
  
  var option = {locale: 'ja_JP', getSteps: true, travelMode: G_TRAVEL_MODE_WALKING};
  
  directions.loadFromWaypoints(pointArray, option);
  
  
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





