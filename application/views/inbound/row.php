<tr>
    <td>
        <div class="card card-time">
            <div class="card-body text-left">
                <div class="text-left mb-2" id="">
                    <span>SJ No : <strong id=""><?= $activity->no_sj ?></strong></span>
                    <br>
                    <span>Qty : <strong id=""><?= $activity->qty ?></strong></span>
                    <br>
                    <span>Date: <strong id=""><?= $activity->tanggal ?></strong></span>
                    <br>
                    <span>Checker: <strong id=""><?= $activity->checker ?></strong></span>
                </div>
            </div>
        </div>
    </td>
    <td>
        <div class="card card-time">
            <div class="card-body text-left">
                <div id="clockUnloading"></div>
                <div class="text-left mb-2">
                    <span>Start : <strong id="logStartUnloading"></strong></span>
                    <br>
                    <span>Stop : <strong id="logStopUnloading"></strong></span>
                    <br>
                    <span>Duration: <strong id="duration"></strong></span>
                </div>
                <div class="hstack gap-2 justify-content-center">
                    <button class="btn btn-success btn-sm" id="startButtonUnloading" onclick="startClock(this,'clockUnloading<','logStartUnloading','logStopUnloading' )"><i class=" ri-play-circle-line align-bottom me-1"></i> Start</button>
                </div>
            </div>
        </div>
    </td>
    <td>
        <div class="card card-time">
            <div class="card-body text-left">
                <div class="text-left mb-2">
                    <span>Start : <strong id=""></strong></span>
                    <br>
                    <span>Stop : <strong id=""></strong></span>
                    <br>
                    <span>Duration: <strong id=""></strong></span>
                </div>
                <div class="hstack gap-2 justify-content-center">
                    <button class="btn btn-success btn-sm" id="startButtonChecking" onclick="startClock(this)"><i class=" ri-play-circle-line align-bottom me-1"></i> Start</button>
                </div>
            </div>
        </div>
    </td>
    <td>
        <div class="card card-time">
            <div class="card-body text-left">
                <div id="clock"></div>
                <div class="text-left mb-2">
                    <span>Start : <strong id="logStart"></strong></span>
                    <br>
                    <span>Stop : <strong id="logStop"></strong></span>
                    <br>
                    <span>Duration: <strong id="duration"></strong></span>
                </div>
                <div class="hstack gap-2 justify-content-center">
                    <button class="btn btn-danger btn-sm stop-button" id="stopButton" onclick="stopClock()" disabled><i class="ri-stop-circle-line align-bottom me-1"></i> Stop</button>
                    <button class="btn btn-success btn-sm" id="startButtonPutaway" onclick="startClock(this)"><i class=" ri-play-circle-line align-bottom me-1"></i> Start</button>
                </div>
            </div>
        </div>
    </td>
</tr>