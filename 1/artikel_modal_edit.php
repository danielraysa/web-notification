<?php

include "../koneksi.php";

$nomor	= $_GET["id"];

$query = mysqli_query($konek, "SELECT * FROM pengumuman WHERE nomor='".$nomor."'");
if($query == false){
	die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
while($r = mysqli_fetch_array($query)){

?>
	
<!-- Modal Popup Dosen -->
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Edit Pengumuman</h4>
					</div>
					<div class="modal-body">
						<form action="artikel_edit.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<input name="id" type="hidden" value="<?php echo $r["nomor"]; ?>"/>
							<div class="form-group">
								<label>Subjeck</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-book"></i>
										</div>
										<input name="subjek" type="text" class="form-control" placeholder="Subjeck" value="<?php echo $r["perihal"]; ?>"/>
									</div>
							</div>
							
							<div class="form-group">
								<label>To</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-book"></i>
										</div>
										<input name="to" type="text" class="form-control" placeholder="To"/>
									</div>
							</div>
							
							<div class="form-group" >
							 <label>Tanggal Kirim</label>
								<div id="datetimepicker1" class="input-group date" >
										<input class="form-control" type="text" name="tgl_regis" value="<?php echo $r["tgl_kirim"]; ?>">
										<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								</div>
							</div>
							<script>
								$('#datetimepicker1').datetimepicker({
								format: 'YYYY-MM-DD HH:mm:ss'
									});
							</script>
							<div class="form-group">
								<label>Isi</label>
									<div class="input-group">
										<textarea name="isi" rows="10" cols="90" class="form-control" placeholder="Isi Pesan"><?php echo $r["isi"]; ?></textarea>
									</div>
							</div>

							<div class="modal-footer">
								<button class="btn btn-success" type="submit">
									Save
								</button>
								<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
									Cancel
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
					
<?php
			}
?>