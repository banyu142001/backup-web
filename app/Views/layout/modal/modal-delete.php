    <!-- MODAL HAPUS DATA USER -->
    <?php foreach ($users as $user) : ?>
        <div class="modal fade" id="modalDelete<?= $user['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header p-2">
                        <h1 class="modal-title fs-5 mx-2" id="exampleModalLabel"><?= $konf_delete ?></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <p>Data <strong><?= $user['nama'] ?></strong> akan dihapus?</p>
                    </div>
                    <div class="modal-footer p-2">
                        <a href="" class=" badge text-white bg-success p-2" data-bs-dismiss="modal"> Batal</a>
                        <a href="/user/delete/<?= $user['id'] ?>" class="badge text-white bg-danger p-2"> <i class="fa-solid fa-trash mx-1"></i> Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- MODAL HAPUS DATA SUPPLIERS -->
    <?php foreach ($suppliers as $suply) : ?>
        <div class="modal fade" id="modalDelSupply<?= $suply['id_supplier'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header p-2">
                        <h1 class="modal-title fs-5 mx-2" id="exampleModalLabel"><?= $konf_delete ?></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3 my-0">
                        <p>Data <strong><?= $suply['nama_supplier'] ?></strong> akan dihapus?</p>
                    </div>
                    <div class="modal-footer p-2">
                        <a href="" class=" badge text-white bg-success p-2" data-bs-dismiss="modal"> Batal</a>
                        <a href="/supplier/delete/<?= $suply['id_supplier'] ?>" class="badge text-white bg-danger p-2"> <i class="fa-solid fa-trash mx-1"></i> Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- MODAL HAPUS DATA CUSTOMERE -->
    <?php foreach ($customers as $customer) : ?>
        <div class="modal fade" id="modalDelCus<?= $customer['id_customer'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header p-2">
                        <h1 class="modal-title fs-5 mx-2" id="exampleModalLabel"><?= $konf_delete ?></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3 my-0">
                        <p>Data Customer <strong><?= $customer['nama_customer'] ?></strong> akan dihapus?</p>
                    </div>
                    <div class="modal-footer p-2">
                        <a href="" class=" badge text-white bg-success p-2" data-bs-dismiss="modal">Batal</a>
                        <a href="/customer/delete/<?= $customer['id_customer'] ?>" class="badge text-white bg-danger p-2"> <i class="fa-solid fa-trash mx-1"></i> Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>


    <!-- MODAL HAPUS DATA KATEGORI -->
    <?php foreach ($kategori as $kat) : ?>
        <div class="modal fade" id="modalDelKategori<?= $kat['id_kategori'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header p-2">
                        <h1 class="modal-title fs-5 mx-2" id="exampleModalLabel"><?= $konf_delete ?></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3 my-0">
                        <p>Data Kategori <strong><?= $kat['nama_kategori'] ?></strong> akan dihapus?</p>
                    </div>
                    <div class="modal-footer p-2">
                        <a href="" class=" badge text-white bg-success p-2" data-bs-dismiss="modal">Batal</a>
                        <a href="/kategori/delete/<?= $kat['id_kategori'] ?>" class="badge text-white bg-danger p-2"> <i class="fa-solid fa-trash mx-1"></i> Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- MODAL HAPUS DATA SATUAN -->
    <?php foreach ($satuan as $satuan) : ?>
        <div class="modal fade" id="modalDelSatuan<?= $satuan['id_satuan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header p-2">
                        <h1 class="modal-title fs-5 mx-2" id="exampleModalLabel"><?= $konf_delete ?></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3 my-0">
                        <p>Data Satuan <strong><?= $satuan['nama_satuan'] ?></strong> akan dihapus?</p>
                    </div>
                    <div class="modal-footer p-2">
                        <a href="" class=" badge text-white bg-success p-2" data-bs-dismiss="modal">Batal</a>
                        <a href="/satuan/delete/<?= $satuan['id_satuan'] ?>" class="badge text-white bg-danger p-2"> <i class="fa-solid fa-trash mx-1"></i> Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- MODAL HAPUS DATA PRODUK -->
    <?php foreach ($data_produk as $produk) : ?>
        <div class="modal fade" id="modalDelProduk<?= $produk['id_produk'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header p-2">
                        <h1 class="modal-title fs-5 mx-2" id="exampleModalLabel"><?= $konf_delete ?></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3 my-0">
                        <p>Data Produk <strong><?= $produk['nama_produk'] ?></strong> akan dihapus?</p>
                    </div>
                    <div class="modal-footer p-2">
                        <a href="" class=" badge text-white bg-success p-2" data-bs-dismiss="modal">Batal</a>
                        <a href="/produk/delete/<?= $produk['id_produk'] ?>" class="badge text-white bg-danger p-2"> <i class="fa-solid fa-trash mx-1"></i> Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>