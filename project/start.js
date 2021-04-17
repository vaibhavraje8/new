$(document).ready(function(){ 
   

    loadPages(1);
}); 
    function editId(edId)  
    {  
        
        window.location.href = "register.php?edId="+edId;
    } 

    $(document).on('click', '#edit', function(){  
        edId = $(this).attr("class");  
        editId(edId);  
    });



    $(document).on('click', '.pageLink', function(){
        page = $(this).attr("id");  
        loadPages();  
    });

   $(document).on('click', '#delete', function(){     
        var conf = confirm("you want to delete this record??");
        if (conf == true) {
         delId = $(this).attr("class");
        }  
        loadPages();
    });

    $(document).on('click', '.order', function(){  
        str = $(this).attr("id");
        ord = $(this).attr("order");        
       loadPages();
    }); 

    function myFunction() {
             x = $("#myInput").val();
             page="";
             loadPages();
        }


function loadPages()  
{ 
    if (typeof x == 'undefined') {
        x="";          
    }
    
    if (typeof str == 'undefined' && typeof ord == 'undefined') {
        str="";
        ord="";          
    }
    if (typeof delId == 'undefined') {
        delId="";          
    }
    if (typeof page == 'undefined') {
        page="";          
    }

    $.ajax({  
            url:"pagination.php?page="+page+"&delId="+delId+"&str="+str+"&ord="+ord+"&x="+x+"&p=1",  
            method:"GET",
            success:function(data){  
                $('#pData').html(data);  
            }  
        })
    }

