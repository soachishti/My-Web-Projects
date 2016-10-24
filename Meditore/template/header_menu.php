<?php 
$menu = array(
    "index" => "Home",
    "inventory" => "Inventory",
    "addvendor" => "Add Vendor",
    "invoice" => "Invoice",
);

$query = "SELECT name FROM medicine WHERE pack_quanlity < $notification AND tab_amount = 0";
$result = $mysqli->query($query);
$limit_count = $result->num_rows;

$query = "SELECT name FROM (SELECT name, (pack_quanlity/tab_amount) AS pk_qty FROM medicine WHERE tab_amount != 0) AS x WHERE x.pk_qty < $notification";
$result = $mysqli->query($query);
$limit_count += $result->num_rows;
//if(!$result) {
//         printf("Error: %s\n", $mysqli->error);
//        }
?>


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Meditore</a>
    </div>
    <ul class="nav navbar-nav">
        <?php 
            foreach ($menu as $key => $value) {
                echo '<li class="' . (($route == $key) ? 'active' : '') . '"><a href="'.$key.'">' . $value . '</a></li>';
            }
        ?> 
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="notification">Notification<span class="badge" style="background-color: red; margin: 5px 0 0 -5px; z-index:0;"><?php echo $limit_count; ?></span></a></li>
      <li><a href="logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
<hr />