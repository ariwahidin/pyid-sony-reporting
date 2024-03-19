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

    .custom-buttonx {
        background-color: lightgreen !important;
        /* Hijau */
        border: none;
        color: lawngreen;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin: 4px 2px;
        transition-duration: 0.4s;
        cursor: pointer;
    }

    .custom-buttonx:hover {
        background-color: #45a049 !important;
        /* Hijau yang lebih gelap */
        color: white;
    }

    .dt-buttons {
        display: inline-table;
        padding-bottom: 10px;
    }
</style>
<script>
    startLoading();
</script>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Daily performance activity</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1"><strong id="clock"></strong></h4>
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
                <!-- <h4 class="card-title mb-0 flex-grow-1">Completed Activities</h4> -->
                <input type="text" class="form-control" style="width: 200px; margin-right: 10px;" id="sChecker" placeholder="Checker">
                <input type="date" class="form-control" style="width: 200px; margin-right: 10px;" id="sStartDate" placeholder="Start Date">
                <input type="date" class="form-control" style="width: 200px; margin-right: 10px;" id="sEndDate" placeholder="End Date">
                <button class="btn btn-outline-primary btn-icon waves-effect waves-light" id="sButton"><i class="ri-filter-fill"></i></button>
            </div>

            <div class="card-body">
                <!-- <p class="text-muted">Use <code>table</code> class to show bootstrap-based default table.</p> -->
                <div class="live-preview">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle table-nowrap mb-0" id="tableCompleteActivities">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">SJ No.</th>
                                    <th scope="col">No. Truck</th>
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
                    <div class="mb-3 position-relative row">

                        <div class="col-lg-6">
                            <label for="task-assign-input" class="form-label">Checker</label>
                            <select class="form-control" name="" id="inChecker">
                                <option value="">--Pilih Checker--</option>
                                <?php foreach ($checker->result() as $c) { ?>
                                    <option value="<?= $c->id ?>"><?= $c->name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="task-status" class="form-label">No Truck</label>
                            <input type="text" id="inNoTruck" class="form-control" placeholder="Masukan No Truck" value="">
                        </div>
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


<script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>


<script>
    let tableComlpeteActivity = null;
    $(document).ready(function() {
        getRowComplete();
        getAllRowTemp();

        var today = new Date().toISOString().split('T')[0];
        document.getElementById('inDate').value = today;
        document.getElementById('sStartDate').value = today;
        document.getElementById('sEndDate').value = today;

        $('#sButton').on('click', function() {
            let checker = $('#sChecker').val().trim();
            let startDate = $('#sStartDate').val().trim();
            let endDate = $('#sEndDate').val().trim();
            let dataToPost = {
                checker: checker,
                startDate: startDate,
                endDate: endDate
            }
            getRowComplete(dataToPost);
        })
    })
</script>
<script>
    function showModalCreate() {
        $('#inNoSJ').val('');
        $('#addNewTodo').attr('onclick', 'addRow()');
        $('#addNewTodo').text('Create');
        $('#createTaskLabel').text('Create Activity');
        $('#createTask').modal('show');
        // $('#inNoSJ').focus();
    }

    function getAllRowTemp() {
        $.ajax({
            type: "POST",
            url: "<?= base_url('inbound/getAllRowTemp') ?>",
            success: function(data) {
                $("#tableActivity tbody").empty();
                $("#tableActivity tbody").prepend(data);
                $("#createTask").modal('hide');
            }
        });
    }

    function addRow() {

        let sj = $('#inNoSJ').val();
        let noTruck = $('#inNoTruck').val();
        let qty = $('#inQty').val();
        let date = $('#inDate').val();
        let checker_id = $('#inChecker').val();

        if (sj.trim() == '' || qty.trim() == '' || date.trim() == '' || checker_id.trim() == '') {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: "Please fill in all fields before proceeding"
            });
            return;
        }

        var rowActivity = {
            sj: $('#inNoSJ').val(),
            noTruck: $('#inNoTruck').val(),
            qty: $('#inQty').val(),
            date: $('#inDate').val(),
            checker_id: $('#inChecker').val(),
            checker: $('#inChecker option:selected').text(),
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
                // $("#tableActivity tbody").prepend(data);
                getAllRowTemp();
                $("#createTask").modal('hide');
            }
        });
    }

    function getRowComplete(dataToPost = null) {
        $.ajax({
            url: "<?= base_url('inbound/getRowCompleteAct') ?>",
            type: "POST",
            data: dataToPost,
            success: function(data) {

                // console.log(data);

                if (tableComlpeteActivity != null) {
                    tableComlpeteActivity.destroy();
                }
                $("#tableCompleteActivities tbody").html(data);

                tableComlpeteActivity = $('#tableCompleteActivities').DataTable({
                    dom: 'Bfrtip',
                    buttons: [{
                        extend: 'excelHtml5',
                        text: 'Export Excel',
                        className: 'custom-buttonx',
                        title: 'YMI Daily Activity'
                    }]
                });
            }
        });
    }


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
        el.style.backgroundColor = '#f06548';
        el.setAttribute('onclick', 'stopClock(this)');
    }

    function editActivity(postData) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('inbound/editActivity') ?>",
            data: postData,
            dataType: "JSON",
            success: function(response) {
                // var logElement = document.getElementById(postData.idElement);
                // logElement.innerText = formatTime(postData.timeToShow)

                // if (postData.activity == 'stop_unloading') {
                //     var durationElement = document.getElementById(postData.idDuration);
                //     durationElement.innerText = response.data.duration_unloading;
                // }

                // if (postData.activity == 'stop_checking') {
                //     var durationElement = document.getElementById(postData.idDuration);
                //     durationElement.innerText = response.data.duration_checking;
                // }

                // if (postData.activity == 'stop_putaway') {
                //     var durationElement = document.getElementById(postData.idDuration);
                //     durationElement.innerText = response.data.duration_putaway;
                // }

                // if (response.isFinish == true) {
                //     // alert(postData.idElement)
                //     $('#' + postData.idElement).closest('tr').remove();
                //     getRowComplete();
                // }
                getAllRowTemp();
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

    function deleteRow(el) {
        let id = $(el).data('id');
        $.post('deleteTransTemp', {
            id
        }, function(response) {
            if (response.success == true) {
                $('#tableActivity tbody').html('');
                getAllRowTemp();
            }
        }, 'json');
    }

    function formatTime(time) {
        var hours = time.getHours();
        var minutes = time.getMinutes();
        var seconds = time.getSeconds();

        // Pad single digit minutes and seconds with a leading zero
        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;

        return hours + ':' + minutes;
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
        let elNoTruck = $(el).data('id-nt');
        let checker_id = $(el).data('check-id');
        let elChecker = $(el).data('id-ch');
        let elQty = $(el).data('id-qty');
        let elDate = $(el).data('id-dt');

        let elId = {
            el_sj: elSj,
            el_nt: elNoTruck,
            el_checker: elChecker,
            el_qty: elQty,
            el_date: elDate
        }

        // console.log(elId);


        let sj = $('#' + elSj).text();
        let noTruck = $('#' + elNoTruck).text();
        let checker = $('#' + elChecker).text();
        let qty = $('#' + elQty).text();
        let date = $('#' + elDate).text();

        // console.log(noTruck);

        $('#inNoSJ').val(sj);
        $('#inNoTruck').val(noTruck);
        $('#inChecker').val(checker_id);
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
        let noTruck = $('#inNoTruck').val();
        let checker_id = $('#inChecker').val();
        let checker = $('#inChecker option:selected').text();
        let qty = $('#inQty').val();
        let refDate = $('#inDate').val();
        let id = $('#taskid-input').val();

        let elId = JSON.parse($(el).data('el-id'));


        // console.log(elId);
        // return false;

        let rowActivity = {
            sj: sj,
            no_truck: noTruck,
            checker_id: checker_id,
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
                    getAllRowTemp();
                    // $("#createTask").modal('hide');
                    // $('#' + elId.el_sj).text(sj);
                    // $('#' + elId.el_nt).text(noTruck);
                    // $('#' + elId.el_checker).text(checker);
                    // $('#' + elId.el_qty).text(qty);
                    // $('#' + elId.el_date).text(refDate);
                }
            }
        });
    }

    function updateClock() {
        var currentDate = new Date();
        var hours = currentDate.getHours().toString().padStart(2, '0');
        var minutes = currentDate.getMinutes().toString().padStart(2, '0');
        var seconds = currentDate.getSeconds().toString().padStart(2, '0');
        var day = currentDate.getDate().toString().padStart(2, '0');
        var month = (currentDate.getMonth() + 1).toString().padStart(2, '0'); // Bulan dimulai dari 0
        var year = currentDate.getFullYear();

        var dateString = year + '-' + month + '-' + day;
        var timeString = hours + ':' + minutes + ':' + seconds;
        var dateTimeString = dateString + ' ' + timeString;

        document.getElementById('clock').innerText = dateTimeString;
    }

    function keepAlive() {
        $.post('keepAlive', {}, function(response) {
            console.log(response);
        }, 'json');
    }

    setTimeout(stopLoading, 1500);
    setInterval(keepAlive, 180000);
    setInterval(updateClock, 1000);
    updateClock();
</script>