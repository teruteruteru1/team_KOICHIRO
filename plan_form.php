<?php 
    session_start();  
    require ('dbconnect.php');

//一回自分に飛ばす。確認ヴァーダンプｂｂｂｂ
    echo '<pre>'; 
    echo '$_POST = ';
    var_dump($_POST);
    echo '</pre>';


    


//プルダウン用の準備    
//国テーブルから取ってくる
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
    echo $count_country;//国名プルダウン用カウントカントリー

    echo '<br>';
    echo '<pre>'; 
    echo '$country = ';
    var_dump($country);
    echo '</pre>';

// バリデーション
    $errors = array(); //一度戻ってきたときのエラー用

    //$_POSTが空じゃない時
    //ユーザーがformの送信ボタンを押した時
      

    if(!empty($_POST)){
        echo '送信完了<br>';
        //変数定義
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
        $title_img_name = $_POST['title_img_name'];
        //写真たちをぶん回すぜpicturesに保存するデータたち
        // 条件分岐でぶん回す
        $pic_name0 = $_POST['pic_name0'];
        $comment0 = $_POST['comment0'];
        //ユーザー名のからチェック
        if ($name == '') {
            $errors['name'] = 'blank';
        }
        if ($email == '') {
            $errors['email'] = 'blank';
        }
    }

    //     //パスワードの空チェック
    //     $str_c = strlen($password);
    //     if ($password == '') {
    //         $errors['password'] = 'blank';
    //     }elseif ($str_c < 4 || 16 < $str_c) {
    //         $errors['password'] = 'lenge';
    //     }

    //     //type=fileの情報を受け取るには$_FILESスーパーグローバル変数が必要になる
    //     if (!isset($_REQUEST['action'])) {
    //         $file_name = $_FILES['input_img_name']['name'];
    //     }
        
    //     if (!empty($file_name)) {
    //         //jpeg/png/gifの３種類に変更する
    //         $file_type = substr($file_name,-3) ;
    //         $file_type = strtolower($file_type);
    //         if ($file_type != 'jpg' && $file_type != 'png' && $file_type != 'gif') {
    //           $errors['img_name'] = 'type';
    //         }
    //     }else{
    //         $errors['img_name'] = 'blank';
    //     }

    //     if (isset($_REQUEST['action'])){
    //         $errors['img_name'] = 'rewrite';
    //     }


    




    
 ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>plam_f</title>
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
    <!-- <header id="home"> -->
        
        <!-- Main Menu Start -->
        <!-- <div class="main-menu">
            <div class="navbar-wrapper">    
                <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle Navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            
                            <a href="#" class="navbar-brand"><img src="img/logo.png" alt="Logo" /></a>                          
                        </div>
                        
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-right">

                                <li><a href="#signin">ログイン</a></li>
                                <li><a href="#signup">ユーザー登録</a></li>
                                <li><a href="#signout">ログアウト</a></li>
                                <li><a href="#mypage">マイページ</a></li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </header> -->
            <!-- Main Menu End -->


    <div style="text-align: center;">
        <form method="POST" action="">
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
                <option value="<?php echo $countries[$i]['country_name']; ?>" class="<?php echo $countries[$i]['country_name']; ?>"><?php echo $countries[$i]['country_name']; ?></option>
                <?php } ?>
                <!-- <option value="Japan" class="japan">日本</option>
                <option value="America" class="America">アメリカ</option>
                <option value="Australia" class="Australia">オーストラリア</option> -->
            </select>
            
            都市1
            <!-- 中間テーブルから国名を持ってくる？ -->
            <select name="area_id_1">
                <option value="Japan" selected="selected" class="msg">都市を選択して下さい</option>
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


            <h2>旅行概要</h2>
            <div style="margin:50px;">
                <input type="file" style="margin: auto;" name="title_img_name" accept="image/*">
                <textarea name="title_comment" cols="80" rows="5"></textarea>
            </div>
            
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