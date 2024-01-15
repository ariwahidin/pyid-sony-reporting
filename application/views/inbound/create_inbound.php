<link href="<?= base_url() ?>myassets/css/jquery.dataTables.min.css" rel="stylesheet" />
<script src="<?= base_url() ?>myassets/js/jquery-3.7.0.js"></script>
<script src="<?= base_url() ?>myassets/js/jquery.dataTables.min.js"></script>
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
                        <button class="btn btn-success addMembers-modal" onclick="showModalCreate()"><i class="ri-add-fill me-1 align-bottom"></i> Create activity</button>
                    </div>
                </div>
            </div>

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
                                            <th scope="col">Action</th>
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




<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Completed Activities</h4>
                <div class="flex-shrink-0">
                    <div class="form-check form-switch form-switch-right form-switch-md">
                        <label for="default-showcode" class="form-label text-muted">Date : </label>
                        <!-- <input class="form-check-input code-switcher" type="checkbox" id="default-showcode"> -->
                    </div>
                </div>
            </div>

            <div class="card-body">
                <!-- <p class="text-muted">Use <code>table</code> class to show bootstrap-based default table.</p> -->
                <div class="live-preview">
                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap mb-0" id="tableCompleteActivities">
                            <thead>
                                <tr>
                                    <th scope="col">SJ No.</th>
                                    <th scope="col">Checker</th>
                                    <th scope="col">Ref. Date</th>
                                    <th scope="col">Start Unload</th>
                                    <th scope="col">Finish Unload</th>
                                    <th scope="col">Unload Duration</th>
                                    <th scope="col">Start Checking</th>
                                    <th scope="col">Finish Checking</th>
                                    <th scope="col">Checking Duration</th>
                                    <th scope="col">Start Putaway</th>
                                    <th scope="col">Finish Putaway</th>
                                    <th scope="col">Putaway Duration</th>
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
                        <input type="text" id="inNoSJ" class="form-control" placeholder="Masukan No Surat Jalan" value="TEST001">
                    </div>
                    <div class="mb-3 position-relative">
                        <label for="task-assign-input" class="form-label">Checker</label>
                        <select class="form-control" name="" id="inChecker">
                            <option value="">--Pilih Checker--</option>
                            <?php foreach ($checker->result() as $c) { ?>
                                <option value="<?= $c->name ?>"><?= $c->name ?></option>
                            <?php } ?>
                        </select>
                        <!-- <input type="text" id="inChecker" class="form-control" placeholder="Masukan Checker" value="Juna"> -->
                    </div>
                    <div class="row g-4 mb-3">
                        <div class="col-lg-6">
                            <label for="task-status" class="form-label">Quantity</label>
                            <input type="text" id="inQty" class="form-control" placeholder="Masukan Checker" value="500">
                        </div>
                        <div class="col-lg-6">
                            <label for="priority-field" class="form-label">Date</label>
                            <input type="date" id="inDate" class="form-control" placeholder="Due date" value="2022-01-14">
                        </div>
                    </div>

                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-ghost-success" data-bs-dismiss="modal"><i class="ri-close-fill align-bottom"></i> Close</button>
                        <button type="button" class="btn btn-primary" id="addNewTodo" onclick="addRow()" data-el-id="">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    let tableComlpeteActivity = null;
    $(document).ready(function() {
        // tableComlpeteActivity = $('#tableCompleteActivities').DataTable();
        getRowComplete();
    })
