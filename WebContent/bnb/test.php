
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
			<h1>実践１：遠隔LED ON/OFFする</h1>
		</div>
		<form method="POST">

			LED1号： 
			<input class="btn btn-default btn-lg" type="submit" name="cmd" value="ON"> 
			<input class="btn btn-default btn-lg" type="submit" name="cmd" value="OFF"> 
<br/>

                        LED2号：
                        <input class="btn btn-default btn-lg" type="submit" name="cmd" value="ON2"/>
                        <input class="btn btn-default btn-lg" type="submit" name="cmd" value="OFF2"/>
<br/>

                        LED3号：
                        <input class="btn btn-default btn-lg" type="submit" name="cmd" value="ON3"/>
                        <input class="btn btn-default btn-lg" type="submit" name="cmd" value="OFF3"/>
<br/>

                        LED4号：
                        <input class="btn btn-default btn-lg" type="submit" name="cmd" value="ON4"/>
                        <input class="btn btn-default btn-lg" type="submit" name="cmd" value="OFF4"/>




                <div class="page-header">
                        <h1>実践2：遠隔振動モード ON/OFFする</h1>
                </div>



                        <input class="btn btn-default btn-lg" type="submit" name="cmd" value="ON5"/>
                        <input class="btn btn-default btn-lg" type="submit" name="cmd" value="OFF5"/>




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

