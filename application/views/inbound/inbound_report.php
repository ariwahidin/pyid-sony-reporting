<link href="<?= base_url() ?>myassets/css/jquery.dataTables.min.css" rel="stylesheet" />
<script src="<?= base_url() ?>myassets/js/jquery-3.7.0.js"></script>
<script src="<?= base_url() ?>myassets/js/jquery.dataTables.min.js"></script>


<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Report Inbound</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                </ol>
            </div>

        </div>
    </div>
</div>





<div class="row" id="reportContent">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <!-- <h4 class="card-title mb-0 flex-grow-1">Completed Activities</h4> -->
                <input type="text" class="form-control" style="width: 200px; margin-right: 10px;" id="sChecker" placeholder="Checker">
                <input type="date" class="form-control" style="width: 200px; margin-right: 10px;" id="sStartDate" placeholder="Start Date">
                <input type="date" class="form-control" style="width: 200px; margin-right: 10px;" id="sEndDate" placeholder="End Date">
                <button class="btn btn-outline-primary btn-icon waves-effect waves-light" id="sButton"><i class="ri-filter-fill"></i></button>
                <button style="margin-left: 10px;" class="btn btn-outline-success" id="btnExcel">Excel</button>
            </div>

            <div class="card-body">
                <!-- <p class="text-muted">Use <code>table</code> class to show bootstrap-based default table.</p> -->
                <div class="live-preview">
                    <div class="table-responsive">
                        <table style="font-size: 10px;" class="table table-bordered table-striped align-middle table-nowrap mb-0" id="tableCompleteActivities">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">SJ No.</th>
                                    <th scope="col">No. Truck</th>
                                    <th scope="col">Checker</th>
                                    <th scope="col">Qty</th>
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


