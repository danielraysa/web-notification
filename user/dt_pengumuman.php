				<thead>
					<tr>
						<th width="4%">No</th>
						<th width="20%">Subjeck</th>
						<th width = "30%"> Isi  </th>
						<th width="15%">Tanggal Kirim</th>
						<th width="11%">Respons</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$sql = mysqli_query ($konek, "SELECT p2.nomor, p1.perihal, p1.isi, p1.tgl_kirim FROM pengumuman p1 JOIN pesan p2 ON p1.nomor = p2.nomor WHERE DATE(p1.tgl_kirim) = CURDATE() AND p2.agreement IS NULL AND p1.kepada = '".$_SESSION['Username']."'");
						if($sql == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						$i=1;
						while ($ar = mysqli_fetch_array ($sql)){
							
							echo "
								<tr>
									<td align=center>".$i."</td>
									<td>".$ar['perihal']."</td>
									<td>".$ar['isi']."</td>
									<td>".$ar['tgl_kirim']."</td>
									<td align=center>
									<a href='#' onClick='confirm_delete(\"message.php?respons=yes&nomor=$ar[nomor]\")'>Ya</a> |
									<a href='#' onClick='confirm_delete(\"message.php?respons=no&nomor=$ar[nomor]\")'>Tidak</a>
									</td>
								</tr>";
						$i++;		
						}
					?>
				</tbody>