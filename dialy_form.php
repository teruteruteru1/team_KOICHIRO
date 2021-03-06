<?php 
    session_start();  
    require ('dbconnect.php');



    //一回自分に飛ばす。確認ヴァーダンプ
    echo '<br>';
    echo '<br>';
    echo '<br>';
    
    // echo '<pre>'; 
    // echo '$_REQUEST = ';
    // var_dump($_REQUEST);
    // echo '</pre>';
     


    //プルダウン用の準備 
    include('partial/db_for_pulldown.php');  


    // echo '<pre>'; 
    // echo '$countries = ';
    // var_dump($countries);
    // echo '</pre>';

    $errors = array();

    // plan_check.php から戻ってきたときの処理
    if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'rewrite') {
        // for文のためにsesshnno数を数える
        $count_session = $_SESSION['plan']['count'];

        //$_GET = array ('action' => 'rewrite')
        //$_POSTを偽装します
        $_POST['title'] = $_SESSION['plan']['title'];
        $_POST['budget'] = $_SESSION['plan']['budget'];
        $_POST['number_days'] = $_SESSION['plan']['number_days'];
        $_POST['country_id_1'] = $_SESSION['plan']['country_id_1'];
        $_POST['country_id_2'] = $_SESSION['plan']['country_id_2'];
        $_POST['country_id_3'] = $_SESSION['plan']['country_id_3'];
        $_POST['area_id_1'] = $_SESSION['plan']['area_id_1'];
        $_POST['area_id_2'] = $_SESSION['plan']['area_id_2'];
        $_POST['area_id_3'] = $_SESSION['plan']['area_id_3'];
        $_POST['depart_date'] = $_SESSION['plan']['depart_date'];
        $_POST['arrival_date'] = $_SESSION['plan']['arrival_date'];
        $_POST['title_comment'] = $_SESSION['plan']['title_comment'];

        // 写真のコメントたちを一回配列に戻す
        $action_comments = array();
        for($d=0;$d<$count_session;$d++){
            if (!empty($_SESSION['plan']['comment' . $d])) {
                $action_comment = $_SESSION['plan']['comment' . $d];
                $action_comments[] = $action_comment;
            }              
        }
        $count_comments = count($action_comments);  

        // echo '<pre>'; 
        // echo '$_POST = ';
        // var_dump($_POST);
        // echo '</pre>';
        // echo '<pre>'; 
        // echo '$action_comments = ';
        // var_dump($action_comments);
        // echo '</pre>';
        
        //バリデーションメッセージ用
        $errors['rewrite'] = true;
    }
    // echo '<pre>'; 
    // echo '$_POST = ';
    // var_dump($_POST);
    // echo '</pre>';

    //変数を空定義
    //ページに飛んできたときにとりあえず変数を空にする
    $title = '';
    $budget = '';
    $number_days = '';
    $country_id_1 = '';
    $country_id_2 = '';
    $country_id_3 = '';
    $area_id_1 = '';
    $area_id_2 = '';
    $area_id_3 = '';
    $depart_date = '';
    $arrival_date = '';
    $title_comment = '';
    $title_img_name = '';
    // $ = '';
    // $ = '';
    // //---------------------未完----------------------
    

    //$_POSTが空じゃない時
    //ユーザーがformの送信ボタンを押した時
    
    // $_POSTの数を数える
    // 各for文に対して、上限をこの変数に設定する  
    $count_post = count($_POST);
    //echo $count_post;    

    if(!empty($_POST)){
        echo '送信完了<br>';
        //変数定義開始
        $title = $_POST['title'];
        $budget = $_POST['budget'];
        $number_days = $_POST['number_days'];
        $country_id_1 = $_POST['country_id_1'];
        $country_id_2 = $_POST['country_id_2'];
        $country_id_3 = $_POST['country_id_3'];
        $area_id_1 = $_POST['area_id_1'];
        $area_id_2 = $_POST['area_id_2'];
        $area_id_3 = $_POST['area_id_3'];
        $depart_date = $_POST['depart_date'];
        $arrival_date = $_POST['arrival_date'];
        $title_comment = $_POST['title_comment'];

        

        // メイン画像の変数定義
        if (!isset($_REQUEST['action'])) {
            $title_img_name = $_FILES['title_img_name']['name'];
        }
        
        //写真たちをぶん回すpicturesに保存するデータたち
        // ループ文でぶん回す
        if (!isset($_REQUEST['action'])){
            // 一度checkから戻ってきたら同じ処理を二回行わない
            $pic_names = array();
            $comments = array();
            for($n=0;$n<$count_post;$n++){
                if(isset($_FILES['pic_name' . $n]['name'])){
                    $pic_number = $_FILES['pic_name' . $n]['name'];
                    $pic_names[] = $pic_number;
                    //echo $pic_number;
                }
                if(isset($_POST['comment' . $n])){
                    $comment_number = $_POST['comment' . $n];
                    $comments[] = $comment_number;
                }    
            }
        }
        // echo '<pre>'; 
        // echo '$pic_names = ';
        // var_dump($pic_names);
        // echo '</pre>'; 
        // // echo '<pre>'; 
        // echo '$comments = ';
        // var_dump($comments);
        // echo '</pre>'; 

        //tagの変数（配列）定義
        $tag_numbers = array();
        for($x=0;$x<$count_post;$x++){
            $tag_number = 'tag' . $x;
            if(isset($_POST[$tag_number])){ 
                $tag_numbers[] = $_POST[$tag_number];
            }
            
        }

        // echo '<pre>'; 
        // echo '$tag_numbers = ';
        // var_dump($tag_numbers);
        // echo '</pre>'; 
        //変数定義完了

        // バリデーション開始
        

        //数字チェック
        //数字は空チェックの前に置く
        //ifで分岐させないといけない =>数字じゃない&&空じゃない時
        if (!ctype_digit($budget)) {
            $errors['budget'] = 'number';
        }
        if (!ctype_digit($number_days)) {
            $errors['number_days'] = 'number';
        }
        
        //各空チェック
        //いらないものは確認しない
        if ($title == '') {
            $errors['title'] = 'blank';
        }
        if ($title_img_name == '') {
            $errors['title_img_name'] = 'blank';
        }
        if ($budget == '') {
            $errors['budget'] = 'blank';
        }
        if ($number_days == '') {
            $errors['number_days'] = 'blank';
        }
        if ($country_id_1 == 'unselected') {
            $errors['country_id_1'] = 'blank';
        }
        if ($area_id_1 == 'unselected') {
            $errors['area_id_1'] = 'blank';
        }
        if ($depart_date == '') {
            $errors['depart_date'] = 'blank';
        }
        if ($arrival_date == '') {
            $errors['arrival_date'] = 'blank';
        }
        if ($title_comment == '') {
            $errors['title_comment'] = 'blank';
        }
        if (!$tag_numbers) {
            $errors['tag'] = 'blank';
        }

        // 写真とコメントはなくてもいい？
        // if ($pic_names[0] == '') {
        //     $errors['pic_names[0]'] = 'blank';
        // }
        // if ($comments[0] == '') {
        //     $errors['comments[0]'] = 'blank';
        // }
        
        // 空チェック終了
        // 画像拡張子のバリデーション開始

        // メイン画像用の拡張子チェック
        if (!empty($title_img_name)) {
            //jpeg/png/gifの３種類に変更する
            $title_img_type = substr($title_img_name,-3) ;
            $title_img_type = strtolower($title_img_type);
            if ($title_img_type != 'jpg' && $title_img_type != 'png' && $title_img_type != 'gif') {
                $errors['title_img_name'] = 'type';
            }
        }else{
            $errors['title_img_name'] = 'blank';
        }

        if (isset($_REQUEST['action'])){
            $errors['title_img_name'] = 'rewrite';
        }
        // 他の写真の拡張子チェック $pic_names[]の中身を確認する
        for($b=0;$b<$count_post;$b++){
            if (!empty($pic_names[$b])) {
                //jpeg/png/gifの３種類に変更する
                $pic_type = substr($pic_names[$b],-3) ;
                $pic_type = strtolower($pic_type);
                if ($pic_type != 'jpg' && $pic_type != 'png' && $pic_type != 'gif') {
                    $errors['pic_names' . $b] = 'type';
                }
            }

            // if (isset($_REQUEST['action'])){
            //     $errors['pic_names' . $b] = 'rewrite';
            // }
        }

        

        // echo '<pre>'; 
        // echo '$errors = ';
        // var_dump($errors);
        // echo '</pre>';



        // セッション登録開始
        // $_SESSIONを消す
        if (!isset($_REQUEST['action'])) {
            unset($_SESSION['plan']);
        }
        

        if (empty($errors)) {
            $date_str = date('YmdHid');
            $submit_title_img_name = $date_str . $title_img_name;
            move_uploaded_file($_FILES['title_img_name']['tmp_name'], 'title_img/' .$submit_title_img_name);
            $_SESSION['plan']['title'] = $title;
            $_SESSION['plan']['budget'] = $budget;
            $_SESSION['plan']['number_days'] = $number_days;
            $_SESSION['plan']['country_id_1'] = $country_id_1;
            $_SESSION['plan']['country_id_2'] = $country_id_2;
            $_SESSION['plan']['country_id_3'] = $country_id_3;
            $_SESSION['plan']['area_id_1'] = $area_id_1;
            $_SESSION['plan']['area_id_2'] = $area_id_2;
            $_SESSION['plan']['area_id_3'] = $area_id_3;
            $_SESSION['plan']['depart_date'] = $depart_date;
            $_SESSION['plan']['arrival_date'] = $arrival_date;
            $_SESSION['plan']['title_comment'] = $title_comment;
            $_SESSION['plan']['title_img_name'] = $submit_title_img_name;


            
            for($y=0;$y<$count_post;$y++){
                // 写真
                if(!empty($pic_names[$y])){
                    $submit_pic_name = $date_str . $pic_names[$y];
                    move_uploaded_file($_FILES['pic_name' . $y]['tmp_name'], 'pictures/' .$submit_pic_name);
                    $_SESSION['plan']['pic_name' . $y] = $submit_pic_name;
                }
                // コメント
                if(!empty($comments[$y])){
                    $_SESSION['plan']['comment' . $y] = $comments[$y];
                }
                // タグ  $tag_numberの中身は数字だけ
                if(!empty($tag_numbers[$y])){
                    $_SESSION['plan']['tag' . $y] = $tag_numbers[$y];
                }
            }           

            header('Location: dialy_check.php');
            exit();
        }

    }

    // echo '<pre>'; 
    // echo '$errors = ';
    // var_dump($errors);
    // echo '</pre>';
       
 ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>te_plan_form</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <!-- Font -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,700,600italic,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css"> 
    <link rel="stylesheet" href="assets/css/header.css"> 
    <link rel="stylesheet" href="assets/css/plan_form.css">    
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
        
    <!-- Font -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- calender -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/redmond/jquery-ui.css" >
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" >
    <!-- calender -->

  
