<?php
   $role=$_SESSION['role'];
   if($role=='3')
    {
      include 'wholesalerheader.php';
      
    }
    $sql="select*from addretailer where rid='$rid'";
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($res);
    $dcname=$row['rcname'];
    $name=$row['name'];
    $e=$row['email'];
    $m=$row['mobile'];
    $a=$row['address'];
   
?>
<div class="page-wrapper p-3">
    <div class="container-fluid bg-white p-5">
        <div class="row">
            <div class="col-lg-12">
                <h1 class='text-info'>Edit Retailer</h1>
                <hr>
                <form class="form-group" action="db.php?updater=<?php echo $rid;?>" method="post">
                    <div class="row">
                        <div class="col-lg-2">
                            <lable>Retailer company Name :</lable>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" name="rcname" class="form-control" value="<?php echo $dcname;?>">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-2">
                            <lable>Retailer Name :</lable>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" name="name" class="form-control" value="<?php echo $name;?>">
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
                            <lable> Retailer Mobile number :</lable>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" name="number" class="form-control" value="<?php echo $m;?>">
                        </div>

                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <lable>Retailer Address :</lable>
                        </div>
                        <div class="col-lg-4">
                            <textarea col="20" rows="3" name="address"><?php echo $a;?></textarea>
                        </div>

                    </div>
                    <hr>
                    <input type="submit" class="btn btn-info" name="updater">
                </form>
            </div>
        </div>
    </div>
</div>