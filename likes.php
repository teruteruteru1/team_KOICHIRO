<?php 
		session_start();
		require('dbconect.php');
		require('signin_user.php');


  	if ($_POST['btn'] == 'like') {
  		  // echo 'user id' . $_SESSION['user']['id'] . 'のユーザーが fees id' . $_POST['feed_id'] . 'のユーザーが投稿にいいね！する';
  
		  	$sql = 'INSERT INTO `likes` SET `user_id` =?, `dialy_id` =?';
				$data = array($_SESSION['user']['id'], $_POST['feed_id']); 
				$stmt = $dbh->prepare($sql);
				$stmt->execute($data);

		}elseif ($_POST['btn'] == 'unlike') {
				// echo 'user id' . $_SESSION['user']['id'] . 'のユーザーが fees id' . $_POST['feed_id'] . 'のユーザーが投稿にいいね！を取り消す';

				$sql = 'DELETE FROM `likes` WHERE `user_id` =? AND `feed_id` =?';
				$data = array($_SESSION['user']['id'], $_POST['feed_id']); 
				$stmt = $dbh->prepare($sql);
				$stmt->execute($data);
		}

		//いいね数カウント→feeds tableのlike_countカラムへ更新
		$sql = 'SELECT COUNT(*) AS cnt FROM `likes` WHERE `feed_id` =?';
		$data = array($_POST['feed_id']); 
		$stmt = $dbh->prepare($sql);
		$stmt->execute($data);
		$like = $stmt->fetch(PDO::FETCH_ASSOC);

		// echo '<br>';
		// echo 'いいね数：'. $like['cnt'];

		$sql = 'UPDATE `feeds` SET `like_count` =?, `updated` = NOW() WHERE `id`=?';
		$data = array($like['cnt'],$_POST['feed_id']); 
		$stmt = $dbh->prepare($sql);
		$stmt->execute($data);

		//header関数を使うより先に出力があるとエラーになることがある（htmlやecho)
		// header('Location: show.php?feed_id=' . $_POST['feed_id']);
		// exit();

		// echo $_SERVER['HTTP_REFERER'];

		$url = parse_url($_SERVER['HTTP_REFERER']);
		// echo '<pre>'; 
  // 	echo '$yrl = ';
  // 	var_dump($url);
  // 	echo '</pre>'; 
  	
  	$path = explode('/',$url['path']);
  	// echo '<pre>'; 
  	// echo '$path = ';
  	// var_dump($path);
  	// echo '</pre>'; 

  	if($path[3] == 'show.php'){
  		header('Location: show.php?feed_id=' . $_POST['feed_id']);
			exit();
  	}elseif ($path[3] == 'timeline.php') {
  		header('Location: timeline.php');
			exit();
  	}




 ?>





