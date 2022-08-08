<?= $this->extend('templates/app'); ?>

<?= $this->section('content'); ?>

<section>
    <div class="header">
        <h4>Area Parkir Depan</h4>
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

        <!-------- GRUP A ------->
        <div class="seat-row">
            <?php for ($i = 1; $i <= 9; $i++) : ?>
                <!-- Lakukan Pengecekan Key -->
                <?php $key = array_search($i, array_column($grupA, 'position')); ?>
                <?php if (!empty($key) || $key === 0) : ?>
                    <a class="seat seat-vertical text-white" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)" id="<?= rand($i * 200, $i * 399); ?>" grup="A" position="<?= $i; ?>">
                        <?= $grupA[$key]['model_code'] . " | " . $grupA[$key]['license_plate']; ?>
                    </a>
                <?php else : ?>
                    <a class="seat seat-vertical text-white" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)" id="<?= rand($i * 200, $i * 399); ?>" grup="A" position="<?= $i; ?>"></a>
                <?php endif; ?>
            <?php endfor; ?>
        </div>

        <!---------------- Jalan Utama ------------------->
        <!--------- GRUP B -------->
        <div class="seat-row">
            <?php for ($i = 1; $i <= 5; $i++) : ?>
                <!-- Lakukan Pengecekan Key -->
                <?php $key = array_search($i, array_column($grupB, 'position')); ?>
                <?php if (!empty($key) || $key === 0) : ?>
                    <a class="seat-shadow seat-horizontal" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)" id="<?= rand($i * 200, $i * 399); ?>" grup="B" position="<?= $i; ?>">
                        <?= $grupB[$key]['model_code'] . " | " . $grupB[$key]['license_plate']; ?>
                    </a>
                <?php else : ?>
                    <a class="seat-shadow seat-horizontal" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)" id="<?= rand($i * 200, $i * 399); ?>" grup="B" position="<?= $i; ?>"></a>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
        <div class="seat-row">
            <?php for ($i = 6; $i <= 10; $i++) : ?>
                <!-- Lakukan Pengecekan Key -->
                <?php $key = array_search($i, array_column($grupB, 'position')); ?>
                <?php if (!empty($key) || $key === 0) : ?>
                    <a class="seat-shadow seat-horizontal" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)" id="<?= rand(200, 500); ?>" grup="B" position="<?= $i; ?>">
                        <?= $grupB[$key]['model_code'] . " | " . $grupB[$key]['license_plate']; ?>
                    </a>
                <?php else : ?>
                    <a class="seat-shadow seat-horizontal" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)" id="<?= rand(200, 500); ?>" grup="B" position="<?= $i; ?>"></a>
                <?php endif; ?>
            <?php endfor; ?>
        </div>



        <br>
        <!---------------- Area Pos Satpam    -------------->
        <!------------ GRUP C ----------------------------->
        <div class="seat-row">
            <?php for ($i = 1; $i <= 5; $i++) : ?>
                <!-- Lakukan Pengecekan Key -->
                <?php $key = array_search($i, array_column($grupC, 'position')); ?>
                <?php if (!empty($key) || $key === 0) : ?>
                    <a class="seat seat-vertical text-white" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)" id="<?= rand($i * 200, $i * 399); ?>" grup="C" position="<?= $i; ?>">
                        <?= $grupC[$key]['model_code'] . " | " . $grupC[$key]['license_plate']; ?>
                    </a>
                <?php else : ?>
                    <a class="seat seat-vertical text-white" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)" id="<?= rand($i * 200, $i * 399); ?>" grup="C" position="<?= $i; ?>"></a>
                <?php endif; ?>
            <?php endfor; ?>

            <div class="pos seat-vertical">
                POS
            </div>
        </div>

        <div class="seat-row">
            <?php for ($i = 6; $i <= 9; $i++) : ?>
                <!-- Lakukan Pengecekan Key -->
                <?php $key = array_search($i, array_column($grupC, 'position')); ?>
                <?php if (!empty($key) || $key === 0) : ?>
                    <a class="seat seat-vertical text-white" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)" id="<?= rand($i * 200, $i * 399); ?>" grup="C" position="<?= $i; ?>">
                        <?= $grupC[$key]['model_code'] . " | " . $grupC[$key]['license_plate']; ?>
                    </a>
                <?php else : ?>
                    <a class="seat seat-vertical text-white" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)" id="<?= rand($i * 200, $i * 399); ?>" grup="C" position="<?= $i; ?>"></a>
                <?php endif; ?>
            <?php endfor; ?>
            <div class="seat-vertical opacity-0"></div>
            <div class="seat-vertical opacity-0"></div>
        </div>



        <!----------------- GRUP D ---------------------->
        <div class="seat-row">
            <!-- Lakukan Pengecekan Key -->
            <?php $key = array_search(1, array_column($grupD, 'position')); ?>
            <?php if (!empty($key) || $key === 0) : ?>
                <a class="seat-shadow seat-horizontal" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)" id="<?= rand(1 * 200, 1 * 399); ?>" grup="D" position="<?= 1; ?>">
                    <?= $grupD[$key]['model_code'] . " | " . $grupD[$key]['license_plate']; ?>
                </a>
            <?php else : ?>
                <a class="seat-shadow seat-horizontal" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)" id="<?= rand(1 * 200, 1 * 399); ?>" grup="D" position="<?= 1; ?>"></a>
            <?php endif; ?>
        </div>
        <div class="seat-row">
            <?php for ($i = 2; $i <= 5; $i++) : ?>
                <!-- Lakukan Pengecekan Key -->
                <?php $key = array_search($i, array_column($grupD, 'position')); ?>
                <?php if (!empty($key) || $key === 0) : ?>
                    <a class="seat-shadow seat-horizontal" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)" id="<?= rand($i * 200, $i * 399); ?>" grup="D" position="<?= $i; ?>">
                        <?= $grupD[$key]['model_code'] . " | " . $grupD[$key]['license_plate']; ?>
                    </a>
                <?php else : ?>
                    <a class="seat-shadow seat-horizontal" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)" id="<?= rand($i * 200, $i * 399); ?>" grup="D" position="<?= $i; ?>"></a>
                <?php endif; ?>
            <?php endfor; ?>
        </div>


        <!--------------- GRUP E ------------------------>
        <div class="seat-row">
            <!-- Lakukan Pengecekan Key -->
            <?php $key = array_search(1, array_column($grupE, 'position')); ?>
            <?php if (!empty($key) || $key === 0) : ?>
                <a class="seat-shadow text-dark seat-vertical" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)" id="<?= rand(1 * 200, 1 * 399); ?>" grup="E" position="1">
                    <?= $grupE[$key]['model_code'] . " | " . $grupE[$key]['license_plate']; ?>
                </a>
            <?php else : ?>
                <a class="seat-shadow seat-vertical text-dark" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)" id="<?= rand($i * 200, $i * 399); ?>" grup="E" position="1"></a>
            <?php endif; ?>
            <?php for ($i = 2; $i <= 7; $i++) : ?>
                <!-- Lakukan Pengecekan Key -->
                <?php $key = array_search($i, array_column($grupE, 'position')); ?>
                <?php if (!empty($key) || $key === 0) : ?>
                    <a class="seat seat-vertical" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)" id="<?= rand($i * 200, $i * 399); ?>" grup="E" position="<?= $i; ?>">
                        <?= $grupE[$key]['model_code'] . " | " . $grupE[$key]['license_plate']; ?>
                    </a>
                <?php else : ?>
                    <a class="seat seat-vertical" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)" id="<?= rand($i * 200, $i * 399); ?>" grup="E" position="<?= $i; ?>"></a>
                <?php endif; ?>
            <?php endfor; ?>
        </div>

        <!------------- GRUP F -------------------------->
        <div class="seat-row">
            <?php for ($i = 1; $i <= 4; $i++) : ?>
                <!-- Lakukan Pengecekan Key -->
                <?php $key = array_search($i, array_column($grupF, 'position')); ?>
                <?php if (!empty($key) || $key === 0) : ?>
                    <a class="seat-shadow seat-horizontal text-dark" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)" id="<?= rand($i * 200, $i * 399); ?>" grup="F" position="<?= $i; ?>">
                        <?= $grupF[$key]['model_code'] . " | " . $grupF[$key]['license_plate']; ?>
                    </a>
                <?php else : ?>
                    <a class="seat-shadow seat-horizontal text-dark" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)" id="<?= rand($i * 200, $i * 399); ?>" grup="F" position="<?= $i; ?>"></a>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
        <div class="seat-row">
            <?php for ($i = 5; $i <= 11; $i++) : ?>
                <!-- Lakukan Pengecekan Key -->
                <?php $key = array_search($i, array_column($grupF, 'position')); ?>
                <?php if (!empty($key) || $key === 0) : ?>
                    <a class="seat seat-vertical" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)" id="<?= rand($i * 200, $i * 399); ?>" grup="F" position="<?= $i; ?>">
                        <?= $grupF[$key]['model_code'] . " | " . $grupF[$key]['license_plate']; ?>
                    </a>
                <?php else : ?>
                    <a class="seat seat-vertical" draggable="true" ondragstart="drag(event)" ondrop="drop(event)" ondragover="allowDrop(event)" id="<?= rand($i * 200, $i * 399); ?>" grup="F" position="<?= $i; ?>"></a>
                <?php endif; ?>
            <?php endfor; ?>
            <div class="seat seat-vertical opacity-0"></div>
        </div>

        <!----------- Bottom Nav ---------->
        <nav class="bottom-nav">
            <a class="success-button">
                <span class="material-icons">
                    chevron_left
                </span>
                Prev
            </a>
            <a href="/parkir/stall_bp.html" class="success-button">
                Next
                <span class="material-icons">
                    navigate_next
                </span>
            </a>
        </nav>


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
                                <input type="hidden" class="form-control" id="detailLokasi" name="lokasi" value="DEPAN" readonly>
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
                                <input type="hidden" class="form-control" id="lokasi" name="lokasi" value="DEPAN" readonly>
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

    </main>
</section>

<script>
</script>

<?= $this->endSection(); ?>


<!-- SCRIPT -->
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