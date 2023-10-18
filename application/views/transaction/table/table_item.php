<table role="grid" class="gridjs-table" style="height: auto;">
    <thead class="gridjs-thead">
        <tr class="gridjs-tr">
            <th data-column-id="#" class="gridjs-th gridjs-th-sort text-muted" tabindex="0" style="width: 40px;">
                <div class="gridjs-th-content">#</div><button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending" class="gridjs-sort gridjs-sort-neutral"></button>
            </th>
            <th data-column-id="product" class="gridjs-th gridjs-th-sort text-muted" tabindex="0" style="width: 360px;">
                <div class="gridjs-th-content">Product</div><button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending" class="gridjs-sort gridjs-sort-neutral"></button>
            </th>
            <th data-column-id="action" class="gridjs-th gridjs-th-sort text-muted" tabindex="0" style="width: 80px;">
                <div class="gridjs-th-content">Action</div><button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending" class="gridjs-sort gridjs-sort-neutral"></button>
            </th>
        </tr>
    </thead>
    <tbody class="gridjs-tbody">

        <?php for ($i = 1; $i < 6; $i++) { ?>
            <tr class="gridjs-tr">
                <td data-column-id="#" class="gridjs-td">
                    <span>
                        <?php echo $i ?>
                    </span>
                </td>
                <td data-column-id="product" class="gridjs-td"><span>
                        <div class="d-flex align-items-center">

                            <div class="flex-grow-1">
                                <h5 class="fs-14 mb-1"><a href="apps-ecommerce-product-details.html" class="text-body">Half Sleeve Round Neck T-Shirts</a></h5>
                                <p class="text-muted mb-0"><span class="fw-medium">4564684656832</span></p>
                                <p class="text-muted mb-0"><span class="fw-medium">350.000</span></p>
                            </div>
                        </div>
                    </span></td>
                <td data-column-id="action" class="gridjs-td">
                    <button class="btn btn-sm btn-primary">Add</button>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>