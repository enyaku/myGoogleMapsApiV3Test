
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script src="http://maps.google.co.jp/maps?file=api&v=2&key=AIzaSyBq3lMiiQlQMfe3C2KyPEaz3PthX62VCZI" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
//<![CDATA[
/*************************************************
 * Created with GoogleMapAPI 2.3
 * Author: Monte Ohrt <monte AT ohrt DOT com>
 * Copyright 2005-2006 New Digital Group
 * http://www.phpinsider.com/php/code/GoogleMapAPI/
 *************************************************/
var points = [];
var markers = [];
var counter = 0;
var sidebar_html = "";
var marker_html = [];
var map = null;
function onLoad() {
if (GBrowserIsCompatible()) {
var mapObj = document.getElementById("map");
if (mapObj != "undefined" && mapObj != null) {
map = new GMap2(document.getElementById("map"));
map.setCenter(new GLatLng(35.6926, 139.595), 13, G_NORMAL_MAP);
map.addControl(new GLargeMapControl());
map.addControl(new GMapTypeControl());
map.addControl(new GScaleControl());
var point = new GLatLng(35.6845,139.615);
var marker = createMarker(point,"美しの湯","<div id=\"gmapmarker\"><a href=\"http://digit-01.com/spa/spa_utsukushi.html \">美しの湯</a></div>", 0);
map.addOverlay(marker);
var point = new GLatLng(35.7007,139.575);
var marker = createMarker(point," 井の頭恩賜公園 ","<div id=\"gmapmarker\"><a href=\"http://www.kensetsu.metro.tokyo.jp/seibuk/inokashira/ \">井の頭恩賜公園</a></div>", 1);
map.addOverlay(marker);
document.getElementById("sidebar_map").innerHTML = "<ul class=\"gmapSidebar\">"+ sidebar_html +"</ul>";
}
} else {
alert("このブラウザでは地図を表示できません。IE6.0以降かFirefox1.0以降をお奨めします。");
}
}
function createMarker(point, title, html, n) {
if(n >= 0) { n = -1; }
var marker = new GMarker(point);
if(isArray(html)) { GEvent.addListener(marker, "mouseover", function() { marker.openInfoWindowTabsHtml(html); }); }
else { GEvent.addListener(marker, "mouseover", function() { marker.openInfoWindowHtml(html); }); }
points[counter] = point;
markers[counter] = marker;
marker_html[counter] = html;
sidebar_html += '<li class="gmapSidebarItem" id="gmapSidebarItem_'+ counter +'"><a href="javascript:click_sidebar(' + counter + ')">' + title + '</a></li>';
counter++;
return marker;
}
function isArray(a) {return isObject(a) && a.constructor == Array;}
function isObject(a) {return (a && typeof a == 'object') || isFunction(a);}
function isFunction(a) {return typeof a == 'function';}
function click_sidebar(idx) {
  if(isArray(marker_html[idx])) { markers[idx].openInfoWindowTabsHtml(marker_html[idx]); }
  else { markers[idx].openInfoWindowHtml(marker_html[idx]); }
}
function showInfoWindow(idx,html) {
map.centerAtLatLng(points[idx]);
markers[idx].openInfoWindowHtml(html);
}
//]]>
</script>
<title>Google Maps API サンプル</title>
</head>
<body onload = "onLoad()">
<h3>Google Maps API サンプル</h3>
<p>
<script type="text/javascript" charset="utf-8">
//<![CDATA[
if (GBrowserIsCompatible()) {
document.write('<div id="map" style="width: 500px; height: 400px"></div>');
} else {
document.write('Javascriptを有効にしないと、地図が表示できません。');
}
//]]>
</script>
<noscript>Javascriptを有効にしないと、地図が表示できません。</noscript>
<div id="sidebar_map"></div>
</p>
</body>
</html>
