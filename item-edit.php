<?php
session_start();
require 'dbcon.php';
?>

<?php include 'includes/header.php'; ?>

    
    <div class="container mt-5">

        <?php include 'message.php'; ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Item
                            <a href="index.php" class="btn btn-danger float-end">Back</a>
                        </h4>                        
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $item_id = mysqli_real_escape_string($con,$_GET['id']);
                            $query= "SELECT * FROM item WHERE id = '$item_id'";
                            $query_run = mysqli_query($con, $query);
                            

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $item = mysqli_fetch_array($query_run);
                                ?>   
                                <!-- <form action="code.php" method="POST"> -->
                                <form action="code.php" name="item" method="POST" onsubmit="return validateform()">

                                    <input type="hidden" name="item_id" value="<?=$item['id'];?>">

                                    <div class="mb-3">
                                        <label>Item code</label>
                                        <input type="text" name="item_code" value="<?=$item['item_code'];?>" class="form-control">

                                    </div>
                                    </div>

                                    <div class="mb-3">
                                        <label>Item name</label>
                                        <input type="text" name="item_name" value="<?=$item['item_name'];?>" class="form-control">
                                    </div>

                                    <div class="from-group">
                                <label>Item category</label>
                                <select name="item_category" class="form-control mb-3">
                                    <?php
                                        $con = mysqli_connect('localhost','root','','assignment(1) 1');

                                        $query = "SELECT * FROM item_category";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                                ?>
                                                    <option value="<?=$row['id'];?>"><?=$row['category'];?></option>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                            <option value="">No Record Found</option>
                                            <?php
                                        }
                                    ?>
                                    
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Item subcategory</label>
                                <select name="item_subcategory" class="form-control mb-3">
                                    <?php
                                        $con = mysqli_connect('localhost','root','','assignment(1) 1');

                                        $query = "SELECT * FROM item_subcategory";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                                ?>
                                                    <option value="<?=$row['id'];?>"><?=$row['sub_category'];?></option>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                            <option value="">No Record Found</option>
                                            <?php
                                        }
                                    ?>
                                    
                                </select>
                            </div>

                                    <div class="mb-3">
                                        <label>Quantity</label>
                                        <input type="text" name="quantity" value="<?=$item['quantity'];?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label>Unit price</label>
                                        <input type="text" name="unit_price" value="<?=$item['unit_price'];?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_item" class="btn btn-primary">Update Item</button>
                                    </div>


                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4> No Such Id found </h4>";
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

function validateform() {
  var x = document.item.item_code.value;
  var y = document.item.item_name.value;
  var z = document.item.item_category.value;
  var a = document.item.item_subcategory.value;
  var b = document.item.quantity.value;
  var c = document.item.unit_price.value;

  var itemCodeRegex = /^[A-Z0-9]+$/; // Regex for item code (capital letters and numbers)
  var itemNameRegex = /^[A-Z][a-zA-Z]*$/; // Regex for item name (starts with capital letter)
  var integerRegex = /^\d+$/; // Regex for an integer

  if (x === "") {
    alert("Item code must be filled out!");
    return false;
  } else if (!itemCodeRegex.test(x)) {
    alert("Invalid item code. Please use capital letters and numbers only.");
    return false;
  } else if (y === "") {
    alert("Item name must be filled out!");
    return false;
  } else if (!itemNameRegex.test(y)) {
    alert("Invalid item name. Please start with a capital letter and use only letters.");
    return false;
  } else if (z === "") {
    alert("Item category must be filled out!");
    return false;
  } else if (a === "") {
    alert("Item subcategory must be filled out!");
    return false;
  } else if (b === "") {
    alert("Quantity must be filled out!");
    return false;
  } else if (!integerRegex.test(b)) {
    alert("Invalid quantity. Please enter an integer value.");
    return false;
  } else if (c === "") {
    alert("Unit price must be filled out!");
    return false;
  } else if (!integerRegex.test(c)) {
    alert("Invalid unit price. Please enter an integer value.");
    return false;
  }
}
</script>

<?php include 'includes/footer.php'; ?>