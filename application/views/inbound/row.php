<?php
foreach ($activity->result() as $data) {
?>
    <tr>
        <td>
            <div class="card card-time">
                <div class="card-body text-left">
                    <div class="text-left mb-2" id="">
                        <span>SJ No : <strong id="sj<?= $data->id ?>"><?= $data->no_sj ?></strong></span>
                        <br>
                        <span>Qty : <strong id="qty<?= $data->id ?>"><?= $data->qty ?></strong></span>
                        <br>
                        <span>Date: <strong id="dt<?= $data->id ?>"><?= $data->tanggal ?></strong></span>
                        <br>
                        <span>Checker: <strong id="ch<?= $data->id ?>"><?= $data->checker ?></strong></span>
                    </div>
                </div>
            </div>
        </td>
        <td>
            <div class="card card-time">
                <div class="card-body text-left">
                    <div id="clockUnloading"></div>
                    <div class="text-left mb-2">
                        <span>Start : <strong id="logStartUnloading<?= $data->id ?>"><?= $data->start_unloading ?></strong></span>
                        <br>
                        <span>Stop : <strong id="logStopUnloading<?= $data->id ?>"><?= $data->stop_unloading ?></strong></span>
                        <br>
                        <span>Duration: <strong id="durationUnloading<?= $data->id ?>"><?= $data->duration_unloading ?></strong></span>
                    </div>
                    <div class="hstack gap-2 justify-content-center">
                        <?php if ($data->start_unloading == null && $data->stop_unloading == null) { ?>
                            <button class="btn btn-sm btn-success" onclick="startClock(this)" data-id="<?= $data->id ?>" data-activity-start="start_unloading" , data-activity-stop="stop_unloading" , data-log-start="logStartUnloading<?= $data->id ?>" data-log-stop="logStopUnloading<?= $data->id ?>" data-duration="durationUnloading<?= $data->id ?>">
                                <i class=" ri-play-circle-line align-bottom me-1"></i> Start
                            </button>
                        <?php
                        } else if ($data->start_unloading != null && $data->stop_unloading != null) {
                        ?>
                            <button class="btn btn-sm btn-danger" onclick="stopClock(this)" data-id="<?= $data->id ?>" data-activity-start="start_unloading" , data-activity-stop="stop_unloading" , data-log-start="logStartUnloading<?= $data->id ?>" data-log-stop="logStopUnloading<?= $data->id ?>" data-duration="durationUnloading<?= $data->id ?>" disabled="disabled">
                                <i class="ri-stop-circle-line align-bottom me-1"></i> Stop
                            </button>
                        <?php
                        } else {
                        ?>
                            <button class="btn btn-sm btn-danger" onclick="stopClock(this)" data-id="<?= $data->id ?>" data-activity-start="start_unloading" , data-activity-stop="stop_unloading" , data-log-start="logStartUnloading<?= $data->id ?>" data-log-stop="logStopUnloading<?= $data->id ?>" data-duration="durationUnloading<?= $data->id ?>">
                                <i class="ri-stop-circle-line align-bottom me-1"></i> Stop
                            </button>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </td>
        <td>
            <div class="card card-time">
                <div class="card-body text-left">
                    <div id="clockChecking"></div>
                    <div class="text-left mb-2">
                        <span>Start : <strong id="logStartChecking<?= $data->id ?>"><?= $data->start_checking ?></strong></span>
                        <br>
                        <span>Stop : <strong id="logStopChecking<?= $data->id ?>"><?= $data->stop_checking ?></strong></span>
                        <br>
                        <span>Duration: <strong id="durationChecking<?= $data->id ?>"><?= $data->duration_checking ?></strong></span>
                    </div>
                    <div class="hstack gap-2 justify-content-center">

                        <?php if ($data->start_checking == null && $data->stop_checking == null) { ?>
                            <button class="btn btn-success btn-sm" onclick="startClock(this)" data-id="<?= $data->id ?>" data-activity-start="start_checking" , data-activity-stop="stop_checking" , data-log-start="logStartChecking<?= $data->id ?>" data-log-stop="logStopChecking<?= $data->id ?>" data-duration="durationChecking<?= $data->id ?>">
                                <i class=" ri-play-circle-line align-bottom me-1"></i> Start
                            </button>
                        <?php
                        } else if ($data->start_checking != null && $data->stop_checking != null) {
                        ?>
                            <button class="btn btn-danger btn-sm" onclick="stopClock(this)" data-id="<?= $data->id ?>" data-activity-start="start_checking" , data-activity-stop="stop_checking" , data-log-start="logStartChecking<?= $data->id ?>" data-log-stop="logStopChecking<?= $data->id ?>" data-duration="durationChecking<?= $data->id ?>" disabled="disabled">
                                <i class=" ri-stop-circle-line align-bottom me-1"></i> Stop
                            </button>
                        <?php
                        } else {
                        ?>
                            <button class="btn btn-danger btn-sm" onclick="stopClock(this)" data-id="<?= $data->id ?>" data-activity-start="start_checking" , data-activity-stop="stop_checking" , data-log-start="logStartChecking<?= $data->id ?>" data-log-stop="logStopChecking<?= $data->id ?>" data-duration="durationChecking<?= $data->id ?>">
                                <i class=" ri-stop-circle-line align-bottom me-1"></i> Stop
                            </button>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </td>
        <td>
            <div class="card card-time">
                <div class="card-body text-left">
                    <div id="clockPutaway"></div>
                    <div class="text-left mb-2">
                        <span>Start : <strong id="logStartPutaway<?= $data->id ?>"><?= $data->start_putaway ?></strong></span>
                        <br>
                        <span>Stop : <strong id="logStopPutaway<?= $data->id ?>"><?= $data->stop_putaway ?></strong></span>
                        <br>
                        <span>Duration: <strong id="durationPutaway<?= $data->id ?>"><?= $data->duration_putaway ?></strong></span>
                    </div>
                    <div class="hstack gap-2 justify-content-center">

                        <?php if ($data->start_putaway == null && $data->stop_putaway == null) { ?>
                            <button class="btn btn-success btn-sm" onclick="startClock(this)" data-id="<?= $data->id ?>" data-activity-start="start_putaway" , data-activity-stop="stop_putaway" , data-log-start="logStartPutaway<?= $data->id ?>" data-log-stop="logStopPutaway<?= $data->id ?>" data-duration="durationPutaway<?= $data->id ?>">
                                <i class=" ri-play-circle-line align-bottom me-1"></i> Start
                            </button>

                        <?php
                        } else if ($data->start_putaway != null && $data->stop_putaway != null) {
                        ?>

                            <button class="btn btn-danger btn-sm" onclick="stopClock(this)" data-id="<?= $data->id ?>" data-activity-start="start_putaway" , data-activity-stop="stop_putaway" , data-log-start="logStartPutaway<?= $data->id ?>" data-log-stop="logStopPutaway<?= $data->id ?>" data-duration="durationPutaway<?= $data->id ?>" disabled="disabled">
                                <i class=" ri-stop-circle-line align-bottom me-1"></i> Stop
                            </button>

                        <?php
                        } else {
                        ?>

                            <button class="btn btn-danger btn-sm" onclick="stopClock(this)" data-id="<?= $data->id ?>" data-activity-start="start_putaway" , data-activity-stop="stop_putaway" , data-log-start="logStartPutaway<?= $data->id ?>" data-log-stop="logStopPutaway<?= $data->id ?>" data-duration="durationPutaway<?= $data->id ?>">
                                <i class=" ri-stop-circle-line align-bottom me-1"></i> Stop
                            </button>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </td>
        <td>
            <div class="hstack gap-3 flex-wrap">
                <button onclick="showModalEdit(this)" 
                data-id="<?= $data->id ?>" 
                data-id-sj="sj<?= $data->id ?>" 
                data-id-qty="qty<?= $data->id ?>" 
                data-id-dt="dt<?= $data->id ?>" 
                data-id-ch="ch<?= $data->id ?>" 
                data-check-id="<?= $data->checker_id ?>" 
                class="link-success fs-15"><i class="ri-edit-2-line"></i></button>
                <button class="link-danger fs-15" onclick="deleteRow(this);" data-id="<?= $data->id ?>"><i class="ri-delete-bin-line"></i></button>
            </div>
        </td>
    </tr>

<?php
}
?>