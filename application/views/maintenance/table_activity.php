<table style="font-size: 12px;" class="table table-bordered table-striped align-middle mb-0" id="tableCompleteActivities">
    <thead>
        <tr>
            <th scope="col">NO.</th>
            <th scope="col">FORKLIFT</th>
            <th scope="col">HOURS START</th>
            <th scope="col">HOURS FINISH</th>
            <th scope="col">ITEM</th>
            <th scope="col">GOOD</th>
            <th scope="col">NOT GOOD</th>
            <th scope="col">PIC</th>
            <th scope="col">DATE</th>
            <th scope="col">ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($activity->result() as $data) {
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data->forklift ?></td>
                <td><?= $data->hour_start ?></td>
                <td><?= $data->hour_end ?></td>
                <td><?= $data->item_check ?></td>
                <td><?= $data->item_good ?></td>
                <td><?= $data->item_not_good ?></td>
                <td><?= $data->created_by ?></td>
                <td><?= date('Y-m-d H:i:s', strtotime($data->created_at)) ?></td>
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