    <div class="container-fluid" style="min-height: 100vh; height: 100%; overflow: auto;">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="invoice-title">
                                        <h2>Invoice <?= $detail_pembayaran->row(0)->Id_Payout?></h2>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <address>
                                            <strong>Dikirim Ke:</strong><br>
<?php
$kabupaten = explode('-',$detail_pembayaran->row(0)->Kabupaten);
$provinsi = explode('-',$detail_pembayaran->row(0)->Provinsi);
?>
                                                <?= $detail_pembayaran->row(0)->nama_pelanggan;?><br>
                                                <?= $detail_pembayaran->row(0)->Alamat_Pelanggan?>,<br>
                                                <?= $detail_pembayaran->row(0)->Kecamatan?>,<br>
                                                <?= $kabupaten[1]?>, <?= $provinsi[1]?>, <?= $detail_pembayaran->row(0)->Kode_Pos?>
                                            </address>
                                        </div>
                                        <div class="col-lg-6 text-right">
                                            <address>
                                                <strong>Tanggal Pemesanan:</strong><br>
                                                <?= date('D, d-m-Y H:i:s',strtotime($detail_pembayaran->row(0)->Tanggal_Payout))?><br><br>
                                                <strong>Tanggal Expired Pembayaran:</strong><br>
                                                <?= date('D, d-m-Y H:i:s',strtotime($detail_pembayaran->row(0)->Expired_Payout))?><br><br>
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <!-- <div class="panel-heading">
                                            <h3 class="panel-title"><strong>Order summary</strong></h3>
                                        </div> -->
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-condensed">
                                                    <thead>
                                                        <tr>
                                                            <td><strong>Nama Batik</strong></td>
                                                            <td class="text-center"><strong>Harga</strong></td>
                                                            <td class="text-center"><strong>Kuantitas</strong></td>
                                                            <td class="text-right"><strong>Total</strong></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
<?php
$total = 0;
foreach($detail_pembayaran->result() as $row){?>

                                                        <tr>
                                                            <td><?= $row->nama_barang?></td>
                                                            <td class="text-center">Rp <?= number_format($row->harga_satuan,2,',','.')?></td>
                                                            <td class="text-center"><?= $row->qty?></td>
                                                            <td class="text-right">Rp <?= number_format($row->total,2,',','.')?></td>
                                                        </tr>
<?php
    $total=$total+$row->total;
}?>
                                                        <tr>
                                                            <td class="thick-line"></td>
                                                            <td class="thick-line"></td>
                                                            <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                                            <td class="thick-line text-right">Rp <?= number_format($total,2,',','.')?></td>
                                                        </tr>
<?php
if($detail_pembayaran->row(0)->Kd_Diskon != 'null'){
    $diskon = $total*($detail_pembayaran->row(0)->diskon/100)?>
                                                        <tr>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line text-center"><strong>Diskon</strong></td>
                                                            <td class="no-line text-right">Rp <?= number_format($diskon,2,',','.')?></td>
                                                        </tr>
<?php
}?>
                                                        <tr>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line text-center"><strong>Biaya Kirim</strong></td>
                                                            <td class="no-line text-right">Rp <?= number_format($detail_pembayaran->row(0)->Ongkir,2,',','.')?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line text-center"><strong>Total yang harus dibayar</strong></td>
                                                            <td class="no-line text-right">Rp <?= number_format($detail_pembayaran->row(0)->Total_Bayar,2,',','.')?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .invoice-title h2, .invoice-title h3 {
        display: inline-block;
    }

    .table > tbody > tr > .no-line {
        border-top: none;
    }

    .table > thead > tr > .no-line {
        border-bottom: none;
    }

    .table > tbody > tr > .thick-line {
        border-top: 2px solid;
    }
    </style>