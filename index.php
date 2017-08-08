<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>DBMS</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" />
	<link rel="stylesheet" href="https://rmutl-db1.us/assets/css/dbms.css" />
	<style type="text/css" media="screen">
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
		      <li class="nav-item active">
		        <a class="nav-link" href="https://rmutl-db1.us/firebase/">Firebase</a>
		      </li>
		      <li class="nav-item active">
		        <a class="nav-link" href="https://rmutl-db1.us/about/">About</a>
		      </li>
		    </ul>
		  </div>
	</nav>

	<div class="container container-home">
			<div class="row">
				<div class="col-lg-12">
					<div class="page-header"><i class="fa fa-database" aria-hidden="true"></i> MySQL Monitor</div>
					<hr>
				</div>
				<div class="col-lg-6 dbms-col">
					<div class="row">
						<div class="col-lg-12">
							<div style="text-align: center;">
								<div id="temp_meter" class="gauge"></div>
							</div>
						</div>
						<div class="col-lg-12">
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
                    </div>
				</div>
				<div class="col-lg-6 dbms-col">
					<div class="row">
						<div class="col-lg-12">
							<div style="text-align: center;">
								<div id="humi_meter" class="gauge"></div>
							</div>
						</div>
						<div class="col-lg-12">
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
		            </div>
				</div>
			</div>
	</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
	<script src="https://rmutl-db1.us/assets/js/raphael-2.1.4.min.js"></script>
	<script src="https://rmutl-db1.us/assets/js/justgage.js"></script>
	<script src="https://rmutl-db1.us/assets/js/mysql.js"></script>
</body>
</html>