<?php 
    //Include Constants File
    include('../config/constants.php');
    //echo "delete";
    //Check whether the id and image_name value is set or not
    if(isset($_GET['id']) AND isset($_GET['image_name'])){
        //Get the value and Delete
        //echo "Get value and delete";
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //Remove the physical image file is available
        if($image_name != ""){
            //Image is Available. so remove it
            $path = "../images/category/".$image_name;
            //Remove the image
            $remove = unlink($path);

            //If failed to remove image then add an error message and stop the process
            if($remove==FALSE){
                //Set the session message
                $_SESSION['remove'] = "<div class='error'>Failed to Remove Category Image.</div>";

                //Redirect to manage Category page
                header('location:'.SITEURL.'admin/manage-category.php');
                //Stop the process
                die();
            }
        }

        //Delete Data from Database
        //SQL Query to Delete Data from Database
        $sql = "DELETE FROM tbl_category WHERE id=$id";

        //Execute the Query
        $res = mysqli_query($conn,$sql);

        //check whether the data is delete from database or not
        if($res==TRUE){
            //SET Success Message and redirect
            $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully.</div>";
            //Redirect to manage category
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else{
            //SET Fail Message and Redirect
             $_SESSION['delete'] = "<div class='error'>Failed to Delete Category.</div>";
             //Redirect to manage category
             header('location:'.SITEURL.'admin/manage-category.php');
         
        }
        //Redirect to Manage Category Page with Message
    }
    else{
        //Redirect the Manage Category Page
        header('location:'.SITEURL.'admin/manage-category.php');
    }
?>