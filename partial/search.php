<br>
<div class="container" id="wrap">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
			<form action="search.php" method="post" accept-charset="utf-8" class="form" role="form">
			  <h2>旅行記検索</h2>
			  <input type="hidden" name="action" value="word">

    		<div class="input-group">
				  <input type="text" class="form-control" placeholder="キーワード検索：『エリア』+『目的』など" name="srch-term" id="srch-term">
				  <div class="input-group-btn">
					  <button class="btn btn-default btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
				  </div>
			  </div>
			</form>
			<br>

			<form action="search.php" method="post" accept-charset="utf-8" class="form" role="form">
			  <h2>詳細検索</h2>
			  <input type="hidden" name="action" value="selected">

        <div class="row">
          <div class="col-xs-5 col-md-5">
			      <select name="country" value="" class="form-control input-md" >
				    <option value="" selected="selected" class="msg">国を選択して下さい</option>
				    <option value="Japan" class="japan">日本</option>
				    <option value="America" class="America">アメリカ</option>
				    <option value="Australia" class="Australia">オーストラリア</option>
				    </select>
				  </div>

			    <div class="col-xs-5 col-md-5">
				    <select name="city" value="" class="form-control input-md" >
				      <option value="" selected="selected" class="msg">都市を選択して下さい</option>
				      <option value="Tokyo" class="japan">東京</option>
				      <option value="Kyoto" class="japan">京都</option>
				      <option value="Osaka" class="japan">大阪</option>
				      <option value="NY" class="America">ニューヨーク</option>
				      <option value="LA" class="America">ロサンゼルス</option>
				      <option value="Sydney" class="Australia">シドニー</option>
				    </select>
			    </div>
			    <!-- <div class="col-md-2">
	          <button type="submit" class="btn btn-default btn-primary">探す</button>
	        </div> -->
        </div>

        <div class="col-xs-9 col-md-9">
				  <select name="season" value="" class="form-control input-md">
				    <option value="" selected="selected" class="msg">時期を選択して下さい</option>
				    <option value="1" class="spring">1月</option>
				    <option value="2" class="spring">2月</option>
				    <option value="3" class="spring">3月</option>
				    <option value="4" class="spring">4月</option>
				    <option value="5" class="spring">5月</option>
				    <option value="6" class="spring">6月</option>
				    <option value="7" class="spring">7月</option>
				    <option value="8" class="spring">8月</option>
				    <option value="9" class="spring">9月</option>
				    <option value="10" class="spring">10月</option>
				    <option value="11" class="spring">11月</option>
				    <option value="12" class="spring">12月</option>

				    <!-- <option value="04" class="spring">３月〜５月</option>
				    <option value="07" class="summer">６月〜８月</option>
				    <option value="10" class="autumn">９月〜11月</option>
				    <option value="12" class="winter">12月〜２月</option> -->
				  </select>
			  </div>
	      <!-- <div class="col-md-2">
          <button type="submit" class="btn btn-default btn-primary">探す</button>
				</div> -->

        <div class="col-xs-9 col-md-9">
	        <select name="budget" class="form-control input-md">
				    <option value="" selected="selected" class="msg">予算を選択して下さい</option>
				    <option value="1" class="1"> ~100000円</option>
				    <option value="2" class="2" selected> 100001~200000</option>
				    <option value="3" class="3"> 200001~300000</option>
				    <option value="4" class="4"> 300001~400000</option>
				    <option value="5" class="5"> 400001~</option>
				  </select>
				</div>

				<div class="col-xs-9 col-md-9">
	        <select name="budget" class="form-control input-md">
				    <option value="" selected="selected" class="msg">予算を選択して下さい</option>
				    <?php for($i=0;$i<5;$i++){ ?>
				    	<option value="1" class="1"> ~100000円</option>
				    <?php } ?>
				  </select>
				</div>
				<!-- <div class="col-md-2">
				  <button type="submit" class="btn btn-default btn-primary">探す</button>
				</div> -->

        <div class="col-xs-9 col-md-9">
	        <select name="theme" class="form-control input-md">
		        <option value="" selected="selected" class="msg">目的を選択して下さい</option>
		        <option value="グルメ" class="1"> グルメ</option>
		        <option value="観光" class="sightseeing">観光</option>
		        <option value="ショッピン" class="shopping">ショッピング</option>
		        <option value="スポーツ・アウトドア" class="sport_outdoor">スポーツ・アウトドア</option>
		        <option value="ホテル" class="hotel">ホテル</option>
		        <option value="リラクゼーション" class="relaxation">リラクゼーション</option>
		        <option value="リゾート" class="resort">リゾート</option>
		        <option value="その他" class="ather">その他</option>
		      </select>
	      </div>

        <div class="col-xs-9 col-md-9">
          <button class="btn btn-md btn-primary btn-block signup-btn" type="submit">探す</button>
        </div>
      </form>
		</div>
	</div>
</div>


