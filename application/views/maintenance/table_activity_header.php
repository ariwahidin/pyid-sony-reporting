<table style="font-size: 12px;" class="table table-bordered table-striped align-middle mb-0" id="tableActivityHeader">
    <thead>
        <tr>
            <th scope="col">FORKLIFT</th>
            <th scope="col">HOURS START</th>
            <th scope="col">HOURS FINISH</th>
            <th scope="col">ITEM</th>
            <th scope="col">GOOD</th>
            <th scope="col">NOT GOOD</th>
            <th scope="col">PIC</th>
            <th scope="col">DATE</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($activity->result() as $data) {
        ?>
            <tr>
                <td><?= $data->forklift ?></td>
                <td><?= $data->hour_start ?></td>
                <td><?= $data->hour_end ?></td>
                <td><?= $data->item_check ?></td>
                <td><?= $data->item_good ?></td>
                <td><?= $data->item_not_good ?></td>
                <td><?= $data->created_by ?></td>
                <td><?= date('Y-m-d', strtotime($data->created_at)) ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>