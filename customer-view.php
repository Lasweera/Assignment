<?php
require 'dbcon.php';
?>

<?php include 'includes/header.php'; ?>

    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Customer Details view
                            <a href="index.php" class="btn btn-danger float-end">Back</a>
                        </h4>                        
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $customer_id = mysqli_real_escape_string($con,$_GET['id']);
                            $query= "SELECT * FROM customer WHERE id = '$customer_id'";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $customer = mysqli_fetch_array($query_run);
                                ?>   
                                
                                    <div class="mb-3">
                                        <label>Title</label>                                        
                                            <p class="form-control">
                                                <?=$customer['title'];?>
                                            </p>
                                    </div>

                                    <div class="mb-3">
                                        <label>First name</label>
                                        <p class="form-control">
                                                <?=$customer['first_name'];?>
                                            </p>
                                    </div>

                                    <div class="mb-3">
                                        <label>Middle name</label>
                                        <p class="form-control">
                                                <?=$customer['middle_name'];?>
                                            </p>
                                    </div>

                                    <div class="mb-3">
                                        <label>Last name</label>
                                        <p class="form-control">
                                                <?=$customer['last_name'];?>
                                            </p>
                                    </div>

                                    <div class="mb-3">
                                        <label>Contact number</label>
                                        <p class="form-control">
                                                <?=$customer['contact_no'];?>
                                            </p>
                                    </div>

                                    <div class="mb-3">
                                        <label>District</label>
                                        <p class="form-control">
                                                <?=$customer['district'];?>
                                            </p>
                                    </div>                            

                                
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

    <?php include 'includes/footer.php'; ?>