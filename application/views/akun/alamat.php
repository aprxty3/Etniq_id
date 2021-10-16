    <div class="container-fluid" style="min-height: 100vh; height: 100%; overflow: auto;">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Pengaturan Alamat</h5>
                        <div class="table-responsive">
                            <table class="table table-striped">
<?php
if($alamat->result()){?>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Alamat</th>
                                        <th>Kelurahan</th>
                                        <th>Kecamatan</th>
                                        <th>Kabupaten</th>
                                        <th>Provinsi</th>
                                        <th>Kode Pos</th>
                                        <th></th>
                                    </tr>
                                    </thead>
<?php
}?>
                                <tbody>
<?php
$i = 1;
foreach ($alamat->result() as $row){?>
                                    <tr>
                                        <td><?= $i?></td>
                                        <td><?= $row->Alamat_Pelanggan?></td>
                                        <td><?= $row->Kelurahan?></td>
                                        <td><?= $row->Kecamatan?></td>
                                        <td><?= explode('-',$row->Kabupaten)[1]?></td>
                                        <td><?= explode('-',$row->Provinsi)[1]?></td>
                                        <td><?= $row->Kode_Pos?></td>
                                        <td>
                                            <a href="<?= base_url('akun/alamat/ubah/'.$row->Id_Alamat)?>" class="btn btn-primary">Ubah</a>
                                            <button form="hapus" name="hapus" value="<?= $row->Id_Alamat?>" class="btn btn-danger">Hapus</button>
                                        </td>
                                    </tr>
<?php
    $i++;
}?>
                                </tbody>
                            </table>
                        </div>
                        <form method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input name="alamat" placeholder="Masukkan Alamat" class="form-control" type="text" value="<?php if(isset($ubah)) echo $ubah->Alamat_Pelanggan?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Kelurahan</label>
                                        <input name="kelurahan" placeholder="Masukkan Kelurahan" class="form-control" type="text" value="<?php if(isset($ubah)) echo $ubah->Kelurahan?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <input name="kecamatan" placeholder="Masukkan Kecamatan" class="form-control" type="text" value="<?php if(isset($ubah)) echo $ubah->Kecamatan?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Provinsi</label>
                                        <select name="provinsi" id="provinsi" class="form-control" value="<?php if(isset($ubah)) echo explode('-',$ubah->Provinsi)[0]?>" required>
                                            <option value="" selected disabled>Pilih Provinsi</option>
<?php
$rajaongkir = new RajaOngkir;
$data = $rajaongkir->get_provinsi();
for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
    echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."-".$data['rajaongkir']['results'][$i]['province']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
}
?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Kabupaten</label>
                                        <select name="kabupaten" id="kabupaten" class="form-control" value="<?php if(isset($ubah)) echo explode('-',$ubah->Kabupaten)[0]?>" required>
                                            <option value="" selected disabled>Pilih Kabupaten</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Kode Pos</label>
                                        <input name="kode_pos" placeholder="Masukkan Kode Pos" class="form-control" type="text" value="<?php if(isset($ubah)) echo $ubah->Kode_Pos?>" required>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-white" type="reset">Batal</button>
                            <button name="<?php if($this->router->method == 'index') echo 'simpan'; else echo 'ubah';?>" value="<?php if($this->router->method == 'index') echo 'simpan'; else echo $id;?>" class="btn btn-primary" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form id="hapus" method="post"></form>