<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Parkir | Depan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/parkir/depan/style.css">

    <!-- Material Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>

    <!-- Interact.JS -->
    <script src="https://cdn.jsdelivr.net/npm/interactjs/dist/interact.min.js"></script>

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</head>

<body>

    <section class="main-section">
        <h1 class="headline">Area Parkir</h1>
        <div class="main-area" id="main-area">
            <div class="legend">
                <h6 class="text-lato">Keterangan</h6>
                <div class="legend-wrap">
                    <div class="legend-orange"></div>
                    Gedung
                    <div class="legend-blue"></div>
                    Parkiran GR
                    <div class="legend-yellow"></div>
                    Parkiran BP
                    <div class="legend-dash"></div>
                    Parkiran Bayangan
                </div>
            </div>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex w-100 parkir-wrap justify-content-between">

                            <div class="gedung-wrap">
                                <img src="/assets/gedung-akastra.png" class="gedung">
                            </div>

                            <!-- Area Parkir Depan -->
                            <div class="d-flex flex-column justify-content-between align-items-center" style="padding-right: 20px;">

                                <!-- Parkiran GR -->
                                <div class="d-flex gap-1 w-100 justify-content-end">
                                    <?php for ($i = 1; $i <= 9; $i++) : ?>
                                        <a class="seat-blue seat-vertical text-white"></a>
                                    <?php endfor; ?>
                                </div>
                                <!-- Batas Parkiran GR -->

                                <!-- Jalan Parkiran Bayangan GR -->
                                <div class="d-flex-column gap-1 w-100 justify-content-end">
                                    <?php for ($i = 1; $i <= 2; $i++) : ?>
                                        <div class="d-flex gap-2 my-2">
                                            <?php for ($o = 1; $o <= 5; $o++) : ?>
                                                <a class="seat seat-horizontal text-dark" id="<?= rand($i * time(), 10 * time()); ?>"></a>
                                            <?php endfor; ?>
                                        </div>
                                    <?php endfor; ?>
                                </div>
                                <!-- Batas Jalan Parkiran Bayangan GR -->

                                <!-- Parkiran Dekat Satpam -->
                                <div class="d-flex flex-column gap-1 w-100">
                                    <?php for ($i = 1; $i <= 2; $i++) : ?>
                                        <div class="d-flex gap-1 justify-content-end">
                                            <?php for ($o = 1; $o <= 5; $o++) : ?>
                                                <?php $seat = 'seat-blue text-white'; ?>
                                                <?php if ($o == 1) $seat = 'seat text-dark'; ?>
                                                <a class="<?= $seat; ?> seat-vertical" id="<?= rand($i * time(), 10 * time()); ?>"></a>
                                            <?php endfor; ?>
                                            <div class="security-office">
                                                <?= ($i == 1) ? '<span class="material-symbols-outlined">lock</span> Pos Satpam' : "Parkir Motor"; ?>
                                            </div>
                                        </div>
                                    <?php endfor; ?>
                                </div>
                                <!-- Batas Parkiran Dekat Satpam -->


                                <div class="d-flex flex-column mt-3 w-100">
                                    <?php for ($i = 1; $i <= 2; $i++) : ?>
                                        <?php $maximum = 3;
                                        ($i == 2) ? $maximum = 2 : ""; ?>
                                        <div class="d-flex mt-2 gap-1 justify-content-end w-80">
                                            <?php for ($o = 1; $o <= $maximum; $o++) : ?>
                                                <a class="seat seat-horizontal" id="<?= rand($i * time(), 10 * time()); ?>"></a>
                                            <?php endfor; ?>
                                            <div class="parkiran-motor-2">
                                                Parkir Motor
                                            </div>
                                        </div>
                                    <?php endfor; ?>
                                </div>
                                <div class="d-flex mt-2 gap-1 justify-content-end w-100">
                                    <p class="text-label-vertical-reverse">- Area Parkir BP -</p>
                                    <a class="seat seat-vertical"></a>
                                    <a class="seat seat-vertical"></a>
                                    <a class="seat-yellow seat-vertical"></a>
                                    <a class="seat-yellow seat-vertical"></a>
                                    <a class="seat-yellow seat-vertical"></a>
                                    <a class="seat-yellow seat-vertical">
                                        AV | BMUIKS <br> GR
                                    </a>
                                    <a class="seat-yellow seat-vertical"></a>
                                </div>
                                <div class="d-flex mt-2 gap-1 justify-content-end w-100">
                                    <a class="seat seat-horizontal"></a>
                                    <a class="seat seat-horizontal"></a>
                                    <a class="seat seat-horizontal"></a>
                                    <a class="seat seat-horizontal"></a>
                                </div>
                                <div class="d-flex mt-2 gap-1 justify-content-end w-100">
                                    <a class="seat seat-horizontal"></a>
                                    <a class="seat seat-horizontal"></a>
                                    <a class="seat seat-horizontal"></a>
                                </div>
                                <div class="d-flex mt-2 gap-1 justify-content-end w-100 px-4 mb-5">
                                    <a class="seat-yellow seat-vertical"></a>
                                    <a class="seat-yellow seat-vertical"></a>
                                    <a class="seat-yellow seat-vertical"></a>
                                    <a class="seat-yellow seat-vertical"></a>
                                    <a class="seat-yellow seat-vertical"></a>
                                    <a class="seat-yellow seat-vertical"></a>
                                    <a class="seat-yellow seat-vertical"></a>
                                    <a class="seat-yellow seat-vertical"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <nav class="bottom-nav">
            <a class="cancel-button">
                Back
            </a>
            <a class="next-button">
                Next
            </a>
        </nav>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <script>
        var drag_pos = {
            x: 0,
            y: 0
        }

        interact('.seat-vertical').dropzone({
            ondropactivate: function(event) {
                event.target.classList.add('drop-active')
                console.log(event.target);
            },
            ondragenter: function(event) {
                var dropId = event.target.id
                $(`#${dropId}`).addClass('drop');
            },
            ondragleave: function(event) {
                var dropId = event.target.id
                $(`#${dropId}`).removeClass('drop');
            },
            ondrop: function(event) {
                var dropId = event.target.id;
                var dragId = event.relatedTarget.id;
                var html = $(`#${dragId}`).html();
                if (!html) {
                    alert("Parkiran kosong");
                } else {
                    $(`#${dropId}`).html(html);
                    $(`#${dragId}`).html('');
                }

                var dropId = event.target.id
                $(`#${dropId}`).removeClass('drop');
                console.log(dropId, dragId);
            },
            ondropdeactivate: function(event) {}
        })


        //---- Dragging function
        interact('.seat-vertical')
            .draggable({
                inertia: true,
                modifiers: [
                    interact.modifiers.restrictRect({
                        // restriction: 'parent',
                        endOnly: true
                    })
                ],
                autoScroll: false,
                listeners: {
                    move: dragging,
                    end: dragged
                }
            });

        function dragMoveListener(event) {
            var target = event.target,
                // keep the dragged position in the data-x/data-y attributes
                x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx,
                y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;

            // translate the element
            target.style.webkitTransform =
                target.style.transform =
                'translate(' + x + 'px, ' + y + 'px)';

            // update the posiion attributes
            target.setAttribute('data-x', x);
            target.setAttribute('data-y', y);
        }

        function dragging(e) {
            drag_pos.x += e.dx;
            drag_pos.y += e.dy;
            $("#main-area").css('overflow', 'hidden');
            e.target.style.transform = 'translate(' + drag_pos.x + 'px, ' + drag_pos.y + 'px)';
        }

        function dragged(e) {
            drag_pos.x = 0;
            drag_pos.y = 0;
            $("#main-area").css('overflow', 'auto');
            e.target.style.transform = 'translate(0px, 0px)';
        }
    </script>
</body>

</html>