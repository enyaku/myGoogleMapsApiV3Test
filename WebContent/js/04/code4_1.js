
var map;

function initialize() {
  var latlng = new google.maps.LatLng(33.595533,130.361795);
  var opts = {
    zoom: 14,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    navigationControlOptions: {
      style: google.maps.NavigationControlStyle.DEFAULT
    }
  };
  map = new google.maps.Map(document.getElementById("map_canvas"), opts);
}

function setDefault() {
  var opts = {
    navigationControlOptions: {
      style: google.maps.NavigationControlStyle.DEFAULT
    }
  };

  map.setOptions(opts);
}

function setAndroid() {
  var opts = {
    navigationControlOptions: {
      style: google.maps.NavigationControlStyle.ANDROID
    }
  };

  map.setOptions(opts);
}

function setSmall() {
  var opts = {
    navigationControlOptions: {
      style: google.maps.NavigationControlStyle.SMALL
    }
  };

  map.setOptions(opts);
}

function setZoomPan() {
  var opts = {
    navigationControlOptions: {
      style: google.maps.NavigationControlStyle.ZOOM_PAN
    }
  };

  map.setOptions(opts);
}
