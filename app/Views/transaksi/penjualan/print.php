<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nota Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body onload="window.print()">

    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-lg-4 col-lg">
                <div class="border p-2 my-2  text-center">
                    <h5 class="fw-bold m-0">myPOS <span class="text-primary">Store</span></h5>
                    <p class="border- border-bottom"> <small class="text-muted">Jalan Stain Amalatu RT 10/ RW 17</small></p>
                    <table class="table table-sm text-start table-borderless">
                        <tr>
                            <td colspan="3" class="mt-3" style="font-size: 11px; font-weight: bold;">14/15/2020 21:00</td>
                            <td class="text-end text-muted" colspan="2">Kasir :</td>
                            <td class="text-end text-capitalize" style="width: 115px;"><?= $penjualan['nama'] ?></td>
                        </tr>
                        <tr class="border-dark border-3 border-0 border-bottom">
                            <td colspan="3" style="font-size: 13px; font-weight: bold;"><?= $penjualan['invoice'] ?></td>
                            <td class="text-end text-muted" colspan="2">Customer :</td>
                            <td class="text-end text-capitalize" style="width: 115px;"><?= ($penjualan['id_customer'] == 0) ? 'Umum' : $penjualan['nama_customer'] ?></td>
                        </tr>

                        <tr>
                            <td colspan="3">Nama Produk</td>
                            <td class="text-end fw-bold">QTY</td>
                            <td class="text-end text-muted">Rp100000</td>
                            <td class="text-end">Rp100000</td>
                        </tr>
                        <tr class="border-0 border-bottom">
                            <td colspan="3"></td>
                            <td class="text-end" colspan="3">Disc.1 Rp.100</td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td class="text-end text-muted" colspan="2">Sub Total :</td>
                            <td class="text-end" colspan="">Rp10000</td>
                        </tr>
                        <tr class="border-0">
                            <td colspan="3"></td>
                            <td class="text-end text-muted" colspan="2">Grand Total :</td>
                            <td class="text-end" colspan="1">Rp10000</td>
                        </tr>
                        <tr class="border-0">
                            <td colspan="3"></td>
                            <td class="text-end text-muted" colspan="2">Cash :</td>
                            <td class="text-end" colspan="1">Rp10000</td>
                        </tr>
                        <tr class="border-0 border-bottom">
                            <td colspan="3"></td>
                            <td class="text-end text-muted" colspan="2">Kembalian :</td>
                            <td class="text-end" colspan="1">Rp10000</td>
                        </tr>
                    </table>
                    <p class="m-0">-- Terima Kasih --</p>
                    <small class="m-0">myPos Store</small>
                </div>
            </div>
        </div>
    </div>


    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>