
<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    // $id = $_POST['id'];
    // if ($id='') {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "lasitha";
        
        // Create connection
        $conn = new mysqli("localhost","root","","assignment(1) 1");
        //$con = mysqli_connect("localhost","root","","assignment(1) 1");

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "SELECT i.invoice_no,i.date,c.first_name,c.middle_name,c.last_name,i.item_count,i.amount,d.district FROM invoice i INNER JOIN customer c ON i.customer=c.id inner join district d on c.district = d.id WHERE i.id=1";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
          // output data of each row
          $res=$result->fetch_assoc();

        } else {
          echo "0 results";
        }
        $conn->close();
    // } else {
    //     echo $name;
    // }
// }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <title>Invoice</title>
</head>
<body>
<div class="div3">
    <div data-size="A4" id="printableArea">	
        <div class="container">
            <table>
                <tr>
                    <td>Invoice Number :</td>
                    <td><?php echo $res['invoice_no'];  ?></td>
                    
                    <!-- <div class="mb-3">
                                <label>Unit price</label>
                                <input type="text" name="unit_price" class="form-control">
                             </div> -->
                    
                </tr>
                <tr>
                    <td>Date :</td>
                    <td><?php echo $res['date'];  ?></td>
                    
                </tr>
                <tr>
                    <td>Customer Name :</td>
                    <td><?php echo $res['first_name'] .' '. $res['middle_name'].' '. $res['last_name'] ;  ?></td>
                    
                </tr>
                <tr>
                    <td>District </td>
                    <td><?php echo $res['district'];  ?></td>
                    
                </tr>
                <tr>
                    <td>Item Count :</td>
                    <td><?php echo $res['item_count'];  ?></td>
                    
                </tr>
                <tr>
                    <td>Invoice Amount :</td>
                    <td><?php echo $res['amount'];  ?></td>
                    
                </tr>
            </table>
           
        </div> 
    </div>
</div> 
<a class="btn btn-warning btn-xs text-uppercase js-scroll-trigger"  style="cursor: pointer;" onclick="printDiv('printableArea')"  /><b>Print</b></a>
</body>
<script>
	function printDiv(divName) {
	     var printContents = document.getElementById(divName).innerHTML;
	     var originalContents = document.body.innerHTML;

	     document.body.innerHTML = printContents;

	     window.print();

	     document.body.innerHTML = originalContents;
	}


 </script>
</html>


