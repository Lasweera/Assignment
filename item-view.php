<?php
require 'dbcon.php';
?>

<?php include 'includes/header.php'; ?>

    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Item Details view
                            <a href="index.php" class="btn btn-danger float-end">Back</a>
                        </h4>                        
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $item_id = mysqli_real_escape_string($con,$_GET['id']);
                            $query= "SELECT i.*,c.category,s.sub_category FROM item i INNER JOIN item_category c ON i.	item_category=c.id INNER JOIN item_subcategory s ON i.item_subcategory=s.id WHERE i.id = '$item_id'";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $customer = mysqli_fetch_array($query_run);
                                ?>   
                                
                                    <div class="mb-3">
                                        <label>Item code</label>                                        
                                            <p class="form-control">
                                                <?=$customer['item_code'];?>
                                            </p>
                                    </div>

                                    <div class="mb-3">
                                        <label>Item category</label>
                                        <p class="form-control">
                                                <?=$customer['category'];?>
                                            </p>
                                    </div>

                                    <div class="mb-3">
                                        <label>Item subcategory</label>
                                        <p class="form-control">
                                                <?=$customer['sub_category'];?>
                                            </p>
                                    </div>

                                    <div class="mb-3">
                                        <label>Item name</label>
                                        <p class="form-control">
                                                <?=$customer['item_name'];?>
                                            </p>
                                    </div>

                                    <div class="mb-3">
                                        <label>Quantity</label>
                                        <p class="form-control">
                                                <?=$customer['quantity'];?>
                                            </p>
                                    </div>                                                                        

                                    <div class="mb-3">
                                        <label>Unit price</label>
                                        <p class="form-control">
                                                <?=$customer['unit_price'];?>
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