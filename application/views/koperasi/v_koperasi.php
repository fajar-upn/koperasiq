<div class="content-wrapper">
	<div class="container-fluid" style="padding: 20px 30px 30px 30px">
			
		<!-- Page Heading -->
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
		</div>
		<div class="row">
			<div class="info-box">
				<div class="col-xl-12">
					<div class="info-box-content">
						<span class="info-box-icon bg-info p-2" style="width: 100%">
							<div class="row justify-content-center">
								<div class="col-auto align-self-center">
									<i class="far fa-envelope fa"></i>
								</div>
								<div class="col-auto align-self-center">
									<h3 class="card-title mb-0">Kas Koperasi</h3>
								</div>
								<div class="col-auto align-self-center">
									<h3 class="card-title mb-0"><b><?= rupiah2($simpanan['simpanan']) ?></b></h3>
								</div>
							</div>
						</span>
					</div>
				</div>
			</div>
		</div>

		<!-- Content Row -->
		<div class="row">
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card card-primary" style="border-radius: 15px 15px 10px 10px">
					<div class="card-header" style="border-radius: 15px 15px 0px 0px; background-color: #032d53">
						<div class="row justify-content-center">
							<h3 class="card-title mb-0  align-self-center">Anggota Aktif</h3>
						</div>
					</div>
					<div class="card-body" style="border-radius: 15px 15px 10px 10px">
						<div class="row justify-content-center">
							<div class="col-auto align-self-center">
								<i class="fas fa-user fa-2x"></i>
							</div>
							<div class="col-auto align-self-center">
								<h3 class="card-title mb-0"><b><?= $anggota_a?> Anggota</b></h3>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card card-primary" style="border-radius: 15px 15px 10px 10px">
					<div class="card-header" style="border-radius: 15px 15px 0px 0px; background-color: #032d53">
						<div class="row justify-content-center">
							<h3 class="card-title mb-0">Anggota Tidak Aktif</h3>
						</div>
					</div>
					<div class="card-body" style="border-radius: 15px 15px 10px 10px">
						<div class="row justify-content-center">
							<div class="col-auto align-self-center">
								<i class="fas fa-times fa-2x"></i>
							</div>
							<div class="col-auto align-self-center">
								<h3 class="card-title mb-0"><b><?= $anggota_t ?> Anggota</b></h3>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card card-primary" style="border-radius: 15px 15px 10px 10px">
					<div class="card-header" style="border-radius: 15px 15px 0px 0px; background-color: #032d53">
						<div class="row justify-content-center">
							<h3 class="card-title mb-0">Total Simpanan</h3>
						</div>
					</div>
					<div class="card-body" style="border-radius: 15px 15px 10px 10px">
						<div class="row justify-content-center">
							<div class="col-auto align-self-center">
								<i class="fas fa-upload fa-2x"></i>
							</div>
							<div class="col-auto align-self-center">
								<h3 class="card-title mb-0"><b><?= rupiah2($simpanan['simpanan']) ?></b></h3>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card card-primary" style="border-radius: 15px 15px 10px 10px">
					<div class="card-header" style="border-radius: 15px 15px 0px 0px; background-color: #032d53">
						<div class="row justify-content-center">
							<h3 class="card-title mb-0">Total Pinjaman</h3>
						</div>
					</div>
					<div class="card-body" style="border-radius: 15px 15px 10px 10px">
						<div class="row justify-content-center">
							<div class="col-auto align-self-center">
								<i class="fas fa-upload fa-2x"></i>
							</div>
							<div class="col-auto align-self-center">
								<h3 class="card-title mb-0"><b><?= rupiah2($pinjaman['pinjaman']) ?></b></h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
