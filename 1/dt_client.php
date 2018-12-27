				<thead>
					<tr>
						<th width="4%">No</th>
						<th width="20%">User</th>
						<th width="15%">IP</th>
						<th width="15%">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$querydosen = mysqli_query ($konek, "SELECT * FROM client");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						$i=1;
						while ($ar = mysqli_fetch_array ($querydosen)){
							
							echo "
								<tr>
									<td align=center>".$i."</td>
									<td>".$ar['user']."</td>
									<td>".$ar['ip']."</td>
									<td align=center>
									<a href='#' class='open_modal' id='$ar[userid]'>Edit</a> |
									<a href='#' onClick='confirm_delete(\"client_delete.php?nomor=$ar[userid]\")'>Delete</a>
									</td>
								</tr>";
						$i++;		
						}
					?>
				</tbody>