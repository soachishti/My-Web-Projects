var pageno = 0;
var productdata = {};
var selectedCounter = 0;
var selectedItem = {};
var update = false;

function DisabledBtn(lock) {
    if (lock) {
        $("#LoadMsg").show();
        $("#LoadMsg").html("No more records");
        $("#LoadInventory").prop("disabled", true);
    } else {
        $("#LoadMsg").hide();
        $("#LoadInventory").prop("disabled", false);
    }
}

function GetProductFromList(id) {
    for(var i = 0; i < productdata.length; i++) {
        if(productdata[i].id == id) {
            return i;
        }
    }
}

function EditItem(id) {
    jQuery('html,body').animate({scrollTop:0},200);
    update = true;
    $("#name").val(productdata[GetProductFromList(id)]['name']);
    $("#pp").val(productdata[GetProductFromList(id)]['purchase_price']);
    $("#sp").val(productdata[GetProductFromList(id)]['sale_price']);
    $("#potency").val(productdata[GetProductFromList(id)]['potency']);
    $("#package_quantity").val(productdata[GetProductFromList(id)]['pack_quanlity']);
    $("#tab_amount").val(productdata[GetProductFromList(id)]['tab_amount']);
    $("#company_name").val(productdata[GetProductFromList(id)]['company_name']);
    $("#description").val(productdata[GetProductFromList(id)]['description']);
}

function GetItem() {
    $.get("ajax.php?inventory&page=" + pageno + "&s=" + $('#searchtext').val(), function(data, status) {
        if (data == "false") {
            DisabledBtn(true);
        } else {
            $("#InventoryItem").append(data);
            pageno++;
        }
    });
}

function GetVendor() {
    $.get("ajax.php?getvendor", function(data, status) {
        if (data == "false") {
            $("#VendorList").html("<p style='margin:10px 0 0 10px;color:red;'>No vendor available</p>");
        } else {
            $("#VendorList").html(data);
        }
    });
}

function SearchItem(search = true) {
    pageno = 0;
    if (search == true) search = $('#searchtext').val()
    else search = "";

    $.get("ajax.php?inventory&page=" + pageno + "&s=" + search, function(data, status) {
        if (data == "false") {
            $("#ErrorMsg").html("No record found");
            $("#ErrorMsg").show();
            setTimeout(function() {
                $("#ErrorMsg").fadeOut(1000);
            }, 2000);
        } else {
            DisabledBtn(false);
            $("#InventoryItem").html(data);
            pageno++;
        }
    });
}

////////// GET PRODUCTS

function GenTable(data) {
            var html;
            for (var key in data) {
                var notification = 'class="danger"';
                if (data[key]['pack_quanlity'] > 10)
                    notification = "";
                
                html += "<tr "+notification+">";
                    
                html += "<td><button type='button' class='btn btn-primary btn-xs SelectProduct'>+</button><input type='hidden' value='" + key + "' name='checked' ></td>";
                html += "<td>" + data[key]['name'] + "</td>";
                html += "<td>" + data[key]['type'] + "</td>";
                html += "<td>" + data[key]['sale_price'] + "</td>";
                
                if (data[key]['type'] == 'tablet' || data[key]['type'] == 'capsule') {
                    html += "<td>" + data[key]['tab_amount'] + "</td>";
                    html += "<td>" + Math.floor(data[key]['pack_quanlity'] / data[key]['tab_amount']) +
                        " (" + data[key]['pack_quanlity'] + ")" + "</td>";
                }
                else {
                    html += "<td></td>";
                    html += "<td>" + data[key]['pack_quanlity'] + "</td>";
                }
                
                html += "<td>" + data[key]['company_name'] + "</td>";
                html += "<td>" + data[key]['description'] + "</td></tr>"
            }
    return html;
}

function GetProduct() {
    
    pageno = 0;
    $.get("ajax.php?getproduct&page=" + pageno + "&s=" + $('#searchtext').val(), function(data, status) {
        if (data == "false") {
            DisabledBtn(true);
        } else {
            data = JSON.parse(data);
            productdata = data;
            console.log(productdata);
            var html = GenTable(data);
            $("#ProductList").html(html);
            pageno++;
        }
    });
}

function GetMoreProduct() {
    $.get("ajax.php?getproduct&page=" + pageno + "&s=" + $('#searchtext').val(), function(data, status) {
        if (data == "false") {
            DisabledBtn(true);
        } else {
            data = JSON.parse(data);
            for (var d in data) productdata.push(data[d]);           
            var html = GenTable(productdata);
            $("#ProductList").append(html);
            window.scrollTo(0,document.body.scrollHeight);
            pageno++;
        }
    });
}

