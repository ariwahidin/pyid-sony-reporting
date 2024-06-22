<table id="item-table" class="display table table-nowrap table-sm table-striped table-bordered table-hover hover-table" style="width:100%; white-space: nowrap; cursor: pointer;;">
    <thead>
        <tr>
            <th>#.</th>
            <th>Code</th>
            <th>Name</th>
            <th>Desc</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($forklift->result() as $data) {
        ?>
            <tr data-id="<?= $data->id ?>">
                <td><?= $no++ ?></td>
                <td><?= $data->code ?></td>
                <td><?= $data->name ?></td>
                <td><?= $data->desc ?></td>
                <td>
                    <div class="hstack gap-3 fs-15">
                        <a href="javascript:void(0);" class="link-primary linkEdit" data-id="<?= $data->id ?>" data-name="<?= $data->name ?>" data-desc="<?= $data->desc ?>"><i class="ri-edit-2-fill"></i></a>
                        <a href="javascript:void(0);" class="link-danger"><i class="ri-delete-bin-5-line"></i></a>
                    </div>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>