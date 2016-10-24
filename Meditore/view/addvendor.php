        <h2>Add Vendor</h2>
        <form class="form-horizontal myform" id="AddVendor" role="form">
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-danger" id="InsertMsg" style="display:none;"></div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="usr">Name:</label>
                        <input pattern=".{3,}" required title="Enter vendor" type="text" name="name" class="form-control">
                    </div>
                   
                    <div class="form-group">
                        <label for="usr">Address:</label>
                        <input pattern=".{3,}" required title="Enter address" type="text" name="address" class="form-control">
                    </div> 
                </div>

                <div class="col-sm-3">
                    
                     <div class="form-group">
                        <label for="usr">Phone no:</label>
                        <input type="number" step="any" required name="phone" class="form-control">
                    </div>  
 <div class="form-group">
                        <label for="usr">Mobile no:</label>
                        <input type="number" step="any" required name="mobile" class="form-control">
                    </div>                     
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="usr">Description:</label>
                        <textarea name="description" class="form-control" rows="5"></textarea>
                    </div>
                    
                </div>
                <div class="col-sm-3">
                    <div class="form-group">&nbsp;</div>
                    <div class="form-group">&nbsp;</div>
                    <div class="form-group">&nbsp;</div>
                    <button  class="btn btn-default">Add Vendor </button>
                </div>
            </div>            
        </form>
        <hr />
    <div class="row">
        <div class="col-sm-6">
        <h2>Vendor List</h2>
        </div>
        
    </div>
    <div class="table-responsive">
    <table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Phone</th>
        <th>Mobile</th>
        <th>Address</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody id="VendorList">
        
    </tbody>

  </table>