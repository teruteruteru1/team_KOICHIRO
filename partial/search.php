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
			        
			        
					<!-- </div>
					</div> -->
					<!-- 									
					<div class="col-sm-12">
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
              			<div class="col-md-12">
                    		<button class="btn btn-md btn-primary btn-block signup-btn" type="submit">探す</button>
                    	</div>
		            </form>          
				</div>            
			</div>
		</div>
		<!-- surch end -->

