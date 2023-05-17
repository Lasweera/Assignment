<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_customer']))
{
    $customer_id = mysqli_real_escape_string($con,$_POST['delete_customer']);

    $query = "DELETE FROM customer WHERE id='$customer_id'";

    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Customer deleted successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "Customer not deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_customer']))
{
    $customer_id = mysqli_real_escape_string($con,$_POST['customer_id']);
    $title = mysqli_real_escape_string($con,$_POST['title']);
    $first_name = mysqli_real_escape_string($con,$_POST['first_name']);
    $middle_name = mysqli_real_escape_string($con,$_POST['middle_name']);
    $last_name = mysqli_real_escape_string($con,$_POST['last_name']);
    $number = mysqli_real_escape_string($con,$_POST['number']);
    $district = mysqli_real_escape_string($con,$_POST['district']);

    $query = "UPDATE customer SET  title='$title',first_name='$first_name',middle_name='$middle_name',
    last_name='$last_name',contact_no='$number',district='$district' WHERE id='$customer_id'";

    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Customer updated successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "Customer not updated";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['save_customer']))
{
    $title = mysqli_real_escape_string($con,$_POST['title']);
    $first_name = mysqli_real_escape_string($con,$_POST['first_name']);
    $middle_name = mysqli_real_escape_string($con,$_POST['middle_name']);
    $last_name = mysqli_real_escape_string($con,$_POST['last_name']);
    $number = mysqli_real_escape_string($con,$_POST['number']);
    $district = (int)mysqli_real_escape_string($con,$_POST['district']);


    $query = "INSERT INTO customer (title,first_name,middle_name,last_name,contact_no,district) VALUES (
        '$title','$first_name','$middle_name','$last_name','$number','$district')";
    
    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Customer added successfully";
        header("Location: customer-insert.php");
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "Customer not added";
        header("Location: customer-insert.php");
        exit(0);
    }
      
}

if(isset($_POST['delete_item']))
{
    $item_id = mysqli_real_escape_string($con,$_POST['delete_item']);

    $query = "DELETE FROM item WHERE id='$item_id'";

    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Item deleted successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "Item not deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_item']))
{
    $item_id = mysqli_real_escape_string($con,$_POST['item_id']);
    $item_code = mysqli_real_escape_string($con,$_POST['item_code']);
    $item_category = mysqli_real_escape_string($con,$_POST['item_category']);
    $item_subcategory = mysqli_real_escape_string($con,$_POST['item_subcategory']);
    $item_name = mysqli_real_escape_string($con,$_POST['item_name']);
    $quantity = mysqli_real_escape_string($con,$_POST['quantity']);
    $unit_price = mysqli_real_escape_string($con,$_POST['unit_price']);

    $query = "UPDATE item SET  item_code='$item_code',item_category='$item_category',item_subcategory='$item_subcategory',
    item_name='$item_name',quantity='$quantity',unit_price='$unit_price' WHERE id='$item_id'";

    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Item updated successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "Item not updated";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['save_item']))
{
    $item_id = mysqli_real_escape_string($con,$_POST['item_id']);
    $item_code = mysqli_real_escape_string($con,$_POST['item_code']);
    $item_category = mysqli_real_escape_string($con,$_POST['item_category']);
    $item_subcategory = mysqli_real_escape_string($con,$_POST['item_subcategory']);
    $item_name = mysqli_real_escape_string($con,$_POST['item_name']);
    $quantity = mysqli_real_escape_string($con,$_POST['quantity']);
    $unit_price = mysqli_real_escape_string($con,$_POST['unit_price']);

    $query = "INSERT INTO item (item_code,item_category,item_subcategory,item_name,quantity,unit_price) VALUES (
        '$item_code','$item_category','$item_subcategory','$item_name','$quantity','$unit_price')";

    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Item added successfully";
        header("Location: item-insert.php");
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "Item not added";
        header("Location: item-insert.php");
        exit(0);
    }
      
}


?>