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
    $sql1="SELECT SUM(totalamount) AS pnt FROM sales where payment_status='recive' and salerid='$uid'";
    $res1=mysqli_query($con,$sql1);
    $ta=mysqli_fetch_array($res1);
?>
<div class="page-wrapper p-3">
    <div class="container-fluid bg-white p-5">
        <div class="row">
            <div class="col-lg-12">
                <h1 class='text-info'>Payment repoart</h1>
                <hr>
                <h4 class="text-primary">Total Recive Amount = <span class="text-warning"><?php echo $ta['pnt']; ?> Rs..</span></h4>
               <hr>
                <table class="table table-bordered">
                        <thead>
                            <tr>
                                <?php 
                                if($role=='1')
                                {

                                   echo'<th>Distributer name</th>';
                                }
                                elseif($role=='2')
                                {

                                   echo'<th>Wholesaler name</th>';
                                }
                                elseif($role=='3')
                                {

                                   echo'<th>Retailer name</th>';
                                }
                                elseif($role=='4')
                                {

                                   echo'<th>Customer name</th>';
                                }
                                ?>
                                <th>Payment Date</th>
                                <th>Amount</th>
                                <th>Payment method</th>
                                <th>Payment status</th>
                              
                            </tr>
                        </thead>
                        <?php
                         $sql="SELECT sales.date,sales.totalamount,sales.payment_type,sales.payment_status,users.name from (sales INNER JOIN users on sales.reciverid = users.uid) where sales.salerid='$uid'";
                         $res=mysqli_query($con,$sql);
                            foreach($res as $row)
                            {
                                $name=$row['name'];
                                $date=$row['date'];
                                $tamount=$row['totalamount'];
                                $pmethod=$row['payment_type'];
                                $ps=$row['payment_status'];

                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $name;?></td>
                                <td><?php echo $date;?></td>
                                <td><?php echo $tamount;?></td>
                                <td><?php echo $pmethod;?></td>
                                <td><?php echo $ps;?></td>
                            </tr>
                        </tbody>
                        <?php } ?>
                       
                </table>
                <hr>
                 
            </div>
        </div>
    </div>
</div>