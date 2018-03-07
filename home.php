<?php ?>

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
		
		
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/search.css">

    <!-- <link rel="stylesheet" href="assets/css/header.css"> -->
    <!------ Include the above in your HEAD tag ---------->
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<!------ Include the above in your HEAD tag ---------->

	</head>

	<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

	<!-- Header Start -->
	<header id="home">
		<div class="main-menu">
			
      <div class="navbar-wrapper">
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <div class="container">
          	<div class="row">
							<div class="col-sm-6">
            		<div class="navbar-header">
		              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		                <span class="sr-only">Toggle Navigation</span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		              </button>

              		<a href="#" class="navbar-brand" style="font-size: 40px;">でれっちょ</a>             
		            </div>          
	            </div>
			            
	            <!-- <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right"> -->

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
	              <li class="dropdown">

		              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">マイページ<span class="caret"></span></a>
		              <ul class="dropdown-menu">
		                <li><a href="#">クリップ</a></li>
		                <li><a href="#">しおり入力</a></li>
		                <li><a href="#">投稿記作成</a></li>
		                <li><a href="#">自投稿閲覧</a></li>
		              </ul>
            		</li>
         				</ul>
        			</div>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- Main Menu End -->
			
		<!-- top Blog -->
		<div class="slider">
			<div id="fawesome-carousel" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators indicatior2">
					<li data-target="#fawesome-carousel" data-slide-to="0" class="active"></li>
					<li data-target="#fawesome-carousel" data-slide-to="1"></li>
				</ol>
			 
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img src="assets/img/add_img/Top_Blog1_P9172109.jpg" alt="Sider Big Image">
						<div class="carousel-caption">
							<h1 class="wow fadeInLeft">イタリア旅行 おすすめスポット 2泊3日</h1>
							<div class="slider-btn wow fadeIn">
								<a href="#" class="btn btn-learn">詳細をみる</a>
							</div>
						</div>
					</div>
					<div class="item">
						<img src="assets/img/add_img/Top_Blog2_IMG_7607.jpg" alt="Top Blog1 Image">
						<div class="carousel-caption">
							<h1 class="wow fadeInLeft">【イタリア】ベネチアのカラフルな姉妹島「ブラーノ」と「ムラーノ」</h1>
							<div class="slider-btn wow fadeIn">
								<a href="#" class="btn btn-learn">詳細をみる</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Top Blog End -->
			
		</header>
		<!-- Header End -->

		<!-- surch start -->
		<br> <!-- 仮処置 -->
		<div class="container" id="wrap">
	  	<div class="row">
        <div class="col-md-6 col-md-offset-3">
          <form action="r" method="post" accept-charset="utf-8" class="form" role="form">   
            <!-- 	<legend></legend> -->

            	<!-- <div class="container"> -->
								<!-- <div class="row"> -->
									<h2>旅行記検索</h2>
							        
							        <!-- <form class="classNameHere" role="search"> -->
							    	<div class="input-group">
											<input type="text" class="form-control" placeholder="キーワード検索：『エリア』+『目的』など" name="srch-term" id="srch-term">
												<div class="input-group-btn">
													<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
												</div>
										</div>
										<br>
									<h4>詳細検索</h4>

									<!-- </form> -->
							        
							        
<!-- 								</div>
							</div> -->
