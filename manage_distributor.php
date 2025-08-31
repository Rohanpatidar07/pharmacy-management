<?php
  $uid=$_SESSION['uid'];
   $role=$_SESSION['role'];
   if($role=='1')
    {
      include 'company.php';
    }
    elseif($role=='3')
    {
      include 'wholesalerheader.php';
    }

?>
<div class="page-wrapper p-3">
    <div class="container-fluid bg-white p-5">
        <div class="row">
            <div class="col-lg-12">
                <h1 class='text-info'>Manage distributors</h1>
                <hr>
                <form class="form-group p-4" action="db.php" method="post">
                    <div class="row">
                       
                        <div class="col-lg-2">
                          <input type="text" class="form-control" name="s">
                        </div>
                        <div class="col-lg-2">
                           <input type="submit" class="btn btn-primary" name="dsearch" value="Search">
                        </div>
                    </div>
                   
                </form>
                <hr>
                <table class="table table-bordered">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>Distributor company name</th>
                                <th>Distributor Name</th>
                                <th>Distributor Email</th>
                                <th>Distributor Mobile_number</th>
                                <th>Distributor Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php
                        if(!empty($s))
                        
                        {
                            $sql="select*from adddistributor where auid='$uid' and dcname like '%$s%'";
                            $res=mysqli_query($con,$sql);
                        }
                        else
                        {
                            $sql="select*from adddistributor where auid='$uid' and is_delete='0'";
                            $res=mysqli_query($con,$sql);
                        }
                              foreach($res as $row)
                              {
                                $dcname=$row['dcname'];
                                $name=$row['name'];
                                $e=$row['email'];
                                $m=$row['mobile'];
                                $a=$row['address'];
                                $did=$row['did'];
                                 
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $dcname;?></td>
                                <td><?php echo $name?></td>
                                <td><?php echo $e?></td>
                                <td><?php echo $m?></td>
                                <td><?php echo $a?></td>
                                <td>
                                    <a href="db.php?editd=<?php echo $did?>" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="db.php?deleted=<?php echo $did;?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                </td>
                                
                            </tr>
                        </tbody>
                        <?php }?>
                </table>
            </div>
        </div>
    </div>
</div>
