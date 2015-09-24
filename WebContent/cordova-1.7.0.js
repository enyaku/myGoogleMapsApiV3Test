// 成功時のコールバック関数
// このメソッドは GPS の現在座標を保持する
// `Position` オブジェクトを引数とする
//
function onSuccess(position) {
    var element = document.getElementById('geolocation');
    element.innerHTML = '緯度: ' + position.coords.latitude     + '<br />' +
                        '経度: ' + position.coords.longitude    + '<br />' +
                        '<hr />' + element.innerHTML;
}

// エラー時のコールバック関数は PositionError オブジェクトを受けとる
//
function onError(error) {
    alert('コード: '        + error.code    + '\n' +
          'メッセージ: '    + error.message + '\n');
}

// 3秒ごとに位置情報を取得する設定 (オプション)
//
var watchID = navigator.geolocation.watchPosition(onSuccess, onError, { frequency: 3000 });

//navigator.geolocation.clearWatch(watchID);
