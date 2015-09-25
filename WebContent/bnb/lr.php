
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




                        <h1>左側</h1>


			<input class="btn btn-default btn-lg" type="submit" name="cmd" value="ON-L"> 
			<input class="btn btn-default btn-lg" type="submit" name="cmd" value="OFF-L"> 
<br/>




                        <h1>右側</h1>



                        <input class="btn btn-default btn-lg" type="submit" name="cmd" value="ON-R"/>
                        <input class="btn btn-default btn-lg" type="submit" name="cmd" value="OFF-R"/>




		</form> 

		<?php
		if (isset($_POST['cmd']) == TRUE)
		{





                        if ($_POST['cmd'] === "ON-L" || $_POST['cmd'] === "OFF-L")

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

