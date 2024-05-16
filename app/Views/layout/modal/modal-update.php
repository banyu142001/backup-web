<!-- MODAL UPDATE KATEGORI -->

<?php foreach ($kategori as $kat) : ?>
    <div class="modal fade" id="modalUpdateKategori<?= $kat['id_kategori'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-1 border-0 shadow-none">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data Kategori</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/kategori/update/<?= $kat['id_kategori'] ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="kategori_update">NAMA KATEGORI</label>
                            <div class="input-group input-group-outline">
                                <input type="hidden" name="id_kategori" value="<?= $kat['id_kategori'] ?>">
                                <input type="text" name="kategori_update" id="kategori_update" class="form-control fw-bold text-uppercase" value="<?= $kat['nama_kategori'] ?> " />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn text-dark bg-light p-2" data-bs-dismiss="modal">Batal</a>
                        <button class="btn p-2 btn-success" name="submit" type="submit"><i class="fa-solid fa-floppy-disk mx-1"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- MODAL UPDATE SATUAN -->
<?php foreach ($satuan as $satuan) : ?>
    <div class="modal fade" id="modalUpdateSatuan<?= $satuan['id_satuan'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-1 border-0 shadow-none">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data Satuan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/satuan/update/<?= $satuan['id_satuan'] ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="kategori_update">NAMA SATUAN</label>
                            <div class="input-group input-group-outline">
                                <input type="hidden" name="id_satuan" value="<?= $satuan['id_satuan'] ?>">
                                <input type="text" name="satuan_update" id="satuan_update" class="form-control fw-bold text-uppercase" value="<?= $satuan['nama_satuan'] ?> " />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" class="btn text-dark bg-light p-2" data-bs-dismiss="modal">Batal</a>
                        <button class="btn p-2 btn-success" name="submit" type="submit"><i class="fa-solid fa-floppy-disk mx-1"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>