<!-- 									<div class="col-sm-12">
										<div class="single-footer">
											<form action="">
												<div class="form-group"> -->
													<!-- <center><input type="email" class="form-control my-form" id="exampleInputEmail1" placeholder="キーワード検索"></center> -->

												<!-- </div>
											</form>
										</div>
									</div> -->
					<!-- country start -->
                    <div class="row">
                        <div class="col-xs-5 col-md-5">
                            <!-- <input type="text" name="firstname" value="" class="form-control input-lg" placeholder="First Name"  />  -->                       
						        			<select name="country"　value="" class="form-control input-md" >
									            <option value="Japan" selected="selected" class="msg">国を選択して下さい</option>
									            <option value="Japan" class="japan">日本</option>
									            <option value="America" class="America">アメリカ</option>
									            <option value="Australia" class="Australia">オーストラリア</option>
									        </select>
								        </div>
		        	<!-- country end -->



								        <!-- city start -->
								        <div class="col-xs-5 col-md-5">
                            <!-- <input type="text" name="lastname" value="" class="form-control input-lg" placeholder="Last Name"  /> -->                        
									        <select name="city"　value="" class="form-control input-md" >
									            <option value="Japan" selected="selected" class="msg">都市を選択して下さい</option>
									            <option value="Tokyo" class="japan">東京</option>
									            <option value="Kyoto" class="japan">京都</option>
									            <option value="Osaka" class="japan">大阪</option>
									            <option value="NY" class="America">ニューヨーク</option>
									            <option value="LA" class="America">ロサンゼルス</option>
									            <option value="Sydney" class="Australia">シドニー</option>
									        </select>
								        </div>
								        <div class="col-md-2">
	                        <button type="submit" class="btn btn-default btn-primary">探す</button>
	                      </div>
								        <!-- city end -->

                    </div>

                    <!-- season start -->
                    <!-- <input type="text" name="email" value="" class="form-control input-lg" placeholder="Your Email"  /> -->
                    <div class="col-xs-9 col-md-9">
							        <select name="season" value="" class="form-control input-md">
							            <option value="season" selected="selected" class="msg">季節を選択して下さい</option>
							            <option value="spring" class="spring">春</option>
							            <option value="summer" class="summer">夏</option>
							            <option value="autumn" class="autumn">秋</option>
							            <option value="winter" class="winter">冬</option>
							        </select>
						        </div>
						        		<div class="col-md-2">
	                        <button type="submit" class="btn btn-default btn-primary">探す</button>
	                      </div>

						        <!-- season end -->

						        <!-- budget start -->
                    <!-- <input type="password" name="password" value="" class="form-control input-lg" placeholder="Password"  /> -->
                    <div class="col-xs-9 col-md-9">
	                    <select name="budget" class="form-control input-md">
							            <option value="budget" selected="selected" class="msg">予算を選択して下さい</option>
							            <option value="1" class="1"> ~1000円</option>
							            <option value="2" class="2"> 1001~10000</option>
							            <option value="3" class="3"> 10001~20000</option>
							            <option value="4" class="4"> 20001~30000</option>
							            <option value="5" class="5"> 30001~</option>
							        </select>
										</div>
											<div class="col-md-2">
										    <button type="submit" class="btn btn-default btn-primary">探す</button>
										  </div>
						        <!-- budget end -->

						        <!-- theme start -->
                    <!-- <input type="password" name="confirm_password" value="" class="form-control input-lg" placeholder="Confirm Password"  />  -->
                    <div class="col-xs-9 col-md-9">
	                    <select name="budget" class="form-control input-md">
							            <option value="theme" selected="selected" class="msg">目的を選択して下さい</option>
							            <option value="gourmet" class="1"> グルメ</option>
							            <option value="sightseeing" class="sightseeing">観光</option>
							            <option value="shopping" class="shopping">ショッピング</option>
							            <option value="sport_outdoor" class="sport_outdoor">スポーツ・アウトドア</option>
							            <option value="hotel" class="hotel">ホテル</option>
							            <option value="relaxation" class="relaxation">リラクゼーション</option>
							            <option value="resort" class="resort">リゾート</option>
							            <option value="ather" class="ather">その他</option>
							        </select> 
						        </div>
											<div class="col-md-2">
										    <button type="submit" class="btn btn-default btn-primary">探す</button>
										  </div> 
						        <!-- theme end -->
                   
                     <!-- <label>Gender : </label>                    <label class="radio-inline">
                        <input type="radio" name="gender" value="M" id=male />                        Male
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="gender" value="F" id=female />                        Female
                    </label>
                    <br />
              <span class="help-block">By clicking Create my account, you agree to our Terms and that you have read our Data Use Policy, including our Cookie Use.</span> -->
              			<div class="col-md-4">
                    <button class="btn btn-md btn-primary btn-block signup-btn" type="submit">探す</button>
                    </div>
            </form>          
          </div>
		</div>            
	</div>
