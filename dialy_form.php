<?php 
  session_start();

 ?> 

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title></title>
	<script src="js/jquery-1.9.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>


    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/redmond/jquery-ui.css" >
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" >
    <script>
	  	$(function() {
	    $("#datepicker").datepicker();
	  	});
	</script>
	<script>
	  	$(function() {
		    $("#datepicker").datepicker();
		    $("#datepicker").datepicker("option", "showOn", 'button');
		    $("#datepicker").datepicker("option", "buttonImageOnly", true);
		    $("#datepicker").datepicker("option", "buttonImage", 'ico_calendar.png');
	  	});
	</script>


	<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>



	<script src="js/jquery-1.9.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>

    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/redmond/jquery-ui.css" >
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" >

    <script>
        $(function() {
        $("#datepicker").datepicker();
        });
    </script>


</head>


<!-- ボディスタート -->

<body>
  <form method="POST" action="dialy_check.php">
  	<div>
      タイトル<br>
      <textarea name="title" cols="40" rows="5"></textarea>
    </div>
    <div>
      予算：
      <input type="text" name="budget" style="width:100px">
      (半角)
    </div>
    <div>
      日数：
      <input type="text" name="nunber_days" style="width:100px">
      (半角)
    </div>

  <!-- 地域選択開始 -->
  	<script type="text/javascript">
  		$(function() {
      		// 国名が変更されたら発動
  			$('select[name="country"]').change(function() {
          		// 選択されている国のクラス名を取得
          		var countyName = $('select[name="country"] option:selected').attr("class");
          		console.log(countyName);
          
          		// 都市名の要素数を取得
         			 var count = $('select[name="city"]').children().length;
          
         			 // 都市名の要素数分、for文で回す
          		for (var i=0; i<count; i++) {
              		var city = $('select[name="city"] option:eq(' + i + ')');
             			if(city.attr("class") === countyName) {
                  		// 選択した国と同じクラス名だった場合
  						city.show();
              			}else {
                  		// 選択した国とクラス名が違った場合
          				if(city.attr("class") === "msg") {
                      		//都市名を選択して下さい」という要素だった場合
            					city.show();  //「都市名を選択して下さい」を表示させる
                          	city.prop('selected',true);  //「都市名を選択して下さい」を強制的に選択されている状態にする
                  		} else {
                      	// 「都市名を選択して下さい」という要素でなかった場合
    							city.hide();
                  		}
              		}
          		}
      		})
  		})
  	</script> 


    国
    <select name="country"> <!-- 最終的にはデータベースと紐づけたプルダウンを受作る -->
        <option value="Japan" selected="selected" class="msg">国を選択して下さい</option>
        <option value="Japan" class="japan">日本</option>
        <option value="America" class="America">アメリカ</option>
        <option value="Australia" class="Australia">オーストラリア</option>
    </select>
    
    都市
    <select name="city">
        <option value="Japan" selected="selected" class="msg">都市を選択して下さい</option>
        <option value="Tokyo" class="japan">東京</option>
        <option value="Kyoto" class="japan">京都</option>
        <option value="Osaka" class="japan">大阪</option>
        <option value="NY" class="America">ニューヨーク</option>
        <option value="LA" class="America">ロサンゼルス</option>
        <option value="Sydney" class="Australia">シドニー</option>
    </select>

  <!-- 地域選択終了 -->
    
    <div> <!-- カレンダー開始 -->
      <!-- <form> -->
        出発日時
  			<input type="text" name="depart_date" id="datepicker">
  		<!-- </form> -->

  		<script>
      		$(function() {
      		$("#datepicker").datepicker();
      		$("#datepicker").datepicker("option", "showOn", 'button');
      		$("#datepicker").datepicker("option", "buttonImageOnly", true);
      		$("#datepicker").datepicker("option", "buttonImage", 'ico_calendar.png');
      		});
  		</script>
  		
      <!-- <form> -->
        帰宅日時
  			<input type="text" name="arrival_date" id="datepicker2">
  		<!-- </form> -->

  		<script>
      		$(function() {
      		$("#datepicker2").datepicker();
      		$("#datepicker2").datepicker("option", "showOn", 'button');
      		$("#datepicker2").datepicker("option", "buttonImageOnly", true);
      		$("#datepicker2").datepicker("option", "buttonImage", 'ico_calendar.png');
      		});
  		</script>
  	</div> <!-- カレンダー終了 -->

		<div>
      	旅行記概要<input type="file" name="input_img_name" accept="image/*"><br>
      	<textarea name="comment" cols="40" rows="5"></textarea>
    </div>

    	<!-- 追加ボタン -->
    	<button type="button" class="btn bg-white mt10 miw100 add_btn" value="" name="">入力欄追加</button>

      <div class="parent">
            <div class="field" style="padding-bottom:8px; margin-bottom:20px;">
            	<div>
            	        	コメント 写真とコメントを追加してください <input type="file" name="input_img_name" accept="image/*">
              </div>
              <textarea name="content0" cols="40" rows="5"></textarea><br>
              	<!-- <button type="button" class="btn bg-white mt10 miw100 add_btn" value="" name="">入力欄追加</button> -->
              <button type="button" class="btn trash_btn ml10" value="" name="">削除</button>
            </div>
            
      </div>
      <input type="submit" value="作成" class="btn btn-primary">
  </form>

    <!-- テキストを追加するスクリプト -->
    <!-- ３月４日賞賛しょうさん修正 -->
    <script>
        $(function() {
            "use strict";
            var $content = $('.field:last-child');
            $('.add_btn').on('click', function() {
                $content.clone(true).appendTo('.parent');
                $('.parent textarea').each(function(i, elem){
                    $(elem).attr('name','content'+i);
                })
          });

          $(document).on('click','.trash_btn', function() {
               $(this).parents('.field').remove();
                  $('.parent textarea').each(function(i, elem){
                      $(elem).attr('name','content'+i);
                  })
              });
          });
    </script>

</body>
</html>