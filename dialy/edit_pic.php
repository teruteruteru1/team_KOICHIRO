<?php 
    session_start();  
    require ('../dbconnect.php'); 
    require ('../assets/functions.php');

    echo $_REQUEST['picture_id'];
    $picture_id = $_REQUEST['picture_id'];

    // picturesの取得
    $sql = 'SELECT * FROM pictures WHERE picture_id=?';
    $data = array($picture_id);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

    $picture = $stmt->fetch(PDO::FETCH_ASSOC);
   

    echo '<pre>'; 
    echo '$picture = ';
    var_dump($picture);
    echo '</pre>'; 
    echo '<pre>'; 
    echo '$_POST = ';
    var_dump($_POST);
    echo '</pre>'; 
     
     echo '<pre>'; 
        echo '$_FILES = ';
        var_dump($_FILES);
        echo '</pre>';

    // 編集画面を押して自分に飛ばす

    // 画像を変更する場合
    if (!empty($_POST) && isset($_POST['edit'])) {
        $comment = $_POST['comment'];

        if($_FILES['pic_name']['name'] != ''){
            $file_name = $_FILES['pic_name']['name']; 
            $file_type = substr($file_name,-3) ;
            $file_type = strtolower($file_type);
            if ($file_type != 'jpg' && $file_type != 'png' && $file_type != 'gif') {
              $errors['img_name'] = 'type';
            }           
        }


        // バリデーション無しで次に飛ばすｗｗ
        // SESSION登録
        if($_FILES['pic_name']['name'] != ''){
            $date_str = date('YmdHid');
            $submit_file_name = $date_str . $file_name;
            move_uploaded_file($_FILES['pic_name']['tmp_name'], '../pictures/' .$submit_file_name);
            $_SESSION['edit']['img_name'] = $submit_file_name;
        }

        $_SESSION['edit']['comment'] = $comment;
        $_SESSION['edit']['picture_id'] = $picture_id;

        header('Location: edit_pic_check.php');
        exit();
    }
   





    


 ?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>picture_edit</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="apple-touch-icon" href="apple-touch-icon.png">

  <!-- Font -->
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,700,600italic,700italic,800,800italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="../assets/css/normalize.css">
  <link rel="stylesheet" href="../assets/css/main.css">
  <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/css/animate.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/responsive.css">    
  <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>
      
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
    <?php require('../partial/header.php'); ?>
  </header>

  <!-- 個別に写真を編集する場合 -->
  <?php if(isset($_REQUEST['picture_id'])){ ?>
    <div class="container">
      <form method="POST" action="" enctype="multipart/form-data">
        <div class="row">
          <p>編集</p>
          <img src="../pictures/<?php echo $picture['pic_name']; ?>" alt="" style="display: block; width: 200px;" width="200" border="0" alt="" />
          <br>
          <input type="file" style="margin: auto;" name="pic_name" accept="image/*">
          <textarea name="comment" cols="40" rows="5"><?php echo $picture['comment']; ?></textarea><br>
       	</div>
        <br>
        <input type="hidden" name="edit" value="edit">
        <input type="submit" value="変更確認へ" class="btn btn-info">
        <a href="../travel_dialy.php?dialy_id=<?php echo $picture['dialy_id'] ?>" class="btn btn-primary">旅行記へ戻る</a>
      </form>
  	</div>
  <?php } ?>
  <!-- 写真を追加する場合 -->
  <?php if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'add'){ ?>
  <p>追加</p>

  <?php } ?>
  



    

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
        <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="../assets/js/plugins.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/jquery.mousewheel-3.0.6.pack.js"></script>
        <script src="../assets/js/paralax.js"></script>
        <script src="../assets/js/jquery.smooth-scroll.js"></script>
        <script src="../assets/js/jquery.sticky.js"></script>
        <script src="../assets/js/wow.min.js"></script>
        <script src="../assets/js/main.js"></script>
        
        <!-- カレンダーのJS -->
        <script src="../assets/js/plan_calender.js"></script>
        <!-- プルダウンのJS -->
        <script src="../assets/js/plan_country.js"></script>
        <script src="../assets/js/plan_country2.js"></script>
        <!-- コメントを増やすJS -->
        <script src="../assets/js/plan_comment.js"></script>
        
    
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



 