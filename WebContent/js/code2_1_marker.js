
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

        var markerIcon1 = new GIcon();
        markerIcon1.image = "./img/icon.png";
        markerIcon1.iconSize = new GSize(42, 56);

        var opt1 = {icon:markerIcon1};

        var marker1 = new GMarker(new GLatLng(position.coords.latitude,position.coords.longitude), opt1);

        map.addOverlay(marker1);
      }
    
  
}
function errorCallback(error) {
   //失敗のときの処理
   document.getElementById("map_canvas").innerHTML = 'Geolocationが利用できません';
}
