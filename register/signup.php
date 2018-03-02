<?php
    session_start();

    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';

    $errors = array();

   // $_POSTがからじゃない時
   // ユーザーがフォームの送信ボタンを押した時
    if (!empty($_POST)){
        echo '送信<br>';

        // 変数定義
        $name = $_POST['input_name'];
        $email = $_POST['input_email'];
        $password = $_POST['input_password'];
        // ユーザー名の空チェック
        if ($name == ''){
            $errors['name'] = 'blank';
        }
        // ①emailとpasswordの空チェック
        // ②check.php遷移時に、name,email,passwordをcheck.phpで表示(セッション使用必須)

        if ($email == ''){
            $errors['email'] = 'blank';
        }

        $str_c = strlen($password);
        if ($password == ''){
            $errors['password'] = 'blank';
        } elseif ($str_c < 4 || 16 < $str_c){
            $errors['password'] = 'length';
        }
        // type="files"の情報を送るには$_FILESのスーパーグロバル変数が必要です。
        $file_name = $_FILES['input_img_name']['name'];
        if(!empty($file_name)) {
        // JPG/PNG/GIFの3種類のみに制限
          $file_type = substr($file_name,-3);
          $file_type = strtolower($file_type);

          if ($file_type != 'jpg' && $file_type != 'png' && $file_type != 'gif') {
              $errors['img_name'] = 'type';
          }
        } else {
            $errors['img_name'] = 'blank';
        }
        // バリデーションを通過すれば次のページへ移動
        if (empty($errors)){
            $date_str = date('YmdHis');
            $submit_file_name = $date_str . $file_name;
            move_uploaded_file($_FILES['input_img_name']['tmp_name'], '../user_profile_img/' . $submit_file_name);

            $_SESSION['register']['name'] = $name;
            $_SESSION['register']['email'] = $email;
            $_SESSION['register']['password'] = $password;
            $_SESSION['register']['img_name'] = $submit_file_name;
            // $_SESSION['register'] = $_POST;
            header('Location:check.php');

            exit();
        }
    }
    // echo '<pre>';
    // var_dump($errors);
    // echo '</pre>';
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" href="apple-touch-icon.png">
  <title></title>
  <link rel="stylesheet" type="text/css" href="../assets/css/normalize.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/animate.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" type="text/css" href="../assets/css/style.css"> -->
  <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">

  <link rel="stylesheet" type="text/css" href="../assets/css/signup.css">
</head>
<body>
    <div class="main-menu">
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
              
              <a href="#" class="navbar-brand" style="font-size: 30px;">でれっちょ</a>
            </div>
            
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right">
<!--                  <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#features">Services</a></li>
                <li><a href="#feature-work">Portfolio</a></li>
                <li><a href="#testimonials">Testimonials</a></li> -->
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


    <div class="container">

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
      <form method="POST" action="signup.php" enctype="multipart/form-data" role="form">

      <h2>登録画面 </h2>
      <hr class="colorgraph">
      <div class="form-group">
        <input type="text" name="input_name" id="name" class="form-control input-lg" placeholder="ユーザーネーム" tabindex="3">
          <?php if(isset($errors['name'])){ ?>
            <span style="color: red;">ユーザー名を入力して下さい</span><br>
          <?php } ?>
      </div>
      <div class="form-group">
        <input type="email" name="input_email" id="email" class="form-control input-lg" placeholder="メールアドレス
        " tabindex="4">
          <?php if(isset($errors['email'])){ ?>
            <span style="color: red;">メールアドレスを入力して下さい</span><br>
          <?php } ?>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="password" name="input_password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">
              <?php if(isset($errors['password']) && $errors['password'] == 'blank'){ ?>
                <span style="color: red;">パスワードを入力して下さい</span><br>
              <?php } ?>
              <?php if(isset($errors['password']) && $errors['password'] == 'length'){ ?>
                <span style="color: red;">パスワードは4〜16文字で入力して下さい</span><br>
              <?php } ?>
            <span>プロフィール画像選択</span>
              <input type="file" name="input_img_name" accept="image/*">
              <?php if(isset($errors['img_name']) && $errors['img_name'] == 'blank'){ ?>
                <span style="color: red;">プロフィール画像をを入力して下さい</span><br>
              <?php } ?>
              <?php if(isset($errors['img_name']) && $errors['img_name'] == 'type'){ ?>
                <span style="color: red;">拡張子にはjpg/png/gifのいずれかを入力して下さい</span><br>
              <?php } ?>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6"></div>
      </div>

      <hr class="colorgraph">
      <div class="row">
        <div class="col-xs-12 col-md-6"><input type="submit" value="登録" class="btn btn-lg btn-block btn-primary" tabindex="7"></div>
        <!-- <div class="col-xs-12 col-md-6"><button type="submit" class="btn btn-lg btn-block btn-secondary" tabindex="7">登録</button></div> -->
        <div class="col-xs-12 col-md-6"><a href="#" class="btn btn-success btn-block btn-lg">ログイン</a></div>
      </div>
    </form>
  </div>
</div>

</div><!-- container ends-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3 text-center">
                    <ul class="list-inline">
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-home"></i> Home</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Designed by XeQt for IEM. Copyright © 2014. All Rights Reserved.</p>
                </div>
            </div>
        </div><!--container ends-->
    </footer>
    <hr class="colorgraph colorgraph-footer">

  <script type="text/javascript" src="../assets/js/jquery-3.1.1.js"></script>
  <script type="text/javascript" src="../assets/js/jquery-migrate-1.4.1.js"></script>
  <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
  <script type="text/javascript" src="../assets/js/signup.js"></script>
  <script type="text/javascript" src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>
  <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</body>
</html>