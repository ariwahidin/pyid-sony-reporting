<!-- <link href="<?= base_url() ?>myassets/css/jquery.dataTables.min.css" rel="stylesheet" /> -->
<link href="<?= base_url() ?>myassets/css/dataTables.dataTables.css" rel="stylesheet" />
<link href="<?= base_url() ?>myassets/css/responsive.dataTables.css" rel="stylesheet" />
<link href="<?= base_url() ?>myassets/css/rowReorder.dataTables.css" rel="stylesheet" />
<script src="<?= base_url() ?>myassets/js/jquery-3.7.0.js"></script>
<script src="<?= base_url() ?>myassets/js/jquery.dataTables.min.js"></script>

<style>
    #videoContainer {
        width: 300px;
        height: 300px;
        border: 1px solid #ccc;
        margin-bottom: 20px;
        overflow: hidden;
    }

    video {
        width: 100%;
        height: 100%;
    }
</style>

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

<div class="row">
    <div class="col-12">
        <div class="d-flex align-items-lg-center flex-lg-row flex-column">
            <div class="flex-grow-1">
                <h4 class="card-title mb-0 flex-grow-1"><strong id="clock"></strong></h4>
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
        <div class="row">
            <div class="col-md-4">
                <div class="row d-flex mb-1">
                    <div class="col-6">
                        <span>Start Date : </span>
                        <input type="date" class="form-control-sm" id="startDate">
                    </div>
                    <div class="col-6">
                        <span>End Date : </span>
                        <input type="date" class="form-control-sm" id="endDate">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row d-flex">
                    <div class="col-12 col-md-6">
                        <button class="btn btn-sm btn-success" id="btnExcel">Excel Summary</button>
                        <button class="btn btn-sm btn-primary" id="btnCreate">Create new</button>
                    </div>
                    <div class="col-6">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body table-responsive" id="content">
    </div>
</div>


<div class="modal fade" id="createTask" tabindex="-1" aria-labelledby="createTaskLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-success-subtle">
                <h5 class="modal-title" id="createTaskLabel"></h5>
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

                    <div class="mb-2 row">
                        <div class="form-group">
                            <div id="videoContainer"></div>
                            <select id="cameraSelect">
                                <option value="user">Kamera Depan</option>
                                <option value="environment">Kamera Belakang</option>
                            </select>
                            <button type="button" id="startCamera">Mulai Kamera</button>
                            <button type="button" id="capturePhoto">Ambil Foto</button>
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

<div class="modal fade" id="modalDetail" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-success-subtle">
                <h5 class="modal-title" id="">Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" id="createTaskBtn-close" aria-label="Close"></button>
            </div>
            <div class="modal-body table-responsive">

                <div id="tblHeader"></div>
                <br>
                <div id="tblDetail"></div>


            </div>
            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-ghost-success" data-bs-dismiss="modal"><i class="ri-close-fill align-bottom"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>myassets/js/exceljs.min.js"></script>

