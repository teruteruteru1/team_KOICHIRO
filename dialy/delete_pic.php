<?php 

		session_start();
		require('../dbconect.php');
		require('../signin_user.php');

		//パラメーターの取得
		if (!isset($_REQUEST['feed_id'])) {
				header('Location: timeline.php');
				exit();
		}

		//本人確認（投稿者とサインインユーザーが一致しているか）
		$sql = 'SELECT * FROM feeds WHERE id=?';
    $data = array($_REQUEST['feed_id']);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

    $feed = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($feed['user_id'] == $_SESSION['user']['id']) {
    		//サインインユーザー取得
		  	$sql = 'DELETE FROM feeds WHERE id=?';
		    $data = array($_REQUEST['feed_id']);
		    $stmt = $dbh->prepare($sql);
		    $stmt->execute($data);
    }



		//timeline.phpに遷移
    header('Location: timeline.php');
		exit();

 ?>