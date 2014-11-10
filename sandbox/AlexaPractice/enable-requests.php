<!doctype html>
<html lang="en">
<head>
	<title>Enable Requests Page</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
	<link rel="stylesheet" type="text/css" href="enable-requests.css">
	<link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="core.css">
	<link rel="stylesheet" type="text/css" href="header.css">
	<link rel="stylesheet" type="text/css" href="nav.css">
	<link rel="stylesheet" type="text/css" href="../../css/content.css">
	<link rel="stylesheet" type="text/css" href="../../css/how-to.css"> 
	<link rel="stylesheet" type="text/css" href="../../css/footer.css">
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

</head>
<body>

    <div id="wrapper">
	<?php include "header.php";?>
	<?php include "nav.php";?>
	<?php include "requests-info.php";?>
        <div style="clear:both"></div>

		<div id="main">
		
		<div style="text-align: center;">
		<a href="#current-enable"><div class="section-nav">Current Enable</div></a>
		<a href="#pending-review"><div class="section-nav">Pending Review</div></a>
		<a href="#approved-enable"><div class="section-nav">Approved Enable</div></a>
		<a href="#rejected-enable"><div class="section-nav">Rejected Enable</div></a>
		</div>
		<div class="clear"></div>
		
		<br/>
		<section id="current-enable" class="list">
			<span class="heading">Current Enable Requests</span> click for more info or pass to skip request
			<!--enable-id date time time-left object-name object-image enable-artwork pass-->
			<div class="field">
				<div class="cell-w200 cell-h30 ml-10">Enable Request ID</div>
				<div class="cell-w200 cell-h30">End Time</div>
				<div class="cell-w150 cell-h30">Time Left</div>
				<div class="cell-w250 cell-h30">Object Name</div>
				<div class="cell-w100 cell-h30">Artwork</div>
				<div class="cell-w90 cell-h30">Pass</div>
				<div class="clear"></div>
			</div><!--END current .field-->
			<div class="clear"></div>
			<?php
				$requests = getUserRequests(0);
				//echo var_dump($requests);
				$row = '';
				foreach($requests as $request) {
					$row = '<a href="#">';
					$row .= '<div class="row light">';
					$row .= '<div class="cell-w200 cell-h50 ml-10">#' . $request['enable_id'] . '</div>';
					$due_date = new DateTime($request['due_date']);
					$row .= '<div class="cell-w200 cell-h50">' . $due_date->format("m/d/y g:i A") . '</div>';
					//$now = new DateTime();
					//$time_left = $now->diff(new DateTime($request['due_date']));
					//$row .= '<div class="cell-w150 cell-h50">' . $time_left->format('%R%a days') . '</div>';
					$row .= '<div class="cell-w150 cell-h50">' . ago(new DateTime($request['due_date'])) . '</div>';
					$row .= '<div class="cell-w250 cell-h50">' . $request['item_name'] . '</div>';
					$row .= '<div class="cell-w100 cell-h50"><img class="cell-img" src="../../' . $request['image_filepath'] .'"/></div>';
					$row .= '<div class="cell-w90 cell-h50"><a href="#pass"><span class="pass">&#10006;</span></a></div>';
					$row .= '<div class="clear"></div>';
					$row .= '</div></a><div class="clear"></div>';
					echo $row;
				}
			?>

			<!-- END CURRENT LIST-->
		</section><!--END current-enable-->
		
		<br/>
		<section id="pending-review" class="list">
			<span class="heading">Pending Enable Reivew</span> submitted enable requests waiting for review
			<div class="field">
				<div class="cell-w200 cell-h50 ml-30">Enable Request ID</div>
				<div class="cell-w200 cell-h50">End Time</div>
				<div class="cell-w200 cell-h50">Submit Time</div>
				<div class="cell-w250 cell-h50">Object Name</div>
				<div class="cell-w90 cell-h50">Edit</div>
				<div class="clear"></div>
			</div><!--END pending .field-->
			<div class="clear"></div>
		
			<!-- PENDING LIST -->
			<div class="row light">
				<div class="cell-w200 cell-h50 ml-30">#65343</div>
				<div class="cell-w200 cell-h50">10/29/2014 4:24PM</div>
				<div class="cell-w200 cell-h50">10/28/2014 8:17PM</div>
				<div class="cell-w250 cell-h50">Standard Dogtag</div>
				<div class="cell-w90 cell-h50"><a href="#edit"><span class="edit">EDIT</span></a></div>
				<div class="clear"></div>
			</div><!--END pending .row-->
			<div class="clear"></div>
		
		
			<!-- EXAMPLE PENDING LIST -->
			<div class="row dark">
				<div class="cell-w200 cell-h50 ml-30">#65343</div>
				<div class="cell-w200 cell-h50">10/29/2014 4:24PM</div>
				<div class="cell-w200 cell-h50">10/28/2014 8:17PM</div>
				<div class="cell-w250 cell-h50">Standard Dogtag</div>
				<div class="cell-w90 cell-h50"><a href="#edit"><span class="edit">EDIT</span></a></div>
				<div class="clear"></div>
			</div><!--END pending .row-->
			<div class="clear"></div>			
			<!-- END EXAMPLE PENDING LIST -->
		
			
			<!-- END PENDING LIST-->
		</section><!--END pending-review-->
		
		<br/>
		<section id="approved-enable" class="list">
			<span class="heading">Approved Enable Requests</span> enable requests that have passed enable review
			<div class="field">
				<div class="cell-w200 cell-h50 ml-125">Enable Request ID</div>
				<div class="cell-w200 cell-h50">Submit Time</div>
				<div class="cell-w250 cell-h50">Object Name</div>
				<div class="cell-w100 cell-h50">Artwork</div>
				<div class="clear"></div>
			</div><!--END approved .field-->
			<div class="clear"></div>
		
			<!-- APPROVED LIST -->
			<div class="row light">
				<div class="cell-w200 cell-h50 ml-125">#65343</div>
				<div class="cell-w200 cell-h50">10/28/2014 8:17PM</div>
				<div class="cell-w250 cell-h50">Standard Dogtag</div>
				<div class="cell-w100 cell-h50"><img class="cell-img" src="http://placekitten.com/800/801"/></div>
				<div class="clear"></div>
			</div><!--END approved .row-->
			<div class="clear"></div>
		
			
			<!-- EXAMPLE APPROVED LIST -->
			<div class="row dark">
				<div class="cell-w200 cell-h50 ml-125">#65343</div>
				<div class="cell-w200 cell-h50">10/28/2014 8:17PM</div>
				<div class="cell-w250 cell-h50">Standard Dogtag</div>
				<div class="cell-w100 cell-h50"><img class="cell-img" src="http://placekitten.com/800/801"/></div>
				<div class="clear"></div>
			</div><!--END approved .row-->
			<div class="clear"></div>
			<!-- END EXAMPLE APPROVED LIST -->
		
		
			<!-- END ARPPOVED LIST -->
		</section><!--END approved-enable-->
		
		<br/>
		<section id="rejected-enable" class="section-enable-list">
			<span class="heading">Rejected Enable Requests</span> enable requests that failed enable review
			<div class="field">
				<div class="cell-w200 cell-h50 ml-175">Enable Request ID</div>
				<div class="cell-w200 cell-h50">Submit Time</div>
				<div class="cell-w250 cell-h50">Object Name</div>
				<div class="clear"></div>
			</div><!--END rejected .field-->
			<div class="clear"></div>
		
			<!-- REJECTED LIST -->
			<div class="row light">
				<div class="cell-w200 cell-h50 ml-175">#65343</div>
				<div class="cell-w200 cell-h50">10/28/2014 8:17PM</div>
				<div class="cell-w250 cell-h50">Standard Dogtag</div>
				<div class="clear"></div>
			</div><!--END rejected .row-->
			<div class="clear"></div>
		
		
			<!-- EXAMPLE REJECTED LIST -->
			<div class="row dark">
				<div class="cell-w200 cell-h50 ml-175">#65343</div>
				<div class="cell-w200 cell-h50">10/28/2014 8:17PM</div>
				<div class="cell-w250 cell-h50">Standard Dogtag</div>
				<div class="clear"></div>
			</div><!--END rejected .row-->
			<div class="clear"></div>
			<!-- END EXAMPLE REJECTED LIST -->
		
		
			<!-- END REJECTED LIST -->
		</section><!--END rejected-enable-->
		
		
		
		<div class="clear"></div>
		</div><!--END main-->
		<div style="clear:both"></div>
    
    
    
        
        <?php include "../../templates/footer.php";?>
    </div>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
     <script type="text/javascript" src="nav.js"></script>

</body>
</html>