<?php
include 'company.php';
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
                            <lable>COSTING PRICE :</lable>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" name="costp" class="form-control"> 
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
                            <lable>Manufacturing_DATE:</lable>
                        </div>
                        <div class="col-lg-3">
                            <input type="date" name="md" class="form-control"> 
                        </div>
                        <div class="col-lg-2">
                            <lable>EXPIRY_DATE:</lable>
                        </div>
                        <div class="col-lg-3">
                            <input type="date" name="ex" class="form-control"> 
                        </div>
                    </div>
                   
                    <h3>Set Mrp</h3>
                    
                    <div class="row" style="mt-3">
                    
                        <div class="col-lg-2">
                            <lable>distributor:</lable>
                        </div>
                        <div class="col-lg-2">
                        <select class="form-control" name="distributor">
                            <?php
                                foreach($res1 as $roww)
                                {
                                $discount=$roww['discount'];
                            
                            ?>
                                <option><?php echo $discount;?>%</option>
                            <?php }?>
                        </select>
                        </div>
                        <div class="col-lg-2">
                            <lable>Wholesaler:</lable>
                        </div>
                        <div class="col-lg-2">
                        <select class="form-control" name="wholesaler">
                            <?php
                                foreach($res1 as $roww)
                                {
                                $discount=$roww['discount'];
                            
                            ?>
                                <option><?php echo $discount;?>%</option>
                            <?php }?>
                        </select>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-2">
                            <lable>Retailer:</lable>
                        </div>
                        <div class="col-lg-2">
                        <select class="form-control" name="retailer">
                            <?php
                                foreach($res1 as $roww)
                                {
                                $discount=$roww['discount'];
                            
                            ?>
                                <option><?php echo $discount;?>%</option>
                            <?php }?>
                        </select>
                        </div>
                        <div class="col-lg-2">
                            <lable>Others:</lable>
                        </div>
                        <div class="col-lg-2">
                        <select class="form-control" name="others">
                            <?php
                                foreach($res1 as $roww)
                                {
                                $discount=$roww['discount'];
                            
                            ?>
                                <option><?php echo $discount;?>%</option>
                            <?php }?>
                        </select>
                        </div>
                    </div>
                  
                    <hr>
                    <input type="submit" class="btn btn-primary" name="addmedicine">
                    
                </form>
            </div>           
        </div>       
    </div>
</div>