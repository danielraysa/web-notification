				<thead>
					<tr>
						<th width="4%">No</th>
						<th width="30%">Subjeck</th>
						<th width="20%">Penerima</th>
						<th width="20%">Respons</th>
						<th width="15%">Tanggal Respons</th>
						<th width="11%">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$querydosen = mysqli_query ($konek, "SELECT * FROM pesan p JOIN user u ON p.userid = u.iduser");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						$i=1;
						while ($ar = mysqli_fetch_array ($querydosen)){
							
							echo "
								<tr>
									<td align=center>".$i."</td>
									<td>".$ar['perihal']."</td>
									<td>".$ar['username']."</td>
									<td>".$ar['agreement']."</td>
									<td>".$ar['tanggal']."</td>
									<td align=center>
									<a href='#' class='open_modal' id='$ar[nomor]'>Edit</a> |
									<a href='#' onClick='confirm_delete(\"artikel_delete.php?nomor=$ar[nomor]\")'>Delete</a>
									</td>
								</tr>";
						$i++;		
						}
					?>
				</tbody>