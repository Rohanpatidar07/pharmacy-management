<?php
   include_once 'config.php';
   if(isset($_SESSION['role']))
    {
        $uid=$_SESSION['uid'];
        $role=$_SESSION['role'];
        $a=date("Y/m/d");
        if($role=='1')
        {
        include 'company.php';
            $tm=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(mid) AS pnt FROM medicine where amuid='$uid'"));
            $td=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(did) AS pnt FROM adddistributor where auid='$uid' and is_delete='0'"));
            $ta=mysqli_fetch_array(mysqli_query($con,"SELECT SUM(totalamount) AS pnt FROM sales where salerid='$uid' and payment_status='recive' and salerid='$uid'"));
        
            $tta=mysqli_fetch_array(mysqli_query($con,"SELECT SUM(totalamount) AS pnt FROM sales where salerid='$uid' and payment_status='recive' and date='$a' and salerid='$uid'"));
            $ex=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(mid) AS pnt FROM medicine where expiry<='$a' and amuid='$uid'"));
            $oos=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(mid) AS pnt FROM medicine where quantity='0' and amuid='$uid'"));
        }
        elseif($role=='2')
        {
        include 'distributorheader.php';
        $tm=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(mid) AS pnt FROM medicine where amuid='$uid'"));
        $td=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(cid) AS pnt FROM addcompany where auid='$uid' and is_delete='0'"));
        $td=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(wid) AS pnt FROM addwholesaler where auid='$uid' and is_delete='0'"));
        $ta=mysqli_fetch_array(mysqli_query($con,"SELECT SUM(totalamount) AS pnt FROM sales where salerid='$uid' and payment_status='recive'"));
        $a=date("Y/m/d");
        $tta=mysqli_fetch_array(mysqli_query($con,"SELECT SUM(totalamount) AS pnt FROM sales where salerid='$uid' and payment_status='recive' and date='$a'"));

        $ex=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(mid) AS pnt FROM medicine where amuid='$uid' and expiry<='$a'"));
        $oos=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(mid) AS pnt FROM medicine where amuid='$uid' and  quantity='0'"));
        }
        elseif($role=='3')
        {
        include 'wholesalerheader.php';
        $tm=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(mid) AS pnt FROM medicine where amuid='$uid'"));
        $td=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(did) AS pnt FROM adddistributor where auid='$uid' and is_delete='0'"));
        $ta=mysqli_fetch_array(mysqli_query($con,"SELECT SUM(totalamount) AS pnt FROM sales where salerid='$uid' and payment_status='recive'"));
        $a=date("Y/m/d");
        $tta=mysqli_fetch_array(mysqli_query($con,"SELECT SUM(totalamount) AS pnt FROM sales where salerid='$uid' and payment_status='recive' and date='$a'"));
        $tr=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(rid) AS pnt FROM addretailer where auid='$uid' and is_delete='0'"));
        $ex=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(mid) AS pnt FROM medicine where amuid='$uid' and expiry<='$a'"));
        $oos=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(mid) AS pnt FROM medicine where amuid='$uid' and  quantity='0'"));
        }
        elseif($role=='4')
        {
        include 'retailerheader.php';
        $tm=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(mid) AS pnt FROM medicine where amuid='$uid'"));
        $ta=mysqli_fetch_array(mysqli_query($con,"SELECT SUM(totalamount) AS pnt FROM sales where salerid='$uid' and payment_status='recive'"));
        $a=date("Y/m/d");
        $tta=mysqli_fetch_array(mysqli_query($con,"SELECT SUM(totalamount) AS pnt FROM sales where salerid='$uid' and payment_status='recive' and date='$a'"));
        $ex=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(mid) AS pnt FROM medicine where amuid='$uid' and expiry<='$a'"));
        $td=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(wid) AS pnt FROM addwholesaler where auid='$uid' and is_delete='0'"));
        $oos=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(mid) AS pnt FROM medicine where amuid='$uid' and  quantity='0'"));
        $tcu=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(cuid) AS pnt FROM addcustomer where auid='$uid' and is_delete='0'"));
        }
    }
    else
    {
        header ("location:http://localhost/medical/index.php");
    }

    
?>
<div class="page-wrapper p-3">
    <div class="container-fluid p-5" style="background-image:url('img/c.gif');background-size:100% 100%">
        <h1 class='text-info'>Dashboard</h1>
        <hr class="bg-light">
       <!-- Sale & Revenue Start -->
        <div class="pt-4 px-4">
                <div class="row g-4">
                    <?php
                     if($role=='1')
                     {
                    ?>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-medkit fa-3x text-primary" aria-hidden="true"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Medicine</p>
                                <h6 class="mb-0"><?php echo $tm['pnt'];?></h6>
                                <a href="db.php?manage_medicine" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                    <?php }
                   
                     else
                     {
                    ?>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-medkit fa-3x text-primary" aria-hidden="true"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Medicine</p>
                                <h6 class="mb-0"><?php echo $tm['pnt'];?></h6>
                                <a href="db.php?viewmedi" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                    <?php }?>

                    <?php 
                      if($role=='1' or $role=='3')
                      {
                    ?>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                           <i class="fa fa-handshake fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Distributers</p>
                                <h6 class="mb-0"><?php echo $td['pnt'];?></h6>
                                <a href="db.php?mdistributor" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php 
                      if($role=='2')
                      {
                    ?>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-users fa-3x text-primary" aria-hidden="true"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Company</p>
                                <h6 class="mb-0"><?php echo $td['pnt'];?></h6>
                                <a href="db.php?managec" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Today Sale</p>
                                <h6 class="mb-0">RS.<?php echo $tta['pnt'];?></h6>
                                <a href="db.php?managesales" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Sale</p>
                                <h6 class="mb-0">RS.<?php echo $ta['pnt'];?></h6>
                                <a href="db.php?managesales" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                    <?php if($role=='4')
                    {
                    ?>
                     <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-user-o fa-3x text-info" aria-hidden="true"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Customer</p>
                                <h6 class="mb-0"><?php echo $tcu['pnt'];?></h6>
                                <a href="db.php?mcu" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                </div>
                <div class="row g-4 mt-3">
                    <?php 
                      if($role=='2' or $role=='4')
                      {
                    ?>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-users fa-3x text-primary" aria-hidden="true"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Wholesaler</p>
                                <h6 class="mb-0"><?php echo $td['pnt'];?></h6>
                                <a href="db.php?mw" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php 
                      if($role=='3')
                      {
                    ?>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-users fa-3x text-primary" aria-hidden="true"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Retailer</p>
                                <h6 class="mb-0"><?php echo $tr['pnt'];?></h6>
                                <a href="db.php?mr" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-arrow-down fa-3x text-primary" aria-hidden="true"></i>
                            <div class="ms-3">
                                <p class="mb-2">Expired Medicine</p>
                                <h6 class="mb-0"><?php echo $ex['pnt'];?></h6>
                                <a href="db.php?ex" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                           <i class="fa fa-ban fa-3x text-primary" aria-hidden="true"></i>
                            <div class="ms-3">
                                <p class="mb-2">OOS Medicine</p>
                                <h6 class="mb-0"><?php echo $oos['pnt'];?></h6>
                                <a href="db.php?outofstock" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->
    </div>
</div>