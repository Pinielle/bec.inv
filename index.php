<?php
$configFiles = glob('protected/config/config.*');
sort($configFiles, 1);
$config = array();
foreach ($configFiles as $configFile) {
    if (is_file($configFile) && is_readable($configFile)) {
        $configTmp = include $configFile;
        if (is_array($configTmp)) {
            $config = array_merge($config, $configTmp);
        }
    }
}
include ("blocks/bd.php");
$result = mysql_query("SELECT title,text FROM settings WHERE page='index'",$db);

if (!$result) {
    echo "<p>Request failed. Tell about us bec@mailbox.com<br>
                <strong>Error code: </strong></p>";
    exit(mysql_error());
}

if (mysql_num_rows($result) > 0) {
    $myrow = mysql_fetch_array($result);
}
else {
    echo"<p>Table have no text</p>";
    exit();
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
	<title>
        <?php echo $myrow["title"]; ?>
	</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="690" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="main_border">
    <?php include ("blocks/header.php"); ?>
	<tr>
		<td valign="top">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>
                    <?php include ("blocks/lefttd.php"); ?>
					<td valign="top">
                        <?php echo $myrow["text"]; ?></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
        <?php include ("blocks/footer.php"); ?>
	</tr>
</table>
</body>
</html>