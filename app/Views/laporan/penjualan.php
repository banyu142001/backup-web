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
                                <p class="mb-0 text-sm">Rp<?= number_format($penjualan['total_harga'], 0, ',', '.') ?></p>
                            </td>
                            <td>
                                <p class="mb-0 text-sm text-center"><?= $penjualan['diskon'] ?></p>
                            </td>
                            <td>
                                <p class="mb-0 text-sm">Rp<?= number_format($penjualan['harga_bayar'], 0, ',', '.') ?></p>
                            </td>
                            <td class="align-middle text-center p-1" style="font-size:10px;">
                                <div class="btn-toolbar my-0" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="btn-group my-0" role="group" aria-label="First group">

                                        <a href="/penjualan/cetak/<?= $penjualan['id_penjualan'] ?>" class="btn btn-sm p-0 px-2  rounded-1 mx-1 cursor-pointer my-0 border hover " <?= text_info ?> target="_blank">
                                            <div class="fas fa-print"></div>
                                        </a>

                                        <a id="update_cart" class="btn btn-sm p-0 px-2  rounded-1 mx-1 cursor-pointer my-0 border hover " <?= text_success ?> data-bs-toggle="modal" data-bs-target="#detail<?= $penjualan['id_penjualan'] ?>">
                                            <div class="far fa-edit"></div>
                                        </a>

                                        <a id="del_cart" class="btn btn-sm  p-0 px-2 rounded-1 cursor-pointer my-0 border" class=" text-xs " <?= text_danger ?>>
                                            <div class=" fas fa-trash"></div>
                                        </a>
                                    </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal detail laporan penjualan -->
<?php foreach ($data_penjualan as $penjualan) : ?>

    <div class="modal fade" id="detail<?= $penjualan['id_penjualan'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-lg border-0 shadow-none position-relative ">
            <div class="modal-content rounded-1 shadow-none border-0">
                <div class="modal-header p-0 py-1 px-3">
                    <p class="modal-title fw-bolder mt-2">Detail Laporan Penjualan</p>
                    <span data-bs-dismiss="modal" aria-label="Close" class="cursor-pointer position-absolute top-2 start-100  translate-middle p-2"><i class="fas fa-times-circle bg-white rounded-circle border-0 text-danger" style="font-size: 25px;"></i></span>
                </div>
                <div class="modal-body table-responsive">

                    <div class="row">
                        <div class="col-lg-6 border-bottom">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Invoice</th>
                                    <td style="font-size: 14px;">: <?= $penjualan['invoice'] ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal/Waktu</th>
                                    <td style="font-size: 14px;">: <?= indo_date($penjualan['tanggal']) ?> - <?= date('H:i', strtotime($penjualan['created_at'])) ?></td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td style="font-size: 14px;">: Rp<?= number_format($penjualan['total_harga'], 0, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <th>Diskon</th>
                                    <td style="font-size: 14px;">: Rp<?= number_format($penjualan['diskon'], 0, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <th>Grand Total</th>
                                    <td style="font-size: 14px;">: Rp<?= number_format($penjualan['harga_bayar'], 0, ',', '.') ?></td>
                                </tr>
                            </table>
                        </div>
                        <!-- col 2 -->
                        <div class="col-lg-6 border-bottom">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Customer</th>
                                    <td style="font-size: 14px;">: <?= ($penjualan['id_customer'] == 0) ? 'Umum' : $penjualan['nama_customer'] ?></td>
                                </tr>
                                <tr>
                                    <th>Kasir</th>
                                    <td style="font-size: 14px;">: <?= session()->get('nama') ?></td>
                                </tr>
                                <tr>
                                    <th>Cash</th>
                                    <td style="font-size: 14px;">: Rp<?= number_format($penjualan['cash'], 0, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <th>Kembalian</th>
                                    <td style="font-size: 14px;">: Rp<?= number_format($penjualan['kembalian'], 0, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <th>Nota</th>
                                    <td style="font-size: 14px;">: <?= $penjualan['nota'] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endforeach  ?>



</div>
<?= $this->endSection(); ?>