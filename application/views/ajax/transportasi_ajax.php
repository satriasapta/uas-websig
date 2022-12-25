<div class="uk-overflow-auto">
	<table class="uk-table uk-table-justify uk-table-divider">
		<thead>
			<tr>
                    <th>NO</th>
					<th>PROVINSI</th>
					<th>LOKASI</th>
					<th>KETERANGAN</th>
					<th>LATITUDE</th>
					<th>LONGITUDE</th>
					<th>KATEGORI</th>
					
					<th>AKSI</th>
			</tr>
		</thead>
		<tbody>
        <?php if( ! empty($transportasi)) {
            ?>
            <?php 
            $no=1;
			foreach($transportasi as $r){ 
				
			?>
				
				<tr>
					<td width="40px"><?=$no?></td>
					<td><?=$r->provinsiTransportasi?></td>
					<td><?=$r->lokasiTransportasi?></td>
					<td><?=$r->keteranganTransportasi?></td>
					<td><?=$r->latitudeTransportasi?></td>
					<td><?=$r->longitudeTransportasi?></td>
					<td><?=$r->kategoriTransportasi?></td>
					<td>
                    <a href="#" class="uk-icon-link uk-margin-small-right" id="formedit" uk-icon="file-edit"
                    data-id="<?=$r->idTransportasi?>"
                    data-kecamatan="<?=$r->provinsiTransportasi?>"
                    data-lokasi="<?=$r->lokasiTransportasi?>"
                    data-latitude="<?=$r->latitudeTransportasi?>"
                    data-longitude="<?=$r->longitudeTransportasi?>"
                    data-keterangan="<?=$r->keteranganTransportasi?>"
                    data-kategori="<?=$r->kategoriTransportasi?>"
					
					></a>
					<a href="#" class="uk-icon-link" uk-icon="trash" id="hapusdata" 
					data-id="<?=$r->idTransportasi?>"
                    data-kecamatan="<?=$r->provinsiTransportasi?>"></a>
				
					</td>
				</tr>
			<?php $no++; } 
            }else{
            ?>
            <tr><td colspan="9" class="no-records">No records</td></tr>
            <?php } ?>
		</tbody>
	</table>
    
	</div>
    <ul class="uk-pagination" uk-margin-small-right>
    <?php echo $pagelinks?>
    </ul>
    
    
