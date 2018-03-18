<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>plan_form</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <!-- Font -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,700,600italic,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css"> 
    <link rel="stylesheet" href="assets/css/header.css"> 
    <link rel="stylesheet" href="assets/css/plan_form.css">    
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
        
    <!-- Font -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- calender -->
    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/redmond/jquery-ui.css" >
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" >
    <!-- calender -->

  
</head>

<body>
    <!-- Header Start -->
    <header id="home">
        <?php require('partial/header.php') ?>
    </header>
    <!-- Header end -->

    <div id="site-box" style="text-align: center;">
        <form method="POST" action="" enctype="multipart/form-data">
            
            <div id="a-box" style="text-align: center;">
                <div>   
                    <br>旅のタイトル<br>
                    <textarea name="title" cols="80" rows="1"></textarea>
                </div>  
            </div>

            <div id="b-box">
                <div style="margin:10px;">
                    <span>メイン写真を選択してください</span>
                    <input type="file" style="margin: auto;" name="title_img_name" accept="mage/*">
                    <i class="fa fa-camera-retro my-size" aria-hidden="true"></i>
                </div>
            </div>

            <div id="c-box">
                <div>
                    予算：
                    <input type="text" name="budget" style="width:100px" placeholder="(例)100000">
                    (円)
                </div>
                <div>
                    日数：
                    <input type="text" name="number_days" style="width:100px" placeholder="(例)30">
                    (日)
                </div>


                国1
                <select name="country_id_1">
                    <option value="0" selected="selected" class="msg">国を選択して下さい</option>
                    <?php for($i=0; $i<$count_country ; $i++){ ?>
                     <option value="<?php echo $countries[$i]['country_id']; ?>" class="<?php echo $countries[$i]['id']; ?>"><?php echo $countries[$i]['country_name']; ?></option>
                    <?php } ?>
                    
                </select>
                <br>
                
                都市1
                <!-- 中間テーブルから国名を持ってくる？ -->
                <select name="area_id_1">
                  <option value="0" selected="selected" class="msg">都市を選択して下さい</option>
                  <?php for($i=0; $i<$count_area ; $i++){ ?>
                    <option value="<?php echo $areas[$i]['area_id']; ?>" class="<?php echo $areas[$i]['country_id']; ?>"><?php echo $areas[$i]['area_name']; ?></option>
                  <?php } ?>
                </select>
                <br>

                <!-- カレンダー機能開始 -->
                <script type="text/javascript" src="plan_calender.js"></script>
            
                出発日時
                <input type="text" class="datepicker" name="depart_date">
                <br>
                帰宅日時
                <input type="text" class="datepicker" name="arrival_date">
                <br>

                <!-- 概要 -->
                
                <div style="margin:50px;">
                    <h2>旅行概要</h2>
                    <textarea name="title_comment" cols="40" rows="3"></textarea>
                </div>
                <br>  
                        
            </div>

            <div id="d-box">
                <!-- 写真とコメント -->
                <div class="parent">
                    <div class="field" style="padding-bottom:8px; margin-bottom:20px;">
                        <!-- <div> -->
                            写真とコメント
                            <input type="file" style="margin: auto;" name="pic_name0" accept="image/*">
                        <!-- </div> -->
                            <textarea name="comment0" cols="40" rows="5"></textarea><br>
                            <button type="button" class="btn trash_btn ml10"  style="btn btn-warning" value="" name="">削除</button><br><br>

                    </div>


                 </div> <!-- class=parentの外にボタンを出しておく -->

                 <button type="button" class="btn bg-white mt10 miw100 add_btn" style="" >追加</button>
                <!--  <button type="button" class="btn trash_btn ml10"  style="btn btn-warning" value="" name="">削除</button> --><br>

                <!-- タグを選択 -->
                <p>旅行記につけるタグを選んでください</p>
                <div>
                  <?php for($i=0; $i<$count_tag ; $i++){ ?>
                      <?php if($tags[$i]['tag_id']%4 == 0){ ?>
                          <label class="checkbox-inline"><input type="checkbox" name="tag<?php echo $i?>" value="<?php echo $tags[$i]['tag_id'] ?>"><?php echo $tags[$i]['tag_name'] ?></label><br>
                      <?php }else{ ?>
                          <label class="checkbox-inline"><input type="checkbox" name="tag<?php echo $i?>" value="<?php echo $tags[$i]['tag_id'] ?>"><?php echo $tags[$i]['tag_name'] ?></label>
                      <?php } ?>
                  <?php }?>
                </div>
                <br>

                <!-- 確認画面へ -->
                <input type="submit" value="確認画面へ" class="btn btn-primary">            
            </div>
        </form>
    </div>

    <!-- footer -->
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.mousewheel-3.0.6.pack.js"></script>
    <script src="assets/js/paralax.js"></script>
    <script src="assets/js/jquery.smooth-scroll.js"></script>
    <script src="assets/js/jquery.sticky.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/main.js"></script>
    
    <!-- カレンダーのJS -->
    <script src="assets/js/plan_calender.js"></script>
    <!-- プルダウンのJS -->
    <script src="assets/js/plan_country.js"></script>
    <script src="assets/js/plan_country2.js"></script>
    <!-- コメントを増やすJS -->
    <script src="assets/js/plan_comment.js"></script>
        
    
    <script type="text/javascript">
      $(document).ready(function(){
        $('a[href^="#"]').on('click',function (e) {
          e.preventDefault();

          var target = this.hash;
          var $target = $(target);

          $('html, body').stop().animate({
             'scrollTop': $target.offset().top
          }, 900, 'swing');
          });
      });
    </script>
    
    <script src="assets/js/custom.js"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='https://www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
        ga('create','UA-XXXXX-X','auto');ga('send','pageview');
    </script>
</html>
</body>