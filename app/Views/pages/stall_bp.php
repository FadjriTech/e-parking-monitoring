<?= $this->extend('templates/app'); ?>

<?= $this->section('content'); ?>
<section>
    <div class="header">
        <h4>Area Stall BP</h4>
    </div>
    <main class="denah">
        <!--------- Legend  ---------->
        <div class="legend-wrap">
            <div class="legend-wrap-desc">
                <div class="desc-wrap">
                    <div class="legend legend-shadow"></div>
                    Parkir Bayangan
                </div>
                <div class="desc-wrap">
                    <div class="legend legend-empty"></div>
                    Parkir Seat
                </div>
                <div class="desc-wrap">
                    <div class="legend legend-internal"></div>
                    Gedung
                </div>
            </div>
        </div>

        <div class="kantor shadow">
            Gedung Akastra
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <br><br><br>
                <div class="d-flex gap-2 justify-content-center mb-2">
                    <div class="d-flex flex-column gap-2">
                        <?php for ($i = 1; $i <= 7; $i++) : ?>
                            <!-- Lakukan Pengecekan Key -->
                            <?php $key = array_search($i, array_column($grupJ, 'position')); ?>
                            <?php if (!empty($key) || $key === 0) : ?>
                                <a class="seat-shadow seat-vertical text-dark" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)" id="<?= rand($i * 200, $i * 399); ?>" grup="J" position="<?= $i; ?>">
                                    <?= $grupJ[$key]['model_code'] . " | " . $grupJ[$key]['license_plate']; ?>
                                </a>
                            <?php else : ?>
                                <a class="seat-shadow seat-vertical text-dark" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)" id="<?= rand($i * 200, $i * 399); ?>" grup="J" position="<?= $i; ?>"></a>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                    <div class="d-flex flex-column gap-2">
                        <?php for ($i = 8; $i <= 16; $i++) : ?>
                            <!-- Lakukan Pengecekan Key -->
                            <?php $key = array_search($i, array_column($grupJ, 'position')); ?>
                            <?php if (!empty($key) || $key === 0) : ?>
                                <a class="seat-shadow seat-vertical text-dark" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)" id="<?= rand($i * 200, $i * 399); ?>" grup="J" position="<?= $i; ?>">
                                    <?= $grupJ[$key]['model_code'] . " | " . $grupJ[$key]['license_plate']; ?>
                                </a>
                            <?php else : ?>
                                <a class="seat-shadow seat-vertical text-dark" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)" id="<?= rand($i * 200, $i * 399); ?>" grup="J" position="<?= $i; ?>"></a>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <br><br><br><br><br>
                <br><br><br><br><br>
                <br><br><br><br><br>
                <br><br><br><br><br>
                <!-------------- Area Sparepart BP ------------->
                <div class="seat-row">
                    <a class="pos seat-vertical">
                        Spare Part
                    </a>
                    <?php for ($i = 1; $i <= 3; $i++) : ?>
                        <!-- Lakukan Pengecekan Key -->
                        <?php $key = array_search($i, array_column($grupG, 'position')); ?>
                        <?php if (!empty($key) || $key === 0) : ?>
                            <a class="seat seat-vertical text-white" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)" id="<?= rand($i * 200, $i * 399); ?>" grup="G" position="<?= $i; ?>">
                                <?= $grupG[$key]['model_code'] . " | " . $grupG[$key]['license_plate']; ?>
                            </a>
                        <?php else : ?>
                            <a class="seat seat-vertical text-white" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)" id="<?= rand($i * 200, $i * 399); ?>" grup="G" position="<?= $i; ?>"></a>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>

                <!---------------- Jalan Utama ------------------->
                <div class="seat-row">
                    <?php for ($i = 1; $i <= 9; $i++) : ?>
                        <?php if ($i != 2) : ?>
                            <!-- Lakukan Pengecekan Key -->
                            <?php $key = array_search($i, array_column($grupH, 'position')); ?>
                            <?php if (!empty($key) || $key === 0) : ?>
                                <a class="seat-shadow seat-horizontal text-dark" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)" id="<?= rand($i * 200, $i * 399); ?>" grup="H" position="<?= $i; ?>">
                                    <?= $grupH[$key]['model_code'] . " | " . $grupH[$key]['license_plate']; ?>
                                </a>
                            <?php else : ?>
                                <a class="seat-shadow seat-horizontal text-dark" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)" id="<?= rand($i * 200, $i * 399); ?>" grup="H" position="<?= $i; ?>"></a>
                            <?php endif; ?>
                        <?php else : ?>
                            <div class="seat-empty seat-horizontal"></div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
                <div class="seat-row">
                    <?php for ($i = 10; $i <= 18; $i++) : ?>
                        <!-- Lakukan Pengecekan Key -->
                        <?php $key = array_search($i, array_column($grupH, 'position')); ?>
                        <?php if (!empty($key) || $key === 0) : ?>
                            <a class="seat-shadow seat-horizontal text-dark" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)" id="<?= rand($i * 200, $i * 399); ?>" grup="H" position="<?= $i; ?>">
                                <?= $grupH[$key]['model_code'] . " | " . $grupH[$key]['license_plate']; ?>
                            </a>
                        <?php else : ?>
                            <a class="seat-shadow seat-horizontal text-dark" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)" id="<?= rand($i * 200, $i * 399); ?>" grup="H" position="<?= $i; ?>"></a>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>


                <!---------------- Area Gudang Bahan    -------------->
                <div class="seat-row">
                    <a class="pos seat-vertical"></a>
                    <a class="pos seat-vertical">
                        Gudang Alat
                    </a>
                    <a class="pos seat-vertical">
                        Gudang Bahan
                    </a>
                    <div class="seat-horizontal-gap"></div>
                    <?php for ($i = 1; $i <= 8; $i++) : ?>
                        <!-- Lakukan Pengecekan Key -->
                        <?php $key = array_search($i, array_column($grupI, 'position')); ?>
                        <?php if (!empty($key) || $key === 0) : ?>
                            <a class="seat seat-vertical text-white" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)" id="<?= rand($i * 200, $i * 399); ?>" grup="I" position="<?= $i; ?>">
                                <?= $grupI[$key]['model_code'] . " | " . $grupI[$key]['license_plate']; ?>
                            </a>
                        <?php else : ?>
                            <a class="seat seat-vertical text-white" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)" id="<?= rand($i * 200, $i * 399); ?>" grup="I" position="<?= $i; ?>"></a>
                        <?php endif; ?>
                    <?php endfor; ?>


                </div>

            </div>
        </div>


        <!-- Detail Modal -->
        <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen-md-down">
                <div class="modal-content">
                    <div class="modal-header boder-0">
                        <h5 class="modal-title border-0" id="exampleModalLabel">Seat Detail</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="/parkir/tambah_parkir">
                        <div class="modal-body border-0">
                            <div>
                                <input type="hidden" class="form-control" id="detailGrup" name="grup" readonly>
                                <input type="hidden" class="form-control" id="detailPosisi" name="posisi" readonly>
                                <input type="hidden" class="form-control" id="detailLokasi" name="lokasi" value="STALL_BP" readonly>
                                <input type="hidden" class="form-control" id="detailID" name="id" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="nopol" class="form-label">Nomor Polisi</label>
                                <input type="text" class="form-control" id="detailNopol" name="nopol" disabled readonly>
                            </div>
                            <div class="mb-3">
                                <label for="model" class="form-label">Model Kendaraan</label>
                                <select name="model" id="detailModel" class="form-control" disabled>
                                    <?php foreach ($model as $row) : ?>
                                        <option value="<?= $row['model_code']; ?>"><?= $row['model']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="detailStatus" class="form-control" disabled>
                                    <option value="Menunggu Perbaikan">Menunggu Perbaikan</option>
                                    <option value="Menunggu Sparepart">Menunggu Sparepart</option>
                                    <option value="Proses Pengerjaan">Proses Pengerjaan</option>
                                    <option value="Menunggu Pengambilan">Menunggu Pengambilan</option>
                                    <option value="Menunggu Pengantaran">Menunggu Pengantaran</option>
                                    <option value="Internal">Internal</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-delete btn-danger d-flex align-items-center">
                                <span class="material-icons">
                                    do_disturb_alt
                                </span>
                            </button>
                            <button type="button" class="btn btn-success d-flex align-items-center btn-edit">
                                <span class="material-icons">
                                    flip
                                </span>
                            </button>
                            <button type="submit" class="btn btn-primary d-flex align-items-center d-none btn-save">
                                <span class="material-icons">
                                    save_as
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Add Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen-md-down">
                <div class="modal-content">
                    <div class="modal-header boder-0">
                        <h5 class="modal-title border-0" id="exampleModalLabel">Seat Detail</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="/parkir/tambah_parkir">
                        <div class="modal-body border-0">
                            <div>
                                <input type="hidden" class="form-control" id="grup" name="grup" readonly>
                                <input type="hidden" class="form-control" id="posisi" name="posisi" readonly>
                                <input type="hidden" class="form-control" id="lokasi" name="lokasi" value="STALL_BP" readonly>
                            </div>
                            <div class="mb-2">
                                <label for="nopol" class="form-label">Nomor Polisi</label>
                                <input type="text" class="form-control" id="nopol" name="nopol" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label for="model" class="form-label">Model Kendaraan</label>
                                <select name="model" id="model" class="form-control">
                                    <?php foreach ($model as $row) : ?>
                                        <option value="<?= $row['model_code']; ?>"><?= $row['model']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="Menunggu Perbaikan">Menunggu Perbaikan</option>
                                    <option value="Menunggu Sparepart">Menunggu Sparepart</option>
                                    <option value="Proses Pengerjaan">Proses Pengerjaan</option>
                                    <option value="Menunggu Pengambilan">Menunggu Pengambilan</option>
                                    <option value="Menunggu Pengantaran">Menunggu Pengantaran</option>
                                    <option value="Internal">Internal</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-secondary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!----------- Bottom Nav ---------->
        <nav class="bottom-nav">
            <a href="/parkir/depan" class="success-button">
                <span class="material-icons">
                    chevron_left
                </span>
                Prev
            </a>
            <a href="/parkir/stall_gr" class="success-button">
                Next
                <span class="material-icons">
                    navigate_next
                </span>
            </a>
        </nav>
    </main>
