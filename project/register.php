<?php
include "config.php";
if(isset($_GET['edId'])&&$_GET['edId']>0){
	$query= "SELECT * FROM customers WHERE iId=".$_GET["edId"]; 
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    $id= $row["iId"]; 
    $fname=$row["vFirstName"]; 
    $lname=$row["vLastName"];
    $email=$row["vEmail"];
    $phone=$row["vPhone"];
}
else{
	$id= 0 ;
	$fname=""; 
    $lname="";
    $email="";
    $phone="";
}
?>

<HTML>
<HEAD>
<TITLE></TITLE>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style type="text/css">
        .error{
            color:red;
        }</style>

  
</HEAD>
<BODY bgcolor="#555">
    


    <div class="row justify-content-md-center" style="border-style: solid; border-width:2px;">
        
        <form id="form1" class="form-horizontal" action="" method="post"  style="padding: 70px;">
            <a class="col-sm-2" href="startPage.html"><button type="button">HOME</button></a>
            <br><h1 style="text-align: center;">Form</h1> 

            <input type="hidden" id="custId" name="custId" value="<?php echo $id; ?>">

            <div class="form-group">
                <label class="control-label col-sm-4" for="fname" >First Name:</label>
                <div class="col-sm-4">          
                    <input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname" value="<?php echo $fname; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="lname" >Last Name:</label>
                <div class="col-sm-4">          
                     <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname" value="<?php echo $lname; ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-4" for="email" >Email:</label>
                <div class="col-sm-4">          
                     <input type="email" class="form-control" id="email" placeholder="Enter your Email" name="email" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="phone" >Phone Number</label>
                <div class="col-sm-4">          
                     <input type="" class="form-control" id="phone" placeholder="Enter your phone number" name="phone" value="<?php echo $phone; ?>">
                </div>
            </div>

            <div class="form-group">        
                <div class="col-sm-offset-4 col-sm-4">
                    <button type="submit" id="savebtn" class="btn btn-success btn-md">Submit</button>
                </div>
            </div>


            <div id="result"> </div>
        </form>  
    </div>
   

    <script src="register.js"></script>
</BODY>
</HTML>
 