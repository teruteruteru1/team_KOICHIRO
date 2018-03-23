	<!-- Header Start -->
<!-- 	<header id="home"> -->

<?php 
		// サインインユーザー取得
    $sql = 'SELECT * FROM `users` WHERE `user_id`=?';
    $data = array($_SESSION['user']['id']);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

    $signin_user = $stmt->fetch(PDO::FETCH_ASSOC);

    
    


?>
		<div class="main-menu">
  		<div class="navbar-wrapper">
				<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    			<div class="container">
    				<!-- <div class="row"> -->
            		<div class="navbar-header">
		              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		                <span class="sr-only">Toggle Navigation</span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		              </button>


              		<a href="home.php" class="navbar-brand" style="font-size: 40px;">でれっちょ</a>
		            </div>

              <div class="navbar-collapse collapse">
	              <ul class="nav navbar-nav navbar-right">

		              <li><a href="signin.php">ログイン</a></li>
		              <li><a href="register/signup.php">ユーザー登録</a></li>
		              <li><a href="signout.php">ログアウト</a></li>
		              <?php if(isset($_SESSION['user']['id'])){ ?>
			              <li class="dropdown">
				              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">マイページ<span class="caret"></span></a>
				              <ul class="dropdown-menu">
				                <li><a href="#">クリップ</a></li>
				                <!-- <li><a href="plan_form.php">しおり入力</a></li> -->
				                <li><a href="dialy_form.php">投稿記作成</a></li>
				                <li><a href="#">自投稿閲覧</a></li>
				              </ul>
		            		</li>
		            		<li><a style="font-size: 20px"><?php echo $signin_user['user_name']; ?></a></li>
		            		<!-- <li><a><img src="user_profile_img/<?//php echo $user['img_name']; ?>" width="100" height="100"></a></li> -->
		            	<?php } ?>
         				</ul>
        			</div>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
	<!-- Header End -->

