
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>[ボタン型]感覚ナビゲーションシステム</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<form method="POST">



                <div class="page-header">
                        <h1>実践2：遠隔振動モード ON/OFFする</h1>
                </div>





<table width="100%" border="1" style="background:#CCC">
  <tr>
    <td align="center" bgcolor="#FFFFFF"></td>
    <td align="center" bgcolor="#FFFFFF"></td>
    <td align="center" bgcolor="#FFFFFF”>
<input type="submit" name="cmd" value=“ON前”/>
</td>
    <td align="center" bgcolor="#FFFFFF”>
<input type="submit" name="cmd" value=“OFF前”/>
</td>

     <td align="center" bgcolor="#FFFFFF"></td>
    <td align="center" bgcolor="#FFFFFF"></td>
  </tr>



  <tr>
    <td align="center" bgcolor="#FFFFFF"><input type="submit" name="cmd" value=“ON左”>
 </td>
    <td align="center" bgcolor="#FFFFFF"><input type="submit" name="cmd" value=“OFF左”>
 </td>
    <td align="center" bgcolor="#FFFFFF”>
</td>
    <td align="center" bgcolor="#FFFFFF”>
</td>

     <td align="center" bgcolor="#FFFFFF"><input type="submit" name="cmd" value=“ON右”/>
 </td>
    <td align="center" bgcolor="#FFFFFF"><input type="submit" name="cmd" value=“OFF右”/>
 </td>
  </tr>


  <tr>
    <td align="center" bgcolor="#FFFFFF"></td>
    <td align="center" bgcolor="#FFFFFF"></td>
    <td align="center" bgcolor="#FFFFFF”>
<input type="submit" name="cmd" value=“ON後”/>
</td>
    <td align="center" bgcolor="#FFFFFF”>
<input type="submit" name="cmd" value=“OFF後”/>
</td>

     <td align="center" bgcolor="#FFFFFF"></td>
    <td align="center" bgcolor="#FFFFFF"></td>
  </tr>


</table>







		</form> 

		<?php
		if (isset($_POST['cmd']) == TRUE)
		{

                        if ($_POST['cmd'] === "ON" || $_POST['cmd'] === "OFF")
			{
				$url = "https://api.spark.io/v1/devices/55ff6e066678505535441367/led1";
                        }
			else if ($_POST['cmd'] === "ON2" || $_POST['cmd'] === "OFF2")
                        {
                                $url = "https://api.spark.io/v1/devices/55ff6e066678505535441367/led2";
                        }

                        else if ($_POST['cmd'] === "ON3" || $_POST['cmd'] === "OFF3")
                        {
                                $url = "https://api.spark.io/v1/devices/55ff6e066678505535441367/led3";
                        }


                        else if ($_POST['cmd'] === "ON4" || $_POST['cmd'] === "OFF4")
                        {
                                $url = "https://api.spark.io/v1/devices/55ff6e066678505535441367/led4";
                        }

                        else if ($_POST['cmd'] === "ON5" || $_POST['cmd'] === "OFF5")
                        {
                                $url = "https://api.spark.io/v1/devices/55ff6e066678505535441367/analogwrite";
                        }




			$data = array(
			    'access_token' => '48e0e1ad38c2bb01f508b175ad71cf6d9f89aa58',
			    'params' => $_POST['cmd']
			);

			$content = http_build_query($data);

			$options = array('http' => array(
				'timeout'=>10,
			    'method' => 'POST',
			    'content' => $content
			));

			$contents = @file_get_contents($url, false, stream_context_create($options));

			if ($contents === FALSE)
			{
				echo '<p class="lead" style="color: red; font-size:36px;">Error!</p>';
			}
			else
			{
				echo '<p class="lead" style="color: blue; font-size:36px;">Success!</p>';
			}
		}
		?>


	</div>
</body>
</html>

