<?php

session_start();
include "../koneksi.php";
include "../1/auth_user.php";
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
		include "../1/bundle_css.php";
	?>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?php
        include '../1/content_header.php';
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
		<!-- Modal Popup Dosen -->
		<!-- Modal Popup Dosen Edit -->
		<!-- Modal Popup untuk delete--> 
		
		
    </div><!-- /.content-wrapper -->
    <?php
		include	"../1/content_footer.php";
	?>
    </div><!-- ./wrapper -->
	<!-- Library Scripts -->
	<?php
		include "../1/bundle_script.php";
	?>
	<script type="text/javascript">
			$(function () {
			  $('#datetimepicker').datetimepicker({
				format: 'YYYY-MM-DD HH:mm:ss'
					  });
			});
		  </script>
			<script type="text/javascript">
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
								if (window.confirm(this.tag + ':\n' + this.body)) {
                  $.ajax({
                    url: "message.php?perihal="+this.tag,
                    type: "GET",
                    dataType: "html",
                    success: function() {
                      alert("Confirmed!");
                    }
                  })
                }
                else {
                  $.ajax({
                    url: "message-no.php?perihal="+this.tag,
                    type: "GET",
                    dataType: "html",
                    success: function() {
                      alert("Declined!");
                    }
                  })
                }
							}
						}
					});
				}else{
					alert('Please allow the notification first!');
				}
			</script>
  </body>
</html>