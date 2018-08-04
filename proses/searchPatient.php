<?php
include('../connection.php');
$param=$_GET['param'];
$query = mysqli_query($con,"select * from TBLPasien where NoPasien='$param' or NamaPasien like '%$param%'") or die(mysqli_error());
$data = array();
if($query)
{
    while($sul=mysqli_fetch_array($query)){
      $row['nopasien']=$sul['NoPasien'];
      $row['namapasien']=$sul['NamaPasien'];
      $row['emailpasien']=$sul['Email'];
      $data[]=$row;
    }
    echo json_encode($data);
}else{
    $row['msg']='gagal';
    $data[]=$row;
    echo json_encode($data);
}
?>
