<?php

    //プルダウン作成用
		include('db_for_pulldown.php');

    $pricing_lists = array(
        '0' => array(
              'price_id' => '1',
              'price_range' => '~100000円'
              ),
        '1' => array(
              'price_id' => '2',
              'price_range' =>'100000円~200000円'
              ),
        '2' => array(
              'price_id' => '3',
              'price_range' =>'200001円~30000円'
              ),
        '3' => array(
              'price_id' => '4',
              'price_range' =>'300001円~400000円'
              ),
        '4' => array(
              'price_id' => '5',
              'price_range' =>'400001円~'
              ),
        );
    $c_pricing_lists = count($pricing_lists);

    $month = ['1','2','3','4','5','6','7','8','9','10','11','12'];
    $c_month = count($month);

 ?>

<br>
<div class="container" id="wrap">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h2>旅行記検索</h2>
			<form action="search.php" method="post" accept-charset="utf-8" class="form" role="form">
			  <h3>ワード検索</h3>
        <input type="hidden" name="action" value="word">
    		<div class="input-group">
				  <input type="text" class="form-control" placeholder="複数ワードでも検索可能です" name="search_term" id="search_term" size=45>
          <button class="btn btn-md btn-primary btn-block signup-btn" type="submit">ワード検索</button>
			  </div>
      </form>
			<br>

      <form action="search.php" method="post" accept-charset="utf-8" class="form" role="form">
        <h3>詳細検索</h3>
        <input type="hidden" name="action" value="selected">

        <div class="row">
          <div class="col-xs-5 col-md-5">
			      <select name="country" value="" class="form-control input-md" >
			      	<option value="0" selected="selected" class="msg">国を選択して下さい</option>
                <?php for($i=0; $i<$count_country ; $i++){ ?>
                 <option value="<?php echo $countries[$i]['country_name']; ?>" class="<?php echo $countries[$i]['country_name']; ?>"><?php echo $countries[$i]['country_name_jp']; ?></option>
                <?php } ?>
				    </select>

			  </div>

			    <div class="col-xs-5 col-md-5">
            <div style="display:inline-flex">
                地域を選択してください
  				    <select name="city" value="" class="form-control input-md" >
  				    	<option value="0" selected="selected" class="msg">地域を選択して下さい</option>
                <?php for($i=0; $i<$count_area ; $i++){ ?>
                  <option value="<?php echo $areas[$i]['area_name']; ?>" class="<?php echo $places[$i]['country_name']; ?>"><?php echo $areas[$i]['area_name_jp']; ?></option>
                <?php } ?>
  				    </select>
            </div>
			    </div>
        </div>

        <div class="col-xs-9 col-md-9">
          <!-- <div style="display:inline-flex"> -->
            時期
  				  <select name="season" value="" class="form-control input-md">
  				    <option value="" selected="selected" class="msg">時期を選択して下さい</option>
                <?php for($i=0; $i<$c_month ; $i++) {?>
                  <?php if($i+1 == $_POST[season]) { ?>
                    <option value="<?php echo $month[$i]; ?>" selected ><?php echo $month[$i] ;?>月</option>
                  <?php } else { ?>
                    <option value="<?php echo $month[$i]; ?>" ><?php echo $month[$i] ;?>月</option>
                  <?php } ?>
                <?php } ?>
  				  </select>
          <!-- </div> -->
			  </div>

        <div class="col-xs-9 col-md-9">
          <!-- <div style="display:inline-flex"> -->
            予算
  	        <select name="budget" class="form-control input-md">
  				    <option value="" selected="selected" class="msg">予算を選択して下さい</option>
  				      <?php for($i=0; $i<$c_pricing_lists ; $i++) { ?>
                  <?php if($i+1 == $_POST['budget']) { ?>
                    <option value="<?php echo $pricing_lists[$i]['price_id']; ?>" selected><?php echo $pricing_lists[$i]['price_range']; ?></option>
                  <?php } else { ?>
                    <option value="<?php echo $pricing_lists[$i]['price_id']; ?>" ><?php echo $pricing_lists[$i]['price_range']; ?></option>
                  <?php } ?>
                <?php } ?>
  				  </select>
          <!-- </div> -->
				</div>

        <div class="col-xs-9 col-md-9">
          <!-- <div style="display:inline-flex"> -->
            テーマ
            <select name="theme" class="form-control input-md">
                <option value="" selected="selected" class="msg">テーマを選択して下さい</option>
                  <?php for($i=0; $i<$count_tag ; $i++){ ?>
                    <?php if($i+1 == $_POST['theme']) { ?>
                      <option value="<?php echo $tags[$i]['tag_id']; ?>" class="msg" selected><?php echo $tags[$i]['tag_name']; ?></option>
                    <?php } else {?>
                      <option value="<?php echo $tags[$i]['tag_id']; ?>" class="msg"><?php echo $tags[$i]['tag_name']; ?></option>
                    <?php }?>
                  <?php }?>
            </select>
          <!-- </div> -->
        </div>

        <div class="col-xs-9 col-md-9">
          <button class="btn btn-md btn-primary btn-block signup-btn" type="submit">絞り込み検索</button>
        </div>
      </form>
		</div>
	</div>
</div>


