<!-- Modal -->
<div class="modal fade" id="modalCart" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg border-0 shadow-none position-relative ">
        <div class="modal-content rounded-1 shadow-none border-0">
            <div class="modal-header p-0 py-1 px-3">
                <p class="modal-title fw-bolder mt-2">Pilih Produk</p>
                <span data-bs-dismiss="modal" aria-label="Close" class="cursor-pointer position-absolute top-3 start-100  translate-middle p-2"><i class="fas fa-times-circle bg-white rounded-circle border-0 text-danger" style="font-size: 25px;"></i></span>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-borderles table-sm table-striped">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-7">Kode Produk</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-7">Nama Produk</th>
                            <th class="text-uppercase text-secondary text-xxs text-center font-weight-bold opacity-7">Satuan</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bold opacity-7">Harga</th>
                            <th class="text-uppercase text-secondary text-xxs text-center font-weight-bold opacity-7">Stok</th>
                            <th class=""></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data_produk as $produk) : ?>
                            <tr>
                                <td>
                                    <p class="text-sm mb-0 mx-2 fw-bold "><?= $produk['kode_produk'] ?></p>
                                </td>
                                <td>
                                    <p class="text-sm mb-0 mx-2"><?= $produk['nama_produk'] ?></p>
                                </td>
                                <td>
                                    <p class="text-sm text-center mb-0"><?= $produk['nama_satuan'] ?></p>
                                </td>
                                <td>
                                    <p class="text-sm mb-0 text-end">Rp. <?= number_format($produk['harga']) ?> </p>
                                </td>
                                <td>
                                    <p class="text-sm text-center mb-0"><?= $produk['stok'] ?></p>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm rounded-2 p-1 w-100 mb-0 btn-warning" id="select" name="submit" data-id_produk="<?= $produk['id_produk'] ?>" data-kode_produk="<?= $produk['kode_produk'] ?>" data-harga="<?= $produk['harga'] ?>" data-stok="<?= $produk['stok'] ?>"> Pilih</button>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        $(document).on('click', '#select', function() {

            // ambil data dari button
            const id_produk = $(this).data('id_produk');
            const kode_produk = $(this).data('kode_produk');
            const harga = $(this).data('harga');
            const stok = $(this).data('stok');

            // set value dari tiap inputan berdasarkan id
            $('#id_produk').val(id_produk);
            $('#kode_produk').val(kode_produk);
            $('#harga').val(harga);
            $('#stok').val(stok);
            $('#modalCart').modal('hide');
        })

        $(document).on('click', '#cart', function() {

            // ambil data dari button
            const id_produk = $('#id_produk').val()
            const harga = $('#harga').val()
            const stok = $('#stok').val()
            const qty = $('#qty').val()

            if (id_produk == '') {
                alert("Produk belum dipilih")
            } else if (stok < 1) {
                alert("Stok produk tidak mencukupi")
                $('#id_produk').val('')
                $('#kode_produk').val('')
            } else {

                $.ajax({
                    type: 'POST',
                    url: '<?= base_url('penjualan/save') ?>',
                    data: {
                        'cart': true,
                        'id_produk': id_produk,
                        'harga': harga,
                        'qty': qty
                    },
                    dataType: 'json',
                    success: function(result) {

                        if (result.success == true) {
                            $('#tb_cart').load('<?= base_url('/penjualan/load_cart') ?>', function() {

                            })
                            $('#id_produk').val('')
                            $('#kode_produk').val('')
                            $('#qty').val(1)

                        } else {
                            alert("Data gagal ditambhkan ke cart")
                        }

                    }


                })
            }

        })

        // delete cart ajax
        $(document).on('click', '#del_cart', function() {
            const id_cart = $(this).data('id_cart')

            $.ajax({
                type: 'POST',
                url: '<?= base_url('/penjualan/deleteCart') ?>',
                dataType: 'json',
                data: {
                    'id_cart': id_cart
                },
                success: function(result) {
                    if (result.success == true) {

                        $('#tb_cart').load('<?= base_url('/penjualan/load_cart') ?>', function() {})

                    } else {
                        alert("Data cart gagal dihapus")
                    }
                }


            })

        })


    })
</script>