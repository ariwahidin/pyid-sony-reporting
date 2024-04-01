<?php foreach ($task->result() as $data) { ?>
    <div class="row">
        <div class="col">
            <div class="card bg-success-subtle">
                <div class="card-header bg-primary-subtle">
                    <div style="font-size: 11px;" class="row">
                        <div class="col-md-3 col-6 ps-3">
                            <p class="m-0">Activity Date : <span><?= date('Y-m-d', strtotime($data->created_date)) ?></span></p>
                            <p class="m-0">PL Date : <span><?= date('Y-m-d', strtotime($data->pl_date)) ?></span></p>
                            <p class="m-0">PL No : <span class=""><?= $data->no_pl ?></span></p>
                            <p class="m-0">PL Time : <span><?= $data->pl_time == null ? '' : date('H:i', strtotime($data->pl_time)) ?></span></p>
                            <p class="m-0">Checker : <span><?= $data->checker_name ?></span></p>
                            <p class="m-0">Qty : <span><?= $data->qty ?></span></p>
                        </div>
                        <div class="col-md-2 col-6">
                            <p class="m-0">No Truck : <span><?= $data->no_truck ?></span></p>
                            <p class="m-0">Ekspedisi : <span><?= $data->ekspedisi_name ?></span></p>
                            <p class="m-0">Driver : <span><?= $data->driver ?></span></p>
                            <p class="m-0">Remarks : <span><?= $data->remarks ?></span></p>
                        </div>
                        <?php if ($_SESSION['user_data']['role'] != 4) { ?>
                            <div class="col-md-6 pt-1">
                                <button class="btn btn-sm btn-primary btnEdit" data-id="<?= $data->id ?>">Edit</button>
                                <button class="btn btn-sm btn-danger btnDelete" data-id="<?= $data->id ?>">Delete</button>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-animate">
                                <div class="card-header p-2 ps-3">
                                    <span class="m-0 fw-semibold fs-14">Picking</span>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="flex-shrink-0">
                                            <h5 class="text-success fs-14 mb-0">
                                                <span class="text-muted">Start : </span>
                                                <span class="text-muted"><?= $data->start_picking == null ? '' : date('H:i', strtotime($data->start_picking)) ?></span>
                                            </h5>
                                            <h5 class="text-success fs-14 mb-0">
                                                <span class="text-muted">Stop : </span>
                                                <span class="text-muted"><?= $data->stop_picking == null ? '' : date('H:i', strtotime($data->stop_picking)) ?></span>
                                            </h5>
                                            <h5 class="text-success fs-14 mb-0">
                                                <span class="text-muted">Duration : </span>
                                                <span class="text-muted"><?= countDuration($data->start_picking, $data->stop_picking) ?></span>
                                            </h5>
                                        </div>
                                        <div class="align-items-end">
                                            <div class="avatar-sm flex-shrink-0">
                                                <?php
                                                if ($data->start_picking === null && $data->stop_picking === null) {
                                                ?>
                                                    <button class="btn btn-sm btn-success rounded fs-2 btnPicking" data-id="<?= $data->id ?>" data-proses="start_picking">
                                                        <i class="bx bx-play"></i>
                                                    </button>
                                                <?php
                                                } elseif ($data->start_picking != null && $data->stop_picking === null) {
                                                ?>
                                                    <button class="btn btn-sm btn-danger rounded fs-2 btnPicking" data-id="<?= $data->id ?>" data-proses="stop_picking">
                                                        <i class="bx bx-stop"></i>
                                                    </button>
                                                <?php
                                                } else {
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-animate">
                                <div class="card-header p-2 ps-3">
                                    <span class="m-0 fw-semibold fs-14">Checking</span>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="flex-shrink-0">
                                            <h5 class="text-success fs-14 mb-0">
                                                <span class="text-muted">Start : </span>
                                                <span class="text-muted"><?= $data->start_checking === null ? '' : date('H:i', strtotime($data->start_checking)) ?></span>
                                            </h5>
                                            <h5 class="text-success fs-14 mb-0">
                                                <span class="text-muted">Stop : </span>
                                                <span class="text-muted"><?= $data->stop_checking === null ? '' : date('H:i', strtotime($data->stop_checking)) ?></span>
                                            </h5>
                                            <h5 class="text-success fs-14 mb-0">
                                                <span class="text-muted">Duration : </span>
                                                <span class="text-muted"><?= countDuration($data->start_checking, $data->stop_checking) ?></span>
                                            </h5>
                                        </div>
                                        <div class="align-items-end">
                                            <div class="avatar-sm flex-shrink-0">
                                                <?php
                                                if ($data->start_checking === null && $data->stop_checking === null) {
                                                ?>
                                                    <button class="btn btn-sm btn-success rounded fs-2 btnChecking" data-id="<?= $data->id ?>" data-proses="start_checking">
                                                        <i class="bx bx-play"></i>
                                                    </button>
                                                <?php
                                                } elseif ($data->start_checking != null && $data->stop_checking === null) {
                                                ?>
                                                    <button class="btn btn-sm btn-danger rounded fs-2 btnChecking" data-id="<?= $data->id ?>" data-proses="stop_checking">
                                                        <i class="bx bx-stop"></i>
                                                    </button>
                                                <?php
                                                } else {
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-animate">
                                <div class="card-header p-2 ps-3">
                                    <span class="m-0 fw-semibold fs-14">Scanning</span>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="flex-shrink-0">
                                            <h5 class="text-success fs-14 mb-0">
                                                <span class="text-muted">Start : </span>
                                                <span class="text-muted"><?= $data->start_scanning === null ? '' : date('H:i', strtotime($data->start_scanning)) ?></span>
                                            </h5>
                                            <h5 class="text-success fs-14 mb-0">
                                                <span class="text-muted">Stop : </span>
                                                <span class="text-muted"><?= $data->stop_scanning === null ? '' : date('H:i', strtotime($data->stop_scanning)) ?></span>
                                            </h5>
                                            <h5 class="text-success fs-14 mb-0">
                                                <span class="text-muted">Duration : </span>
                                                <span class="text-muted"><?= countDuration($data->start_scanning, $data->stop_scanning) ?></span>
                                            </h5>
                                        </div>
                                        <div class="align-items-end">
                                            <div class="avatar-sm flex-shrink-0">
                                                <div class="avatar-sm flex-shrink-0">
                                                    <?php
                                                    if ($data->start_scanning === null && $data->stop_scanning === null) {
                                                    ?>
                                                        <button class="btn btn-sm btn-success rounded fs-2 btnScanning" data-id="<?= $data->id ?>" data-proses="start_scanning">
                                                            <i class="bx bx-play"></i>
                                                        </button>
                                                    <?php
                                                    } elseif ($data->start_scanning != null && $data->stop_scanning === null) {
                                                    ?>
                                                        <button class="btn btn-sm btn-danger rounded fs-2 btnScanning" data-id="<?= $data->id ?>" data-proses="stop_scanning">

                                                            <i class="bx bx-stop"></i>
                                                        </button>
                                                    <?php
                                                    } else {
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php } ?>