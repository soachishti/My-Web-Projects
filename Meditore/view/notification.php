        <h2>Notification Center</h2>

       <?php
       // Get syrup/injection...
        $query1 = "SELECT m.name AS medicine_name, m.pack_quanlity, v.name AS vendor_name, v.address, v.phone_no, v.mobile_no FROM medicine AS m JOIN vendor AS v ON m.vendor = v.id WHERE pack_quanlity < $notification AND tab_amount = 0 ORDER BY vendor_name;";
        
        // get tablets
        $query2 = "SELECT * FROM (
        SELECT m.name AS medicine_name, ROUND(m.pack_quanlity/m.tab_amount, 1) AS pack_quanlity, v.name AS vendor_name, v.address, v.phone_no, v.mobile_no FROM medicine AS m JOIN vendor AS v ON m.vendor = v.id WHERE m.tab_amount != 0 ORDER BY vendor_name) AS x WHERE pack_quanlity < $notification;";
       
       $result1 = $mysqli->query($query1);
       $result2 = $mysqli->query($query2);
    if ($result1) {
        if ($result1->num_rows == 0 && $result1->num_rows == 0) {
            ?>
                                <div class="alert alert-success">
  <strong>Stock normal!</strong> You have stock in bulk. 
</div>
            <?php
            
            die();
        }
        else {
        
        ?>
                <div class="alert alert-danger">
  These medicine are about to stock out. 
</div>
        
        <?php
        
        $data = array();
        while ($row = $result1->fetch_assoc()) {
            $data[$row['vendor_name']][] = $row;
        }
        
        while ($row = $result2->fetch_assoc()) {
            $data[$row['vendor_name']][] = $row;
        }
        
        ?>
        <table class="table table-hover">
    <thead>
      <tr>
        <th>Vendor Name</th>
        <th>Mobile No</th>
        <th>Phone No</th>
        <th>Address</th>
        <th>Medicine + Qty. left</th>
      </tr>
    </thead>
    <tbody>
      <?php
        
        foreach($data as $vendor => $medicine) {
            echo "<tr>";
            echo "<td>" . $vendor . "</td>";
            echo "<td>" . $medicine[0]['mobile_no'] . "</td>";
            echo "<td>" . $medicine[0]['phone_no'] . "</td>";
            echo "<td>" . $medicine[0]['address'] . "</td>";
            echo "<td>";
            foreach($medicine as $m) {
                echo  $m['medicine_name'] . " (" . $m['pack_quanlity'] . ")<br />";
            }
            echo "</td>";
            echo "</tr>";
        }
      ?>
    </tbody>
  </table>
        
        <?php
        
        
        
        }
    }
    ?>