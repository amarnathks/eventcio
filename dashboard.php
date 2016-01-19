<?php
include 'db.php';
session_start();
if (!isset($_SESSION['em']) || empty($_SESSION['em'])){
	header("Location: login.html");
}

$email = $_SESSION['em'];
$query = "select * from 280team.users where email= '$email'";
$result = $conn->query($query);
$row = $result->fetch_assoc();

$query2 = "select * from 280team.attendees order by att_id DESC limit 0,10";
$result2 = $conn->query($query2);


$q_cat = "select * from 280team.events";
$r_cat = $conn->query($q_cat);
					$fest = 0;
					$class = 0;
					$conference = 0;
					$social = 0;
					$reun = 0;
					$other = 0;
					//here
$event = $conn->query($q_cat);
while($row_cat = $r_cat->fetch_assoc()){
						if ($row_cat['category'] == "Class/Workshop"){
							$class = $class + 1;
						}
						if ($row_cat['category'] == "Conference"){
							$conference = $conference + 1;
						}
						if ($row_cat['category'] == "Festival"){
							$fest = $fest + 1;
						}
						if ($row_cat['category'] == "Social/Party"){
							$social = $social + 1;
						}
						if ($row_cat['category'] == "Reunion"){
							$reun = $reun + 1;
						}
						else{
							$other = $other + 1;
						}
						
					
					}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Eventcious | Dashboard</title>
	<meta name="description" content="Event registration and management made easy">
	<meta name="author" content="Eventcious">
	<meta name="keyword" content="Eventcious, Events, Local, Event management">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	
	
	<link rel="shortcut icon" href="img/favicon.ico">
	
	
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script>
	$(document).ready(function() {
    $('#navigation').load('head.php');
});
	$(document).ready(function() {
    $('#navigation2').load('dashMenu.php');
});
	</script>
		
</head>

