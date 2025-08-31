<?php
 $uid=$_SESSION['uid'];
 $role=$_SESSION['role'];
 if($role=='2')
  {
    include 'distributorheader.php';
  }
  elseif($role=='3')
  {
    include 'wholesalerheader.php';
  }
  elseif($role=='4')
  {
    include 'retailerheader.php';
  }
?>
<div class="page-wrapper p-3">
    <div class="container-fluid bg-white p-5">
        <div class="row">
            <div class="col-lg-12">
                <h1 class='text-info'>Manage Purcahse Medicine</h1>
                <hr>
              
                <table class="table table-bordered">
                        <thead class="bg-dark text-white">
                        <tr>
                            <?php
                            if($role=='2')
                            {
                                echo '<th>Company name</th>';
                            }
                            elseif($role=='3')
                            {
                                echo '<th>Distributor name</th>';
                            }
                            elseif($role=='4')
                            {
                                echo '<th>wholesaler name</th>';
                            }
                            ?>
                            <th>Medicine Name</th>
                            <th>Category</th>
                            <th>quantity</th>
                            <th>Expiry date</th>
                            <th>MRP</th>
                            <th>Purchase Price</th>
                        </tr>
                        </thead>
                        <?php
                            $sql="SELECT purchase.medicine_name,purchase.salerid,purchase.category,purchase.quantity,purchase.expiry,purchase.mrp,purchase.purchase_price,purchase.pid,users.name,users.uid from (purchase INNER JOIN users on purchase.salerid = users.uid) where purchase.reciverid='$uid'";
                            $res=mysqli_query($con,$sql);
                          foreach($res as $row)
                            {
                              $name=$row['medicine_name'];
                              $cat=$row['category'];
                              $qty=$row['quantity'];
                              $expiry=$row['expiry'];
                              $mrp=$row['mrp'];
                              $pp=$row['purchase_price'];
                              $pid=$row['pid'];
                              $namee=$row['name'];
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $namee?></td>
                                <td><?php echo $name?></td>
                                <td><?php echo $cat?></td>
                                <td><?php echo $qty?></td>
                                <td><?php echo $expiry?></d>
                                <td><?php echo $mrp?></td>
                                <td><?php echo $pp?></td>
                            </tr>
                        </tbody>
                        <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>