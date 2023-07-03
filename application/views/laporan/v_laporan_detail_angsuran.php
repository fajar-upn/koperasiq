<div class="content-wrapper">
    <div class="container" style="padding-top:20px">
        <div class="card p-2">
            <div class="row mb-2">
                <div class="col text-center">
                    <h2 class="text-dark"><strong>Daftar Angsuran</strong></h2>
                    <h4 class="text-dark"><b><?= $anggota['nama'] ?></b></h4>
                </div>
            </div>
            <hr class="m-0 mb-2">

            <div class="row mt-2">
                <div class="col">
                    <div class="row mt-2">
                        <div class="col-1">
                            <a role="button" href="<?= base_url('admin/tampil_angsuran'); ?>" class="btn btn-primary">Kembali</a>
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
                                <table id="example1" class="table table-bordered table-striped" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="table-primary">
                                            <th width="10%">Bukti Transaksi</th>
                                            <th width="">Tanggal Pinjam</th>
                                            <th width="">Pinjaman</th>
                                            <th width="">Tanggal Angsuran</th>
                                            <th width="">Angsuran</th>
                                            <th width="">Periode Angsuran</th>
                                            <th width="">Jasa</th>
                                            <th width="">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($angsuran as $da) : ?>
                                            <tr>
                                                <td><?= $da['bukti_transaksi'] ?></td>
                                                <td><?= $da['tanggal_pinjam'] ?></td>
                                                <td><?= rupiah2($da['nominal_pinjaman']) ?></td>
                                                <td><?= $da['tanggal_angsuran'] ?></td>
                                                <td><?= rupiah2($da['nominal_angsuran']) ?></td>
                                                <td><?= $da['periode_angsuran'] ?></td>
                                                <td><?= $da['jasa'] ?></td>
                                                <td><?= $da['keterangan'] ?></td>
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