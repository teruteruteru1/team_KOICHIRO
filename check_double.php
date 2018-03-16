<?php
    session_start();
    require('dbconnect.php');

    // echo '<pre>';
    // echo '$_POST = ';
    // var_dump($_POST);
    // echo '</pre>';

    // $sql = 'SELECT d.*, a.area_name, t.tag_name FROM
    //     (
    //         (
    //             (
    //                 (
    //                 dialies AS d INNER JOIN areas_dialies AS ad ON d.dialy_id = ad.dialies_id
    //                 )
    //                 INNER JOIN areas AS a ON ad.area_id = a.area_id
    //             ) INNER JOIN dialies_tags AS dt ON d.dialy_id = dt.dialis_id
    //         ) INNER JOIN tags AS t ON dt.tag_id = t.tag_id
    //     )WHERE area = ? AND season = ? AND budgets = ?';

        $sql = 'SELECT d.*, a.area_name, t.tag_name,c.country_name FROM ( ( ( ( ( dialies AS d INNER JOIN areas_dialies AS ad ON d.dialy_id = ad.dialies_id ) INNER JOIN areas AS a ON ad.area_id = a.area_id ) INNER JOIN dialies_tags AS dt ON d.dialy_id = dt.dialis_id ) INNER JOIN tags AS t ON dt.tag_id = t.tag_id )INNER JOIN countries AS c ON a.country_id=c.country_id )WHERE 1';

    $data = array( );
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

    $dialy = array();

    while (true) {
        $dialy = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($dialy == false) {
            break;
        }
        $dialies[] = $dialy;

        $tmp = [];
        $uniqueids = [];

        foreach ($dialies as $result){
            if (!in_array($result['dialy_id'], $tmp)) {
                $tmp[] = $result['dialy_id'];
                $uniqueids[] = $result;
            }
        }
    }

    $c = count($dialies);


        echo '<pre>';
        echo '$uniqueids = ';
        var_dump($uniqueids);
        echo '</pre>';

?>