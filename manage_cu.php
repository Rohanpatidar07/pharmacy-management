<?php
  $uid=$_SESSION['uid'];
   $role=$_SESSION['role'];
    if($role=='4')
    {
      include 'retailerheader.php';
    }

?>
<div class="page-wrapper p-3">
    <div class="container-fluid bg-white p-5"  style="background-image:url('img/6.jpg');background-size:100% 100%">
        <div class="row">
            <div class="col-lg-12">
                <h1 class='text-primary'>Manage Customer</h1>
                <hr class="bg-light">
                <table class="table table-bordered bg-white" style="opacity:0.8">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Customer Mobile_number</th>
                                <th>Customer Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php
                            $sql="select*from addcustomer where auid='$uid' and is_delete='0'";
                            $res=mysqli_query($con,$sql);
                              foreach($res as $row)
                              {
                                $name=$row['name'];
                                $e=$row['email'];
                                $m=$row['mobile'];
                                $a=$row['address'];
                                $cuid=$row['cuid'];
                                 
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $name?></td>
                                <td><?php echo $e?></td>
                                <td><?php echo $m?></td>
                                <td><?php echo $a?></td>
                                <td>
                                    <a href="db.php?editcu=<?php echo $cuid;?>" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="db.php?deletecu=<?php echo $cuid;?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                </td>
                                
                            </tr>
                        </tbody>
                        <?php }?>
                </table>
            </div>
        </div>
    </div>
</div>
