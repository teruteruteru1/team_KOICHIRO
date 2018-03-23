<?php

    session_start();
    require('dbconnect.php');

    $sql = 'SELECT d.*,p.pic_name FROM dialies AS d LEFT JOIN pictures AS p ON d.dialy_id = p.dialy_id WHERE 1 ORDER BY d.like_count DESC';

    $data = array();
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

    $tmp_dialies = array();

    while (true) {
        $dialy = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($dialy == false) {
            break;
        }
        $tmp_dialies[] = $dialy;

    }
    // echo $sql;

    $tmp = [];
    $dialies = [];

    foreach ($tmp_dialies as $daily){
        if (!in_array($daily['dialy_id'], $tmp)) {
            $tmp[] = $daily['dialy_id'];
            $dialies[] = $daily;
        }
    }

    $c = count($dialies);

    // echo '<pre>';
    // echo '$dialies = ';
    // var_dump($dialies);
>>>>>>> master
    // echo '</pre>';

?>

<!doctype html>
<html class="no-js" lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

    <!-- Font -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,700,600italic,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- Font -->

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/search.css">
    <link rel="stylesheet" href="assets/css/header.css">

    <!-- Include the above in your HEAD tag -->
		<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<!-- Include the above in your HEAD tag -->

	</head>

	<body style="margin-top: 80px;">

		<!-- Header start -->
		<header>
			<?php Include('partial/header.php'); ?>
		</header>
		<!-- Header end -->

		<!-- top Blog -->
		<div class="slider">
			<div id="fawesome-carousel" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators indicatior2">
					<li data-target="#fawesome-carousel" data-slide-to="0" class="active"></li>
					<li data-target="#fawesome-carousel" data-slide-to="1"></li>
				</ol>

				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img src="title_img/<?php echo htmlspecialchars($dialies[0]['title_img_name']); ?>" alt="Sider Big Image">
						<div class="carousel-caption">
							<h1 class="wow fadeInLeft"><?php echo htmlspecialchars($dialies[0]['title']); ?></h1>
							<div class="slider-btn wow fadeIn">
								<a href="travel_dialy.php?dialy_id=<?php echo htmlspecialchars($dialies[0]['dialy_id']); ?>" class="btn btn-learn">詳細をみる</a>
							</div>
						</div>
					</div>
					<div class="item">
						<img src="pictures/<?php echo htmlspecialchars($dialies[0]['pic_name']); ?>" alt="Top Blog1 Image">
						<div class="carousel-caption">
							<h1 class="wow fadeInLeft"><?php echo htmlspecialchars($dialies[0]['title']); ?></h1>
							<div class="slider-btn wow fadeIn">
								<a href="travel_dialy.php?dialy_id=<?php echo htmlspecialchars($dialies[0]['dialy_id']); ?>" class="btn btn-learn">詳細をみる</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Top Blog End -->

		<!-- search start -->
		<?php Include('partial/search_bar.php'); ?>
		<!-- search end -->

		<!-- Single Blog1 -->
		<section id="about" class="site-padding">
			<div class="container search_result">
				<div class="row">
					<div class="col-sm-6">
						<div class="about-image wow fadeInLeft">
							<img src="pictures/<?php echo htmlspecialchars($dialies[1]['title_img_name']); ?>" alt="Single Blog1" width="600" height="400"/>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="about-text wow fadeInRight">
							<h3><?php echo htmlspecialchars($dialies[1]['title']); ?></h3>
							<p><?php echo htmlspecialchars($dialies[1]['title_comment']); ?></p>
							<a href="travel_dialy.php?dialy_id=<?php echo htmlspecialchars($dialies[1]['dialy_id']); ?>" class="btn btn-read-more">続きを読む</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Single Blog1 end -->

		<!-- From the Blog-->
		<section id="blog" class="site-padding">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="title">
							<h3>Latest From The <span>Blog</span></h3>
						</div>
					</div>
				</div>

				<div class="row">

					<!-- Single Blog2 -->
					<div class="col-sm-4">
						<div class="single-blog search_result">
							<img src="pictures/<?php echo htmlspecialchars($dialies[2]['title_img_name']); ?>" alt="Single Blog2" width="400" height="270"/>
							<h4><a href="travel_dialy.php?dialy_id=<?php echo htmlspecialchars($dialies[2]['dialy_id']); ?>"><?php echo htmlspecialchars($dialies[2]['title']); ?></a></h4>
							<p><?php echo htmlspecialchars($dialies[2]['title_comment']); ?></p>
							<a href="travel_dialy.php?dialy_id=<?php echo htmlspecialchars($dialies[2]['dialy_id']); ?>">続きを読む>></a>
						</div>
					</div>
					<!-- Single Blog2 -->

					<!-- Single Blog3 -->
					<div class="col-sm-4">
						<div class="single-blog search_result">
							<img src="pictures/<?php echo htmlspecialchars($dialies[3]['title_img_name']); ?>" alt="Single Blog3" width="400" height="270"/>
							<h4><a href="travel_dialy.php?dialy_id=<?php echo htmlspecialchars($dialies[3]['dialy_id']); ?>"><?php echo htmlspecialchars($dialies[3]['title']); ?></a></h4>
							<p><?php echo htmlspecialchars($dialies[3]['title_comment']); ?></p>
							<a href="travel_dialy.php?dialy_id=<?php echo htmlspecialchars($dialies[3]['dialy_id']); ?>">続きを読む>></a>
						</div>
					</div>
					<!-- Single Blog3 -->

					<!-- Single Blog4 -->
					<div class="col-sm-4">
						<div class="single-blog search_result">
							<img src="pictures/<?php echo htmlspecialchars($dialies[4]['title_img_name']); ?>" alt="Single Blog4" width="400" height="270"/>
							<h4><a href="travel_dialy.php?dialy_id=<?php echo htmlspecialchars($dialies[4]['dialy_id']); ?>"><?php echo htmlspecialchars($dialies[4]['title']); ?></a></h4>
							<p><?php echo htmlspecialchars($dialies[4]['title_comment']); ?></p>
							<a href="travel_dialy.php?dialy_id=<?php echo htmlspecialchars($dialies[4]['dialy_id']); ?>">続きを読む>></a>
						</div>
					</div>
					<!-- Single Blog4 -->
				</div>
			</div>
		</section>
		<!-- From the Blog-->

		<?php Include('partial/home_theme.php'); ?>

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
			<!-- プルダウンのJS -->
        <script src="assets/js/plan_country.js"></script>
        <script src="assets/js/plan_country2.js"></script>

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
