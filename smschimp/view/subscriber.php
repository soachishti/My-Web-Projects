<ol class="breadcrumb">
  <li><a href="index">Home</a></li>
  <li class="active">Subscriber</li>
</ol>
<hr />
<h2>Add Subscriber</h2>
<form class="form-horizontal myform" method="POST" role="form">
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-danger" id="InsertMsg" style="display:none;"></div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label for="usr">Name:</label>
                <input pattern=".{3,}" required type="text"name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="usr">Phone no:</label>
                <input pattern=".{3,}" required type="text" name="phone_no" class="form-control">
            </div>
        </div>
        <div class="col-sm-3">    
            <div class="form-group">
                <label for="usr">Email:</label>
                <input pattern=".{3,}" required type="email" name="email" class="form-control">
            </div>

            <div class="form-group">
                <label for="usr">List:</label>
                <select class="form-control" name="list">                           
                    <?php
                    $query = sprintf("SELECT * FROM list");
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
if (isset($_POST['submit'])) {
    $sql = "INSERT INTO `listsubscriber`(`l_id`, `name`, `phone_no`, `email`) VALUES (?,?,?,?)";       
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("isss", 
        $_POST['list'],
        $_POST['name'],
        $_POST['phone_no'],
        $_POST['email']
    );

    if ($stmt->execute()) {
        success("Subscriber Added");
    }
    else {
        success("Failed to add Subscriber");
    }
    $stmt->close();
}
?>
