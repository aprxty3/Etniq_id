    <div class="container-fluid" style="min-height: 100vh; height: 100%; overflow: auto;">
        <div class="row">
            <div class="col-lg-8">
<?php
foreach($keranjang->result() as $row){
$lokasi = explode(';',base_url($row->Lokasi));?>
                <div class="card">
                    <div class="card-header bg-white">
                        <label><?= $row->Nama_Barang?></label>
                        <div class="float-right">
                            <form method="post">
                                <button type="submit" name="hapus" value="<?= $row->Id?>" class="btn">X</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <img src="<?= $lokasi[0];?>" class="col-lg-12">
                            </div>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-5">
                                    Qty
                                    </div>
                                    <div class="col-lg-7"><?= $row->Qty?></div>        
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                    Harga Satuan
                                    </div>
                                    <div class="col-lg-7"><?= $row->Harga_Satuan?></div>        
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                    Ukuran
                                    </div>
                                    <div class="col-lg-7"><?php if(!$row->Ukuran != ' ') echo $row->Ukuran; else echo '-'?></div>        
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                    Potongan
                                    </div>
                                    <div class="col-lg-7"><?= $row->Potongan?></div>        
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                    Lingkar Dada
                                    </div>
                                    <div class="col-lg-7"><?= $row->Lingkar_Dada?></div>        
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                    Lebar Bahu
                                    </div>
                                    <div class="col-lg-7"><?= $row->Lebar_Bahu?></div>        
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                    Leher
                                    </div>
                                    <div class="col-lg-7"><?= $row->Leher?></div>        
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                    Ketiak
                                    </div>
                                    <div class="col-lg-7"><?= $row->Ketiak?></div>        
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                    Perut
                                    </div>
                                    <div class="col-lg-7"><?= $row->Perut?></div>        
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                    Pinggul Atas
                                    </div>
                                    <div class="col-lg-7"><?= $row->Pinggul_Atas?></div>        
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                    Panjang Baju
                                    </div>
                                    <div class="col-lg-7"><?= $row->Panjang_Baju?></div>        
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                    Panjang Tangan Panjang
                                    </div>
                                    <div class="col-lg-7"><?= $row->Panjang_Tangan_Pjg?></div>        
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                    Panjang Tangan
                                    </div>
                                    <div class="col-lg-7"><?= $row->Panjang_Tangan?></div>        
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                    Pergelangan
                                    </div>
                                    <div class="col-lg-7"><?= $row->Pergelangan?></div>        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php
}?>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header bg-white">
                        <div class="col-lg-12">
                            <span>Pembayaran</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4"><span>Qty</span></div>
                            <div class="col-lg-8"><span><?= $qty?></span></div>
<?php 
if(isset($kd_diskon)){?>
                            <div class="col-lg-4"><span>Diskon</span></div>
                            <div class="col-lg-8"><span><?= $diskon?>%</span></div>
<?php
}?>
                            <div class="col-lg-4"><span>Ongkir</span></div>
                            <div class="col-lg-8"><span id="ongkir">Rp 0</span></div>
                            <div class="col-lg-4"><span>Total</span></div>
                            <div class="col-lg-8"><span id="total" value="<?= $total?>">Rp <?= number_format($total,2,',','.')?></span></div>
                        </div>
                        <form method="post">
                            <div class="form-group">
                                <input name="kd_diskon" class="form-control" type="text" placeholder="Kode Diskon" value="<?php if(isset($kd_diskon)) echo $kd_diskon;?>">
                            </div>
                            <div class="form-group">
                                <button name="submit" value="diskon" class="btn btn-primary col-lg-12" type="submit">Gunakan</button>
                            </div>
                        </form>
<?php
if(isset($kd_diskon)){?>
                        <span class="text-success">Anda Telah Menggunakan Kode Diskon <?= $kd_diskon?></span>
<?php
}?>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form id="pembayaran" method="post">
                            <div class="form-group">
                                <select class="form-control" name="alamat" id="alamat" required>
                                    <option value="" selected disabled>Pilih Alamat</option>
<?php
foreach($alamat->result() as $row){
    $id_kabupaten = explode('-',$row->Kabupaten)?>
                                    <option value="<?= $id_kabupaten[0]?>-<?= $row->Id_Alamat?>"><?= $row->Alamat_Pelanggan?></option>
<?php
}?>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="kurir" id="kurir" required>
                                    <option value="" selected disabled>Pilih Kurir</option>
                                    <option value="jne">JNE</option>
                                    <option value="tiki">TIKI</option>
                                    <option value="pos">POS INDONESIA</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="pelayanan" id="pelayanan" required>
                                    <option value="" selected disabled>Pilih Pelayanan</option>
                                </select>
                            </div>
                            <input name="kd_diskon" type="hidden" value="<?php if(isset($kd_diskon)) echo $kd_diskon;?>">
                            <button name="submit" value="pembayaran" class="btn btn-primary col-lg-12" type="submit">Bayar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>