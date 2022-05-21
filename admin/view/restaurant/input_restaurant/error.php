<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>401:Unauthorized</title>

	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">

	<style>
		* {
  			box-sizing: border-box;
		}

		body {
			padding: 0;
			margin: 0;
		}

		#notfound {
			position: relative;
			height: 100vh;
            background: linear-gradient(to top, #fbc2eb 0%, #a18cd1 100%);
		}

        .notfound {
			position: absolute;
			left: 50%;
			top: 50%;
			transform: translate(-50%, -50%);
		}

		.notfound {
			max-width: 767px;
			width: 100%;
			line-height: 1.4;
			padding: 110px 40px;
			text-align: center;
			background: #fff;
			box-shadow: 0 15px 15px -10px rgba(0, 0, 0, 0.1);
		}

		.notfound-404 {
			position: relative;
			height: 180px;
		}

		.notfound-404 h1 {
			font-family: 'Roboto', sans-serif;
			position: absolute;
			left: 50%;
			top: 50%;
			transform: translate(-50%, -50%);
			font-size: 165px;
			font-weight: 700;
			margin: 0px;
			color: #262626;
			text-transform: uppercase;
		}

		.notfound .notfound-404 h1>span {
			color: #00b7ff;
		}
	</style>
</head>

<body>
	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>4<span>0</span>1</h1>
			</div>
			<h2>Unauthorized User</h2>
		</div>
	</div>
</body>
</html>
