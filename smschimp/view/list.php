<ol class="breadcrumb">
  <li><a href="index">Home</a></li>
  <li class="active">List</li>
</ol>
<hr />
<h2>List</h2>
<div class="row">

    <form class="form-horizontal myform" action="" method="post" role="form">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="usr">Name:</label>
                <input pattern=".{3,}" required type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="usr">From Email:</label>
                <input pattern=".{3,}" required type="email" name="email" class="form-control">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="usr">From Mobile:</label>
                <input pattern=".{3,}" required type="text" name="mobile" class="form-control">
            </div>
            <div class="form-group">
                <label for="usr">Description:</label>
                <input pattern=".{3,}" required type="text" name="desc" class="form-control">
            </div>
        </div>
        <div class="col-sm-4"><br />
            <div class="form-group">
                <label for="usr">&nbsp;</label>
                <button class="btn btn-default btn-primary" type="submit" name="submit" class="btn btn-default">Create List</button>
            </div>
        </div>
    </form>
</div>


<?php 
if (isset($_POST['submit'])) {
    $sql = "INSERT INTO `list`(`m_id`, `name`, `from_email`, `from_mobile`, `description`) VALUES (?,?,?,?,?)";       
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("issss", 
        $_SESSION['logged_user']['m_id'],
        $_POST['name'],
        $_POST['email'],
        $_POST['mobile'],
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
    $query = sprintf("DELETE FROM `list` WHERE m_id='%d' AND l_id='%d'", 
        $_SESSION['logged_user']['m_id'],
        $_GET['remove']
    );
    if ($result = $mysqli->query($query)) {
        success("List successfully deleted");
    }
    else {
        error("Unable to delete list (Delete subscriber first)");
    }
}
?>

<?php 
$query = sprintf("SELECT COUNT(*) AS count FROM list WHERE m_id='%d'", 
        $_SESSION['logged_user']['m_id']);
$totalData = $mysqli->query($query)->fetch_assoc()['count'];
$dataPerPage = 7;
$totalPagesToShow = 5;
$pagi = new Pagination($totalData, $dataPerPage, 'page');
$dataLimit = $pagi->getDataLimit();

$query = sprintf("SELECT * FROM list WHERE m_id='%d' LIMIT %d, %d", 
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
      <th>From Email</th>
      <th>From Mobile</th>
      <th>Description</th>
      <th class="align_right">Subscriber</th>
      <th class="align_right">Form</th>
      <th class="align_right">Remove</th>
    </tr>
  </thead>
  <tbody>
<?php while ($row = $result->fetch_assoc()) : ?>
    <tr>
      <td><?php echo $row['name'] ?></td>
      <td><?php echo $row['from_email'] ?></td>
      <td><?php echo $row['from_mobile'] ?></td>
      <td><?php echo $row['description'] ?></td>
      <td class="align_right"><a href="viewsubscriber?id=<?php echo $row['l_id']; ?>"><i class="glyphicon glyphicon-user"></i></a></td>
      <td class="align_right"><a href="form?id=<?php echo $row['l_id']; ?>"><i class="glyphicon glyphicon-edit"></i></a></td>
      <td class="align_right"><a href="?remove=<?php echo $row['l_id']; ?>"><i class="glyphicon glyphicon-remove"></i></a></td>
    </tr>
<?php endwhile; ?>
      </tbody>
</table>

<?php 
$pagi->generateNaviClassic($totalPagesToShow);
?>

<?php endif; ?>
<?php } ?>
