<?php
$d=date('Y-m-d');
?>
<div class="main-panel" style="height:100%;overflow:hidden">
		<nav class="navbar navbar-default navbar-fixed" >
				<div class="container-fluid" style="height:100%">
						<div class="navbar-header">
								<button type="button" style="float:left" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand" href="#">Cashier</a>
						</div>
						<div class="collapse navbar-collapse">
								<ul class="nav navbar-nav navbar-left">
										<li>
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">
														<i class="fa fa-dashboard"></i>
						<p class="hidden-lg hidden-md">Cashier</p>
												</a>
										</li>
								</ul>

								<ul class="nav navbar-nav navbar-right">
										<li>
												<a href="#">
														<p>Log out</p>
												</a>
										</li>
				<li class="separator hidden-lg hidden-md"></li>
								</ul>
						</div>
				</div>
		</nav>


		<div class="content" style="height:100%;overflow:auto;">
				<div class="container-fluid" >
						<div class="row">
								<div class="col-ls-12" >
										<div class="card">
												<div class="content">
                          <div class="row">
                            <div class="col-md-12">
  														<label>Search Patient</label>
                              <input class="form-control" id='search_patient' placeholder="Search by Name,No patience"/><br/>
                              <button onclick="searchPatient();" class="btn btn-info btn-fill pull-right">Search</button>
                          </div>
                        </div><br/>
                          <div class="clearfix"></div>
                          <!-- <form action='proses/transaction.php' method='post'> -->
                          <div class="row" >
                            <div class="col-md-12">
                              <div class="panel panel-default">
                                <div class="panel-heading">Info Patient</div>
                                <div class="panel-body">

                                      <div class="row">
                                          <div class="col-md-2">
                                              <div class="form-group">
                                                  <label>Patient No</label>
                                                  <input type="text" id="nopasien" name='nopasien' class="form-control" placeholder="Patient No" required>
                                              </div>
                                          </div>
                                          <div class="col-md-5">
                                              <div class="form-group">
                                                  <label>Name</label>
                                                  <input type="text" id="namapasien"  name='namapasien' class="form-control" placeholder="Username" required>
                                              </div>
                                          </div>
                                          <div class="col-md-5">
                                              <div class="form-group">
                                                  <label for="exampleInputEmail1">Email address</label>
                                                  <input type="email" id="emailpasien" class="form-control" placeholder="Email">
                                              </div>
                                          </div>
                                      </div>

                                </div>
                              </div>

                            </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12">
                                <div class="panel panel-default">
                                  <div class="panel-heading">Transaction</div>
                                  <div class="panel-body">

                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Transaction No</label>
                                                    <?php
                                                    $sql_nourut = mysqli_query($con,"SELECT MAX(id_transaksi)+1 as id_transaksi  FROM  TBLTransaksiMaster");
                                                      $sul=mysqli_fetch_array($sql_nourut);
                                                      $kode=$sul['id_transaksi'];
                                                      if($kode==''){
                                                        $kode=1;
                                                        $kode=sprintf("%010s", $kode) ;
                                                      }else{
                                                        $kode=sprintf("%010s", $kode) ;
                                                      }
                                                     ?>
                                                    <input type="text" id="NoTransaction" name="NoTransaction" class="form-control" readonly placeholder="Transaction No" value="<?php echo $kode; ?>"/>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input type="text" class="form-control" disabled placeholder="Username" value="<?php echo $d; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Cashier</label>
                                                    <input type="email" class="form-control" disabled placeholder="Email" value="<?php echo $_SESSION['Name']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Treatment List</label>
                                                <select class="form-control" onchange="getval(this);" id='tindakan'>
                                                    <option value=''>---Choose Treatment---</option>
                                                  <?php
                                                  $sql_tindakan = mysqli_query($con,"select * from TBLTindakan");

                                                    while($sul=mysqli_fetch_array($sql_tindakan))
                                                      {
                                                    ?>
                                                  <option value='<?php echo $sul['id_tindakan'].'~'.$sul['tindakan'].'~'.$sul['price']?>'><?php echo $sul['id_tindakan'].'-'.$sul['tindakan']?></option>
                                                <?php }?>
                                                </select>
                                            </div>
                                          </div>
                                          <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Price</label>
                                                <input type="text" id='priceTindakan' onchange="changeValueTindakan();"  class="form-control" placeholder="Price">
                                                <input id='priceTindakanHidden' class="form-control" style="display:none"/>
                                                <!-- <input id='cost' onchange="changeValue();"  value='0' class="form-control" /> -->
                                            </div>
                                          </div>
                                          <div class="col-md-2">
                                            <div class="form-group">
                                                <label>QTY</label>
                                                <input type="number" class="form-control" id='qty' placeholder="qty">
                                            </div>
                                          </div>

                                          <div class="col-md-2">
                                            <div class="form-group">
                                              <label>Submit</label>
                                                  <button id='btnAdd' onclick="addTindakan();" class="btn btn-info btn-fill form-control">Add</button>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                        <div class="content table-responsive table-full-width" id='tableTindakan'>
                                            <table class="table table-hover" id="gvDetails" style="overflow-y:auto">
                                            <thead>
                                              <th>Treatment</th>
                                              <th>Price</th>
                                              <th>QTY</th>
                                              <th>Total Price</th>
                                              <th>Action</th>
                                            </thead>
                                            <tbody>
                                              <?php
                                              $sql_table = mysqli_query($con,"select a.id_transaksiDetail,a.price,sum(qty)as qty,b.tindakan from TBLTransaksiDetail a left join TBLTindakan b on a.id_tindakan=b.id_tindakan where a.id_transaksi='$kode' group by a.id_tindakan,a.price");

                                                while($row=mysqli_fetch_array($sql_table))
                                                  {
                                                    $total=$row['price']*$row['qty'];
                                                    ?>
                                                <tr>
                                                  <td><?php echo $row['tindakan']?></td>
                                                  <td><?php echo $row['price']?></td>
                                                  <td><?php echo $row['qty']?></td>
                                                  <td><?php echo $total?></td>
                                                  <td><button onclick="remove(<?php echo $row['id_transaksiDetail'] ?>)" class="btn btn-warning form-control">Remove</button></td>
                                                </tr>

                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                          </table>
                                        </div>
                                        </div>
                                        <hr>
                                        <div class="row form-horizontal">
                                          <div class="col-md-5 pull-right">
                                            <div class="form-group">
                                              <label class="col-sm-4 control-label">Price Treatment :</label>
                                                <div class="col-sm-8">
                                                  <?php
                                                  $totalAll=0;
                                                  $sql_total = mysqli_query($con,"select qty,price from TBLTransaksiDetail where id_transaksi='$kode'") or die(mysqli_error());
                                                  while($r=mysqli_fetch_array($sql_total)){
                                                    $total=$r['qty']*$r['price'];
                                                    $totalAll=$totalAll+$total;
                                                  }

                                                   ?>
                                                  <input id='priceTreatment' class="form-control"  value="<?php echo number_format($totalAll); ?>" readonly required/>
                                                  <input id='priceTreatmenthidden' name="priceTreatmenthidden" value="<?php echo $totalAll ?>" class="form-control" style="display:none"/>
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                        <!-- <div class="row form-horizontal">
                                          <div class="col-md-5 pull-right">
                                            <div class="form-group">
                                              <label class="col-sm-3 control-label">Price medicine :</label>
                                                <div class="col-sm-9">
                                                  <label  id="focusedInput"></label>
                                                </div>
                                            </div>
                                          </div>
                                        </div> -->
                                        <div class="row form-horizontal" >
                                          <div class="col-md-5 pull-right" style="border-bottom:1px dashed #999;">
                                            <div class="form-group">
                                              <label class="col-sm-4 control-label">Cost :</label>
                                                <div class="col-sm-8">
                                                <input id='cost' onchange="changeValue();"  value='0' class="form-control" />
                                                <input id='costHidden' name="cost" class="form-control" style="display:none"/>
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                        <br/>
                                        <div class="row form-horizontal">
                                          <div class="col-md-5 pull-right">
                                            <div class="form-group">
                                              <label class="col-sm-4 control-label">Total Price :</label>
                                                <div class="col-sm-8">
                                                  <input id='totalAll' name="TotalAll" class="form-control" value="<?php echo number_format($totalAll); ?>" readonly required/>
                                                  <input id='totalAllHidden' name="TotalAllHidden" class="form-control" value="<?php echo $totalAll; ?>"  style="display:none"/>
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row form-horizontal">
                                          <div class="col-md-5 pull-right">
                                            <div class="form-group">
                                                <button onclick="submittransaction()" class="col-sm-12 btn btn-info btn-fill pull-right">Save and Print</button>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row form-horizontal">
                                          <div class="col-md-5 pull-right">
                                            <div class="form-group">
                                                <button onclick="removeAll();" class="col-sm-12 btn btn-warning btn-fill pull-right">Cancel</button>
                                            </div>
                                          </div>
                                        </div>

                                  </div>
                                </div>
                              </div>
                          </div>
                            <!-- </form> -->
												</div>
												<hr>

												</div>
										</div>
						</div>
						</div>
				</div>
		</div>
    <script>
    function changeValueTindakan(){
      var tindakanprice=document.getElementById("priceTindakan").value;

      if (isNaN(tindakanprice))
      {

      }
      document.getElementById("priceTindakan").value=numeral(tindakanprice).format('0,0');
      document.getElementById("priceTindakanHidden").value=numeral(tindakanprice).value();
    }
    function changeValue(){
       var cost=document.getElementById("cost").value;

       if (isNaN(cost))
       {

       }
       document.getElementById("cost").value=numeral(cost).format('0,0');
       document.getElementById("costHidden").value=numeral(cost).value();
       var totalAll=parseInt(document.getElementById("priceTreatmenthidden").value)+parseInt(document.getElementById("costHidden").value);
       document.getElementById("totalAll").value=numeral(totalAll).format('0,0');
       document.getElementById("totalAllHidden").value=totalAll;
   }
    function getval(sel){
      var price=sel.value.split('~');
      var pricetindakan=numeral(price[2]);
       document.getElementById("priceTindakan").value=pricetindakan.format('0,0');
       document.getElementById("priceTindakanHidden").value=pricetindakan.value();
    }
    function addTindakan(){
          var user="<?php echo $_SESSION['Name']; ?>";
          var tindakan=$( "#tindakan" ).val().split('~');
          var price=$( "#priceTindakan" ).val();
          var priceNormal=$( "#priceTindakanHidden" ).val();
          var priceNumeral=numeral(tindakan[2]);
          var qty=$( "#qty" ).val();
          var total=numeral(priceNumeral.value()*qty);
          var NoTransaction=$('#NoTransaction').val();
           if(tindakan[1]!='' && price!='' && qty>0){
             $.ajax({
                 type  : 'ajax',
                 url   :  "proses/Cashier.php?param=addTindakan&noTransaksi="+NoTransaction+"&id_tindakan="+tindakan[0]+"&qty="+qty+"&price="+priceNormal+"&user="+user,
                 async : false,
                 dataType : 'json',
                 success : function(data){
                  if(data[0].msg=='success'){
                     $( "#tableTindakan" ).load( "index.php?pos=cashier #tableTindakan" );
                      document.getElementById("priceTreatment").value=numeral(data[0].total).format('0,0');
                      document.getElementById("priceTreatmenthidden").value=data[0].total;
                      document.getElementById("totalAll").value=numeral(data[0].total).format('0,0');
                      document.getElementById("totalAllHidden").value=data[0].total;
                  }
                 }
               });
             // $('#gvDetails > tbody:last-child').append('<tr><td>'+tindakan[1]+'</td><td>'+price+'</td><td>'+qty+'</td><td>'+total.format('0,0')+'</td><td><button id="remove" class="removebutton btn btn-danger"></button></td></tr>');
         }
         // var priceTotal=document.getElementById("priceTreatment").value;
         // var priceTreatmenthidden=document.getElementById("priceTreatmenthidden").value;
         // if(priceTotal=='' || priceTreatmenthidden==''){
         //   priceTotal=0;
         //   priceTreatmenthidden=0;
         // }
         //
         // var totalTindakan=numeral(parseInt(priceTotal)+parseInt(total.value()));
         // var totalpriceTreatmenthidden=parseInt(priceTreatmenthidden)+parseInt(total.value());
         // document.getElementById("priceTreatment").value=numeral(totalpriceTreatmenthidden).format('0,0');
         // document.getElementById("priceTreatmenthidden").value=totalpriceTreatmenthidden;
         document.getElementById("priceTindakan").value='';
         document.getElementById("qty").value='';
         // document.getElementById("totalAll").value=numeral(totalpriceTreatmenthidden).format('0,0');
         //
         $('#tindakan').val('');

       };


      function remove(param){
        var user="<?php $_SESSION['Name'] ?>";
        var NoTransaction=$('#NoTransaction').val();
        $.ajax({
            type  : 'ajax',
            url   :  "proses/Cashier.php?param=removeTindakan&id_transaksiDetail="+param+"&noTransaksi="+NoTransaction+"&user="+user,
            async : false,
            dataType : 'json',
            success : function(data){
             if(data[0].msg=='success'){

                document.getElementById("priceTreatment").value=numeral(data[0].total).format('0,0');
                document.getElementById("priceTreatmenthidden").value=data[0].total;
                document.getElementById("totalAll").value=numeral(data[0].total).format('0,0');
                document.getElementById("totalAllHidden").value=data[0].total;
                  $( "#tableTindakan" ).load( "index.php?pos=cashier #tableTindakan" );
             }
            }
          });
      }
    function searchPatient(){
      var param=$( "#search_patient" ).val();
			if(param!=''){
       $.ajax({
           type  : 'ajax',
           url   :  "proses/searchPatient.php?param="+param,
           async : false,
           dataType : 'json',
           success : function(data){
             if(!data.msg){
              //document.getElementById("show_data").style.display = "block";
               document.getElementById("nopasien").value=data[0].nopasien;
               document.getElementById("namapasien").value=data[0].namapasien;
               document.getElementById("emailpasien").value=data[0].emailpasien;

                document.getElementById("search_patient").value='';
              // $( "#daftar_ujian_btn" ).prop( "disabled", false );
               // $('#show_data').html(html);
             }else{
               document.getElementById("nopasien").value=' ';
               document.getElementById("namapasien").value=' ';
               document.getElementById("emailpasien").value=' ';
               // $( "#daftar_ujian_btn" ).prop( "disabled", true );
               alert(data.msg);
             }
           }

       });
		 }
    }
    function removeAll(){
			  var user="<?php $_SESSION['Name'] ?>";
        var NoTransaction=$('#NoTransaction').val();
      $.ajax({
          type  : 'ajax',
         url   :  "proses/Cashier.php?param=removeAll&noTransaksi="+NoTransaction+"&user="+user,
          async : false,
          dataType : 'json',
          success : function(data){
            if(data[0].msg=='success'){
               $( "#gvDetails" ).load( "index.php?pos=cashier #gvDetails" );
               document.getElementById("priceTreatment").value=numeral(data[0].total).format('0,0');
               document.getElementById("priceTreatmenthidden").value=data[0].total;
               document.getElementById("totalAll").value=numeral(data[0].total).format('0,0');
               document.getElementById("totalAllHidden").value=data[0].total;
            }
          }
        });
    }
    function submittransaction(){
      var date='<?php echo $d?>';
      var name=$('#namapasien').val();
      var noTransaksi=$('#NoTransaction').val();
      var totalAll=$('#totalAllHidden').val();
      var noPasien=$('#nopasien').val();
      var cost=$('#costHidden').val();
      var priceTreatment=$('#priceTreatmenthidden').val();
      var user='<?php echo $_SESSION['Name'] ?>';

			if(noPasien!='' && noTransaksi!='' && name!='' && user!=''){
      $.ajax({
          method: 'POST',
          data: { noTransaksi: noTransaksi,totalAll:totalAll,noPasien:noPasien,cost:cost,priceTreatment:priceTreatment,user:user },
          url   :  "proses/transaction.php",
          success : function(resp){
            $( "#tableTindakan" ).load( "index.php?pos=cashier #tableTindakan" );
            window.open('proses/invoice.php?submit=submit&noTransaksi='+noTransaksi+'&date='+date+'&noPasien='+noPasien+'&name='+name+'&priceTotal='+priceTreatment+'&cost='+cost+'&totalAll='+totalAll,'_blank');
            document.getElementById("priceTindakan").value='';
            document.getElementById("qty").value='';
            document.getElementById("priceTreatment").value=0;
            document.getElementById("priceTreatmenthidden").value=0;
            document.getElementById("totalAll").value=0;
            document.getElementById("totalAllHidden").value=0;
            document.getElementById("nopasien").value='';
            document.getElementById("namapasien").value='';
            document.getElementById("emailpasien").value='';
            document.getElementById("search_patient").value='';
            // document.getElementById("totalAll").value=numeral(totalpriceTreatmenthidden).format('0,0');
            //
            $('#tindakan').val('');
						location.reload();

          }

        });
			}else{
				alert('Field tidak boleh ada yang kosong');
			}
    }

    </script>
