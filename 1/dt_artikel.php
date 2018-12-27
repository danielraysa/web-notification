				<thead>
					<tr>
						<th width="4%">No</th>
						<th width="10%">Subjeck</th>
						<th width="10%">Penerima</th>
						<th width="25%">Isi</th>
						<th width="10%">Status</th>
						<th width="10%">Tanggal Upload</th>
						<th width="10%">Tanggal Kirim</th>
						<th width="14%">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$querydosen = mysqli_query ($konek, "SELECT nomor, perihal, isi, tgl_kirim, tgl_upload, NOW() as skrg FROM pengumuman ORDER BY nomor");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						$i=1;
						$status = "Belum terkirim";
						while ($ar = mysqli_fetch_array ($querydosen)){
							?>
							<tr>
								<td align=center><?php echo $i; ?></td>
								<td><?php echo $ar['perihal']; ?></td>
								<td>
								<?php
								$amd = mysqli_query ($konek, "SELECT c.user FROM client c JOIN pesan p ON c.userid = p.userid JOIN pengumuman p1 ON p.nomor = p1.nomor WHERE p.nomor = ".$ar['nomor']."");
								while ($amds = mysqli_fetch_array($amd)) {
									echo "| ".$amds['user']." ";
								}
								echo " | ";
								?>
								</td>
								<td><?php echo $ar['isi']; ?></td>
								<td><?php if ($ar['tgl_kirim'] <= $ar['skrg']) {
									$status = "Sudah terkirim";
									echo "Sudah terkirim";
								}
								else {
									echo "Belum terkirim";
								}
								?></td>
								<td><?php echo $ar['tgl_upload']; ?></td>
								<td><?php echo $ar['tgl_kirim']; ?></td>
								<td align=center>
								<?php
								if ($ar['tgl_kirim'] >= $ar['skrg']) {
								?>
								<a href="#" class="open_modal btn btn-primary" id="<?php echo $ar['nomor']; ?>">Edit</a> |
								<?php echo "
								<a href='#' class='btn btn-danger' onClick='confirm_delete(\"artikel_delete.php?nomor=$ar[nomor]\")'>Delete</a>"; ?>
								</td>
								<?php
								}
								else {
								?>
								<a href="#" class="btn btn-primary" disabled>Edit</a> |
								<?php echo "
								<a href='#' class='btn btn-danger' disabled>Delete</a>"; ?>
								<?php
								}
								?>
							</tr>
							<?php
						$i++;		
						}
					?>
				</tbody>