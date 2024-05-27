<?php foreach ($data_cart as $cart) : ?>
    <tr>
        <td class="fw-normal p-1" style="font-size:15px;"> <strong><?= $cart['nama_produk'] ?></strong></td>
        <td class="fw-normal p-1" style="font-size:14px;"><?= number_format($cart['harga_data_cart']) ?></td>
        <td class="fw-normal p-1" style="font-size:14px;"><?= $cart['qty_data_cart'] ?></td>
        <td class="fw-normal p-1" style="font-size:14px;"><?= $cart['diskon_data_cart'] ?></td>
        <td class="fw-normal p-1" style="font-size:14px;"><?= number_format($cart['total_data_cart']) ?></td>
        <td class="align-middle text-center p-1" style="font-size:14px;">
            <a id="update_cart" class="text-xs mx-1 cursor-pointer" <?= text_success ?> data-bs-toggle="modal" data-bs-target="#modalUpdate" data-id_cart="<?= $cart['id_cart'] ?>" data-kode_produk="<?= $cart['kode_produk'] ?>" data-nama_produk="<?= $cart['nama_produk'] ?>" data-harga="<?= $cart['harga_data_cart'] ?>" data-qty="<?= $cart['qty_data_cart'] ?>" data-diskon="<?= $cart['diskon_data_cart'] ?>" data-total="<?= $cart['total_data_cart'] ?>">
                Update
            </a>
            <a id="del_cart" data-id_cart="<?= $cart['id_cart'] ?>" class="text-xs cursor-pointer" <?= text_danger ?>>
                </i> Delete
            </a>
        </td>
    </tr>
<?php endforeach ?>