    <div class="container-fluid" style="min-height: 100vh; height: 100%; overflow: auto;">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <h4>Pembelian <?= $detail->row()->nama_barang?></h4>
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header bg-white" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Menunggu pembayaran
                                        </button>
                                    </h2>
                                    </div>
                                    <div id="collapseOne" class="collapse <?php if($detail->row()->status == 'Menunggu Pembayaran') echo 'show';?>" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        Tanggal pemesanan <?= date('D, d-m-Y H:i:s',strtotime($detail->row()->Tanggal_Payout))?><br>
                                        Batas Waktu pembayaran <?= date('D, d-m-Y H:i:s',strtotime($detail->row()->Expired_Payout))?><br>
                                    </div>
                                    </div>
                                </div>
<?php
$status = $detail->row()->status;
if($status == 'Sedang Diproses' || $status == 'Sedang Dikirim' || $status == 'Telah Diterima'){?>
                                <div class="card">
                                    <div class="card-header bg-white" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Pemesanan sedang diproses
                                        </button>
                                    </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse <?php if($status == 'Sedang Diproses') echo 'show';?>" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        Pesanan sedang diproses 
                                    </div>
                                    </div>
                                </div>
<?php
}
if($status == 'Sedang Dikirim' || $status == 'Telah Diterima'){?>
                                <div class="card">
                                    <div class="card-header bg-white" id="headingThree">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Pesanan sedang dikirim oleh kurir
                                        </button>
                                    </h2>
                                    </div>
                                    <div id="collapseThree" class="collapse <?php if($status == 'Sedang Dikirim') echo 'show';?>" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                    Pesanan sedang dikirim oleh kurir ke tempat tujuan pada waktu <br>
                                    Ke <?= $detail->row()->Alamat_Pelanggan?>, <?= $detail->row()->Kecamatan?>, <?= explode('-', $detail->row()->Kabupaten)[1]?>, <?= explode('-', $detail->row()->Provinsi)[1]?>, <?= $detail->row()->Kode_Pos?><br>
                                    Nomor Resi <?= $detail->row()->Resi?>
                                    </div>
                                    </div>
                                </div>
<?php
}
if($status == 'Telah Diterima'){?>
                                <div class="card">
                                    <div class="card-header bg-white" id="headingThree">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        Pesanan telah sampai
                                        </button>
                                    </h2>
                                    </div>
                                    <div id="collapseFour" class="collapse <?php if($status == 'Telah Diterima') echo 'show';?>" aria-labelledby="headingFour" data-parent="#accordionExample">
                                    <div class="card-body">
                                    Pesanan anda telah sampai ke tujuan <br>
                                    Diterima oleh 
                                    </div>
                                    </div>
                                </div>
<?php
}
if($status == 'Dibatalkan'){?>
                                <div class="card">
                                    <div class="card-header bg-white" id="headingThree">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        Pesanan dibatalkan
                                        </button>
                                    </h2>
                                    </div>
                                    <div id="collapseFive" class="collapse <?php if($status == 'Dibatalkan') echo 'show';?>" aria-labelledby="headingFour" data-parent="#accordionExample">
                                    <div class="card-body">
                                    Pesanan anda telah dibatalkan.
                                    </div>
                                    </div>
                                </div>
<?php
}?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>