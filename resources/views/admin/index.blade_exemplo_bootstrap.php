<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<body>

		<div class="container" style="background-color: red">
			<h1>Hello world</h1>
		</div>

		<div class="container" style="background-color: red">
			<div class="row no-gutters" style="background-color: green">
				<div class="col " style="background-color: yellow">
					coluna1
				</div>
				<div class="col" style="background-color: white">
					coluna12
				</div>
				<div class="col " style="background-color: yellow">
					coluna13
				</div>
			</div>

			<div class="row " style="height: 200px; background-color: green">
				<div class="col align-self-start" style="background-color: blue">
					coluna12
				</div>
				<div class="col align-self-center" style="background-color: white">
					coluna1
				</div>
				<div class="col align-self-end" style="background-color: red">
					coluna13
				</div>
			</div>

			<div class="row justify-content-start" style="height: 200px; background-color: green">
				<div class="col-3" style="background-color: blue">
					coluna12
				</div>
				<div class="col-3" style="background-color: white">
					coluna1
				</div>
				<div class="col-3" style="background-color: red">
					coluna13
				</div>
			</div>

			<div class="row justify-content-around" style="height: 200px; background-color: green">
				<div class="col-3" style="background-color: blue">
					coluna12
				</div>
				<div class="col-3" style="background-color: white">
					coluna1
				</div>
				<div class="col-3" style="background-color: red">
					coluna13
				</div>
			</div>

			<div class="row justify-content-between" style="height: 200px; background-color: green">
				<div class="col-3" style="background-color: blue">
					coluna12
				</div>
				<div class="col-3" style="background-color: white">
					coluna1
				</div>
				<div class="col-3" style="background-color: red">
					coluna13
				</div>
			</div>
		</div>


		<div class="container">
			<h1>Media Objec</h1>
			<div class="media">
				<img class="mr-3" src="http://via.placeholder.com/350x150">
				<div class="media-body">
					<h5>Titulo</h5>
					Loren ipsum lorem ipsun...
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col">nivel 1
					<div class="row">
						<div class="col">nivel 2</div>
						<div class="col">nivel 2</div>
						<div class="col">nivel 2</div>
					</div>
				</div>
				<div class="col">nivel 1 
					<div class="row">
							<div class="col">nivel 2</div>
							<div class="col">nivel 2</div>
							<div class="col">nivel 2</div>
					</div>
				</div>
 
			</div>
		</div>
	

<script type="text/javascript" src="/js/app.js"></script>
</body>
</html>