<?php
include('../connection.php');
$d=date('y-m-d');
$param=$_GET['param'];
$user=$_GET['user'];
if($param=='addTindakan'){
  $noTransaksi=$_GET['noTransaksi'];
  $id_tindakan=$_GET['id_tindakan'];
  $qty=$_GET['qty'];
  $price=$_GET['price'];

  $sql_user = mysqli_query($con,"insert into TBLTransaksiDetail
                (id_transaksi,qty,id_tindakan,price,created_at,created_date)
                values(
                    '$noTransaksi',
                    '$qty',
                    '$id_tindakan',
                    '$price','$user','$d')") or die(mysqli_error());

			if($sql_user)
			{
        $totalAll=0;
        $sql_total = mysqli_query($con,"select qty,price from TBLTransaksiDetail where id_transaksi='$noTransaksi'") or die(mysqli_error());
        while($r=mysqli_fetch_array($sql_total)){
            $total=$r['price']*$r['qty'];
            $totalAll=$totalAll+$total;
        }

        $row['msg']='success';
        $row['total']=($totalAll!=''?$totalAll:0);
        $data[]=$row;
        echo json_encode($data);
			}else{
        $row['msg']='gagal';
        $data[]=$row;
        echo json_encode($data);
      }
}else if($param=='removeTindakan'){
  $id_transaksiDetail=$_GET['id_transaksiDetail'];
  $noTransaksi=$_GET['noTransaksi'];
  $sql_user = mysqli_query($con,"delete from TBLTransaksiDetail where id_transaksiDetail='$id_transaksiDetail'") or die(mysqli_error());

			if($sql_user)
			{
        $totalAll=0;
        $sql_total = mysqli_query($con,"select qty,price from TBLTransaksiDetail where id_transaksi='$noTransaksi'") or die(mysqli_error());
        while($r=mysqli_fetch_array($sql_total)){
            $total=$r['price']*$r['qty'];
            $totalAll=$totalAll+$total;
        }

        $row['msg']='success';
        $row['total']=($totalAll!=''?$totalAll:0);
        $row['msg']='success';
        $data[]=$row;
        echo json_encode($data);
			}else{
        $row['msg']='gagal';
        $data[]=$row;
        echo json_encode($data);
      }

}else if($param=='removeAll'){
  $noTransaksi=$_GET['noTransaksi'];
  $sql_user = mysqli_query($con,"delete from TBLTransaksiDetail where id_transaksi='$noTransaksi'") or die(mysqli_error());

			if($sql_user)
			{
        $totalAll=0;
        $row['msg']='success';
        $row['total']=($totalAll!=''?$totalAll:0);
        $row['msg']='success';
        $data[]=$row;
        echo json_encode($data);
			}else{
        $row['msg']='gagal';
        $data[]=$row;
        echo json_encode($data);
      }

}
?>
