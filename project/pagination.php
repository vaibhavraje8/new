<?php
require "config.php";
try{
        $limit=4;                        //per page limit
        $order="desc";          
        $query1 = "SELECT * FROM customers";
        if($_GET["page"]==""){
            $page=1;
        }else{
            $page=(int)$_GET["page"];
        }                            
        $offset = ($page - 1)*$limit;

        if($_GET["delId"]!=""){
            $delQuery= "DELETE FROM customers WHERE iId=".$_GET["delId"];
            mysqli_query($con, $delQuery);
        }


    
        if($_GET["x"]!=""){
            $x= addslashes($_GET["x"]);

            $query="SELECT * FROM customers where vFirstName like '%{$x}%' or vLastName like '%{$x}%' or vPhone like '%{$x}%' or vEmail like '%{$x}%' LIMIT $offset, $limit";
            $result = mysqli_query($con, $query);
            $query1 = "SELECT * FROM customers where vFirstName like '%{$x}%' or vLastName like '%{$x}%' or vPhone like '%{$x}%' or vEmail like '%{$x}%' ";
        }

        elseif($_GET["str"]!="" && $_GET["ord"]!=""){
            $query= "SELECT * FROM customers WHERE 1=1 ORDER BY ".$_GET["str"]." ".$_GET["ord"]." " ."LIMIT $offset, $limit";
            $result = mysqli_query($con, $query);
            $order=$_GET["ord"];           
            if($order=="desc"){
                $order="asc";
            }else{
                $order="desc";
            } 

        }
        
        else{        
        $query = "SELECT * FROM customers    LIMIT $offset, $limit";
        $result = mysqli_query($con, $query);
        }




        
        $output="";                        // table to show data
        $output .= '<table style="border:2px  solid #000;" class="table table-bordered"> 
                       <tr style="border:2px  solid #000;">  
                        <th class="col-sm-2 order" order="'.$order.'" id="vFirstName" width="15%">First Name</th>  
                        <th class="col-sm-2 order" order="'.$order.'" id="vLastName" width="15%">Last Name</th> 
                        <th class="col-sm-2 order" order="'.$order.'" id="vEmail" width="15%">Email Id</th> 
                        <th class="col-sm-2 order" order="'.$order.'" id="vPhone" width="15%">Phone Num</th> 
                        <th class="col-sm-2 order" order="" id="" width="15%">Edit</th> 
                        <th class="col-sm-2 order" order="" id="" width="15%">Delete</th></tr>';  
        if($result->num_rows<=0){               
            $output.= "</br><h1>No records Found! </h1>"; 
        }                           // table to show data

        while($row = mysqli_fetch_array($result))  
        {  
            $output .= '  
            <tr style="border:2px  dotted #000;">  
                <td   width="15%">'.$row["vFirstName"].'</td>  
                <td   width="15%">'.$row["vLastName"].'</td>
                <td   width="15%">'.$row["vEmail"].'</td>
                <td   width="15%">'.$row["vPhone"].'</td>
                <td   width="15%"><button id="edit" class="'.$row["iId"].'">Edit</button></td>
                <td   width="15%"><button id="delete" class="'.$row["iId"].'">delete</button></td>

            </tr>';                            // fetch data row by row and show in table
        }  
        $output .= '</table><br /><div align="center">';  
         
        $result1 = mysqli_query($con, $query1);       
        $count=$result1->num_rows;              //number of records in Db table
        $totaPages = ceil($count/$limit);       // number of pages will form
        $pages='<div align="center">';
        for($i=1; $i<=$totaPages; $i++)        //creating pagination bar and set dynamic id for them
        {  
            $pages.="<span class='pageLink' style='cursor:pointer; padding:6px; border:1px  solid #000; border-radius:10px 0px;' id='".$i."'>".$i."</span>";
        }  
        $output .= '</div>

        '; 
        
        echo $output; 
        echo "<br>".$pages."</div><br>"; 
    }
catch(Exception $ex){ //catch any exception if there
    echo $ex;
} 
?>  