<?php
   $role=$_SESSION['role'];
   $uid=$_SESSION['uid'];
   if($role=='1')
    {
      include 'company.php';
      ///////show distributor detail
        $sql="select*from adddistributor where auid='$uid' and is_delete='0'";
        $res=mysqli_query($con,$sql);
        ////show medicine name
        $a=date('Y-m-d');
        $sql1="select medicine_name from medicine where is_delete='0' and quantity>'0' and expiry>='$a' and amuid='$uid'";
        $res1=mysqli_query($con,$sql1);
        if(!empty($mname))
        {
            $sql3="select*from medicine where medicine_name='$mname' and amuid='$uid'";
            $res3=mysqli_query($con,$sql3);
            $row3=mysqli_fetch_array($res3);
            $mediname=$row3['medicine_name'];
            $cat=$row3['category'];
            $qty=$row3['quantity'];
            $mrp=$row3['mrp'];
            $cost=$row3['cost_price'];
            $sale=$row3['price_distributor'];
            $ex=$row3['expiry'];
        }
    }
    elseif($role=='2')
    {
        include 'distributorheader.php';
        ///////show distributor detail
        $sql="select*from addwholesaler where auid='$uid' and is_delete='0'";
        $res=mysqli_query($con,$sql);
        ////show medicine name
        $a=date('Y-m-d');
        $sql1="select medicine_name from medicine where quantity>'0' and expiry>='$a' and amuid='$uid'";
        $res1=mysqli_query($con,$sql1);
        if(!empty($mname))
        {
            $sql3="select*from medicine where medicine_name='$mname' and amuid='$uid'";
            $res3=mysqli_query($con,$sql3);
            $row3=mysqli_fetch_array($res3);
            $mediname=$row3['medicine_name'];
            $cat=$row3['category'];
            $qty=$row3['quantity'];
            $mrp=$row3['mrp'];
            $ex=$row3['expiry'];
            $sql4="select*from medicine where medicine_name='$mname'";
            $res4=mysqli_query($con,$sql4);
            $row4=mysqli_fetch_array($res4);
            $pp=$row4['price_distributor'];
            $sale=$row4['price_wholesaler'];
            
        }
    }
    elseif($role=='3')
    {
        include 'wholesalerheader.php';
        ///////show distributor detail
        $sql="select*from addretailer where auid='$uid' and is_delete='0'";
        $res=mysqli_query($con,$sql);
        ////show medicine name
        $a=date('Y-m-d');
        $sql1="select medicine_name from medicine where quantity>'0' and expiry>='$a' and amuid='$uid'";
        $res1=mysqli_query($con,$sql1);
        if(!empty($mname))
        {
            $sql3="select*from medicine where medicine_name='$mname' and amuid='$uid'";
            $res3=mysqli_query($con,$sql3);
            $row3=mysqli_fetch_array($res3);
            $mediname=$row3['medicine_name'];
            $cat=$row3['category'];
            $qty=$row3['quantity'];
            $mrp=$row3['mrp'];
            $ex=$row3['expiry'];
            $sql4="select*from medicine where medicine_name='$mname'";
            $res4=mysqli_query($con,$sql4);
            $row4=mysqli_fetch_array($res4);
            $pp=$row4['price_wholesaler'];
            $sale=$row4['price_retailer'];
        }
    }
   
