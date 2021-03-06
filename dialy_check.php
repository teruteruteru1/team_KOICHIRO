<?php 
		session_start();  
    require ('dbconnect.php'); 
    require ('assets/functions.php');

    //$_SESSION['plan']が未定義だったらformへ戻す
    if(!$_SESSION['plan']){
        header('Location: dialy_form.php');
        exit();
    }
    //国とタグを表示する準備 
    include('partial/db_for_pulldown.php'); 

    //作るもの
    //①飛び先
    //大抵はdiariesに飛ばす
    //写真とコメントはpicturesに飛ばす
    //areaは中間テーブルに飛ばす

    // echo '<br>';
    // echo '<br>';
    // echo '<pre>'; 
    // echo '$_SESSION = ';
    // var_dump($_SESSION);
    // echo '</pre>';
    
    

    // $_SESSIONの数を数える
    // 各for文に対して、上限をこの変数に設定する  
    $count_session = count($_SESSION['plan']);
    // echo $count_session;
    // echo '<br>';
    // 編集で戻った時用
    $_SESSION['plan']['count'] = $count_session;
 
 	  // 変数定義開始
    // dialiesに格納 
    $title = $_SESSION['plan']['title'];
    $budget = $_SESSION['plan']['budget'];
    $number_days = $_SESSION['plan']['number_days'];    
    $depart_date = $_SESSION['plan']['depart_date'];
    $arrival_date = $_SESSION['plan']['arrival_date'];
    $title_comment = $_SESSION['plan']['title_comment'];
    $title_img_name = $_SESSION['plan']['title_img_name'];
    // 月を抽出
    $month = substr($depart_date,5,2);
    // _areas_dialysに格納
    $country_id_1 = $_SESSION['plan']['country_id_1'];
    $country_id_2 = $_SESSION['plan']['country_id_2'];
    $country_id_3 = $_SESSION['plan']['country_id_3'];
    $area_id_1 = $_SESSION['plan']['area_id_1'];
    $area_id_2 = $_SESSION['plan']['area_id_2'];
    $area_id_3 = $_SESSION['plan']['area_id_3'];
    
    $country_id_re1 = $country_id_1 + 1;
    $country_id_re2 = $country_id_2 + 1;
    $country_id_re3 = $country_id_3 + 1;
    $area_id_re1 = $area_id_1 + 1;
    $area_id_re2 = $area_id_2 + 1;
    $area_id_re3 = $area_id_3 + 1;


    // タグはfor文で回す
    $pic_names = array();
    $comments = array();
    $tag_number = array();
    for($x=0;$x<$count_session;$x++){
    	// tag 
        // dialys_tagsに格納
        $tag_name = 'tag' . $x;
        if(isset($_SESSION['plan'][$tag_name])){ 
            $tag_number[] = $_SESSION['plan'][$tag_name];
        }
        // dialys_picturesに格納
        // picture
        $pic_name = 'pic_name' . $x;
        if(isset($_SESSION['plan'][$pic_name])){        
        		$pic_names[] = $_SESSION['plan'][$pic_name];
        }
        // comments
        $comment = 'comment' . $x;
        if(isset($_SESSION['plan'][$comment])){
        		$comments[] = $_SESSION['plan'][$comment];
        }
    }

  
   

    // 自分にPOST送信して
    // INSERT開始

    //手順
    //①dialiesにインサート
    //②dialiesから日記IDを持ってくる
    //③pictures, areas_dialies, dialies_tagsにインサートする
    //
    if (!empty($_POST)) {

        //$_SESSION['user']['id'] = 27; // $user_idを偽装
        $flag = 1; //flagも偽装
        
        // ①
        $sql = 'INSERT INTO `dialies` SET `user_id` =?, `depart_date` =?, `arrival_date` =?,`month` =?, `number_days` =?, `budget` =?, `title` =?, `title_img_name` =?, `title_comment` =?, `flag` =?, `created` =NOW() ';
        $date = array($_SESSION['user']['id'],$depart_date,$arrival_date,$month,$number_days,$budget,$title,$title_img_name,$title_comment,$flag);
        $stmt = $dbh->prepare($sql);
        $stmt->execute($date);

        //② ①で登録したdialiesのIDを取得
        $sql = 'SELECT dialy_id FROM `dialies` WHERE `user_id`=? ORDER BY created DESC';//最新のものだけ
        $data = array($_SESSION['user']['id']);
        $stmt = $dbh->prepare($sql);
        $stmt->execute($data);
        //フェッチする（select文ありき）
        $dialy_id = $stmt->fetch(PDO::FETCH_ASSOC);

        

        //③
        //areas_dialies①
        $sql = 'INSERT INTO `areas_dialies` SET `area_id` =?, `dialies_id` =?';
        $date = array($area_id_1,$dialy_id['dialy_id']);
        $stmt = $dbh->prepare($sql);
        $stmt->execute($date);

        
        // areas_dialies②
        if (!empty($area_id_2)) {
            $sql = 'INSERT INTO `areas_dialies` SET `area_id` =?, `dialies_id` =?';
            $date = array($area_id_2,$dialy_id['dialy_id']);
            $stmt = $dbh->prepare($sql);
            $stmt->execute($date);
        }
        // areas_dialies③
        if (!empty($area_id_3)) {
            $sql = 'INSERT INTO `areas_dialies` SET `area_id` =?, `dialies_id` =?';
            $date = array($area_id_3,$dialy_id['dialy_id']);
            $stmt = $dbh->prepare($sql);
            $stmt->execute($date);
        }
        //こいつらはループでどうにかさせてい・・・
        
        
        // echo '<pre>';
        // echo '$pic_names = ';
        // var_dump($pic_names);
        // echo '</pre>';
        //pictures
        $count_comments = count($comments);
        for($a=0;$a<$count_comments;$a++){
            $sql = 'INSERT INTO `pictures` SET `pic_name` =?, `dialy_id` =?, `comment` =?';
            $date = array($pic_names[$a],$dialy_id['dialy_id'],$comments[$a]);
            $stmt = $dbh->prepare($sql);
            $stmt->execute($date);
        }      


        // //dialies_tags
        $count_tags = count($tag_number);
        for($b=0;$b<$count_tags;$b++){
            $sql = 'INSERT INTO `dialies_tags` SET `tag_id` =?, `dialy_id` =?';
            $date = array($tag_number[$b],$dialy_id['dialy_id']);
            $stmt = $dbh->prepare($sql);
            $stmt->execute($date);
        }

        // echo '<br>';
        // echo '<pre>'; 
        // echo '$tags = ';
        // var_dump($tags);
        // echo '</pre>';

        // セッションのplanの初期化
        // SQLを読んだ時点でセッションの中身はいらない
        $_SESSION['plan'] = array();
        unset($_SESSION['plan']);

        header('Location: travel_dialy.php?dialy_id=' . $dialy_id['dialy_id']);
        exit();
        



    }


 ?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>plan_check</title>
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
    

