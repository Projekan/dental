<?php
include('../connection.php');
$d=date('Y-m-d');

$noTransaksi=$_POST['noTransaksi'];
$totalAll=$_POST['totalAll'];
$noPasien=$_POST['noPasien'];
$cost=$_POST['cost'];
$priceTreatment=$_POST['priceTreatment'];
$user=$_POST['user'];
$sql_user = mysqli_query($con,"insert into TBLTransaksiMaster
              (id_transaksi,NoPasien,TotalPriceDokter,TotalPriceTindakan,TotalPrice,created_at,created_date)
              values(
                  '$noTransaksi',
                  '$noPasien',
                  '$cost',
                  '$totalAll','$priceTreatment','$user','$d')") or die(mysqli_error());

    if($sql_user)
    {
      $data = array(
                 array('msg' => 'success'));
      echo json_encode($data);
    }else{
      $data = array(
                 array('msg' => 'gagal'));
      echo json_encode($data);
    }
?>
