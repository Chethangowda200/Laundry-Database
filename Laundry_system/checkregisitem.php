<?php
require_once('connect.php');
session_start();
//  submit
if (isset($_POST['regisItemSubmit']) && ($_SESSION['userStatus']=="ADMIN"||$_SESSION['userStatus']=="STAFF")){
?>
  <?php
  $memberIdToRegis= $_POST['memberIdInput'];
  $useMember =  $_POST['useMember'];
 




  $staffId = $_SESSION['staffId'];

  $varObtainService =0;


  $varItemsId= array();
  $varItemsName= array();
  $varItemsPrice= array();
  $varItemQuantity=array();
  $countItemsRow = 0;
  $totalPrice =0;
  $q="select * from item";
  $result=$mysqli->query($q);
  if(!$result){
    echo "Select failed. Error: ".$mysqli->error ;
  }
  while($row=$result->fetch_array()){ ?>
        <?php $varItemsName[$countItemsRow] = $row['itemName'];
              $varItemsId[$countItemsRow] = $row['itemId'];
              $varItemsPrice[$countItemsRow] = $row['price'];
              $varItemQuantity[$countItemsRow] = $_POST[($row['itemName']."Vol")];
              $countItemsRow+=1;
        ?>
<?php } ?>

<?php
for ($y = 0; $y < $countItemsRow; $y++) {

  if($varItemQuantity[$y]>0){
    $varObtainService =1;
  }
}

 ?>
 <?php

$varObtainMemberId=0;
 if($useMember == "1"){
  
 $q = "SELECT * FROM `member` WHERE memberId='".$memberIdToRegis."'";
 if ($res = $mysqli->query($q))
 {
     if (mysqli_num_rows($res) == 1)
     {
         $row = $res->fetch_array();
         $varObtainMemberId=1;
     }

 }
}

elseif ($useMember == "0") {
  $varObtainMemberId=1;
  echo "ติ้กไม่ไส่ไอดี";
}

else {
  $varObtainMemberId=0;
}

 ?>


  <?php
  if ($varObtainService==1 && $varObtainMemberId==1) {
    // genServiceId
    $q = "SELECT `generateServiceId`() AS `generateServiceId`";
    if ($res = $mysqli->query($q))
    {
        if (mysqli_num_rows($res) == 1)
        {
            $row = $res->fetch_array();
            $servideId = $row['generateServiceId'];
        }
    }
    echo '<h1 style="text-align: center; font-family: monospace;"> ITEM REGISTERED SUCCESSFULLY!!!</h1>';
    // echo "<br>";
    // echo "ServiceId is :".$servideId;
    // echo "<br>";
    //
    for ($x = 0; $x < $countItemsRow; $x++) {

        // $q="select * from laundryService";
        if($varItemQuantity[$x]>0){
          //fortest show item : quantity
          // echo "ItemId: ".$varItemsId[$x];
          // echo "&nbsp";
          // echo "ItemName: ".$varItemsName[$x];
          // echo "&nbsp";
          // echo "ItemPrice: ".$varItemsPrice[$x];
          // echo "&nbsp";
          // echo "ItemQuantity: ".$varItemQuantity[$x];
          // echo "&nbsp";
          // echo "<br>";
          //
        $itemQuantity = $varItemQuantity[$x];
        $itemId = $varItemsId[$x];
        if($useMember=="0"){
          $memberIdToRegis = 9999;
        
          $q="INSERT INTO `regisitem` (`memberId`,`staffId`,`serviceId`,`itemId`,`quantity`) VALUES ('$memberIdToRegis','$staffId','$servideId','$itemId','$itemQuantity')";
          // $q = "INSERT INTO `regisitem` (`memberId`,`staffId`,`serviceId`,`itemId`,`quantity`) VALUES (`test`,$_SESSION['staffId'],$servideId,$varItemsId[$x],``)";
          $result=$mysqli->query($q);
          if(!$result){
            echo "INSERT failed. Error: ".$mysqli->error ;
            // break;
        }
        }
        else {
          $q="INSERT INTO `regisitem` (`memberId`,`staffId`,`serviceId`,`itemId`,`quantity`) VALUES ('$memberIdToRegis','$staffId','$servideId','$itemId','$itemQuantity')";
          // $q = "INSERT INTO `regisitem` (`memberId`,`staffId`,`serviceId`,`itemId`,`quantity`) VALUES (`test`,$_SESSION['staffId'],$servideId,$varItemsId[$x],``)";
          $result=$mysqli->query($q);
          if(!$result){
            echo "INSERT failed. Error: ".$mysqli->error ;
            // break;
        }
      }
      $totalPrice =  $totalPrice+($varItemsPrice[$x]*$varItemQuantity[$x]);
    }
    //
  }
  //CURDATE
  $q="SELECT curdate() as currentDate";
  $currentDate = 0;
  // $q = "INSERT INTO `regisitem` (`memberId`,`staffId`,`serviceId`,`itemId`,`quantity`) VALUES (`test`,$_SESSION['staffId'],$servideId,$varItemsId[$x],``)";
  if ($res = $mysqli->query($q))
  {
      if (mysqli_num_rows($res) == 1)
      {
          $row = $res->fetch_array();
          $currentDate=$row['currentDate'];
      }

  }
  //
  //  laundryService
  $q ="INSERT INTO `laundryservice` (`serviceId`,`memberId`,`staffId`,`dateIn`,`dateOut`,`serviceStatus`,`totalPrice`) VALUES('$servideId','$memberIdToRegis','$staffId','$currentDate','-','NF','$totalPrice')";
  $result=$mysqli->query($q);
  if(!$result){
    echo "INSERT failed. Error: ".$mysqli->error ;
    // break;
  }
  header("Refresh: 5; url=regisItem.php");
  
}
elseif($varObtainMemberId==0){
  header("Refresh: 3; url=regisItem.php");
  echo '<h1 style="text-align: center; font-family: monospace;">Member id not found!!!</h1>';
}
else{
  header("Refresh: 3; url=regisItem.php");
  echo '<h1 style="text-align: center; font-family: monospace;">No item to register!!! </h1>';
}
}

?>
