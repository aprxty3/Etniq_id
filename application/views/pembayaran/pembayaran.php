    <div class="container-fluid" style="min-height: 100vh; height: 100%; overflow: auto;">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <!-- <div class="card-header bg-white">
                        Pembayaran
                    </div> -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Kode Pembayaran</th>
                                    <th>Tanggal Pembayaran</th>
                                    <th>Tanggal Jatuh Tempo</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
<?php
foreach($pembayaran->result() as $row){?>
                                    <tr>
                                        <td><a href="<?= base_url('pembayaran/detail/'.$row->Id_Payout)?>"><?= $row->Id_Payout?></a></td>
                                        <td><?= date('D, d-m-Y H:i:s',strtotime($row->Tanggal_Payout))?></td>
                                        <td><?= date('D, d-m-Y H:i:s',strtotime($row->Expired_Payout))?></td>
                                        <td><a href="<?= base_url('pembayaran/detail/'.$row->Id_Payout)?>" class="btn btn-primary">Lihat</a></td>
                                    </tr>
<?php
}?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>