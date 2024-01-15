<?php
if ($completed->num_rows() > 0) {
    foreach ($completed->result() as $val) {
?>
        <tr>
            <th scope="row"><a href="#" class="fw-medium"><?= $val->no_sj ?></a></th>
            <td><?= $val->checker ?></td>
            <td><?= $val->ref_date ?></td>
            <td><?= $val->start_unload ?></td>
            <td><?= $val->stop_unload ?></td>
            <td><?= $val->unload_duration ?></td>
            <td><?= $val->start_checking ?></td>
            <td><?= $val->stop_checking ?></td>
            <td><?= $val->checking_duration ?></td>
            <td><?= $val->start_putaway ?></td>
            <td><?= $val->stop_putaway ?></td>
            <td><?= $val->putaway_duration ?></td>
        </tr>
<?php
    }
}
?>