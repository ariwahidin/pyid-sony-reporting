<link href="<?= base_url() ?>myassets/css/jquery.dataTables.min.css" rel="stylesheet" />
<script src="<?= base_url() ?>myassets/js/jquery-3.7.0.js"></script>
<script src="<?= base_url() ?>myassets/js/jquery.dataTables.min.js"></script>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Maintenance Forklift</h4>

            <!-- <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Outbound Task</a>
                        <span id="spConnect"></span>
                    </li>
                </ol>
            </div> -->

        </div>
    </div>
</div>

<div class="row mb-3 pb-1">
    <div class="col-12">
        <div class="d-flex align-items-lg-center flex-lg-row flex-column">
            <div class="flex-grow-1">
                <h4 class="card-title mb-0 flex-grow-1"><strong id="clock"></strong></h4>
                <!-- <h4 class="fs-16 mb-1">Hi , <?= $_SESSION['piaggio_auth']['fullname'] ?></h4> -->
                <!-- <p class="text-muted mb-0">This is a task that you must complete.</p> -->
            </div>
            <?php if ($_SESSION['piaggio_auth']['role'] != 4) { ?>
                <div class="mt-3 ms-3 mt-lg-0">

                </div>
            <?php } ?>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <button class="btn btn-primary" id="btnCreate">Create new task</button>
    </div>
    <div class="card-body table-responsive" id="content">
    </div>
</div>


