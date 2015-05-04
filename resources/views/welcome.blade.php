<html>
	<head>
		<title>Laravel</title>
		
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
				display: table;
				font-weight: 200;
				font-family: 'Lato';
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 60px;
				margin-bottom: 40px;
			}

			.quote {
				font-size: 24px;
			}
			
			.link {
				font-size: 20px;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="content">
				<div class="title">Library Management System</div>
				<div class="quote">{{ Inspiring::quote() }}</div>
				<br><br>
				<div class="link"><a href='/auth/login'>Continue</a></div>
			</div>
		</div>
	</body>
</html>
