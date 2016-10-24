<?php
$f_id = false; 
$query = sprintf("SELECT f_id, form_attributes FROM list JOIN form USING (f_id) WHERE l_id='%d'", $_GET['id']);
if ($result = $mysqli->query($query)) {
    if ($result->num_rows == 1) {
        $output = $result->fetch_assoc();
        $value = json_decode($output['form_attributes'], true);
        $f_id = $output['f_id'];
    } 
    else {
        $value = array();
        
    }
}
?>

<?php 
if (isset($_POST['submit'])) {   
    $data = json_encode($_POST);
    if (empty($f_id)) {
        $sql = "INSERT INTO `form`(`form_attributes`) VALUES (?)";       
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", 
            $data
        );
        $stmt->execute();
        $update = sprintf("UPDATE list SET f_id='%d' WHERE l_id = '%d'", $mysqli->insert_id, $_GET['id']);
        if ($mysqli->query($update)) {
            success("Form Added");
        }
        else {
            error("Failed to add form");
        }
        $stmt->close();
    }
    else {
        $sql = sprintf("UPDATE `form` SET form_attributes='%s' WHERE f_id='%d'", 
                 $mysqli->real_escape_string($data),
                $f_id);       
        if ($mysqli->query($sql)) {
            success("Form Updated");
        }
        else {
            error("Failed to updated form");
        }
    }
    
}
?>


<ol class="breadcrumb">
  <li><a href="index">Home</a></li>
  <li class="active">Subscriber</li>
</ol>
<hr />
<div class="row">
    <div class="col-sm-2">
        <h2>Add Form</h2>
    </div>
    <div class="col-sm-8">
    <br />

        <button class="btn btn-default btn-primary" onclick="AddFormField()"  class="btn btn-default">Add more field</button>
            <?php if (!empty($f_id)): ?>
            <a href="shareform?id=<?php echo $f_id ?>" class="btn btn-default btn-primary" onclick="AddFormField()"  class="btn btn-default">View Form</a>
            <?php endif; ?>
    </div>
</div>
<hr />
<form class="form-horizontal myform" method="POST" role="form">
    <div id="FormList">
    <?php 
    if (!isset($value['type'])) {
        $value['type'][0] = null;
        $value['title'][0] = null;
        $value['desc'][0] = null;
        $value['option'][0] = null;
    }
    for($i = 0; $i < count($value['type']); $i++): ?>
        <div class="row" id="FormField">
            <div class="col-sm-3">    
                <div class="form-group">
                    <label for="usr">Input Type:</label>
                    <select class="form-control" name="type[]">                           
                        <option <?php echo $value['type'][$i] == 'text' ? 'selected' : '';?> value="text">Text</option>
                        <option <?php echo $value['type'][$i] == 'textarea' ? 'selected' : '';?> value="textarea">Text Area</option>
                        <option <?php echo $value['type'][$i] == 'dropdown' ? 'selected' : '';?> value="dropdown">Dropdown</option>
                        <option <?php echo $value['type'][$i] == 'radio' ? 'selected' : '';?> value="radio">Radio</option>
                        <option <?php echo $value['type'][$i] == 'password' ? 'selected' : '';?> value="password">Password</option>
                        <option <?php echo $value['type'][$i] == 'checkbox' ? 'selected' : '';?> value="checkbox">Checkbox</option>
                    </select>
                </div>            
           </div>
           <div class="col-sm-3">    
                <div class="form-group">
                    <label for="usr">Title:</label>
                    <input value="<?php echo $value['title'][$i]?>" class="form-control" name="title[]">
                </div>            
           </div>
           <div class="col-sm-3">    
                <div class="form-group">
                    <label for="usr">Description:</label>
                    <input value="<?php echo $value['desc'][$i]?>" class="form-control" name="desc[]">
                </div>            
           </div>
           <div class="col-sm-3">    
                <div class="form-group">
                    <label for="usr">Options:</label>
                    <input value="<?php echo $value['option'][$i]?>" class="form-control" name="option[]">
                </div>            
           </div>
           <div class="col-sm-3">&nbsp;</div>
        </div>
    <?php endfor; ?>
    </div>
    <div class="row">
       <div class="col-sm-3">    
           <div class="form-group">
                <label for="usr"><hr /></label>
                <button class="btn btn-default btn-primary" type="submit" name="submit" class="btn btn-default">Add</button>
            </div>
        </div>
    </div>
</form>