</script>
<script>
    function showModalCreate() {
        $('#addNewTodo').attr('onclick', 'addRow()');
        $('#addNewTodo').text('Create');
        $('#createTaskLabel').text('Create Activity');
        $('#createTask').modal('show');
    }

    function addRow() {
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

        $.ajax({
            type: "POST",
            url: "<?= base_url('inbound/getRow') ?>",
            data: rowActivity,
            success: function(data) {
                $("#tableActivity tbody").prepend(data);
                $("#createTask").modal('hide');
            }
        });
    }

    function getRowComplete() {
        var rowActivity = {};
        $.ajax({
            type: "POST",
            url: "<?= base_url('inbound/getRowCompleteAct') ?>",
            data: rowActivity,
            success: function(data) {

                if (tableComlpeteActivity != null) {
                    tableComlpeteActivity.destroy();
                }
                $("#tableCompleteActivities tbody").html(data);

                tableComlpeteActivity = $('#tableCompleteActivities').DataTable();
            }
        });
    }


    // function updateClock(dc) {
    //     var now = new Date();
    //     var hours = now.getHours();
    //     var minutes = now.getMinutes();
    //     var seconds = now.getSeconds();

    //     // Pad single digit minutes and seconds with a leading zero
    //     minutes = minutes < 10 ? '0' + minutes : minutes;
    //     seconds = seconds < 10 ? '0' + seconds : seconds;

    //     var timeString = hours + ':' + minutes + ':' + seconds;

    //     document.getElementById(dc).innerText = timeString;

    //     // Update every second
    //     setTimeout(updateClock, 1000);
    // }

    function stopClock(el) {
        let stopTime = new Date();
        let activity = $(el).data('activity-stop');

        let data = {
            id: $(el).data('id'),
            activity: activity,
            time: formatDateTime(stopTime),
            idElement: $(el).data('log-stop'),
            timeToShow: stopTime,
            idDuration: $(el).data('duration')
        };

        editActivity(data);
        $(el).attr('disabled', 'disabled');
    }

    function startClock(el) {
        let id = $(el).data('id');
        let ls = $(el).data('log-start');
        let activity = $(el).data('activity-start');
        let startTime = new Date();

        let data = {
            id: id,
            activity: activity,
            time: formatDateTime(startTime),
            idElement: $(el).data('log-start'),
            timeToShow: startTime
        };

        editActivity(data);

        el.innerHTML = `<i class="ri-stop-circle-line align-bottom me-1"></i> Stop`;
        el.style.backgroundColor = 'red';
        el.setAttribute('onclick', 'stopClock(this)');
    }

    function editActivity(postData) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('inbound/editActivity') ?>",
            data: postData,
            dataType: "JSON",
            success: function(response) {
                var logElement = document.getElementById(postData.idElement);
                logElement.innerText = formatTime(postData.timeToShow)

                if (postData.activity == 'stop_unloading') {
                    var durationElement = document.getElementById(postData.idDuration);
                    durationElement.innerText = response.data.duration_unloading;
                }

                if (postData.activity == 'stop_checking') {
                    var durationElement = document.getElementById(postData.idDuration);
                    durationElement.innerText = response.data.duration_checking;
                }

                if (postData.activity == 'stop_putaway') {
                    var durationElement = document.getElementById(postData.idDuration);
                    durationElement.innerText = response.data.duration_putaway;
                }

                if (response.isFinish == true) {
                    // alert(postData.idElement)
                    $('#' + postData.idElement).closest('tr').remove();
                    getRowComplete();
                }
            }
        });
    }



    function displayLog(id, time, idLogDuration = null) {
        var logElement = document.getElementById(id);
        logElement.innerHTML = formatTime(time);
        if (idLogDuration) {
            durationElement.innerText = durationString;
        }
    }

    // function calculateAndDisplayDuration(idElement, startTime, stopTime) {
    //     var durationElement = document.getElementById(idElement);

    //     if (startTime && stopTime) {
    //         var durationInMillis = stopTime - startTime;
    //         var durationInSeconds = Math.floor(durationInMillis / 1000);

    //         var hours = Math.floor(durationInSeconds / 3600);
    //         var minutes = Math.floor((durationInSeconds % 3600) / 60);
    //         var seconds = durationInSeconds % 60;

    //         // Pad single digit minutes and seconds with a leading zero
    //         minutes = minutes < 10 ? '0' + minutes : minutes;
    //         seconds = seconds < 10 ? '0' + seconds : seconds;

    //         var durationString = hours + ':' + minutes + ':' + seconds;
    //         durationElement.innerText = durationString;
    //     } else {
    //         durationElement.innerText = 'N/A';
    //     }
    // }



    function formatTime(time) {
        var hours = time.getHours();
        var minutes = time.getMinutes();
        var seconds = time.getSeconds();

        // Pad single digit minutes and seconds with a leading zero
        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;

        return hours + ':' + minutes + ':' + seconds;
    }

    function formatDateTime(time) {
        // Mendapatkan komponen waktu
        let year = time.getFullYear();
        let month = String(time.getMonth() + 1).padStart(2, '0');
        let day = String(time.getDate()).padStart(2, '0');
        let hours = String(time.getHours()).padStart(2, '0');
        let minutes = String(time.getMinutes()).padStart(2, '0');
        let seconds = String(time.getSeconds()).padStart(2, '0');

        // Membuat string format baru
        let formattedTime = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;

        return formattedTime;
    }

    function showModalEdit(el) {

        let elSj = $(el).data('id-sj');
        let elChecker = $(el).data('id-ch');
        let elQty = $(el).data('id-qty');
        let elDate = $(el).data('id-dt');

        let elId = {
            el_sj: elSj,
            el_checker: elChecker,
            el_qty: elQty,
            el_date: elDate
        }

        console.log(elId);
        console.log('___________________');

        let sj = $('#' + elSj).text();
        let checker = $('#' + elChecker).text();
        let qty = $('#' + elQty).text();
        let date = $('#' + elDate).text();

        $('#inNoSJ').val(sj);
        $('#inChecker').val(checker);
        $('#inQty').val(qty);
        $('#inDate').val(date);
        $('#taskid-input').val($(el).data('id'))

        $('#addNewTodo').attr('onclick', 'editUserActivity(this)');
        $('#addNewTodo').data('el-id', JSON.stringify(elId));
        $('#createTaskLabel').text('Edit Activity');
        $('#addNewTodo').text('Edit');
        $('#createTask').modal('show');
    }

    function editUserActivity(el) {
        let sj = $('#inNoSJ').val();
        let checker = $('#inChecker').val();
        let qty = $('#inQty').val();
        let refDate = $('#inDate').val();
        let id = $('#taskid-input').val();

        let elId = JSON.parse($(el).data('el-id'));

        console.log(elId);
        // return false;

        let rowActivity = {
            sj: sj,
            checker: checker,
            qty: qty,
            ref_date: refDate,
            id: id
        }

        $.ajax({
            type: "POST",
            url: "<?= base_url('inbound/editUserActivity') ?>",
            data: rowActivity,
            dataType: "JSON",
            success: function(response) {
                if (response.success == true) {
                    $("#createTask").modal('hide');
                    $('#' + elId.el_sj).text(sj);
                    $('#' + elId.el_checker).text(checker);
                    $('#' + elId.el_qty).text(qty);
                    $('#' + elId.el_date).text(refDate);
                }
            }
        });
    }
</script>