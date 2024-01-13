<style>
    .card-time {
        width: 200px;
    }

    .stop-button {
        display: none;
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Daily performance activity</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Inbound</a></li> -->
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Table activity</h4>
                <div class="flex-shrink-0">
                    <div class="form-check form-switch form-switch-right form-switch-md">
                        <button class="btn btn-success addMembers-modal" data-bs-toggle="modal" data-bs-target="#createTask"><i class="ri-add-fill me-1 align-bottom"></i> Create activity</button>
                    </div>
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="table-responsive mt-4 mt-xl-0">
                                <table class="table table-success table-striped table-nowrap align-middle mb-0" id="tableActivity">
                                    <thead>
                                        <tr>
                                            <th scope="col">Detail</th>
                                            <th scope="col">Unloading</th>
                                            <th scope="col">Checking</th>
                                            <th scope="col">Putaway</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // document.getElementById('stopButton').style.display = 'none';
    // var stopClockFlag = true; // Atur menjadi true agar jam tidak dimulai saat halaman dimuat
    // var startTime, stopTime;

    let dataActivity = [];

    function addRow() {
        // Sample data to be sent to row.php


        var rowActivity = {
            sj: $('#inNoSJ').val(),
            qty: $('#inQty').val(),
            date: $('#inDate').val(),
            checker: $('#inChecker').val(),
            startUnloading: null,
            stopUnloading: null,
            durationUnloading: null,
            startChecking: null,
            stopChecking: null,
            durationChecking: null,
            startPutaway: null,
            stopPutaway: null,
            durationPutaway: null
        };

        // Use jQuery to send data to row.php and receive the updated row content
        $.ajax({
            type: "POST",
            url: "<?= base_url('inbound/getRow') ?>",
            data: rowActivity,
            success: function(data) {
                // Append the updated row content to the table body
                $("#tableActivity tbody").append(data);
                $("#createTask").modal('hide');
            }
        });
    }

    function updateClock(dc) {
        // if (stopClockFlag) {
        //     return; // Hentikan pembaruan jam jika flag berhenti diatur menjadi true
        // }

        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();

        // Pad single digit minutes and seconds with a leading zero
        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;

        var timeString = hours + ':' + minutes + ':' + seconds;

        document.getElementById(dc).innerText = timeString;

        // Update every second
        setTimeout(updateClock, 1000);
    }

    function stopClock(el, id) {
        console.log('stop');
        console.log(id.id);
        let idStop = id.id;
        stopTime = new Date(); // Catat waktu berhenti
        displayLogStop(idStop, stopTime);
        el.disabled = true;
        return false;
        stopClockFlag = true;
        stopTime = new Date(); // Catat waktu berhenti
        document.getElementById('stopButton').disabled = true;
        document.getElementById('startButton').disabled = false;

        // Tampilkan log waktu stop
        displayLogStop();
        calculateAndDisplayDuration();
    }

    function startClock(el, dc, ls, lstp) {
        console.log(el);
        console.log(dc);
        startTime = new Date();
        displayLogStart(ls, startTime)
        // updateClock(dc); 

        el.innerHTML = `<i class="ri-stop-circle-line align-bottom me-1"></i> Stop`;
        el.style.backgroundColor = 'red';
        el.setAttribute('onclick', `stopClock(this,${lstp})`);
        console.log(el);
        return false;
        stopClockFlag = false;
        startTime = new Date(); // Catat waktu mulai
        document.getElementById('stopButton').disabled = false;
        document.getElementById('startButton').disabled = true;
        document.getElementById('startButton').style.display = 'none';
        document.getElementById('stopButton').style.display = 'flex';
        updateClock(); // Panggil updateClock untuk memulai pembaruan kembali
        displayLogStart();
    }

    function displayLogStart(id, time) {
        var logElement = document.getElementById(id);
        logElement.innerHTML = formatTime(time);
    }

    function displayLogStop(id, time) {
        var logElement = document.getElementById(id);
        logElement.innerHTML = formatTime(time);
    }

    function calculateAndDisplayDuration() {
        var durationElement = document.getElementById('duration');

        if (startTime && stopTime) {
            var durationInMillis = stopTime - startTime;
            var durationInSeconds = Math.floor(durationInMillis / 1000);

            var hours = Math.floor(durationInSeconds / 3600);
            var minutes = Math.floor((durationInSeconds % 3600) / 60);
            var seconds = durationInSeconds % 60;

            // Pad single digit minutes and seconds with a leading zero
            minutes = minutes < 10 ? '0' + minutes : minutes;
            seconds = seconds < 10 ? '0' + seconds : seconds;

            var durationString = hours + ':' + minutes + ':' + seconds;

            durationElement.innerText = durationString;
        } else {
            durationElement.innerText = 'N/A';
        }
    }

    function formatTime(time) {
        var hours = time.getHours();
        var minutes = time.getMinutes();
        var seconds = time.getSeconds();

        // Pad single digit minutes and seconds with a leading zero
        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;

        return hours + ':' + minutes + ':' + seconds;
    }

    // Tidak memanggil updateClock secara otomatis saat halaman dimuat
</script>


<div class="modal fade" id="createTask" tabindex="-1" aria-labelledby="createTaskLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-success-subtle">
                <h5 class="modal-title" id="createTaskLabel">Create Activity</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" id="createTaskBtn-close" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="task-error-msg" class="alert alert-danger py-2"></div>
                <form autocomplete="off" action="#" id="creattask-form">
                    <input type="hidden" id="taskid-input" class="form-control">
                    <div class="mb-3">
                        <label for="task-title-input" class="form-label">Nomor SJ</label>
                        <input type="text" id="inNoSJ" class="form-control" placeholder="Masukan No Surat Jalan">
                    </div>
                    <div class="mb-3 position-relative">
                        <label for="task-assign-input" class="form-label">Checker</label>
                        <input type="text" id="inChecker" class="form-control" placeholder="Masukan Checker">
                    </div>
                    <div class="row g-4 mb-3">
                        <div class="col-lg-6">
                            <label for="task-status" class="form-label">Quantity</label>
                            <input type="text" id="inQty" class="form-control" placeholder="Masukan Checker">
                        </div>
                        <!--end col-->
                        <div class="col-lg-6">
                            <label for="priority-field" class="form-label">Date</label>
                            <input type="date" id="inDate" class="form-control" placeholder="Due date">
                        </div>
                        <!--end col-->
                    </div>

                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-ghost-success" data-bs-dismiss="modal"><i class="ri-close-fill align-bottom"></i> Close</button>
                        <button type="button" class="btn btn-primary" id="addNewTodo" onclick="addRow()">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end create taks-->