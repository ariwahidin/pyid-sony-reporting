<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <span class="me-3" id="spConnect"></span>
                        <a href="javascript: void(0);">Dashboards </a>
                    </li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card card-animate overflow-hidden">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Inbound Summary</h4>
            </div>
            <div class="card-body" style="z-index:1 ;">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-3"> Proccess</p>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-0">
                            <span id="spInboundProses">0</span>
                        </h4>
                    </div>
                    <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-3"> Complete</p>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-0">
                            <span id="spInboundComplete">0</span>
                        </h4>
                    </div>
                    <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-3"> Total </p>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-0">
                            <span id="spInboundTotal">0</span>
                        </h4>
                    </div>
                    <div class="flex-shrink-0">
                        <div id="cartInbound"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-animate overflow-hidden">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Outbound Summary</h4>
            </div>
            <div class="card-body" style="z-index:1 ;">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-3"> Proccess</p>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-0">
                            <span id="spOutboundProses">0</span>
                        </h4>
                    </div>
                    <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-3"> Complete</p>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-0">
                            <span id="spOutboundComplete">0</span>
                        </h4>
                    </div>
                    <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-3"> Total </p>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-0">
                            <span id="spOutboundTotal">0</span>
                        </h4>
                    </div>
                    <div class="flex-shrink-0">
                        <div id="cartOutbound"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row project-wrapper">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Inbound Proccess</h4>
                <div class="flex-shrink-0">
                    <button type="button" class="btn btn-soft-info btn-sm">
                        Today
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive table-card" id="divInbound">

                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Outbound Proccess</h4>
                <div class="flex-shrink-0">
                    <button type="button" class="btn btn-soft-info btn-sm">
                        <!-- <i class="ri-file-list-3-line align-middle"></i>  -->
                        Today
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                        <thead class="text-muted table-light">
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Picking List</th>
                                <th scope="col">Checker</th>
                                <th scope="col">Picking</th>
                                <th scope="col">Scanning</th>
                                <th scope="col">Checking</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">2024-03-30</div>
                                    </div>
                                </td>
                                <td>XY9000001</td>
                                <td>Lukman</td>
                                <td>43 MENIT</td>
                                <td>52 MENIT</td>
                                <td>40 MENIT</td>
                                <td>
                                    <span class="badge bg-success-subtle text-success">DONE</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">2024-03-30</div>
                                    </div>
                                </td>
                                <td>XY9000002</td>
                                <td>Dodi</td>
                                <td>43 MENIT</td>
                                <td>52 MENIT</td>
                                <td>-</td>
                                <td>
                                    <span class="badge bg-primary-subtle text-success">ON PROCCESS</span>
                                </td>
                            </tr>
                            <tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

</script>


<script>
    $(document).ready(function() {
        getAllProccessInbound();


        var socket;
        initWebSocket();

        function initWebSocket() {
            let hostname = window.location.hostname;
            console.log(hostname);
            socket = new WebSocket('ws://' + hostname + ':8001');

            socket.onopen = function() {
                $('#spConnect').html(`<span class="position-absolute mt-2 translate-middle badge border border-light rounded-circle bg-success p-2"><span class="visually-hidden">Connected</span></span>`);
                console.log('WebSocket connection opened');
            };

            socket.onmessage = function(event) {
                getAllProccessInbound();
                cartInbound();
                console.log('Received message: ' + event.data);
                // Handle received message
            };

            socket.onclose = function(event) {
                $('#spConnect').html(`<span class="position-absolute mt-2 translate-middle badge border border-light rounded-circle bg-danger p-2"><span class="visually-hidden">Not Connected</span></span>`);
                console.log('WebSocket connection closed');
                // Try to re-initiate connection after a delay
                setTimeout(initWebSocket, 5000); // Retry after 5 seconds
            };

            socket.onerror = function(error) {
                console.error('WebSocket error: ' + error);
                // Handle WebSocket error, if necessary
            };
        }

        function getAllProccessInbound() {
            $.post('getAllProccessInbound', function(response) {
                let divInbound = $('#divInbound');
                divInbound.empty();
                divInbound.html(response);
            });
        }

        cartInbound();


        function cartInbound() {

            $.post('getPresentaseInbound', {}, function(response) {

                let data = response.data;

                let presentase = Math.round(data.presentase);

                $('#spInboundProses').text(data.inbound_proses);
                $('#spInboundComplete').text(data.inbound_complete);
                $('#spInboundTotal').text(data.total_inbound);

                $('#cartInbound').empty();
                $('#cartInbound').html(`<div id="ctr" class="apex-charts"></div>`);

                var options = {
                    series: [presentase],
                    chart: {
                        type: "radialBar",
                        width: 105,
                        sparkline: {
                            enabled: true
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    plotOptions: {
                        radialBar: {
                            hollow: {
                                margin: 0,
                                size: "70%"
                            },
                            track: {
                                margin: 1
                            },
                            dataLabels: {
                                show: true,
                                name: {
                                    show: false
                                },
                                value: {
                                    show: true,
                                    fontSize: "16px",
                                    fontWeight: 600,
                                    offsetY: 8
                                }
                            }
                        }
                    },
                    colors: ['#0000FF'] // Gunakan warna-warna yang telah Anda definisikan
                };

                var chart = new ApexCharts(document.querySelector("#ctr"), options);
                chart.render();
            }, 'json');
        }


        cartOutbound();

        function cartOutbound() {

            $.post('getPresentaseOutbound', {}, function(response) {

                let data = response.data;

                let presentase = Math.round(data.presentase);

                $('#spOutboundProses').text(data.outbound_proses);
                $('#spOutboundComplete').text(data.outbound_complete);
                $('#spOutboundTotal').text(data.total_outbound);

                $('#cartOutbound').empty();
                $('#cartOutbound').html(`<div id="ctro" class="apex-charts"></div>`);

                var options = {
                    series: [presentase],
                    chart: {
                        type: "radialBar",
                        width: 105,
                        sparkline: {
                            enabled: true
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    plotOptions: {
                        radialBar: {
                            hollow: {
                                margin: 0,
                                size: "70%"
                            },
                            track: {
                                margin: 1
                            },
                            dataLabels: {
                                show: true,
                                name: {
                                    show: false
                                },
                                value: {
                                    show: true,
                                    fontSize: "16px",
                                    fontWeight: 600,
                                    offsetY: 8
                                }
                            }
                        }
                    },
                    colors: ['#FF5733'] // Gunakan warna-warna yang telah Anda definisikan
                };

                var chart = new ApexCharts(document.querySelector("#ctro"), options);
                chart.render();
            }, 'json');
        }
    });
</script>