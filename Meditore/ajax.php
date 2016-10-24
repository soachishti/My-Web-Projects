<?php 
include ("config.php");		
if (isset($_GET['inventory']) && isset($_GET['page'])) {
    $search = isset($_GET['s']) ? $_GET['s'] : "";
  
    $query = sprintf("SELECT * FROM medicine WHERE name LIKE '%%%s%%' ORDER BY id DESC LIMIT %d, $perpage",  
            $mysqli->real_escape_string($search),
            intval($_GET['page'])*$perpage
        );
    if ($result = $mysqli->query($query)) {
        if ($result->num_rows == 0) {
            echo "false";
        }
        /* fetch associative array */
        while ($row = $result->fetch_assoc()) {
            echo "<tr onclick='EditItem(".$row['id'].")'><td>" . $row['name'] . "</td>";
            echo "<td>" . substr($row['type'], 0, 20) . "</td>";
            echo "<td>" . substr($row['potency'], 0, 20) . "</td>";
            echo "<td>" . substr($row['vendor'], 0, 20) . "</td>";
            echo "<td>" . $row['sale_price'] . "</td>";
            echo "<td>" . $row['purchase_price'] . "</td>";
            echo "<td>" . $row['tab_amount'] . "</td>";
            echo "<td>" . $row['pack_quanlity'] . "</td>";
            echo "<td>" . $row['company_name'] . "</td>";
            echo "<td>" . $row['description'] . "</td></tr>";
        }
        $result->free();
    }
}

// Add Product
else if (isset($_GET['addproduct']) && isset($_POST['medicine'])) {
            if (in_array($_POST['type'], array('tablet', 'capsule'))) {
                $quantity = (int)$_POST['package_quantity'] * (int)$_POST['tab_amount'];
                $tab_amount = $_POST['tab_amount'];
            }
            else {
                $quantity = (int)$_POST['package_quantity'];
                $tab_amount = 0;
            }
    
            $sql = "INSERT INTO `medicine`(`name`, `type`, `potency`, `vendor`, `sale_price`, `purchase_price`, `tab_amount`, `pack_quanlity`, `company_name`, `description`) VALUES (?,?,?,?,?,?,?,?,?,?) 
            ON DUPLICATE KEY UPDATE potency = VALUES(`potency`), company_name = VALUES(`company_name`), description = VALUES(`description`), sale_price = VALUES(`sale_price`), purchase_price = VALUES(`purchase_price`), pack_quanlity = pack_quanlity + VALUES(`pack_quanlity`)";
            
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("sssiddiiss", 
                $_POST['name'],
                $_POST['type'],
                $_POST['potency'],
                $_POST['vendor'],
                $_POST['sp'],
                $_POST['pp'],
                $tab_amount,
                $quantity,
                $_POST['company_name'],
                $_POST['description']
            );

            if ($stmt->execute()) {
                echo "true"; 
            }
            else {
                echo "false";
            }
            $stmt->close();
        }
        
// Get Vendor
else if(isset($_GET['getvendor'])) {
    $search = isset($_GET['s']) ? $_GET['s'] : "";
    $perpage = 5;
    $query = sprintf("SELECT * FROM vendor ORDER BY id DESC",  
            $mysqli->real_escape_string($search)
        );
    if ($result = $mysqli->query($query)) {
        if ($result->num_rows == 0) {
            echo "false";
        }
        /* fetch associative array */
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['name'] . "</td>";
            echo "<td>" . substr($row['phone_no'], 0, 20) . "</td>";
            echo "<td>" . substr($row['mobile_no'], 0, 64) . "</td>";
            echo "<td>" . substr($row['address'], 0, 64) . "</td>";
            echo "<td>" . substr($row['description'], 0, 64) . "</td>";
        }
        $result->free();
    }
}        
 
// Add Vendor
else if (isset($_GET['addvendor'])) {
            $sql = "INSERT INTO `vendor`(`name`, `address`, `phone_no`, `mobile_no`, `description`) VALUES (?,?,?,?,?)";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("sssss", 
                $_POST['name'],
                $_POST['address'],
                $_POST['phone'],
                $_POST['mobile'],
                $_POST['description']
            );

            if ($stmt->execute()) {
                echo "true"; 
            }
            else {
                echo "false";
                 //printf("Error: %s.\n", $stmt->error);
            }
            $stmt->close();
        }
 
else if (isset($_GET['getproduct']) && isset($_GET['page'])) {
    $search = isset($_GET['s']) ? $_GET['s'] : "";
  
    $query = sprintf("SELECT * FROM medicine WHERE name LIKE '%%%s%%' ORDER BY id DESC LIMIT %d, $perpage",  
            $mysqli->real_escape_string($search),
            intval($_GET['page'])*$perpage
        );
    if ($result = $mysqli->query($query)) {
        if ($result->num_rows == 0) {
            echo "false";
            die();
        }
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        $result->free();
        echo json_encode($data);
    }
}

else if (isset($_GET['addsale'])) {   
    $update = "";
    $mysqli->autocommit(FALSE);
    foreach  ($_POST['data'] as $value) {
        // Not tablet
        if ($value['total_tab'] == 0) {
            $update = "UPDATE `medicine` SET `pack_quanlity`=pack_quanlity-".$value['pack_quantity']." WHERE id='".$value['id']."'";
        }
        else {
            $update = "UPDATE `medicine` SET `pack_quanlity`=pack_quanlity-".$value['total_tab']." WHERE id='".$value['id']."'";
        }
        if(!$mysqli->query($update)) {
            echo $update;
            printf("Error: %s\n", $mysqli->error);
        }
    }
    
    
    $insert = "";
    foreach  ($_POST['data'] as $value) {
        if ($value['pack_quantity'] > 0 || $value['total_tab'] > 0) {
            $insert .= "('" . $value['id'] . "','" .
            $value['pack_quantity'] . "','" .
            $value['total_tab'] . "','" .
            $value['sale_price'] . "','".
            $value['purchase_price'] . "'),";
        }
    }
    $insert = substr($insert, 0, -1);
    $insert = "INSERT INTO `sale`(`m_id`, `qty`, `total_tab`, `sale_price`, `purchase_price`) VALUES " . $insert;
    
    if(!$mysqli->query($insert)) {
        echo $insert . "\n";
        printf("Error: %s\n", $mysqli->error);
    }
    
    $mysqli->commit();   
    if ($mysqli->commit()) {
        echo "true";
    }
    else {
        $mysqli->rollback();
        echo "false";
    }
}
?>