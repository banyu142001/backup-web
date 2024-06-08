    <!-- Modal -->
    <div class="modal fade" id="modalLogout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-1 border-0 shadow-none">
                <span data-bs-dismiss="modal" aria-label="Close" class="cursor-pointer position-absolute top-2 start-100  translate-middle p-2"><i class="fas fa-times-circle bg-white rounded-circle border-0 text-danger" style="font-size: 25px;"></i></span>
                <div class="modal-body p-4">
                    Klik "KELUAR" Anda akan keluar dari sistem
                </div>
                <div class="modal-footer p-2">
                    <a href="" class="badge text-dark bg-light  p-2" data-bs-dismiss="modal">Batal</a>
                    <a href="/auth/logout" class="badge text-white p-2" <?= btn_info ?>> <i class="fa-solid fa-right-from-bracket mx-1"></i> Keluar</a>
                </div>
            </div>
        </div>
    </div>