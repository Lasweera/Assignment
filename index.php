<?php
  session_start();
  require 'dbcon.php';
?>


<?php include 'includes/header.php'; ?>

  <div class="container mt-4">

  <?php include 'message.php'; ?>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Customer Details
            <a href="customer-insert.php" class="btn btn-primary float-end">Add Customers</a>
          </h4>
        </div>
        <div class="card-body">

          <table class="table table-bordered table-striped">
            <thead>
              <tr>

                <th>ID</th>
                <th>Title</th>
                <th>First name</th>
                <th>Middle name</th>
                <th>Last name</th>
                <th>Contact number</th>
                <th>District</th>
                <th>Action</th>

              </tr>
            </thead>
            <tbody>
              <?php 
                  $query = "SELECT c.*,d.district as dis_name FROM customer c
                  INNER JOIN district d ON d.id=c.district;";
                  $query_run = mysqli_query($con, $query);

                  if(mysqli_num_rows($query_run) > 0)
                  {
                      foreach($query_run as $customers)
                      {
                          
                        ?>
                          <tr>
                            <td><?=$customers['id']; ?></td>
                            <td><?=$customers['title']; ?></td>
                            <td><?=$customers['first_name']; ?></td>
                            <td><?=$customers['middle_name']; ?></td>
                            <td><?=$customers['last_name']; ?></td>
                            <td><?=$customers['contact_no']; ?></td>
                            <td><?=$customers['dis_name']; ?></td>
                            <td>
                              <a href="customer-view.php?id=<?= $customers['id']; ?>" class="btn btn-info btn-sm">View</a>
                              <a href="customer-edit.php?id=<?= $customers['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                              

                              <form action="code.php" method="POST" class="d-inline">
                                  <button type="submit" name="delete_customer" value="<?=$customers['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
                              </form>

                          </tr>
                        <?php

                      }
                  }
                  else
                  {
                      echo "No record found"; 
                  }
              
              ?>
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>

    <div class="container mt-4">
      <?php include 'message.php'; ?>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Item Details
                <a href="item-insert.php" class="btn btn-primary float-end">Add Items</a>
              </h4>
            </div>
            <div class="card-body">

              <table class="table table-bordered table-striped">
                <thead>
                  <tr>

                    <th>ID</th>
                    <th>Item code</th>
                    <th>Item category</th>
                    <th>Item subcategory</th>
                    <th>Item name</th>
                    <th>Quantity</th>
                    <th>Unit price</th>
                    <th>Action</th>

                  </tr>
                </thead>
                <tbody>
                  <?php 

                    

                      $query = "SELECT i.*,c.category,s.sub_category FROM item i INNER JOIN item_category c ON i.	item_category=c.id INNER JOIN item_subcategory s ON i.item_subcategory=s.id";
                      $query_run = mysqli_query($con, $query);

                      if(mysqli_num_rows($query_run) > 0)
                      {
                          foreach($query_run as $items)
                          {
                              
                            ?>
                              <tr>
                                <td><?=$items['id']; ?></td>
                                <td><?=$items['item_code']; ?></td>
                                <td><?=$items['category']; ?></td>
                                <td><?=$items['sub_category']; ?></td>
                                <td><?=$items['item_name']; ?></td>
                                <td><?=$items['quantity']; ?></td>
                                <td><?=$items['unit_price']; ?></td>
                                <td>
                                  <a href="item-view.php?id=<?= $items['id']; ?>" class="btn btn-info btn-sm">View</a>
                                  <a href="item-edit.php?id=<?= $items['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                  

                                  <form action="code.php" method="POST" class="d-inline">
                                      <button type="submit" name="delete_item" value="<?=$items['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
                                  </form>

                              </tr>
                            <?php

                          }
                      }
                      else
                      {
                          echo "No record found"; 
                      }
                  
                  ?>
                  
                </tbody>
              </table>



            </div>
          </div>
        </div>
      </div>
    </div>

<div class="container mt-4">    
        <div class="col-md-1.5">        
            <h4>
              <a href="print.php" class="btn btn-primary float-end">Print invoices</a>
            </h4>          
        </div>    
    </div>
  </div>
</div>

    <?php include 'includes/footer.php'; ?>
