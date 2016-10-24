<ol class="breadcrumb">
  <li><a href="index">Home</a></li>
  <li class="active">Campaign</li>
</ol>
<hr />
<h2>Campaign</h2>
<form class="form-horizontal myform" action="" method="post" role="form">
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label for="usr">Name:</label>
                <input pattern=".{3,}" required type="text" name="name" class="form-control">
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label for="usr">Description:</label>
                <input pattern=".{3,}" required type="text" name="desc" class="form-control">
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label for="usr">&nbsp;</label><br />
                <button class="btn btn-default btn-primary" type="submit" name="submit" class="btn btn-default">Create List</button>
            </div>
        </div>
    </div>        
</form>

<?php 
if (isset($_POST['submit'])) {
    $sql = "INSERT INTO `compaign`(`m_id`, `name`, `description`) VALUES (?,?,?)";       
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("iss", 
        $_SESSION['logged_user']['m_id'],
        $_POST['name'],
        $_POST['desc']
    );

    if ($stmt->execute()) {
        success("Record Added");
    }
    else {
        success("Failed to add record");
    }
    $stmt->close();
}
?>

<?php 

if (isset($_GET['remove']) && !empty($_GET['remove'])) {
    $query = sprintf("DELETE FROM `compaign` WHERE m_id='%d' AND c_id='%d'", 
        $_SESSION['logged_user']['m_id'],
        $_GET['remove']
    );
    if ($result = $mysqli->query($query)) {
        success("Compaign successfully deleted");
    }
    else {
        error("Unable to delete compaign (Delete compaign message)");
    }
}
?>

<?php 
$query = sprintf("SELECT COUNT(*) AS count FROM compaign WHERE m_id='%d'", 
        $_SESSION['logged_user']['m_id']);
$totalData = $mysqli->query($query)->fetch_assoc()['count'];
$dataPerPage = 7;
$totalPagesToShow = 5;
$pagi = new Pagination($totalData, $dataPerPage, 'page');
$dataLimit = $pagi->getDataLimit();

$query = sprintf("SELECT * FROM compaign WHERE m_id='%d' LIMIT %d, %d", 
        $_SESSION['logged_user']['m_id'],
        $dataLimit['start'], 
        $dataLimit['end']);
if ($result = $mysqli->query($query)) {
    if ($result->num_rows == 0):
        info("No Record to show");
    else:
?>
<table class="table table-hover">
  <thead>
    <tr>
      <th>Name</th>
      <th>Description</th>
      <th class="align_right">Add List</th>
      <th class="align_right">Add Message</th>
      <th class="align_right">Remove</th>
    </tr>
  </thead>
  <tbody>
<?php while ($row = $result->fetch_assoc()) : ?>
    <tr>
      <td><?php echo $row['name'] ?></td>
      <td><?php echo $row['description'] ?></td>
      <td class="align_right"><a href="connectlist?id=<?php echo $row['c_id']; ?>"><i class="glyphicon glyphicon-list-alt"></i></a></td>
      <td class="align_right"><a href="addmessage?id=<?php echo $row['c_id']; ?>"><i class="glyphicon glyphicon-envelope"></i></a></td>
      <td class="align_right"><a href="?remove=<?php echo $row['c_id']; ?>"><i class="glyphicon glyphicon-remove"></i></a></td>
    </tr>
<?php endwhile; ?>
      </tbody>
</table>

<?php 
$pagi->generateNaviClassic($totalPagesToShow);
?>

<?php endif; ?>
<?php } ?>
