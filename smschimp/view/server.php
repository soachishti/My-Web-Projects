<ol class="breadcrumb">
  <li><a href="index">Home</a></li>
  <li class="active">Server</li>
</ol>
<h2>Server</h2>
<form class="form-horizontal myform" method="POST" role="form">
    <div class="row">
       <div class="col-sm-3">    
           <div class="form-group">
                <label for="usr"><hr /></label>
                <button class="btn btn-default btn-primary" type="submit" name="submit" class="btn btn-default">Generate API Token</button>
            </div>
        </div>
    </div>
</form>

<?php 
if (isset($_POST['submit'])) {
    $sql = "INSERT INTO `api_server`(`token`, `m_id`) VALUES (?, ?)";       
    $stmt = $mysqli->prepare($sql);
    $token = uniqid('TKN_');

    $stmt->bind_param("si", 
        $token,
        $_SESSION['logged_user']['m_id']
    );

    if ($stmt->execute()) {
        success("Token Created");
    }
    else {
        error("Failed to create server token");
    }
    $stmt->close();
}
?>

<?php 

if (isset($_GET['remove']) && !empty($_GET['remove'])) {
    $query = sprintf("DELETE FROM `api_server` WHERE m_id='%d' AND a_id='%d'", 
        $_SESSION['logged_user']['m_id'],
        $_GET['remove']
    );
    if ($result = $mysqli->query($query)) {
        success("Server successfully deleted");
    }
    else {
        error("Unable to delete server");
    }
}
?>

<?php 
use PrettyDateTime\PrettyDateTime;

$query = sprintf("SELECT * FROM `api_server` WHERE m_id='%d' ", 
        $_SESSION['logged_user']['m_id']
        );
if ($result = $mysqli->query($query)) {
    if ($result->num_rows == 0):
        info("No Record to show");
    else:
?>
<table class="table table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Token</th>
      <th>Load</th>
      <th>Connection</th>
      <th class="align_right">Data/Time</th>
      <th class="align_right">Remove</th>
    </tr>
  </thead>
  <tbody>
<?php
    $count = 1;
    while ($row = $result->fetch_assoc()) : ?>
    <tr>
      <td><?php echo $count++; ?></td>
      <td><?php echo $row['token'] ?></td>
      <td><?php echo $row['load'] ?></td>
      <td><?php echo $row['status'] ?></td>
      <td class="align_right"><?php echo PrettyDateTime::parse(new DateTime($row['created_date'])) ?></td>
      <td class="align_right"><a href="?remove=<?php echo $row['a_id']; ?>"><i class="glyphicon glyphicon-remove"></i></a></td>
    </tr>
<?php endwhile; ?>
      </tbody>
</table>

<?php endif; ?>
<?php } ?>



