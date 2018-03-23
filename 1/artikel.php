<?php

session_start();
include "../koneksi.php";
include "auth_user.php";
?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
	
	<link rel="stylesheet" href="../css/bootstrap.min.css"/>
	<link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet">
	
	<script src="../js/jquery-2.1.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="../js/bootstrap.min.js"></script>
	<script src="../js/wow.min.js"></script>
	<script src="../js/jquery.easing.1.3.js"></script>
	<script src="../js/jquery.isotope.min.js"></script>
	<script src="../js/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="../js/fliplightbox.min.js"></script>
	<script src="../js/functions.js"></script>
	<script type="text/javascript">$('.portfolio').flipLightBox()</script>
  <script src="../js/jQuery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/moment.js"></script>
  <script src="../js/angular.min.js"></script>
  <script src="../js/proses.js"></script>
  <script src="../js/bootstrap-datetimepicker.min.js"></script>
    <title>Admin LTE</title>
	<!-- Library CSS -->
	<?php
		include "bundle_css.php";
	?>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?php
        include 'content_header.php';
       ?>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../aset/foto/admin.ico" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <div class="user-panel">
            <div class="pull-left image">
              <p></p>
            </div>
          </div><!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
              <li class="header"><h4><b><center>Menu Panel</center></b></h4></li>
			        <li class="active"><a href="artikel.php"><i class="fa fa-book"></i><span>Pengumuman</span></a></li>
			        
			        <li><a href="about.php"><i class="fa fa-info-circle"></i><span>Laporan</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Pengumuman
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"> Home</a></li>
            <li><i class="fa fa-book"></i> pengumuman</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">

                </div><!-- /.box-header -->
                <div class="box-body">
				<a href="#"><button class="btn btn-success" type="button" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus"></i> Add</button></a>
				<a href="#"><button class="btn btn-danger" type="button" id="dntrigger"><i class="fa fa-bell"></i> Push Notification</button></a>
                  <br></br>
				  <table id="data" class="table table-bordered table-striped table-scalable">
						<?php
							include "dt_artikel.php";
						?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
		
		<!-- Modal Popup Dosen -->
		<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Tambah Pengumuman</h4>
					</div>
					<div class="modal-body">
						<form action="artikel_add.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<label>Subjeck</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-book"></i>
										</div>
										<input name="subjek" type="text" class="form-control" placeholder="Subjeck"/>
									</div>
							</div>
							
							
							<div class="form-group">
								<label>To</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-book"></i>
										</div>
										<input type="text" class="form-control" readonly>
									</div>
							</div>
							<div class="form-group">
								<div class="checkbox">
									<label><input type="checkbox" id="select-all" onClick="toggle(this)" />Select All</label>
								</div>
								<?php
									$que = mysqli_query($konek, "SELECT * FROM user WHERE username != 'admin'");
									while ($loop = mysqli_fetch_array($que)) {
								?>
								<div class="checkbox-inline">
									<label><input type="checkbox" style:"{display: block; float: left; width: 25%;}" name="tujuan[]" value="<?php echo $loop['username']; ?>"><?php echo $loop['username']; ?></label>
								</div>
								<?php
									}
								?>
							</div>
							
							<div class="form-group" >
							 <label>Tanggal Kirim</label>
								<div id="datetimepicker" class="input-group date" data-format="dd/MM/yyyy hh:mm:ss">
										<input class="form-control" type="text" ng-model="form.tanggal" name="tgl_regis">
										<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								</div>
							</div>				
							
							<div class="form-group">
								<label>Isi</label>
									<div class="input-group">
										<textarea name="isi" rows="10" cols="90" class="form-control" placeholder="Isi Pesan"></textarea>
									</div>
							</div>
							
							<div class="modal-footer">
								<button class="btn btn-success" type="submit">
									Add
								</button>
								<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
									Cancel
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Modal Popup Dosen Edit -->
		<div id="ModalEditDosen" class="modal fade" tabindex="-1" role="dialog"></div>
		
		<!-- Modal Popup untuk delete--> 
		<div class="modal fade" id="modal_delete">
			<div class="modal-dialog">
				<div class="modal-content" style="margin-top:100px;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
					</div>    
					<div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
						<a href="#" class="btn btn-danger" id="delete_link">Delete</a>
						<button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
					</div>
				</div>
			</div>
		</div>
		
    </div><!-- /.content-wrapper -->
    <?php
		include	"content_footer.php";
	?>
    </div><!-- ./wrapper -->
	<!-- Library Scripts -->
	<?php
		include "bundle_script.php";
	?>
	<script type="text/javascript">
			$('#select-all').click(function(event) {   
				if(this.checked) {
						// Iterate each checkbox
						$(':checkbox').each(function() {
								this.checked = true;                        
						});
				}
				else {
					$(':checkbox').each(function() {
								this.checked = false;
						});
				}
			});
			$(function () {
			  $('#datetimepicker').datetimepicker({
				format: 'YYYY-MM-DD HH:mm:ss'
					  });
			});
		  </script>
			<script type="text/javascript">
				dntrigger.addEventListener('click', function(e){
					e.preventDefault();
					if(Notification.permission === 'granted'){
						$.get('webapiget.php', function(data){
							sqlData = JSON.parse(data);
							for(var i=0; i<sqlData.length;i++){
								var notify;
								notify = new Notification(sqlData[i].id,{
									'body': sqlData[i].value,
									'tag' : sqlData[i].id
								});
								notify.onclick = function(){
									alert(this.tag);
								}
							}
						});
					}else{
						alert('please allow the notification first');
					}
				});
			</script>
  </body>
</html>
