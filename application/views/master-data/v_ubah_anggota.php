<div class="content-wrapper">
  <div class="container">
    <div class="row" style="padding-top: 20px">
      <div class="col-lg-12">

        <div class="card p-2  shadow-sm">
          <h3 class="text-center">Ubah Data Anggota</h3>
          <hr>
          <?php if ($this->session->flashdata('pesan_gagal')) { ?>
            <div class="col-md-12 text-center">
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal: </strong><?= $this->session->flashdata('pesan_gagal'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            </div>
          <?php } else if ($this->session->flashdata('pesan_peringatan')) { ?>
            <div class="col-md-12 text-center">
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Peringatan: </strong><?= $this->session->flashdata('pesan_peringatan'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            </div>
          <?php } ?>
          <form action="<?= base_url() . '/admin/ubahAnggotaProses/' . $anggota['id_anggota']; ?>" method="post" name="form_ubahanggota" enctype="multipart/form-data">
            <div class="form-row">
              <div class="form-group col-lg-12">
                <h5>ID Anggota</h5>
                <input type="text" class="form-control" name="id_anggota" value="<?= $anggota['id_anggota']; ?>" readonly>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-lg-12">
                <h5>Nama Anggota</h5>
                <input type="text" class="form-control" name="nama" value="<?= $anggota['nama']; ?>" maxlength="50" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-lg-12">
                <h5>Alamat</h5>
                <textarea class="form-control" name="alamat" maxlength="150" rows="5" required><?= $anggota['alamat']; ?></textarea>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-lg-12">
                <h5>Upload Foto</h5>
                <!-- <input type="file" name="userfile" class="form-control" size="20" required> -->
                <div class="custom-file mb-3 col-md-4">
                  <input type="file" name='foto' class="form-control custom-file-input" value="<?= ($anggota['foto'] != "") ? $anggota['foto'] : "" ?>" size=20 id="foto">
                  <label class="custom-file-label"><?= ($anggota['foto'] != "") ? $anggota['foto'] : "Choose file..." ?></label>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-lg-12">
                <h5>Email</h5>
                <input type="text" class="form-control" name="email" value="<?= $anggota['email']; ?>" maxlength="100" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-lg-12">
                <h5>role</h5>
                <input type="text" class="form-control" value="<?= $anggota['role']; ?>" name="role" maxlength="10" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-lg-12">
                <h5>Status Anggota</h5>
                <select class="form-control" name="status" required>
                  <option selected><?= $anggota['status']; ?></option>
                  <option value="Aktif">Aktif</option>
                  <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
              </div>
            </div>
            <div class="text-center">
              <button type="submit" name="tambah" class="btn btn-success" style="width: 200px;">Input</button>
            </div>
            <div class="text-center mt-2">
              <a class="btn btn-primary" href="<?= base_url('admin/data_anggota'); ?>">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>