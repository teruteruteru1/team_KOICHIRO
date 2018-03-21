<?php 
		session_start();
		//include ('dbconect.php');
		// include('signin_user.php');

		echo '<pre>'; 
  	echo '$_POST = ';
  	var_dump($_POST);
  	echo '</pre>'; 

  	echo '<pre>'; 
  	echo '$_SESSION = ';
  	var_dump($_SESSION);
  	echo '</pre>'; 

		// userid確認
		echo 'userid = ' . $_SESSION['user']['id'] . '<br>';
		// STEP1
    $dsn = 'mysql:dbname=teamKOICHIRO;host=localhost';
    // XAMPPの初期設定値
    $db_user = 'root';
    $db_password='';
    $dbh = new PDO($dsn, $db_user, $db_password);
    $dbh->query('SET NAMES utf8');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


  	if ($_POST['btn'] == 'like') {
  		  // echo 'user id' . $_SESSION['user']['id'] . 'のユーザーが fees id' . $_POST['feed_id'] . 'のユーザーが投稿にいいね！する';
  
		  	$sql = 'INSERT INTO `likes` SET `user_id` =?, `dialy_id` =?';
				$data = array($_SESSION['user']['id'], $_POST['dialy_id']); 
				$stmt = $dbh->prepare($sql);
				$stmt->execute($data);

				echo 'いいね登録完了';

		}elseif ($_POST['btn'] == 'unlike') {
				// echo 'user id' . $_SESSION['user']['id'] . 'のユーザーが fees id' . $_POST['feed_id'] . 'のユーザーが投稿にいいね！を取り消す';

				$sql = 'DELETE FROM `likes` WHERE `user_id` =? AND `dialy_id` =?';
				$data = array($_SESSION['user']['id'], $_POST['dialy_id']); 
				$stmt = $dbh->prepare($sql);
				$stmt->execute($data);
		}

		//いいね数カウント→feeds tableのlike_countカラムへ更新
		$sql = 'SELECT COUNT(*) AS cnt FROM `likes` WHERE `dialy_id` =?';
		$data = array($_POST['dialy_id']); 
		$stmt = $dbh->prepare($sql);
		$stmt->execute($data);
		$like = $stmt->fetch(PDO::FETCH_ASSOC);

		// echo '<br>';
		// echo 'いいね数：'. $like['cnt'];

		$sql = 'UPDATE `dialies` SET `like_count` =?, `updated` = NOW() WHERE `dialy_id`=?';
		$data = array($like['cnt'],$_POST['dialy_id']); 
		$stmt = $dbh->prepare($sql);
		$stmt->execute($data);

		header('Location: ../travel_dialy.php?dialy_id=' . $_POST['dialy_id']);
		exit();

		//いいね機能を他のページに実装したら発動する


		//echo $_SERVER['HTTP_REFERER'];

		//$url = parse_url($_SERVER['HTTP_REFERER']);
		// echo '<pre>'; 
	  // echo '$yrl = ';
	  // var_dump($url);
	  // echo '</pre>'; 
  
  	//$path = explode('/',$url['path']);
  	// echo '<pre>'; 
  	// echo '$path = ';
  	// var_dump($path);
  	// echo '</pre>'; 

  	// if($path[3] == 'show.php'){
  	// 	header('Location: show.php?dialy_id=' . $_POST['dialy_id']);
			// exit();
  	// }elseif ($path[3] == 'timeline.php') {
  	// 	header('Location: timeline.php');
			// exit();
  	// }




 ?>





