
<?php
//<?php error_reporting = E_ALL & ~E_DEPRECATED;




$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'enyaku2014';

$link = mysql_connect($dbhost, $dbuser, $dbpass)
   or die('Could not connect: ' . mysql_error());
     
mysql_select_db('buttonnb') or die('Could not select database');
  
$dataArray=array();

//get data from database
$sql = "SELECT return_value, currtime FROM balr2_tbl LIMIT 150";
$result = mysql_query($sql) or die('Query failed: ' . mysql_error());
if ($result) {
  while ($row = mysql_fetch_assoc($result)) {
      $return_value = $row["return_value"];
      $count = $row["currtime"];
      //add to data areray
      $dataArray[$count] = $return_value;



//    print('<p>');
  //  print('return_value='.$row['return_value']);
    //print(',currtime='.$row['currtime']);
   // print('</p>');

  }
}






//setup graph
$graph = new stdclass;
$graph->width = 1300;
$graph->height = 700;
//$graph->data=array('AL'=>3731, 'MI'=>763, 'NY'=>3245, 'TX'=>4373, 'WA'=>12124, 'WY'=>5535);
$graph->data=$dataArray;

$graph->setGradient = array('red', 'maroon');
$graph->setLegend = 'true';
$graph->setLegendTitle = 'B-A-L-R';
$graph->setTitle = 'Analyze';
$graph->setTitleLocation = 'left';
  
//JSON encode graph object
$encoded = urlencode(json_encode($graph));
  
//retrieve XML
$target = 'http://www.ebrueggeman.com/phpgraphlib/api/?g=' . $encoded . '&type=xml';
$xml_object =  new SimpleXMLElement($target, NULL, TRUE);
  
//if there are no errors, display graph
if (empty($xml_object->error)) {
  echo $xml_object->imageTag;
}
else {
  echo 'There was an error generating the graph: '. $xml_object->error;
}



?>

