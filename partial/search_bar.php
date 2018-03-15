<?php 

    //プルダウン作成用
		include('db_for_pulldown.php');
    

 ?>

<br>
<div class="container" id="wrap">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
			<form action="search.php" method="post" accept-charset="utf-8" class="form" role="form">

			  <h2>旅行記検索</h2>
    		<div class="input-group">
				  <input type="text" class="form-control" placeholder="キーワード検索：『エリア』+『目的』など" name="srch-term" id="srch-term">
				  <div class="input-group-btn">
					  <button class="btn btn-default btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
				  </div>
			  </div>
			  <br>

			  <h4>詳細検索</h4>

        <div class="row">
          <div class="col-xs-5 col-md-5">
			      <select name="country" value="" class="form-control input-md" >
			      	<option value="0" selected="selected" class="msg">国を選択して下さい</option>
                <?php for($i=0; $i<$count_country ; $i++){ ?>
                 <option value="<?php echo $countries[$i]['country_name']; ?>" class="<?php echo $countries[$i]['id']; ?>"><?php echo $countries[$i]['country_name']; ?></option>
                <?php } ?>
				    </select>
				  </div>

			    <div class="col-xs-5 col-md-5">
				    <select name="city" value="" class="form-control input-md" >
				    	<option value="0" selected="selected" class="msg">都市を選択して下さい</option>
              <?php for($i=0; $i<$count_area ; $i++){ ?>
                <option value="<?php echo $areas[$i]['area_name']; ?>" class="<?php echo $areas[$i]['country_id']; ?>"><?php echo $areas[$i]['area_name']; ?></option>
              <?php } ?>
				    </select>
			    </div>
			    <!-- <div class="col-md-2">
	          <button type="submit" class="btn btn-default btn-primary">探す</button>
	        </div> -->
        </div>

        <div class="col-xs-9 col-md-9">
				  <select name="season" value="" class="form-control input-md">
				    <option value="" selected="selected" class="msg">時期を選択して下さい</option>
				    <option value="04" class="spring">３月〜５月</option>
				    <option value="07" class="summer">６月〜８月</option>
				    <option value="10" class="autumn">９月〜11月</option>
				    <option value="12" class="winter">12月〜２月</option>
				  </select>
			  </div>
	      <!-- <div class="col-md-2">
          <button type="submit" class="btn btn-default btn-primary">探す</button>
				</div> -->

        <div class="col-xs-9 col-md-9">
	        <select name="budget" class="form-control input-md">
				    <option value="" selected="selected" class="msg">予算を選択して下さい</option>
				    <option value="1" class="1"> ~100000円</option>
				    <option value="2" class="2"> 100001~200000</option>
				    <option value="3" class="3"> 200001~300000</option>
				    <option value="4" class="4"> 300001~400000</option>
				    <option value="5" class="5"> 400001~</option>
				  </select>
				</div>
				<!-- <div class="col-md-2">
				  <button type="submit" class="btn btn-default btn-primary">探す</button>
				</div> -->

        <div class="col-xs-9 col-md-9">
	        <select name="theme" class="form-control input-md">
		        <option value="" selected="selected" class="msg">目的を選択して下さい</option>
		         <?php for($i=0; $i<$count_tag ; $i++){ ?>
		         <option value="<?php echo $tags[$i]['tag_name'] ?>" class="msg"><?php echo $tags[$i]['tag_name'] ?></option>
		         <?php }?>
		      </select>
	      </div>

        <div class="col-xs-9 col-md-9">
          <button class="btn btn-md btn-primary btn-block signup-btn" type="submit">探す</button>
        </div>
      </form>
		</div>
	</div>
</div>


