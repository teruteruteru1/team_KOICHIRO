<?php  

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
// 使い方
// <?php
// echo h('<a href="test.php?a=b&amp;c=d">Test</a>');
?>