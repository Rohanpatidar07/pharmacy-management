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
                <h1 class='text-info'>Medicines</h1>
                <hr>
                <table class="table table-bordered">
                        <thead class="bg-dark text-white">
                        <tr>
                            <th>Medicine Name</th>
                            <th>Category</th>
                            <th>quantity</th>
                            <th>One Tablet puchase price</th>
                            <th>Expiry date</th>
                            <th>MRP</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                              $sql="select*from medicine where amuid='$uid'";
                              $res=mysqli_query($con,$sql);
                              foreach($res as $row)
                              {
                                  $mn=$row['medicine_name'];
                                  $c=$row['category'];
                                  $q=$row['quantity'];
                                  $e=$row['expiry'];
                                  $m=$row['mrp'];
                                  $sql1="select*from medicine where medicine_name='$mn'";
                                  $res1=mysqli_query($con,$sql1);
                                  $row1=mysqli_fetch_array($res1);
                                  if($role=='2')
                                  {
                                   $pm=$row1['price_distributor'];
                                  }
                                  elseif($role=='3')
                                  {
                                   $pm=$row1['price_wholesaler'];
                                  }
                                  elseif($role=='4')
                                  {
                                   $pm=$row1['price_retailer'];
                                  }
                            ?>
                            <tr>
                                <td><?php echo $mn;?></td>
                                <td><?php echo $c;?></td>
                                <td><?php echo $q;?></td>
                                <td><?php echo $pm;?></td>
                                <td><?php echo $e;?></td>
                                <td><?php echo $m;?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>