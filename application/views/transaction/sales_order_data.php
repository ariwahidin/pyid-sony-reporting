<link href="<?= base_url() ?>myassets/css/jquery.dataTables.min.css" rel="stylesheet" />
<script src="<?= base_url() ?>myassets/js/jquery-3.7.0.js"></script>
<script src="<?= base_url() ?>myassets/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>




<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Data sales order</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Data sales order</a></li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url('transaction/salesorder') ?>" class="btn btn-primary" id="">Create New</a>
            </div>
            <div class="card-body">
                <table id="order-data" class="display" style="width:100%"></table>
            </div>
        </div>
    </div>
</div>

<!-- Default Modals -->
<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div style="background-color: var(--vz-body-bg) !important;" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Order Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">
                <div class="card" id="demo">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-body p-4">
                                <div class="row g-3">
                                    <div class="col-lg-3 col-6">
                                        <p class="text-muted mb-2 text-uppercase fw-semibold">Order ID</p>
                                        <h5 class="fs-14 mb-0"><span id="spanOrderId">25000355</span></h5>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <p class="text-muted mb-2 text-uppercase fw-semibold">Order Date</p>
                                        <h5 class="fs-14 mb-0">
                                            <span id="spanOrderDate">23 Nov, 2021</span>
                                            <!-- <small class="text-muted" id="invoice-time">02:36PM</small> -->
                                        </h5>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <p class="text-muted mb-2 text-uppercase fw-semibold">Created By</p>
                                        <span class="badge bg-success-subtle text-success fs-11" id="spanCreatedBy">Paid</span>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <p class="text-muted mb-2 text-uppercase fw-semibold">Total Amount</p>
                                        <h5 class="fs-14 mb-0"><span id="spanGrandTotal">755.96</span></h5>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <!--end card-body-->
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div class="card-body p-4 border-top border-top-dashed">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <h6 class="text-muted text-uppercase fw-semibold mb-3">Customer</h6>
                                        <p class="fw-medium mb-2" id="pCustName">David Nichols</p>
                                        <p class="text-muted mb-1" id="pCustAddress">305 S San Gabriel Blvd</p>
                                        <p class="text-muted mb-1">City : <span id="pCustCity">(123) 456-7890</span></p>
                                        <p class="text-muted mb-1">Phone : <span id="pCustPhone">(123) 456-7890</span></p>
                                    </div>
                                    <!--end col-->
                                    <!-- <div class="col-6">
                                        <h6 class="text-muted text-uppercase fw-semibold mb-3">Shipping Address</h6>
                                        <p class="fw-medium mb-2" id="shipping-name">David Nichols</p>
                                        <p class="text-muted mb-1" id="shipping-address-line-1">305 S San Gabriel Blvd</p>
                                        <p class="text-muted mb-1"><span>Phone: +</span><span id="shipping-phone-no">(123) 456-7890</span></p>
                                    </div> -->
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <!--end card-body-->
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div class="card-body p-4">
                                <div class="table-responsive">
                                    <table id="table-product" class="table table-borderless text-center table-nowrap align-middle mb-0">
                                        <thead>
                                            <tr class="table-active">
                                                <th scope="col" style="width: 50px;">#</th>
                                                <th scope="col">Product Details</th>
                                                <th scope="col" class="text-end">Price</th>
                                                <th scope="col">Disc</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col" class="text-end">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody id="products-list">
                                        </tbody>
                                    </table><!--end table-->
                                </div>
                                <div class="border-top border-top-dashed mt-2">
                                    <table class="table table-borderless table-nowrap align-middle mb-0 ms-auto" style="width:250px">
                                        <tbody>
                                            <tr>
                                                <td>Sub Total</td>
                                                <td class="text-end"><span id="spanSubtotal"></span></td>
                                            </tr>
                                            <tr>
                                                <td>Disc (<span id="spanDiscPercent"></span>)</td>
                                                <td class="text-end"><span id="spanDiscAmount">$44.99</span></td>
                                            </tr>
                                            <tr>
                                            <tr class="border-top border-top-dashed fs-15">
                                                <th scope="row">Total Amount</th>
                                                <th class="text-end"><span id="spanTotalAmount">$755.96</span></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!--end table-->
                                </div>
                                <!-- <div class="mt-3">
                                    <h6 class="text-muted text-uppercase fw-semibold mb-3">Payment Details:</h6>
                                    <p class="text-muted mb-1">Payment Method: <span class="fw-medium" id="payment-method">Mastercard</span></p>
                                    <p class="text-muted mb-1">Card Holder: <span class="fw-medium" id="card-holder-name">David Nichols</span></p>
                                    <p class="text-muted mb-1">Card Number: <span class="fw-medium" id="card-number">xxx xxxx xxxx 1234</span></p>
                                    <p class="text-muted">Total Amount: <span class="fw-medium" id="">$ </span><span id="card-total-amount">755.96</span></p>
                                </div> -->
                                <!-- <div class="mt-4">
                                    <div class="alert alert-info">
                                        <p class="mb-0"><span class="fw-semibold">NOTES:</span>
                                            <span id="note">All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or
                                                credit card or direct payment online. If account is not paid within 7
                                                days the credits details supplied as confirmation of work undertaken
                                                will be charged the agreed quoted fee noted above.
                                            </span>
                                        </p>
                                    </div>
                                </div> -->
                            </div>
                            <!--end card-body-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div>
                <!--end card-->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary ">Save Changes</button> -->
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="<?= base_url() ?>myassets/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            url: "<?= base_url('transaction/getDataSalesOrder') ?>",
            method: 'GET',
            dataType: 'JSON',
            success: function(response) {
                let data = response.data.order
                // console.log(data);
                let table = $('#order-data').DataTable({
                    responsive: true,
                    lengthChange: true,
                    data: data, // Data yang akan dimasukkan
                    pageLength: 10, // Batasi jumlah data yang ditampilkan menjadi 5
                    columns: [{
                            data: null,
                            title: 'No.',
                            render: function(data, type, row, meta) {
                                return meta.row + 1; // Menggunakan nomor baris sebagai nomor urut, mulai dari 1
                            }
                        }, {
                            data: null,
                            title: 'Order Id',
                            render: function(data, type, row) {
                                return `${data.id}`;
                            }
                        }, {
                            data: null,
                            title: 'CustName',
                            render: function(data, type, row) {
                                return `${data.CustName}`;
                            }
                        }, {
                            data: null,
                            title: 'Subtotal',
                            render: function(data, type, row) {
                                return `<div style="text-align: right;">${formatCurrency(data.Subtotal)}</div>`;
                            }
                        },
                        {
                            data: null,
                            title: 'DiscPercent',
                            render: function(data, type, row) {
                                return `<div style="text-align: right;">${data.DiscPercent}</div>`;
                            }
                        }, {
                            data: null,
                            title: 'DiscAmount',
                            render: function(data, type, row) {
                                return `<div style="text-align: right;">${formatCurrency(data.DiscAmount)}</div>`;
                            }
                        }, {
                            data: null,
                            title: 'GrandTotal',
                            render: function(data, type, row) {
                                return `<div style="text-align: right;">${formatCurrency(data.GrandTotal)}</div>`;
                            }
                        }, {
                            data: null,
                            title: 'Action',
                            render: function(data, type, row) {
                                return `<button id="addButton" 
                                data-id="${data.id}"
                                data-custname="${data.CustName}"
                                data-custaddr="${data.CustAddress}"
                                data-custcity="${data.custCity}"
                                data-custphone="${data.custPhone}"
                                data-createdat="${data.CreatedAt}"
                                data-username="${data.username}"
                                data-grandtotal="${data.GrandTotal}"
                                data-subtotal="${data.Subtotal}"
                                data-discamount="${data.DiscAmount}"
                                data-discpercent="${data.DiscPercent}"
                                class="btn btn-primary btn-sm btnDetail" data-bs-toggle="modal" data-bs-target="#myModal">Detail</button>`;
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


    $(document).on('click', '.btnDetail', function() {
        const orderId = $(this).data('id');
        const url = "<?= base_url('transaction/getDetailOrder/') ?>" + orderId;
        const table = $('#table-product tbody');
        table.html('');
        const spanOrderId = $('#spanOrderId');
        spanOrderId.text($(this).data('id'));
        const spanOrderDate = $('#spanOrderDate');
        spanOrderDate.text(formatDateIndo($(this).data('createdat')));
        const spanCreatedBy = $('#spanCreatedBy');
        spanCreatedBy.text($(this).data('username'));
        const spanGrandTotal = $('#spanGrandTotal');
        spanGrandTotal.text(formatCurrency($(this).data('grandtotal')));
        const pCustName = $('#pCustName');
        pCustName.text($(this).data('custname'));
        const pCustAddress = $('#pCustAddress');
        pCustAddress.text($(this).data('custaddr'));
        const pCustCity = $('#pCustCity');
        pCustCity.text($(this).data('custcity'));
        const pCustPhone = $('#pCustPhone');
        pCustPhone.text($(this).data('custphone'));
        const spanSubtotal = $('#spanSubtotal');
        spanSubtotal.text(formatCurrency($(this).data('subtotal')));
        const spanDiscPercent = $('#spanDiscPercent');
        spanDiscPercent.text($(this).data('discpercent') + "%");
        const spanDiscAmount = $('#spanDiscAmount');
        spanDiscAmount.text(formatCurrency($(this).data('discamount')));
        const spanTotalAmount = $('#spanTotalAmount');
        spanTotalAmount.text(formatCurrency($(this).data('grandtotal')));

        $.get(url, function(data) {
            let datas = JSON.parse(data)
            if (datas.success === true) {
                const product = datas.data.detail;
                let no = 1;
                product.forEach(function(item) {
                    const row = $('<tr>');
                    row.html(`
                    <th scope="row">${no++}</th>
                    <td class="text-start">
                    <span class="fw-medium">${item.itemName}</span>
                    <p class="text-muted mb-0">${item.frgnName}</p>
                    </td>
                    <td class="text-end">${formatCurrency(item.price)}</td>
                    <td>${item.discItemPercent} %</td>
                    <td>${item.qty}</td>
                    <td class="text-end">${formatCurrency(item.total)}</td>
                    `);
                    table.append(row);
                });
            }
        }).fail(function(error) {
            console.error('Terjadi kesalahan dalam mengambil data:', error);
        });
    })

    function formatCurrency(value) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        }).format(value);
    }

    function formatDateIndo(dateTimeString) {
        const [datePart, timePart] = dateTimeString.split(' ');
        const [year, month, day] = datePart.split('-');
        const [hours, minutes] = timePart.split(':');

        const monthNames = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli',
            'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        const formattedDate = `${parseInt(day, 10)} ${monthNames[parseInt(month, 10) - 1]} ${year}`;
        const formattedTime = `${hours}:${minutes}`;

        return `${formattedDate} ${formattedTime}`;
    }
</script>