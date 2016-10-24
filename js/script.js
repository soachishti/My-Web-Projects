var FormField = "";

function AddFormField() {
     FormField = $('#FormField').clone();
     $('#FormList').append(FormField);
}
    
$(document).ready(function() {
    function notify(msg, type) {
        $("#ErrorMsg").removeClass("alert-success");
        $("#ErrorMsg").removeClass("alert-info");
        $("#ErrorMsg").removeClass("alert-danger");
        if (type == "info") {                           
            $("#ErrorMsg").addClass("alert-info");
        }
        else if (type == "success") {
            $("#ErrorMsg").addClass("alert-success");
        }
        else {
            $("#ErrorMsg").addClass("alert-danger");
        }
        $("#ErrorMsg").html(msg);
        
        $("#ErrorMsg").show();
        setTimeout(function() {
            $("#ErrorMsg").fadeOut(1000);
        }, 
        2000);
    }

	$('#Register').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "ajax.php?register",
            data: $(this).serialize(),
            success: function(response) {
                if (response == "true") {
                    notify("Account successfully created.", "success");
                }
                else {
                    notify("Failed to created account.", "danger");
                }
            }
        });
            
    });

	$('#Login').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "ajax.php?login",
            data: $(this).serialize(),
            success: function(response) {
                console.log(response);
                if (response == "true") {
                    notify("Login Successfull", "success");
                    window.location = "index";
                }
                else {
                    notify("Login Failed", "danger");
                }
            }
        });
            
    });
    
    
});