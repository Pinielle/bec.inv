<?php
    $db = mysql_connect($config['db']['host'], $config['db']['user'], $config['db']['passw']);
    mysql_select_db($config['db']['name'],$db);
?>
