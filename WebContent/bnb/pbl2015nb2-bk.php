
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>0605[ボタン型]感覚ナビゲーションシステム</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="page-header">
			<h1>クラウドリモコン振動ナビゲーション支援システム</h1>
		</div>
		<form method="POST">

  <h1>ONにする</h1>
<table border="0" cellpadding="0">

<tr> <td></td>  <td></td>  <td> <input class="btn btn-default btn-lg" type="submit" name="cmd" value="ON-B"/> </td>  <td></td>  <td></td> </tr>

<tr> <td></td>  <td><input class="btn btn-default btn-lg" type="submit" name="cmd" value="ON-L"></td>  <td><input class="btn btn-default btn-lg" type="submit" name="cmd" value="ON-S"/></td>  <td><input class="btn btn-default btn-lg" type="submit" name="cmd" value="ON-R"/></td>  <td></td> </tr>

<tr> <td></td>  <td></td>  <td> <input class="btn btn-default btn-lg" type="submit" name="cmd" value="ON-A"/> </td>  <td></td>  <td></td> </tr>


</table>

<br>

  <h1>OFFにする</h1>


<table border="0" cellpadding="0">



<tr> <td></td>  <td></td>  <td> <input class="btn btn-default btn-lg" type="submit" name="cmd" value="OFF-B"/> </td>  <td></td>  <td></td> </tr>



<tr> <td></td>  <td><input class="btn btn-default btn-lg" type="submit" name="cmd" value="OFF-L"></td>  <td><input class="btn btn-default btn-lg" type="submit" name="cmd" value="OFF-S"/></td>  <td><input class="btn btn-default btn-lg" type="submit" name="cmd" value="OFF-R"/></td>  <td></td> </tr>



<tr> <td></td>  <td></td>  <td> <input class="btn btn-default btn-lg" type="submit" name="cmd" value="OFF-A"/> </td>  <td></td>  <td></td> </tr>





</table>






		</form> 

		<?php
		if (isset($_POST['cmd']) == TRUE)
		{





                        if ($_POST['cmd'] === "ON-B" || $_POST['cmd'] === "OFF-B")

                        {

                                $url = "https://api.spark.io/v1/devices/55ff6e066678505535441367/gtb";





                        $data = array(


                            'access_token' => '48e0e1ad38c2bb01f508b175ad71cf6d9f89aa58',

                            'params' => $_POST['cmd']
                        );




                        }



                        else if ($_POST['cmd'] === "ON-A" || $_POST['cmd'] === "OFF-A")

                        {

                                $url = "https://api.spark.io/v1/devices/55ff6e066678505535441367/gta";





                        $data = array(


                            'access_token' => '48e0e1ad38c2bb01f508b175ad71cf6d9f89aa58',

                            'params' => $_POST['cmd']
                        );




                        }




                       else if ($_POST['cmd'] === "ON-L" || $_POST['cmd'] === "OFF-L")

                        {


                                $url = "https://api.spark.io/v1/devices/55ff6e066678505535441367/gtl";


                        $data = array(


                            'access_token' => '48e0e1ad38c2bb01f508b175ad71cf6d9f89aa58',

                            'params' => $_POST['cmd']
                        );





                        }





                        else if ($_POST['cmd'] === "ON-R" || $_POST['cmd'] === "OFF-R")

                        {

                                $url = "https://api.spark.io/v1/devices/55ff6e066678505535441367/gtr";





                        $data = array(


                            'access_token' => '48e0e1ad38c2bb01f508b175ad71cf6d9f89aa58',

                            'params' => $_POST['cmd']
                        );




                        }






			$content = http_build_query($data);

			$options = array('http' => array(
				'timeout'=>10,
			    'method' => 'POST',
			    'content' => $content
			));




			$contents = @file_get_contents($url, false, stream_context_create($options));




print('URL='.$url);

			if ($contents === FALSE)
			{
				echo '<p class="lead" style="color: red; font-size:36px;">Error!</p>';
			}
			else
			{

				echo '<p class="lead" style="color: blue; font-size:36px;">Success!</p>';


                               print('---------------------');
                              print($contents);

//strlen($contents22);
//$temp99=$substr( $contents, 2, strlen($contents)-2 );

//print('~~~~~~~~~~~~~~~~~~~~~');
// print($temp99);


$str1 = 'abcdef';
$substr1 = substr($str1, 0, 1);
$substr2 = substr($str1, 2, 3);

print($str1.' の0バイトから1バイト取り出すと '.$substr1.' です<br>');
print($str1.' の2バイトから3バイト取り出すと '.$substr2.' です<br><br>');

$str2 = 'こんにちは';
$substr3 = substr($str2, 2, 2);
$substr4 = mb_substr($str2, 2, 2);

print($str2.' の2バイトから2バイト取り出すと '.$substr3.' です<br>');
print($str2.' の2文字目から2文字取り出すと '.$substr4.' です<br>');


// 5文字の文字列
$moji = '12345';

print strlen($moji);  // 5 と表示されます

print( strlen($contents) - 1);  // contents と表示されます
$substr3 = substr($contents, 2, strlen($contents) - 4);
$substr4 = substr($substr3,  strlen($substr3) - 2  , strlen($substr3) - 3);

print($contents.' の最後の1バイト取り出すと '.$substr3.' です<br>');

print($substr3.' の最後の1バイト: '.$substr4.'です<br>');



                               print('---------------------');


//{ "id": "55ff6e066678505535441367", "last_app": "", "connected": true, "return_value": 1 }


$pieces = explode(",", '.$substr3.');

print("~~~~~~~~~~~~~~");
print($pieces[3]);

print("~~~~~~~~~~~~~~");

$temp2 = explode(":", $pieces[3]);

print("~~~~~~~~~~~~~~");
print($temp2);

print("~~~~~~~~~~~~~~");


$temp=$temp2[1];

print('<br>');
print($temp);
print('<br>');




// MySQL stuff... sigh

$dbhost = 'localhost';

$dbuser = 'root';

$dbpass = 'enyaku2014';

$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if(! $conn )

{

  die('Could not connect: ' . mysql_error());

}

//$sql = 'INSERT INTO balr_tbl '.
//       '(id,last_app,connected,return_value    ) '.
//       'VALUES ( $pieces[0], $pieces[1],$pieces[2],$pieces[3]   )';


//$sql = "INSERT INTO balr2_tbl (return_value) VALUES ($pieces[3])";

print("~~~~~~~~~~~~~~");
print($temp);

print("~~~~~~~~~~~~~~");

$sql = 'INSERT INTO balr2_tbl '.
       '(return_value) '.
       'VALUES ('.$substr4.')';



mysql_select_db('buttonnb');

$retval = mysql_query( $sql, $conn );

if(! $retval )

{

  die('Could not enter data: ' . mysql_error());

}

//echo "Entered data successfully\n";

mysql_close($conn);


$str = ' ab cd ';
echo strlen($str); // 7





			}
		}

		?>


	</div>


</body>
</html>

