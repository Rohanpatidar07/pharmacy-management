<?php
   $role=$_SESSION['role'];
   if($role=='2')
    {
      include 'distributorheader.php';
      
    }
    elseif($role=='4')
    {
      include 'retailerheader.php';
      
    }
    $sql="select*from addwholesaler where wid='$wid'";
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($res);
    $wcname=$row['wcname'];
    $n=$row['name'];
    $e=$row['email'];
    $m=$row['mobile'];
    $a=$row['address'];
   
?>
<div class="page-wrapper p-3">
    <div class="container-fluid bg-white p-5">
        <div class="row">
            <div class="col-lg-12">
                <h1 class='text-info'>Edit wholesaler</h1>
                <hr>
                <form class="form-group" action="db.php" method="post">
                    <div class="row">
                        <div class="col-lg-2">
                            <lable>Wholesaler company Name :</lable>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" name="dcname" class="form-control" value="<?php echo $wcname;?>">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-2">
                            <lable>Wholesaler Name :</lable>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" name="name" class="form-control" value="<?php echo $n;?>">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <lable>Wholesaler Email :</lable>
                        </div>
                        <div class="col-lg-4">
                            <input type="email" name="email" class="form-control" readonly="readonly"  value="<?php echo $e;?>">
                        </div>

                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <lable>Wholesaler Mobile number :</lable>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" name="number" class="form-control" value="<?php echo $m;?>">
                        </div>

                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <lable>Wholesaler Address :</lable>
                        </div>
                        <div class="col-lg-4">
                            <textarea col="20" rows="3" name="address"><?php echo $a;?></textarea>
                        </div>

                    </div>
                    <hr>
                    <input type="submit" class="btn btn-info" name="updatedw">
                </form>
            </div>
        </div>
    </div>
</div>