<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Sales Order</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Transaction</a></li>
                    <li class="breadcrumb-item active">Sales Order</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-6">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row g-4 align-items-center">
                            <div class="col-sm">
                                <h5 class="card-title mb-0">Product List</h5>
                            </div>
                            <div class="col-sm">
                                <div class="d-flex justify-content-sm-end">
                                    <div class="search-box ms-2">
                                        <input type="text" class="form-control" id="searchProductList" placeholder="Search Products..." fdprocessedid="eay2dw">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card header -->
                    <div class="card-body">
                        <div class="tab-content text-muted">
                            <div class="tab-pane active" id="productnav-all" role="tabpanel">
                                <div id="table-product-list-all" class="table-card gridjs-border-none">
                                    <div role="complementary" class="gridjs gridjs-container" style="width: 100%;">
                                        <div class="gridjs-wrapper" style="height: auto;">
                                            <table role="grid" class="gridjs-table" style="height: auto;">
                                                <thead class="gridjs-thead">
                                                    <tr class="gridjs-tr">
                                                        <th data-column-id="#" class="gridjs-th gridjs-th-sort text-muted" tabindex="0" style="width: 40px;">
                                                            <div class="gridjs-th-content">#</div><button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending" class="gridjs-sort gridjs-sort-neutral"></button>
                                                        </th>
                                                        <th data-column-id="product" class="gridjs-th gridjs-th-sort text-muted" tabindex="0" style="width: 360px;">
                                                            <div class="gridjs-th-content">Product</div><button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending" class="gridjs-sort gridjs-sort-neutral"></button>
                                                        </th>
                                                        <!-- <th data-column-id="stock" class="gridjs-th gridjs-th-sort text-muted" tabindex="0" style="width: 94px;">
                                                            <div class="gridjs-th-content">Stock</div><button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending" class="gridjs-sort gridjs-sort-neutral"></button>
                                                        </th> -->
                                                        <th data-column-id="price" class="gridjs-th gridjs-th-sort text-muted" tabindex="0" style="width: 101px;">
                                                            <div class="gridjs-th-content">Price</div><button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending" class="gridjs-sort gridjs-sort-neutral"></button>
                                                        </th>
                                                        <th data-column-id="action" class="gridjs-th gridjs-th-sort text-muted" tabindex="0" style="width: 80px;">
                                                            <div class="gridjs-th-content">Action</div><button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending" class="gridjs-sort gridjs-sort-neutral"></button>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="gridjs-tbody">

                                                    <?php for ($i = 1; $i < 11; $i++) { ?>
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
                                                                        </div>
                                                                    </div>
                                                                </span></td>
                                                            <!-- <td data-column-id="stock" class="gridjs-td">12</td> -->
                                                            <td data-column-id="price" class="gridjs-td"><span>215.000</span></td>
                                                            <td data-column-id="action" class="gridjs-td">
                                                                <button class="btn btn-sm btn-primary">Add</button>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="gridjs-footer">
                                            <div class="gridjs-pagination">
                                                <div role="status" aria-live="polite" class="gridjs-summary" title="Page 1 of 2">Showing <b>1</b> to <b>10</b> of <b>12</b> results</div>
                                                <div class="gridjs-pages"><button tabindex="0" role="button" disabled="" title="Previous" aria-label="Previous" class="">Previous</button><button tabindex="0" role="button" class="gridjs-currentPage" title="Page 1" aria-label="Page 1" fdprocessedid="kys9g">1</button><button tabindex="0" role="button" class="" title="Page 2" aria-label="Page 2" fdprocessedid="bvwqzg">2</button><button tabindex="0" role="button" title="Next" aria-label="Next" class="" fdprocessedid="zya0j8">Next</button></div>
                                            </div>
                                        </div>
                                        <div id="gridjs-temp" class="gridjs-temp"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
    </div>
    <div class="col-xl-6">
        <div class="row">
            <div class="col-lg-12">
                <div class="card" id="customerList">
                    <div class="card-header border-bottom-dashed">

                        <div class="row g-4 align-items-center">
                            <div class="col-sm">
                                <div>
                                    <h5 class="card-title mb-0">Customer</h5>
                                </div>
                            </div>
                            <div class="col-sm-auto">
                                <div class="d-flex flex-wrap align-items-start gap-2">
                                    <div class="search-box">
                                        <input type="text" class="form-control search" placeholder="Search for customer">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                    <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> New Customer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="table-responsive table-card mb-1">
                                <table class="table align-middle" id="customerTable">
                                    <thead class="table-light text-muted">
                                        <tr>
                                            <th class="sort" data-sort="customer_name">Customer</th>
                                            <th class="sort" data-sort="phone">Phone</th>
                                            <th class="sort" data-sort="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        <tr>
                                            <td class="customer_name">PT Maryss nasis Cousar</td>
                                            <td class="phone">580-464-4694</td>
                                            <td>
                                                <ul class="list-inline hstack gap-2 mb-0">
                                                    <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Remove">
                                                        <a class="text-danger d-inline-block remove-item-btn" data-bs-toggle="modal" href="#deleteRecordModal">
                                                            <i class="ri-delete-bin-5-fill fs-16"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal fade" id="showModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-light p-3">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                    </div>
                                    <form class="tablelist-form" autocomplete="off">
                                        <div class="modal-body">
                                            <input type="hidden" id="id-field" />

                                            <div class="mb-3" id="modal-id" style="display: none;">
                                                <label for="id-field1" class="form-label">ID</label>
                                                <input type="text" id="id-field1" class="form-control" placeholder="ID" readonly />
                                            </div>

                                            <div class="mb-3">
                                                <label for="customername-field" class="form-label">Customer Name</label>
                                                <input type="text" id="customername-field" class="form-control" placeholder="Enter name" required />
                                                <div class="invalid-feedback">Please enter a customer name.</div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="email-field" class="form-label">Email</label>
                                                <input type="email" id="email-field" class="form-control" placeholder="Enter email" required />
                                                <div class="invalid-feedback">Please enter an email.</div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="phone-field" class="form-label">Phone</label>
                                                <input type="text" id="phone-field" class="form-control" placeholder="Enter phone no." required />
                                                <div class="invalid-feedback">Please enter a phone.</div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="date-field" class="form-label">Joining Date</label>
                                                <input type="date" id="date-field" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" required placeholder="Select date" />
                                                <div class="invalid-feedback">Please select a date.</div>
                                            </div>

                                            <div>
                                                <label for="status-field" class="form-label">Status</label>
                                                <select class="form-control" data-choices data-choices-search-false name="status-field" id="status-field" required>
                                                    <option value="">Status</option>
                                                    <option value="Active">Active</option>
                                                    <option value="Block">Block</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success" id="add-btn">Add Customer</button>
                                                <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mt-2 text-center">
                                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                                <h4>Are you sure ?</h4>
                                                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this record ?</p>
                                            </div>
                                        </div>
                                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn w-sm btn-danger" id="delete-record">Yes, Delete It!</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end modal -->
                    </div>
                </div>

            </div>
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row g-4 align-items-center">
                            <div class="col-sm">
                                <h5 class="card-title mb-0">Product Order</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="tab-content text-muted">
                            <div class="tab-pane active" id="productnav-all" role="tabpanel">
                                <div id="table-product-list-all" class="table-card gridjs-border-none">
                                    <div role="complementary" class="gridjs gridjs-container" style="width: 100%;">
                                        <div class="gridjs-wrapper" style="height: auto;">
                                            <table role="grid" class="gridjs-table" style="height: auto;">
                                                <thead class="gridjs-thead">
                                                    <tr class="gridjs-tr">
                                                        <th data-column-id="#" class="gridjs-th gridjs-th-sort text-muted" tabindex="0" style="width: 40px;">
                                                            <div class="gridjs-th-content">#</div><button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending" class="gridjs-sort gridjs-sort-neutral"></button>
                                                        </th>
                                                        <th data-column-id="product" class="gridjs-th gridjs-th-sort text-muted" tabindex="0" style="width: 360px;">
                                                            <div class="gridjs-th-content">Product</div><button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending" class="gridjs-sort gridjs-sort-neutral"></button>
                                                        </th>
                                                        <!-- <th data-column-id="stock" class="gridjs-th gridjs-th-sort text-muted" tabindex="0" style="width: 94px;">
                                                            <div class="gridjs-th-content">Stock</div><button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending" class="gridjs-sort gridjs-sort-neutral"></button>
                                                        </th> -->
                                                        <th data-column-id="price" class="gridjs-th gridjs-th-sort text-muted" tabindex="0" style="width: 101px;">
                                                            <div class="gridjs-th-content">Quantity</div><button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending" class="gridjs-sort gridjs-sort-neutral"></button>
                                                        </th>
                                                        <th data-column-id="action" class="gridjs-th gridjs-th-sort text-muted" tabindex="0" style="width: 80px; text-align: center;">
                                                            <div class="gridjs-th-content">Action</div><button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending" class="gridjs-sort gridjs-sort-neutral"></button>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="gridjs-tbody">

                                                    <?php for ($i = 1; $i < 3; $i++) { ?>
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
                                                                        </div>
                                                                    </div>
                                                                </span></td>
                                                            <!-- <td data-column-id="stock" class="gridjs-td">12</td> -->
                                                            <td data-column-id="qty" class="gridjs-td">
                                                                <div class="input-step">
                                                                    <button type="button" class="minus" fdprocessedid="at46vd">–</button>
                                                                    <input type="number" class="product-quantity" value="1" min="0" max="100" fdprocessedid="bs7ki8">
                                                                    <button type="button" class="plus" fdprocessedid="aips3">+</button>
                                                                </div>
                                                            </td>
                                                            <td data-column-id="action" class="gridjs-td" style="text-align: center;">
                                                                <a class="text-danger d-inline-block remove-item-btn" data-bs-toggle="modal" href="#deleteRecordModal">
                                                                    <i class="ri-delete-bin-5-fill fs-16"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div id="gridjs-temp" class="gridjs-temp"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end tab pane -->




                            <!-- end tab pane -->
                        </div>
                        <!-- end tab content -->

                    </div>
                    <!-- end card body -->
                </div>
            </div>
            <div class="col-lg-5"></div>
            <div class="col-lg-7">
                <div class="card" id="customerList">
                    <div class="card-header border-bottom-dashed">
                        <div class="row g-4 align-items-center">
                            <div class="col-sm">
                                <div>
                                    <h5 class="card-title mb-0">Order Summary</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-2">
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td>Sub Total :</td>
                                        <td class="text-end" id="cart-subtotal">7.000.000</td>
                                    </tr>
                                    <tr>
                                        <td>Discount : </td>
                                        <td class="text-end" id="cart-discount">500.000</td>
                                    </tr>
                                    <tr class="table-active">
                                        <th>Total (IDR) :</th>
                                        <td class="text-end">
                                            <span class="fw-semibold" id="cart-total">
                                                6.500.000
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- end table-responsive -->
                    </div>
                    <div class="card-footer">
                        <div class="col-sm-auto">
                            <div class="text-end">
                                <button type="button" class="btn btn-success btn-label right ms-auto"><i class="ri-arrow-right-line label-icon align-bottom fs-16 ms-2"></i>Proses Order</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>