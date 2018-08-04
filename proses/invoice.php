<?php
if(isset($_GET['submit'])){
  include('../connection.php');
  //require_once '../dompdf/autoload.inc.php';
  // reference the Dompdf namespace
  //use Dompdf\Dompdf;
  //initialize dompdf class
  //$document = new Dompdf();
  ?>

<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta name="viewport" content="width=device-width" />


    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet"/>
    <link href="../assets/css/animate.min.css" rel="stylesheet"/>
   <link href="../assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <link rel="stylesheet" href="../assets/css/font-awesome.css">

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,700,300" rel="stylesheet" type="text/css">
    <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<style>
td{
  font-size:12px;
}
</style>
<body style="width:100%;font-size:12px;" onLoad="window.print()">

          <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-6">
              <div>
                <label style="font-size:18px;font-weight:bold">Bali Dental Aesthetics</label><br/>
                <span>Jl.Muding Batu Sangian XI</span><br/>
                <span>Telp 089685437669</span><br/>
                <span>Fax. -</span>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-6" >
              <div class="row">
                <!-- <label style="font-size:18px;font-weight:bold">Bali Dental Aesthetics</label><br/> -->
                <div class="col-lg-4 col-md-4 col-xs-4">
                    <label>Transaction No. </label><br/>
                    <label>Date. </label><br/>
                    <label>Patient. </label><br/>
                </div>
                <div class="col-lg-8 col-md-8 col-xs-8">
                  <label><?php echo $_GET["noTransaksi"]?></label><br/>
                  <label><?php echo $_GET["date"] ?></label><br/>
                  <label><?php echo $_GET["noPasien"]."-".$_GET["name"]?></label><br/>
                </div>
              </div>
              </div>

        </div><br/>
        <div class="row" style="text-align:center;">
          <span style="margin:0px auto;font-size:18px;font-weight:bold;">TRANSACTION</span>
        </div><br/>

        <div class="row">
          <div class="content table-responsive table-full-width">
              <table class="table table-hover" id="gvDetails" style="overflow-y:auto">
              <thead>
                <th>Treatment</th>
                <th>Price</th>
                <th>QTY</th>
                <th>Total Price</th>

              </thead>
              <tbody>
                <?php 
                $sql_table = mysqli_query($con,"select a.id_transaksiDetail,a.price,sum(qty)as qty,b.tindakan from TBLTransaksiDetail a left join TBLTindakan b on a.id_tindakan=b.id_tindakan where a.id_transaksi='$_GET[noTransaksi]' group by a.id_tindakan,a.price");

                  while($row=mysqli_fetch_array($sql_table))
                    {
                      $total=$row['price']*$row['qty'];
                  ?>
             <tr>
                    <td><?php echo $row['tindakan']?></td>
                    <td><?php echo number_format($row['price'])?></td>
                    <td><?php echo $row['qty']?></td>
                    <td><?php echo number_format($total)?></td>
                  </tr>

                  
               <?php   } ?>
                 
          </tbody>
            </table>
          </div>
        </div>
        <hr>
        <div class="row form-horizontal">
          <div class="col-md-6 col-lg-6 col-xs-6 pull-right">
            <div class="form-group">
              <label class="col-sm-5 col-lg-5 col-md-5 control-label">Price Treatment :</label>
                <div class="col-sm-7 col-lg-7 col-md-7">
                  
                  <label class="form-control" ><?php echo "Rp. ".number_format($_GET["priceTotal"])?></label>

                </div>
            </div>
          </div>
        </div>
        
        <div class="row form-horizontal" >
          <div class="col-md-6 col-lg-6 col-xs-6 pull-right" style="border-bottom:1px dashed #999;">
            <div class="form-group">
              <label class="col-sm-5 col-lg-5 col-md-5 control-label">Cost :</label>
                <div class="col-sm-7 col-lg-7 col-md-7">
                <label class="form-control" ><?php echo "Rp. ".($_GET['cost']==''?'0':$_GET['cost'])?></label>

                </div>
            </div>
          </div>
        </div>
        <br/>
        <div class="row form-horizontal">
          <div class="col-md-6 col-lg-6 col-xs-6 pull-right">
            <div class="form-group">
              <label class="col-sm-5 col-lg-5 col-md-5 control-label">Total Price :</label>
                <div class="col-sm-7 col-lg-7 col-md-7">
                    <label class="form-control" ><?php echo "Rp. ".number_format($_GET['totalAll'])?></label>
                </div>
            </div>
          </div>
        </div>
        <hr>
        <div class="row form-horizontal" style="padding-top:90px;">
            <div class="col-md-6 col-lg-6 col-xs-6 pull-left" >
              <label>(.............................................)</label>
              <br/>
              <span style="padding-left:70px">Cashier</span>
            </div>
            <div class="col-md-6 col-lg-6 col-xs-6 pull-right">

                <label>(.............................................)</label>
                <br/>
                <span style="padding-left:70px">Patience</span>
              </div>

        </div>
</div>

</body>

</html>
<?php }
?>

