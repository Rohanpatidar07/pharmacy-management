<?php
  $role=$_SESSION['role'];
  if($role=='3')
   {
     include 'wholesalerheader.php';
     $sql2="select name,email from users where role='4'";
     $res2=mysqli_query($con,$sql2);
   }
    
   
?>
<div class="page-wrapper p-3">
    <div class="container-fluid bg-white p-5">
        <div class="row">
            <div class="col-lg-12">
                <h1 class='text-info'>Add Retailer</h1>
                <h4 class='text-danger'><?php if(!empty($msg))echo $msg;?></h4>
                <hr>
                <form class="form-group" action="db.php" method="post">
                    <div class="row">
                        <div class="col-lg-2">
                            <lable>Retailer Name :</lable>
                        </div>
                        <div class="col-lg-4">
                            <select class="form-control" name='e'>
                                <?php 
                                  foreach($res2 as $row2)
                                  {
                                     $n=$row2['name'];
                                     $e=$row2['email'];
                                ?>
                                <option value="<?php echo $e;?>"><?php echo $n;?> (Email=<?php echo $e;?> )</option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <input type="submit" class="btn btn-info" name="adr">
                        </div>
                    </div>
                   
                </form>
                <hr>
                <?php
                if(!empty($em))
                {
                    $sql3="select*from addretailer where email='$em'";
                    $res3=mysqli_query($con,$sql3);
                    $row=mysqli_fetch_array($res3);
                    $dcn=$row['rcname'];
                    $n=$row['name'];
                    $e=$row['email'];
                    $m=$row['mobile'];
                    $m=$row['mobile'];
                    $a=$row['address'];
                
                ?>
                
                    <form class="form-group" action="db.php" method="post">
                        <div class="row">
                            <div class="col-lg-2">
                                <lable>Retailer Company Name :</lable>
                            </div>
                            <div class="col-lg-4">
                                <input type="text" name="dcname" class="form-control" readonly="readonly" value="<?php echo $dcn;?>">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-2">
                                <lable>Retailer Name :</lable>
                            </div>
                            <div class="col-lg-4">
                                <input type="text" name="name" class="form-control" readonly="readonly" value="<?php echo $n;?>">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-2">
                                <lable>Retailer Email :</lable>
                            </div>
                            <div class="col-lg-4">
                                <input type="email" name="email" class="form-control" readonly="readonly" value="<?php echo $e;?>">
                            </div>

                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-2">
                                <lable>Retailer Mobile number :</lable>
                            </div>
                            <div class="col-lg-4">
                                <input type="text" name="number" class="form-control" readonly="readonly" value="<?php echo $m;?>">
                            </div>

                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-2">
                                <lable>Retailer Address :</lable>
                            </div>
                            <div class="col-lg-4">
                                <textarea col="20" rows="3" name="address" readonly="readonly"><?php echo $a;?></textarea>
                            </div>

                        </div>
                        <hr>
                        <input type="submit" class="btn btn-info" name="addr" value="addr">
                    </form>
                    <?php }
                    else
                    {
                    ?>
                
                <form class="form-group" action="db.php" method="post">
                    <div class="row">
                        <div class="col-lg-2">
                            <lable>Retailer Company Name :</lable>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" name="dcname" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <lable>Retailer Name :</lable>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <lable>Retailer Email :</lable>
                        </div>
                        <div class="col-lg-4">
                            <input type="email" name="email" class="form-control">
                        </div>

                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <lable>Retailer Mobile number :</lable>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" name="number" class="form-control">
                        </div>

                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <lable>Retailer Address :</lable>
                        </div>
                        <div class="col-lg-4">
                            <textarea col="20" rows="3" name="address"></textarea>
                        </div>

                    </div>
                    <hr>
                    <input type="submit" class="btn btn-info" name="addr" value="addr">
                </form>
               <?php } ?>
            </div>
        </div>
    </div>
</div>