<?php 
 		echo '<pre>'; 
  	echo '$_POST = ';
  	var_dump($_POST);
  	echo '</pre>'; 


  	session_start();  
    // 暫定的にlearnSNSに接続  
    // LearnSNSのusersから名前だけ持ってきてみる
    //step1
    $dsn = 'mysql:dbname=20180108LearnSNS;host=localhost';
    //XAMPPの初期設定値
    $db_user = 'root';
    $db_password='';
    $dbh = new PDO($dsn, $db_user, $db_password);
    $dbh->query('SET NAMES utf8');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    //ユーザー名を国名として呼び出してみる
    $sql = 'SELECT name FROM `users` WHERE 1';
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
    $c = count($countries); 
    echo $c;
    echo '<br>';
    // echo '<pre>'; 
    // echo '$country = ';
    // var_dump($country);
    // echo '</pre>';

    echo '<pre>';
    echo '$countries = ';
    var_dump($countries);
    echo '</pre>';
    





 ?>


 <!DOCTYPE html>
 <html lang="ja">
 <head>
 	<meta charset="utf-8">
 	<title></title>
 </head>
 <body>
 	<select name="country">
 		<option value="Japan" selected="selected" class="msg">国を選択して下さい</option>
 		<?php for($i=0; $i<$c ; $i++){ ?>
    <option value="Japan" class="japan"><?php echo $countries[$i]['name']; ?></option>
    <?php } ?>

 	</select>









 </body>
 </html>