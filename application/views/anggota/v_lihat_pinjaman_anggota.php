<div class="content-wrapper">
  <div class="container" style="padding-top:20px">
    <div class="card p-2">
      <div class="row mb-2">
        <div class="col text-center">
          <h2 class="text-dark"><strong>Daftar Pinjaman</strong></h2>
          <h4 class="text-dark"><b><?= $user ?></b></h4>
          <h5 class="text-dark">Posisi per <b> 31 Desember <?= $tahun ?></b></h5>
        </div>
      </div>
      <hr class="m-0 mb-2">

      <div class="row mt-2">
        <div class="col">
          <div class="row mt-2">
            <div class="col-1">
              <a role="button" href="<?= base_url('anggota/tampil_pinjaman'); ?>" class="btn btn-primary">Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-2 ">

      <div class="col">
        <div class="card p-2">
          <div class="row">
            <div class="col">
              <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr class="table-primary">
                      <th width="10%">Bukti Transaksi</th>
                      <th width="">Tanggal Pinjam</th>
                      <th width="">Total Pinjaman</th>
                      <th width="">Lama Angsuran</th>
                      <th width="">Status Pinjaman</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($anggota as $da) : ?>
                      <tr>
                        <td><?= $da['bukti_transaksi_p'] ?></td>
                        <td><?= $da['tanggal_pinjam'] ?></td>
                        <td><?= rupiah2($da['nominal']) ?></td>
                        <td><?= $da['lama_angsur'] ?></td>
                        <td><?= $da['status_pinjam'] ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>