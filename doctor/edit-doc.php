
    <?php
    
    

    //import database
    include("../connection.php");



    if($_POST){
        $sonuc= $database->query("select * from webuser");
        $ad=$_POST['ad'];
        $eskimail=$_POST["eskimail"];
        $nic=$_POST['nic'];
        $alan=$_POST['alan'];
        $email=$_POST['email'];
        $tele=$_POST['Tele'];
        $sifre=$_POST['sifre'];
        $sifreonay=$_POST['sifreonay'];
        $id=$_POST['id00'];
        
        if ($password==$cpassword){
            $hata='3';
            $sonuc= $database->query("select doctor.docid from doctor inner join webuser on doctor.docemail=webuser.email where webuser.email='$email';");
            if($sonuc->num_rows==1){
                $id2=$sonuc->fetch_assoc()["docid"];
            }else{
                $id2=$id;
            }
            
            echo $id2."jdfjdfdh";
            if($id2!=$id){
                $hata='1';          
            }else{
                $sql1="update doctor set docemail='$email',docad='$ad',docsifre='$sifre',docnic='$nic',doctel='$tele',alan=$alan where docid=$id ;";
                $database->query($sql1);

                $sql1="update webuser set email='$email' where email='$eskimail' ;";
                $database->query($sql1);

                echo $sql1;
                $hata= '4';
                
            }
            
        }else{
            $error='2';
        }
    
    
        
        
    }else{
        //header('location: signup.php');
        $error='3';
    }
    

    header("location: settings.php?action=edit&error=".$error."&id=".$id);
    ?>
    
   

</body>
</html>