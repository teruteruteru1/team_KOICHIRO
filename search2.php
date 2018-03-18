<?php

    session_start();
    require('dbconnect.php');

    // $errors = array();

    // $search_term = $_POST['search_term'];

    // if (!empty($_POST)){
    //     if ($search_term == ''){
    //         $errors['serch_term'] = 'blank';
    //     }
    // }
    // echo '<pre>';
    // echo '$errors = ';
    // var_dump($errors);
    // echo '</pre>';

    // echo '<pre>';
    // echo '$_POST = ';
    // var_dump($_POST);
    // echo '</pre>';

    $text1 = $_POST['search_term'];
    
    $sql = 'SELECT d.*, a.area_name,t.tag_id,c.country_name,co.comment FROM dialies AS d INNER JOIN areas_dialies AS ad ON d.dialy_id = ad.dialies_id INNER JOIN areas AS a ON ad.area_id = a.area_id INNER JOIN dialies_tags AS dt ON d.dialy_id = dt.dialy_id  INNER JOIN tags AS t ON dt.tag_id = t.tag_id INNER JOIN countries AS c ON a.country_id=c.country_id INNER JOIN comments AS co ON d.dialy_id = co.dialy_id ';

  // $sql = "SELECT d.*, a.area_name,t.tag_id,c.country_name,co.comment FROM dialies AS d INNER JOIN areas_dialies AS ad ON d.dialy_id = ad.dialies_id INNER JOIN areas AS a ON ad.area_id = a.area_id INNER JOIN dialies_tags AS dt ON d.dialy_id = dt.dialy_id INNER JOIN tags AS t ON dt.tag_id = t.tag_id INNER JOIN countries AS c ON a.country_id=c.country_id INNER JOIN comments AS co ON d.dialy_id = co.dialy_id WHERE ((d.title_comment LIKE '%旅行%') OR (co.comment LIKE '%旅行%')) AND ((d.title_comment LIKE '%写真%') OR (co.comment LIKE '%写真%'))";


    // キーワードが入力されているときはwhere以下を組み立てる
    if (strlen($text1)>0){

        // 受け取ったキーワードの全角スペースを半角スペースに変換する
        $text2 = str_replace("　", " ", $text1);

        // キーワードを空白で分割する
        $array = explode(" " ,$text2);

        // 分割された個々のキーワードをSQLの条件where句に反映する
        $where = "WHERE ";

        for($i = 0; $i <count($array);$i++){
            $where = $where . "( d.title_comment LIKE '%$array[$i]%' OR co.comment LIKE '%$array[$i]%') " ;

            if ($i <count($array) -1){
                $where .= " AND ";
            }
        }
      $sql = $sql . $where;
    }

    echo $sql;

    $data = array();
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

    $tmp_dialies = array();

    while (true) {
        $dialy = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($dialy == false) {
            break;
        }
        $tmp_dialies[] = $dialy;

    }

    $tmp = [];
    $dialies = [];

    foreach ($tmp_dialies as $daily){
        if (!in_array($daily['dialy_id'], $tmp)) {
            $tmp[] = $daily['dialy_id'];
            $dialies[] = $daily;
        }
    }

    $c = count($dialies);

    // echo '<pre>';
    // echo '$dialies = ';
    // var_dump($dialies);
    // echo '</pre>';

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
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,700,600italic,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/search.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

  </head>

  <body style="margin-top: 80px;">
    <header>
      <?php Include('partial/header.php'); ?>
    </header>

    <?php Include('partial/search_bar.php'); ?>

    <section id="about" class="site-padding">
      <?php for($i=0;$i<$c;$i++){ ?>
      <div class="container search_result">
        <div class="row">
          <div class="col-sm-6">

            <div class="about-image wow fadeInLeft">
              <img src="pictures/<?php echo $dialies[$i]['img_name']; ?>" alt="Single Blog1" width="600" height="400"/>
            </div>
          </div>
          <div class="col-sm-6">
              <h3><?php echo $dialies[$i]['title']; ?></h3>
              <h4> 国: <?php echo $dialies[$i]['country_name']; ?> エリア: <?php echo $dialies[$i]['area_name']; ?> 時期: 予算: <?php echo $dialies[$i]['budget']; ?></h4>
              <p><?php echo $dialies[$i]['title_comment']; ?></p>
              <a href="travel_dialy.php?dialy_id=<?php echo $dialies[$i]['dialy_id']; ?>" class="btn btn-read-more">続きを読む</a>
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