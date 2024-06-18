<?= $this->extend('layout/template') ?>

<?= $this->section('main'); ?>
<div class="container-fluid px-2 px-md-4">
    <div class="card card-body mx-3 mx-md-4 rounded-1 border-0 shadow-0 mt-4">
        <div class="row gx-4 mb-2">
            <div class="col-auto px-4">
                <div class="avatar rounded-2 position-relative" <?= bg_warning ?>>
                    <!-- <i class="fas fa-folder-plus text-white fs-4  "></i> -->
                    <i class="fas fa-flag text-white fs-4"></i>
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        Laporan / Penjualan
                    </h5>
                    <p class="mb-0 font-weight-normal text-sm">
                        Point Of Sale Management
                    </p>
                </div>
            </div>
        </div>
        <div class="table-responsive p-0">
            <table class="table align-items-center justify-content-center mb-0" id="dataTable">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-8 ps-2">
                            Invoice
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-8">
                            Tanggal
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-8 ps-2">
                            Customer
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-8 ps-2">
                            Total
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-8 ps-2">
                            Diskon
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-8 ps-2">
                            Grand Total
                        </th>
                        <th class="text-uppercase text-center text-warning font-weight-bold opacity-8 ps-2"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_penjualan as $penjualan) : ?>
                        <tr>
                            <td>
                                <p class="mb-0 text-sm"><?= $penjualan['invoice'] ?></p>
                            </td>
                            <td>
                                <p class="mb-0 text-sm"><?= indo_date($penjualan['tanggal']) ?></p>
                            </td>
                            <td>
                                <p class="mb-0 text-sm"><?= ($penjualan['id_customer'] == 0 ? 'Umum' : $penjualan['nama_customer']) ?></p>
                            </td>
                            <td>
                                <p class="mb-0 text-sm text-end">Rp<?= number_format($penjualan['total_harga'], 0, ',', '.') ?></p>
                            </td>
                            <td>
                                <p class="mb-0 text-sm text-center"><?= $penjualan['diskon'] ?></p>
                            </td>
                            <td>
                                <p class="mb-0 text-sm text-end">Rp<?= number_format($penjualan['harga_bayar'], 0, ',', '.') ?></p>
                            </td>
                            <td class="align-middle text-center">
                                <a href="/penjualan/cetak/<?= $penjualan['id_penjualan'] ?>" target="_blank" class="text-xs">
                                    <i class="fas fa-print mx-1"></i> Print
                                </a>
                                <a href="" class="text-xs" <?= text_success ?> data-bs-toggle="modal" data-bs-target="#modalDetail<?= $penjualan['id_penjualan'] ?>">
                                    <i class="fas fa-eye mx-1"></i> Detail
                                </a>
                                <a href="/stokmasuk/delete/" class="text-xs" <?= text_danger ?>>
                                    <i class="fas fa-trash mx-1"></i> Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<?= $this->endSection(); ?>