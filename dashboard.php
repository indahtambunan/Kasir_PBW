<?php 

    $tgl = date("Y-m-d");
    $sql = $koneksi->query("select * from penjualan, barang where penjualan.kode_barcode=barang.kode and tgl_penjualan='$tgl'");

    while ($tampil=$sql->fetch_assoc()) {
        $profit         = $tampil['profit']*$tampil['jumlah'];
        $total_pj       = $total_pj+$tampil['total'];
        $total_profit   = $total_profit+$profit;
    }

    $sql2 = $koneksi->query("select * from barang");

    while ($tampil2=$sql2->fetch_assoc()) {
        $jumlah_barang = $sql2->num_rows;

    }
 ?>
<marquee>Selamat Datang dan Selamat Berbelanja</marquee>
<div class="container-fluid">
    <div class="block-header">
        <h2><b>DASHBOARD TOKO KITA</b></h2>
    </div>

    <!-- Widgets -->
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-light-green hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">view_compact</i>
                </div>
                <div class="content">
                    <div class="text">Data Barang</div>
                    <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?php echo $jumlah_barang; ?></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-light-blue hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">poll</i>
                </div>
                <div class="content">
                    <div class="text">Penjualan</div>
                    <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?php echo "Rp"."&nbsp".number_format($total_pj); ?></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-lime hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">attach_money</i>
                </div>
                <div class="content">
                    <div class="text">Profit</div>
                    <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"><?php echo "Rp"."&nbsp".number_format($total_profit); ?></div>
                </div>
            </div>
        </div>
               