function SearchItemSale(search = true) {
    pageno = 0;
    if (search == true) search = $('#searchtext').val()
    else search = "";

    $.get("ajax.php?getproduct&page=" + pageno + "&s=" + search, function(data, status) {
        if (data == "false") {
            $("#ErrorMsg").html("No record found");
            $("#ErrorMsg").show();
            setTimeout(function() {
                $("#ErrorMsg").fadeOut(1000);
            }, 2000);
        } else {
            DisabledBtn(false);
            data = JSON.parse(data);
            productdata = data;
            var html = GenTable(data);
            $("#ProductList").html(html);
            pageno++;
        }
    });
}

function ResetSale() {
    $("#totalprice").val(0);
    $("#receivedprice").val(0);
    $("#SelectItem").html("");
    $("#SelectedProduct").hide();
    $("#SelectedProductOverlap").hide();
    GetProduct();
    productdata = {};
    DisabledBtn(false)
}

function AddSaleSubmit(x) {
    $.ajax({
            type: "POST",
            url: "ajax.php?addsale",
            data: $(x).serialize(),
            success: function(data) {
                console.log(data);
                if (data == "true") {
                    swal("Sale Recorded!", "Transaction successfull!", "success");
                    ResetSale();
                }
                else {
                    sweetAlert("Oops...", "Something went wrong!", "error");
                }
                
            }
        });
}

function SetTotalPrice() {
    var cost = 0;
    $( "#SelectItem tr" ).each(function( index ) {
        var tdInput=$(this).find("td input");
        var id = parseInt($(tdInput[0]).val());
        var tab = parseInt($(tdInput[1]).val());
        var qty = $(tdInput[2]).val();
        var saleprice = parseInt(productdata[id]['sale_price']);
        var tab_amount = parseInt(productdata[id]['tab_amount']);
        
        if (typeof qty === "undefined") {
            qty = parseInt(tab);
            console.log(saleprice*qty);
            var this_cost = parseFloat(saleprice) * parseFloat(qty);
            cost = (parseFloat(cost) + parseFloat(this_cost)).toFixed(2);
            $(this).find("#TotalPrice").html(this_cost);
        }
        else {
            qty = parseInt(qty);
            if (tab_amount != 0)
                var cost_per_tab = saleprice/tab_amount;
            else 
                var cost_per_tab = 0;
            
            console.log("Tab Amount: " + productdata[id]['tab_amount']);
            console.log("Tab Cost: " + cost_per_tab);
            var total_tab = tab + (tab_amount*qty);
            $(this).find("#total_tab").val(total_tab);
            console.log("Total Tab: " + total_tab.toFixed(2));
            
            var this_cost = (parseFloat(cost_per_tab) * parseFloat(total_tab)).toFixed(2);
            $(this).find("#TotalPrice").html(this_cost);

            cost = (parseFloat(cost) + parseFloat(this_cost)).toFixed(2);
            console.log("Cost: " + (cost_per_tab*total_tab).toFixed(2));
        }
    });
    //console.log(cost);
    $("#totalprice").val(cost);
    UpdateReturnMoney();
}

function UpdateReturnMoney() {
    if ($("#receivedprice").val()) {
        var returnCost = parseFloat($("#receivedprice").val()) - parseFloat($("#totalprice").val());
        $("#ReturnMoney").html(returnCost.toFixed(2));
        
        if (returnCost >= 0) {
            $("#SaleFinal").attr("disabled", false);
        }
        else {
            $("#SaleFinal").attr("disabled", true);
        }
    }
}

