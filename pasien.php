<?php

    if(isset($_GET['del']))
    {
        $query = mysqli_query($con,"delete from TBLPasien where NoPasien = '$_GET[del]'") or die(mysqli_error());
        if($query)
        {
            header("location:index.php?pos=pasien");
        }
    }

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
								<a class="navbar-brand" href="#">Dashboard</a>
						</div>
						<div class="collapse navbar-collapse">
								<ul class="nav navbar-nav navbar-left">
										<li>
												<a href="#" class="dropdown-toggle" data-toggle="dropdown">
														<i class="fa fa-dashboard"></i>
						<p class="hidden-lg hidden-md">Dashboard</p>
												</a>
										</li>
										<li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown">
																<i class="fa fa-globe"></i>
																<b class="caret hidden-sm hidden-xs"></b>
																<span class="notification hidden-sm hidden-xs">5</span>
							<p class="hidden-lg hidden-md">
								5 Notifications
								<b class="caret"></b>
							</p>
													</a>
													<ul class="dropdown-menu">
														<li><a href="#">Notification 1</a></li>
														<li><a href="#">Notification 2</a></li>
														<li><a href="#">Notification 3</a></li>
														<li><a href="#">Notification 4</a></li>
														<li><a href="#">Another notification</a></li>
													</ul>
										</li>
										<!--<li>
											 <a href="">
														<i class="fa fa-search"></i>
						<p class="hidden-lg hidden-md">Search</p>
												</a>
										</li>-->
								</ul>

								<ul class="nav navbar-nav navbar-right">
										<li>
											 <a href="">
													 <p>Account</p>
												</a>
										</li>
										<li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown">
																<p>
								Dropdown
								<b class="caret"></b>
							</p>
													</a>
													<ul class="dropdown-menu">
														<li><a href="#">Action</a></li>
														<li><a href="#">Another action</a></li>
														<li><a href="#">Something</a></li>
														<li><a href="#">Another action</a></li>
														<li><a href="#">Something</a></li>
														<li class="divider"></li>
														<li><a href="#">Separated link</a></li>
													</ul>
										</li>
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
												<div class="header" style="padding-bottom:30px">
														<div style="float:left">
																<h4 class="title">Tabel Pasien</h4>
																<p class="category"></p>
														</div>
														<div style="float:right">
																<button class="btn" style="padding:10px;background:#8566ce;border:none;color:white"><i class="fa fa-plus"></i> Tambah Data</button>
														</div>
												</div>
												<hr>
												<div class="content table-responsive" >
																<table class="display" width="100%" cellspacing="0" id="table1">
																		<thead>
																				<tr>
                                                <th>No</th>
																								<th>No Patient</th>
																								<th>Patient Name</th>
																								<th>Telephone</th>
																								<th>Sex</th>
																								<th>Email</th>
																								<th>Action</th>
																				</tr>
																</thead>
																<tbody>
                                  <?php
                                   $no = 1;
                                   $sql_user_list = mysqli_query($con,"select a.*,b.desc from TBLPasien a left join TBLSex b on a.Sex=b.id_sex");
                                   while($sul=mysqli_fetch_array($sql_user_list))
                                   {
                                     ?>
                                   <tr>
                                       <td align="center"><?php echo $no; ?></td>
                                       <td><?php   echo $sul['NoPasien']; ?></td>
                                       <td><?php   echo $sul['NamaPasien']; ?></td>
                                       <td><?php   echo $sul['Telephone']; ?></td>
                                       <td><?php   echo $sul['desc']; ?></td>
                                       <td><?php   echo $sul['Email']; ?></td>
                                       <td align="center">
                                           <button class="btn btn-warning" data-toggle="modal" data-target="#myModal" ><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                           <button class="btn btn-danger" data-toggle="modal" data-target="#myModal" ><i class="fa fa-trash" aria-hidden="true"></i></i></button>
                                       </td>

                                   </tr>
                               <?php
                                   $no++; }
                               ?>
																</tbody>

																</table>
														</div>
												</div>
										</div>
						</div>
						</div>
				</div>
		</div>