<body>
	<div id="navigation"></div>
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<div id="navigation2"></div>
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				
				<li><a href="dashboard.php">Dashboard</a></li>
			</ul>

			<div class="row-fluid">
				
				<div class="span3 statbox purple" onTablet="span6" onDesktop="span3">
					<div class="boxchart">5,6,7,2,0,4,2,4,8,2,3,3,2</div>
					<div class="number"><?php echo $fest;?><i class="icon-arrow-up"></i></div>
					<div class="title">Festival</div>
					<div class="footer">
						<a href="#"> read full report</a>
					</div>	
				</div>
				<div class="span3 statbox green" onTablet="span6" onDesktop="span3">
					<div class="boxchart">1,2,6,4,0,8,2,4,5,3,1,7,5</div>
					<div class="number"><?php echo $conference;?><i class="icon-arrow-up"></i></div>
					<div class="title">Conference</div>
					<div class="footer">
						<a href="#"> read full report</a>
					</div>
				</div>
				<div class="span3 statbox blue noMargin" onTablet="span6" onDesktop="span3">
					<div class="boxchart">5,6,7,2,0,-4,-2,4,8,2,3,3,2</div>
					<div class="number"><?php echo $reun;?><i class="icon-arrow-up"></i></div>
					<div class="title">Reunion</div>
					<div class="footer">
						<a href="#"> read full report</a>
					</div>
				</div>
				<div class="span3 statbox yellow" onTablet="span6" onDesktop="span3">
					<div class="boxchart">7,2,2,2,1,-4,-2,4,8,,0,3,3,5</div>
					<div class="number"><?php echo $social;?><i class="icon-arrow-down"></i></div>
					<div class="title">Social/Party</div>
					<div class="footer">
						<a href="#"> read full report</a>
					</div>
				</div>	
				
					
				
				<div class="span3 statbox orange" onTablet="span6" onDesktop="span3">
					<div class="boxchart">7,2,2,2,1,-4,-2,4,8,,0,3,3,5</div>
					<div class="number"><?php echo $class;?><i class="icon-arrow-down"></i></div>
					<div class="title">Class/Workshop</div>
					<div class="footer">
						<a href="#"> read full report</a>
					</div>
				</div>

				<div class="span3 statbox red" onTablet="span6" onDesktop="span3">
					<div class="boxchart">7,2,2,2,1,-4,-2,4,8,,0,3,3,5</div>
					<div class="number"><?php echo $other;?><i class="icon-arrow-down"></i></div>
					<div class="title">Other</div>
					<div class="footer">
						<a href="#"> read full report</a>
					</div>
				</div>
				
			</div>		

				<div class="box">
					<div class="box-header">
						<h2><i class="halflings-icon white list-alt"></i><span class="break"></span>Capacity vs Actual</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						 <div id="stackchart" class="center" style="height:300px;"></div>

						<p class="stackControls center">
							<input class="btn" type="button" value="With stacking">
							<input class="btn" type="button" value="Without stacking">
						</p>

						<p class="graphControls center">
							<input class="btn-primary" type="button" value="Bars">
							<input class="btn-primary" type="button" value="Lines">
							<input class="btn-primary" type="button" value="Lines with steps">
						</p>
					</div>
				</div>
			
	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>
	
	<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-content">
			<ul class="list-inline item-details">
				<li><a href="http://themifycloud.com">Admin templates</a></li>
				<li><a href="http://themescloud.org">Bootstrap themes</a></li>
			</ul>
		</div>
	</div>
	
	<div class="clearfix"></div>
	
	<footer>

		<p>
			<span style="text-align:left;float:left">&copy; 2015 <a href="http://themifycloud.com/downloads/janux-free-responsive-admin-dashboard-template/" alt="Bootstrap_Metro_Dashboard">EVENTCIOUS Responsive Dashboard</a></span>
			
		</p>

	</footer>
	
	<!-- start: JavaScript-->

		<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="js/jquery.ui.touch-punch.js"></script>
	
		<script src="js/modernizr.js"></script>
	
		<script src="js/bootstrap.min.js"></script>
	
		<script src="js/jquery.cookie.js"></script>
	
		<script src='js/fullcalendar.min.js'></script>
	
		<script src='js/jquery.dataTables.min.js'></script>

		<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.js"></script>
	<script src="js/jquery.flot.pie.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	
		<script src="js/jquery.chosen.min.js"></script>
	
		<script src="js/jquery.uniform.min.js"></script>
		
		<script src="js/jquery.cleditor.min.js"></script>
	
		<script src="js/jquery.noty.js"></script>
	
		<script src="js/jquery.elfinder.min.js"></script>
	
		<script src="js/jquery.raty.min.js"></script>
	
		<script src="js/jquery.iphone.toggle.js"></script>
	
		<script src="js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="js/jquery.gritter.min.js"></script>
	
		<script src="js/jquery.imagesloaded.js"></script>
	
		<script src="js/jquery.masonry.min.js"></script>
	
		<script src="js/jquery.knob.modified.js"></script>
	
		<script src="js/jquery.sparkline.min.js"></script>
	
		<script src="js/counter.js"></script>
	
		<script src="js/retina.js"></script>

		<script src="js/custom.js"></script>
	
</body>
</html>
<?php
$qevent = "select * from 280team.events";
$revent = $conn->query($qevent);
?>


<script>
if($("#stackchart").length)
	{
		var d1 = [];
		for (var i = 0; i <= 10; i += 1)
		d1.push([i, parseInt(Math.random() * 30)]);

		var d2 = [];
		for (var i = 0; i <= 10; i += 1)
			d2.push([i, parseInt(Math.random() * 30)]);

		var d3 = [];
		for (var i = 0; i <= 10; i += 1)
			d3.push([i, parseInt(Math.random() * 30)]);

		var stack = 0, bars = true, lines = false, steps = false;

		function plotWithOptions() {
			$.plot($("#stackchart"), [ d1, d2, d3 ], {
				series: {
					stack: stack,
					lines: { show: lines, fill: true, steps: steps },
					bars: { show: bars, barWidth: 0.6 },
				},
				colors: ["#FA5833", "#2FABE9", "#FABB3D"]
			});
		}

		plotWithOptions();

		$(".stackControls input").click(function (e) {
			e.preventDefault();
			stack = $(this).val() == "With stacking" ? true : null;
			plotWithOptions();
		});
		$(".graphControls input").click(function (e) {
			e.preventDefault();
			bars = $(this).val().indexOf("Bars") != -1;
			lines = $(this).val().indexOf("Lines") != -1;
			steps = $(this).val().indexOf("steps") != -1;
			plotWithOptions();
		});
	}
	
		
</script>