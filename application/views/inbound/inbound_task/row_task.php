<?php foreach ($task->result() as $data) { ?>
    <div class="row">
        <div class="col">
            <div class="card bg-success-subtle">
                <div class="card-header bg-primary-subtle">
                    <div class="row">
                        <div class="col-md-2 col-6">
                            <p class="m-0">SJ No : <span><?= $data->no_sj ?></span></p>
                            <p class="m-0">SJ Date : <span><?= date('Y-m-d', strtotime($data->tanggal)) ?></span></p>
                            <p class="m-0">Qty : <span><?= $data->qty ?></span></p>
                        </div>
                        <div class="col-md-2 col-6">
                            <p class="m-0">Kode Alokasi : <span>A 90</span></p>
                            <p class="m-0">Factory : <span>YMIJ</span></p>
                            <p class="m-0">Pic : <span><?= $data->checker ?></span></p>
                        </div>
                        <div class="col-md-6 pt-1">
                            <button class="btn btn-sm btn-primary">Edit</button>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card card-animate">
                                <div class="card-header p-2 ps-3">
                                    <span class="m-0 fw-semibold fs-14">Unloading</span>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="flex-shrink-0">
                                            <h5 class="text-success fs-14 mb-0">
                                                <span class="text-muted">Start : </span>
                                                <span class="text-muted"><?= $data->start_unloading == null ? '' : date('H:i', strtotime($data->start_unloading)) ?></span>
                                            </h5>
                                            <h5 class="text-success fs-14 mb-0">
                                                <span class="text-muted">Stop : </span>
                                                <span class="text-muted"><?= $data->stop_unloading == null ? '' : date('H:i', strtotime($data->stop_unloading)) ?></span>
                                            </h5>
                                            <h5 class="text-success fs-14 mb-0">
                                                <span class="text-muted">Duration : </span>
                                                <span class="text-muted"><?= countDuration($data->start_unloading, $data->stop_unloading) ?></span>
                                            </h5>
                                        </div>
                                        <div class="align-items-end">
                                            <div class="avatar-sm flex-shrink-0">
                                                <?php
                                                if ($data->start_unloading === null && $data->stop_unloading === null) {
                                                ?>
                                                    <button class="btn btn-sm btn-success rounded fs-2 btnUnloading" data-id="<?= $data->id ?>" data-proses="start_unloading">
                                                        <i class="bx bx-play"></i>
                                                    </button>
                                                <?php
                                                } elseif ($data->start_unloading != null && $data->stop_unloading === null) {
                                                ?>
                                                    <button class="btn btn-sm btn-danger rounded fs-2 btnUnloading" data-id="<?= $data->id ?>" data-proses="stop_unloading">
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
                                    <span class="m-0 fw-semibold fs-14">Putaway</span>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="flex-shrink-0">
                                            <h5 class="text-success fs-14 mb-0">
                                                <span class="text-muted">Start : </span>
                                                <span class="text-muted"><?= $data->start_putaway === null ? '' : date('H:i', strtotime($data->start_putaway)) ?></span>
                                            </h5>
                                            <h5 class="text-success fs-14 mb-0">
                                                <span class="text-muted">Stop : </span>
                                                <span class="text-muted"><?= $data->stop_putaway === null ? '' : date('H:i', strtotime($data->stop_putaway)) ?></span>
                                            </h5>
                                            <h5 class="text-success fs-14 mb-0">
                                                <span class="text-muted">Duration : </span>
                                                <span class="text-muted"><?= countDuration($data->start_putaway, $data->stop_putaway) ?></span>
                                            </h5>
                                        </div>
                                        <div class="align-items-end">
                                            <div class="avatar-sm flex-shrink-0">
                                                <div class="avatar-sm flex-shrink-0">
                                                    <?php
                                                    if ($data->start_putaway === null && $data->stop_putaway === null) {
                                                    ?>
                                                        <button class="btn btn-sm btn-success rounded fs-2 btnPutaway" data-id="<?= $data->id ?>" data-proses="start_putaway">
                                                            <i class="bx bx-play"></i>
                                                        </button>
                                                    <?php
                                                    } elseif ($data->start_putaway != null && $data->stop_putaway === null) {
                                                    ?>
                                                        <button class="btn btn-sm btn-danger rounded fs-2 btnPutaway" data-id="<?= $data->id ?>" data-proses="stop_putaway">

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