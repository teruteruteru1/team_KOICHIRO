<?php 

		session_start();
		include('dbconnect.php');
		require('signin_user.php');
		echo '<pre>'; 
    echo '$_REQUEST = ';
    var_dump($_REQUEST);
    echo '</pre>';

		//パラメーターの取得
		if (!isset($_REQUEST['comment_id'])) {
				header('Location: home.php');
				exit();
		}

		//本人確認（投稿者とサインインユーザーが一致しているか）
		$sql = 'SELECT * FROM comments WHERE comment_id=?';
    $data = array($_REQUEST['comment_id']);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

    $comment = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($comment['user_id'] == $_SESSION['user']['id']) {
    		//サインインユーザー取得
		  	$sql = 'DELETE FROM comments WHERE comment_id=?';
		    $data = array($_REQUEST['comment_id']);
		    $stmt = $dbh->prepare($sql);
		    $stmt->execute($data);
    }


    header('Location: travel_dialy.php?dialy_id=' . $_REQUEST['dialy_id']);
		exit();

 ?>