// 地図の埋め込み
var map;
var marker = [];
var infoWindow = [];
var markerData = [ // マーカーを立てる場所名・緯度・経度
  {
      name: '筑波山（東の筑波、西の富士）',
      lat: 36.2253757,
      lng: 140.10749250000003,
      lid: 2
  }, 
  {
      name: '間宮林蔵記念館',
      lat: 35.940321,
      lng: 140.03347400000007,
      lid: 8
  }, 
  {
      name: '科学万博記念公園',
      lat: 36.0641543,
      lng: 140.07310200000006,
      lid: 3
  }, 
  {
      name: 'JAXA筑波宇宙センター',
      lat: 36.0655824,
      lng: 140.12810650000006,
      lid: 9
  }, 
  {
      name: 'アサヒビール茨城工場',
      lat: 35.9514811,
      lng: 139.96783040000003,
      lid: 7
  }, 
  {
      name: 'キリンビール取手工場',
      lat: 35.905651,
      lng: 140.07357000000002,
      lid: 5
  }
];
 
function initMap() {
 // 地図の作成
  var mapLatLng = new google.maps.LatLng({lat: markerData[1]['lat'], lng: markerData[0]['lng']}); // 緯度経度のデータ作成
  map = new google.maps.Map(document.getElementById('mainmap'), { // #mainmapに地図を埋め込む
    center: mapLatLng, // 地図の中心を指定
    zoom: 12 // 地図のズームを指定
   });
 
 // マーカー毎の処理
 for (var i = 0; i < markerData.length; i++) {
        markerLatLng = new google.maps.LatLng({lat: markerData[i]['lat'], lng: markerData[i]['lng']}); // 緯度経度のデータ作成
        marker[i] = new google.maps.Marker({ // マーカーの追加
         position: markerLatLng, // マーカーを立てる位置を指定
            map: map // マーカーを立てる地図を指定
       });
 
       infoWindow[i] = new google.maps.InfoWindow({
          content: `
            <div class="content">
              <span>${markerData[i]['name']}</span>
              </br>
              <a class="" href="leaflet.php?lid=${markerData[i]['lid']}">リーフレットを見る</a>
            </div>
          `  
        });
 
     markerEvent(i); // マーカーにクリックイベントを追加
   }
}
 
// マーカーにクリックイベントを追加
function markerEvent(i) {
    marker[i].addListener('click', function() { // マーカーをクリックしたとき
      infoWindow[i].open(map, marker[i]); // 吹き出しの表示
  });
}



// キャンバスの処理
$('#range').on('change', function(){
  bold_line = $('#range').val();
  });

  $('#changecolor').on('change', function(){
  color = $('#changecolor').val();
  });

  //初期化
  let canvas_mouse_event = false; //スイッチ [ true=線を引く, false=線は引かない ]  ＊＊＊
  let oldX = 0; //１つ前の座標を代入するための変数
  let oldY = 0; //１つ前の座標を代入するための変数
  let txy = 10 //タブレット・スマートフォンの場合に指先にあわせるための数値
  let bold_line = 3; //ラインの太さをここで指定
  let color = "#ccc"; //ラインの色をここで指定

  //------------------------------------------------
  const can = $("#drawarea")[0];    //Canvas要素をcanに代入
  const ctx = can.getContext("2d"); //canに書き込み権限を入れる
  //------------------------------------------------



  //mousedown：フラグをTrue
  $(can).mousedown(function(e){
  // console.log(e, 'eのアウトプット')
  //-----------------------------------------------
  oldX = e.offsetX;       //MOUSEDOWNしたX横座標取得
  oldY = e.offsetY - txy; //MOUSEDOWN Y高さ座標取得
  canvas_mouse_event=true;
  //-----------------------------------------------
  });



  //mousemove：フラグがTrueだったら描く ※e：イベント引数取得
  $('canvas').mousemove(function(e){
  //----------------------------------------------
  // console.log(e, "mousemoveの出力");
  if(canvas_mouse_event==true){
      const px = e.offsetX;
      const py = e.offsetY - txy;
      ctx.strokeStyle = color;
      ctx.lineWidth = bold_line;
      ctx.beginPath();
      ctx.lineJoin= "round";
      ctx.lineCap = "round";
      ctx.moveTo(oldX, oldY);
      ctx.lineTo(px, py);
      ctx.stroke();
      oldX = px;
      oldY = py;
  }
  });


  //mouseup：フラグをfalse
  $('canvas').mouseup(function(e){
  //------------------------------------------------
  canvas_mouse_event=false;
  //------------------------------------------------
  });

  // mouseout: フラグをfalse
  $('canvas').mouseout(function(){
  canvas_mouse_event=false;
  });


  //#clear_btn：クリアーボタンAction
  $("#clear_btn").on('click', function(){
  //-----------------------------------------------------------------
  ctx.beginPath();
  ctx.clearRect(0, 0, can.width, can.height);
  //-----------------------------------------------------------------
  });

  // canvasに写真を表示
  var canvas = document.getElementById("drawarea");
  var canvasimg = new Image();
  canvasimg.src = "leaflets/20200222101015d41d8cd98f00b204e9800998ecf8427e.png";

  canvasimg.onload = function () {
      // canvasの幅と高さに合わせて画像を表示
      ctx.drawImage(canvasimg, 0, 0, 600, 700);
  };

  // canvasに書かれた写真をダウンロード => toDataURLが動かない？？？
  $("#download_btn").on('click', function(){
      var canvas_output = document.getElementById('drawarea');
      var base64 = canvas_output.toDataURL('image/png');
      document.getElementById('download_btn').href = base64;
  });

  // ダウンロードされる画像の背景を白にする
  var bgColor = "rgb(255,255,255)";
  function setBgColor(){
      ctx.fillStyle = bgColor;
      ctx.fillRect(0, 0, 343, 250);
  }