?>
<div class="page-wrapper p-3">
    <div class="container-fluid bg-white p-5">
        <div class="row">
            <div class="col-lg-12">
                <h1 class='text-info'>Sale medicine</h1>
                <h4 class='text-danger'><?php if(!empty($msg))echo $msg;?></h4>
                <form class="form-group shadow shadow-sm p-4" action="db.php" method="post">
                <h3 class="mb-3">Medicine Name :</h3>
                    <div class="row">
                        <div class="col-lg-2">
                            <lable>Medicine NAME :</lable>
                        </div>
                        <div class="col-lg-2">
                            <select class="form-control" name="mediname">
                            <?php
                                foreach($res1 as $row1)
                                {
                                  $m=$row1['medicine_name'];

                            ?>
                            <option><?php echo $m;?></option>
                            <?php }?>
                            
                            </select>
                        </div>
                    </div>
                    <hr>
                    <input type="submit" class="btn btn-primary" name="medicinename">
                </form>
                <?php
                ///show medicine detail
                if(!empty($mname))
                {
                ?>
                <form class="form-group shadow shadow-sm p-4" action="db.php" method="post">
                <h3 class="mb-3"><?php if($role=='1')
                               {
                                   echo 'distributor detail';
                                }
                                elseif($role=='2')
                                {
                                    echo 'Wholesaler detail';
                                }
                                elseif($role=='3')
                                {
                                    echo 'Retailer detail';
                                }
                                elseif($role=='4')
                                {
                                    echo 'Customer detail';
                                }
                                ?></h3>
                    <div class="row">
                        <div class="col-lg-3">
                            <?php 
                               if($role=='1')
                               {
                               echo '<lable>distributor Company name :</lable>';
                               }
                               elseif($role=='2')
                               {
                               echo '<lable>wholesaler Company name :</lable>';
                               }
                               elseif($role=='3')
                               {
                                echo '<lable>Retailer Company name :</lable>';
                               }
                               elseif($role=='4')
                               {
                                echo '<lable>Customer name :</lable>';
                               }
                            ?>
                        </div>
                        <div class="col-lg-7">
                            <!-- show company name and name and email-->
                            <select class="form-control" name="dcname">
                            <?php
                                foreach($res as $row)
                                {
                                    
                                    $did=$row['did'];
                                    if($role=='1')
                                    {
                                    $dcname=$row['dcname'];
                                    }
                                    elseif($role=='2')
                                    {
                                      $dcname=$row['wcname'];
                                   
                                    }
                                    elseif($role=='3')
                                    {
                                      $dcname=$row['rcname'];
                                  
                                    }
                                    elseif($role=='4')
                                    {
                                      $dcname=$row['name'];
                                     
                                    }
                                    $n=$row['name'];
                                    $a=$row['address'];
                                    $em=$row['email'];
                            ?>
                            <option value="<?php echo $em;?>"><?php echo $dcname;?> (Name=<?php echo $n?>) (Location=<?php echo $a?>)</option>
                            <?php }?>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <h3>Medicine detail:</h3>
                    <div class="row">
                        <div class="col-lg-2">
                            <lable>Medicine name :</lable>
                        </div>
                        <div class="col-lg-3">
                             <input type="text" class="form-control" readonly="readonly" value="<?php if(!empty($mediname)) echo $mediname?>" name="mname">
                        </div>
                        <div class="col-lg-2">
                            <lable>category :</lable>
                        </div>
                        <div class="col-lg-3">
                             <input type="text" class="form-control" readonly="readonly" value="<?php if(!empty($cat)) echo $cat?>" name="mcat">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-2">
                            <lable>Available qty :</lable>
                        </div>
                        <div class="col-lg-3">
                             <input type="text" class="form-control" readonly="readonly" value="<?php if(!empty($qty)) echo $qty?>" name="aqty">
                        </div>
                        <div class="col-lg-2">
                            <lable>MRP :</lable>
                        </div>
                        <div class="col-lg-3">
                             <input type="text" class="form-control"  readonly="readonly" value="<?php if(!empty($mrp)) echo $mrp?>" name="mrp">
                        </div>
                    </div>
                    <div class="row mt-3">
                      <?php if($role=='2')
                       {
                       ?>
                        <div class="col-lg-2">
                            <lable>Purcahse price :</lable>
                        </div>
                        <div class="col-lg-3">
                             <input type="text" class="form-control" disabled value="<?php if(!empty($pp)) echo $pp?>">
                        </div>
                        <?php }?>
                        <?php if($role=='3')
                       {
                       ?>
                        <div class="col-lg-2">
                            <lable>Purcahse price :</lable>
                        </div>
                        <div class="col-lg-3">
                             <input type="text" class="form-control" disabled value="<?php if(!empty($pp)) echo $pp?>">
                        </div>
                        <?php }?>
                        <?php if($role=='4')
                       {
                       ?>
                        <div class="col-lg-2">
                            <lable>Purcahse price :</lable>
                        </div>
                        <div class="col-lg-3">
                             <input type="text" class="form-control" disabled value="<?php if(!empty($pp)) echo $pp?>">
                        </div>
                        <?php }?>
                    <?php if($role=='1')
                       {
                       ?>
                        <div class="col-lg-2">
                            <lable>Cost price :</lable>
                        </div>
                        <div class="col-lg-3">
                             <input type="text" class="form-control" disabled value="<?php if(!empty($cost)) echo $cost?>">
                        </div>
                        <?php }?>
                        <div class="col-lg-2">
                            <lable>Selling price :</lable>
                        </div>
                        <div class="col-lg-3">
                             <input type="text" class="form-control" readonly="readonly" value="<?php if(!empty($sale)) echo $sale?>" name="sprice">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-2">
                            <lable>Sale qty :</lable>
                        </div>
                        <div class="col-lg-3">
                             <input type="text" class="form-control" name="sqty">
                        </div>
                        <div class="col-lg-2">
                            <lable>Pyment method :</lable>
                        </div>
                        <div class="col-lg-3">
                            <select class="form-control" name="pmethod">
                                <?php
                                    $sql4="select*from payment";
                                    $res4=mysqli_query($con,$sql4);
                                    foreach($res4 as $row4)
                                    {
                                     $pay=$row4['payment'];
                                ?>
                                    <option><?php echo $pay;?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="col-lg-2">
                             <input type="hidden" class="form-control" readonly="readonly" value="<?php if(!empty($ex)) echo $ex?>" name="ex">
                        </div>
                    </div>
                    <hr>
                    <input type="submit" class="btn btn-primary" name="salemedicine">
                </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>