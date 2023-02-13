<?php 
$bobot1 = 0;
$bobot2 = 0;
$bobot3 = 0;
?>
<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">SAW</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html" class="text-muted">Dashboard</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">SAW</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
					 <div class="col-5 align-self-center">
					
                        <div class="customize-input float-right">
                    <button class="btn waves-effect waves-light btn-rounded btn-success text-center" data-toggle="modal" data-target="#ModalaAdd">Tambah Data</button>
				</div>
				</div>
                </div>
            </div>
			
			<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
					<h4 class="card-title">Bobot SAW</h4>
				 <?php
            echo form_open_multipart('saw/edit', 'role="form" class="form-horizontal"');
            ?>
				<?php foreach ($rule as $r) { ?>
				<?php 
				$bobot1 += $r->bobot1;
				$bobot2 += $r->bobot2;
				$bobot3 += $r->bobot3;
				?>
				<div class="row">
				<input type="number" name="id" value="<?php echo $r->id_bobot ?>" class="form-control" hidden>
				 <div class="col-3">
					<div class="form-group">
                        <label class="control-label col-xs-3" >Bobot Nilai 1</label>
                        <div class="col-xs-9">
                           <input type="number" name="bobot1" value="<?php echo $r->bobot1 ?>" class="form-control">
                        </div>
                    </div>
				</div>
				<div class="col-3">
					<div class="form-group">
                        <label class="control-label col-xs-3" >Bobot Nilai 2</label>
                        <div class="col-xs-9">
                           <input type="number" name="bobot2" value="<?php echo $r->bobot2 ?>" class="form-control">
                        </div>
                    </div>
				</div>
				<div class="col-3">
					<div class="form-group">
                        <label class="control-label col-xs-3" >Bobot Nilai 3</label>
                        <div class="col-xs-9">
                           <input type="number" name="bobot3" value="<?php echo $r->bobot3 ?>" class="form-control">
                        </div>
                    </div>
				</div>
				<?php } ?>
				<div class="col-3">
					<div class="form-group">
						</br>
                        <button type="submit" name="submit" class="btn btn-danger text-center" style="margin-top:7px; width:100%;">Submit</button>
                    </div>
				</div>
				</div>
			</form>
		</div>
		</div>
		</div>
</div>

           <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
					<h4 class="card-title">Nilai Normalisasi SAW</h4>
					<?php echo hitungdata('saw'); ?>
			<div class="table-responsive">
            <table id="datatable" class="table">
                <thead>
                    <tr>
                        <th>No</th>
						<th>Nilai 1</th>
						<th>Normalisasi Nilai 1 </th>
						<th>Nilai 2</th>
						<th>Normalisasi Nilai 2 </th>
						<th>Nilai 3</th>
						<th>Normalisasi Nilai 3 </th>
						<th>Hasil</th>
					</tr>
                </thead>
		<tbody>		
		<?php 
		$no = 1;
		
		foreach($data as $u){ //untuk menampilkan variabel data yang diangkut dari controller
		$normal1 = 0; // Untuk menampung hasil perhitungan
		$normal2 = 0;
		$normal3 = 0;
		?>
		<?php
		$maxtb1 = $this->db->select_max('nilai1','nilmax1')->from('saw')->get()->row()->nilmax1;
		$maxtb2 = $this->db->select_max('nilai2','nilmax2')->from('saw')->get()->row()->nilmax2;
		$maxtb3 = $this->db->select_max('nilai3','nilmax3')->from('saw')->get()->row()->nilmax3;
		$normal1 = round($u->nilai1 / $maxtb1, 2);
		$normal2 = round($u->nilai2 / $maxtb2, 2);
		$normal3 = round($u->nilai3 / $maxtb3, 2);
		?>
		<tr>  
			<td><?php echo $no++ ?></td>
			<td><?php echo $u->nilai1 ?></td>
			<td><?php echo $normal1 ?></td>
			<td><?php echo $u->nilai2 ?></td>
			<td><?php echo $normal2 ?></td>
			<td><?php echo $u->nilai3 ?></td>
			<td><?php echo $normal3 ?></td>
			<td><?php echo (($normal1 * ($bobot1/100)) + ($normal2 * ($bobot2/100)) + ($normal3 * ($bobot3/100))) ?></td>
		</tr>
		<?php } ?>
		</tbody>
            </table>
        </div>
		</div>
		</div>
		</div>
</div>
</div>             
           
<!-- MODAL ADD -->
        <div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">TAMBAH DATA</h3>
            </div>
            <?php
            echo form_open_multipart('saw/add', 'role="form" class="form-horizontal"');
            ?>
                <div class="modal-body">
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nilai 1</label>
                        <div class="col-xs-9">
                           <input type="text" name="nilai1" class="form-control">
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3" >Nilai 2</label>
                        <div class="col-xs-9">
                           <input type="text" name="nilai2" class="form-control">
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3" >Nilai 3</label>
                        <div class="col-xs-9">
                           <input type="text" name="nilai3" class="form-control">
                        </div>
                    </div>
                    
 
                </div>
 
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_simpan">Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL ADD-->