</div>

		<!-- Single Blog1 -->
		<section id="about" class="site-padding">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="about-image wow fadeInLeft">
							<img src="assets/img/add_img/Single-Blog1-P9172057.jpg" alt="Single Blog1" />
						</div>
					</div>
					<div class="col-sm-6">
						<div class="about-text wow fadeInRight">
							<h3>2017.9 イタリア旅行記</h3>
							<p>いよいよ今回のイタリア旅行記も、最終回を迎えることになった。もう一度、出発までの顛末や計画も書いておこう。
								今から35年ほど前に仕事でミラノに出張した際に、週末の空き時間を利用してベネツィア・フィレンツェに
								一泊二日で出掛けたことがある。
								また、その数年前に女房と一緒にヨーロッパ旅行をした時に、ローマで一日だけ観光を行った。
								ただ、そのいずれもが随分昔のことであり、短時間立ち寄っただけであり、今のデジカメの時代と違って余り写真も残っていない。
								ましてや、出張の時にはカメラを持参していたかどうかも定かでない。
							</p>
							<a href="#" class="btn btn-read-more">続きを読む</a>
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
						<div class="single-blog">
							<img src="assets/img/add_img/Single_Blog2_1518359667602.jpg" alt="Single Blog2" />
							<h4><a href="blog.html">セブ　カワサンフォールへ</a></h4>
							<p> 朝4時にホテルを出発し、マイクロバスに乗って、オスロブ、カワサン滝へ行ってきました。
								水温はとても冷たかったですが、綺麗な空気と綺麗な水に感動しました。
							</p>
							<a href="#">続きを読む>></a>
						</div>
					</div>
					<!-- Single Blog2 -->
					
					<!-- Single Blog3 -->
					<div class="col-sm-4">
						<div class="single-blog">
							<img src="assets/img/add_img/Single_Blog3_1519138076376.jpg" alt="Single Blog3" />
							<h4><a href="blog.html">３度目のグアム</a></h4>
							<p>2017年7月3日成田発、7月6日成田着のデルタ航空利用。
								常夏の島グアムで買い物三昧、遊び三昧、グルメ三昧の旅！ショッピング施設も充実していますし、
								以前に行ったときにはなかった新しくできたレストランもたくさんありました！
							</p>
							<a href="#">続きを読む>></a>
						</div>
					</div>
					<!-- Single Blog3 -->
					
					<!-- Single Blog4 -->
					<div class="col-sm-4">
						<div class="single-blog">
							<img src="assets/img/add_img/Single_Blog4_IMG_20180216_175141.jpg" alt="Single Blog4" />
							<h4><a href="blog.html">はじめてのセブ</a></h4>
							<p>毎年、年に一度自分へのご褒美の念を込めてグアムに行くのですが、今年の旅行はいつもとは違う
							旅行をしてみたいと思い、フィリピン、セブに行くことにしました。3月のセブはとても暑く空港到着から
							汗だくです。早くビールが飲みたい..</p>
							<a href="#">続きを読む>></a>
						</div>
					</div>
					<!-- Single Blog4 -->
					
					
				</div>
				
			</div>
		</section>
		
		<!-- From the Blog-->

		<!-- Featured Work -->
		
		<section id="feature-work" class="protfolio-padding">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="title">
							<h3>目的<span>から選ぶ</span></h3>
						</div>
					</div>
				</div>
			</div>
			
			<div class="featured-list">
				<div id="grid" class="clearfix">
					
					<div class="thumb">
						<a href="#">
							<img src="assets/img/add_img/theme_gourmet_IMG_7336.jpg" alt="Feature Image" />
						</a>
						
						<div class="thumb-rollover">
							<div class="project-title">
								<h2>グルメ</h2>		
								<!-- <h5>Category: Web Design</h5> -->
							</div>
						</div>
						
					</div>
					
					<div class="thumb">
						<a href="#">
							<img src="assets/img/add_img/theme_sightseeing_P9131618.jpg" alt="Feature Image" />
						</a>
						<div class="thumb-rollover">
							<div class="project-title">
								<h2>観光</h2>
								<!-- <h5>Category: Web Design</h5> -->
							</div>
						</div>
					</div>
					
					<div class="thumb">
						<a href="#">
							<img src="assets/img/add_img/theme_shopping_IMG_20180216_144151.jpg" alt="Feature Image" />
						</a>
						
						<div class="thumb-rollover">
							<div class="project-title">
								<h2>ショッピング</h2>
								<!-- <h5>Category: Web Design</h5> -->
							</div>
						</div>
					</div>
					
					<div class="thumb">
						<a href="#">
							<img src="assets/img/add_img/theme_sport_outdoor_DSC_1043.jpg" alt="Feature Image" />
						</a>
						
						<div class="thumb-rollover">
							<div class="project-title">
								<h2>スポーツ・アウトドア</h2>
								<!-- <h5>Category: Web Design</h5> -->
							</div>
						</div>
					</div>
					
					<div class="thumb">
						<a href="#">
							<img src="assets/img/add_img/theme_hotel_IMG_20180218_112635.jpg" alt="Feature Image" />
						</a>
						
						<div class="thumb-rollover">
							<div class="project-title">
								<h2>ホテル</h2>
								<!-- <h5>Category: Web Design</h5> -->
							</div>
						</div>
					</div>
					
					<div class="thumb">
						<a href="#">
							<img src="assets/img/add_img/theme_relaxation_1519138253418.jpg" alt="Feature Image" />
						</a>
						
						<div class="thumb-rollover">
							<div class="project-title">
								<h2>リラクゼーション</h2>
								<!-- <h5>Category: Web Design</h5> -->
							</div>
						</div>
					</div>
					
					<div class="thumb">
						<a href="#">
							<img src="assets/img/add_img/theme_resort_1519138015328.jpg" alt="Feature Image" />
						</a>
						
						<div class="thumb-rollover">
							<div class="project-title">
								<h2>リゾート</h2>
								<!-- <h5>Category: Web Design</h5> -->
							</div>
						</div>
					</div>
					
					<div class="thumb">
						<a href="#">
							<img src="assets/img/add_img/theme_ather_1519138162591.jpg" alt="Feature Image" />
						</a>
						
						<div class="thumb-rollover">
							<div class="project-title">
								<h2>その他</h2>
								<!-- <h5>Category: Web Design</h5> -->
							</div>
						</div>
					</div>
					
					
				</div>
			</div>
			
			
		</section>
		
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
								<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut .</p> -->
							</div>
						</div>
					</div>
					<!-- Single Footer -->
					
					
					<!-- Single Footer -->
					<!-- <div class="col-sm-3">
						<div class="single-footer">
							<h4>ご連絡先</h4>
							<p>XX New Design Street, cebucity XXX <br />
							+9 (999) 999-999-999 <br />
							info@XXXX.com <br />
							(99) 999 999 999</p>
						</div>
					</div> -->
					<!-- Single Footer -->
					
					
					<!-- Single Footer -->
					<!-- <div class="col-sm-3">
						<div class="single-footer">
							<h4>定期購読</h4>
							<p>私たちの月刊ニュースレターを購読するためにあなたのメールアドレスを入力してください</p>
							
							<form action="">
								<div class="form-group">
									<input type="email" class="form-control my-form" id="exampleInputEmail1" placeholder="あなたのメールアドレスを入力してください">
								</div>
								<div class="form-group">
									<button class="btn btn-subscribe">定期購読</button>
								</div>
							</form>
							
						</div>
					</div> -->
					<!-- Single Footer -->
					
					<!-- Single Footer -->
					<!-- <div class="col-sm-3">
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
					</div> -->
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
