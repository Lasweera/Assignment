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
                        <h4>Edit Customer
                            <a href="index.php" class="btn btn-danger float-end">Back</a>
                        </h4>                        
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $customer_id = mysqli_real_escape_string($con,$_GET['id']);
                            $query= "SELECT c.*,d.district as dis_name FROM customer c
                            INNER JOIN district d ON d.id=c.district WHERE c.id = '$customer_id'";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $customer = mysqli_fetch_array($query_run);
                                ?>   
                                
                                <form action="code.php" name="customer" method="POST" onsubmit="return validateform()">

                                    <input type="hidden" name="customer_id" value="<?=$customer['id'];?>">

                                    <div class="mb-3">
                                        <label>Title</label>
                                        <input type="text" name="title" value="<?=$customer['title'];?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label>First name</label>
                                        <input type="text" name="first_name" value="<?=$customer['first_name'];?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label>Middle name</label>
                                        <input type="text" name="middle_name" value="<?=$customer['middle_name'];?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label>Last name</label>
                                        <input type="text" name="last_name" value="<?=$customer['last_name'];?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label>Contact number</label>
                                        <input type="text" name="number" value="<?=$customer['contact_no'];?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label>District</label>
                                        <select name="district" id="district" class="form-control mb-3">
                                            <option value="">Select</option>
                                            <?php
                                                $query = "SELECT * FROM district";
                                               

                                               
                                                $query_run = mysqli_query($con, $query);

                                               
                    
                                         
                                                while($row=mysqli_fetch_array($query_run)){
                                                    $dis_code = $row['id'];
                                                    $dis_name = $row['district'];


                                                    
                                            ?>

                                            <option <?php if($customer['district']==$dis_code){ ?> selected="selected" <?php }?> value='<?php echo $dis_code; ?>' >
                                            <?php echo $dis_name; ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                        <!-- //<input type="text" name="district" value="<?=$customer['dis_name'];?>" class="form-control"> -->
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_customer" class="btn btn-primary">Update Customer</button>
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
  var title = document.customer.title.value;
  var first_name = document.customer.first_name.value;
  var middle_name = document.customer.middle_name.value;
  var last_name = document.customer.last_name.value;
  var number = document.customer.number.value;
  var district = document.customer.district.value;

  var nameRegex = /^[A-Z][a-z]*$/; 
  var numberRegex = /^\d{10}$/; 

  if (title == null || title === "") {
    alert("title can't be blank");
    return false;
  } else if (!nameRegex.test(first_name)) {
    alert("Invalid first name. Please capitalize the first letter and use only letters.");
    return false;
  } else if (!nameRegex.test(middle_name)) {
    alert("Invalid middle name. Please capitalize the first letter and use only letters.");
    return false;
  } else if (!nameRegex.test(last_name)) {
    alert("Invalid last name. Please capitalize the first letter and use only letters.");
    return false;
  } else if (!numberRegex.test(number)) {
    alert("Invalid number. Please enter a 10-digit integer.");
    return false;
  } else if (district == null || district === "") {
    alert("district can't be blank");
    return false;
  }
}



 
</script>  

    <?php include 'includes/footer.php'; ?>