<?php
    session_start();

    // もしセッションにユーザーのIDが存在すれば
    if (isset($_SESSION['user']['id'])) {
        header('Location: home.php');
        exit();
    }

    require('dbconnect.php');

    // echo '<pre>';
    // echo '$_POST = ';
    // var_dump($_POST);
    // echo '</pre>';

    // echo '<pre>';
    // echo '$_SESSION = ';
    // var_dump($_SESSION);
    // echo '</pre>';

    $errors = array();


    // 送信ボタンが押されたとき発動（$_POSTが空じゃないとき）
    if (!empty($_POST)) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // $emailが空じゃない且つ$passwordが空じゃないとき

        if ($email == ''){
            $errors['email'] = 'blank';
        }
        if ($password == ''){
            $errors['password'] = 'blank';
        }

        if ($email != '' && $password != '') {
            $sql = 'SELECT * FROM `users` WHERE `email`=?';
            $data = array($email);
            $stmt = $dbh->prepare($sql);
            $stmt->execute($data);

            $record = $stmt->fetch(PDO::FETCH_ASSOC);
            // echo '<pre>';
            // echo '$record = ';
            // var_dump($record);
            // echo '</pre>';

            if ($record == false) {

            } else {
                // パスワードが一致しているとき
                // echo $record['password'];
                // echo '<br>';
                // echo $password;
                // echo '<br>';
                // password_verify(普通文字列パスワード, ハッシュ文字列パスワード);
                // 一致してればtrueを、そうでなければfalseを返す
                $verify = password_verify($password, $record['password']);

                if ($verify == true) {
                    // サインイン処理

                    // ①セッションにサインインユーザーのidを保存
                    $_SESSION['user']['id'] = $record['id'];

                    // header('Location: timeline.php');
                    header('Location: home.php');
                    exit();

                    // ②timeline.phpに遷移
                    // ③timeline.phpを作成
                    // ④サインインユーザーの情報表示
                    // ⑤もしサインインせずにtimeline.phpをロードした場合はsignin.phpへ強制遷移
                }else {
                  $errors['password'] = 'wrong';
                }
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" href="apple-touch-icon.png">
  <title></title>
  <link rel="stylesheet" type="text/css" href="assets/css/normalize.css">
  <link rel="stylesheet" type="text/css" href="assets/css/main.css">
  <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

  <link rel="stylesheet" type="text/css" href="assets/css/signup.css">
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
                <li><a href="signin.php">ログイン</a></li>
                <li><a href="register/signup.php">ユーザー登録</a></li>
                <li><a href="#signout">ログアウト</a></li>
                <li><a href="home.php">マイページ</a></li>
              </ul>
            </div>
            
          </div>
        </div>
      </div>
    </div>


    <div class="container">

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
      <form method="POST" action="signin.php" enctype="multipart/form-data" role="form">

      <h2>ログイン </h2>
      <hr class="colorgraph">

      <div class="form-group">
        <input type="email" name="email" id="email" class="form-control input-lg" placeholder="メールアドレス
        " tabindex="4">
          <?php if(isset($errors['email'])){ ?>
            <span style="color: red;">メールアドレスを入力して下さい</span><br>
          <?php } ?><br>
        <br><br><input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">
            <?php if(isset($errors['password']) && $errors['password'] == 'blank'){ ?>
              <span style="color: red;">パスワードを入力して下さい</span><br>
            <?php } ?>
            <?php if(isset($errors['password']) && $errors['password'] == 'wrong'){ ?>
              <span style="color: red;">パスワード、またはメールアドレスが間違っています。</span><br>
            <?php } ?>

      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
           
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6"></div>
      </div>

      <hr class="colorgraph">
      <div class="row">
        <div class="col-xs-12 col-md-6"><input type="submit" value="ログイン" class="btn btn-lg btn-block btn-primary" tabindex="7"></div>
        <!-- <div class="col-xs-12 col-md-6"><button type="submit" class="btn btn-lg btn-block btn-secondary" tabindex="7">登録</button></div> -->
        <div class="col-xs-12 col-md-6"><a href="register/signup.php" class="btn btn-success btn-block btn-lg">新規登録</a></div>
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

  <script type="text/javascript" src="assets/js/jquery-3.1.1.js"></script>
  <script type="text/javascript" src="assets/js/jquery-migrate-1.4.1.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.js"></script>
  <script type="text/javascript" src="assets/js/signup.js"></script>
  <script type="text/javascript" src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
  <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</body>
</html>