<?php
    session_start();
    require('dbconnect.php');

    // echo '<pre>';
    // echo '$_POST = ';
    // var_dump($_POST);
    // echo '</pre>';

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
        )WHERE area = ? AND season = ? AND budgets = ? ';

    $data = array(d.dialy_id=);
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




<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>でれちょ</title>
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
<header id="home">
    <div class="main-menu">

      <div class="navbar-wrapper">
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <div class="container">
            <div class="row">
              <div class="col-sm-6">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>

                  <a href="#" class="navbar-brand" style="font-size: 40px;">でれっちょ</a>
                </div>
              </div>


              <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">

                <li><a href="signin.php">ログイン</a></li>
                <li><a href="register/signup.php">ユーザー登録</a></li>
                <li><a href="signout.php">ログアウト</a></li>
                <li class="dropdown">

                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">マイページ<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">クリップ</a></li>
                    <li><a href="plan_form.php">しおり入力</a></li>
                    <li><a href="dialy_form.php">投稿記作成</a></li>
                    <li><a href="#">自投稿閲覧</a></li>
                  </ul>
                </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Main Menu End -->
<div class="container" id="wrap">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <form action="search.php" method="post" accept-charset="utf-8" class="form" role="form">


              <!-- <div class="container"> -->
                <!-- <div class="row"> -->
                  <br><h2>旅行記検索</h2>

                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="キーワード検索：『エリア』+『目的』など" name="srch-term" id="srch-term">
                        <div class="input-group-btn">
                          <button class="btn btn-default btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>
                    <br>
                  <h4>詳細検索</h4>
              <!-- country start -->
                    <div class="row">
                        <div class="col-xs-5 col-md-5">
                          <select name="country" value="" class="form-control input-md" >
                              <option value="japan" selected="selected" class="msg">国を選択して下さい</option>
                              <option value="Japan" class="japan">日本</option>
                              <option value="America" class="America">アメリカ</option>
                              <option value="Australia" class="Australia">オーストラリア</option>
                          </select>

                        </div>
              <!-- country end -->

                        <!-- city start -->
                        <div class="col-xs-5 col-md-5">

                          <select name="city" value="" class="form-control input-md" >
                              <option value="Japan" selected="selected" class="msg">都市を選択して下さい</option>
                              <option value="Tokyo" class="japan">東京</option>
                              <option value="Kyoto" class="japan">京都</option>
                              <option value="Osaka" class="japan">大阪</option>
                              <option value="NY" class="America">ニューヨーク</option>
                              <option value="LA" class="America">ロサンゼルス</option>
                              <option value="Sydney" class="Australia">シドニー</option>
                          </select>
                        </div>
                    </div>

                    <!-- season start -->
                    <div class="col-xs-9 col-md-9">
                      <select name="season" value="" class="form-control input-md">
                          <option value="season" selected="selected" class="msg">季節を選択して下さい</option>
                          <option value="spring" class="spring">春</option>
                          <option value="summer" class="summer">夏</option>
                          <option value="autumn" class="autumn">秋</option>
                          <option value="winter" class="winter">冬</option>
                      </select>
                    </div>

                    <!-- season end -->

                    <!-- budget start -->
                    <div class="col-xs-9 col-md-9">
                      <select name="budget" class="form-control input-md">
                          <option value="budget" selected="selected" class="msg">予算を選択して下さい</option>
                          <option value="1" class="1"> ~1000円</option>
                          <option value="2" class="2"> 1001~10000</option>
                          <option value="3" class="3"> 10001~20000</option>
                          <option value="4" class="4"> 20001~30000</option>
                          <option value="5" class="5"> 30001~</option>
                      </select>
                    </div>
                    <!-- budget end -->

                    <!-- theme start -->
                    <div class="col-xs-9 col-md-9">
                      <select name="budget" class="form-control input-md">
                          <option value="theme" selected="selected" class="msg">目的を選択して下さい</option>
                          <option value="gourmet" class="1"> グルメ</option>
                          <option value="sightseeing" class="sightseeing">観光</option>
                          <option value="shopping" class="shopping">ショッピング</option>
                          <option value="sport_outdoor" class="sport_outdoor">スポーツ・アウトドア</option>
                          <option value="hotel" class="hotel">ホテル</option>
                          <option value="relaxation" class="relaxation">リラクゼーション</option>
                          <option value="resort" class="resort">リゾート</option>
                          <option value="ather" class="ather">その他</option>
                      </select> 
                    </div>
                    <!-- theme end -->


                    

                    <div class="col-xs-9 col-md-9">
                    <button class="btn btn-md btn-primary btn-block signup-btn" type="submit">探す</button><br>
                    </div>
            </form>          
          </div>
    </div>            
  </div>


</body>
</html>




















