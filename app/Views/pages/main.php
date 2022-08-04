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
                    <div class="legend legend-active"></div>
                    Parkir Terisi
                </div>
                <div class="desc-wrap">
                    <div class="legend legend-empty"></div>
                    Parkir Kosong
                </div>
                <div class="desc-wrap">
                    <div class="legend legend-internal"></div>
                    Internal
                </div>
            </div>
        </div>

        <div class="kantor shadow">
            Gedung Akastra
        </div>

        <!-------- GRUP A ------->
        <div class="seat-row">
            <?php for ($i = 1; $i <= 8; $i++) : ?>
                <?php $key = array_search($i, array_column($grupA, 'position')); ?>
                <?php if (!empty($key) || $key === 0) : ?>
                    <a class="<?= ($grupA[$key]['status'] == 'Internal') ? "seat-internal" : "seat"; ?> seat-vertical text-white" draggable="true" ondragstart="drag(event)" grup="A" position="<?= $i; ?>" id="A<?= $i; ?>">
                        <?= $grupA[$key]['model_code'] . " | " . $grupA[$key]['license_plate']; ?>
                    </a>
                <?php else : ?>
                    <!-- Defaul Value -->
                    <a class="seat seat-vertical text-white" grup="A" position="<?= $i; ?>" id="A<?= $i; ?>" ondrop="drop(event, this)" ondragover="allowDrop(event)"></a>
                <?php endif; ?>
            <?php endfor; ?>
        </div>

        <!---------------- Jalan Utama ------------------->
        <!--------- GRUP B -------->
        <div class="seat-row">
            <?php for ($i = 1; $i <= 5; $i++) : ?>
                <?php $key = array_search($i, array_column($grupB, 'position')); ?>
                <?php if (!empty($key) || $key === 0) : ?>
                    <a class="<?= ($grupB[$key]['status'] == 'Internal') ? "seat-internal" : "seat"; ?> seat-horizontal text-white" grup="B" position="<?= $i; ?>">
                        <?= $grupB[$key]['model_code']; ?>
                    </a>
                <?php else : ?>
                    <!-- Defaul Value -->
                    <a class="seat-shadow seat-horizontal text-white" grup="B" position="<?= $i; ?>"></a>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
        <div class="seat-row">
            <?php for ($i = 6; $i <= 10; $i++) : ?>
                <?php $key = array_search($i, array_column($grupB, 'position')); ?>
                <?php if (!empty($key) || $key === 0) : ?>
                    <a class="<?= ($grupB[$key]['status'] == 'Internal') ? "seat-internal" : "seat"; ?> seat-horizontal text-white" grup="B" position="<?= $i; ?>">
                        <?= $grupB[$key]['model_code']; ?>
                    </a>
                <?php else : ?>
                    <!-- Defaul Value -->
                    <a class="seat-shadow seat-horizontal text-white" grup="B" position="<?= $i; ?>"></a>
                <?php endif; ?>
            <?php endfor; ?>
        </div>


        <br>
        <!---------------- Area Pos Satpam    -------------->
        <!------------ GRUP C ----------------------------->
        <div class="seat-row">
            <?php for ($i = 1; $i <= 5; $i++) : ?>
                <?php if ($i == 1) : ?>
                    <?php $key = array_search($i, array_column($grupC, 'position')); ?>
                    <?php if (!empty($key) || $key === 0) : ?>
                        <a class="<?= ($grupC[$key]['status'] == 'Internal') ? "seat-internal" : "seat"; ?> seat-vertical text-white" grup="C" position="<?= $i; ?>">
                            <?= $grupC[$key]['model_code']; ?>
                        </a>
                    <?php else : ?>
                        <!-- Defaul Value -->
                        <a class="seat-shadow seat-vertical text-white" grup="C" position="<?= $i; ?>"></a>
                    <?php endif; ?>
                <?php else : ?>
                    <?php $key = array_search($i, array_column($grupC, 'position')); ?>
                    <?php if (!empty($key) || $key === 0) : ?>
                        <a class="<?= ($grupC[$key]['status'] == 'Internal') ? "seat-internal" : "seat"; ?> seat-vertical text-white" grup="C" position="<?= $i; ?>">
                            <?= $grupC[$key]['model_code']; ?>
                        </a>
                    <?php else : ?>
                        <!-- Defaul Value -->
                        <a class="seat seat-vertical text-white" grup="C" position="<?= $i; ?>"></a>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endfor; ?>

            <div class="pos seat-vertical">
                POS
            </div>
        </div>

        <div class="seat-row">
            <?php for ($i = 6; $i <= 9; $i++) : ?>
                <?php if ($i == 6) : ?>
                    <a class="seat-shadow seat-vertical" grup="C" position="<?= $i; ?>"></a>
                <?php else : ?>
                    <a class="seat seat-vertical" grup="C" position="<?= $i; ?>"></a>
                <?php endif; ?>
            <?php endfor; ?>
            <div class="seat-vertical opacity-0"></div>
            <div class="seat-vertical opacity-0"></div>
        </div>



        <!----------------- GRUP D ---------------------->
        <div class="seat-row">
            <div class="seat-shadow seat-horizontal" grup="D" position="1"></div>
        </div>
        <div class="seat-row">
            <?php for ($i = 2; $i <= 5; $i++) : ?>
                <a class="seat-shadow seat-horizontal" grup="D" position="<?= $i; ?>"></a>
            <?php endfor; ?>
        </div>


        <!--------------- GRUP E ------------------------>
        <div class="seat-row">
            <?php for ($i = 1; $i <= 7; $i++) : ?>
                <?php if ($i == 1 || $i == 2) : ?>
                    <a class="seat-shadow seat-vertical" grup="E" position="<?= $i; ?>"></a>
                <?php else : ?>
                    <a class="seat seat-vertical" grup="E" position="<?= $i; ?>"></a>
                <?php endif; ?>
            <?php endfor; ?>
        </div>

        <!------------- GRUP F -------------------------->
        <div class="seat-row">
            <?php for ($i = 1; $i <= 4; $i++) : ?>
                <a class="seat-shadow seat-horizontal" grup="F" position="<?= $i; ?>"></a>
            <?php endfor; ?>
        </div>
        <div class="seat-row">
            <?php for ($i = 5; $i <= 11; $i++) : ?>
                <a class="seat seat-vertical" grup="F" position="<?= $i; ?>"></a>
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



        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header boder-0">
                        <h5 class="modal-title border-0" id="exampleModalLabel">Seat Detail</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body border-0">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="grup" name="grup" readonly>
                            <input type="text" class="form-control" id="posisi" name="posisi" readonly>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-secondary">Update Perubahan</button>
                    </div>
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
        $('.seat-vertical, .seat-horizontal').click(function(e) {
            e.preventDefault();

            //----- Ambil grup dan posisi
            var grup = $(this).attr('grup');
            var position = $(this).attr('position');

            $("#grup").val(grup);
            $("#posisi").val(position);

            $("#addModal").modal('show');
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

        ev.dataTransfer.setData("grup", String(group));
        ev.dataTransfer.setData("posisi", String(posisi));
        ev.dataTransfer.setData("id", String(id));
    }

    function drop(ev) {
        ev.preventDefault();
        var grup = ev.dataTransfer.getData("grup", grup);
        var posisi = ev.dataTransfer.getData("posisi", posisi);
        var prevId = ev.dataTransfer.getData("id", posisi);

        var newGrup = ev.target.getAttribute('grup');
        var newPosisi = ev.target.getAttribute('position');
        var newId = ev.target.id;

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
                location.reload();
                // $(`#${newId}`).html(response['model_code']);
                // $(`#${prevId}`).html("");
            }
        });
    }
</script>
<?= $this->endSection(); ?>