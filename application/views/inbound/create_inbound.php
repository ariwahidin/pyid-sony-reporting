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
                                <table class="table table-success table-striped table-nowrap align-middle mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Detail</th>
                                            <th scope="col">Unloading</th>
                                            <th scope="col">Checking</th>
                                            <th scope="col">Putaway</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($i = 0; $i < 3; $i++) { ?>
                                            <tr>
                                                <td>
                                                    <div class="card card-time">
                                                        <div class="card-body text-left">
                                                            <div class="text-left mb-2">
                                                                <span>SJ No : <strong id=""></strong></span>
                                                                <br>
                                                                <span>Qty : <strong id=""></strong></span>
                                                                <br>
                                                                <span>Date: <strong id=""></strong></span>
                                                                <br>
                                                                <span>Checker: <strong id=""></strong></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="card card-time">
                                                        <div class="card-body text-left">
                                                            <div id="clockUnloading<?= $i ?>"></div>
                                                            <div class="text-left mb-2">
                                                                <span>Start : <strong id="logStartUnloading<?= $i ?>"></strong></span>
                                                                <br>
                                                                <span>Stop : <strong id="logStopUnloading<?= $i ?>"></strong></span>
                                                                <br>
                                                                <span>Duration: <strong id="duration"></strong></span>
                                                            </div>
                                                            <div class="hstack gap-2 justify-content-center">
                                                                <button class="btn btn-success btn-sm" id="startButtonUnloading" onclick="startClock(this,'clockUnloading<?= $i ?>','logStartUnloading<?= $i ?>','logStopUnloading<?= $i ?>' )"><i class=" ri-play-circle-line align-bottom me-1"></i> Start</button>
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
                                        <?php } ?>
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
    var stopClockFlag = true; // Atur menjadi true agar jam tidak dimulai saat halaman dimuat
    var startTime, stopTime;

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
                <h5 class="modal-title" id="createTaskLabel">Create Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" id="createTaskBtn-close" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="task-error-msg" class="alert alert-danger py-2"></div>
                <form autocomplete="off" action="#" id="creattask-form">
                    <input type="hidden" id="taskid-input" class="form-control">
                    <div class="mb-3">
                        <label for="task-title-input" class="form-label">Task Title</label>
                        <input type="text" id="task-title-input" class="form-control" placeholder="Enter task title">
                    </div>
                    <div class="mb-3 position-relative">
                        <label for="task-assign-input" class="form-label">Assigned To</label>

                        <div class="avatar-group justify-content-center" id="assignee-member"></div>
                        <div class="select-element">
                            <button class="btn btn-light w-100 d-flex justify-content-between" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                <span>Assigned To<b id="total-assignee" class="mx-1">0</b>Members</span> <i class="mdi mdi-chevron-down"></i>
                            </button>
                            <div class="dropdown-menu w-100">
                                <div data-simplebar style="max-height: 141px">
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="avatar-xxs flex-shrink-0 me-2">
                                                    <img src="assets/images/users/avatar-2.jpg" alt="" class="img-fluid rounded-circle" />
                                                </div>
                                                <div class="flex-grow-1">James Forbes</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="avatar-xxs flex-shrink-0 me-2">
                                                    <img src="assets/images/users/avatar-3.jpg" alt="" class="img-fluid rounded-circle" />
                                                </div>
                                                <div class="flex-grow-1">John Robles</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="avatar-xxs flex-shrink-0 me-2">
                                                    <img src="assets/images/users/avatar-4.jpg" alt="" class="img-fluid rounded-circle" />
                                                </div>
                                                <div class="flex-grow-1">Mary Gant</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="avatar-xxs flex-shrink-0 me-2">
                                                    <img src="assets/images/users/avatar-1.jpg" alt="" class="img-fluid rounded-circle" />
                                                </div>
                                                <div class="flex-grow-1">Curtis Saenz</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="avatar-xxs flex-shrink-0 me-2">
                                                    <img src="assets/images/users/avatar-5.jpg" alt="" class="img-fluid rounded-circle" />
                                                </div>
                                                <div class="flex-grow-1">Virgie Price</div>
                                            </a>
                                        </li>

                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="avatar-xxs flex-shrink-0 me-2">
                                                    <img src="assets/images/users/avatar-10.jpg" alt="" class="img-fluid rounded-circle" />
                                                </div>
                                                <div class="flex-grow-1">Anthony Mills</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="avatar-xxs flex-shrink-0 me-2">
                                                    <img src="assets/images/users/avatar-6.jpg" alt="" class="img-fluid rounded-circle" />
                                                </div>
                                                <div class="flex-grow-1">Marian Angel</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="avatar-xxs flex-shrink-0 me-2">
                                                    <img src="assets/images/users/avatar-7.jpg" alt="" class="img-fluid rounded-circle" />
                                                </div>
                                                <div class="flex-grow-1">Johnnie Walton</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="avatar-xxs flex-shrink-0 me-2">
                                                    <img src="assets/images/users/avatar-8.jpg" alt="" class="img-fluid rounded-circle" />
                                                </div>
                                                <div class="flex-grow-1">Donna Weston</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="avatar-xxs flex-shrink-0 me-2">
                                                    <img src="assets/images/users/avatar-9.jpg" alt="" class="img-fluid rounded-circle" />
                                                </div>
                                                <div class="flex-grow-1">Diego Norris</div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4 mb-3">
                        <div class="col-lg-6">
                            <label for="task-status" class="form-label">Status</label>
                            <select class="form-control" data-choices data-choices-search-false id="task-status-input">
                                <option value="">Status</option>
                                <option value="New" selected>New</option>
                                <option value="Inprogress">Inprogress</option>
                                <option value="Pending">Pending</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                        <!--end col-->
                        <div class="col-lg-6">
                            <label for="priority-field" class="form-label">Priority</label>
                            <select class="form-control" data-choices data-choices-search-false id="priority-field">
                                <option value="">Priority</option>
                                <option value="High">High</option>
                                <option value="Medium">Medium</option>
                                <option value="Low">Low</option>
                            </select>
                        </div>
                        <!--end col-->
                    </div>
                    <div class="mb-4">
                        <label for="task-duedate-input" class="form-label">Due Date:</label>
                        <input type="date" id="task-duedate-input" class="form-control" placeholder="Due date">
                    </div>

                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-ghost-success" data-bs-dismiss="modal"><i class="ri-close-fill align-bottom"></i> Close</button>
                        <button type="submit" class="btn btn-primary" id="addNewTodo">Add Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end create taks-->