<?php
session_start();

$sql = "SELECT i.invoice_no,i.date,c.first_name,c.middle_name,c.last_name,i.item_count,i.amount,d.district FROM invoice i INNER JOIN customer c ON i.customer=c.id inner join district d on c.district = d.id WHERE i.id=1";



?>

<?php include 'includes/header.php'; ?>

    
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Invoice report
                            <a href="index.php" class="btn btn-danger float-end">Back</a>
                        </h4>                        
                    </div>
                    <div class="card-body">
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>From Date</label>
                                        <input type="date" name="from_date_invoice" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>To Date</label>
                                        <input type="date" name="to_date_invoice" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Click to Filter</label> <br>
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-borderd"
                            <thead>
                                <tr>
                                    <th>Invoice number</th>
                                    <th>Date</th>
                                    <th>Customer</th>
                                    <th>Customer district</th>
                                    <th>Item count</th>
                                    <th>Invoice amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                        <?php
                            $con = mysqli_connect("localhost","root","","assignment(1) 1");

                            if(isset($_GET['from_date_invoice']) && isset($_GET['to_date_invoice']))
                            {
                                $from_date = $_GET['from_date_invoice'];
                                $to_date = $_GET['to_date_invoice'];
                                $query = "SELECT i.invoice_no,i.date,c.first_name,c.middle_name,c.last_name,i.item_count,i.amount,d.district FROM invoice i INNER JOIN customer c ON i.customer=c.id inner join district d on c.district = d.id WHERE i.date BETWEEN '$from_date' AND '$to_date'";
                                $query_run = mysqli_query($con, $query);

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $row)
                                    {
                                        //echo $row['amount '];
                                        ?>
                                            <tr>
                                                <td><?= $row['invoice_no'];?></td>
                                                <td><?= $row['date'];?></td>
                                                <td><?php echo ucwords($row['first_name'].' '.$row['middle_name'].' '.$row['last_name']); ?></td>
                                                <td><?= $row['district'];?></td>
                                                <td><?= $row['item_count'];?></td>
                                                <td><?= $row['amount'];?></td>
                                            </tr>
                                        <?php
                                    }
                                }
                                else
                                {
                                    echo "No Record Found";
                                }
                            }
                            
                        ?>                                                         
                        </tbody> 
                     </table> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Invoice item report
                            
                        </h4>                        
                    </div>
                    <div class="card-body">
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>From Date</label>
                                        <input type="date" name="from_date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>To Date</label>
                                        <input type="date" name="to_date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Click to Filter</label> <br>
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-borderd"
                            <thead>
                                <tr>
                                    <th>Invoice number</th>
                                    <th>Invoiced date</th>
                                    <th>Customer name</th>
                                    <th>Item name with Item code</th>
                                    <th>Item category</th>
                                    <th>Item unit price</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                        <?php
                    

                            if(isset($_GET['from_date']) && isset($_GET['to_date']))
                            {
                                $from_date = $_GET['from_date'];
                                $to_date = $_GET['to_date'];

                                $query1 = "SELECT DISTINCT i.invoice_no,i.date,c.first_name,c.middle_name,c.last_name,i.item_count,i.amount,CONCAT(it.item_name, '', it.item_code) AS item_info,ic.category,it.unit_price FROM invoice i INNER JOIN customer c ON i.customer=c.id INNER JOIN invoice_master m on i.invoice_no=m.invoice_no INNER JOIN item it ON m.item_id=it.id INNER JOIN item_category ic ON ic.id=it.item_category INNER JOIN item_subcategory s ON it.item_subcategory=s.id WHERE i.date BETWEEN '$from_date' AND '$to_date'";

                                
                                $query_run1 = mysqli_query($con, $query1);
                          
                                if(mysqli_num_rows($query_run1) > 0)
                                {
                                    foreach($query_run1 as $row)
                                    {
                                        //echo $row['amount '];
                                        ?>
                                            <tr>
                                                <td><?= $row['invoice_no'];?></td>
                                                <td><?= $row['date'];?></td>
                                                <td><?php echo ucwords($row['first_name'].' '.$row['middle_name'].' '.$row['last_name']); ?></td>
                                                <td><?php echo ucwords($row['item_info']); ?></td>                                               
                                                <td><?= $row['category'];?></td>
                                                <td><?= $row['unit_price'];?></td>
                                            </tr>
                                        <?php
                                    }
                                }
                                else
                                {
                                    echo "No Record Found";
                                }
                            }
                            
                        ?>                                                         
                        </tbody> 
                     </table> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Item report
                            
                        </h4>                        
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-borderd"
                            <thead>
                                <tr>
                                    <th>Item Name</th>
                                    <th>Item category</th>
                                    <th>Item subcategory</th>
                                    <th>Item quantity</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                
                        <?php
                            $con = mysqli_connect("localhost","root","","assignment(1) 1");

                            if(isset($_GET['from_date']) && isset($_GET['to_date']))
                            {
                                $from_date = $_GET['from_date'];
                                $to_date = $_GET['to_date'];

                                $query = "SELECT i.id,i.quantity,i.item_name,c.category,s.sub_category FROM item i INNER JOIN item_category c ON i.	item_category=c.id INNER JOIN item_subcategory s ON i.item_subcategory=s.id ";
                                $query_run = mysqli_query($con, $query);
                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $row)
                                    {
                                        //echo $row['amount '];
                                        ?>
                                            <tr>
                                                <td><?= $row['item_name'];?></td>
                                                <td><?= $row['category'];?></td>
                                                <td><?= $row['sub_category'];?></td>
                                                <td><?= $row['quantity'];?></td>
                                            </tr>
                                        <?php
                                    }
                                }
                                else
                                {
                                    echo "No Record Found";
                                }
                            }
                            
                        ?>                                                         
                        </tbody> 
                     </table> 
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include 'includes/footer.php'; ?>