<link href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />
<script src="https://unpkg.com/gridjs/dist/gridjs.production.min.js"></script>

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

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0 flex-grow-1">Base Example</h4>
            </div>

            <div class="card-body">
                <div id="table-subdist"></div>
                <script>
                    new gridjs.Grid({
                        search: true,
                        sort: true,
                        pagination: {
                            limit: 10
                        },
                        columns: ["CardCode", "CardName", "Serviced_By", "Address", "Area"],
                        server: {
                            url: "http://localhost/subdist/master/getMasterSubdist",
                            then: data => data.subdist.map(item => [item.CardCode, item.CardName, item.Serviced_by, item.Address, item.Area])
                        },
                    }).render(document.getElementById("table-subdist"));
                </script>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
    </div>
</div>