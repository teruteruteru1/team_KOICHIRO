<?php 
    session_start();  
    require ('dbconnect.php');


    //一回自分に飛ばす。確認ヴァーダンプ
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<pre>'; 
    echo '$_FILES = ';
    var_dump($_FILES);
    echo '</pre>';
    echo '<pre>'; 
    echo '$_POST = ';
    var_dump($_POST);
    echo '</pre>';
     


    //プルダウン用の準備 
    //ここらへんは切り取る   
    //countriesテーブルから取ってくる
    $sql = 'SELECT * FROM `countries` WHERE 1';
    $data = array();
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    //fetchする
    $countries = array();
    while (true) {
        $country = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($country == false) {
            break;
        }
        $countries[] = $country;
    }
    $count_country = count($countries); 
    //echo $count_country;//国名プルダウン用カウントカントリー



    //areasテーブルから取ってくる
    $sql = 'SELECT * FROM `areas` WHERE 1';
    $data = array();
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    //fetchする
    $areas = array();
    while (true) {
        $area = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($area == false) {
            break;
        }
        $areas[] = $area;
    }
    $count_area = count($areas); 
    //echo $count_area;//国名プルダウン用カウントカントリー

    //tagsテーブルから取ってくる
    $sql = 'SELECT * FROM `tags` WHERE 1';
    $data = array();
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    //fetchする
    $tags = array();
    while (true) {
        $tag = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($tag == false) {
            break;
        }
        $tags[] = $tag;
    }
    $count_tag = count($tags);
    // プルダウンの準備完了  

    // バリデーション
    $errors = array(); //一度戻ってきたときのエラー用

    //$_POSTが空じゃない時
    //ユーザーがformの送信ボタンを押した時
    
    // $_POSTの数を数える
    // 各for文に対して、上限をこの変数に設定する  
    $count_post = count($_POST);
    echo $count_post;
    

    if(!empty($_POST)){
        echo '送信完了<br>';
        //変数定義開始
        $title = $_POST['title'];
        $budget = $_POST['budget'];
        $number_days = $_POST['number_days'];
        $country_id_1 = $_POST['country_id_1'];
        $country_id_2 = $_POST['country_id_2'];
        $country_id_3 = $_POST['country_id_3'];
        $area_id_1 = $_POST['area_id_1'];
        $area_id_2 = $_POST['area_id_2'];
        $area_id_3 = $_POST['area_id_3'];
        $depart_date = $_POST['depart_date'];
        $arrival_date = $_POST['arrival_date'];
        $title_comment = $_POST['title_comment'];

        // メイン画像の変数定義
        if (!isset($_REQUEST['action'])) {
            $title_img_name = $_FILES['title_img_name']['name'];
        }
        
        //写真たちをぶん回すpicturesに保存するデータたち
        // ループ文でぶん回す
        if (!isset($_REQUEST['action'])){
            // 一度戻ってきたら同じ処理を二回行わない
            $pic_names = array();
            $comments = array();
            for($n=0;$n<$count_post;$n++){
                if(isset($_FILES['pic_name' . $n]['name'])){
                    $pic_number = $_FILES['pic_name' . $n]['name'];
                    $pic_names[] = $pic_number;
                }
                if(isset($_POST['comment' . $n])){
                    $comment_number = $_POST['comment' . $n];
                    $comments[] = $comment_number;
                }    
            }
        }
        echo '<pre>'; 
        echo '$pic_names = ';
        var_dump($pic_names);
        echo '</pre>'; 
        echo '<pre>'; 
        echo '$comments = ';
        var_dump($comments);
        echo '</pre>'; 

        //tagの変数（配列）定義
        $tag_number = array();
        for($x=0;$x<$count_post;$x++){
            $tag_name = 'tag' . $x;
            if(isset($_POST[$tag_name])){ 
                $tag_number[] = $_POST[$tag_name];
            }
            
        }

        echo '<pre>'; 
        echo '$tag_number = ';
        var_dump($tag_number);
        echo '</pre>'; 
        //変数定義完了
        
        //各空チェック
        //いらないものは確認しない
        if ($title == '') {
            $errors['title'] = 'blank';
        }
        if ($budget == '') {
            $errors['budget'] = 'blank';
        }
        if ($number_days == '') {
            $errors['number_days'] = 'blank';
        }
        if ($country_id_1 == '') {
            $errors['country_id_1'] = 'blank';
        }
        if ($area_id_1 == '') {
            $errors['area_id_1'] = 'blank';
        }
        if ($depart_date == '') {
            $errors['depart_date'] = 'blank';
        }
        if ($arrival_date == '') {
            $errors['arrival_date'] = 'blank';
        }
        if ($title_comment == '') {
            $errors['title_comment'] = 'blank';
        }
        // 写真とコメントはなくてもいい？
        // if ($pic_names[0] == '') {
        //     $errors['pic_names[0]'] = 'blank';
        // }
        // if ($comments[0] == '') {
        //     $errors['comments[0]'] = 'blank';
        // }
        
        // 空チェック終了

        // 画像拡張子のバリデーション開始

        // メイン画像用の拡張子チェック
        if (!empty($title_img_name)) {
            //jpeg/png/gifの３種類に変更する
            $title_img_type = substr($title_img_name,-3) ;
            $title_img_type = strtolower($title_img_type);
            if ($title_img_type != 'jpg' && $title_img_type != 'png' && $title_img_type != 'gif') {
                $errors['title_img_name'] = 'type';
            }
        }else{
            $errors['title_img_name'] = 'blank';
        }

        if (isset($_REQUEST['action'])){
            $errors['title_img_name'] = 'rewrite';
        }
        // 他の写真の拡張子チェック $pic_names[]の中身を確認する
        for($b=0;$b<$count_post;$b++){
            if (!empty($pic_names[$b])) {
                //jpeg/png/gifの３種類に変更する
                $pic_type = substr($pic_names[$b],-3) ;
                $pic_type = strtolower($pic_type);
                if ($pic_type != 'jpg' && $pic_type != 'png' && $pic_type != 'gif') {
                    $errors['pic_names' . $b] = 'type';
                }
            }

            // if (isset($_REQUEST['action'])){
            //     $errors['pic_names' . $b] = 'rewrite';
            // }
        }
        


        // セッション登録開始
        if (empty($errors)) {
            $date_str = date('YmdHid');
            $submit_title_img_name = $date_str . $title_img_name;
            move_uploaded_file($_FILES['title_img_name']['tmp_name'], 'title_img/' .$submit_title_img_name);
            $_SESSION['plan']['title'] = $title;
            $_SESSION['plan']['budget'] = $budget;
            $_SESSION['plan']['number_days'] = $number_days;
            $_SESSION['plan']['country_id_1'] = $country_id_1;
            $_SESSION['plan']['country_id_2'] = $country_id_2;
            $_SESSION['plan']['country_id_3'] = $country_id_3;
            $_SESSION['plan']['area_id_1'] = $area_id_1;
            $_SESSION['plan']['area_id_2'] = $area_id_2;
            $_SESSION['plan']['area_id_3'] = $area_id_3;
            $_SESSION['plan']['depart_date'] = $depart_date;
            $_SESSION['plan']['arrival_date'] = $arrival_date;
            $_SESSION['plan']['title_comment'] = $title_comment;

            
            for($y=0;$y<$count_post;$y++){
                // 写真
                if(!empty($pic_names[$y])){
                    $submit_pic_name = $date_str . $pic_name . $y;
                    move_uploaded_file($_FILES['pic_name' . $y]['tmp_name'], 'pictures/' .$submit_pic_name);
                    // $_SESSION['plan']['pic_name' . $y] = $pic_names[$y];
                }
                // コメント
                if(!empty($comments[$y])){
                    $_SESSION['plan']['comment' . $y] = $comments[$y];
                }
                // タグ  $tag_numberの中身は数字だけ
                if(!empty($tag_number[$y])){
                    $_SESSION['plan']['tag' . $y] = $tag_number[$y];
                }
            }           

            header('Location: plan_check.php');
            exit();
        }

    }

    echo '<pre>'; 
    echo '$errors = ';
    var_dump($errors);
    echo '</pre>';

      
    




    
 ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>plam_form</title>
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
    

