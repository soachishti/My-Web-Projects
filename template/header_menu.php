<?php 
$menu = array(
    "index" => "Home",
    "list" => "List",
    "subscriber" => "Subscriber",
    "campaign" => "Campaign",
    "queue" => "Queue",
    "server" => "Server"
);
?>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">SMSChimp</a>
    </div>
    <ul class="nav navbar-nav">
        <?php 
            foreach ($menu as $key => $value) {
                echo '<li class="' . (($route == $key) ? 'active' : '') . '"><a href="'.$key.'">' . $value . '</a></li>';
            }
        ?> 
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>