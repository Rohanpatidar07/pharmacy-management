<?php
include 'company.php';
$sql="select*from medicine where mid='$mid'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
$name=$row['medicine_name'];
$cat=$row['category'];
$cost=$row['cost_price'];
$qty=$row['quantity'];
$md=$row['manudate'];
$expiry=$row['expiry'];
$distri=$row['percentaged'];
$whole=$row['percentagew'];
$ret=$row['percentager'];
$other=$row['percentagea'];
$mid=$row['mid'];

?>
<div class="page-wrapper p-3">
    <div class="container-fluid bg-white p-5">
        <div class="row">
            <div class="col-lg-12">
                <h1 class='text-info'>Edit Medicine</h1>
                <hr>
                <form class="form-group" action="db.php?updatemedicine=<?php echo $mid?>" method="post">
                    <div class="row">
                        <div class="col-lg-2">
                            <lable>MEDICINE NAME :</lable>
                        </div>
                        <div class="col-lg-2">
                            <input type="text" name="name" class="form-control" value="<?php echo $name;?>">
                        </div>
                        <div class="col-lg-2">
                            <lable>CATEGORY:</lable>
                        </div>
                        <div class="col-lg-2">
                            <select class="form-control" name="category">
                                <?php
                                    $sql1="select*from category";
                                    $res1=mysqli_query($con,$sql1);
                                    foreach($res1 as $roww)
                                    {
                                    $category=$roww['category'];
                                
                                ?>
                                    <option <?php if($cat==$category) echo 'selected';?>><?php echo $category;?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <lable>COSTING PRICE :</lable>
                        </div>
                        <div class="col-lg-2">
                            <input type="text" name="costp" class="form-control" value="<?php echo $cost;?>"> 
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <lable>QUANTITY:</lable>
                        </div>
                        <div class="col-lg-2">
                            <input type="text" name="qty" class="form-control" value="<?php echo $qty;?>"> 
                        </div>
                        <div class="col-lg-2">
                            <lable>Manufacturing DATE:</lable>
                        </div>
                        <div class="col-lg-2">
                            <input type="date" name="md" class="form-control" value="<?php echo $md;?>"> 
                        </div>
                        <div class="col-lg-2">
                            <lable>EXPIRY_DATE:</lable>
                        </div>
                        <div class="col-lg-2">
                            <input type="date" name="ex" class="form-control" value="<?php echo $expiry;?>"> 
                        </div>
                    </div>
                    <h3>Chenge Mrp</h3>
                    
                    <div class="row" style="margin-top:10px">
                    
                        <div class="col-lg-1">
                            <lable>distributor:</lable>
                        </div>
                        <div class="col-lg-2">
                        <select class="form-control" name="d">
                            <?php
                                $sql2="select*from discount";
                                $res2=mysqli_query($con,$sql2);
                                foreach($res2 as $rowww)
                                {
                                $discount=$rowww['discount'];
                            
                            ?>
                                <option <?php if($distri==$discount) echo 'selected';?>><?php echo $discount;?>%</option>
                            <?php }?>
                        </select>
                        </div>
                        <div class="col-lg-2">
                            <lable>Wholesaler:</lable>
                        </div>
                        <div class="col-lg-2">
                        <select class="form-control" name="wholesaler">
                            <?php
                             $sql2="select*from discount";
                             $res2=mysqli_query($con,$sql2);
                             foreach($res2 as $rowww)
                             {
                             $discount=$rowww['discount'];
                            
                            ?>
                                <option <?php if($whole==$discount) echo 'selected';?>><?php echo $discount;?>%</option>
                            <?php }?>
                        </select>
                        </div>
                        <div class="col-lg-2">
                            <lable>Retailer:</lable>
                        </div>
                        <div class="col-lg-2">
                        <select class="form-control" name="retailer">
                            <?php
                             $sql2="select*from discount";
                             $res2=mysqli_query($con,$sql2);
                             foreach($res2 as $rowww)
                             {
                             $discount=$rowww['discount'];
                            
                            ?>
                                <option <?php if($ret==$discount) echo 'selected';?>><?php echo $discount;?>%</option>
                            <?php }?>
                        </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg-1">
                            <lable>Others:</lable>
                        </div>
                        <div class="col-lg-2">
                        <select class="form-control" name="others">
                             <?php
                             $sql2="select*from discount";
                             $res2=mysqli_query($con,$sql2);
                             foreach($res2 as $rowww)
                             {
                             $discount=$rowww['discount'];
                            
                            ?>
                                <option <?php if($other==$discount) echo 'selected';?>><?php echo $discount;?>%</option>
                            <?php }?>
                        </select>
                        </div>
                    </div>
                    <hr>
                    <input type="submit" class="btn btn-primary" name="updatemedicine">
                    
                </form>
            </div>           
        </div>       
    </div>
</div>