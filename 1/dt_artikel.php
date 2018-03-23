				<thead>
					<tr>
						<th width="4%">No</th>
						<th width="20%">Subjeck</th>
						<th width = "30%"> Isi  </th>
						<th width="15%">Tanggal Upload</th>
						<th width="15%">Tanggal Kirim</th>
						<th width="11%">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$querydosen = mysqli_query ($konek, "SELECT * FROM pengumuman");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						$i=1;
						while ($ar = mysqli_fetch_array ($querydosen)){
							
							echo "
								<tr>
									<td align=center>".$i."</td>
									<td>".$ar['perihal']."</td>
									<td>".$ar['isi']."</td>
									<td>".$ar['tgl_upload']."</td>
									<td>".$ar['tgl_kirim']."</td>
									<td align=center>
									<a href='#' class='open_modal' id='$ar[nomor]'>Edit</a> |
									<a href='#' onClick='confirm_delete(\"artikel_delete.php?nomor=$ar[nomor]\")'>Delete</a>
									</td>
								</tr>";
						$i++;		
						}
					?>
				</tbody>