<script>
    $(document).ready(function() {


        // Start Foto

        var videoStream;

        $("#startCamera").click(function() {
            var selectedCamera = $("#cameraSelect").val();
            startCamera(selectedCamera);
        });

        $("#capturePhoto").click(function() {
            capturePhoto();
        });

        function startCamera(cameraMode) {
            $("#videoContainer").empty();
            navigator.mediaDevices.getUserMedia({
                    video: {
                        facingMode: {
                            exact: cameraMode
                        }
                    }
                })
                .then(function(stream) {
                    videoStream = stream;
                    var video = $("<video autoplay playsinline></video>");
                    video.appendTo("#videoContainer");
                    video.get(0).srcObject = stream;
                })
                .catch(function(error) {
                    console.error("Gagal mengakses kamera:", error);
                    alert("Gagal mengakses kamera. Pastikan izin kamera diizinkan.");
                });
        }

        function capturePhoto() {
            var canvas = $("<canvas></canvas>").get(0);
            canvas.width = 300;
            canvas.height = 300;
            var context = canvas.getContext("2d");

            context.drawImage($("video").get(0), 0, 0, 300, 300);
            var photoDataUrl = canvas.toDataURL("image/png");

            // Simpan atau tampilkan foto yang diambil
            // Di sini Anda bisa melakukan AJAX request untuk mengunggah foto ke server, atau menampilkan foto di halaman web
            $("#videoContainer").empty();
            $("<img>").attr("src", photoDataUrl).appendTo("#videoContainer");

            // Hentikan akses kamera
            stopCamera();
        }

        function stopCamera() {
            if (videoStream) {
                videoStream.getTracks().forEach(function(track) {
                    track.stop();
                });
            }
        }
        // End Foto

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

        $('#btnExcel').on('click', downloadExcel);

        $('#content').on('click', '.btnDetailExcel', function() {
            let id = $(this).data('id');
            $.post('getExcelDetail', {
                    idActivity: id
                },
                function(response) {

                    let dataHeader = response.header
                    let dataDetail = response.detail

                    startLoading();
                    setTimeout(function() {
                            stopLoading();
                            let dataAct = dataHeader;
                            let dataActDetail = dataDetail;

                            var headers = Object.keys(dataAct[0]);
                            var headers2 = Object.keys(dataActDetail[0]);
                            var workbook = new ExcelJS.Workbook();

                            var sheet1 = workbook.addWorksheet('HEADER');
                            var sheet2 = workbook.addWorksheet('DETAIL');

                            sheet1.addRow(headers).eachCell(function(row, rowNumber) {
                                row.fill = {
                                    type: 'pattern',
                                    pattern: 'solid',
                                    fgColor: {
                                        argb: 'FFFF00'
                                    }
                                };
                            });

                            sheet2.addRow(headers2).eachCell(function(row, rowNumber) {
                                row.fill = {
                                    type: 'pattern',
                                    pattern: 'solid',
                                    fgColor: {
                                        argb: 'FFFF00'
                                    }
                                };
                            });

                            // Menentukan lebar kolom berdasarkan isi
                            sheet1.columns.forEach(function(column) {
                                var maxLength = 0;
                                column.eachCell(function(cell) {
                                    var columnLength = cell.value ? cell.value.toString().length : 10;
                                    if (columnLength > maxLength) {
                                        maxLength = columnLength;
                                    }
                                });
                                column.width = maxLength < 10 ? 10 : maxLength;
                            });

                            sheet2.columns.forEach(function(column) {
                                var maxLength = 0;
                                column.eachCell(function(cell) {
                                    var columnLength = cell.value ? cell.value.toString().length : 10;
                                    if (columnLength > maxLength) {
                                        maxLength = columnLength;
                                    }
                                });
                                column.width = maxLength < 10 ? 10 : maxLength;
                            });

                            // Menambahkan border ke seluruh tabel
                            sheet1.eachRow(function(row) {
                                row.eachCell(function(cell) {
                                    cell.border = {
                                        top: {
                                            style: 'thin'
                                        },
                                        left: {
                                            style: 'thin'
                                        },
                                        bottom: {
                                            style: 'thin'
                                        },
                                        right: {
                                            style: 'thin'
                                        }
                                    };
                                });
                            });

                            sheet2.eachRow(function(row) {
                                row.eachCell(function(cell) {
                                    cell.border = {
                                        top: {
                                            style: 'thin'
                                        },
                                        left: {
                                            style: 'thin'
                                        },
                                        bottom: {
                                            style: 'thin'
                                        },
                                        right: {
                                            style: 'thin'
                                        }
                                    };
                                });
                            });

                            dataAct.forEach(function(row, ) {
                                var rowData = headers.map(function(header) {
                                    return row[header];
                                });
                                sheet1.addRow(rowData);
                                // Menentukan lebar kolom berdasarkan isi
                                sheet1.columns.forEach(function(column) {
                                    var maxLength = 0;
                                    column.eachCell(function(cell) {
                                        var columnLength = cell.value ? cell.value.toString().length : 10;
                                        if (columnLength > maxLength) {
                                            maxLength = columnLength;
                                        }
                                    });
                                    column.width = maxLength < 10 ? 10 : maxLength;
                                });

                                // Menambahkan border ke seluruh tabel
                                sheet1.eachRow(function(row) {
                                    row.eachCell(function(cell) {
                                        cell.border = {
                                            top: {
                                                style: 'thin'
                                            },
                                            left: {
                                                style: 'thin'
                                            },
                                            bottom: {
                                                style: 'thin'
                                            },
                                            right: {
                                                style: 'thin'
                                            }
                                        };
                                    });
                                });
                            });

                            dataActDetail.forEach(function(row, ) {
                                var rowData = headers2.map(function(header) {
                                    return row[header];
                                });
                                sheet2.addRow(rowData);
                                // Menentukan lebar kolom berdasarkan isi
                                sheet2.columns.forEach(function(column) {
                                    var maxLength = 0;
                                    column.eachCell(function(cell) {
                                        var columnLength = cell.value ? cell.value.toString().length : 10;
                                        if (columnLength > maxLength) {
                                            maxLength = columnLength;
                                        }
                                    });
                                    column.width = maxLength < 10 ? 10 : maxLength;
                                });

                                // Menambahkan border ke seluruh tabel
                                sheet2.eachRow(function(row) {
                                    row.eachCell(function(cell) {
                                        cell.border = {
                                            top: {
                                                style: 'thin'
                                            },
                                            left: {
                                                style: 'thin'
                                            },
                                            bottom: {
                                                style: 'thin'
                                            },
                                            right: {
                                                style: 'thin'
                                            }
                                        };
                                    });
                                });
                            });

                            workbook.xlsx.writeBuffer().then(function(buffer) {
                                var blob = new Blob([buffer], {
                                    type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                                });
                                var url = window.URL.createObjectURL(blob);
                                var a = document.createElement('a');
                                a.href = url;
                                a.download = 'DETAIL ACTIVITY.xlsx';
                                document.body.appendChild(a);
                                a.click();
                                window.URL.revokeObjectURL(url);
                            });
                        },
                        3000);
                }, 'json');
        })

        $('#content').on('click', '.btnDetail', function() {
            let id_activity = $(this).data('id');
            let dataToPost = {
                idActivity: id_activity
            }
            $.post('getItemDetail', dataToPost, function(response) {
                if (response.success == true) {

                    let tblHeader = $('#tblHeader');
                    tblHeader.empty();
                    tblHeader.html(response.table_header);


                    let divTable = $('#tblDetail');
                    divTable.empty();
                    divTable.html(response.table_detail);
                    $('#modalDetail').modal('show');
                }
            }, 'json');
        })

        function downloadExcel() {
            startLoading();
            setTimeout(async function() {
                    stopLoading();
                    let startDate = $('#startDate').val().trim();
                    let endDate = $('#endDate').val().trim();
                    let dataToPost = {
                        startDate: startDate,
                        endDate: endDate
                    }
                    let dataAct = await $.post('getDataExcel', dataToPost, function() {}, 'json');

                    // console.log(dataAct);
                    // return

                    var headers = Object.keys(dataAct.data[0]);
                    var workbook = new ExcelJS.Workbook();

                    var sheet1 = workbook.addWorksheet('Sheet 1');

                    sheet1.addRow(headers).eachCell(function(row, rowNumber) {
                        row.fill = {
                            type: 'pattern',
                            pattern: 'solid',
                            fgColor: {
                                argb: 'FFFF00'
                            }
                        };
                    });

                    // Menentukan lebar kolom berdasarkan isi
                    sheet1.columns.forEach(function(column) {
                        var maxLength = 0;
                        column.eachCell(function(cell) {
                            var columnLength = cell.value ? cell.value.toString().length : 10;
                            if (columnLength > maxLength) {
                                maxLength = columnLength;
                            }
                        });
                        column.width = maxLength < 10 ? 10 : maxLength;
                    });

                    // Menambahkan border ke seluruh tabel
                    sheet1.eachRow(function(row) {
                        row.eachCell(function(cell) {
                            cell.border = {
                                top: {
                                    style: 'thin'
                                },
                                left: {
                                    style: 'thin'
                                },
                                bottom: {
                                    style: 'thin'
                                },
                                right: {
                                    style: 'thin'
                                }
                            };
                        });
                    });

                    dataAct.data.forEach(function(row, ) {
                        var rowData = headers.map(function(header) {
                            return row[header];
                        });
                        sheet1.addRow(rowData);
                        // Menentukan lebar kolom berdasarkan isi
                        sheet1.columns.forEach(function(column) {
                            var maxLength = 0;
                            column.eachCell(function(cell) {
                                var columnLength = cell.value ? cell.value.toString().length : 10;
                                if (columnLength > maxLength) {
                                    maxLength = columnLength;
                                }
                            });
                            column.width = maxLength < 10 ? 10 : maxLength;
                        });

                        // Menambahkan border ke seluruh tabel
                        sheet1.eachRow(function(row) {
                            row.eachCell(function(cell) {
                                cell.border = {
                                    top: {
                                        style: 'thin'
                                    },
                                    left: {
                                        style: 'thin'
                                    },
                                    bottom: {
                                        style: 'thin'
                                    },
                                    right: {
                                        style: 'thin'
                                    }
                                };
                            });
                        });
                    });

                    workbook.xlsx.writeBuffer().then(function(buffer) {
                        var blob = new Blob([buffer], {
                            type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                        });
                        var url = window.URL.createObjectURL(blob);
                        var a = document.createElement('a');
                        a.href = url;
                        a.download = 'SUMMARY ACTIVITY.xlsx';
                        document.body.appendChild(a);
                        a.click();
                        window.URL.revokeObjectURL(url);
                    });
                },
                3000);
        }

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
            var today = new Date().toISOString().split('T')[0];
            if ($('#startDate').val() == '') {
                $('#startDate').val(today)
            }

            if ($('#endDate').val() == '') {
                $('#endDate').val(today)
            }

            let startDate = $('#startDate').val().trim();
            let endDate = $('#endDate').val().trim();
            let dataToPost = {
                startDate: startDate,
                endDate: endDate
            }

            $.post('getActivity', dataToPost, function(response) {
                let content = $('#content');
                content.empty();
                content.html(response)
                $('#tableCompleteActivities').DataTable({
                    sort: false,
                    responsive: true,
                    paging: false,
                    rowReorder: true,
                    scrollY: 300,
                    // columnDefs: [{
                    //     targets: [1, 2], // Indeks kolom yang ingin Anda atur
                    //     visible: false, // Atur menjadi false untuk menyembunyikan kolom pada layar kecil
                    // }],
                    rowReorder: {
                        selector: 'td:nth-child(2)'
                    }
                });
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

        $('#content').on('click', '.btnDelete', function() {
            // startLoading();
            let id = $(this).data('id');

            Swal.fire({
                icon: "question",
                title: "Do you want to delete this data?",
                showCancelButton: true,
                confirmButtonText: "Yes!",
            }).then((result) => {
                if (result.isConfirmed) {
                    // Swal.fire("Saved!", "", "success");
                    $.post('deleteActivity', {
                        id: id
                    }, function(response) {
                        // stopLoading();
                        if (response.success == true) {
                            getActivity();
                            //     getAllRowTask();
                            //     socket.send('ping');
                        }
                    }, 'json');
                }
            });


        });

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