<?php


include('phpgraphlib.php');
$graph = new PHPGraphLib(1300,700);

//$data = array("1" => .0032, "2" => .0028, "3" => .0021, "4" => .0033, 
//	"5" => .0034, "6" => .0031, "7" => .0036, "8" => .0027, "9" => .0024, 
//	"10" => .0021, "11" => .0026, "12" => .0024, "13" => .0036, 
//	"14" => .0028, "15" => .0025);



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







$graph->addData($data);
$graph->setTitle('Analyze');
$graph->setBars(false);
$graph->setLine(true);
$graph->setDataPoints(true);
$graph->setDataPointColor('maroon');
$graph->setDataValues(true);
$graph->setDataValueColor('maroon');
$graph->setGoalLine(.0025);
$graph->setGoalLineColor('red');
$graph->createGraph();
