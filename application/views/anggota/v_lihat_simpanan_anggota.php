<div class="content-wrapper">
<div class="container" style="padding-top:20px">
  <div class="card p-2">
    <div class="row mb-2">
      <div class="col text-center">
         <h2 class="text-dark"><strong>Daftar Simpanan</strong></h2>
         <h4 class="text-dark"><b><?= $anggota[0]['nama'] ?></b></h4>
         <h5 class="text-dark">Posisi per <b> 31 Desember <?= $tahun ?></b></h5>
      </div>     
    </div>
    <hr class="m-0 mb-2">

    <div class="row mt-2">
        <div class="col">
          <div class="row mt-2">
            <div class="col-1">
               <a role="button" href="<?= base_url('anggota/tampil_simpanan');?>" class="btn btn-primary">Kembali</a>
            </div>
            <div class="col-2">
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
                          <th width="">Total Simpanan Pokok</th>
                          <th width="">Total Simpanan Wajib</th>
                          <th width="">Total Simpanan Sukarela</th>
                          <th width="">Total Tabungan Lebaran</th>
                          <th width="">Total Simpanan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($anggota as $da ) : ?>
                        <tr>
                          <td><b><?= rupiah($da['simpanan_pokok']) ?></b></td>
                          <td><b><?= rupiah($da['simpanan_wajib']) ?></b></td>
                          <td><b><?= rupiah($da['simpanan_sukarela']) ?></b></td>
                          <td><b><?= rupiah($da['simpanan_lebaran']) ?></b></td>
                          <td><b><?= rupiah($da['simpanan_pokok']+$da['simpanan_wajib']+$da['simpanan_sukarela']+$da['simpanan_lebaran']) ?></b></td>
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

        <div class="row mt-2 ">

          <div class="col">
          <div class="card p-2">
            <div class="row">
              <div class="col">
                  <div class="table-responsive">
                   <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                      <thead>
                        <tr class="table-primary">
                          <th width="">Bukti Transaksi</th>
                          <th width="">Saldo</th>
                          <th width="">Jenis Simpanan</th>
                          <th width="">Tanggal</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($anggota1 as $da ) : ?>
                        <tr>
                          <td><?= $da['bukti_transaksi_s'] ?></td>
                          <td><?= rupiah($da['saldo']) ?></td>
                          <td><?= $da['jenis_simpanan'] ?></td>
                          <td><?= $da['tanggal'] ?></td>
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
