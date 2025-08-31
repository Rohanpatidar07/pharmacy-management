<?php
  $uid=$_SESSION['uid'];
   $role=$_SESSION['role'];
   if($role=='3')
    {
      include 'wholesalerheader.php';
    }


?>
<div class="page-wrapper p-3">
    <div class="container-fluid bg-white p-5"  style="background-image:url('img/6.jpg');background-size:100% 100%">
        <div class="row">
            <div class="col-lg-12">
                <h1 class='text-primary'>Manage Retailer</h1>
                <hr class="bg-light">
                <form class="form-group p-4" action="db.php" method="post">
                    <div class="row">
                       
                        <div class="col-lg-2">
                          <input type="text" class="form-control" name="s">
                        </div>
                        <div class="col-lg-2">
                           <input type="submit" class="btn btn-primary" name="searchr" value="Search">
                        </div>
                    </div>
                   
                </form>
                <hr>
                <table class="table table-bordered bg-white" style="opacity:0.8">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>Retailer company name</th>
                                <th>Retailer Name</th>
                                <th>Retailer Email</th>
                                <th>Retailer Mobile_number</th>
                                <th>Retailer Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <?php
                        if(!empty($s))
                        {
                            $sql="select*from addretailer where auid='$uid' and is_delete='0' and rcname like '%$s%'";
                            $res=mysqli_query($con,$sql);
                        }
                        else
                        {
                            $sql="select*from addretailer where auid='$uid' and is_delete='0'";
                            $res=mysqli_query($con,$sql);
                        }
                              foreach($res as $row)
                              {
                                $wcname=$row['rcname'];
                                $name=$row['name'];
                                $e=$row['email'];
                                $m=$row['mobile'];
                                $a=$row['address'];
                                $rid=$row['rid'];
                                 
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $wcname;?></td>
                                <td><?php echo $name?></td>
                                <td><?php echo $e?></td>
                                <td><?php echo $m?></td>
                                <td><?php echo $a?></td>
                                <td>
                                    <a href="db.php?editr=<?php echo $rid?>" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="db.php?deleter=<?php echo $rid;?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                </td>
                                
                            </tr>
                        </tbody>
                        <?php }?>
                </table>
            </div>
        </div>
    </div>
</div>
