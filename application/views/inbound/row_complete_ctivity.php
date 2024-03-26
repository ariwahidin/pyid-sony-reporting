<?php
if ($completed->num_rows() > 0) {
    $no = 1;
    foreach ($completed->result() as $val) {
?>
        <tr>
            <th><?= $no++; ?></a></th>
            <th><?= $val->no_sj ?></a></th>
            <th><?= $val->no_truck ?></a></th>
            <td style="background: lightgreen;"><?= $val->checker_name ?></td>
            <td><?= $val->qty ?></td>
            <td><?= $val->ref_date ?></td>
            <td><?= date('H:i', strtotime($val->start_unload)) ?></td>
            <td><?= date('H:i', strtotime($val->stop_unload)) ?></td>
            <td style="background: lightgreen;"><?= $val->unload_duration ?></td>
            <td><?= date('H:i', strtotime($val->start_checking)) ?></td>
            <td><?= date('H:i', strtotime($val->stop_checking)) ?></td>
            <td style="background: lightgreen;"><?= $val->checking_duration ?></td>
            <td><?= date('H:i', strtotime($val->start_putaway)) ?></td>
            <td><?= date('H:i', strtotime($val->stop_putaway)) ?></td>
            <td style="background: lightgreen;"><?= $val->putaway_duration ?></td>
            <td>
                <button class="btn btn-sm btn-primary btnEditComplete" data-id="<?= $val->id ?>">Edit</button>
                <!-- <button class="btn btn-sm btn-danger btnDeleteComplete" data-id="<?= $val->id ?>">Delete</button> -->
            </td>
        </tr>
<?php
    }
}
?>