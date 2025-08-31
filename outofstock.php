<?php
 $id=$_SESSION['uid'];
 $role=$_SESSION['role'];
 if($role=='1')
 {
   include 'company.php';

 }
 elseif($role=='2')
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
 $sql="select*from medicine where is_delete='0' and quantity='0' and amuid='$id'";
 $res=mysqli_query($con,$sql);
   
    
?>
<div class="page-wrapper p-3">
    <div class="container-fluid bg-white p-5">
        <div class="row">
            <div class="col-lg-12">
                <h1 class='text-info'>Out of stock Medicine</h1>
                <hr>
                <table class="table table-bordered">
                        <thead class="bg-dark text-white">
                        <tr>
                            
                            <th>Name</th>
                            <th>Category</th>
                            <th>quantity</th>
                            <th>Expiry date</th>
                            <th>MRP</th>
                            
                        </tr>
                        </thead>
                        <?php
                          foreach($res as $row)
                          {
                              $name=$row['medicine_name'];
                              $cat=$row['category'];
                              $qty=$row['quantity'];
                              $expiry=$row['expiry'];
                              $mrp=$row['mrp'];
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $name?></td>
                                <td><?php echo $cat?></td>
                                <td><?php echo $qty?></td>
                                <td><?php echo $expiry?></td>
                                <td><?php echo $mrp?></td>
                            </tr>
                        </tbody>
                        <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>