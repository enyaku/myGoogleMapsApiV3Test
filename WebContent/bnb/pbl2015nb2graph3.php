<?php






$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'enyaku2014';

$link = mysql_connect($dbhost, $dbuser, $dbpass)
   or die('Could not connect: ' . mysql_error());

mysql_select_db('buttonnb') or die('Could not select database');

$data=array();

//get data from database
$sql = "SELECT return_value, currtime FROM balr2_tbl LIMIT 150";
$result = mysql_query($sql) or die('Query failed: ' . mysql_error());
if ($result) {
  while ($row = mysql_fetch_assoc($result)) {
      $return_value = $row["return_value"];
      $count = $row["currtime"];
      //add to data areray
      $data[$count] = $return_value;


  }
}










include('phpgraphlib.php');
include('phpgraphlib_pie.php');
$graph = new PHPGraphLibPie(400, 200);


$graph->addData($data);
$graph->setTitle('Analyze');

//$data = array("CBS" => 6.3, "NBC" => 4.5,"FOX" => 2.8, "ABC" => 2.7, "CW" => 1.4);
$graph->addData($data);
//$graph->setTitle('8/29/07 Top 5 TV Networks Market Share');
$graph->setLabelTextColor('50,50,50');
$graph->setLegendTextColor('50,50,50');
$graph->createGraph();


