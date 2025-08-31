<?php
 include_once 'config.php';
//loginpage
    if(isset($_POST['login']))
    {
        if(!empty($_POST['email']) && !empty($_POST['password']))
        {
            $e=$_POST['email'];
            $p=$_POST['password'];
            $sql="select*from users where email='$e'";
            $res=mysqli_query($con,$sql);
            $row=mysqli_fetch_array($res);
            if(!empty($row))
            {
                $sql="select*from users where email='$e' and password='$p'";
                $res=mysqli_query($con,$sql);
                $row=mysqli_fetch_array($res);
                if(!empty($row))
                {
                    $role=$row['role'];
                    $uid=$row['uid'];
                    $_SESSION['uid']=$uid;
                    $_SESSION['role']=$role;
                    header ("location:http://localhost/medical/dashboard.php");
                    
                }
                else
                {
                    $msg= 'Password wrong';
                    require 'index.php';
                }
            }
            else
            {
                $msg= 'Email wrong';
                require 'index.php';
            }
        }
        else
        {
            $msg=  'Fill all detail';
            require 'index.php';
        }
    }
    ////address chenge
    elseif(isset($_GET['add']))
    {
        if(isset($_SESSION['uid']))
        {
            $id=$_SESSION['uid'];
            $add=$_GET['address'];
                if(!empty($add))
                {
                    $sql="update users set address='$add' where uid='$id'";
                    $res=mysqli_query($con,$sql);
                    if($res==true)
                    {
                        $a='Address update';
                        require 'profile.php';
                    }
                }
                else
                {
                    $a='address not update';
                    require 'profile.php';
                }
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
    }
    //uploadimage
    elseif(isset($_POST['upload']))
    {
        if(!empty($_SESSION['uid']))
        {
        
            $id=$_SESSION['uid'];
            $t="img/".basename($_FILES["img"]["name"]);
            $it=strtolower(PATHINFO($t,PATHINFO_EXTENSION));
            if($it=='jpg' or $it=='png' or $it=='jpeg')
            {
                $sql="update users set img='$t' where uid='$id'";
                $res=mysqli_query($con,$sql);
                move_uploaded_file($_FILES["img"]["tmp_name"],$t);
                require 'profile.php';
            }
            else
            {
                require 'profile.php'; 
            }
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
    }
    //chenge password
    elseif(isset($_POST['chengeps']))
    {
        if(!empty($_SESSION['uid']))
        {
            $uid=$_SESSION['uid'];
            $old=$_POST['old'];
            $new=$_POST['new'];
            $re=$_POST['re'];
            $sql="select*from users where uid='$uid'";
            $res=mysqli_query($con,$sql);
            $row=mysqli_fetch_array($res);
            $pass=$row['password'];
            if($old==$pass)
            {
                if($new==$re)
                {
                    $sql="update users set password='$new' where uid='$uid'";
                    $res=mysqli_query($con,$sql);
                    $a='password chenge';
                    require 'profile.php';
                }
                else
                {
                $a='Not chenge your password becouse you not enter same new pass';
                require 'profile.php';

                }
            } 
            else
            {
                $a=' Not chenge your password becouse you enter wrong Old password';
                require 'profile.php';
            }  
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
    }
     ////update profile
     elseif(isset($_POST['update']))
     {
         if(!empty($_SESSION['uid']))
         {
         
            $id=$_SESSION['uid'];
            $n=$_POST['name'];
            $m=$_POST['number'];
            $e=$_POST['email'];
            if(!empty($n) && !empty($m) && !empty($e))
            {
                $sql="update users set name='$n', mobile='$m', email='$e' where uid='$id'";
                $res=mysqli_query($con,$sql);
                if($res==true);
                {
                    $a= "Your profilr detail updated";
                    require 'profile.php';
                }
            }
            else
            {
                $a='your account not update';
                require 'profile.php';
            }   
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
    
     }
     ////add medicine
     elseif(isset($_POST['addmedicine']))
     {
         if(!empty($_SESSION['uid']))
         {
            if(!empty($_POST['name']) && !empty($_POST['costp']) && !empty($_POST['qty']))
            {
                $uid=$_SESSION['uid'];
                $n=$_POST['name'];
                $c=$_POST['category'];
                $cost=$_POST['costp'];
                $qty=$_POST['qty'];
                $md=$_POST['md'];
                $ex=$_POST['ex'];
                $d=substr($_POST['distributor'],0,-1);
                $w=substr($_POST['wholesaler'],0,-1);
                $r=substr($_POST['retailer'],0,-1);
                $o=substr($_POST['others'],0,-1);
                ////persentage
                $distributor=$cost*$d/100;
                $wholesaler=$cost*$w/100;
                $retailer=$cost*$r/100;
                $other=$cost*$o/100;
                /////rate set
                $distributors=$distributor+$cost;
                $wholesalers=$wholesaler+$distributors;
                $retailers=$retailer+$wholesalers;
                $others=$other+$retailers;
                /////insert data data base
                $sql="insert into medicine (amuid,medicine_name,category,cost_price,quantity,manudate,expiry,price_distributor,price_wholesaler,	price_retailer,	mrp,percentaged,percentagew,percentager,percentagea) values ('$uid','$n','$c','$cost','$qty','$md','$ex','$distributors','$wholesalers','$retailers','$others','$d','$w','$r','$o')";
                $res=mysqli_query($con,$sql);
                if($res==true)
                {
                    $a='Add medicine successfull';
                    require 'addmedicine.php';
                }
                else
                {
                    $a='Add medicine failed';
                    require 'addmedicine.php';
                }
            }
            else
            {
                $a='Fill detail';
                require 'addmedicine.php';
            }
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
    }
    /////update medicine
    elseif(isset($_GET['updatemedicine']))
    {
        if(!empty($_SESSION['uid']))
        {
            $mid=$_GET['updatemedicine'];
            
            if(!empty($_POST['name']) && !empty($_POST['costp']) && !empty($_POST['qty']))
            {
                $n=$_POST['name'];
                $c=$_POST['category'];
                $cost=$_POST['costp'];
                $qty=$_POST['qty'];
                $md=$_POST['md'];
                $ex=$_POST['ex'];
                $d=substr($_POST['d'],0,-1);
                $w=substr($_POST['wholesaler'],0,-1);
                $r=substr($_POST['retailer'],0,-1);
                $o=substr($_POST['others'],0,-1);
                //persentage
                $distributor=$cost*$d/100;
                $wholesaler=$cost*$w/100;
                $retailer=$cost*$r/100;
                $other=$cost*$o/100;
                ///rate set
                $distributors=$distributor+$cost;
                $wholesalers=$wholesaler+$distributors;
                $retailers=$retailer+$wholesalers;
                $others=$other+$retailers;
                ///update data data base
                $sql="update medicine set medicine_name='$n',category='$c',cost_price='$cost',quantity='$qty',
                manudate='$md',expiry='$ex',price_distributor='$distributors',	price_wholesaler='$wholesalers',price_retailer='$retailers',mrp='$others',percentaged='$d',percentagew='$w',percentager='$r',percentagea='$o' where mid='$mid'";
                $res=mysqli_query($con,$sql);
                if($res==true)
                {

                    require 'manage_medicine.php';
                }
            }
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
    }
    ////delete medicine
    elseif(isset($_GET['mdelete']))
    {
        if(!empty($_SESSION['uid']))
        {
            $mid=$_GET['mdelete'];
            $sql="update medicine set is_delete='1' where mid='$mid'";
            $res=mysqli_query($con,$sql);
            if($res==true)
            {
                require 'manage_medicine.php';
            }
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
    }
    ///out of stock medicine
    elseif(isset($_GET['outofstock']))
    {
        if(!empty($_SESSION['uid']))
        {
         require 'outofstock.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
    }
    ///out of ad medicine
    elseif(isset($_GET['addm']))
    {
        if(!empty($_SESSION['uid']))
        {
          require 'addmedicine_all.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
    }
    ////addd distributor
    elseif(isset($_GET['addd']))
    {
        if(!empty($_SESSION['uid']))
        {
         require 'adddistributor.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
    }
     ////addd company
     elseif(isset($_GET['ac']))
     {
         if(!empty($_SESSION['uid']))
         {
           require 'addcompany.php';
         }
         else
        {
            header ("location:http://localhost/medical/index.php");
        }
     }
    //// manage medicine company
    elseif(isset($_GET['manage_medicine']))
    {
        if(!empty($_SESSION['uid']))
        {
         require 'manage_medicine.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
    }
    //// manage medicine
    elseif(isset($_GET['manage_pm']))
    {
        if(!empty($_SESSION['uid']))
        {
          require 'managepm.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
    }
    //////edit medicine
    elseif(isset($_GET['editmedicine']))
    {
        if(!empty($_SESSION['uid']))
        {
            $mid=$_GET['editmedicine'];
            require 'editmedicine.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }    
    }
    //////go dashboard
    elseif(isset($_GET['dashboard']))
    {
        if(!empty($_SESSION['uid']))
        {
          require 'dashboard.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        } 
    }
     /////go my profile page
    elseif(isset($_GET['myprofile']))
    {
        if(!empty($_SESSION['uid']))
        {
          require 'profile.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        } 
    }
    ///go add medicine page
    elseif(isset($_GET['addmedicine']))
    {
        if(!empty($_SESSION['uid']))
        {
          require 'addmedicine.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        } 
    }
    /////add distributor 
    elseif(isset($_POST['addd']))
    {
        if(!empty($_SESSION['uid']))
        {
            if(!empty($_POST['dcname']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['number']) && !empty($_POST['address']))
            {
                $dcname=$_POST['dcname'];
                $n=$_POST['name'];
                $e=$_POST['email'];
                $m=$_POST['number'];
                $a=$_POST['address'];
                $uid=$_SESSION['uid'];
                //////insert data in adddistributor table
                $sql="insert into adddistributor(auid,dcname,name,email,mobile,address) values ('$uid','$dcname','$n','$e','$m','$a')";
                $res=mysqli_query($con,$sql);
                //////////email check user table
                $sql2="select email from users where email='$e'";
                $res2=mysqli_query($con,$sql2);
                $row=mysqli_num_rows($res2);
                if($row>0)
                {
                    $msg='Added distributor';
                    require 'adddistributor.php';
            
                }
                else
                {

                    /////insert data in users table
                    $sql1="insert into users(name,email,mobile,address,role) values ('$n','$e','$m','$a','2')";
                    $res1=mysqli_query($con,$sql1);
                    $msg='Added distributor';
                    require 'adddistributor.php';
                }
                
            }
            else
            {
                $msg='Fill all details';
                require 'adddistributor.php';
            }
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        } 
    }
    ///////manage distributor
    elseif(isset($_GET['mdistributor']))
    {
        if(!empty($_SESSION['uid']))
        {
          require 'manage_distributor.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        } 
    }
    /////edit adddistributor
    elseif(isset($_GET['editd']))
    {
        if(!empty($_SESSION['uid']))
        {
            $aid=$_GET['editd'];
            require 'editaddd.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        } 
    }
    ////delete adddistributor
    elseif(isset($_GET['deleted']))
    {
        if(!empty($_SESSION['uid']))
        {
            $aid=$_GET['deleted'];
            $sql="update adddistributor set is_delete='1' where did='$aid'";
            $res=mysqli_query($con,$sql);
            if($res==true)
            {
                require 'manage_distributor.php';
            }
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        } 
    }
    /////update add distributer
    elseif(isset($_GET['updated']))
    {
        if(!empty($_SESSION['uid']))
        {
            $aid=$_GET['updated'];
            if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['number']) && !empty($_POST['address']))
            {
                $dcname=$_POST['dcname'];
                $n=$_POST['name'];
                $e=$_POST['email'];
                $m=$_POST['number'];
                $a=$_POST['address'];
                $sql="update adddistributor set dcname='$dcname',name='$n',email='$e',mobile='$m',address='$a' where did='$aid'";
                $res=mysqli_query($con,$sql);
                if($res==true)
                {
                    require 'manage_distributor.php';
                }
            }
            else
            {
                require 'manage_distributor.php';
            }
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        } 
    }
    /////update add customer
    elseif(isset($_GET['updatecu']))
    {
        if(!empty($_SESSION['uid']))
        {
            $aid=$_GET['updatecu'];
            if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['number']) && !empty($_POST['address']))
            {
                $n=$_POST['name'];
                $e=$_POST['email'];
                $m=$_POST['number'];
                $a=$_POST['address'];
                $sql="update addcustomer set name='$n',email='$e',mobile='$m',address='$a' where cuid='$aid'";
                $res=mysqli_query($con,$sql);
                if($res==true)
                {
                    require 'manage_cu.php';
                }
            }
            else
            {
                require 'manage_cu.php';
            }
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        } 
    }
    ///////update retailer
    
    elseif(isset($_GET['updater']))
    {
        if(!empty($_SESSION['uid']))
        {
            $aid=$_GET['updater'];
            if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['number']) && !empty($_POST['address']))
            {
                $rcname=$_POST['rcname'];
                $n=$_POST['name'];
                $e=$_POST['email'];
                $m=$_POST['number'];
                $a=$_POST['address'];
                $sql="update addretailer set rcname='$rcname',name='$n',email='$e',mobile='$m',address='$a' where rid='$aid'";
                $res=mysqli_query($con,$sql);
                if($res==true)
                {
                    require 'manage_r.php';
                }
            }
            else
            {
                require 'manage_r.php';
            }
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        } 
    }
    //////go sale page
    elseif(isset($_GET['sale']))
    {
        if(!empty($_SESSION['uid']))
        {
          require 'salemedicine.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        } 
    }
     //////go sale page retailer
     elseif(isset($_GET['saler']))
     {
         if(!empty($_SESSION['uid']))
         {
           require 'salemedir.php';
         }
         else
         {
             header ("location:http://localhost/medical/index.php");
         } 
     }
    /////select medicine name process
    elseif(isset($_POST['medicinename']))
    {
        if(!empty($_SESSION['uid']))
        {
            $mname=$_POST['mediname'];
            require 'salemedicine.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        } 
    }
    /////sale medicine
    elseif(isset($_POST['salemedicine']))
    {
        if(!empty($_SESSION['uid']))
        {
            if(!empty($_POST['sqty']))
            {
                $role=$_SESSION['role'];
            
                $salerid=$_SESSION['uid'];
                $email=$_POST['dcname'];
                $sql1="select uid from users where email='$email'";
                $res=mysqli_query($con,$sql1);
                $row=mysqli_fetch_array($res);
                $id=$row['uid'];
                $mname=$_POST['mname'];
                $mcat=$_POST['mcat'];
                $qty=$_POST['sqty'];
                $mrp=$_POST['mrp'];
                $sprice=$_POST['sprice'];
                $aqty=$_POST['aqty'];
                $ex=$_POST['ex'];
                $tamount=$sprice*$qty;
                $pmethod=$_POST['pmethod'];
                ////inset data in sales table
                    $sql1="insert into sales (salerid,reciverid,mname,mcategory,qty,mrp,sale_price,totalamount,Payment_Type) values ('$salerid','$id','$mname','$mcat','$qty','$mrp','$sprice','$tamount','$pmethod')";
                    $res1=mysqli_query($con,$sql1);
                    
                    ///// update  medicine
                    $quantity=$aqty-$qty;
                    $sql2="update medicine set quantity='$quantity' where medicine_name='$mname' and amuid='$salerid'";
                    $res2=mysqli_query($con,$sql2);
                
                    /////insert in purchase table in data
                    $sql3="insert into purchase (salerid,reciverid,medicine_name,category,expiry,mrp,quantity,purchase_price,p_method) values ('$salerid','$id','$mname','$mcat','$ex','$mrp','$qty','$tamount','$pmethod')";
                    $res3=mysqli_query($con,$sql3);
                    ///////
                    $sql5="select medicine_name,quantity from medicine where amuid='$id' and medicine_name='$mname'";
                    $res5=mysqli_query($con,$sql5);
                    $row5=mysqli_fetch_array($res5);
                    
                    if($row5>0)
                    {
                        $qty1=$row5['quantity'];
                        ///////medicine all 
                        $qtyy=$qty+$qty1;
                        $sql4="update medicine set quantity='$qtyy' where amuid='$id' and medicine_name='$mname'";
                        $res4=mysqli_query($con,$sql4);
                        $msg='Medicine sale successfull';
                        require 'salemedicine.php';
                        
                    }
                    else
                    { ///////medicine all 
                        $sql4="insert into medicine (amuid,medicine_name,category,quantity,expiry,mrp) values ('$id','$mname','$mcat','$qty','$ex','$mrp')";
                        $res4=mysqli_query($con,$sql4);
                        $msg='Medicine sale successfull';
                        require 'salemedicine.php';
                    }
            }
            else
            {
                $msg='Please fill quantity';
                require 'salemedicine.php';
            }
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        } 
            
         
    }
    
    ////go expiry medicine
    elseif(isset($_GET['ex']))
    {
        if(!empty($_SESSION['uid']))
        {
          require 'expiredm.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        } 
    }
    /////add distributer in suerch email
    elseif(isset($_POST['demail']))
    {
        if(!empty($_SESSION['uid']))
        {
            $demail=$_POST['edistributor'];
            require 'adddistributor.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        } 
    }
    ////manage sales
    elseif(isset($_GET['managesales']))
    {
        if(!empty($_SESSION['uid']))
        {
          require 'manage_sales.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        } 
    }
    ////edit sales medicine 
    elseif(isset($_GET['calcel']))
    {
        if(!empty($_SESSION['uid']))
        {
            $uid=$_SESSION['uid'];
            $sid=$_GET['calcel'];
            $mname=$_GET['mname'];
            $qty=$_GET['qty'];
            $ruid=$_GET['ruid'];
            $sql="update sales set payment_status='refund' where saleid='$sid'";
            $res=mysqli_query($con,$sql);
            ////////medicine information use name of medicine in medicine table for saler
            $sql2="select quantity from medicine where medicine_name='$mname' and amuid='$uid'";
            $res2=mysqli_query($con,$sql2);
            $row1=mysqli_fetch_array($res2);
            $qty1=$row1['quantity'];
            ///////////update medicine table qty for saler
            $qty2=$qty1+$qty;
            $sql3="update medicine set quantity='$qty2' where medicine_name='$mname' and amuid='$uid'";
            $res3=mysqli_query($con,$sql3);
            ////////medicine information use name of medicine in medicine table  for reciver
            $sql4="select quantity from medicine where medicine_name='$mname' and amuid='$ruid'";
            $res4=mysqli_query($con,$sql4);
            $row4=mysqli_fetch_array($res4);
            $qty3=$row4['quantity'];
            ///////////update medicine table qty for reciver
            $qty4=$qty3-$qty;
            $sql5="update medicine set quantity='$qty4' where medicine_name='$mname' and amuid='$ruid'";
            $res5=mysqli_query($con,$sql5);
            require 'manage_sales.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        } 
    }
    ////////refound medi customer
    elseif(isset($_GET['calcell']))
    {
        if($_SESSION['uid'])
        {
            $sid=$_GET['calcell'];
            $uid=$_SESSION['uid'];
            $mname=$_GET['mname'];
            $qty=$_GET['qty'];
            $ruid=$_GET['ruid'];
            $bb=explode(",",$mname);
            $qtyy=explode(",",$qty);
            print_r($qtyy);
            
            $aa=count($bb);
            $sql="update sales set payment_status='refund' where saleid='$sid'";
            $res=mysqli_query($con,$sql);
            ////medicine information use name of medicine in medicine table for saler
            for ($i=0; $i < $aa; $i++) 
            { 
                $sql2="select quantity from medicine where medicine_name='$bb[$i]' and amuid='$uid'";
                $res2=mysqli_query($con,$sql2);
                $row1=mysqli_fetch_array($res2);
                $qty1=$row1['quantity'];
                ///////////update medicine table qty for saler
                
                $qty2=$qty1+$qtyy[$i];

                $sql3="update medicine set quantity='$qty2' where medicine_name='$bb[$i]' and amuid='$uid'";
                $res3=mysqli_query($con,$sql3);

            }
            require 'manage_sales.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        } 
    }
    /////go pyment repoart
    elseif(isset($_GET['payment']))
    {
        if(!empty($_SESSION['uid']))
        {
          require 'payment.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        } 
    }
    elseif(isset($_GET['ssales']))
    {
        if(!empty($_SESSION['uid']))
        {
          require 'ssales.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        } 
    }
    //////order medicine
    elseif(isset($_GET['orderm']))
    {
        if(!empty($_SESSION['uid']))
        {
          require 'orderm.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        } 
    }
    /////search sales
    elseif(isset($_POST['search']))
    {
        if(!empty($_SESSION['uid']))
        {
            $s=$_POST['s'];
            require 'manage_sales.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        } 
    }
    /////search wholesaler
    elseif(isset($_POST['searchw']))
    {
        if(!empty($_SESSION['uid']))
        {
            $s=$_POST['s'];
            require 'manage_W.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        } 
    }
    /////search wholesaler
    elseif(isset($_POST['searchr']))
    {
        if(!empty($_SESSION['uid']))
        {
            $s=$_POST['s'];
            require 'manage_r.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        } 
    }
    elseif(isset($_POST['se']))
    {
        if(!empty($_SESSION['uid']))
        {
            $s=$_POST['s'];
            require 'managepm.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        } 
    }
    /////search medicine
    elseif(isset($_POST['msearch']))
    {
        if(!empty($_SESSION['uid']))
        {
            $s=$_POST['s'];
            require 'manage_medicine.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }    
    }
    /////edit p medicine
    elseif(isset($_GET['editpm']))
    {
        if(!empty($_SESSION['uid']))
        {
            $pid=$_GET['editpm'];
            require 'editpm.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
    }
    /////search distributer
    elseif(isset($_POST['dsearch']))
    {
        if(!empty($_SESSION['uid']))
        {
            $s=$_POST['s'];
            require 'manage_distributor.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
    }
    /////search  company
    elseif(isset($_POST['csearch']))
    {
        if(!empty($_SESSION['uid']))
        {
            $s=$_POST['s'];
            require 'manage_c.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
    }
    elseif(isset($_GET['aw']))
    {
        if(!empty($_SESSION['uid']))
        {
          require 'addwholesaler.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }

    }
    ////////add customer
    elseif(isset($_GET['acu']))
    {
        if(!empty($_SESSION['uid']))
        {
          require 'addcu.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }

    }
    elseif(isset($_GET['ar']))
    {
        if(!empty($_SESSION['uid']))
        {
          require 'addretailer.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
    }
    ///add company
    elseif(isset($_POST['addc']))
    {
        if(!empty($_SESSION['uid']))
        {
            if(!empty($_POST['cname']) && !empty($_POST['email']) && !empty($_POST['number']) && !empty($_POST['address']))
            {
                $cname=$_POST['cname'];
                $e=$_POST['email'];
                $m=$_POST['number'];
                $a=$_POST['address'];
                $uid=$_SESSION['uid'];
                //////insert data in addcompany table
                $sql="insert into addcompany(auid,cname,email,mobile,address) values ('$uid','$cname','$e','$m','$a')";
                $res=mysqli_query($con,$sql);
                //////////email check user table
                $sql2="select email from users where email='$e'";
                $res2=mysqli_query($con,$sql2);
                $row=mysqli_num_rows($res2);
                if($row>0)
                {
                    $msg='Added company';
                    require 'addcompany.php';
                }
                else
                {
                    /////insert data in users table
                    $sql1="insert into users(name,email,mobile,address,role) values ('$cname','$e','$m','$a','1')";
                    $res1=mysqli_query($con,$sql1);
                    $msg='Added company';
                    require 'addcompany.php';
                
                }
            }
            else
            {
                $msg='Fill all details';
                require 'addcompany.php';
            }
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
    }
    ///add customer
    elseif(isset($_POST['addcu']))
    {
        if(!empty($_SESSION['uid']))
        {
            if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['number']) && !empty($_POST['address']))
            {
                $cname=$_POST['name'];
                $e=$_POST['email'];
                $m=$_POST['number'];
                $a=$_POST['address'];
                $uid=$_SESSION['uid'];
                //////insert data in addcompany table
                $sql="insert into addcustomer(auid,name,email,mobile,address) values ('$uid','$cname','$e','$m','$a')";
                $res=mysqli_query($con,$sql);
                //////////email check user table
                $sql2="select email from users where email='$e'";
                $res2=mysqli_query($con,$sql2);
                $row=mysqli_num_rows($res2);
                if($row>0)
                {
                    $msg='Added customer';
                    require 'addcu.php';
                }
                else
                {
                    /////insert data in users table
                    $sql1="insert into users(name,email,mobile,address,role) values ('$cname','$e','$m','$a','5')";
                    $res1=mysqli_query($con,$sql1);
                    $msg='Added customer';
                    require 'addcu.php';
                
                }
            }
            else
            {
                $msg='Fill all details';
                require 'addcu.php';
            }
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
    }
    ////////manage company page
    elseif(isset($_GET['managec']))
    {
        if(!empty($_SESSION['uid']))
        {
          require 'manage_c.php';
        
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
    }
    ///////edit company
     elseif(isset($_GET['editc']))
     {
        if(!empty($_SESSION['uid']))
        {
         $cid=$_GET['editc'];
         require 'editaddc.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }

     }
      /////update add company
    elseif(isset($_GET['up']))
    {
        if(!empty($_SESSION['uid']))
        {
            $cid=$_GET['up'];
            if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['number']) && !empty($_POST['address']))
            {
                $cname=$_POST['cname'];
                $n=$_POST['name'];
                $e=$_POST['email'];
                $m=$_POST['number'];
                $a=$_POST['address'];
            
                $sql="update addcompany set cname='$cname',email='$e',mobile='$m',address='$a' where cid='$cid'";
                $res=mysqli_query($con,$sql);
                if($res==true)
                {
                    require 'manage_c.php';
                } /////update add distributer
                elseif(isset($_GET['updated']))
                {
                    $aid=$_GET['updated'];
                    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['number']) && !empty($_POST['address']))
                    {
                        $dcname=$_POST['dcname'];
                        $n=$_POST['name'];
                        $e=$_POST['email'];
                        $m=$_POST['number'];
                        $a=$_POST['address'];
                        $sql="update adddistributor set dcname='$dcname',name='$n',email='$e',mobile='$m',address='$a' where did='$aid'";
                        if($res==true)
                        {
                            require 'manage_distributor.php';
                        }
                    }
                }
            }
            else
            {
                require 'manage_distributor.php';
            }
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
    }
     ////delete addcompany
     elseif(isset($_GET['deletec']))
     {
         if(!empty($_SESSION['uid']))
         {
            $cid=$_GET['deletec'];
            $sql="update addcompany set is_delete='1' where cid='$cid'";
            $res=mysqli_query($con,$sql);
            if($res==true)
            {
                require 'manage_c.php';
            }
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
     }
       ////delete addcustomer
       elseif(isset($_GET['deletecu']))
       {
           if(!empty($_SESSION['uid']))
           {
              $cid=$_GET['deletecu'];
              $sql="update addcustomer set is_delete='1' where cuid='$cid'";
              $res=mysqli_query($con,$sql);
              if($res==true)
              {
                  require 'manage_cu.php';
              }
            }
          else
          {
              header ("location:http://localhost/medical/index.php");
          }
        }
       
       ////delete add retailer
       elseif(isset($_GET['deleter']))
       {
           if(!empty($_SESSION['uid']))
           {
                $rid=$_GET['deleter'];
                $sql="update addretailer set is_delete='1' where rid='$rid'";
                $res=mysqli_query($con,$sql);
                if($res==true)
                {
                    require 'manage_r.php';
                }
            }
            else
            {
                header ("location:http://localhost/medical/index.php");
            }
       }
        ///add retailer
    elseif(isset($_POST['addr']))
    {
        if(!empty($_SESSION['uid']))
        {
            if(!empty($_POST['dcname']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['number']) && !empty($_POST['address']))
            {
                $wcname=$_POST['dcname'];
                $n=$_POST['name'];
                $e=$_POST['email'];
                $m=$_POST['number'];
                $a=$_POST['address'];
                $uid=$_SESSION['uid'];
                //////insert data in addcompany table
                $sql="insert into addretailer(auid,rcname,name,email,mobile,address) values ('$uid','$wcname','$n','$e','$m','$a')";
                $res=mysqli_query($con,$sql);
                //////////email check user table
                $sql2="select email from users where email='$e'";
                $res2=mysqli_query($con,$sql2);
                $row=mysqli_num_rows($res2);
                if($row>0)
                {
                    
                    $msg='Added retailer';
                    require 'addretailer.php';
                }
                else
                {
                    /////insert data in users table
                    $sql1="insert into users(name,email,mobile,address,role) values ('$n','$e','$m','$a','3')";
                    $res1=mysqli_query($con,$sql1);
                    $msg='Added retailer';
                    require 'addretailer.php';
                }
            }
            else
            {
                $msg='Fill all details';
                require 'addretailer.php';
            }
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
    }
        ///add wholesaler
        elseif(isset($_POST['addw']))
        {
            if(!empty($_SESSION['uid']))
            {
                if(!empty($_POST['wcname']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['number']) && !empty($_POST['address']))
                {
                    $wcname=$_POST['wcname'];
                    $n=$_POST['name'];
                    $e=$_POST['email'];
                    $m=$_POST['number'];
                    $a=$_POST['address'];
                    $uid=$_SESSION['uid'];
                    //////insert data in addcompany table
                    $sql="insert into addwholesaler(auid,wcname,name,email,mobile,address) values ('$uid','$wcname','$n','$e','$m','$a')";
                    $res=mysqli_query($con,$sql);
                    //////////email check user table
                    $sql2="select email from users where email='$e'";
                    $res2=mysqli_query($con,$sql2);
                    $row=mysqli_num_rows($res2);
                    if($row>0)
                    {
                        
                        $msg='Added Wholesaler';
                        require 'addwholesaler.php';
                    }
                    else
                    {
                        /////insert data in users table
                        $sql1="insert into users(name,email,mobile,address,role) values ('$n','$e','$m','$a','3')";
                        $res1=mysqli_query($con,$sql1);
                        $msg='Added Wholesaler';
                        require 'addwholesaler.php';
                    }
                }
                else
                {
                    $msg='Fill all details';
                    require 'addwholesaler.php';
                }
            }
            else
            {
                header ("location:http://localhost/medical/index.php");
            }
        }
    /////manage wholesaler
    elseif(isset($_GET['mw']))
    {
        if(!empty($_SESSION['uid']))
        {
          require 'manage_w.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
    }
     /////manage customer
     elseif(isset($_GET['mcu']))
     {
         if(!empty($_SESSION['uid']))
         {
           require 'manage_cu.php';
         }
         else
         {
             header ("location:http://localhost/medical/index.php");
         }
     }
     /////manage wholesaler
     elseif(isset($_GET['mr']))
     {
        if(!empty($_SESSION['uid']))
        {
         require 'manage_r.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
         
     }
    ///order company search
    elseif(isset($_POST['cname']))
    {
        if(!empty($_SESSION['uid']))
        {
            $cidd=$_POST['cn'];
            require 'orderm.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
    }
    ///order company category medicine
    elseif(isset($_GET['cid']))
    {
        if(!empty($_SESSION['uid']))
        {
            $uid=$_SESSION['uid'];
            $cn=$_GET['cid'];
            $mn=$_POST['mn'];
            $qty=$_POST['qty'];
            $dd=$_POST['dd'];
            $pm=$_POST['pmethod'];
            $sql="insert into orders (soid,roid,medicine_name,quantity,d_date,p_method,o_status) values ('$uid','$cn','$mn','$qty','$dd','$pm','order pending')";
            $res=mysqli_query($con,$sql);
            require 'mom.php';
        }  
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
    }
     //// manage order medicine
     elseif(isset($_GET['morderm']))
     {
         if(!empty($_SESSION['uid']))
         {
        
           require 'mom.php';
         }
         else
         {
             header ("location:http://localhost/medical/index.php");
         }
     }
     //// order recive
     elseif(isset($_GET['rorder']))
     {
        if(!empty($_SESSION['uid']))
        {
        
         require 'rorder.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }

     }
    //// send medicine
    elseif(isset($_GET['sendmedicine']))
    {
        if(!empty($_SESSION['uid']))
        {
            $role=$_SESSION['role'];
            $uid=$_SESSION['uid'];
            $oid=$_GET['sendmedicine'];
            $sql="select*from orders where oid='$oid'";
            $res=mysqli_query($con,$sql);
            $row=mysqli_fetch_array($res);
            $soid=$row['soid'];
            $mn=$row['medicine_name'];
            $qty=$row['quantity'];
            $od=$row['order_date'];
            $dd=$row['d_date'];
            $pm=$row['p_method'];
            $sql1="select category,mrp,price_distributor,quantity,expiry from medicine where medicine_name='$mn' and amuid='$uid'";
            $res1=mysqli_query($con,$sql1);
            $row1=mysqli_fetch_array($res1);
            $cm=$row1['category'];
            $mrp=$row1['mrp'];
            $aqty=$row1['quantity'];
            $ex=$row1['expiry'];
            if($role=='1')
            {
                $sql8="select price_distributor from medicine where medicine_name='$mn'";
                $res8=mysqli_query($con,$sql8);
                $row8=mysqli_fetch_array($res8);
                $spm=$row8['price_distributor'];
            }
            elseif($role=='2')
            {
                $sql8="select price_wholesaler from medicine where medicine_name='$mn'";
                $res8=mysqli_query($con,$sql8);
                $row8=mysqli_fetch_array($res8);
                $spm=$row8['price_wholesaler'];
            }
            elseif($role=='3')
            {
                $sql8="select price_retailer from medicine where medicine_name='$mn'";
                $res8=mysqli_query($con,$sql8);
                $row8=mysqli_fetch_array($res8);
                $spm=$row8['price_retailer'];
            }
            elseif($role=='4')
            {
                $sql8="select mrp from medicine where medicine_name='$mn'";
                $res8=mysqli_query($con,$sql8);
                $row8=mysqli_fetch_array($res8);
                $spm=$row8['mrp'];
            }
            $tamount=$qty*$spm;
            ////inset data in sales table
            $sql1="insert into sales (salerid,reciverid,mname,mcategory,qty,mrp,sale_price,totalamount,Payment_Type) values ('$uid','$soid','$mn','$cm','$qty','$mrp','$spm','$tamount','$pm')";
            $res1=mysqli_query($con,$sql1);
           ///// update  medicine
            $quantity=$aqty-$qty;
            $sql2="update medicine set quantity='$quantity' where medicine_name='$mn' and amuid='$uid'";
            $res2=mysqli_query($con,$sql2);
            ////update order table
            $sql4="update orders set o_status='order send' where oid='$oid'";
            $res4=mysqli_query($con,$sql4);
    
            require 'rorder.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
    }
    ////verify order medicine
    elseif(isset($_GET['vmedicine']))
    {
        if(!empty($_SESSION['uid']))
        {
            $oid=$_GET['vmedicine'];
            $sql="update orders set o_status='order confirm' where oid='$oid'";
            $res=mysqli_query($con,$sql);
            require 'rorder.php';
          }
         else
         {
             header ("location:http://localhost/medical/index.php");
         }
    }
    ////recive order medicine
    elseif(isset($_GET['rmedicine']))
    {
        if(!empty($_SESSION['uid']))
        {
            $oid=$_GET['rmedicine'];
            $sql="select*from orders where oid='$oid'";
            $res=mysqli_query($con,$sql);
            $row=mysqli_fetch_array($res);
            $soid=$row['soid'];
            $roid=$row['roid'];
            $mn=$row['medicine_name'];
            $qty=$row['quantity'];
            $od=$row['order_date'];
            $dd=$row['d_date'];
            $pm=$row['p_method'];
            $sql1="select category,mrp,price_distributor,price_wholesaler,quantity,expiry from medicine where medicine_name='$mn'";
            $res1=mysqli_query($con,$sql1);
            $row1=mysqli_fetch_array($res1);
            $cm=$row1['category'];
            $mrp=$row1['mrp'];
            $aqty=$row1['quantity'];
            $ex=$row1['expiry'];
            $spm=$row1['price_distributor'];
            $tamount=$qty*$spm;
        
            /////insert in purchase table in data
        
            $sql3="insert into purchase (salerid,reciverid,medicine_name,category,expiry,mrp,quantity,purchase_price,p_method) values ('$roid','$soid','$mn','$cm','$ex','$mrp','$qty','$tamount','$pm')";
            $res3=mysqli_query($con,$sql3);
            ////update order table
            $sql4="update orders set o_status='order recived' where oid='$oid'";
            $res4=mysqli_query($con,$sql4);
            ///////
            $sql5="select medicine_name,quantity from medicine where medicine_name='$mn' and amuid='$soid'";
            $res5=mysqli_query($con,$sql5);
            $row5=mysqli_fetch_array($res5);
            if($row5>0)
            {
                $qty1=$row5['quantity'];
                ///////medicine all 
                $qty2=$qty+$qty1;
                $sql4="update medicine set quantity='$qty2' where medicine_name='$mn' and amuid='$soid'";
                $res4=mysqli_query($con,$sql4);
                require 'mom.php';
            }
            else
            {
                ///////medicine all 
                $sql4="insert into medicine (amuid,medicine_name,category,quantity,expiry,mrp) values ('$soid','$mn','$cm','$qty','$ex','$mrp')";
                $res4=mysqli_query($con,$sql4);
                require 'mom.php';
            }
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
    }
    ////////viewall medi
    elseif(isset($_GET['viewmedi']))
    {
        if(!empty($_SESSION['uid']))
        {
          require 'viewmedi.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
    }
    ////////edit wholesaler
    elseif(isset($_GET['editw']))
    {
        if(!empty($_SESSION['uid']))
        {
            $wid=$_GET['editw'];
            require 'edit_w.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
    }
    ////////edit customer
    elseif(isset($_GET['editcu']))
    {
        if(!empty($_SESSION['uid']))
        {
            $cuid=$_GET['editcu'];
            require 'editcu.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
    }
     ////////edit wholesaler
     elseif(isset($_GET['editr']))
     {
         if(!empty($_SESSION['uid']))
         {
            $rid=$_GET['editr'];
            require 'edit_r.php';
         }
         else
         {
             header ("location:http://localhost/medical/index.php");
         }
     }
     ////////search distributor
     elseif(isset($_POST['sdi']))
     {
        if(!empty($_SESSION['uid']))
        { 
            $em=$_POST['e'];
            require 'adddistributor.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
     }
    ////////search company
    elseif(isset($_POST['sco']))
    {
        if(!empty($_SESSION['uid']))
        { 
            $em=$_POST['e'];
            require 'addcompany.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
    }
    ////////search wholesaler
    elseif(isset($_POST['swh']))
    {
        if(!empty($_SESSION['uid']))
        { 
            $em=$_POST['e'];
            require 'addwholesaler.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
    }
      ////////search customer
      elseif(isset($_POST['scu']))
      {
          if(!empty($_SESSION['uid']))
          { 
              $em=$_POST['e'];
              require 'addcu.php';
          }
          else
          {
              header ("location:http://localhost/medical/index.php");
          }
      }
     ////////search company
     elseif(isset($_POST['adr']))
     {
        if(!empty($_SESSION['uid']))
        {
         $em=$_POST['e'];
         require 'addretailer.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
     }
    ////add medicineall
    elseif(isset($_POST['addmedicinea']))
    {
        if(!empty($_SESSION['uid']))
        {
            if(!empty($_POST['name']) && !empty($_POST['qty']) && !empty($_POST['pp'])&& !empty($_POST['mrp']) && !empty($_POST['ex']))
            {
                $role=$_SESSION['role'];
                $uid=$_SESSION['uid'];  
                $cname=$_POST['cn'];
                $sql8="select uid from users where name='$cname'";
                $res8=mysqli_query($con,$sql8);
                $row8=mysqli_fetch_array($res8);
                $sid=$row8['uid'];
                $mn=$_POST['name'];
                $cm=$_POST['category'];
                $pp=$_POST['pp'];
                $qty=$_POST['qty'];
                $mrp=$_POST['mrp'];
                $ex=$_POST['ex'];
                $pm=$_POST['pmethod'];
                /////insert in purchase table in data
                $tamount=$qty*$pp;
                $sql3="insert into purchase (salerid,reciverid,medicine_name,category,expiry,mrp,quantity,purchase_price,p_method) values ('$sid','$uid','$mn','$cm','$ex','$mrp','$qty','$tamount','$pm')";
                $res3=mysqli_query($con,$sql3);
                ///////
                $sql5="select medicine_name,quantity from medicine where medicine_name='$mn' and amuid='$uid'";
                $res5=mysqli_query($con,$sql5);
                $row5=mysqli_fetch_array($res5);

                if($row5>0)
                {
                    $qty1=$row5['quantity'];
                    ///////medicine all 
                    $qty2=$qty+$qty1;
                    $sql4="update medicine set quantity='$qty2' where medicine_name='$mn' and amuid='$uid'";
                    $res4=mysqli_query($con,$sql4);

                    require 'mom.php';
                    
                }
                else
                {
                    if($role=='2')
                    {
                    ///////medicine all 
                    $sql4="insert into medicine (amuid,medicine_name,category,quantity,expiry,mrp,price_distributor) values ('$uid','$mn','$cm','$qty','$ex','$mrp','$pp')";
                    $res4=mysqli_query($con,$sql4);
                    require 'mom.php';
                    }
                    elseif($role=='3')
                    {
                        ///////medicine all 
                    $sql4="insert into medicine (amuid,medicine_name,category,quantity,expiry,mrp,price_wholesaler) values ('$uid','$mn','$cm','$qty','$ex','$mrp','$pp')";
                    $res4=mysqli_query($con,$sql4);
                    require 'mom.php';
                    }
                    elseif($role=='4')
                    {
                        ///////medicine all 
                    $sql4="insert into medicine (amuid,medicine_name,category,quantity,expiry,mrp,price_retailer) values ('$uid','$mn','$cm','$qty','$ex','$mrp','$pp')";
                    $res4=mysqli_query($con,$sql4);
                    require 'mom.php';
                    }

                }
                
            }
            else
            {
                require 'addmedicine_all.php';
            }
        } 
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
    }
    //////////sale medicine customer
    elseif(isset($_POST['salecm']))
    {
        if($_SESSION['uid'])
        {
           require 'salemedir.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
    }
    ////////////medicine sale customer
    elseif(isset($_POST['m']))
    {
        if($_SESSION['uid'])
        {
            $e=$_POST['dcname'];
            $sql1="select uid,name,address from users where email='$e'";
            $res=mysqli_query($con,$sql1);
            $row=mysqli_fetch_array($res);
            $cid=$row['uid'];
            $cn=$row['name'];
            $ad=$row['address'];
            $m=$_POST['medi'];
            require 'salemedir.php';
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
    }
    elseif(isset($_POST['smc']))
    {
        if($_SESSION['uid'])
        {
            if(!empty($_POST['sqty']))
            {
                $salerid=$_SESSION['uid'];
                $id=$_POST['cn'];
                $mname=$_POST['mname'];
                $mcat=$_POST['mcat'];
                $qty=$_POST['sqty'];
                $mrp=$_POST['mrp'];
                $ex=$_POST['ex'];
                $pmethod=$_POST['pmethod'];
                $aa=count($mname);
                $aqty=$_POST['aqty'];
                for ($i=0; $i < $aa; $i++)
                { 
                    $tamount[]=$mrp[$i]*$qty[$i];
                    ///// update  medicine
                    $quantity=$aqty[$i]-$qty[$i];
                    $sql2="update medicine set quantity='$quantity' where medicine_name='$mname[$i]' and amuid='$salerid'";
                    $res2=mysqli_query($con,$sql2);
                
                }   
                    $mn=implode(",",$mname);
                    $cm=implode(",",$mcat);
                    $sq=implode(",",$qty);
                    $q=implode(",",$aqty);
                    $exp=implode(",",$ex);
                    $mr=implode(",",$mrp);
                    $k=array_sum($tamount);
                    //inset data in sales table
                    $sql1="insert into sales (salerid,reciverid,mname,mcategory,qty,mrp,sale_price,totalamount,Payment_Type) values ('$salerid','$id','$mn','$cm','$sq','$mr','$mr','$k','$pmethod')";
                    $res1=mysqli_query($con,$sql1);
                    /////insert in purchase table in data
                    $sql3="insert into purchase (salerid,reciverid,medicine_name,category,expiry,mrp,quantity,purchase_price,p_method) values ('$salerid','$id','$mn','$cm','$exp','$mr','$sq','$k','$pmethod')";
                    $res3=mysqli_query($con,$sql3);
                    require 'manage_sales.php';
            }
            else
            {
                require 'salemedir.php';
            }
        }
        else
        {
            header ("location:http://localhost/medical/index.php");
        }
        
    }
    ////logout
    elseif(isset($_GET['logout']))
    {
        session_unset();
        session_destroy ();
        require 'index.php';
    }
?>