<body
  <!-- Header Start -->
  <header id="home">
    <?php require('partial/header.php') ?>
  </header>
  <!-- Main Menu End -->
  <!-- 戻るボタン仮 -->
  <a href="sessiondelete.php">（仮）セッションを消して入力に戻る</a>

  <div class="container">
    <div class="row">
      <p><h4 style="color: blue;">旅のタイトル</h4></p>
      <?php echo h($title) . '<br>'; ?><br>

      <p><h4 style="color: blue;">旅行予定日時</h4></p> 
    
        出発日：<?php echo h($depart_date);?><br>
        帰着日： <?php echo h($arrival_date);?><br>
        日数： <?php echo h($number_days); ?>日<br>

      <h4 style="color: blue;">国と地域</h4></p> 
        国  １: <?php echo h($places[$area_id_re1]['country_name']);?>
        都市１: <?php echo h($places[$area_id_re1]['area_name']);?><br>

        国  ２: 
        <?php if($country_id_2 == 'unselected'){ ?>
          <span style="color: red;">未指定</span>
        <?php }else{ ?>
          <?php echo h($places[$area_id_re2]['country_name']);?>
        <?php } ?>
        都市 ２: 
        <?php if($area_id_2 == 'unselected'){ ?>
          <span style="color: red;">未指定</span><br>
        <?php }else{ ?>
          <?php echo h($areas[$area_id_re2]['area_name']);?><br>
        <?php } ?>
        国  ３: 
        <?php if($country_id_3 == 'unselected'){ ?>
          <span style="color: red;">未指定</span>
        <?php }else{ ?>
          <?php echo h($places[$area_id_re3]['country_name']);?>
        <?php } ?>
        都市 ３: 
        <?php if($area_id_3 == 'unselected'){ ?>
          <span style="color: red;">未指定</span><br>
        <?php }else{ ?>
          <?php echo h($areas[$area_id_re3]['area_name']);?><br>
        <?php } ?>


      <h4 style="color: blue;">#タグ</h4></p> 
        <?php 
          $count_tags = count($tag_number);
          echo h ($count_tags) . '<br>' ;
          for($y=1;$y<$count_tags+1;$y++){ ?>
            <p><?php echo h($tags[$y]['tag_name']); ?></h4></p>         
        <?php } ?>

      <h4 style="color: blue;">予算</h4></p> 
        <?php echo h ($budget)?>円<br>

      <h4 style="color: blue;">旅行記概要</h4></p> 
        title_comment <?php echo h($title_comment) . '<br>' ?><br>
        <img src="title_img/<?php echo h($title_img_name) ?>" width="300"><br>
    
      <h4 style="color: blue;">写真とコメント</h4></p> 
        <?php 
          $count_comments = count($comments);
          echo h($count_comments) . '<br>' ;
          for($z=0;$z<$count_comments;$z++){ ?>
            <img src="pictures/<?php echo h($pic_names[$z]); ?>" width="300"><br>
            <p><?php echo h($comments[$z]); ?></p>              
        <?php } ?>


    <br>
 	  </div>

    <form method="POST" action="">
    	<input type="hidden" name="kubo" value="kaori">
      <a href="dialy_form.php?action=rewrite"><strong>再入力</strong></a><br>
      <!-- パラメータをつけることで、$_GET/$_REQUESTが使える -->
    	<input type="submit" value="旅行記登録">

    </form>

  </div>




    

    <!-- footer -->
    <div id="e-box">
        <footer>
            <div class="container">
                <div class="row">
                    <!-- Single Footer -->
                    <div class="col-sm-6">
                        <div class="single-footer">
                            <div class="footer-logo">
                                <!-- <a href="#" class="mod_dropnavi-brand"><h1>でれっちょ</h1></a> -->
                                <a href="#"><h1>でれっちょ</h1></a>
                                    <p>旅行コミュニティサイト(旅行記・旅行SNS)</p>
                            </div>
                        </div>
                    </div>
                    <!-- Single Footer -->
                </div>
            </div>
        </footer>

        <!-- Copyright -->
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="copy-text">
                            <p>All Rights Reserved | Copyright 2016 © <strong><a href="http://www.pfind.com/goodies/bizium/">The Bizium</a></strong> template by <strong><a href="http://www.pfind.com/goodies/">pFind's Goodies</a></strong></p>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="footer-menu pull-right">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Faq</a></li>
                                <li><a href="#">Pricing</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="social">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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



</body>
</html>

    