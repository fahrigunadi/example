<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Seat!</title>
</head>

<body>
    <div class="container-sm">
        <h1>Seat</h1>
        <?php
        $row = $_GET['row'] ?? 10;
        $column = $_GET['column'] ?? 4;

        $layout = [];

        for ($i = 1; $i <= $row; $i++) {
            for ($j = 1; $j <= $column; $j++) {
                $layout[$i][$j] = ['kursi', 'space', 'supir'][rand(0, 2)];
            }
        }
        echo json_encode($layout);
       ?>
        <div class="card">
            <div class="card-body p-5">

                <?php foreach ($layout as $indexCol => $cols) { ?>
                    <div class="row mb-3">
                        <?php foreach ($cols as $key => $col) { ?>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Row <?= $indexCol ?> - col <?= $key ?></h5>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Pilih Seat</option>
                                            <option value="kursi" <?= $col == 'kursi' ? 'selected' : '' ?>>Kursi</option>
                                            <option value="supir" <?= $col == 'supir' ? 'selected' : '' ?>>Supir</option>
                                            <option value="space" <?= $col == 'space' ? 'selected' : '' ?>>Space</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="text-center mt-5 mb-5">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Contoh Modal
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Seat</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?php
                            function numberToChar($number)
                            {
                                $char = '';

                                while ($number > 0) {
                                    $mod = ($number - 1) % 26;
                                    $char = chr($mod + 65) . $char;
                                    $number = floor(($number - 1) / 26);
                                }

                                return $char;
                            }
                            ?>
                            <?php foreach ($layout as $indexCol => $cols) { ?>
                                <div class="row mb-3">
                                    <?php
                                    $colKursi = 0;
                                    ?>
                                    <?php
                                    foreach ($cols as $key => $col) {
                                        if ($col === 'kursi') {
                                            $colKursi++;
                                        }
                                    ?>
                                        <div class="col">
                                            <div class="card">
                                                <div class="card-body">
                                                    <?php
                                                    if ($col === 'kursi') {
                                                        echo '<h5 class="card-title text-primary">' . $indexCol . numberToChar($colKursi) . '</h5>';
                                                    } else if ($col === 'supir') {
                                                        echo '<h5 class="card-title text-secondary">Supir</h5>';
                                                    } else if ($col === 'space') {
                                                        echo '<h5 class="card-title text-white">Space</h5>';
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
