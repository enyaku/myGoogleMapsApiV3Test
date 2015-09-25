
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
      //add to data areray
      $dataArray[$count] = $temperature;



    print('<p>');
    print('temperature='.$row['temperature']);
    print('id='.$row['id']);
    print(',currtime='.$row['currtime']);
    print('</p>');

  }
}






//setup graph
$graph = new stdclass;
$graph->width = 500;
$graph->height = 350;
//$graph->data=array('AL'=>3731, 'MI'=>763, 'NY'=>3245, 'TX'=>4373, 'WA'=>12124, 'WY'=>5535);
$graph->data=$dataArray;

$graph->setGradient = array('red', 'maroon');
$graph->setLegend = 'true';
$graph->setLegendTitle = 'Widgets';
$graph->setTitle = 'Widgets Produced Per State';
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

