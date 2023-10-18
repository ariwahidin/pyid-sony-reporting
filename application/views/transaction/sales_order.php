<!-- <link href="https://cdn.jsdelivr.net/npm/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/gridjs/dist/gridjs.umd.js"></script> -->

<link href="<?= base_url() ?>myassets/css/jquery.dataTables.min.css" rel="stylesheet" />
<style>
    /* On sales order shown */
    .navbar-header {
        display: <?= $this->uri->segment(2) == 'salesorder' ? 'none !important' : '' ?>;
    }

    .page-title-box {
        padding: 10px 1.5rem;
        background-color: var(--vz-secondary-bg);
        -webkit-box-shadow: var(--vz-page-title-box-shadow);
        box-shadow: var(--vz-page-title-box-shadow);
        border-bottom: 1px solid var(--vz-page-title-border);
        margin: <?= $this->uri->segment(2) == 'salesorder' ? '0px -1.5rem 1.5rem -1.5rem' : '' ?>;
    }

    .page-content {
        padding: <?= $this->uri->segment(2) == 'salesorder' ? '0px' : 'calc(70px + 1.5rem)' ?> calc(1.5rem * .5) 60px calc(1.5rem * .5);
    }

    /* .barbar {
        position: <?= $this->uri->segment(2) == 'salesorder' ? 'fixed' : '' ?>;
    } */
</style>
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
    <div class="col-xl-4">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable"></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <div class="row">

            <div class="col-lg-7">
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

            <div class="col-lg-5">
                <div class="card" id="customerList">
                    <div class="card-header border-bottom-dashed">
                        <div class="row g-4 align-items-center">
                            <div class="col-xl-6">
                                <div>
                                    <h5 class="card-title mb-0">Order Summary</h5>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="text-end">
                                    <button type="button" class="btn btn-success btn-label right ms-auto" id="prosesButton"><i class="ri-arrow-right-line label-icon align-bottom fs-16 ms-2"></i>Proses Order</button>
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
                                        <td class="text-end" id="cart-subtotal"></td>
                                    </tr>
                                    <tr>
                                        <td>Discount : </td>
                                        <td style="text-align: end !important;" class="align-items-end" id="cart-discount">
                                            <div class="formCost d-flex gap-2 justify-content-end">
                                                <span class="fw-semibold text-muted">%</span>
                                                <input style="max-width: 2.5rem" class="form-control form-control-sm" type="number" id="summaryDiscountPercent" value="0" />
                                                <span class="fw-semibold text-muted">Rp.</span>
                                                <input style="max-width: 4.5rem" class="form-control form-control-sm" type="number" id="summaryDiscount" value="1000" />
                                            </div>
                                            <!-- 500.000 -->
                                        </td>
                                    </tr>
                                    <tr class="table-active">
                                        <th>Total (IDR) :</th>
                                        <td class="text-end">
                                            <span class="fw-semibold" id="grandTotal">
                                                6.500.000
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- end table-responsive -->
                    </div>
                    <!-- <div class="card-footer">
                    </div> -->
                </div>
            </div>

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row g-4 align-items-center">
                            <div class="col-sm">
                                <h5 class="card-title mb-0">Product Order

                                    <span class="text-muted fs-14 fw-medium">(</span>
                                    <span class="text-muted fs-14 fw-medium totalRow">0</span>
                                    <span class="text-muted fs-14 fw-medium"> Product</span>
                                    <span class="text-muted fs-14 fw-medium">)</span>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="tab-content text-muted">
                            <div class="tab-pane active" id="productnav-all" role="tabpanel">
                                <div id="table-product-list-all" class="table-card gridjs-border-none">
                                    <div role="complementary" class="gridjs gridjs-container" style="width: 100%;">
                                        <div class="gridjs-wrapper" style="height: auto;">
                                            <table role="grid" class="gridjs-table table_order" style="height: auto;">
                                                <thead class="gridjs-thead">
                                                    <tr class="gridjs-tr">
                                                        <th data-column-id="product" class="gridjs-th gridjs-th-sort text-muted" tabindex="0" style="width: 360px;">
                                                            <div class="gridjs-th-content">Product</div><button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending" class="gridjs-sort gridjs-sort-neutral"></button>
                                                        </th>
                                                        <th data-column-id="price" class="gridjs-th gridjs-th-sort text-muted" tabindex="0" style="width: 101px;">
                                                            <div class="gridjs-th-content">Price</div><button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending" class="gridjs-sort gridjs-sort-neutral"></button>
                                                        </th>
                                                        <th data-column-id="stock" class="gridjs-th gridjs-th-sort text-muted" tabindex="0" style="width: 94px;">
                                                            <div class="gridjs-th-content">Uom</div><button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending" class="gridjs-sort gridjs-sort-neutral"></button>
                                                        </th>
                                                        <th data-column-id="price" class="gridjs-th gridjs-th-sort text-muted" tabindex="0" style="width: 101px;">
                                                            <div class="gridjs-th-content">Quantity</div><button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending" class="gridjs-sort gridjs-sort-neutral"></button>
                                                        </th>
                                                        <th data-column-id="price" class="gridjs-th gridjs-th-sort text-muted" tabindex="0" style="width: 101px;">
                                                            <div class="gridjs-th-content">Disc(%)</div><button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending" class="gridjs-sort gridjs-sort-neutral"></button>
                                                        </th>
                                                        <th data-column-id="price" class="gridjs-th gridjs-th-sort text-muted" tabindex="0" style="width: 101px;">
                                                            <div class="gridjs-th-content">Total</div><button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending" class="gridjs-sort gridjs-sort-neutral"></button>
                                                        </th>
                                                        <th data-column-id="action" class="gridjs-th gridjs-th-sort text-muted" tabindex="0" style="width: 80px; text-align: center;">
                                                            <div class="gridjs-th-content">Action</div><button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending" class="gridjs-sort gridjs-sort-neutral"></button>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="gridjs-tbody tbodyProductOrder">
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
        </div>
    </div>
