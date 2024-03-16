<?php
if ($completed->num_rows() > 0) {
    $no=1;
    foreach ($completed->result() as $val) {
?>
        <tr>
            <th scope="row"><a href="#" class="fw-medium"><?= $no++; ?></a></th>
            <th scope="row"><a href="#" class="fw-medium"><?= $val->no_sj ?></a></th>
            <td style="background: lightgreen;"><?= $val->checker ?></td>
            <td><?= $val->ref_date ?></td>
            <td><?= $val->start_unload ?></td>
            <td><?= $val->stop_unload ?></td>
            <td style="background: lightgreen;"><?= $val->unload_duration ?></td>
            <td><?= $val->start_checking ?></td>
            <td><?= $val->stop_checking ?></td>
            <td style="background: lightgreen;"><?= $val->checking_duration ?></td>
            <td><?= $val->start_putaway ?></td>
            <td><?= $val->stop_putaway ?></td>
            <td style="background: lightgreen;"><?= $val->putaway_duration ?></td>
        </tr>
<?php
    }
}
?>