<div class="modal fade" id="createTask" tabindex="-1" aria-labelledby="createTaskLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-success-subtle">
                <h5 class="modal-title" id="createTaskLabel">Create Activity</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" id="createTaskBtn-close" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="task-error-msg" class="alert alert-danger py-2"></div>
                <form autocomplete="off" action="#" id="creatask">
                    <input type="hidden" id="proses" name="proses" class="form-control">
                    <input type="hidden" id="id_task" name="id_task" class="form-control">


                    <div class="row g-4 mb-3">
                        <div class="col col-lg-4">
                            <label for="task-title-input" class="form-label">SJ No</label>
                            <input type="text" id="sj" name="sj" class="form-control" placeholder="" value="" required>
                        </div>
                        <div class="col col-lg-4">
                            <label for="priority-field" class="form-label">SJ Date</label>
                            <input type="date" id="sj_date" name="sj_date" class="form-control" placeholder="" value="">
                        </div>
                        <div class="col-3 col-lg-4">
                            <label for="priority-field" class="form-label">SJ Time</label>
                            <input type="time" id="sj_time" name="sj_time" class="form-control" placeholder="" value="">
                        </div>
                    </div>

                    <div class="row g-4 mb-3">
                        <div class="col col-lg-4">
                            <label for="priority-field" class="form-label">Expedisi</label>
                            <!-- <input type="text" id="expedisi" name="expedisi" class="form-control" placeholder="" value=""> -->
                            <select class="form-control" name="expedisi" id="expedisi" required>
                                <option value="">Choose Ekspedisi</option>
                                <?php foreach ($ekspedisi->result() as $e) { ?>
                                    <option value="<?= $e->id ?>"><?= $e->name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col col-lg-4">
                            <label for="priority-field" class="form-label">Driver</label>
                            <input type="text" id="driver" name="driver" class="form-control" placeholder="" value="">
                        </div>
                        <div class="col-lg-4">
                            <label for="task-status" class="form-label">No Truck</label>
                            <input type="text" id="no_truck" name="no_truck" class="form-control" value="">
                        </div>
                    </div>

                    <div class="mb-3 position-relative row">

                        <div class="col col-lg-4">
                            <label for="task-status" class="form-label">Qty</label>
                            <input type="number" id="qty" name="qty" class="form-control" placeholder="" value="">
                        </div>
                        <div class="col col-lg-4">
                            <label for="task-status" class="form-label">Alocation Code</label>
                            <input type="text" id="alocation" name="alocation" class="form-control" value="">
                        </div>
                        <div class="col col-lg-4">
                            <label for="priority-field" class="form-label">Factory Code</label>
                            <!-- <input type="text" id="factory" name="factory" class="form-control" value=""> -->
                            <select class="form-control" name="factory" id="factory" required>
                                <option value="">Choose Factory</option>
                                <?php foreach ($factory->result() as $f) { ?>
                                    <option value="<?= $f->id ?>"><?= $f->name ?></option>
                                <?php } ?>
                            </select>
                        </div>


                    </div>

                    <div class="row g-4 mb-3">
                        <div class="col col-lg-3">
                            <label for="task-assign-input" class="form-label">Checker</label>
                            <select class="form-control" name="checker" id="checker" required>
                                <option value="">Choose Checker</option>
                                <?php foreach ($checker->result() as $c) { ?>
                                    <option value="<?= $c->id ?>"><?= $c->fullname ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col col-lg-3">
                            <label for="task-assign-input" class="form-label">Pintu Unloading</label>
                            <input type="text" id="pintu_unloading" name="pintu_unloading" class="form-control" value="">
                        </div>
                        <div class="col-lg-6">
                            <label for="priority-field" class="form-label">Remarks</label>
                            <input type="text" id="remarks" name="remarks" class="form-control" value="">
                        </div>
                    </div>

                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-ghost-success" data-bs-dismiss="modal"><i class="ri-close-fill align-bottom"></i> Close</button>
                        <button type="submit" class="btn btn-primary" id="btnTask">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>myassets/js/exceljs.min.js"></script>


<script>
    $(document).ready(function() {
        let tableComlpeteActivity = null;
        getRowComplete();
        // var today = new Date().toISOString().split('T')[0];
        // document.getElementById('inDate').value = today;
        // document.getElementById('sStartDate').value = today;
        // document.getElementById('sEndDate').value = today;

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

        $('#tableCompleteActivities').on('click', '.btnEditComplete', async function() {
            startLoading();
            let id = $(this).data('id');
            let result = await $.post('getTaskCompleteById', {
                id: id
            }, function(response) {}, 'json');

            let task = result.task;
            $('#proses').val('edit_task');
            $('#id_task').val(id);
            $('#checker').val(task.checker_id);
            $('#alocation').val(task.alloc_code);
            $('#factory').val(task.factory_code);
            $('#expedisi').val(task.ekspedisi);
            $('#no_truck').val(task.no_truck);
            $('#qty').val(task.qty);
            $('#sj').val(task.no_sj);
            $('#sj_date').val(task.sj_date);
            $('#sj_time').val(task.sj_time);
            $('#driver').val(task.driver);
            $('#remarks').val(task.remarks);
            $('#pintu_unloading').val(task.pintu_unloading);
            $('#btnTask').text('Edit');
            $('#createTaskLabel').text('Edit task');
            $('#createTask').modal('show');
            stopLoading();
        });

        // $('#tableCompleteActivities').on('click', '.btnDeleteComplete', function() {
        //     let id = $(this).data('id');
        //     // alert(id);
        //     Swal.fire({
        //         icon: 'question',
        //         title: "Are you sure to delete this activity?",
        //         showCancelButton: true,
        //         confirmButtonText: "Yes",
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             $.post('deleteCompleteActivity', {
        //                 id: id
        //             }, function(response) {
        //                 if (response.success == true) {
        //                     Swal.fire("Deleted!", "", "success");
        //                     getRowComplete();
        //                 }
        //             }, 'json');
        //         } else if (result.isDenied) {
        //             Swal.fire("Changes are not saved", "", "info");
        //         }
        //     });
        // })

        $('#btnExcel').on('click', downloadExcel);

        function downloadExcel() {
            startLoading();
            setTimeout(async function() {
                    stopLoading();
                    let checker = $('#sChecker').val().trim();
                    let startDate = $('#sStartDate').val().trim();
                    let endDate = $('#sEndDate').val().trim();
                    let dataToPost = {
                        checker: checker,
                        startDate: startDate,
                        endDate: endDate
                    }
                    let dataAct = await $.post('getDataExcel', dataToPost, function() {}, 'json');

                    // var jsonData1 = [{
                    //         Name: "John",
                    //         Age: 30,
                    //         City: "New York"
                    //     },
                    //     {
                    //         Name: "Alice",
                    //         Age: 25,
                    //         City: "Los Angeles"
                    //     },
                    //     {
                    //         Name: "Bob",
                    //         Age: 35,
                    //         City: "Chicago"
                    //     }
                    // ];

                    var headers = Object.keys(dataAct.data[0]);
                    var workbook = new ExcelJS.Workbook();
                    var sheet1 = workbook.addWorksheet('Sheet 1');
                    sheet1.addRow(headers);
                    dataAct.data.forEach(function(row, ) {
                        var rowData = headers.map(function(header) {
                            return row[header];
                        });
                        sheet1.addRow(rowData);
                    });

                    workbook.xlsx.writeBuffer().then(function(buffer) {
                        var blob = new Blob([buffer], {
                            type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                        });
                        var url = window.URL.createObjectURL(blob);
                        var a = document.createElement('a');
                        a.href = url;
                        a.download = 'YMI Daily Performance.xlsx';
                        document.body.appendChild(a);
                        a.click();
                        window.URL.revokeObjectURL(url);
                    });
                },
                3000);
        }

        function getRowComplete(dataToPost = null) {
            var today = new Date().toISOString().split('T')[0];
            let date;
            if (dataToPost != null) {
                date = $('#sStartDate').val() + ' until ' + $('#sEndDate').val();
            } else {
                date = today + ' until ' + today;
            }

            let excelName = 'YMI Daily Activity ' + date;
            $.ajax({
                url: "<?= base_url('inbound/getRowCompleteAct') ?>",
                type: "POST",
                data: dataToPost,
                success: function(data) {

                    if (tableComlpeteActivity != null) {
                        tableComlpeteActivity.destroy();
                    }
                    $("#tableCompleteActivities tbody").html(data);

                    tableComlpeteActivity = $('#tableCompleteActivities').DataTable();
                }
            });
        }
    })
</script>
<script>
    // function getRowComplete(dataToPost = null) {
    //     var today = new Date().toISOString().split('T')[0];
    //     let date;
    //     if (dataToPost != null) {
    //         date = $('#sStartDate').val() + ' until ' + $('#sEndDate').val();
    //     } else {
    //         date = today + ' until ' + today;
    //     }

    //     let excelName = 'YMI Daily Activity ' + date;
    //     $.ajax({
    //         url: "<?= base_url('inbound/getRowCompleteAct') ?>",
    //         type: "POST",
    //         data: dataToPost,
    //         success: function(data) {

    //             if (tableComlpeteActivity != null) {
    //                 tableComlpeteActivity.destroy();
    //             }
    //             $("#tableCompleteActivities tbody").html(data);

    //             tableComlpeteActivity = $('#tableCompleteActivities').DataTable();
    //         }
    //     });
    // }

    // function formatTime(time) {
    //     var hours = time.getHours();
    //     var minutes = time.getMinutes();
    //     var seconds = time.getSeconds();

    //     minutes = minutes < 10 ? '0' + minutes : minutes;
    //     seconds = seconds < 10 ? '0' + seconds : seconds;

    //     return hours + ':' + minutes + ':' + seconds;
    // }

    // function formatDateTime(time) {
    //     let year = time.getFullYear();
    //     let month = String(time.getMonth() + 1).padStart(2, '0');
    //     let day = String(time.getDate()).padStart(2, '0');
    //     let hours = String(time.getHours()).padStart(2, '0');
    //     let minutes = String(time.getMinutes()).padStart(2, '0');
    //     let seconds = String(time.getSeconds()).padStart(2, '0');
    //     let formattedTime = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
    //     return formattedTime;
    // }

    // function updateClock() {
    //     var currentDate = new Date();
    //     var hours = currentDate.getHours().toString().padStart(2, '0');
    //     var minutes = currentDate.getMinutes().toString().padStart(2, '0');
    //     var seconds = currentDate.getSeconds().toString().padStart(2, '0');
    //     var day = currentDate.getDate().toString().padStart(2, '0');
    //     var month = (currentDate.getMonth() + 1).toString().padStart(2, '0'); // Bulan dimulai dari 0
    //     var year = currentDate.getFullYear();

    //     var dateString = year + '-' + month + '-' + day;
    //     var timeString = hours + ':' + minutes + ':' + seconds;
    //     var dateTimeString = dateString + ' ' + timeString;

    //     document.getElementById('clock').innerText = dateTimeString;
    // }

    // function keepAlive() {
    //     $.post('keepAlive', {}, function(response) {
    //         console.log(response);
    //     }, 'json');
    // }

    // setTimeout(stopLoading, 1250);
    // setInterval(keepAlive, 180000);
    // setInterval(updateClock, 1000);
    // updateClock();
</script>