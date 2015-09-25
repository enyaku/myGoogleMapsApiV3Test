
<?php
// Get cURL resource
$curl = curl_init();
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.spark.io/v1/devices/53ff6e066667574852402567/tempinC/?access_token=11fa6a2d61ba3ed644acdcde81c36017bacf626d',
    CURLOPT_USERAGENT => 'paulscott.co.za'
));
// Send the request & save response to $resp
$resp = curl_exec($curl);
// Close request to clear up some resources
curl_close($curl);

$data = json_decode($resp);
$temp = $data->result;
echo "<h3>Current temperature is: " . $temp . " C</h3>";

// MySQL stuff... sigh
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'enyaku2014';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$sql = 'INSERT INTO biltong2 '.
       '(temperature) '.
       'VALUES ( '.$temp.')';

mysql_select_db('buttonnb');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
//echo "Entered data successfully\n";
mysql_close($conn);

// check out the nifty graph...
//echo '<h3>Temperatures in the Biltong maker over time</h3> <img src="graph4.php" />';

//include('phpgraphlib.php');

include('graph4.php');