</head>

<body>
    <!-- Header Start -->
    <header id="home">
        <?php require('partial/header.php') ?>
    </header>
    <!-- Header end -->
    <div id="site-box" class="container">
        <div class="row">
            <form method="POST" action="dialy_form.php" enctype="multipart/form-data">

                <!-- title start -->
                <div id="a-box">
                    <p><h1>旅のプランを作成する</h1></p>
                    <div class="dialytittle" style="text-align: left; margin-top: 10px; "> 
                        
                        <?php if (isset($errors['title'])) {  ?>
                          <span style="color: red;">タイトルを入力してください</span><br>
                        <?php }  ?>
                   
                    
                    </div>
                </div>
                <!-- title end -->

                <div id="b-box">
                    <div style="margin: 10px;">
                        <div>
                            旅のタイトル:
                            <textarea name="title" cols="100" rows="1" value="<?php echo $title ?>"><?php echo $title; ?></textarea>
                        </div>
                        <!-- カレンダー機能開始 -->
                        <br>
                    
                        旅行予定日時：
                        <input type="text" class="datepicker" name="depart_date" placeholder="  出発日" value="<?php echo $depart_date; ?>">　〜
                    
                        <?php if (isset($errors['depart_date'])) {  ?>
                          <span style="color: red;">出発日を選択してください</span><br>
                        <?php }  ?>

                        <input type="text" class="datepicker" name="arrival_date" placeholder="  帰宅日" value="<?php echo $arrival_date; ?>">
                        
                        <?php if (isset($errors['arrival_date'])) {  ?>
                          <span style="color: red;">帰宅日を選択してください</span>
                        <?php }  ?>
                        
                        
                        日数：
                        <input type="text" name="number_days" style="width:100px" placeholder="(例)30" value="<?php echo $number_days ?>">
                        (日)<br>
                        <?php if (isset($errors['number_days']) && $errors['number_days'] == 'blank') {  ?>
                          <span style="color: red;">日数を入力してください</span><br>
                        <?php }  ?>
                        <?php if (isset($errors['number_days']) && $errors['number_days'] == 'number') {  ?>
                          <span style="color: red;">数字で入力してください</span><br>
                        <?php }  ?>
                    </div>

                    <div style="margin: 10px;">
                        <p>旅行エリア</p>
                        <div style="margin: 10px;">
                            <!-- 国選択１ -->
                            国1:
                            <!-- $postと同じものがあったら、そこのoptionにselectedを当てる。elseそうじゃなかったらそのまま -->
                            <select name="country_id_1" class="country_select">
                              <option value="unselected" selected="" class="msg">国を選択して下さい</option>
                              <?php for($i=0; $i<$count_country ; $i++){ ?>
                                <?php if (isset($_POST['country_id_1']) && $_POST['country_id_1'] == $countries[$i]['country_id']){ ?>
                                  <option value="<?php echo $countries[$i]['country_id']; ?>" selected="selected" class="<?php echo $countries[$i]['country_name']; ?>"><?php echo $countries[$i]['country_name_jp']; ?></option>                        
                                <?php }else{ ?>                    
                                  <option value="<?php echo $countries[$i]['country_id']; ?>" class="<?php echo $countries[$i]['country_name']; ?>"><?php echo $countries[$i]['country_name_jp']; ?></option>
                                <?php } ?>
                              <?php } ?>                  
                            </select>
                            
                            <?php if (isset($errors['country_id_1'])) {  ?>
                              <span style="color: red;">国を選択してください</span><br>
                            <?php }  ?>
                            
                            
                            都市1:
                            <select name="area_id_1" class="area_select">
                              <option value="unselected" selected="selected" class="msg">都市を選択して下さい</option>
                              <?php for($i=0; $i<$count_area ; $i++){ ?>
                                <?php if (isset($_POST['area_id_1']) && $_POST['area_id_1'] == $areas[$i]['area_id']){ ?>
                                  <option value="<?php echo $places[$i]['area_id']; ?>" selected="selected" class="<?php echo $places[$i]['country_name']; ?>"><?php echo $places[$i]['area_name_jp']; ?></option>
                                <?php }else{ ?>
                                  <option value="<?php echo $places[$i]['area_id']; ?>" class="<?php echo $places[$i]['country_name']; ?>"><?php echo $places[$i]['area_name_jp']; ?></option>
                                <?php } ?>
                              <?php } ?>
                            </select>               
                            <br>
                            <?php if (isset($errors['area_id_1'])) {  ?>
                              <span style="color: red;">地域/都市を選択してください</span><br>
                            <?php }  ?>

                            <!-- 国選択２ -->
                            国2:
                            <select name="country_id_2" class="country_select">
                              <option value="unselected" selected="" class="msg">国を選択して下さい</option>
                              <?php for($i=0; $i<$count_country ; $i++){ ?>
                                <?php if (isset($_POST['country_id_2']) && $_POST['country_id_2'] == $countries[$i]['country_id']){ ?>
                                  <option value="<?php echo $countries[$i]['country_id']; ?>" selected="selected" class="<?php echo $countries[$i]['country_name']; ?>"><?php echo $countries[$i]['country_name_jp']; ?></option>                        
                                <?php }else{ ?>                    
                                  <option value="<?php echo $countries[$i]['country_id']; ?>" class="<?php echo $countries[$i]['country_name']; ?>"><?php echo $countries[$i]['country_name_jp']; ?></option>
                                <?php } ?>
                              <?php } ?>                  
                            </select>
                                        
                            都市2:
                            <select name="area_id_2" class="area_select">
                              <option value="unselected" selected="selected" class="msg">都市を選択して下さい</option>
                              <?php for($i=0; $i<$count_area ; $i++){ ?>
                                <?php if (isset($_POST['area_id_2']) && $_POST['area_id_2'] == $areas[$i]['area_id']){ ?>
                                  <option value="<?php echo $places[$i]['area_id']; ?>" selected="selected" class="<?php echo $places[$i]['country_name']; ?>"><?php echo $places[$i]['area_name_jp']; ?></option>
                                <?php }else{ ?>
                                  <option value="<?php echo $places[$i]['area_id']; ?>" class="<?php echo $places[$i]['country_name']; ?>"><?php echo $places[$i]['area_name_jp']; ?></option>
                                <?php } ?>
                              <?php } ?>
                            </select>               
                            <br>

                            <!-- 国選択３ -->
                            国3:
                            <select name="country_id_3" class="country_select">
                              <option value="unselected" selected="" class="msg">国を選択して下さい</option>
                              <?php for($i=0; $i<$count_country ; $i++){ ?>
                                <?php if (isset($_POST['country_id_3']) && $_POST['country_id_3'] == $countries[$i]['country_id']){ ?>
                                  <option value="<?php echo $countries[$i]['country_id']; ?>" selected="selected" class="<?php echo $countries[$i]['country_name']; ?>"><?php echo $countries[$i]['country_name_jp']; ?></option>                        
                                <?php }else{ ?>                    
                                  <option value="<?php echo $countries[$i]['country_id']; ?>" class="<?php echo $countries[$i]['country_name']; ?>"><?php echo $countries[$i]['country_name_jp']; ?></option>
                                <?php } ?>
                              <?php } ?>                  
                            </select>
                                      
                            都市3:
                            <select name="area_id_3" class="area_select">
                              <option value="unselected" selected="selected" class="msg">都市を選択して下さい</option>
                              <?php for($i=0; $i<$count_area ; $i++){ ?>
                                <?php if (isset($_POST['area_id_3']) && $_POST['area_id_3'] == $areas[$i]['area_id']){ ?>
                                  <option value="<?php echo $places[$i]['area_id']; ?>" selected="selected" class="<?php echo $places[$i]['country_name']; ?>"><?php echo $places[$i]['area_name_jp']; ?></option>
                                <?php }else{ ?>
                                  <option value="<?php echo $places[$i]['area_id']; ?>" class="<?php echo $places[$i]['country_name']; ?>"><?php echo $places[$i]['area_name_jp']; ?></option>
                                <?php } ?>
                              <?php } ?>
                            </select>
                        </div>
                    </div>                 

                    <div style="margin: 10px; ">
                        予算：
                        <input type="text" name="budget" style="width:100px" placeholder="(例)100000" value="<?php echo $budget ?>">
                        (円)<br>
                        <?php if (isset($errors['budget']) && $errors['budget'] == 'blank') {  ?>
                          <span style="color: red;">予算を入力してください</span><br>
                        <?php }  ?>
                        <?php if (isset($errors['budget']) && $errors['budget'] == 'number') {  ?>
                          <span style="color: red;">数字で入力してください</span><br>
                        <?php }  ?>
                    </div>

                    <!-- タグを選択 -->
                    <div style="margin: 50px;">
                        <p><h4>旅行記につけるタグを選んでください</h4></p>
                        <div id="dialy_tag" class="col-xs-12">
                        <?php for($i=0; $i<$count_tag ; $i++){ ?>
                            <?php if($tags[$i]['tag_id']%4 == 0){ ?>
                                <label class="checkbox-inline"><input type="checkbox" name="tag<?php echo $i?>" value="<?php echo $tags[$i]['tag_id'] ?>"><?php echo $tags[$i]['tag_name'] ?></label><br>
                            <?php }else{ ?>
                                <label class="checkbox-inline"><input type="checkbox" name="tag<?php echo $i?>" value="<?php echo $tags[$i]['tag_id'] ?>"><?php echo $tags[$i]['tag_name'] ?></label>
                            <?php } ?>
                        <?php }?>
                        </div>
                        <?php if (isset($errors['tag'])) {  ?>
                        <span style="color: red;">旅行記につけるタグを最低一つ選択してください</span><br>
                        <?php }  ?>
                    </div>
                    <br>
                </div>


                

                    <!-- 概要 -->
                    <div style="margin-top:120px; text-align: center;">
                        <h2>旅の概要</h2>
                        <div style="margin: 10px;">
                            <textarea name="title_comment" cols="80" rows="6"> <?php echo $title_comment; ?> </textarea>
                        </div>
                    
                        <?php if (isset($errors['title_comment'])) {  ?>
                          <span style="color: red;">旅行の概要を入力してください</span><br>
                        <?php }  ?>
                        <br> 

                        <!-- main picture start -->
                        <i class="fa fa-camera-retro"></i>
                        <span>メイン写真を選択してください</span> <br>
                          <?php if (isset($errors['title_img_name']) && $errors['title_img_name'] == 'blank') {  ?>
                        <span style="color: red;">トップに置く画像を選択してください</span><br>
                          <?php }  ?>
                          <?php if (isset($errors['title_img_type']) && $errors['title_img_type'] == 'type') {  ?>
                        <span style="color: red;">拡張子をjpg png gif にしてください</span><br>
                          <?php }  ?>
                          <?php if (isset($errors['title_img_name']) && $errors['title_img_name'] == 'rewrite') {  ?>
                        <span style="color: red;">メイン画像を再選択してください</span><br>
                          <?php }  ?>
                        <input type="file" style="margin: auto;" name="title_img_name" accept="mage/*">
                        <i aria-hidden="true"></i>
                    
                        <!-- main picture end -->         
                    
                        <!-- 写真とコメント -->
                        <!-- 戻ってきたかどうかで表示画面を変更する -->
                        <?php if(!isset($_REQUEST['action'])){ ?>
                        <!-- 戻ってきてないときはそのまま -->
                        <div class="parent" style="margin: 50px;">
                            <div class="field">
                                <p><i class="fa fa-camera-retro"></i>旅の写真を選んでください</p>
                                <!-- <div> -->
                                <input type="file" style="margin: auto;" name="pic_name0" accept="image/*">
                                <!-- </div> -->
                                <textarea name="comment0" cols="80" rows="5"></textarea><br>
                                <button type="button" class="btn trash_btn ml10"  style="btn btn-warning" value="" name="">削除</button><br><br>
                            </div>
                        </div> 
                        <!-- class=parentの外にボタンを出しておく -->

                        <button type="button" class="btn bg-white mt10 miw100 add_btn" ><h3>写真・旅行記を追加する</h3></button>
                        <br>
                        <?php }else{ ?>
                        <div class="parent">
                            <?php for($e=0;$e<$count_comments;$e++){ ?>
                              <!-- <div class="field" style="padding-bottom:8px; margin-bottom:20px;"> -->
                              <div class="field">
                                <p>旅の写真を選んでください</p>
                                <!-- <div> -->
                                <input type="file" style="margin: auto;" name="pic_name . <?php echo $e; ?>" accept="image/*">
                                <!-- </div> -->
                                <textarea name="comment . <?php echo $e; ?>" cols="40" rows="5"><?php echo $action_comments[$e]; ?></textarea><br>
                                <button type="button" class="btn trash_btn ml10"  style="btn btn-warning" value="" name="">削除</button><br><br>
                              </div>
                            <?php } ?>
                        </div> <!-- class=parentの外にボタンを出しておく -->
                          
                          <button type="button" class="btn bg-white mt10 miw100 add_btn" style="" >写真を追加する</button>
                          <br>
                      <?php } ?>


                  <!-- 確認画面へ -->
                  <input type="submit" value="確認画面へ" class="btn btn-primary">            
                </div>
                <!-- 仮機能 -->
                <p>仮のボタン</p>  
                 <a href="sessiondelete.php">（仮）セッションを消して入力に戻る</a>
            </form>
        </div>
    </div>
    <br>

    <!-- footer -->
    <div id="e-box">
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
                                <li><a href="#">Home</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Faq</a></li>
                                <li><a href="#">Pricing</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Contact</a></li>
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
    </div>

    <!-- footer -->
        <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.mousewheel-3.0.6.pack.js"></script>
        <script src="assets/js/paralax.js"></script>
        <script src="assets/js/jquery.smooth-scroll.js"></script>
        <script src="assets/js/jquery.sticky.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/main.js"></script>
        
        <!-- カレンダーのJS -->
        <script src="assets/js/plan_calender.js"></script>
        <!-- プルダウンのJS -->
        <script src="assets/js/plan_country.js"></script>
        <script src="assets/js/plan_country2.js"></script>
        <!-- コメントを増やすJS -->
        <script src="assets/js/plan_comment.js"></script>
        
    
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

    