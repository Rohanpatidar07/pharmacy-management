<?php
   $role=$_SESSION['role'];
   if($role=='2')
    {
      include 'distributorheader.php';
      
    }
    $sql="select*from addcompany where cid='$cid'";
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($res);
    $cname=$row['cname'];
    $e=$row['email'];
    $m=$row['mobile'];
    $a=$row['address'];
   
?>
<div class="page-wrapper p-3">
    <div class="container-fluid bg-white p-5">
        <div class="row">
            <div class="col-lg-12">
                <h1 class='text-info'>Edit Manufectur Company</h1>
                <hr>
                <form class="form-group" action="db.php?up=<?php echo $cid;?>" method="post">
                    <div class="row">
                        <div class="col-lg-2">
                            <lable>Company Name :</lable>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" name="cname" class="form-control" value="<?php echo $cname;?>">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <lable>Company Email :</lable>
                        </div>
                        <div class="col-lg-4">
                            <input type="email" name="email" class="form-control" readonly="readonly" value="<?php echo $e;?>">
                        </div>

                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <lable>Company Mobile number :</lable>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" name="number" class="form-control" value="<?php echo $m;?>">
                        </div>

                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <lable>Company Address :</lable>
                        </div>
                        <div class="col-lg-4">
                            <textarea col="20" rows="3" name="address"><?php echo $a;?></textarea>
                        </div>

                    </div>
                    <hr>
                    <input type="submit" class="btn btn-info" name="updated">
                </form>
            </div>
        </div>
    </div>
</div>