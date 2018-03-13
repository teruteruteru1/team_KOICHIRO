<?php
    session_start();
    require('dbconnect.php');

    // echo '<pre>';
    // echo '$_POST = ';
    // var_dump($_POST);
    // echo '</pre>';

    // $sql = 'SELECT d.*, a.area_name, t.tag_name FROM
    //     (
    //         (
    //             (
    //                 (
    //                 dialies AS d INNER JOIN areas_dialies AS ad ON d.dialy_id = ad.dialies_id
    //                 )
    //                 INNER JOIN areas AS a ON ad.area_id = a.area_id
    //             ) INNER JOIN dialies_tags AS dt ON d.dialy_id = dt.dialis_id
    //         ) INNER JOIN tags AS t ON dt.tag_id = t.tag_id
    //     )WHERE area = ? AND season = ? AND budgets = ?';

        $sql = 'SELECT d.*, a.area_name, t.tag_name FROM
        (
            (
                (
                    (
                    dialies AS d INNER JOIN areas_dialies AS ad ON d.dialy_id = ad.dialies_id
                    )
                    INNER JOIN areas AS a ON ad.area_id = a.area_id
                ) INNER JOIN dialies_tags AS dt ON d.dialy_id = dt.dialis_id
            ) INNER JOIN tags AS t ON dt.tag_id = t.tag_id
        )WHERE 1';

    $data = array( );
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

    $dialy = array();

    while (true) {
        $dialy = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($dialy == false) {
            break;
        }
        $dialies[] = $dialy;
    }

        $c = count($dialies);

        echo '<pre>';
        echo '$dialies = ';
        var_dump($dialies);
        echo '</pre>';

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
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/search.css">

    <!-- <link rel="stylesheet" href="assets/css/header.css"> -->
    <!------ Include the above in your HEAD tag ---------->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

  </head>

  <body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

  <!-- Header start -->

    <?php Include('home_header.php'); ?>

  <!-- Header end -->

    <!-- search start -->
    <?php Include('home_search.php'); ?>
    <!-- search end -->

    <!-- Single Blog1 -->
    <section id="about" class="site-padding">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <div class="about-image wow fadeInLeft">
              <img src="assets/img/add_img/Single-Blog1-P9172057.jpg" alt="Single Blog1" />
            </div>
          </div>
          <div class="col-sm-6">
            <div class="about-text wow fadeInRight">
              <h3>2017.9 イタリア旅行記</h3>
              <p>いよいよ今回のイタリア旅行記も、最終回を迎えることになった。もう一度、出発までの顛末や計画も書いておこう。
                今から35年ほど前に仕事でミラノに出張した際に、週末の空き時間を利用してベネツィア・フィレンツェに
                一泊二日で出掛けたことがある。
                また、その数年前に女房と一緒にヨーロッパ旅行をした時に、ローマで一日だけ観光を行った。
                ただ、そのいずれもが随分昔のことであり、短時間立ち寄っただけであり、今のデジカメの時代と違って余り写真も残っていない。
                ましてや、出張の時にはカメラを持参していたかどうかも定かでない。
              </p>
              <a href="#" class="btn btn-read-more">続きを読む</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Single Blog1 end -->

    <!-- footer -->

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
                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut .</p> -->
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
                  <!-- <li><a href="#">Pricing</a></li> -->
                  <!-- <li><a href="#">Blog</a></li> -->
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






