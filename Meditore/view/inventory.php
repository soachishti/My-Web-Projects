<h2>Add Medicine</h2>
<form class="form-horizontal myform" id="AddProduct" role="form">
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-danger" id="InsertMsg" style="display:none;"></div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label for="usr">Name:</label>
                <input pattern=".{3,}" required title="Enter medicine name" type="text" id="name" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="usr">Type:</label>
                <select class="form-control" id="sel1" name="type">
                            <option value='tablet'>Tablet</option>
                            <option value='capsule'>Capsules</option>
                            <option value='liquid'>Liquid</option>
                            <option value='syrup'>Syrup</option>
                            <option value='drops'>Drops</option>
                            <option value='inhalers'>Inhalers</option>
                            <option value='injection'>Injection</option>
                            <option value='powder'>Powder</option>
                            <option value='other'>Other</option>
                          </select>
            </div>
            <div class="form-group">
                <label for="usr">Potency:</label>
                <input pattern=".{3,}" required title="Enter medicine potency" type="text" id="potency" name="potency" class="form-control">
            </div>
        </div>

        <div class="col-sm-3">

            <div class="form-group">
                <label for="usr">Sale Price:</label>
                <input type="number" step="any" required name="sp" class="form-control"  id="sp">
            </div>
            <div class="form-group">
                <label for="usr">Purchase Price:</label>
                <input type="number" step="any" required name="pp" class="form-control"  id="pp">
            </div>
            <div class="form-group">
                <label for="usr">Vendor:</label>

                <select class="form-control" name="vendor">
                            
                        <?php
                        $query = sprintf("SELECT * FROM vendor ORDER BY id DESC");
                        if ($result = $mysqli->query($query)) {
                            if ($result->num_rows == 0) {
                                echo "None";
                            }
                            /* fetch associative array */
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                            }
                            $result->free();
                        }
                        
                        ?>
                          </select>

            </div>

        </div>

        <div class="col-sm-3">
            <div class="form-group">
                <label for="usr">Package Quantity:</label>
                <input type="number" required name="package_quantity" class="form-control"  id="package_quantity">
            </div>
            <div class="form-group">
                <label for="usr">Tablet Amount:</label>
                <input type="number" required name="tab_amount" class="form-control"  id="tab_amount">
            </div>
            <div class="form-group">
                <label for="usr">Company Name:</label>
                <input pattern=".{3,}" required title="Enter company name" type="text" name="company_name"  id="company_name" class="form-control">
            </div>

        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label for="usr">Description:</label>
                <textarea name="description" class="form-control" rows="5" id="description"></textarea>
            </div>
            <div class="form-group">
                <label for="usr"><hr /></label>
                <input type="hidden" name="medicine">
                <button class="btn btn-default btn-primary" type="submit" name="medicine" class="btn btn-default">Add</button>
            </div>
        </div>
    </div>



</form>
<hr />
<div class="row">
    <div class="col-sm-6">
        <h2>Record</h2>
        <div class="col-sm-12" style="text-align: left; padding-left:0px;">
            <b>Note:</b> Click product to edit.
        </div>
    </div>
    <div class="col-sm-4" style="float:right;">
        <form class="form-inline" id="SearchForm" style="float:right;">
            <br />
            <input type="text" class="form-control" id="searchtext" placeholder="Search Medicine">
            <button class="btn btn-default">Search </button>
        </form>
        
    </div>
    <div class="col-sm-12">
        <div class="alert alert-danger" id="ErrorMsg" style="display:none;"></div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Potency</th>
                <th>Vendor</th>
                <th>Sale</th>
                <th>Purchase</th>
                <th>Tabs.</th>
                <th>Quantity.</th>
                <th>Company.</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody id="InventoryItem">

        </tbody>

    </table>
</div>
<div class="row">
    <div class="col-sm-1">
        <button onclick="GetItem()" id="LoadInventory" class="btn btn-default">Load More</button>
    </div>
    <div class="col-sm-4">
        <div id="LoadMsg" style="margin: 5px 0 0 10px; display:none; color: red;"></div>
    </div>

</div>