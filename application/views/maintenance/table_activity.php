<table style="font-size: 12px;" class="table table-responsive table-nowrap table-bordered table-striped align-middle mb-0" id="tableCompleteActivities">
    <thead>
        <tr>
            <th scope="col">NO.</th>
            <th scope="col">FORKLIFT</th>
            <th scope="col">PIC</th>
            <th scope="col">DATE</th>
            <th scope="col">HOURS START</th>
            <th scope="col">HOURS FINISH</th>
            <th scope="col">ITEM</th>
            <th scope="col">GOOD</th>
            <th scope="col">NOT GOOD</th>
            <th scope="col">ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($activity->result() as $data) {
        ?>
            <tr>
                <td style="white-space: nowrap;"><?= $no++ ?></td>
                <td><?= $data->forklift ?></td>
                <td style="white-space: nowrap;"><?= $data->created_by ?></td>
                <td><?= date('Y-m-d', strtotime($data->created_at)) ?></td>
                <td><?= $data->hour_start ?></td>
                <td><?= $data->hour_end ?></td>
                <td><?= $data->item_check ?></td>
                <td><?= $data->item_good ?></td>
                <td><?= $data->item_not_good ?></td>
                <td style="white-space: nowrap;">
                    <button class="btn btn-sm btn-success btnDetailExcel" data-id="<?= $data->id ?>">Excel</button>
                    <button class="btn btn-sm btn-info btnDetail" data-id="<?= $data->id ?>">Detail</button>
                    <button class="btn btn-sm btn-primary btnEdit" data-id="<?= $data->id ?>">Edit</button>
                    <button class="btn btn-sm btn-danger btnDelete" data-id="<?= $data->id ?>">Delete</button>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>