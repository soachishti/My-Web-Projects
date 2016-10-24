<?php 
include ("config.php");		
if (isset($_GET['register'])) {
        
    $sql = "INSERT INTO `members`(`name`, `company`, `email`, `pass`) VALUES (?,?,?,?)";       
    $stmt = $mysqli->prepare($sql);
    $hash_pass = hash('sha256',$_POST['pass']);
    $stmt->bind_param("ssss", 
        $_POST['name'],
        $_POST['company'],
        $_POST['email'],
        $hash_pass
    );

    if ($stmt->execute()) {
        echo "true"; 
    }
    else {
        echo "false";
    }
    $stmt->close();
}
else if (isset($_GET['login'])) {
    $hash_pass = hash('sha256',$_POST['pass']);
    $query = sprintf("SELECT * FROM members WHERE email = '%s' AND pass = '%s'",  
            $mysqli->real_escape_string($_POST['email']),
            $mysqli->real_escape_string($hash_pass)
        );
    if ($result = $mysqli->query($query)) {
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            unset($row['pass']);
            $_SESSION['logged_user'] = $row;
            echo "true";
        }
        else {
            echo "false";
        }
    }
}

?>