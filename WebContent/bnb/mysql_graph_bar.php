

$link = mysql_connect('localhost', 'root', 'enyaku2014')
   or die('Could not connect: ' . mysql_error());
     
mysql_select_db('buttonnb') or die('Could not select database');
  
$dataArray=array();
  
//get data from database
$sql="SELECT return_value, currtime FROM balr2_tbl";
$result = mysql_query($sql) or die('Query failed: ' . mysql_error());
if ($result) {
  while ($row = mysql_fetch_assoc($result)) {
      $return_value=$row["return_value"];
      $count=$row["currtime"];
      //add to data areray
      $dataArray[$count]=$return_value;
  }
}
  
//configure graph
$graph->addData($dataArray);
$graph->setTitle("Sales by Group");
$graph->setGradient("lime", "green");
$graph->setBarOutlineColor("black");
$graph->createGraph();
?>