</div>
<script src="<?= base_url() ?>myassets/js/jquery.dataTables.min.js"></script>
<script>
    let totalRowOrder = 0;
    countRowOrder()
    countSubTotal()
    countGrandTotal()


    $(document).ready(function() {
        $.ajax({
            url: "<?= base_url('transaction/loadDataForSalesOrder') ?>",
            method: 'GET',
            dataType: 'JSON',
            success: function(response) {
                // Manipulasi data dan isi tabel DataTable di sini
                let data = response.data.item
                let table = $('#datatable').DataTable({
                    responsive: true,
                    lengthChange: false,
                    data: data, // Data yang akan dimasukkan
                    pageLength: 5, // Batasi jumlah data yang ditampilkan menjadi 5
                    columns: [{
                            data: null,
                            title: 'Product',
                            render: function(data, type, row) {
                                // Gunakan fungsi render untuk menampilkan data dengan HTML dan CSS yang disesuaikan
                                return `<strong> ${data.ItemName} </strong>
                                <p class="text-muted mb-0">
                                <span class="fw-medium">${data.FrgnName}</span>
                                </p>
                                <p class="text-muted mb-0">
                                <span class="fw-medium">${data.Price}</span>
                                </p>`;
                            }
                        },
                        {
                            data: null,
                            title: 'Action',
                            render: function(data, type, row) {
                                return `<button id="addButton" 
                                data-id="${data.id}" 
                                data-ItemCode="${data.ItemCode}" 
                                data-ItemName="${data.ItemName}" 
                                data-FrgnName="${data.FrgnName}" 
                                data-Price="${data.Price}" 
                                class="btn btn-primary btn-sm">Add</button>`;
                            }
                        }
                    ]
                });
            },
            error: function(error) {
                console.error('Gagal mengambil data dari API: ', error);
            }
        });

    })

    // Mendaftarkan event listener dengan event delegation
    $(document).on('click', '#datatable #addButton', function() {
        addNewRow($(this).data())
    });

    $(document).on('click', '.tbodyProductOrder #deleteRecord', function() {
        $(this).closest('tr').remove()
        countRowOrder()
        countSubTotal()
        countGrandTotal()
    })


    $(document).on('click', '#prosesButton', getOrderCart);


    function countSubTotal() {
        var subTotal = 0;
        if (totalRowOrder > 0) {
            // Mendapatkan semua elemen input dalam tabel (menggunakan kelas CSS sebagai contoh)
            var inputElements = document.querySelectorAll('.product-total'); // Gantilah dengan kelas yang sesuai   
            // Inisialisasi total ke 0
            // Loop melalui semua elemen input dan menjumlahkan nilai-nilainya
            inputElements.forEach(function(inputElement) {
                var value = parseFloat(inputElement.value); // Menggunakan parseFloat untuk mengubah nilai menjadi angka
                if (!isNaN(value)) {
                    subTotal += value;
                }
            });
        }
        // Output total
        document.getElementById("cart-subtotal").innerHTML = formatUang(subTotal)
        // console.log('subtotal: ' + subTotal);
        formatUang(subTotal)
        return subTotal;
    }

    function countGrandTotal() {
        let grandTotal = 0;
        let subTotal = countSubTotal();
        let discountAmount = 0;
        let summaryDiscount = document.getElementById("summaryDiscount").value;

        if (!isNaN(summaryDiscount)) {
            discountAmount = summaryDiscount;
        }

        grandTotal = subTotal - discountAmount;
        // console.log('GrandTotal = ' + grandTotal);
        document.getElementById("grandTotal").innerHTML = formatUang(grandTotal)
        return grandTotal;
    }

    function formatUang(number) {
        const formatted = number.toLocaleString('id-ID', {
            style: 'currency',
            currency: 'IDR'
        });
        // console.log(formatted); // Output: "Rp 1.234.567,89"
        return formatted;
    }

    function countRowOrder() {
        // Mendapatkan referensi ke elemen <tbody> atau <table>
        var tableBody = document.querySelector(".tbodyProductOrder"); // Gantilah dengan selektor yang sesuai
        var rowCount = tableBody.rows.length;
        // Output jumlah baris
        // console.log("Jumlah baris dalam tabel: " + rowCount);
        document.querySelector(".totalRow").innerHTML = rowCount;
        totalRowOrder = rowCount;
        return rowCount;
    }


    function addNewRow(dataItem) {
        // console.log(dataItem)
        const orderBody = document.querySelector(".tbodyProductOrder");
        // Buat elemen <tr> baru
        const newRow = document.createElement("tr");
        newRow.className = "gridjs-tr";
        // Isi elemen <tr> dengan elemen-elemen <td> yang sesuai
        newRow.innerHTML = `
                            <td data-column-id="product" class="gridjs-td">
                                <span>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h5 class="fs-14 mb-1">
                                            ${dataItem.itemname}
                                            </h5>
                                            <p class="text-muted mb-0">
                                                <span class="fw-medium">
                                                ${dataItem.frgnname}
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </span>
                            </td>
                            <td data-column-id="qty" class="gridjs-td">
                                <div class="input-step">
                                    <input type="hidden" class="product-quantity product-item-code" value="${dataItem.itemcode}">
                                    <input type="number" class="product-quantity product-price" value="${dataItem.price}">
                                </div>
                            </td>
                            <td data-column-id="stock" class="gridjs-td">
                                <div class="input-step">
                                    <select class="product-quantity product-uom" name="" id="">
                                        <option value="crt">Crt</option>
                                        <option value="pcs">Pcs</option>
                                    </select>
                                </div>
                            </td>
                            <td data-column-id="qty" class="gridjs-td">
                                <div class="input-step">
                                    <input type="number" class="product-quantity product-qty" value="1" min="0" max="100">
                                </div>
                            </td>
                            <td data-column-id="qty" class="gridjs-td">
                                <div class="input-step">
                                    <input type="number" class="product-quantity product-disc" value="30" min="0" max="100">
                                </div>
                            </td>
                            <td data-column-id="qty" class="gridjs-td">
                                <div class="input-step">
                                    <input type="number" class="product-quantity product-total" value="350000" min="0" max="100">
                                </div>
                            </td>
                            <td data-column-id="action" class="gridjs-td" style="text-align: center;">
                                <button class="text-danger d-inline-block remove-item-btn" id="deleteRecord">
                                    <i class="ri-delete-bin-5-fill fs-16"></i>
                                </button>
                            </td>
                            `;
        // Sisipkan baris ke dalam tabel
        orderBody.appendChild(newRow);
        countRowOrder()
        countSubTotal()
        countGrandTotal()
    }

    function getOrderCart() {
        let arrayOrder = [];
        let objectData = {}; 

        let tbody = document.querySelector(".tbodyProductOrder");
        let table = document.querySelector(".table_order");
        let discout = document.querySelector("#summaryDiscount").value
        let discountPercent = document.querySelector("#summaryDiscountPercent").value
        let subtotal = countSubTotal()
        let grandTotal = countGrandTotal()

        objectData.discount = discout;
        objectData.discountPercent = discountPercent;
        objectData.subtotal = subtotal;
        objectData.grandTotal = grandTotal;

        if (tbody.rows.length > 0) {
            let rows = tbody.querySelectorAll('tr');
            rows.forEach(function(row) {
                let rowData = {};
                let inputItemCode = row.querySelector('.product-item-code');
                let inputPrice = row.querySelector('.product-price');
                let inputUom = row.querySelector('.product-uom');
                let inputQty = row.querySelector('.product-qty');
                let inputDisc = row.querySelector('.product-disc');
                let inputTotal = row.querySelector('.product-total');
                rowData.itemcode = inputItemCode.value;
                rowData.price = inputPrice.value;
                rowData.uom = inputUom.value;
                rowData.qty = inputQty.value;
                rowData.disc = inputDisc.value;
                rowData.total = inputTotal.value;
                arrayOrder.push(rowData)
            });
            objectData.order = arrayOrder;
            console.log(objectData);
        } else {
            Swal.fire(
                'Warning!',
                'Belum ada product yang dipilih',
                'warning'
            )
        }
    }
</script>