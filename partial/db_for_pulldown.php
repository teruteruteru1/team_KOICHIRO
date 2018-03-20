<?php
    //DB接続＋国名やタグ名を持ってきて、プルダウンを作るための配列を作る

    // STEP1
    $dsn = 'mysql:dbname=teamKOICHIRO;host=localhost';
    // XAMPPの初期設定値
    $db_user = 'root';
    $db_password='';
    $dbh = new PDO($dsn, $db_user, $db_password);
    $dbh->query('SET NAMES utf8');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    
    //countries テーブルから持ってくる
    $sql = 'SELECT * FROM `countries` WHERE 1';
    $data = array();
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    //fetchする
    $countries = array();
    while (true) {
        $country = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($country == false) {
            break;
        }
        $countries[] = $country;
    }
    $count_country = count($countries); 
    //echo $count_country;//国名プルダウン用カウントカントリー



    //areasテーブルから取ってくる
    $sql = 'SELECT * FROM `areas` WHERE 1';
    $data = array();
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    //fetchする
    $areas = array();
    while (true) {
        $area = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($area == false) {
            break;
        }
        $areas[] = $area;
    }
    $count_area = count($areas); 
    //echo $count_area;//国名プルダウン用カウントカントリー

    //areasとcountriesをくっつける
    $sql = 'SELECT `areas`.*,`countries`.country_name FROM areas LEFT JOIN countries ON `areas`.`country_id`=`countries`.`country_id` WHERE 1';
    $data = array();
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    while (true) {
        $place = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($place == false) {
            break;
        }
        $places[] = $place;
    }

    

    // echo '<pre>'; 
    // echo '$places = ';
    // var_dump($places);
    // echo '</pre>';



    //tagsテーブルから取ってくる
    $sql = 'SELECT * FROM `tags` WHERE 1';
    $data = array();
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    //fetchする
    $tags = array();
    while (true) {
        $tag = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($tag == false) {
            break;
        }
        $tags[] = $tag;
    }
    $count_tag = count($tags);
    // プルダウンの準備完了  


 ?>