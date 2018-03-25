<?php 
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    


    session_start();  
    require ('dbconnect.php');
    include('assets/functions.php');
    //include('signin_user.php');
    // echo 'userid = ' . $_SESSION['user']['id'];

    // 投稿表示
    // ①旅行記投稿者のID取得 dailies+users(名前と画像)
    // ②picturesの取得
    // ③tagの取得
    // ④areaの取得 ←いらない
    // 他 $_SESSION['user']['id']と$dialy['user_id']を比較して違ったら、機能を変更する

    //dialy idの取得
    // dialy/id はパラメーターで飛んでくるため。$_REQUESTで取得
    // そのIDを検索する
    $dialy_id = $_REQUEST['dialy_id'];


    //①旅行記
    $sql = 'SELECT `dialies`.*,`users`.user_name,`users`.img_name FROM dialies LEFT JOIN users ON `dialies`.`user_id`=`users`.`user_id` WHERE `dialies`.`dialy_id`=?';
    $data = array($dialy_id);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    $dialy = $stmt->fetch(PDO::FETCH_ASSOC);

    // echo '<pre>'; 
    // echo '$dialy = ';
    // var_dump($dialy);
    // echo '</pre>'; 

    // ②pictures
    $sql = 'SELECT * FROM pictures WHERE dialy_id=?';
    $data = array($dialy_id);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

    while ($picture = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $pictures[] = $picture;
    }
    $count_pics = count($pictures);
    
    // echo '<pre>'; 
    // echo '$pictures = ';
    // var_dump($pictures);
    // echo '</pre>'; 

    // ③タグ
    $sql = 'SELECT `dialies_tags`.*,`tags`.tag_name FROM dialies_tags LEFT JOIN tags ON `dialies_tags`.`tag_id`=`tags`.`tag_id` WHERE `dialies_tags`.`dialy_id`=? ';
    $data = array($dialy_id);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

    while ($tag = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $tags[] = $tag;
    }
    if(!empty($tags)){
        $count_tags = count($tags);
    }
    // echo '<pre>'; 
    // echo '$tags = ';
    // var_dump($tags);
    // echo '</pre>'; 
    
    //いいね機能 ※learnsnsからほぼコピー
    // いいね！データの取得
    // 下のカウントは本人がいいねしているかどうかの確認のため１or０しか入らない
    $sql = 'SELECT COUNT(*) AS cnt FROM likes WHERE `user_id`=? AND `dialy_id`=?';
    $data = array($_SESSION['user']['id'], $dialy_id);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    $like = $stmt->fetch(PDO::FETCH_ASSOC);

    // fav機能 ※likesと全く同じ
    // favデータの取得
    // 下のカウントは本人がいいねしているかどうかの確認のため１or０しか入らない
    $sql = 'SELECT COUNT(*) AS cnt FROM favs WHERE `user_id`=? AND `dialy_id`=?';
    $data = array($_SESSION['user']['id'], $dialy_id);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    $fav = $stmt->fetch(PDO::FETCH_ASSOC);

    
    // コメント機能開始
    // 自分のページでPOST送信されたら
    if (!empty($_POST) && isset($_POST['comment'])) {
        // 変数定義
        $comment = $_POST['comment'];
        // $comment空チェック
        if ($comment != '') {
            $sql = 'INSERT INTO `comments` SET `comment` =?, `user_id` =?, `dialy_id` =?, `created` =NOW() ';
            $data = array($comment,$_SESSION['user']['id'],$dialy_id); //?の中に変数を入れるそれがプリペアードステイトメント
            $stmt = $dbh->prepare($sql);
            $stmt->execute($data);
        }
    }

    //コメントデータを全件取得
    $sql = 'SELECT comments.*, users.user_name,users.img_name FROM comments LEFT JOIN users ON comments.user_id =users.user_id WHERE dialy_id =? ORDER BY comments.created ASC ';
    $data = array($dialy_id);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    //fetchする
    $comments = array();

    //省略形
    while ($comment = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $comments[] = $comment;
    }
    $c_count = count($comments);
    // echo '<pre>'; 
    // echo '$comments = ';
    // var_dump($comments);
    // echo '</pre>'; 




?>