<body>

        <!-- Header Start -->
    <header id="home">
      <?php require('partial/header.php') ?>
    </header>
            <!-- Main Menu End -->


    <div style="text-align: center;">
        <form method="POST" action="" enctype="multipart/form-data">
            <div>   
                <br>タイトル<br>
                <textarea name="title" cols="80" rows="5"></textarea>
            </div>
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
                 <option value="<?php echo $countries[$i]['country_name']; ?>" class="<?php echo $countries[$i]['id']; ?>"><?php echo $countries[$i]['country_name']; ?></option>
                <?php } ?>
                
            </select>
            
            都市1
            <!-- 中間テーブルから国名を持ってくる？ -->
            <select name="area_id_1">
              <option value="0" selected="selected" class="msg">都市を選択して下さい</option>
              <?php for($i=0; $i<$count_area ; $i++){ ?>
                <option value="<?php echo $areas[$i]['area_name']; ?>" class="<?php echo $areas[$i]['country_id']; ?>"><?php echo $areas[$i]['area_name']; ?></option>
              <?php } ?>

              
            </select>
            <br>

            国1.2
            <select name="countryhh">
                <option value="0" selected="selected" class="msg">国を選択して下さい</option>                
                <option value="Japan" class="japan">日本</option>
                <option value="America" class="America">アメリカ</option>
                <option value="Australia" class="Australia">オーストラリア</option>
            </select>
            
            都市1.2
            <!-- 中間テーブルから国名を持ってくる？ -->
            <select name="cityhh">
              <option value="0" selected="selected" class="msg">都市を選択して下さい</option>
              <option value="Tokyo" class="japan">東京</option>
              <option value="Kyoto" class="japan">京都</option>
              <option value="Osaka" class="japan">大阪</option>
              <option value="NY" class="America">ニューヨーク</option>
              <option value="LA" class="America">ロサンゼルス</option>
              <option value="Sydney" class="Australia">シドニー</option>
            </select>
            <br>



            国2
            <select name="country_id_2">
                <option value="0" selected="selected" class="msg">国を選択して下さい</option>
                <?php for($i=0; $i<$count_country ; $i++){ ?>
                <option value="<?php echo $countries[$i]['country_name']; ?>" class="<?php echo $countries[$i]['country_name']; ?>"><?php echo $countries[$i]['country_name']; ?></option>
                <?php } ?>
                <!-- <option value="Japan" class="japan">日本</option>
                <option value="America" class="America">アメリカ</option>
                <option value="Australia" class="Australia">オーストラリア</option> -->
            </select>
            
            都市2
            <!-- 中間テーブルから国名を持ってくる？ -->
            <select name="area_id_2">
                <option value="Japan" selected="selected" class="msg">都市を選択して下さい</option>
                <option value="Tokyo" class="japan">東京</option>
                <option value="Kyoto" class="japan">京都</option>
                <option value="Osaka" class="japan">大阪</option>
                <option value="NY" class="America">ニューヨーク</option>
                <option value="LA" class="America">ロサンゼルス</option>
                <option value="Sydney" class="Australia">シドニー</option>
            </select>
            <br>

            国3
            <select name="country_id_3">
                <option value="0" selected="selected" class="msg">国を選択して下さい</option>
                <?php for($i=0; $i<$count_country ; $i++){ ?>
                <option value="<?php echo $countries[$i]['country_name']; ?>" class="<?php echo $countries[$i]['country_name']; ?>"><?php echo $countries[$i]['country_name']; ?></option>
                <?php } ?>
                <!-- <option value="Japan" class="japan">日本</option>
                <option value="America" class="America">アメリカ</option>
                <option value="Australia" class="Australia">オーストラリア</option> -->
            </select>
            
            都市3
            <!-- 中間テーブルから国名を持ってくる？ -->
            <select name="area_id_3">
                <option value="0" selected="selected" class="msg">都市を選択して下さい</option>
                <option value="Tokyo" class="japan">東京</option>
                <option value="Kyoto" class="japan">京都</option>
                <option value="Osaka" class="japan">大阪</option>
                <option value="NY" class="America">ニューヨーク</option>
                <option value="LA" class="America">ロサンゼルス</option>
                <option value="Sydney" class="Australia">シドニー</option>
            </select>

            <br>
            <br>

            <div> 
           <!-- カレンダー機能開始 -->
                <script type="text/javascript" src="plan_calender.js"></script>
            
                出発日時
                <input type="text" class="datepicker" name="depart_date">
                帰宅日時
                <input type="text" class="datepicker" name="arrival_date">
            

            </div>
            <br>
            <br>

            <!-- 概要 -->
            <h2>旅行概要</h2>
            <div style="margin:50px;">
              <span>メイン写真を選択してください</span>
                <input type="file" style="margin: auto;" name="title_img_name" accept="mage/*">
                <textarea name="title_comment" cols="80" rows="5"></textarea>
            </div>
            <br>  
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
            <br>
            <br>

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

            <!-- 確認画面へ -->
            <br>
            <br>

             <input type="submit" value="確認画面へ" class="btn btn-primary">            
        </form>
    </div>

        <!-- footer -->
        
        <footer>
            <div class="container">
                <div class="row">
                
                    <!-- Single Footer -->
                    <div class="col-sm-3">
                        <div class="single-footer">
                            <div class="footer-logo">
                                <img src="img/footer-logo.png" alt="Footer Logo" />
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut .</p>
                            </div>
                        </div>
                    </div>
                    <!-- Single Footer -->
                    
                    
                    <!-- Single Footer -->
                    <div class="col-sm-3">
                        <div class="single-footer">
                            <h4>Keep In Touch</h4>
                            <p>44 New Design Street, Melbourne 005 <br />
                            +1 (123) 456-7890-321 <br />
                            info@weburl.com <br />
                            (01) 800 854 633</p>
                        </div>
                    </div>
                    <!-- Single Footer -->
                    
                    
                    <!-- Single Footer -->
                    <div class="col-sm-3">
                        <div class="single-footer">
                            <h4>Suscribe</h4>
                            <p>Enter your Email Address For Subscirbe Our Monthly Newsletters</p>
                            
                            <form action="">
                                <div class="form-group">
                                    <input type="email" class="form-control my-form" id="exampleInputEmail1" placeholder="Enter Your Email Address">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-subscribe">Subscirbe</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                    <!-- Single Footer -->
                    
                    <!-- Single Footer -->
                    <div class="col-sm-3">
                        <div class="single-footer">
                            <h4>Recent Projects</h4>
                            <ul class="projects">
                                <li><img src="img/project.png" alt="Reccent Project" /></li>
                                <li><img src="img/project.png" alt="Reccent Project" /></li>
                                <li><img src="img/project.png" alt="Reccent Project" /></li>
                                <li><img src="img/project.png" alt="Reccent Project" /></li>
                                <li><img src="img/project.png" alt="Reccent Project" /></li>
                                <li><img src="img/project.png" alt="Reccent Project" /></li>
                            </ul>
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




