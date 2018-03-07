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
                <li><a href="signin">ログイン</a></li>
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
      <form method="POST" action="signup.php" enctype="multipart/form-data" role="form">

      <h2>登録完了 </h2>
      <hr class="colorgraph">
      <div class="form-group">
        <h2>登録ありがとうございます。</h2><br>
        <h2>以下よりログインください。</h2>


      </div>
      <div class="form-group">
        
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6"></div>
      </div>

      <hr class="colorgraph">
      <div class="row">
        <form method="POST" action="check.php">
          <input type="hidden" name="hoge" value="huga">
          <div class="col-xs-12 col-md-6"><a href="../signin.php" class="btn btn-success btn-block btn-lg">ログイン</a></div>
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