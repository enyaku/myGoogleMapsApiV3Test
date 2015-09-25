
<html>
<head>
<title>PHP TEST</title>
</head>
<body>

<?php







$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'enyaku2014';

$link = mysql_connect($dbhost, $dbuser, $dbpass)
   or die('Could not connect: ' . mysql_error());
     
mysql_select_db('buttonnb') or die('Could not select database');
  
$dataArray=array();

//get data from database
$sql = "SELECT temperature, id, currtime FROM biltong LIMIT 150";
$result = mysql_query($sql) or die('Query failed: ' . mysql_error());
if ($result) {
  while ($row = mysql_fetch_assoc($result)) {
      $temperature = $row["temperature"];
      $count = $row["currtime"];
$id = $row["id"];

    print('<p>');
    print('temperature='.$temperature);
    print('id='.$id);
    print(',currtime='.$currtime);
    print('</p>');



  }
}




$link = mysql_connect('localhost', 'root', 'enyaku2014');
if (!$link) {
    die('接続失敗です。'.mysql_error());
}

print('<p>接続に成功しました。</p>');

$db_selected = mysql_select_db('buttonnb', $link);
if (!$db_selected){
    die('データベース選択失敗です。'.mysql_error());
}

print('<p>uriageデータベースを選択しました。</p>');

mysql_set_charset('utf8');

$sql = "SELECT temperature, id, currtime FROM biltong LIMIT 150";

$result = mysql_query($sql);


if (!$result) {
    die('クエリーが失敗しました。'.mysql_error());
}

while ($row = mysql_fetch_assoc($result)) {
    print('<p>');
    print('temperature='.$row['temperature']);
    print('id='.$row['id']);
    print(',currtime='.$row['currtime']);
    print('</p>');
}

$close_flag = mysql_close($link);

if ($close_flag){
    print('<p>切断に成功しました。</p>');
}

?>
</body>
</html>


