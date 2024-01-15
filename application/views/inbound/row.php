<?php
// var_dump($activity);
?>
<tr>
    <td>
        <div class="card card-time">
            <div class="card-body text-left">
                <div class="text-left mb-2" id="">
                    <span>SJ No : <strong id="sj<?=$activity->id?>"><?= $activity->no_sj ?></strong></span>
                    <br>
                    <span>Qty : <strong id="qty<?=$activity->id?>"><?= $activity->qty ?></strong></span>
                    <br>
                    <span>Date: <strong id="dt<?=$activity->id?>"><?= $activity->tanggal ?></strong></span>
                    <br>
                    <span>Checker: <strong id="ch<?=$activity->id?>"><?= $activity->checker ?></strong></span>
                </div>
            </div>
        </div>
    </td>
    <td>
        <div class="card card-time">
            <div class="card-body text-left">
                <div id="clockUnloading"></div>
                <div class="text-left mb-2">
                    <span>Start : <strong id="logStartUnloading<?= $activity->id ?>"></strong></span>
                    <br>
                    <span>Stop : <strong id="logStopUnloading<?= $activity->id ?>"></strong></span>
                    <br>
                    <span>Duration: <strong id="durationUnloading<?= $activity->id ?>"></strong></span>
                </div>
                <div class="hstack gap-2 justify-content-center">
                    <button class="btn btn-success btn-sm" onclick="startClock(this)" data-id="<?= $activity->id ?>" data-activity-start="start_unloading" , data-activity-stop="stop_unloading" , data-log-start="logStartUnloading<?= $activity->id ?>" data-log-stop="logStopUnloading<?= $activity->id ?>" data-duration="durationUnloading<?= $activity->id ?>">
                        <i class=" ri-play-circle-line align-bottom me-1"></i> Start
                    </button>
                </div>
            </div>
        </div>
    </td>
    <td>
        <div class="card card-time">
            <div class="card-body text-left">
                <div id="clockChecking"></div>
                <div class="text-left mb-2">
                    <span>Start : <strong id="logStartChecking<?= $activity->id ?>"></strong></span>
                    <br>
                    <span>Stop : <strong id="logStopChecking<?= $activity->id ?>"></strong></span>
                    <br>
                    <span>Duration: <strong id="durationChecking<?= $activity->id ?>"></strong></span>
                </div>
                <div class="hstack gap-2 justify-content-center">
                    <button class="btn btn-success btn-sm" onclick="startClock(this)" data-id="<?= $activity->id ?>" data-activity-start="start_checking" , data-activity-stop="stop_checking" , data-log-start="logStartChecking<?= $activity->id ?>" data-log-stop="logStopChecking<?= $activity->id ?>" data-duration="durationChecking<?= $activity->id ?>">
                        <i class=" ri-play-circle-line align-bottom me-1"></i> Start
                    </button>
                </div>
            </div>
        </div>
    </td>
    <td>
        <div class="card card-time">
            <div class="card-body text-left">
                <div id="clockPutaway"></div>
                <div class="text-left mb-2">
                    <span>Start : <strong id="logStartPutaway<?= $activity->id ?>"></strong></span>
                    <br>
                    <span>Stop : <strong id="logStopPutaway<?= $activity->id ?>"></strong></span>
                    <br>
                    <span>Duration: <strong id="durationPutaway<?= $activity->id ?>"></strong></span>
                </div>
                <div class="hstack gap-2 justify-content-center">
                    <button class="btn btn-success btn-sm" onclick="startClock(this)" data-id="<?= $activity->id ?>" data-activity-start="start_putaway" , data-activity-stop="stop_putaway" , data-log-start="logStartPutaway<?= $activity->id ?>" data-log-stop="logStopPutaway<?= $activity->id ?>" data-duration="durationPutaway<?= $activity->id ?>">
                        <i class=" ri-play-circle-line align-bottom me-1"></i> Start
                    </button>
                </div>
            </div>
        </div>
    </td>
    <td>
        <div class="hstack gap-3 flex-wrap">
            <button onclick="showModalEdit(this)" 
            data-id="<?= $activity->id ?>"
            data-id-sj="sj<?=$activity->id?>"
            data-id-qty="qty<?=$activity->id?>"
            data-id-dt="dt<?=$activity->id?>"
            data-id-ch="ch<?=$activity->id?>" 
            class="link-success fs-15"><i class="ri-edit-2-line"></i></button>
            <button class="link-danger fs-15"><i class="ri-delete-bin-line"></i></button>
        </div>
    </td>
</tr>