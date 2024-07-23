<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>nota-penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        @media print {

            /* Hide everything in the body except for the receipt container */
            body * {
                visibility: hidden;
            }

            .print-container,
            .print-container * {
                visibility: visible;
            }

            .print-container {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
        }
    </style>
</head>

<body onload="window.print()">

    <div class="container print-container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-lg-4 col-lg">
                <div class="border p-2 my-2 text-center">
                    <h5 class="fw-bold m-0">myPOS <span class="text-primary">Store</span></h5>
                    <p class="border-bottom"><small class="text-muted">Jalan Stain Amalatu RT 10/ RW 17</small></p>
                    <table class="table table-sm text-start table-borderless">
                        <tr>
                            <td colspan="3" class="mt-3" style="font-size: 11px; font-weight: bold;">
                                <?= date('d/m/y', strtotime($penjualan['tanggal'])) ?> <?= date('H:i', strtotime($penjualan['created_at'])) ?>
                            </td>
                            <td class="text-end text-muted" colspan="2">Kasir :</td>
                            <td class="text-end text-capitalize" style="width: 115px;"><?= $penjualan['nama'] ?></td>
                        </tr>
                        <tr class="border-light border-2 border-bottom">
                            <td colspan="3" style="font-size: 13px; font-weight: bold;"><?= $penjualan['invoice'] ?></td>
                            <td class="text-end text-muted" colspan="2">Customer :</td>
                            <td class="text-end text-capitalize" style="width: 115px;"><?= ($penjualan['id_customer'] == 0) ? 'Umum' : $penjualan['nama_customer'] ?></td>
                        </tr>
                        <?php $arr_diskon = []; ?>
                        <?php foreach ($data_detail as $detail) : ?>
                            <tr>
                                <td colspan="3"><?= $detail['nama_produk'] ?></td>
                                <td class="text-end fw-bold"><?= $detail['qty_detail'] ?></td>
                                <td class="text-end text-muted">Rp<?= number_format($detail['harga_detail'], 0, ',', '.') ?></td>
                                <td class="text-end">Rp<?= number_format(($detail['harga_detail'] - $detail['diskon_detail']) * $detail['qty_detail'], 0, ',', '.') ?></td>
                            </tr>
                            <?php if ($detail['diskon_detail'] > 0) : ?>
                                <?php $arr_diskon[] = $detail['diskon_detail']; ?>
                            <?php endif; ?>
                        <?php endforeach ?>
                        <?php foreach ($arr_diskon as $key => $disc) : ?>
                            <tr class="border-bottom border-dark border-1">
                                <td colspan="3"></td>
                                <td class="text-end" colspan="3">Diskon Item <?= $key + 1 ?>: Rp<?= number_format($disc, 0, ',', '.') ?></td>
                            </tr>
                        <?php endforeach ?>
                        <tr>
                            <td colspan="3"></td>
                            <td class="text-end text-muted" colspan="2">Sub Total :</td>
                            <td class="text-end">Rp<?= number_format($penjualan['total_harga'], 0, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td class="text-end text-muted" colspan="2">Diskon Sale:</td>
                            <td class="text-end">Rp<?= number_format($penjualan['diskon'], 0, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td class="text-end text-muted" colspan="2">Grand Total:</td>
                            <td class="text-end">Rp<?= number_format($penjualan['harga_bayar'], 0, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td class="text-end text-muted" colspan="2">Cash :</td>
                            <td class="text-end">Rp<?= number_format($penjualan['cash'], 0, ',', '.') ?></td>
                        </tr>
                        <tr class="border-bottom">
                            <td colspan="3"></td>
                            <td class="text-end text-muted" colspan="2">Kembalian :</td>
                            <td class="text-end">Rp<?= number_format($penjualan['kembalian'], 0, ',', '.') ?></td>
                        </tr>
                    </table>
                    <p class="m-0">-- Terima Kasih --</p>
                    <small class="m-0">myPos Store</small>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>