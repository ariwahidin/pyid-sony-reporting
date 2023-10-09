<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Master Subdist</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Master Subdist</a></li>
                </ol>
            </div>

        </div>
    </div>
</div>

<!-- end page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Add, Edit & Remove</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="listjs-table" id="customerList">
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <div>
                                <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Add</button>
                                <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="d-flex justify-content-sm-end">
                                <div class="search-box ms-2">
                                    <input type="text" class="form-control search" placeholder="Search...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="customerTable">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" style="width: 50px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                        </div>
                                    </th>
                                    <th class="sort" data-sort="CardCode">CardCode</th>
                                    <th class="sort" data-sort="CardName">CardName</th>
                                    <th class="sort" data-sort="Area">Area</th>
                                    <th class="sort" data-sort="Address">Address</th>
                                    <th class="sort" data-sort="Serviced_by">Serviced_by</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                            </tbody>
                        </table>
                        <div class="noresult" style="display: none">
                            <div class="text-center">
                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any orders for you search.</p>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <div class="pagination-wrap hstack gap-2">
                            <a class="page-item pagination-prev disabled" href="javascript:void(0);">
                                Previous
                            </a>
                            <ul class="pagination listjs-pagination mb-0"></ul>
                            <a class="page-item pagination-next" href="javascript:void(0);">
                                Next
                            </a>
                        </div>
                    </div>
                </div>
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0 flex-grow-1">Base Example</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div id="table-subdist"></div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <!-- end col -->
</div>

<div class="row">
    <div class="col-12">

    </div><!-- end col -->

    <div class="col-xxl-4">

    </div><!-- end col -->
</div><!-- end row -->
<!-- prismjs plugin -->
<script src="<?= base_url('jar/html/default/') ?>assets/libs/prismjs/prism.js"></script>
<script src="<?= base_url('jar/html/default/') ?>assets/libs/list.js/list.min.js"></script>
<script src="<?= base_url('jar/html/default/') ?>assets/libs/list.pagination.js/list.pagination.min.js"></script>


<!-- Sweet Alerts js -->
<script>
  var customerList = new List("customerList", {
    valueNames: ["CardCode", "CardName", "Area", "Address", "Serviced_by"],
    page: 8,
    pagination: true,
    plugins: [ListPagination({ left: 2, right: 2 })],
  });
 
  refreshCallbacks();
 
  async function fetchData() {
    try {
      const response = await fetch("<?= base_url('master/getMasterSubdist') ?>");
      if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
      }
      const data = await response.json();
      return data.subdist;
    } catch (error) {
      console.error("Fetch error:", error);
      throw error;
    }
  }
 
  async function populateGrid() {
    try {
      const subdistData = await fetchData();
      customerList.clear();
      subdistData.forEach((item) => {
        customerList.add(item);
      });
      customerList.sort("CardCode", { order: "desc" });
      refreshCallbacks();
    } catch (error) {
      console.error("Error populating grid:", error);
    }
  }
 
  populateGrid();
 
  function refreshCallbacks() {
    var removeBtns = document.getElementsByClassName("remove-item-btn");
    var editBtns = document.getElementsByClassName("edit-item-btn");
 
    Array.from(removeBtns).forEach(function (btn) {
      btn.addEventListener("click", function () {
        var itemId = btn.closest("tr").querySelector(".id a").innerText;
        document.getElementById("checkAll").checked = false;
      });
    });
 
  }


    async function fetchData() {
        try {
            const response = await fetch("<?= base_url('master/getMasterSubdist') ?>");
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            const data = await response.json();
            return data;
        } catch (error) {
            console.error("Fetch error:", error);
            throw error;
        }
    }

    async function populateGrid() {
        try {
            const grid = new Grid({
                columns: ["CardCode", "CardName"],
            }).render(document.getElementById("table-subdist"));
            const data = await fetchData();

            grid.updateConfig({
                data: subdist.map((item) => [item.CardCode, item.CardName]),
            });

            grid.forceRender();
        } catch (error) {
            console.error("Error populating grid:", error);
        }
    }

    populateGrid();
</script>