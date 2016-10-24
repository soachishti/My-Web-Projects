<?php
$sql = sprintf("SELECT COUNT(*) AS count FROM compaign WHERE m_id = '%d'", $_SESSION['logged_user']['m_id']);
$compaign_count = $mysqli->query($sql)->fetch_assoc()['count'];

$sql = sprintf("SELECT COUNT(*) AS count FROM `queue` JOIN listsubscriber ON s_id = ls_id JOIN list AS l USING (l_id) WHERE status = 'Sent' AND l.m_id = '%d'", 
$_SESSION['logged_user']['m_id']);
$total_sent_item = $mysqli->query($sql)->fetch_assoc()['count'];

$sql = sprintf("SELECT COUNT(*) AS count FROM `queue` JOIN listsubscriber ON s_id = ls_id JOIN list AS l USING (l_id) WHERE status = 'Queued' AND l.m_id = '%d'", 
$_SESSION['logged_user']['m_id']);
$total_queued_item = $mysqli->query($sql)->fetch_assoc()['count'];

$sql = sprintf("SELECT COUNT(*) AS count FROM `queue` JOIN listsubscriber ON s_id = ls_id JOIN list AS l USING (l_id) WHERE l.m_id = '%d'", 
$_SESSION['logged_user']['m_id']);
$total_queue_item = $mysqli->query($sql)->fetch_assoc()['count'];

$sql = sprintf("SELECT COUNT(*) AS count FROM `message` JOIN compaign AS c USING (c_id) WHERE c.m_id = '%d'", 
$_SESSION['logged_user']['m_id']);
$total_message = $mysqli->query($sql)->fetch_assoc()['count'];

$sql = sprintf("SELECT COUNT(*) AS count FROM `listsubscriber` JOIN list AS l USING (l_id) WHERE m_id = '%d'", 
$_SESSION['logged_user']['m_id']);
$total_subscriber = $mysqli->query($sql)->fetch_assoc()['count'];


$sql = sprintf("SELECT COUNT(*) AS count FROM `api_server` JOIN members USING (m_id) WHERE m_id = '%d'", 
$_SESSION['logged_user']['m_id']);
$total_server = $mysqli->query($sql)->fetch_assoc()['count'];

$sql = sprintf("SELECT COUNT(*) AS count FROM `api_server` JOIN members USING (m_id) WHERE status='Up' AND m_id = '%d'", 
$_SESSION['logged_user']['m_id']);
$total_active_server = $mysqli->query($sql)->fetch_assoc()['count'];
?>

<ol class="breadcrumb">
  <li class="active">Home</li>
</ol>
<hr />

<div class="jumbotron">

<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $total_subscriber ?></div>
							<div class="text-muted">Total Subscriber</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $compaign_count ?></div>
							<div class="text-muted">Total Compaign</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked empty-message"><use xlink:href="#stroked-empty-message"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $total_message ?></div>
							<div class="text-muted">Total Message</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $total_active_server . " Up | " . $total_server . " Down" ?></div>
							<div class="text-muted">Server</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
        <div class="row">
<ul class="list-group">
  <li class="list-group-item">
    <span class="badge"><?php echo $total_queued_item ?></span>
    Total Queue Requests
  </li>
    <li class="list-group-item">
    <span class="badge"><?php echo $total_sent_item ?></span>
    Total Sent Items
  </li>
      <li class="list-group-item">
    <span class="badge"><?php echo $total_queue_item ?></span>
    Total Queued Request
  </li>
</ul>


	</div>
	</div>
   