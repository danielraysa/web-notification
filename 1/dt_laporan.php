				<thead>
					<tr>
						<th width="4%">No</th>
						<th width="10%">Subjeck</th>
						
						<th width="10%">Setuju</th>
						<th width="10%">Tidak Setuju</th>
						<th width="10%">Belum Respon</th>
						
					</tr>
				</thead>
				<tbody>
					<?php
						$querydosen = mysqli_query ($konek, "select p1.perihal, p1.isi,
						sum(case p.agreement when 'Ya' then 1 else 0 end) as S, 
						sum(case p.agreement when 'Tidak' then 1 else 0 end) as TS,
						sum(case when p.agreement IS NULL then 1 else 0 end) as notrespond 
						from pesan p join pengumuman p1 on p.nomor = p1.nomor group by p.nomor");
						if($querydosen == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
						$i=1;
						while ($ar = mysqli_fetch_array ($querydosen)){
							
							echo "
								<tr>
									<td align=center>".$i."</td>
									<td>".$ar['perihal']."</td>
						
									<td>".$ar['S']."</td>
									<td>".$ar['TS']."</td>
									<td>".$ar['notrespond']."</td>
									
								</tr>";
						$i++;		
						}
					?>
				</tbody>