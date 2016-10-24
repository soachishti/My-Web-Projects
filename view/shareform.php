
<?php 
if (isset($_POST['submit'])) {
    $sql = "INSERT INTO `listsubscriber`(`l_id`, `name`, `phone_no`, `email`, `other_attributes`) VALUES (?,?,?,?,?)";       
    $stmt = $mysqli->prepare($sql);
    
    $name = $_POST['name']; unset($_POST['name']);
    $phone_no = $_POST['phone_no']; unset($_POST['phone_no']);
    $email = $_POST['email']; unset($_POST['email']);
    $l_id = $_POST['l_id']; unset($_POST['l_id']);
    $data = json_encode($_POST);
    $stmt->bind_param("issss", 
        $l_id, 
        $name, 
        $phone_no,
        $email,
        $data
    );

    if ($stmt->execute()) {
        success("Thanks for subscribing");
    }
    else {
        error("Failed to subscriber you");
    }
    $stmt->close();
}
else {
?>


<?php 
$query = sprintf("SELECT l_id, form_attributes FROM list JOIN form USING (f_id) WHERE f_id='%d'", $_GET['id']);
if ($result = $mysqli->query($query)) {
    if ($result->num_rows == 1) {
        $output = $result->fetch_assoc();
        $data = json_decode($output['form_attributes'], true);
        $l_id = $output['l_id'];
    } 
    else {
        $data = array();
    }
}
?>




<form class="form-horizontal myform" method="POST" role="form">
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-danger" id="InsertMsg" style="display:none;"></div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label for="usr">Name:</label>
                <input pattern=".{3,}" required type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="usr">Phone no:</label>
                <input pattern=".{3,}" required type="text" name="phone_no" class="form-control">
            </div>
            <div class="form-group">
                <label for="usr">Email:</label>
                <input pattern=".{3,}" required type="email" name="email" class="form-control">
            </div>
            <?php if (!empty($data)):?>
                <?php $count = count($data['type']); ;
                for($i = 0; $i < $count; $i++):

                ?>
                    <?php if ($data['type'][$i] == 'text'): ?>
                        <div class="form-group">
                            <label for="usr"><?php echo $data['title'][$i] ?></label>
                            <input pattern=".{3,}" required type="text" name="<?php echo $data['title'][$i] ?>"  class="form-control">
                        </div>
                    <?php elseif ($data['type'][$i] == 'textarea'): ?>
                        <div class="form-group">
                            <label for="usr"><?php echo $data['title'][$i] ?></label>
                            <textarea class="form-control" name="<?php echo $data['title'][$i] ?>"></textarea>
                        </div>
                    <?php elseif ($data['type'][$i] == 'dropdown'): ?>
                        <div class="form-group">
                            <label for="usr"><?php echo $data['title'][$i] ?></label>
                            <select class="form-control" name="<?php echo $data['title'][$i] ?>">
                                <?php
                                    foreach(explode(",", $data['option'][$i]) as $value) {
                                        echo "<option data='" . trim($value) . "'>" . $value . "</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    <?php elseif ($data['type'][$i] == 'radio'): ?>
                        <label for="usr"><?php echo $data['title'][$i] ?></label>                          
                        <?php
                            foreach(explode(",", $data['option'][$i]) as $value) {
                                echo '<div class="radio">
                                    <label><input type="radio" value="'.$value.'" name="'. $data['title'][$i] .'">'. $value .'</label>
                                </div>';
                            }
                        ?>
                    <?php elseif ($data['type'][$i] == 'password'): ?>
                        <div class="form-group">
                            <label for="usr"><?php echo $data['title'][$i] ?></label>
                            <input pattern=".{3,}" required type="password" name="<?php echo $data['title'][$i] ?>"  class="form-control">
                        </div>
                    <?php elseif ($data['type'][$i] == 'checkbox'): ?>
                        <label for="usr"><?php echo $data['title'][$i] ?></label>
                        <div class="checkbox">
                            <label><input type="checkbox" name="<?php echo $data['title'][$i] ?>" value="<?php echo $data['title'][$i] ?>"><?php echo $data['desc'][$i] ?></label>
                        </div>
                    <?php endif; ?>                    
                <?php endfor; ?>
            <?php endif; ?>
           <div class="form-group">
                <label for="usr"><hr /></label>
                <input name="l_id" value="<?php echo $l_id; ?>" type="hidden">
                <button class="btn btn-default btn-primary" type="submit" name="submit" class="btn btn-default">Submit</button>
            </div>
        </div>
    </div>
</form>

<?php 
}