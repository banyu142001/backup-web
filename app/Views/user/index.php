<?= $this->extend('layout/template') ?>

<?= $this->section('main'); ?>
<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-12">
            <div class="card my-4 rounded-2">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary rounded-2 border-radius-lg pt-2 p-2 pb-1">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0 text-white mx-3">Data User</h6>
                            </div>
                            <div class="col-6 text-end">
                                <a class="btn bg-gradient-dark btn-sm mb-0" href="/user/create"><i class="material-icons text-sm">add</i> Tambah user</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-3 pb-2">
                    <?php if (session()->getFlashdata('flash')) : ?>
                        <?= session()->getFlashdata('flash'); ?>
                    <?php endif; ?>
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Username</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user) : ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="/assets/img/<?= $user['foto'] ?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user2">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $user['nama'] ?></h6>
                                                    <p class="text-xs text-secondary mb-0"><?= $user['alamat'] ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0"><?= $user['username'] ?></p>
                                            <p class="text-xs text-secondary mb-0"><?= $user['email'] ?></p>
                                        </td>
                                        <td class="align-middle text-center text-sm text-center">
                                            <span class="badge badge-sm p-2 bg-gradient-<?= ($user['level'] == 1) ? 'success' : 'secondary' ?> "><?= ($user['level'] == 1) ? 'Admin' : 'Kasir' ?></span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <?php if ($user['level'] == 1) : ?>
                                                <a href="/user/edit/<?= $user['id'] ?>" class="text-success font-weight-bold text-xs">
                                                    <i class="material-icons text-sm mx-1 mt-1">edit</i> Edit
                                                </a>
                                            <?php else : ?>
                                                <a href="/user/edit/<?= $user['id'] ?>" class="text-success font-weight-bold text-xs">
                                                    <i class="material-icons text-sm mx-1">edit</i> Edit
                                                </a>
                                                <a href="" class="text-primary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#modalDelete<?= $user['id'] ?> ">
                                                    <i class="material-icons text-sm mx-1">delete</i> Delete
                                                </a>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->include('/layout/modal/modal-delete'); ?>
    </div>
    <!-- Modal -->
    <?= $this->endSection(); ?>