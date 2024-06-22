<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waranty Reguler</title>
    </style>
    <link href="<?= base_url() ?>myassets/css/warantyReguler.css" rel="stylesheet" type="text/css" />
</head>

<body onload="print()">

    <?php
    for ($i = 0; $i < 2; $i++) {
    ?>
        <div class="page">
            <div class="barcode">
                <img class="imgBarcode" src="data:image/png;base64,<?php echo $barcode; ?>" alt="Barcode">
                <p class="pb1">CIAF-ACEBE-AAIA-00002</p>
            </div>
            <div class="divItemModel">
                <p class="p1">K-65S30 IA 2</p>
                <p class="p2">12638617</p>
            </div>
            <div class="divTokoPenjual">
                <p class="p3">PT. Permata Prima Teknologi</p>
            </div>
            <div class="divTanggalPenjualan">
                <p class="p3a">Masa garansi berlaku 1 (satu) tahun dimulai dari tanggal pembelian produk oleh konsumen dalam periode penjualan bergaransi Sony</p>
            </div>
            <div class="divKodeBawah1">
                <p class="p4">42026011-ICP297</p>
            </div>
            <div class="divKodeBawah2">
                <p class="p5">IMKG.2687.12.2023</p>
            </div>

            <div class="barcode2">
                <img class="imgBarcode2" src="data:image/png;base64,<?php echo $barcode; ?>" alt="Barcode">
                <p class="pb2">CIAF-ACEBE-AAIA-00002</p>
            </div>
            <div class="divItemModel2">
                <p class="p6">K-65S30 IA 2</p>
            </div>
            <div class="divTokoPenjual2">
                <p class="p7">PT. Permata Prima Teknologi</p>
            </div>
            <div class="divKodeBawah2a">
                <p class="p8">42026011-ICP297</p>
            </div>

            <div class="divKodeBawah1a">
                <p class="p9">IMKG.2687.12.2023</p>
            </div>

            <!-- <p class="p10">Paragraf10</p> -->
        </div>
    <?php
    }
    ?>
</body>

</html>