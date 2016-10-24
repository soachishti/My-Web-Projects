<div class="row">
    <div class="col-sm-6">
        <h3>RECORD</h3>
    </div>
    <div class="col-sm-4" style="float:right;">
        <form class="form-inline" id="SearchFormSale" style="float:right;">
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
                <th style="width:2%"></th>
                <th class="col-md-1">Name</th>
                <th class="col-md-1">Type</th>
                <th class="col-md-1">Sale Price</th>
                <th class="col-md-1">Tablets</th>
                <th class="col-md-1">Quantity</th>
                <th class="col-md-2">Company Name</th>
                <th class="col-md-4">Description</th>
            </tr>
        </thead>
        <tbody id="ProductList">

        </tbody>

    </table>
</div>
<div class="row">
    <div class="col-sm-1">
        <button onclick="GetMoreProduct()" id="LoadInventory" class="btn btn-default">Load More</button>
    </div>
    <div class="col-sm-4">
        <div id="LoadMsg" style="margin: 5px 0 0 10px; display:none; color: red;"></div>
    </div>
</div>

<div id="SelectedProductOverlap">&nbsp;</div>
<form class="form-inline" style="display:none;" id="SelectedProduct">
    <div class="row">
        <div class="col-sm-6">
            <h4 style="margin:10px 0 0 0; padding:0;">SELECTED MEDICINE</h4>
        </div>
    </div>    
    <div class="col-sm-10">
        <div class="table-responsive" id="SelectProductDiv">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Tablets</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody id="SelectItem">
                    
                </tbody>
            </table>
        </div> 
    </div> 
    <div class="col-sm-2"   style="padding:0;">
        <div class="form-group">
            <label>Total Price</label>
            <div class="input-group">
              <input type="text" disabled class="form-control" name="totalprice" id='totalprice' placeholder="Amount">
              <div class="input-group-addon">-/Rs</div>
            </div>
          </div>
          
          <div class="form-group">
            <label>Received</label>
            <div class="input-group">
              <input type="number" class="form-control" oninput="UpdateReturnMoney()" name="receivedprice" id='receivedprice' placeholder="Amount">
              <div class="input-group-addon">-/Rs</div>
            </div>
          </div>
          <div class="row">
                <div class="col-sm-6">
                    Return: <div id="ReturnMoney">0.00</div>
                </div>
                
                <div class="col-sm-6" style="float: right; text-align:right;">
                    <button class="btn btn-primary" type="submit" disabled id="SaleFinal">Sale</button>
                </div>
            </div>
         
    </div>
</form>