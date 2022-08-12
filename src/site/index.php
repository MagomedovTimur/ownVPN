<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>ownVPN</title>
		<link href="src/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="src/css/background.css" rel="stylesheet" type="text/css">
		<link href="src/css/console.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="src/css/font-awesome.css">
	</head>

	<body class="msb-x">

		<div class="wrapper">

			<!-- navbar -->
			<nav class="mnb navbar navbar-default navbar-fixed-top" style="display: none;">
			  <div class="container-fluid">
				<div class="navbar-header">
				  <div>
					 <p id="msbo"><i class="fa fa-bars"></i> Account</p>
				  </div>
				</div>
			  </div>
			</nav>
			
			<!-- sidebar -->
			<div class="msb" id="msb" style="display: none;">
					<nav class="navbar navbar-default m-0 p-2" role="navigation">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<div class="brand-wrapper">
								<!-- Brand -->
								<div class="brand-name-wrapper" style="cursor: pointer;">
										ownVPN
								</div>

							</div>

						</div>

						<!-- Main Menu -->
						<div class="side-menu-container">
							<ul class="nav navbar-nav">

								<li class="menulink menulinkActive"><a><i class="fa fa-server"></i> Server</a></li>
								<li class="menulink"><a><i class="fa fa-users"></i> Clients</a></li>
								<li class="menulink"><a><i class="fa fa-exchange"></i> Bridges</a></li>
								<li class="menulink"><a><i class="fa fa-cloud"></i> Networks</a></li>
								<li class="menulink"><a><i class="fa fa-cogs"></i> Console</a></li>

							</ul>
						</div><!-- /.navbar-collapse -->
					</nav>  
			</div>
			

			<!--main content wrapper-->
			<div class="mcw" style="display: none;">

				<!-- SERVER wrapper -->
				<div class="cv" id="msbServer">
					<div class="container-fluid">
						<div class="row">

							<div class="col-md-2 card p-3 m-2">
									<div class="bridgeName">OpenVPN</div>
									<div class="bridgeIp">Server config</div>
							</div>

							<div class="col-md-2 card p-3 m-2">
									<div class="bridgeName">OpenVPN</div>
									<div class="bridgeIp">Client config</div>
							</div>

						</div>
					</div>
				</div>

				<!-- CLIENTS wrapper -->
				<div class="cv" id="msbClients" style="display: none;">
					<div class="container-fluid">
						<div class="row">
							<button class="col-md-2 card p-3 m-2 clientCard">
									<div class="bridgeName">John228</div>
									<div class="bridgeIp">1 day 23 hours</div>
							</button>

							<button class="col-md-2 card p-3 m-2 clientCard">
									<div class="bridgeName">Terminator1337</div>
									<div class="bridgeIp">Not expirable</div>
							</button>

							<button id="addBridge" class="col-md-2 card p-3 m-2 text-center">
								+
							</button>
						</div>
					</div>
				</div>

				<!-- BRIDGES wrapper -->
				<div class="cv" id="msbBridges" style="display: none;">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-2 card p-3 m-2">
									<div class="bridgeName">Bridge name</div>
									<div class="bridgeIp">192.168.1.1</div>
							</div>

							<div id="addBridge" class="col-md-2 card p-3 m-2 text-center">
								+
							</div>
						</div>
					</div>
				</div>

				<!-- NETWORKS wrapper -->
				<div class="cv" id="msbNetworks" style="display: none;">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-2 card p-3 m-2">
									<div class="bridgeName">Network name</div>
									<div class="bridgeIp">192.168.1.1 - 255.255.255.0</div>
							</div>

							<div id="addBridge" class="col-md-2 card p-3 m-2 text-center">
								+
							</div>
						</div>
					</div>
				</div>

				<!-- CONSOLE wrapper -->
				<div class="cv min-vh-100" id="msbConsole" style="display: none;">
					<div class="container-fluid min-vh-100">
						<div class="row">
							<div class="col-12">
								<textarea class="commandOutput" readonly></textarea>
							</div>
							<div class="col-11 commandInput">
								<input type="text" placeholder="Command">
							</div>
							<div class="col-1">
								<button type="submit" id="consoleButton">Submit</button>
							</div>
						</div>
					</div>
				</div>

			</div>

			<!-- Bubbles -->
			<ul class="bg-bubbles" style="display: none;">
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>	


		</div>


		<!-- Clinet dialog box -->
		<div class="dialog" id="clientDialog" style="display: none;">
			<div class="container-fluid px-5 py-4">
				<div class="row">
					<p class="col-12 text-center" style="font-size: 1.25rem;" >
						Username
					</p>
					<div class="col-12">
						<input type="text">
					</div>

					<p class="col-12 text-center pt-4" style="font-size: 1.25rem;" >
						Password
					</p>
					<div class="col-12">
						<input type="text">
					</div>

					<p class="col-12 text-center pt-4" style="font-size: 1.25rem;" >
						Expriration Date
					</p>
					<div class="col-10">
						<input id="dateInput" type="datetime-local">
					</div>
					<div class="col-2 text-center" style="font-size:2.1rem; cursor: pointer;   user-select: none;" onclick='setDate(new Date())'>
						&#x21bb;
					</div>
					<div class="col-2 text-center">
						Year
					</div>
					<div class="col-2 text-center">
						Mounth
					</div>
					<div class="col-2 text-center">
						Day
					</div>
					<div class="col-2 text-center">
						Hour
					</div>
					<div class="col-2 text-center">
						Minute
					</div>
					<div class="col-2 text-center">
						Second
					</div>

					<div class="col-1 text-center timeButtonLeft" onclick="changeDate('Year', -1);"><i class="fa fa-minus" aria-hidden="true"></i></div>
					<div class="col-1 text-center timeButtonRight" onclick="changeDate('Year', 1);"><i class="fa fa-plus" aria-hidden="true"></i></div>
					<div class="col-1 text-center timeButtonLeft" onclick="changeDate('Mounth', -1);"><i class="fa fa-minus" aria-hidden="true"></i></div>
					<div class="col-1 text-center timeButtonRight" onclick="changeDate('Mounth', 1);"><i class="fa fa-plus" aria-hidden="true"></i></div>
					<div class="col-1 text-center timeButtonLeft" onclick="changeDate('Day', -1);"><i class="fa fa-minus" aria-hidden="true"></i></div>
					<div class="col-1 text-center timeButtonRight" onclick="changeDate('Day', 1);"><i class="fa fa-plus" aria-hidden="true"></i></div>
					<div class="col-1 text-center timeButtonLeft" onclick="changeDate('Hour', -1);"><i class="fa fa-minus" aria-hidden="true"></i></div>
					<div class="col-1 text-center timeButtonRight" onclick="changeDate('Hour', 1);"><i class="fa fa-plus" aria-hidden="true"></i></div>
					<div class="col-1 text-center timeButtonLeft" onclick="changeDate('Minute', -1);"><i class="fa fa-minus" aria-hidden="true"></i></div>
					<div class="col-1 text-center timeButtonRight" onclick="changeDate('Minute', 1);"><i class="fa fa-plus" aria-hidden="true"></i></div>
					<div class="col-1 text-center timeButtonLeft" onclick="changeDate('Second', -1);"><i class="fa fa-minus" aria-hidden="true"></i></div>
					<div class="col-1 text-center timeButtonRight" onclick="changeDate('Second', 1);"><i class="fa fa-plus" aria-hidden="true"></i></div>

					<button type="submit col-12" class="mt-4">Apply</button>
					<div class="col-12 text-center" style="cursor: pointer;" onclick="closeDialog();">Cancel</div>
				</div>
			</div>
		</div>

		<script src="src/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="src/js/jquery.min.js" type="text/javascript"></script>
		<script src="src/js/console.js" type="text/javascript"></script>
	</body>
</html>