$(document).ready(function() {
    if ($("#InventoryItem"))
        GetItem();

    if ($("#ProductList"))
        GetProduct();
    
    if ($("#VendorList"))
        GetVendor();
    
    $('#SelectedProduct').submit(function(e) {
        e.preventDefault();
        AddSaleSubmit(this);
    });
    
    $('#SearchFormSale').submit(function(e) {
        e.preventDefault();
        SearchItemSale();
    });
    
    $('#SearchForm').submit(function(e) {
        e.preventDefault();
        SearchItem();
    });
  
    $(document).on('click', '.SelectProduct' ,function() {
        if($(this).html() == "+") {
            $(this).addClass("disabled");
            
            //$(this).attr('checked', false);
            var id = $(this).next().val();
            
            // Dont add same item again
            if (selectedItem[id] == true)
                return;
            selectedItem[id] = true;
            var html;
            html += "<tr>";
            html += "<td><button type='button' class='btn btn-danger btn-xs SelectProduct'>-</button><input type='hidden' value='"+id+"' checked'></td>";
            html += "<td>"+productdata[id]['name']+"</td>";
            
            if (productdata[id]['type'] == "tablet" || productdata[id]['type'] == "capsule") {
                var max_item = productdata[id]['tab_amount'];
                if (max_item > productdata[id]['pack_quanlity']) {
                    max_item = productdata[id]['pack_quanlity'];
                }
                
                
                html += "<td><input style='width:60px;' type='number' oninput='SetTotalPrice();' name='data["+selectedCounter+"][tab_amount]' class='form-control' value='0' min='0' max='" + max_item + "'></td>";
                
            } else {
                html += "<td></td>";
            }
            if (productdata[id]['type'] == "tablet" || productdata[id]['type'] == "capsule") {
                var max_item = parseInt(productdata[id]['pack_quanlity']) / parseInt(productdata[id]['tab_amount']);
                html += "<td><input style='width:60px;' type='number' oninput='SetTotalPrice();' name='data["+selectedCounter+"][pack_quantity]' class='form-control' min='0' value='0' max='"+ max_item +"'></td>";
            }
            else {
                var max_item = parseInt(productdata[id]['pack_quanlity']);
                html += "<td><input style='width:60px;' type='number' oninput='SetTotalPrice();' name='data["+selectedCounter+"][pack_quantity]' class='form-control' min='0' value='0' max='" + max_item +"'></td>";
            }
            html += "<td>"+productdata[id]['sale_price']+"</td>";
            html += "<td id='TotalPrice'>0.00</td>";
            
            html += "<input type='hidden' name='data["+selectedCounter+"][sale_price]' value='"+productdata[id]['sale_price']+"'></td>";
            html += "<input type='hidden' name='data["+selectedCounter+"][purchase_price]' value='"+productdata[id]['purchase_price']+"'></td>";
            html += "<input type='hidden' name='data["+selectedCounter+"][id]' value='"+productdata[id]['id']+"'></td>";
            html += "<input type='hidden' id='total_tab' name='data["+selectedCounter+"][total_tab]' value='0'></td>";
            html += "</tr>";
            selectedCounter++;

            
            $("#SelectItem").append(html);
            SetTotalPrice();
            $("#SelectedProduct").show();
            $("#SelectedProductOverlap").show();
        }
        else {
            console.log($(this).parent().parent());
            $(this).parent().parent().remove();
            SetTotalPrice();
            selectedCounter = 0;
            if ($("#SelectItem tr").size() == 0) {
                $("#SelectedProduct").hide();
                $("#SelectedProductOverlap").hide();
                selectedCounter = 0;
            }
        }
    });

    $('#AddProduct').submit(function(e) {
        
        e.preventDefault();
        form = $('#AddProduct');
        $.ajax({
            type: "POST",
            url: "ajax.php?addproduct",
            data: form.serialize(),
            success: function(response) {
                console.log(response);
                console.log(update);
                if (response == "true") {
                    $("#InsertMsg").removeClass("alert-danger");
                    if (update == true) {                           
                        $("#InsertMsg").addClass("alert-info");
                        $("#InsertMsg").html("Record Updated");
                    }
                    else {
                        $("#InsertMsg").addClass("alert-success");
                        $("#InsertMsg").html("Record Added");
                    }
                    update = false;                    
                    SearchItem(false); // Reload item 
                } else {
                    $("#InsertMsg").removeClass("alert-success");
                    $("#InsertMsg").addClass("alert-danger");
                    $("#InsertMsg").html("Failed to add record");
                }                    
                $("#InsertMsg").show();
                setTimeout(function() {
                    $("#InsertMsg").fadeOut(1000);
                }, 
                2000);
            }
        });
        
    });

    $('#AddVendor').submit(function(e) {
        e.preventDefault();

        form = $('#AddVendor');
        $.ajax({
            type: "POST",
            url: "ajax.php?addvendor",
            data: form.serialize(),
            success: function(response) {
                if (response == "true") {
                    GetVendor(); // Reload item 
                } else {

                    $("#InsertMsg").html("Failed to add record");
                    $("#InsertMsg").show();
                    setTimeout(function() {
                        $("#InsertMsg").fadeOut(1000);
                    }, 2000);
                }
            }
        });

    });
});