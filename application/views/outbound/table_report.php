<table style="font-size: 10px;" class="table table-bordered table-striped table-nowrap align-middle mb-0" id="tableCompleteActivities">
    <thead>
        <tr>
            <th scope="col">NO.</th>
            <th scope="col">ACTIVITY DATE</th>
            <th scope="col">PL DATE</th>
            <th scope="col">PL TIME</th>
            <th scope="col">PL NO</th>
            <th scope="col">NO TRUCK</th>
            <th scope="col">EXPEDISI</th>
            <th scope="col">DRIVER</th>
            <th scope="col">CHECKER</th>
            <th scope="col">QTY</th>
            <th scope="col">PICKING START</th>
            <th scope="col">PICKING STOP</th>
            <th scope="col">PICKING DURATION</th>
            <th scope="col">CHECKING START</th>
            <th scope="col">CHECKING STOP</th>
            <th scope="col">CHECKING DURATION</th>
            <th scope="col">SCANNING START</th>
            <th scope="col">SCANNING STOP</th>
            <th scope="col">SCANNING DURATION</th>
            <th scope="col">ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($completed->result() as $data) {
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= date('Y-m-d', strtotime($data->created_date)) ?></td>
                <td><?= date('Y-m-d', strtotime($data->pl_date)) ?></td>
                <td><?= date('H:i', strtotime($data->pl_time)) ?></td>
                <td><?= $data->no_pl ?></td>
                <td><?= $data->no_truck ?></td>
                <td><?= $data->ekspedisi_name ?></td>
                <td><?= $data->driver ?></td>
                <td><?= $data->checker_name ?></td>
                <td><?= $data->qty ?></td>
                <td><?= date('H:i', strtotime($data->start_picking)) ?></td>
                <td><?= date('H:i', strtotime($data->stop_picking)) ?></td>
                <td><?= $data->duration_picking ?></td>
                <td><?= date('H:i', strtotime($data->start_checking)) ?></td>
                <td><?= date('H:i', strtotime($data->stop_checking)) ?></td>
                <td><?= $data->duration_checking ?></td>
                <td><?= date('H:i', strtotime($data->start_scanning)) ?></td>
                <td><?= date('H:i', strtotime($data->stop_scanning)) ?></td>
                <td><?= $data->duration_scanning ?></td>
                <td>
                    <button class="btn mt-1 mb-1 btn-sm btn-primary btnEdit" data-id="<?= $data->id ?>">Edit</button>
                    <button class="btn mt-1 mb-1 btn-sm btn-danger btnDelete" data-id="<?= $data->id ?>">Delete</button>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>