
<?php
include('phpgraphlib/phpgraphlib.php');
$graph = new PHPGraphLib(1100,700); 
$dataArray = array();

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
      //add to data areray
      $dataArray[$count] = $temperature;

    print('<p>');

    print('id='.$row['id']);

    print(',temperature='.$row['temperature']);

    print('currtime='.$row['currtime']);

    print('</p>');




  }
}
//configure graph
$graph->addData($dataArray);
$graph->setTitle("Temperature");
$graph->setGradient("lime", "green");
$graph->setBarOutlineColor("black");
$graph->setBars(false);
$graph->setLine(true);
$graph->createGraph();
//echo $sql;
?>

