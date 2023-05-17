<?php
session_start();


?>

<?php include 'includes/header.php'; ?>

    
    <div class="container mt-5">

        <?php include 'message.php'; ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Customer
                            <a href="index.php" class="btn btn-danger float-end">Back</a>
                        </h4>                        
                    </div>
                    <div class="card-body">
                        <form action="code.php" name="customer" method="POST" onsubmit="return validateform()">

                            <div class="mb-3">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" >
                            </div>

                            <div class="mb-3">
                                <label>First name</label>
                                <input type="text" name="first_name" class="form-control" >
                        
                            </div>

                            <div class="mb-3">
                                <label>Middle name</label>
                                <input type="text" name="middle_name" class="form-control" >
                            </div>

                            <div class="mb-3">
                                <label>Last name</label>
                                <input type="text" name="last_name" class="form-control" >
                            </div>

                            <div class="mb-3">
                                <label>Contact number</label>
                                <input type="text" name="number" class="form-control" >
                            </div>

                            <div class="mb-3">
                                <label>District</label>
                                 <select name="district" class="form-control mb-3">
                                    <?php
                                        $con = mysqli_connect('localhost','root','','assignment(1) 1');

                                        $query = "SELECT * FROM district";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                                ?>
                                                    <option value="<?=$row['id'];?>"><?=$row['district'];?></option>
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
                                <button type="submit" name="save_customer" class="btn btn-primary">Save Customer</button>
                            </div>


                        </form>
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

  var nameRegex = /^[A-Z][a-z]*$/; // Regex for names with first letter capitalized
  var numberRegex = /^\d{10}$/; // Regex for a 10-digit integer

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