<?php

include "../koneksi.php";

$nomor	= $_GET["id"];

$query = mysqli_query($konek, "SELECT * FROM client WHERE userid = '".$nomor."'");
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
						<form action="client_edit.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<input name="id" type="hidden" value="<?php echo $r["userid"]; ?>"/>
							
							<div class="form-group">
								<label>Nama User/Client</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<input name="user" type="text" class="form-control" value="<?php echo $r["user"]; ?>"/>
									</div>
							</div>
							<div class="form-group">
								<label>Alamat IP</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-book"></i>
										</div>
										<input type="text" class="form-control" name="ip" value="<?php echo $r["ip"]; ?>">
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