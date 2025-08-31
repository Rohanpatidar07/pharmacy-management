<?php
$uid=$_SESSION['uid'];
$role=$_SESSION['role'];
if($role=='2')
{
    include 'distributorheader.php';
    $sql5="select*from addcompany where auid='$uid'";
    $res5=mysqli_query($con,$sql5);
}
elseif($role=='3')
{
    include 'wholesalerheader.php';
    $sql5="select*from adddistributor where auid='$uid'";
    $res5=mysqli_query($con,$sql5);
}
elseif($role=='4')
{
    include 'retailerheader.php';
    $sql5="select*from addwholesaler where auid='$uid'";
    $res5=mysqli_query($con,$sql5);
}

$sql="select*from category";
$res=mysqli_query($con,$sql);
$sql1="select*from discount";
$res1=mysqli_query($con,$sql1);
?>
<div class="page-wrapper p-3">
    <div class="container-fluid bg-white p-5">
        <div class="row">
            <div class="col-lg-12">
                <h1 class='text-info'>Add Medicine</h1>
                <hr>
                <h4><?php if(!empty($a))echo $a;?></h4>
                <form class="form-group" action="db.php" method="post">
                    <div class="row">
                        <?php 
                        if($role=='2')
                        {
                        ?>
                        <div class="col-lg-3">
                            <lable>Manufectural Company :</lable>
                        </div>
                        <div class="col-lg-3">
                            <select class="form-control" name='cn'>
                                <?php
                                foreach($res5 as $row5)
                                {
                                $namee=$row5['cname'];
                                $cid=$row5['cid'];
                                ?>
                                <option><?php echo $namee;?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <?php }
                        elseif($role=='3')
                        {
                        ?>
                        <div class="col-lg-3">
                            <lable>Distributors Company:</lable>
                        </div>
                        <div class="col-lg-5">
                            <select class="form-control" name='cn'>
                                <?php
                                foreach($res5 as $row5)
                                {
                                $namee=$row5['dcname'];
                                $n=$row5['name'];
                                $ad=$row5['address'];
                                ?>
                                <option value='<?php echo $n;?>'><?php echo $namee;?> (Name=<?php echo $n;?> ;Address=<?php echo $ad;?>)</option>
                                <?php } ?>
                            </select>
                        </div>
                        <?php }
                        elseif($role=='4')
                        {
                        ?>
                        <div class="col-lg-3">
                            <lable>Wholesaler Company:</lable>
                        </div>
                        <div class="col-lg-5">
                            <select class="form-control" name='cn'>
                                <?php
                                foreach($res5 as $row5)
                                {
                                $namee=$row5['wcname'];
                                $n=$row5['name'];
                                $ad=$row5['address'];
                                ?>
                                <option value='<?php echo $n;?>'><?php echo $namee;?> (Name=<?php echo $n;?> ;Address=<?php echo $ad;?>)</option>
                                <?php } ?>
                            </select>
                        </div>
                        <?php }?>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-2">
                            <lable>MEDICINE NAME :</lable>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="col-lg-2">
                            <lable>CATEGORY:</lable>
                        </div>
                        <div class="col-lg-3">
                            <select class="form-control" name="category">
                                <?php
                                 foreach($res as $row)
                                 {
                                 $cat=$row['category'];
                                 $catid=$row['catid'];
                                
                                ?>
                                   <option><?php echo $cat;?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-4">
                       <div class="col-lg-2">
                            <lable>PURCHASE PRICE:</lable>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" name="pp" class="form-control"> 
                        </div>
                        <div class="col-lg-2">
                            <lable>QUANTITY:</lable>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" name="qty" class="form-control"> 
                        </div>
                    </div>
                   <div class="row mt-4">
                        <div class="col-lg-2">
                            <lable>MRP:</lable>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" name="mrp" class="form-control"> 
                        </div>
                        <div class="col-lg-2">
                            <lable>EXPIRY_DATE:</lable>
                        </div>
                        <div class="col-lg-3">
                            <input type="date" name="ex" class="form-control"> 
                        </div>
                    </div>
                    <div class="row mt-4">
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
                    </div>
                    <hr>
                    <input type="submit" class="btn btn-primary" name="addmedicinea">
                </form>
            </div>           
        </div>       
    </div>
</div>