</section>
<?= $this->endSection(); ?>


<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {

        const formField = ['detailID', 'detailNopol', 'detailModel', 'detailStatus'];
        const arrayField = ['id', 'license_plate', 'model_code', 'status'];

        $('.seat-vertical, .seat-horizontal').click(function(e) {
            e.preventDefault();

            //----- Ambil HTML
            var html = $(this).html();

            //----- Ambil grup dan posisi
            var grup = $(this).attr('grup');
            var position = $(this).attr('position');

            $("#grup").val(grup);
            $("#posisi").val(position);
            $("#detailGrup").val(grup);
            $("#detailPosisi").val(position);

            if (!html) {
                $("#addModal").modal('show');
            } else {
                formField.forEach(element => {
                    $(`#${element}`).prop('disabled', true);
                });

                $(".btn-save").addClass("d-none");
                $("#detailModal").modal('show');

                $.ajax({
                    type: "POST",
                    url: "/parkir/get_detail",
                    data: {
                        grup: grup,
                        posisi: position
                    },
                    dataType: "json",
                    success: function(response) {
                        const data = response.data;
                        formField.forEach((element, index) => {
                            $(`#${element}`).val(data[arrayField[index]]);
                        });
                    }
                });
            }
        });

        $('.btn-edit').click(function(e) {
            e.preventDefault();

            $(".btn-save").removeClass("d-none");
            formField.forEach(element => {
                $(`#${element}`).prop('disabled', false);
                $(`#${element}`).prop('readonly', false);
            });
        });

        $('.btn-delete').click(function(e) {
            e.preventDefault();

            //----- Ambil grup dan posisi
            var grup = $("#detailGrup").val();
            var position = $("#detailPosisi").val();

            var confirmation = confirm("Hapus data ini ?");
            if (confirmation) {
                $.ajax({
                    type: "POST",
                    url: "/parkir/delete",
                    data: {
                        grup: grup,
                        posisi: position
                    },
                    dataType: "json",
                    success: function(response) {
                        location.reload();
                    }
                });
            }
        });
    });




    //-------------- DRAG & DROP COLUMN
    function allowDrop(ev) {
        ev.preventDefault();
    }

    function drag(ev) {
        var group = ev.target.getAttribute('grup');
        var posisi = ev.target.getAttribute('position');
        var id = ev.target.id;

        var html = $(`#${id}`).html();
        if (html) {
            ev.dataTransfer.setData("grup", String(group));
            ev.dataTransfer.setData("posisi", String(posisi));
            ev.dataTransfer.setData("id", String(id));
        } else {
            alert("Seat Masih Kosong");
        }

    }

    function drop(ev) {
        ev.preventDefault();
        var grup = ev.dataTransfer.getData("grup", grup);
        var posisi = ev.dataTransfer.getData("posisi", posisi);
        var prevId = ev.dataTransfer.getData("id", posisi);

        var newGrup = ev.target.getAttribute('grup');
        var newPosisi = ev.target.getAttribute('position');
        var newId = ev.target.id;

        if ($(`#${newId}`).html() == '') {
            $.ajax({
                type: "POST",
                url: "/parkir/update_posisi",
                data: {
                    grup: grup,
                    posisi: posisi,
                    newGrup: newGrup,
                    newPosisi: newPosisi
                },
                dataType: "json",
                success: function(response) {
                    $(`#${prevId}`).html("");
                    $(`#${newId}`).html(response.model_code + ' | ' + response.license_plate);
                },
                error: function() {
                    location.reload();
                }
            });
        } else {
            alert("data sudah terisi");
        }
    }
</script>
<?= $this->endSection(); ?>