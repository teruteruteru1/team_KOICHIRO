<?php

		// STEP1
    $dsn = 'mysql:dbname=teamKOICHIRO;host=localhost';
    // XAMPPの初期設定値
    $db_user = 'root';
    $db_password='';
    $dbh = new PDO($dsn, $db_user, $db_password);
    $dbh->query('SET NAMES utf8');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    

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