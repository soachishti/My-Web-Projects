<h2>Invoice</h2>
<form class="form-inline myform" action="" method="get" role="form">
    <div class="form-group">
        <label for="usr">Select Vendor:</label>
    </div>
    <div class="form-group">
        <select class="form-control" name="vendor">
                        
                        <?php
                        $vendor_name = "";
                        $query = sprintf("SELECT * FROM vendor ORDER BY id DESC");
                        if ($result = $mysqli->query($query)) {
                            if ($result->num_rows == 0) {
                                echo "<option>None</option>";
                            }
                            /* fetch associative array */
                            while ($row = $result->fetch_assoc()) {                                
                                echo "<option " . ((isset($_GET['vendor']) && $_GET['vendor'] == $row['id']) ? "selected" : "") . " value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                if (isset($_GET['vendor']) && $_GET['vendor'] == $row['id'])
                                {
                                    $vendor_name =  $row['name'];
                                }
                            }
                            $result->free();
                        }
                        
                        ?>
                          </select>
    </div>
    <div class="form-group">
        <label for="usr">Select Month:</label>
    </div>
    <div class="form-group">           
        <select class="form-control" name="date" id="month" >
            <option value="">Select</option>
            <?php
            $d = new DateTime($startdate);

            while($d->format('M Y') != date("M Y", strtotime("+1 month"))) {
                $date_str = $d->format( 'M Y' );
                echo "<option " . ((isset($_GET['date']) && $_GET['date'] == $d->format( 'm Y' )) ? "selected" : "") . " value='" . $d->format( 'm Y' ) . "'>".$date_str ."</option>";
                $d->modify( 'next month' );
            } 
            ?>
        </select>                        
    </div>
    <div class="form-group">
        <button class="btn btn-default btn-primary" type="submit" class="btn btn-default">Search</button>
    </div>
</form>


<?php
       
       if (isset($_GET['vendor']) && !empty($_GET['vendor'])) {
        
        $date = explode(" ", $_GET['date']);
        $query = "SELECT m.vendor, m.name, m.tab_amount, s.*, s.total_tab % m.tab_amount AS tab, m.sale_price, m.purchase_price FROM sale AS s JOIN medicine AS m ON s.m_id = m.id WHERE vendor = '".intval($_GET['vendor'])."' AND MONTH(datetime) = ".$date[0]."  AND YEAR(datetime) = ".$date[1]." ;";
        
        
    if ($result = $mysqli->query($query)) {
        if ($result->num_rows == 0) {            
            echo '<div class="alert alert-success">
  <strong>No invoice!</strong> Zero medicine sold for this vendor
</div>';
        }
        else {
        
        ?>
     <hr /> 
    <div style="text-align:center;">
        <h3><?php echo $vendor_name;?></h3>
        <h4>Invoice for the month <u><?php echo date("M Y", strtotime("1-".str_replace(" ", "-", $_GET['date'])));?></u></h4>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Medicine Name</th>
                <th>Qty.</th>
                <th>Tablets</th>
                <th>Sale Price</th>
                <th>Sold For</th>
            </tr>
        </thead>
        <tbody>
            <?php
        $totalCost = 0;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['qty'] . "</td>";
            echo "<td>" . $row['tab'] . "</td>";
            
            echo "<td>" . $row['sale_price'] . "</td>";
            if ($row['tab_amount'] != 0) {
                $sold_for = round(($row['sale_price'] / $row['tab_amount']) * $row['total_tab'], 2);
            }
            else {
                $sold_for = round(($row['sale_price']) * $row['qty'], 2); 
            }
            $totalCost += $sold_for;
           echo "<td>Rs " . $sold_for . "</td>";
            echo "</tr>";
        }
      ?>
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-6" style="text-align: left;">
            <p style="text-align:left;"><b>Generated Date</b>: <?php echo date("F j, Y, g:i a"); ?></span>

        </div>
        <div class="col-sm-6" style="text-align: right;">
            <p style="font-size:10px;"><b>TOTAL COST</b></p>
            <h3 style="padding:0px;margin:0px;">Rs <?php echo $totalCost; ?></h3>
        </div>
    </div>
    <?php
        
        
    }
    }
    }
       ?>