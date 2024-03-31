<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards </a>
                        <span id="spConnect"></span>
                    </li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row project-wrapper">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Inbound Proccess</h4>
                <div class="flex-shrink-0">
                    <button type="button" class="btn btn-soft-info btn-sm">
                        <!-- <i class="ri-file-list-3-line align-middle"></i>  -->
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
    $(document).ready(function() {
        getAllProccessInbound();


        var socket;
        initWebSocket();
        function initWebSocket() {
            socket = new WebSocket('ws://localhost:8001');

            socket.onopen = function() {
                $('#spConnect').html(`<i class="ri-swap-box-fill"></i>`);
                console.log('WebSocket connection opened');
            };

            socket.onmessage = function(event) {
                getAllProccessInbound();
                console.log('Received message: ' + event.data);
                // Handle received message
            };

            socket.onclose = function(event) {
                $('#spConnect').html(`<i class="ri-alert-fill"></i>`);
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
    });
</script>