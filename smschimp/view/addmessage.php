<ol class="breadcrumb">
  <li><a href="index">Home</a></li>
  <li><a href="campaign">Campaign</a></li>
  <li class="active">Message</li>
</ol><hr />
<h2>Message</h2>
<form class="form-horizontal myform" method="POST" role="form">
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label for="usr">Subject:</label>
                <input name="subject" class="form-control">
            </div>
           <div class="form-group">
                <label for="usr"><hr /></label>
                <button class="btn btn-default btn-primary" type="submit" name="submit" class="btn btn-default">Add</button>
            </div>
       </div>
       <div class="col-sm-3"> 
            <div class="form-group">
                <label for="usr">Message:</label>
                <textarea name="message" class="form-control">
                </textarea>
            </div>
        </div>
    </div>
</form>

<?php 
if (isset($_GET['remove']) && !empty($_GET['remove'])) {
    $query = sprintf("DELETE FROM `message` WHERE m_id='%d'",
        $_GET['remove']
    );
    if ($result = $mysqli->query($query)) {
        success("Message successfully delete");
    }
    else {
        error("Failed to delete message");
    }
}
?>


<?php 
if (isset($_GET['send']) && !empty($_GET['send'])) {
    $query = sprintf("INSERT INTO queue (m_id, s_id) 
            SELECT m.m_id, ls.ls_id AS s_id FROM message AS m 
            JOIN compaignlist AS cl USING (c_id) 
            JOIN listsubscriber AS ls USING (l_id)
            WHERE m.m_id = '%d'",
        $_GET['send']
    );
    if ($result = $mysqli->query($query)) {
        success("Successfully added to queue");
    }
    else {
        error("Failed to add to queue");
    }
}
?>


<?php 
if (isset($_POST['submit'])) {
    $sql = "INSERT INTO `message`(`subject`, `text`, `c_id`) VALUES (?,?,?)";       
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssi", 
        $_POST['subject'],
        $_POST['message'],
        $_GET['id']
    );

    if ($stmt->execute()) {
        success("Message Added");
    }
    else {
        success("Failed to added message");
    }
    $stmt->close();
}
?>

<?php
$query = sprintf("SELECT * FROM message WHERE c_id='%d'", 
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
      <th>Subject</th>
      <th>Message</th>
      <th class="align_right">Send</th>
      <th class="align_right">Remove</th>
    </tr>
  </thead>
  <tbody>
<?php while ($row = $result->fetch_assoc()) : ?>
    <tr>
      <td><?php echo $row['subject'] ?></td>
      <td><?php echo $row['text'] ?></td>
      <td class="align_right"><a href="?id=<?php echo $_GET['id'] ?>&send=<?php echo $row['m_id']; ?>"><i class="glyphicon glyphicon-send"></i></a></td>
      <td class="align_right"><a href="?id=<?php echo $_GET['id'] ?>&remove=<?php echo $row['m_id']; ?>"><i class="glyphicon glyphicon-remove"></i></a></td>
    </tr>
<?php endwhile; ?>
      </tbody>
</table>
<?php 
endif;
}