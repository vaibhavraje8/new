//new line  is aded
$(document).ready(function()
{

    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z\s]+$/i.test(value);
    });

    jQuery.validator.addMethod("customEmail", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i.test(value);
    }, "Please enter valid email address!");


            $("#form1").validate(
    {
        rules: {
            fname: {
                lettersonly: true,
                required: true
            },
            lname: {
                lettersonly: true,
                required: true            
            },
            email:{
                required: true,
                email: true,
                customEmail: true
            },
            phone:{
                required:true,
                number: true ,
                minlength: 10,
                maxlength: 10
            }

        },
        messages: {
            fname: {
                lettersonly: "please enter characters only",
                required: "Enter your first name, please."
            },
            lname: {
                lettersonly: "please enter characters only",
                required: "Enter your last name, please."
            },
            email: {
                required: "please enter email",
                email: "please enter a valid email address",
                customEmail: "please enter a valid email address"
            },
            phone: {
                required: "please enter phone numbers",
                number:"only numbers are allowed",
                minlength:"phone number is short",
                maxlength:"phone number is too long"
            }
           
        }

    });
 

 $("#savebtn").click(function() {
    if($('#custId').val() == 0)
    { console.log("no id");
            var email  =   $("#email").val();
            var fname  =   $("#fname").val();
            var lname  =   $("#lname").val();
            var phone  =   $("#phone").val();  
        
        $.ajax({

                url: 'postregister.php',
                type: 'post',
                data: {
                         'fname' : fname,
                         'lname' : lname, 
                         'email': email,
                         'phone' : phone,
                         'save' : 1
                    },

                // before ajax request to insert data
                beforeSend: function() {
                    $("#result").html("<p class='text-success'> Please wait.. </p>");
                },  

                // on success response
                success:function(response) {
                    $("#result").html(response);

                    // reset form fields
                    $("#form1")[0].reset();
                },

                // error response
                error:function(e) {
                    $("#result").html("Some error encountered, try again");
                }

            });

    }
    if($('#custId').val() != 0){
        console.log($('#custId').val());
        console.log(" id");
            var email  =   $("#email").val();
            var fname  =   $("#fname").val();
            var lname  =   $("#lname").val();
            var phone  =   $("#phone").val();
            var id     =   $("#custId").val();


            // sending ajax request to upadte data
            $.ajax({

                url: 'postregister.php',
                type: 'post',
                data: {
                         'fname' : fname,
                         'lname' : lname, 
                         'email': email,
                         'phone' : phone,
                         'id' :  id
                    },

                // before ajax request
                beforeSend: function() {
                    $("#result").html("<p class='text-success'> updating wait.. </p>");
                },  

                // on success response
                success:function(response) {
                	//console.log(response); return false;
                	if(response!=""){
                		alert(response);
                	}
                    $("#result").html(response+'<p><a href="startPage.html">click here</a> to go home</p>');
                },

                // error response
                error:function(e) {
                    $("#result").html("Some error encountered.");
                }

            });
        }
});       


}); 



