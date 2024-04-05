<table style="font-size: 12px;" class="table table-bordered table-striped align-middle mb-0" id="tableDetail">
    <thead>
        <tr>
            <th scope="col">NO.</th>
            <th scope="col">ITEM CHECKED</th>
            <th scope="col">CONDITION</th>
            <th scope="col">DESCRIPTION</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($item->result() as $data) {
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data->{'ITEM CHECKED'} ?></td>
                <td><?= $data->{'CONDITION'} ?></td>
                <td><?= $data->{'DESCRIPTION'} ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>