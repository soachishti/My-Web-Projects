<ol class="breadcrumb">
  <li><a href="index">Home</a></li>
  <li><a href="campaign">Campaign</a></li>
  <li class="active">Connect List</li>
</ol><hr />
<h2>Connect List</h2>
<form class="form-horizontal myform" method="POST" role="form">
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label for="usr">List:</label>
                <select class="form-control" name="compaignID">                           
                <?php
                    $query = sprintf("SELECT * FROM list WHERE m_id='%d'", $_SESSION['logged_user']['m_id']);
                    if ($result = $mysqli->query($query)) {
                        if ($result->num_rows == 0) {
                            echo "None";
                        }
                        /* fetch associative array */
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['l_id'] . "'>" . $row['name'] . "</option>";
                        }
                        $result->free();
                    }  
                ?>
                </select>
            </div>
       </div>
       <div class="col-sm-3">    
           <div class="form-group">
                <label for="usr"><hr /></label>
                <button class="btn btn-default btn-primary" type="submit" name="submit" class="btn btn-default">Add</button>
            </div>
        </div>
    </div>
</form>

<?php 
if (isset($_GET['remove']) && !empty($_GET['remove'])) {
    $query = sprintf("DELETE FROM `compaignlist` WHERE cl_id='%d'",
        $_GET['remove']
    );
    // Security update up, check m_id
    if ($result = $mysqli->query($query)) {
        success("List unlinked successfully ");
    }
    else {
        error("Failed to unlink list");
    }
}
?>


<?php 
if (isset($_POST['submit'])) {
    $sql = "INSERT INTO `compaignlist`(`c_id`, `l_id`) VALUES (?, ?)";       
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("is", 
        $_GET['id'],
        $_POST['compaignID']
    );

    if ($stmt->execute()) {
        success("List Connected");
    }
    else {
        success("Failed to  connect list");
    }
    $stmt->close();
}
?>

<?php
$query = sprintf("SELECT * FROM compaignlist AS cl JOIN list AS l USING (l_id) WHERE m_id='%d' AND c_id='%d'", 
            $_SESSION['logged_user']['m_id'],
            $_GET['id']
        );
if ($result = $mysqli->query($query)) {
    if ($result->num_rows == 0):
        info("No Record to show");
    else:
?>
<table class="table table-hover">
  <thead>
    <tr>
      <th>Name</th>
      <th>Remove</th>
    </tr>
  </thead>
  <tbody>
<?php while ($row = $result->fetch_assoc()) : ?>
    <tr>
      <td><?php echo $row['name'] ?></td>
      <td class="align_right"><a href="?id=<?php echo $_GET['id'] ?>&remove=<?php echo $row['cl_id']; ?>"><i class="glyphicon glyphicon-remove"></i></a></td>
    </tr>
<?php endwhile; ?>
      </tbody>
</table>
<?php 
endif;
}