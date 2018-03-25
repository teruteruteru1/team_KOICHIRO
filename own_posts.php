<?php
    session_start();
    require('dbconnect.php');
    require ('signin_user.php');

    $user_id = $_REQUEST['user_id'];

    // echo $user_id;

    // user情報の取得
    $sql= 'SELECT d.*,u.* FROM dialies as d LEFT JOIN users AS u on d.user_id = u.user_id WHERE u.user_id = ?';
    $data = array($user_id);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    //旅行記の取得
    $sql = 'SELECT d.*, a.area_name, c.country_name FROM dialies AS d INNER JOIN areas_dialies AS ad ON d.dialy_id = ad.dialies_id INNER JOIN areas AS a ON ad.area_id = a.area_id INNER JOIN countries AS c ON a.country_id=c.country_id WHERE user_id = ? ';

    $data = array($user_id);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

    $dialies = array();

    while (true) {
        $dialy = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($dialy == false) {
            break;
        }
        $dialies[] = $dialy;
    }

    // echo '<pre>';
    // echo '$dialies = ';
    // var_dump($dialies);
    // echo '</pre>';

    $c = count($dialies);

    // 自投稿データ数の取得
    $sql = 'SELECT COUNT(*) AS cnt FROM dialies WHERE user_id=?';
    $data = array($user_id);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

    $c_own_dialy = $stmt->fetch(PDO::FETCH_ASSOC);

    // echo '<pre>';
    // echo '$c_own_dialy = ';
    // var_dump($c_own_dialy);
    // echo '</pre>';

    // user情報の取得
    $sql= 'SELECT like_count FROM dialies WHERE user_id = ?';
    $data = array($user_id);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

    // $like_total = $stmt->fetch(PDO::FETCH_ASSOC);

    $like_total = array();

    while (true) {
        $like_c = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($like_c == false) {
            break;
        }
        $like_total[] = $like_c;
    }

    // echo '<pre>';
    // echo '$like_total = ';
    // var_dump($like_total);
    // echo '</pre>';

    $row_sum = array_map(function($row){
        return array_sum($row);
    }, $like_total);

    // echo array_sum($row_sum);



 ?>

<!doctype html>
<html class="no-js" lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

    <!-- Font -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,700,600italic,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- Font -->

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/search.css">
    <link rel="stylesheet" href="assets/css/header.css">

    <!-- Include the above in your HEAD tag -->
    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- Include the above in your HEAD tag -->

  </head>

  <body style="margin-top: 80px;">

    <!-- Header start -->
    <header>
      <?php Include('partial/header.php'); ?>
    </header>
    <!-- Header end -->

    <!-- ユーザー情報 -->
    <div class="container ">
      <div class="row">
        <div class="col-sm-3">
            <div class="span4 well">
                <div class="user_profile">
                   <img src="user_profile_img/<?php echo htmlspecialchars($user['img_name']); ?>" width="100">
                </div>
            </div>
        </div>
        <div class="col-sm-3">
          <div class="span3">
            <h3>名前：<?php echo $user['user_name']; ?></h3>
            <p>投稿数： <?php echo $c_own_dialy['cnt']; ?></p><br>
            <p>総いいね！数：<?php echo array_sum($row_sum); ?></p>
          </div>
        </div>
      </div>
    </div>

    <section id="about" class="site-padding">
      <?php if($c==0) { ?>
        <div class="text-center">
          <h1>検索結果がありません</h1>
        </div>
      <?php } ?>
      <?php for($i=0;$i<$c;$i++){ ?>
        <div class="container search_result">
          <div class="row">
            <div class="col-sm-6">

              <div class="about-image wow fadeInLeft">
                <img src="title_img/<?php echo htmlspecialchars($dialies[$i]['title_img_name']); ?>" alt="Single Blog1" width="600" height="400"/>
              </div>
            </div>
            <div class="col-sm-6">
                <h3><?php echo htmlspecialchars($dialies[$i]['title']); ?></h3>
                <h4> 国: <?php echo htmlspecialchars($dialies[$i]['country_name']); ?> エリア: <?php echo htmlspecialchars($dialies[$i]['area_name']); ?> 時期: 予算: <?php echo htmlspecialchars($dialies[$i]['budget']); ?></h4>
                <p><?php echo htmlspecialchars($dialies[$i]['title_comment']); ?></p>
                <a href="travel_dialy.php?dialy_id=<?php echo htmlspecialchars($dialies[$i]['dialy_id']); ?>" class="btn btn-read-more">続きを読む</a>
            </div>
          </div>
        </div><br>
      <?php } ?>
    </section>

    <footer>
      <div class="container">
        <div class="row">

          <!-- Single Footer -->
          <div class="col-sm-6">
            <div class="single-footer">
              <div class="footer-logo">
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
                  <li><a href="#">ホーム</a></li>
                  <li><a href="#">チーム概要</a></li>
                  <li><a href="#">サービス</a></li>
                  <li><a href="#">問い合わせ</a></li>
                  <li><a href="#">連絡先</a></li>
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

    <!-- footer -->

        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.mousewheel-3.0.6.pack.js"></script>
        <script src="assets/js/paralax.js"></script>
        <script src="assets/js/jquery.smooth-scroll.js"></script>
        <script src="assets/js/jquery.sticky.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/main.js"></script>
        <!-- プルダウンのJS -->
        <script src="assets/js/plan_country.js"></script>
        <script src="assets/js/plan_country2.js"></script>
        <!-- プルダウン用js -->
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




