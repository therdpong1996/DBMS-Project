<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>DBMS</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
	<link rel="stylesheet" href="https://therdpong.rmutl-db1.us/assets/css/dbms.css" />
	<style type="text/css" media="screen">
		body{
			margin-bottom: 30px;
		}
	  	.gauge {
	    	width: 300px;
	    	height: 250px;
	    	display: inline-block;
	  	}
	</style>
</head>
<body>
	<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand" href="#"><i class="fa fa-database" aria-hidden="true"></i> <strong>DB</strong>MS</a>
		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <!--<li class="nav-item active">
		        <a class="nav-link" href="https://therdpong.rmutl-db1.us/firebase/">Firebase</a>
		      </li>-->
		      <li class="nav-item active">
		        <a class="nav-link" href="https://therdpong.rmutl-db1.us/about/">About</a>
		      </li>
		    </ul>
		  </div>
	</nav>

	<div class="container container-home">
			<div class="row">
				<div class="col-lg-12">
					<div class="page-header">
						<div class="pull-left"><i class="fa fa-database" aria-hidden="true"></i> MySQL Monitor</div>
						<div class="pull-right"><i class="fa fa-clock-o" aria-hidden="true"></i> Last Update <span id="uptime">Loading..</span> </div>
						<div style="clear: both;"></div>
					</div>
					<hr>
				</div>
				<div class="col-lg-6 dbms-col">
					<div style="background: #e5e5e5; border-radius: 5px; padding: 10px;">
						<div class="row">
							<div class="col-lg-12">
								<div style="text-align: center;">
									<div id="temp_meter" class="gauge"></div>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="card card-inverse card-success fadeIn animated">
			                        <div class="card-block bg-success">
			                            <div class="rotate">
			                                <i class="fa fa-thermometer-quarter fa-5x"></i>
			                            </div>
			                            <h6 class="text-uppercase"><i class="fa fa-thermometer-quarter"></i> Temperature</h6>
			                            <h1 class="display-1" id="display-temp">Loading..</h1>
			                        </div>
			                    </div>
		                    </div>
		                    <div class="col-lg-4">
		                    	<div class="card card-inverse card-success fadeIn animated" data-toggle="modal" data-target="#temp-chart" style="text-align: center; padding: 3px; cursor: pointer;">
			                        <div class="card-block bg-success">
			                            <h6 class="text-uppercase"><i class="fa fa-thermometer-quarter"></i> Graph</h6>
			                            <h1 class="display-1"><i class="fa fa-line-chart"></i></h1>
			                        </div>
			                    </div>
										<div id="temp-chart" class="modal fade" role="dialog">
										  <div class="modal-dialog modal-lg">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h4 class="modal-title">Temperature Graph</h4>
										      </div>
										      <div class="modal-body">
										        <canvas id="temp-graph" temp-time="0" width="400" height="200"></canvas>
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										      </div>
										    </div>

										  </div>
										</div>
		                    </div>
	                    </div>
                    </div>
				</div>
				<div class="col-lg-6 dbms-col">
					<div style="background: #e5e5e5; border-radius: 5px; padding: 10px;">
						<div class="row">
							<div class="col-lg-12">
								<div style="text-align: center;">
									<div id="humi_meter" class="gauge"></div>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="card card-inverse card-info fadeIn animated">
			                        <div class="card-block bg-info">
			                            <div class="rotate">
			                                <i class="fa fa-tint fa-5x"></i>
			                            </div>
			                            <h6 class="text-uppercase"><i class="fa fa-tint"></i> Humidity</h6>
			                            <h1 class="display-1" id="display-humi">Loading..</h1>
			                        </div>
			                    </div>
			                </div>
			                <div class="col-lg-4">
		                    	<div class="card card-inverse card-info fadeIn animated" data-toggle="modal" data-target="#humi-chart" style="text-align: center; padding: 3px; cursor: pointer;">
			                        <div class="card-block bg-info">
			                            <h6 class="text-uppercase"><i class="fa fa-fa-tint"></i> Graph</h6>
			                            <h1 class="display-1"><i class="fa fa-line-chart"></i></h1>
			                        </div>
			                    </div>
										<div id="humi-chart" class="modal fade" role="dialog">
										  <div class="modal-dialog modal-lg">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h4 class="modal-title">Humidity Graph</h4>
										      </div>
										      <div class="modal-body">
										        <canvas id="humi-graph" humi-time="0" width="400" height="200"></canvas>
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										      </div>
										    </div>

										  </div>
										</div>
		                    </div>
			            </div>
		            </div>
				</div>
				<div class="col-lg-12">
					<div class="page-header">
						<div class="pull-left"><i class="fa fa-times" aria-hidden="true"></i> Mistake Monitor</div>
						<div style="clear: both;"></div>
					</div>
					<hr>
				</div>
				<div class="col-lg-12">
					<div style="background: #e5e5e5; border-radius: 5px; padding: 10px;">
					<canvas id="mistake-graph" mistake-time="0" width="400" height="200"></canvas>
					</div>
				</div>
			</div>
	</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
	<script src="https://therdpong.rmutl-db1.us/assets/js/raphael-2.1.4.min.js"></script>
	<script src="https://therdpong.rmutl-db1.us/assets/js/justgage.js"></script>
	<script src="https://therdpong.rmutl-db1.us/assets/js/mysql.js"></script>
	<script src="https://therdpong.rmutl-db1.us/assets/js/temp.chart.js"></script>
	<script src="https://therdpong.rmutl-db1.us/assets/js/humi.chart.js"></script>
	<script src="https://therdpong.rmutl-db1.us/assets/js/mistake.chart.js"></script>
</body>
</html>
