<?php
    session_start();

    require('../dbconnect.php');

    if (!isset($_SESSION['register'])) {
        header('Location: signup.php');
        exit();
    }

  //$_postは生きてるか？
    echo '<pre>';
    echo '$_POST= ';
    var_dump($_POST);
    echo '</pre>';

    echo '<pre>';
    echo '$_SESSION= ';
    var_dump($_SESSION);
    echo '</pre>';

    $name = $_SESSION['register']['name'];
    $email = $_SESSION['register']['email'];
    $password = $_SESSION['register']['password'];
    $img_name = $_SESSION['register']['img_name'];



    // $_POSTがからじゃなければ処理＝ユーザー登録ボタンが押されたら
    if (!empty($_POST)){
        // パスワードのハッシュ化
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        echo $hash_password;
        echo '<br>';

        // STEP2
        $sql = 'INSERT INTO `users` SET`user_name`=?,`email`=?,`password`=?,`img_name`=?,`created`=NOW()';
        // ?の数と配列の数を合わせる
        // プリペアードステイトメント
        $data = array($name, $email, $hash_password, $img_name);
        $stmt = $dbh->prepare($sql);
        $stmt->execute($data);

        // セッションのregisterを削除する(削除)
        $_SESSION['register'] = array();
        unset($_SESSION['register']);

        header('Location: thanks.php');
        exit();
    }
    // STEP3
    $dbh = null;
?>




<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" href="apple-touch-icon.png">
  <title>登録確認ページ</title>
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
              
              <a href="../home.php" class="navbar-brand" style="font-size: 30px;">でれっちょ</a>
            </div>
            
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#signin">ログイン</a></li>
                <li><a href="signup.php">ユーザー登録</a></li>
                <li><a href="#signout">ログアウト</a></li>
                <li><a href="../home.php">マイページ</a></li>
              </ul>
            </div>
            
          </div>
        </div>
      </div>
    </div>


    <div class="container">

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
      <h2>確認画面 </h2>
      <hr class="colorgraph">
      <div class="form-group">
        <!-- <input type="text" name="input_name" id="name" class="form-control input-lg" tabindex="3"> -->
        <p style="font-size: 20px">ユーザー名: <?php echo htmlspecialchars($name); ?></p><br>
        <img src="../user_profile_img/<?php echo htmlspecialchars($img_name); ?>" width="100"><br>
      </div>
      <div class="form-group">
        <!-- <input type="email" name="input_email" id="email" class="form-control input-lg" placeholder="メールアドレス
        " tabindex="4"> -->
        <p style="font-size: 20px">ユーザー名: email: <?php echo htmlspecialchars($email); ?></p><br>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <!-- <input type="password" name="input_password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5"> -->
            <p style="font-size: 20px">パスワード: ●●●●●●●●</p><br>

          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6"></div>
      </div>

      <hr class="colorgraph">
      <div class="row">
        <form method="POST" action="check.php">
          <input type="hidden" name="hoge" value="signal"> // value="signal"をPOST送信でcheck.phpに送信することにより
          <div class="col-xs-12 col-md-6"><a href="signup.php?action=rewrite" class="btn btn-success btn-block btn-lg">戻る</a></div>
          <div class="col-xs-12 col-md-6"><input type="submit" value="ユーザー登録" class="btn btn-lg btn-block btn-primary" tabindex="7"></div>
        </form>
        
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
                            <a href="../home.php"><i class="glyphicon glyphicon-home"></i> Home</a>
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