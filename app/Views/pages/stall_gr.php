<?= $this->extend('templates/app'); ?>

<?= $this->section('content'); ?>
<section>
    <div class="header">
        <h4>Area Stall GR</h4>
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

        <br><br>
        <div class="seat-row">
            <div class="kantin">
                KANTIN
            </div>
            <?php for ($i = 1; $i <= 20; $i++) : ?>
                <a href="" class="seat seat-vertical"></a>
            <?php endfor; ?>
        </div>

        <div class="seat-row">
            <?php for ($i = 1; $i <= 15; $i++) : ?>
                <a href="" class="seat-shadow seat-horizontal"></a>
            <?php endfor; ?>
        </div>
        <div class="seat-row">
            <?php for ($i = 1; $i <= 15; $i++) : ?>
                <a href="" class="seat-shadow seat-horizontal"></a>
            <?php endfor; ?>
        </div>

        <br><br><br>
        <div class="kantor shadow">
            Gedung Akastra
        </div>

        <!----------- Bottom Nav ---------->
        <nav class="bottom-nav justify-content-center">
            <a href="/parkir/stall_bp" class="success-button">
                <span class="material-icons">
                    chevron_left
                </span>
                Prev
            </a>
        </nav>
    </main>
</section>
<?= $this->endSection(); ?>


<?= $this->section('script'); ?>
<script>
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