<?php
$uid=$_SESSION['uid'];
 $role=$_SESSION['role'];
 if($role=='1')
  {
    include 'company.php';
  }
?>
<div class="page-wrapper p-3">
    <div class="container-fluid bg-white p-5">
        <div class="row">
            <div class="col-lg-12">
                <h1 class='text-info'>Manage Medicine</h1>
                <hr>
                <form class="form-group p-4" action="db.php" method="post">
                    <div class="row">
                        <div class="col-lg-2">
                          <input type="text" class="form-control" name="s">
                        </div>
                        <div class="col-lg-2">
                           <input type="submit" class="btn btn-primary" name="msearch" value="Search">
                        </div>
                    </div>
                   
                </form>
                <table class="table table-bordered">
                        <thead class="bg-dark text-white">
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>cost_price</th>
                            <th>quantity</th>
                            <th>Manu facturing date</th>
                            <th>Expiry date</th>
                            <th>price distributor</th>
                            <th>price wholesaler</th>
                            <th>price retailer</th>
                            <th>MRP</th>
                            <th>Action</th>
                            
                        </tr>
                        </thead>
                        <?php
                        if(!empty($s))
                        {
                            $sql="select*from medicine where is_delete='0' and medicine_name like '%$s%' || category like '%$s%'";
                            $res=mysqli_query($con,$sql);
                        }
                        else
                        {
                            $sql="select*from medicine where is_delete='0' and amuid='$uid'";
                            $res=mysqli_query($con,$sql);
                        }
                          foreach($res as $row)
                          {
                              $name=$row['medicine_name'];
                              $cat=$row['category'];
                              $cost=$row['cost_price'];
                              $qty=$row['quantity'];
                              $md=$row['manudate'];
                              $expiry=$row['expiry'];
                              $distri=$row['price_distributor'];
                              $whole=$row['price_wholesaler'];
                              $ret=$row['price_retailer'];
                              $mrp=$row['mrp'];
                              $mid=$row['mid'];

                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $name?></td>
                                <td><?php echo $cat?></td>
                                <td><?php echo $cost?></td>
                                <td><?php echo $qty?></td>
                                <td><?php echo $md;?></td>
                                <td><?php echo $expiry?></td>
                                <td><?php echo $distri?></td>
                                <td><?php echo $whole?></td>
                                <td><?php echo $ret?></td>
                                <td><?php echo $mrp?></td>
                                <td>
                                    <a href="db.php?editmedicine=<?php echo $mid?>" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="db.php?mdelete=<?php echo $mid;?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        </tbody>
                        <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>