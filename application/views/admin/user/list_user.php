<!DOCTYPE html>
<html lang="en">

<head>

	<?php $this->load->view("admin/_partials/head.php") ?>

</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>

	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<!-- Notifikasi data berhasil di simpan -->
				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-primary" role="alert">
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/user/add'); ?>">
							<i class="fas fa-plus"></i> Tambah
						</a>
					</div>

					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<td>No.</td>
										<td>Nama</td>
										<td>Alamat</td>
										<td>No. Telp</td>
										<td>Rayon</td>
										<td>Golongan</td>
										<td>Tarif/Kwh</td>
										<td>Daya</td>
										<td>Foto Rumah</td>										
										<td>Aksi</td>
									</tr>
								</thead>
								<tbody>
									<?php 
										$no=1;
										foreach($users as $user): 
									?>
									<tr>
										<td>
											<?php echo $no; ?>
										</td>
										<td>
											<?php echo $user->nama; ?>
										</td>
										<td>
											<?php echo $user->alamat; ?>
										</td>
										<td>
											<?php echo $user->no_telp; ?>
										</td>
										<td>
											<?php echo $user->rayon; ?>										
										</td>
										<td>
											<?php echo $user->golongan; ?>										
										</td>
										<td>
											<?php echo $user->tarif; ?>										
										</td>
										<td>
											<?php echo $user->daya; ?>										
										</td>
										<td>
											<?php // echo $user->foto; ?>
											<img src="<?php echo base_url('upload/user/'.$user->foto); ?>" width="64">
										</td>
										<td width="300">
											<a href="<?php echo site_url('admin/user/detail/'.$user->id_user); ?>" class="btn btn-info <?php echo $user->level === "1" ? "disabled" : null ?>" >
													<i class="fas fa-eye"></i> Detail
											</a>

											<a href="<?php echo site_url('admin/user/edit/'.$user->id_user); ?>" class="btn btn-primary <?php echo $user->level === "1" ? "disabled" : null ?>">
												<i class="fas fa-edit"></i> Edit
											</a>

											<a onclick="deleteConfirm('<?php echo site_url('admin/user/delete/'.$user->id_user); ?>')"
											href="#!" class="btn btn-small btn-danger <?php echo $user->level === "1" ? "disabled" : null ?>">
												<i class="fas fa-trash"></i> Hapus
											</a>
										</td>
									</tr>
									<?php
										$no++;
										endforeach;
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("admin/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->

	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>
	<?php $this->load->view("admin/_partials/js.php") ?>

	<script>
	function deleteConfirm(url) {
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
	</script>
</body>

</html>