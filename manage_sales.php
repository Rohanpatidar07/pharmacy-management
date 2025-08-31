<?php
   $uid=$_SESSION['uid'];
   $role=$_SESSION['role'];
   if($role=='1')
    {
      include 'company.php';
    }
    elseif($role=='2')
    {
      include 'distributorheader.php';
    }
    elseif($role=='3')
    {
      include 'wholesalerheader.php';
    }
    elseif($role=='4')
    {
      include 'retailerheader.php';
    }
?>
<div class="page-wrapper p-3">
    <div class="container-fluid bg-white p-5"  style="background-image:url('img/c.gif');background-size:100% 100%">
        <div class="row">
            <div class="col-lg-12">
                <h1 class='text-info'>Manage Sales medicine</h1>
                <hr>
                <table class="table table-bordered">
                        <thead class="bg-dark text-warning">
                            <tr>
                                <?php
                                if($role=='1')
                                {
                                    echo ' <th>Distributer name</th>';
                                }
                                elseif($role=='2')
                                {
                                    echo ' <th>Wholesaler name</th>';
                                }
                                elseif($role=='3')
                                {
                                    echo ' <th>Retailer name</th>';
                                }
                                elseif($role=='4')
                                {
                                    echo ' <th>Customer name</th>';
                                }
                               
                                ?>
                                <th>Medicine name(quantity)(Mrp)</th>
                                <th>Category</th>
                                <th> Sale Date</th>
                                 <?php
                                  if($role=='2' or $role=='1' or $role=='3')
                                  {
                                   echo '<th>Sale price</th>';
                                  }
                                  ?>
                                <th>Total amount</th>
                                <th>Payment method</th>
                                <th>Payment status</th>
                                <th>Cancel sales</th>
                            </tr>
                        </thead>
                        <?php
                           $sql="SELECT sales.mname,sales.saleid,sales.mcategory,sales.date,sales.qty,sales.mrp,sales.sale_price,sales.totalamount,sales.payment_type,sales.payment_status,users.name,users.uid from (sales INNER JOIN users on sales.reciverid = users.uid) where sales.salerid='$uid'";
                           $res=mysqli_query($con,$sql);
                            foreach($res as $row)
                            {
                                $ruid=$row['uid'];
                                $name=$row['name'];
                                $mname=$row['mname'];
                                $mcat=$row['mcategory'];
                                $date=$row['date'];
                                $qty=$row['qty'];
                                $mrp=$row['mrp'];
                                $sprice=$row['sale_price'];
                                $tamount=$row['totalamount'];
                                $pmethod=$row['payment_type'];
                                $sid=$row['saleid'];
                                $ps=$row['payment_status'];
                                $a=(explode(",",$mname));
                                $singh=(explode(",",$qty));
                                $abhi=(explode(",",$mrp));
                                $aa=count($abhi);

                        ?>
                        <tbody class='text-white'>
                            <tr>
                                <td><?php echo $name;?></td>
                                <td>
                                <?php for ($i=0; $i < $aa; $i++) 
                                { 
                                    echo $a[$i] ;echo '(Qty='.$singh[$i].')(Mrp='.$abhi[$i].') ; ' ;
                                }?>
                                </td>
                                
                                <td><?php echo $mcat;?></td>
                                <td><?php echo $date;?></td>
                                <?php
                                  if($role=='2' or $role=='1' or $role=='3')
                                  {
                                    echo '<td>'.$sprice.'</td>';
                                  }
                                ?>
                                
                                <td><?php echo $tamount;?></td>
                                <td><?php echo $pmethod;?></td>
                                <td><?php echo $ps;?></td>
                                <td>
                                    <?php 
                                       if($ps=='recive')
                                       {
                                           if($role=='4')
                                           {
                                             echo '<a href="db.php?calcell='.$sid.' &&  mname='.$mname.' && qty='.$qty.' && ruid='.$ruid.'" class="btn btn-danger"><i class="fa fa-ban" aria-hidden="true"></i></a>';
                                           }
                                           else
                                           {
                                    ?>
                                           <a href="db.php?calcel=<?php echo $sid?> && mname=<?php echo $mname;?> && qty=<?php echo $qty;?> && ruid=<?php echo $ruid;?>" class="btn btn-danger"><i class="fa fa-ban" aria-hidden="true"></i></a>

                                    <?php } } 
                                     else
                                     {
                                      echo '<a href="#" class="btn btn-info"><i class="fa fa-bandcamp" aria-hidden="true"></i></a>';
                                     }
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                        <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