<!doctype html>
<html class="no-js" lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>diary</title>
    <meta name="description">
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
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/search.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/travel_dialy.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!--- Include the above in your HEAD tag -->
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<!--- Include the above in your HEAD tag -->

	</head>

	<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

	<!-- Header start -->
	<header>
		<?php Include('partial/header.php'); ?>
	</header>
    <br>
	<!-- Header end -->

		<!-- Single Blog1 -->
		<section id="about" class="site-padding">
			<div class="container ">
				<div class="row">
          <!-- タイトル -->
					<div class="col-sm-6 center">
						<div class="title">
							<h2> <?php echo $dialy['title']; ?></h2>
              <h4><?php echo $dialy['depart_date']; ?>~<?php echo $dialy['arrival_date']; ?></h4>
              <hr>
						</div>
					</div>
          <!-- ユーザー情報 -->

          <div class="col-sm-3">
              <div class="span4 well">
                  <div class="user_profile">
                    <a href="http://critterapp.pagodabox.com/others/admin" class="thumbnail" ><img src="user_profile_img/<?php echo $dialy['img_name']; ?> "></a>
                  </div>
              </div>
          </div>
          <div class="col-sm-3">
            <div class="span3">
              <p><strong>名前</strong></p>
              <h4><?php echo $dialy['user_name']; ?></h4>
            </div>
          </div>
          
				</div>
			</div>

            <!-- 概要 -->
			<div class="container">
				<div id="popup-background">
					<div class="col-sm-6" >
						<div class="about-image wow fadeInLeft">
							<img id="lb" src="title_img/<?php echo $dialy['title_img_name']; ?>" alt="Single Blog1" />
							<!-- ポップアップ用の背景とimg -->
						</div>
					</div>
					<div class="col-sm-6">
						<div class="about-text wow fadeInRight">
							<p><?php echo $dialy['title_comment'] ?>
							</p>
							<!-- <a href="#" class="btn btn-read-more">続きを読む</a> -->
						</div>
					</div>
				</div>
			</div>
            <!-- 概要終了 -->
		</section>
      <div class="container">
        <div class="row">
          <div class="like col-sm-12">
            <ul>

                <!-- いいね機能 -->
                <li>
                  <form method="POST" action="dialy/likes.php"> 
                  <input type="hidden" name="dialy_id" value="<?php echo $dialy_id ?>"> 
                    <!-- 後で$_REQUESTに変更する -->
                    <a href="javascript:void(0)" >
                      <?php if ($like['cnt'] == 0) { ?>
                        <input type="hidden" name="btn" value="like">
                        <button class="btn btn-primary" type="submit">
                        <i class="fa fa-thumbs-up"></i>
                        <span>いいね</span></button>
                      <?php }else{ ?>
                        <input type="hidden" name="btn" value="unlike">
                        <button class="btn btn-primary" type="submit">
                        <i class="fa fa-thumbs-up"></i>
                        <span>いいねを取り消す</span></button>
                      <?php } ?>
                    </a>
                  </form>  
                </li>
                <!-- いいね機能終了 -->

                <!-- favボタン -->
                <li>
                  <form method="POST" action="dialy/favs.php"> 
                  <input type="hidden" name="dialy_id" value="<?php echo $dialy_id ?>">
                    <a href="javascript:void(0)" title="Send this to friends or post it to your timeline">
                      <?php if ($fav['cnt'] == 0) { ?>
                        <input type="hidden" name="btn" value="fav">
                        <button class="btn btn-success" type="submit">
                        <i class="fa fa-thumb-tack" style="color: #FFFFFF"></i>
                        <span style="color: #FFFFFF;">クリップ</span>
                      <?php }else{ ?>
                        <input type="hidden" name="btn" value="unfav">
                        <button class="btn btn-success" type="submit">
                        <i class="fa fa-thumb-tack" style="color: #FFFFFF"></i>
                        <span style="color: #FFFFFF;">クリップを取り消す</span>
                      <?php } ?>
                    </a>
                  </form>
                </li>
                <!-- favボタン -->
            </ul>
          </div>
          <!-- like end -->

          <!-- tag start -->
          <!-- tagが未定義んｐ旅行記があるためif追加 -->
          <?php if(!empty($tags)){ ?>
            <div class="tag col-sm-12">
                <ul>
                  <?php for($y=0;$y<$count_tags;$y++){ ?>
                    <li><a href="#">＊<?php echo $tags[$y]['tag_name']; ?></a></li>
                  <?php } ?>
                </ul>  
            </div>
          <?php } ?>
          <!-- tag end -->
        </div>
      </div>

        <!--single dialy start-->
        <?php for($x=0;$x<$count_pics;$x++){ ?>
          <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff" class="bg_color">
              <tr>
                  <td align="center">
                      <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">
                          <tr>
                              <td align="center" class="section-img">
                                <!-- 写真 -->
                                  <a href="" style=" border-style: none !important; display: block; border: 0 !important;"><img src="pictures/<?php echo $pictures[$x]['pic_name']; ?>" alt="" style="display: block; width: 800px;" width="800" border="0" alt="" /></a>
                              </td>
                          </tr>
                          <tr>
                              <td height="20" style="font-size: 20px; line-height: 20px;"> </td>
                          </tr>
                          <tr>
                              <td align="center" style="color: #343434; font-size: 24px; font-family: Quicksand, Calibri, sans-serif; font-weight:700;letter-spacing: 3px; line-height: 35px;"
                                  class="main-header">
                                  <div style="line-height: 35px">
                                      <!-- NEW IN <span style="color: #5caad2;">NOVEMBER</span> -->
                                  </div>
                              </td>
                          </tr>
                          <tr>
                              <td height="10" style="font-size: 10px; line-height: 10px;"> </td>
                          </tr>
                          <tr>
                              <td align="center">
                                  <table border="0" width="40" align="center" cellpadding="0" cellspacing="0" bgcolor="eeeeee">
                                      <tr>
                                          <td height="2" style="font-size: 2px; line-height: 2px;"> </td>
                                      </tr>
                                  </table>
                              </td>
                          </tr>
                          <tr>
                              <td height="20" style="font-size: 20px; line-height: 20px;"> </td>
                          </tr>
                          <tr>
                              <td align="center">
                                  <table border="0" width="400" align="center" cellpadding="0" cellspacing="0" class="container590">
                                      <tr>
                                          <td align="center" style="font-size: 16px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;">
                                              <div style="line-height: 24px">
                                                <!-- 写真のコメント -->
                                                <?php echo $pictures[$x]['comment']; ?><br>
                                              </div>
                                          </td>
                                      </tr>
                                  </table>
                              </td>
                          </tr>
                          <tr>
                              <td height="25" style="font-size: 25px; line-height: 25px;"> </td>
                          </tr>
                          <tr>
                              <td align="center">
                                  <table border="0" align="center" width="160" cellpadding="0" cellspacing="0" bgcolor="5caad2" style="">
                                      <tr>
                                          <td height="10" style="font-size: 10px; line-height: 10px;"> </td>
                                      </tr>
                                      <tr>
                                          <td align="center" style="color: #ffffff; font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 26px;">
                                              <div style="line-height: 26px;">
                                                  <a href="" style="color: #ffffff; text-decoration: none;">SHOP NOW</a>
                                                  <!-- 後でif文追加 -->
                                                  <a href="dialy/edit_pic.php?picture_id=<?php echo $pictures[$x]['picture_id']; ?>" class="btn btn-info">投稿写真編集</a>
                                              </div>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td height="10" style="font-size: 10px; line-height: 10px;"> </td>
                                      </tr>
                                  </table>
                              </td>
                          </tr>
                      </table>
                  </td>
              </tr>
              <tr class="hide">
                  <td height="25" style="font-size: 25px; line-height: 25px;"> </td>
              </tr>
              <tr>
                  <td height="40" style="font-size: 40px; line-height: 40px;"> </td>
              </tr>
          </table>
        <?php } ?>

        <!-- いいねfav -->
        <div class="container">
          <div class="row">
            <div class="like col-sm-12" style="text-align: center;">
              <ul>
                  <!-- いいね機能 -->
                  <li>
                    <form method="POST" action="dialy/likes.php"> 
                    <input type="hidden" name="dialy_id" value="<?php echo $dialy_id ?>"> 
                      <!-- 後で$_REQUESTに変更する -->
                      <a href="javascript:void(0)" >
                        <?php if ($like['cnt'] == 0) { ?>
                          <input type="hidden" name="btn" value="like">
                          <button class="btn btn-primary" type="submit">
                          <i class="fa fa-thumbs-up"></i>
                          <span>いいね</span></button>
                        <?php }else{ ?>
                          <input type="hidden" name="btn" value="unlike">
                          <button class="btn btn-primary" type="submit">
                          <i class="fa fa-thumbs-up"></i>
                          <span>いいねを取り消す</span></button>
                        <?php } ?>
                      </a>
                    </form>  
                  </li>
                  <!-- いいね機能終了 -->

                  <!-- favボタン -->
                  <li>
                    <form method="POST" action="dialy/favs.php"> 
                    <input type="hidden" name="dialy_id" value="<?php echo $dialy_id ?>">
                      <a href="javascript:void(0)" title="Send this to friends or post it to your timeline">
                        <?php if ($fav['cnt'] == 0) { ?>
                          <input type="hidden" name="btn" value="fav">
                          <button class="btn btn-success" type="submit">
                          <i class="fa fa-thumb-tack" style="color: #FFFFFF"></i>
                          <span style="color: #FFFFFF;">クリップ</span>
                        <?php }else{ ?>
                          <input type="hidden" name="btn" value="unfav">
                          <button class="btn btn-success" type="submit">
                          <i class="fa fa-thumb-tack" style="color: #FFFFFF"></i>
                          <span style="color: #FFFFFF;">クリップを取り消す</span>
                        <?php } ?>
                      </a>
                    </form>
                  </li>
                  <!-- favボタン終了 -->

                  <!-- 写真編集ボタン -->
                  <li>
                    <a href="dialy/edit_pic.php?action=add" class="btn btn-warning">投稿写真追加</a>
                  </li>
              </ul>
            </div>
          </div>
        </div>
          <!-- like end -->


      
        <div class="contact">
          <div class="container">
            <div class="row">
              <!--  グリッド機能は row の中を１２個に分ける -->
              <div class="col-sm-9">
                <h4>この旅に関するコメントを入力する</strong></h4>
                <form id="contactform" action="" method="post" class="validateform" name="send-contact">
                  <div class="row">
                    <div class="col-lg-9 margintop10 field">
                      <textarea rows="12" name="comment" class="input-block-level" data-rule="required" data-msg="Please write something"></textarea>
                      <div class="validation">
                      </div>
                      <br>
                      <p>
                        <button class="btn btn-theme margintop10 " type="submit">コメントする</button>
                      </p>                      
                    </div>
                    <!-- コメント表示開始 -->
                    <div class="col-sm-3">
                      <?php for($i=0;$i<$c_count;$i++){ ?>          
                        <div>
                          <h6>コメント<?php echo $i+1 ?> </h6>
                          <img src="user_profile_img/<?php echo $comments[$i]['img_name']; ?> " width="60">
                          <?php echo $comments[$i]['user_name'] ?><br>
                          <br>
                          <?php echo $comments[$i]['comment'] ?>
                          <br>
                          <?php if($comments[$i]['user_id'] == $_SESSION['user']['id']){ ?>
                            <a href="dialy/delete_comment.php?comment_id=<?php echo $comments[$i]['comment_id']; ?>&dialy_id=<?php echo $_REQUEST['dialy_id']; ?>" class="btn btn-danger btn-xs">削除</a>
                          <?php } ?>
                          <br>
                          <?php echo $comments[$i]['created'] ?>
                          <br>
                        </div>
                        <hr>
                      <?php } ?>
                    </div>
                    <!-- コメント表示終了 -->
                  </div>
                </form>
              </div>
            </div>
           
          </div>
        </div>
      
        
      

		<!-- search start -->
		<?php Include('partial/search_bar.php'); ?>
		<!-- search end -->

    <?php Include('partial/home_theme.php'); ?>
    <!--  -->

		<!-- Featured Work -->
		

		<!-- Contact -->
		<section id="contact-us">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="title">
							<h3>連絡 <span>はこちらへ</span></h3>
						</div>
					</div>
				</div>
			</div>
		
			<div class="map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14608.272959726353!2d90.38896245!3d23.744945849999997!3m2!1i1024!2i768!4f13.1!4m3!3e1!4m0!4m0!5e0!3m2!1sen!2sbd!4v1465238371126" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		
			<div class="contact">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<h4>どんなことでもお気軽にご連絡ください</strong></h4>
							<form id="contactform" action="" method="post" class="validateform" name="send-contact">
								<div class="row">
									<div class="col-lg-4 field">
										<input type="text" name="name" placeholder="* お名前" data-rule="maxlen:4" data-msg="Please enter at least 4 chars" />
										<div class="validation">
										</div>
									</div>
									<div class="col-lg-4 field">
										<input type="text" name="email" placeholder="* メールアドレス" data-rule="email" data-msg="Please enter a valid email" />
										<div class="validation">
										</div>
									</div>
									<div class="col-lg-4 field">
										<input type="text" name="subject" placeholder="内容について" data-rule="maxlen:4" data-msg="Please enter at least 4 chars" />
										<div class="validation">
										</div>
									</div>
									<div class="col-lg-12 margintop10 field">
										<textarea rows="12" name="message" class="input-block-level" placeholder="* ご用件をこちらへご記入ください" data-rule="required" data-msg="Please write something"></textarea>
										<div class="validation">
										</div>
										<p>
											<button class="btn btn-theme margintop10 pull-left" type="submit">送信</button>
											
										</p>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>		
		<!-- Contact -->
		
		
		<!-- footer -->
		
		<footer>
			<div class="container">
				<div class="row">
				
					<!-- Single Footer -->
					<div class="col-sm-6">
						<div class="single-footer">
							<div class="footer-logo">
								<!-- <a href="#" class="mod_dropnavi-brand"><h1>でれっちょ</h1></a> -->
								<a href="#"><h1>でれっちょ</h1></a>
									<p>旅行コミュニティサイト(旅行記・旅行SNS)</p>
						</div>
					</div>
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
									<!-- <li><a href="#">Pricing</a></li> -->
									<!-- <li><a href="#">Blog</a></li> -->
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
        <script src="assets/js/mochimaru_img.js"></script>
        
		
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
