
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




                        <h1>前</h1>


                        <input class="btn btn-default btn-lg" type="submit" name="cmd" value="ON-B">
                        <input class="btn btn-default btn-lg" type="submit" name="cmd" value="OFF-B">
<br/>




                        <h1>後</h1>


                        <input class="btn btn-default btn-lg" type="submit" name="cmd" value="ON-A">
                        <input class="btn btn-default btn-lg" type="submit" name="cmd" value="OFF-A">
<br/>




                        <h1>左</h1>


			<input class="btn btn-default btn-lg" type="submit" name="cmd" value="ON-L"> 
			<input class="btn btn-default btn-lg" type="submit" name="cmd" value="OFF-L"> 
<br/>




                        <h1>右</h1>



                        <input class="btn btn-default btn-lg" type="submit" name="cmd" value="ON-R"/>
                        <input class="btn btn-default btn-lg" type="submit" name="cmd" value="OFF-R"/>


<br/>




                        <h1>STOP</h1>



                        <input class="btn btn-default btn-lg" type="submit" name="cmd" value="ON-LR"/>
                        <input class="btn btn-default btn-lg" type="submit" name="cmd" value="OFF-LR"/>





		</form> 

		<?php
		if (isset($_POST['cmd']) == TRUE)
		{



                      if ($_POST['cmd'] === "ON-B" || $_POST['cmd'] === "OFF-B")

                      {

                                $url = "https://api.spark.io/v1/devices/53ff6e066667574852402567/gtb";

                       		 $data = array(

                           		 'access_token' => '11fa6a2d61ba3ed644acdcde81c36017bacf626d',

                           		 'params' => $_POST['cmd']
                       		 );

                        }



                        else if ($_POST['cmd'] === "ON-A" || $_POST['cmd'] === "OFF-A")

                        {

                                $url = "https://api.spark.io/v1/devices/53ff6e066667574852402567/gta";

                                 $data = array(

                                         'access_token' => '11fa6a2d61ba3ed644acdcde81c36017bacf626d',

                                         'params' => $_POST['cmd']
                                 );

                        }

                        else if ($_POST['cmd'] === "ON-L" || $_POST['cmd'] === "OFF-L")

                        {

                                $url = "https://api.spark.io/v1/devices/53ff6e066667574852402567/gtl";

                                 $data = array(

                                         'access_token' => '11fa6a2d61ba3ed644acdcde81c36017bacf626d',

                                         'params' => $_POST['cmd']
                                 );

                        }



                        else if ($_POST['cmd'] === "ON-R" || $_POST['cmd'] === "OFF-R")

                        {

                                $url = "https://api.spark.io/v1/devices/53ff6e066667574852402567/gtr";

                                 $data = array(

                                         'access_token' => '11fa6a2d61ba3ed644acdcde81c36017bacf626d',

                                         'params' => $_POST['cmd']
                                 );

                        }



                        else if ($_POST['cmd'] === "ON-LR" || $_POST['cmd'] === "OFF-LR")

                        {

                                $url = "https://api.spark.io/v1/devices/53ff6e066667574852402567/gtstop";

                                 $data = array(

                                         'access_token' => '11fa6a2d61ba3ed644acdcde81c36017bacf626d',

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