<div class="modal fade" id="createTask" tabindex="-1" aria-labelledby="createTaskLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-success-subtle">
                <h5 class="modal-title" id="createTaskLabel">Create Activity Outbound</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" id="createTaskBtn-close" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="task-error-msg" class="alert alert-danger py-2"></div>
                <form autocomplete="off" id="creatask">
                    <input type="hidden" id="proses" name="proses" class="form-control">
                    <input type="hidden" id="id_task" name="id_task" class="form-control">

                    <div class="mb-2 row">
                        <div class="form-group col">
                            <label style="font-weight: bold;">Forklift</label>
                            <select name="forklift" id="forklift" class="form-control" required>
                                <option value="">Choose Forklift</option>
                                <?php
                                foreach ($forklift->result() as $data) {
                                ?>
                                    <option value="<?= $data->id ?>"><?= $data->name ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <hr class="mt-3 mb-1">
                    </div>

                    <?php
                    foreach ($item->result() as $data) {
                    ?>
                        <div class="mb-2 row">
                            <label style="font-weight: bold;"><?= $data->name ?></label>
                            <div class="col">
                                <input class="form-check-input" type="radio" name="<?= $data->id ?>" value="Y" require checked>
                                <label class="form-check-label">
                                    Good
                                </label>
                            </div>
                            <div class="col">
                                <input class="form-check-input" type="radio" name="<?= $data->id ?>" value="N" require>
                                <label class="form-check-label">
                                    Not Good
                                </label>
                            </div>
                            <div class="col-md-12 mt-2">
                                <input type="text" id="desc-<?= $data->id ?>" name="desc-<?= $data->id ?>" class="form-control" placeholder="Descrption">
                            </div>
                            <hr class="mt-3 mb-1">
                        </div>
                    <?php
                    }
                    ?>


                    <div class="mb-2 row">
                        <div class="form-group col">
                            <label style="font-weight: bold;">Hour Meter Start</label>
                            <input class="form-control" type="number" name="meter_start" value="">
                        </div>
                        <div class="form-group col">
                            <label style="font-weight: bold;">Hour Meter Fisnish</label>
                            <input class="form-control" type="number" name="meter_finish" value="">
                        </div>
                        <hr class="mt-3 mb-1">
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

<script>
    $(document).ready(function() {

        //     var socket;
        //     getAllRowTask();
        //     initWebSocket();

        //     // $('#createTask').modal('show');

        $('#btnCreate').on('click', function() {
            $('#btnTask').text('Create');
            $('#createTaskLabel').text('Form ceklist forklift');
            $('#proses').val('new_task');
            $('#createTask').modal('show');
        });

        //     function initWebSocket() {
        //         let hostname = window.location.hostname;
        //         // console.log(hostname);
        //         socket = new WebSocket('ws://' + hostname + ':8001');

        //         socket.onopen = function() {
        //             $('#spConnect').html(`<i class="ri-swap-box-fill"></i>`);
        //             // console.log('WebSocket connection opened');
        // $(document).ready(function() {

        //     var socket;
        //     getAllRowTask();
        //     initWebSocket();

        //     // $('#createTask').modal('show');

        //     $('#btnCreate').on('click', function() {
        //         $('#btnTask').text('Create');
        //         $('#createTaskLabel').text('Create new');
        //         $('#proses').val('new_task');
        //         $('#createTask').modal('show');
        //     });

        //     function initWebSocket() {
        //         let hostname = window.location.hostname;
        //         // console.log(hostname);
        //         socket = new WebSocket('ws://' + hostname + ':8001');

        //         socket.onopen = function() {
        //             $('#spConnect').html(`<i class="ri-swap-box-fill"></i>`);
        //             // console.log('WebSocket connection opened');
        //             socket.send('ping');
        //         };

        //         socket.onmessage = function(event) {
        //             // console.log('Received message: ' + event.data);
        //             getAllRowTask();
        //         };

        //         socket.onclose = function(event) {
        //             $('#spConnect').html(`<i class="ri-alert-fill"></i>`);
        //             // console.log('WebSocket connection closed');
        //             // Try to re-initiate connection after a delay
        //             setTimeout(initWebSocket, 5000); // Retry after 5 seconds
        //         };

        //         socket.onerror = function(error) {
        //             console.error('WebSocket error: ' + error);
        //             // Handle WebSocket error, if necessary
        //         };
        //     }

        //     // $("input[type='text']").on("input", function() {
        //     //     $(this).val($(this).val().toUpperCase());
        //     // });

        //     $("#creatask").on("keypress", "input", function(event) {
        //         if (event.which === 13) {
        //             event.preventDefault(); // Prevent default behavior of Enter key
        //             var inputs = $(this).closest("form").find(":input");
        //             var index = inputs.index(this);

        //             // Find next empty input field
        //             for (var i = index + 1; i < inputs.length; i++) {
        //                 if ($(inputs[i]).is(":text") && $(inputs[i]).val() === '') {
        //                     $(inputs[i]).focus();
        //                     break;
        //                 }
        //             }
        //         }
        //     });

        getActivity()

        function getActivity() {
            $.post('getActivity', {}, function(response) {
                let content = $('#content');
                content.empty();
                content.html(response)
                $('#tableCompleteActivities').DataTable();
            });
        }

        $('#creatask').on('submit', function(e) {
            e.preventDefault();
            let form = new FormData(this);
            let proses = $('#proses').val();
            if (proses === 'new_task') {
                $.ajax({
                    url: 'createMaintenance',
                    type: 'POST',
                    data: form,
                    processData: false,
                    contentType: false,
                    dataType: 'JSON',
                    success: function(response) {
                        if (response.success == true) {
                            getActivity();
                            // socket.send('ping');
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('#createTask').modal('hide');
                        }
                    }
                });
            } else {
                $.ajax({
                    url: 'editActivity',
                    type: 'POST',
                    data: form,
                    processData: false,
                    contentType: false,
                    dataType: 'JSON',
                    success: function(response) {
                        if (response.success == true) {
                            getActivity();
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('#createTask').modal('hide');
                            // socket.send('ping');
                        }
                    }
                });
            }

        })



        $('#content').on('click', '.btnEdit', async function() {
            startLoading();
            let id = $(this).data('id');
            let result = await $.post('getActivityById', {
                id: id
            }, function(response) {
                let detail = response.detail;

                detail.forEach(function(elem) {
                    // console.log(elem.id_item_check);
                    // console.log(elem.is_good);
                    var id_item = elem.id_item_check;
                    var dataValue = elem.is_good; // Ambil nilai dari data API
                    var desc = elem.desc;
                    if (dataValue === "Y") {
                        $('input[name="' + id_item + '"][value="Y"]').prop('checked', true);
                    } else if (dataValue === "N") {
                        $('input[name="' + id_item + '"][value="N"]').prop('checked', true);
                    }

                    $('input[name="desc-' + id_item + '"]').val(desc);

                });

                let header = response.header;
                $('#proses').val('edit_task');
                $('#id_task').val(id);
                $('#forklift').val(header.id_forklift);
                $(`input[name="meter_start"]`).val(header.hour_start);
                $(`input[name="meter_finish"]`).val(header.hour_end);
                // $('#pl_date').val(task.pl_date);
                // $('#pl_time').val(formatTime(task.pl_time));
                // $('#ekspedisi').val(task.ekspedisi);
                // $('#no_truck').val(task.no_truck);
                // $('#qty').val(task.qty);
                // $('#checker_id').val(task.checker_id);
                // // $('#sj_date').val(task.sj_date);
                // // $('#sj_time').val(task.sj_time);
                // $('#driver').val(task.driver);
                // $('#remarks').val(task.remarks);
                // // $('#send_date').val(task.sj_send_date);
                // // $('#toa').val(task.time_arival);
                // // $('#pintu_unloading').val(task.pintu_unloading);
                $('#btnTask').text('Edit');
                $('#createTaskLabel').text('Edit Activity');
                $('#createTask').modal('show');
                stopLoading();
            }, 'json');
        })

        //     $('#content').on('click', '.btnDelete', function() {
        //         startLoading();
        //         let id = $(this).data('id');
        //         $.post('deleteOut', {
        //             id: id
        //         }, function(response) {
        //             stopLoading();
        //             if (response.success == true) {
        //                 getAllRowTask();
        //                 socket.send('ping');
        //             }
        //         }, 'json');

        //     });

        //     $('#content').on('click', '.btnActivity', function() {
        //         startLoading();
        //         let dataToPost = {
        //             id: $(this).data('id'),
        //             proses: $(this).data('proses')
        //         };

        //         $.post('prosesActivity', dataToPost, function(response) {
        //             if (response.success == true) {
        //                 stopLoading();
        //                 getAllRowTask();
        //                 socket.send('ping');
        //             }
        //         }, 'json');
        //     })

        //     $('#btnSearch').on('click', getAllRowTask);

        //     // function startUnloading(id) {
        //     //     startLoading();
        //     //     $.post('startUnloading', {
        //     //         id
        //     //     }, function(response) {
        //     //         stopLoading();
        //     //         if (response.success == false) {
        //     //             Swal.fire({
        //     //                 icon: 'warning',
        //     //                 title: response.message,
        //     //                 showCancelButton: true,
        //     //                 confirmButtonText: "Reload",
        //     //             }).then((result) => {
        //     //                 if (result.isConfirmed) {
        //     //                     window.location.href = 'task'
        //     //                 }
        //     //             });
        //     //         } else {
        //     //             getAllRowTask();
        //     //             socket.send('ping');
        //     //         }
        //     //     }, 'json');
        //     // }

        //     // function stopUnloading(id) {
        //     //     startLoading();
        //     //     $.post('stopUnloading', {
        //     //         id
        //     //     }, function(response) {
        //     //         stopLoading();
        //     //         if (response.success == false) {
        //     //             Swal.fire({
        //     //                 icon: 'warning',
        //     //                 title: response.message,
        //     //                 showCancelButton: true,
        //     //                 confirmButtonText: "Reload",
        //     //             }).then((result) => {
        //     //                 if (result.isConfirmed) {
        //     //                     window.location.href = 'task'
        //     //                 }
        //     //             });
        //     //         } else {
        //     //             getAllRowTask();
        //     //             socket.send('ping');
        //     //         }
        //     //     }, 'json');
        //     // }

        //     // $('#content').on('click', '.btnChecking', function() {
        //     //     let id = $(this).data('id');
        //     //     let proses = $(this).data('proses');
        //     //     if (proses === 'start_checking') {
        //     //         startChecking(id);
        //     //     } else {
        //     //         stopChecking(id);
        //     //     }
        //     // })

        //     // function startChecking(id) {
        //     //     startLoading();
        //     //     $.post('startChecking', {
        //     //         id
        //     //     }, function(response) {
        //     //         stopLoading();
        //     //         if (response.success == false) {
        //     //             Swal.fire({
        //     //                 icon: 'warning',
        //     //                 title: response.message,
        //     //                 showCancelButton: true,
        //     //                 confirmButtonText: "Reload",
        //     //             }).then((result) => {
        //     //                 if (result.isConfirmed) {
        //     //                     window.location.href = 'task'
        //     //                 }
        //     //             });
        //     //         } else {
        //     //             getAllRowTask();
        //     //             socket.send('ping');
        //     //         }
        //     //     }, 'json');
        //     // }

        //     // function stopChecking(id) {
        //     //     startLoading();
        //     //     $.post('stopChecking', {
        //     //         id
        //     //     }, function(response) {
        //     //         stopLoading();
        //     //         if (response.success == false) {
        //     //             Swal.fire({
        //     //                 icon: 'warning',
        //     //                 title: response.message,
        //     //                 showCancelButton: true,
        //     //                 confirmButtonText: "Reload",
        //     //             }).then((result) => {
        //     //                 if (result.isConfirmed) {
        //     //                     window.location.href = 'task'
        //     //                 }
        //     //             });
        //     //         } else {
        //     //             getAllRowTask();
        //     //             socket.send('ping');
        //     //         }
        //     //     }, 'json');
        //     // }

        //     // $('#content').on('click', '.btnPutaway', function() {
        //     //     let id = $(this).data('id');
        //     //     let proses = $(this).data('proses');
        //     //     if (proses === 'start_putaway') {
        //     //         startPutaway(id);
        //     //     } else {
        //     //         stopPutaway(id);
        //     //     }
        //     // })

        //     // function startPutaway(id) {
        //     //     startLoading();
        //     //     $.post('startPutaway', {
        //     //         id
        //     //     }, function(response) {
        //     //         stopLoading();
        //     //         if (response.success == false) {
        //     //             Swal.fire({
        //     //                 icon: 'warning',
        //     //                 title: response.message,
        //     //                 showCancelButton: true,
        //     //                 confirmButtonText: "Reload",
        //     //             }).then((result) => {
        //     //                 if (result.isConfirmed) {
        //     //                     window.location.href = 'task'
        //     //                 }
        //     //             });
        //     //         } else {
        //     //             getAllRowTask();
        //     //             socket.send('ping');
        //     //         }
        //     //     }, 'json');
        //     // }

        //     // function stopPutaway(id) {
        //     //     startLoading();
        //     //     $.post('stopPutaway', {
        //     //         id
        //     //     }, function(response) {
        //     //         stopLoading();
        //     //         if (response.success == false) {
        //     //             Swal.fire({
        //     //                 icon: 'warning',
        //     //                 title: response.message,
        //     //                 showCancelButton: true,
        //     //                 confirmButtonText: "Reload",
        //     //             }).then((result) => {
        //     //                 if (result.isConfirmed) {
        //     //                     window.location.href = 'task'
        //     //                 }
        //     //             });
        //     //         } else {
        //     //             getAllRowTask();
        //     //             socket.send('ping');
        //     //         }
        //     //     }, 'json');
        //     // }

        //     function getAllRowTask() {
        //         let search = $('#inSearch').val();
        //         $.post('getAllRowTask', {
        //             search
        //         }, function(response) {
        //             let content = $('#content');
        //             content.empty();
        //             content.html(response)
        //         });
        //     }

        //     function formatTime(timeString) {
        //         var timeComponents = timeString.split(':');

        //         if (timeComponents.length !== 3) {
        //             return 'Invalid time format';
        //         }

        //         var hours = parseInt(timeComponents[0]);
        //         var minutes = parseInt(timeComponents[1]);
        //         var seconds = parseInt(timeComponents[2]);

        //         if (isNaN(hours) || isNaN(minutes) || isNaN(seconds)) {
        //             return 'Invalid time format';
        //         }

        //         hours = (hours < 10) ? '0' + hours : hours;
        //         minutes = (minutes < 10) ? '0' + minutes : minutes;
        //         seconds = (seconds < 10) ? '0' + seconds : seconds;

        //         var formattedTime = hours + ':' + minutes + ':' + seconds;

        //         return formattedTime;
        //     }

        //     // function updateClock() {
        //     //     var currentDate = new Date();
        //     //     var hours = currentDate.getHours().toString().padStart(2, '0');
        //     //     var minutes = currentDate.getMinutes().toString().padStart(2, '0');
        //     //     var seconds = currentDate.getSeconds().toString().padStart(2, '0');
        //     //     var day = currentDate.getDate().toString().padStart(2, '0');
        //     //     var month = (currentDate.getMonth() + 1).toString().padStart(2, '0'); // Bulan dimulai dari 0
        //     //     var year = currentDate.getFullYear();

        //     //     var dateString = year + '-' + month + '-' + day;
        //     //     var timeString = hours + ':' + minutes + ':' + seconds;
        //     //     var dateTimeString = dateString + ' ' + timeString;

        //     //     document.getElementById('clock').innerText = dateTimeString;
        //     // }

        //     // function keepAlive() {
        //     //     $.post('keepAlive', {}, function(response) {
        //     //         console.log(response);
        //     //     }, 'json');
        //     // }

        //     // setInterval(keepAlive, 180000);
        //     // setInterval(updateClock, 1000);
        //     // updateClock();
    });
</script>