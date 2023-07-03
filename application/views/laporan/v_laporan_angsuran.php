<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="h3 mb-0 text-gray-800">Daftar Angsuran Anggota</h1>
        </div>
      </div>
      <div class="row">
        <?php if ($this->session->flashdata('pesan_sukses')) { ?>
          <div class="col-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              Data Anggota<strong> Berhasil </strong> <?= $this->session->flashdata('pesan_sukses'); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        <?php } else if ($this->session->flashdata('pesan_gagal')) { ?>
          <div class="col-6">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              Data Anggota<strong> Gagal: </strong> <?= $this->session->flashdata('pesan_gagal'); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        <?php } else if ($this->session->flashdata('pesan_warning')) { ?>
          <div class="col-6">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              Data Anggota<strong> Perhatian: </strong> <?= $this->session->flashdata('pesan_warning'); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        <?php } ?>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="row mt-2">
                <div class="col">
                  <div class="row mt-2">
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr class="table-primary">
                    <th width="5%">No</th>
                    <th width="">ID Anggota</th>
                    <th width="">Nama</th>
                    <th width="">Alamat</th>
                    <th width="">Status</th>
                    <th width="5%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($anggota as $da) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $da['id_anggota'] ?></td>
                      <td><?= $da['nama'] ?></td>
                      <td><?= $da['alamat'] ?></td>
                      <td><?= $da['status'] ?></td>
                      <td class="d-flex align-items-center">
                        <a href="<?= base_url(); ?>admin/detail_angsuran_anggota/<?= $da['id_anggota']; ?>" class="btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>