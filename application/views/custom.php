    <div class="custom">
    <!-- custom border -->
      <div id="container-custom" class="container">
        <div class="row">
          <div class="col-md-5">
            <!-- <img id="hasil" class="col-12" src="<?php echo base_url('img/barang/1.png')?>" alt=""> -->
            <div id="produk" class="carousel slide" data-ride="carousel">
              <style>
                /* Make the image fully responsive */
                .carousel-inner img {
                    width: 100%;
                    height: 100%;
                }
              </style>
              <ul class="carousel-indicators">
                <li data-target="#produk" data-slide-to="0" class="active"></li>
                <li data-target="#produk" data-slide-to="1"></li>
              </ul>
              <div id="hasil" class="carousel-inner">
              </div>
              <b>
                <p id="total_harga" style="position:absolute; top: 8px; right: 16px;">Rp </p>
                <p id="harga_coret" style="position:absolute; top: 23px; right: 16px; color:red;"><strike>Rp </strike></p>
              </b>
            </div>
          </div>
          <div id="menucustom" class="col-md-2">
            <button id="btnpotongan" data-target="datapotongan" class="button col-md-12 col-sm-2 col-2 active"><i class='fas fa-tshirt'></i><br>Lengan Pakaian</button>
            <button id="btnbatik" data-target="databatik" class="button col-md-12 col-sm-2 col-2"><i class='fas fa-fill-drip'></i><br>Motif Kombinasi</button>
            <button id="btnukuran" data-target="dataukuran" class="button col-md-12 col-sm-2 col-2"><i class='fas fa-ruler-vertical'></i><br>Ukuran</button>
          </div>
          <div id="kanan" class="col-md-5" style="padding-top: 2%;">
            <div id="datapotongan" class="div-data">
              <div id="container-potongan" class="collapse show">
                <button class="potongan active" style="border-radius: 8px;" value="Lengan Panjang">Lengan Panjang</button>
                <button class="potongan" style="border-radius: 8px;" value="Lengan Pendek">Lengan Pendek</button>           
              </div>
            </div>
            <div id="databatik" class="div-data" style="display: none;">
              <?php
                $this->Batik->getBatik($template);
              ?>
            </div>
            <div id="dataukuran" class="div-data" style="display: none;">
              <button id="btnukuranstandar" class="btn col-md-12" type="button" data-toggle="collapse" data-target="#container-ukuran-standar">Ukuran Standar</button>
              <br><br>
              <div id="container-ukuran-standar" class="collapse show">
                <button class="button-ukuran" value="S">S</button>
                <button class="button-ukuran" value="M">M</button>
                <button class="button-ukuran" value="L">L</button>
                <button class="button-ukuran" value="XL">XL</button>
                <button class="button-ukuran" value="XXL">XXL</button>              
              </div>
              <br>
              <button id="btnukurancustom" class="btn col-md-12" type="button" data-toggle="collapse" data-target="#container-ukuran-custom" aria-expanded="false" aria-controls="collapseExample">Ukuran Custom</button>
              <div id="container-ukuran-custom" class="collapse">
                <div class="card example-1 square scrollbar-cyan bordered-cyan">
                  <div class="card-body">
                    <label>Lingkar Dada</label>
                    <div class="input-group">
                      <input id="lingkar_dada" name="lingkar_dada" form="formkeranjang" type="number" class="form-control" placeholder="Lingkar Dada">
                      <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">cm</span>
                      </div>
                    </div>
                    <label>Lebar Bahu</label>
                    <div class="input-group">
                      <input id="lebar_bahu" name="lebar_bahu" form="formkeranjang" type="number" class="form-control" placeholder="Lebar Bahu">
                      <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">cm</span>
                      </div>
                    </div>
                    <label>Leher</label>
                    <div class="input-group">
                      <input id="leher" name="leher" form="formkeranjang" type="number" class="form-control" placeholder="Leher">
                      <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">cm</span>
                      </div>
                    </div>
                    <label>Ketiak</label>
                    <div class="input-group">
                      <input id="ketiak" name="ketiak"  form="formkeranjang" type="number" class="form-control" placeholder="Ketiak">
                      <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">cm</span>
                      </div>
                    </div>
                    <label>Perut</label>
                    <div class="input-group">
                      <input id="perut" name="perut" form="formkeranjang" type="number" class="form-control" placeholder="Perut">
                      <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">cm</span>
                      </div>
                    </div>
                    <label>Pinggul Atas</label>
                    <div class="input-group">
                      <input id="pinggul_atas" name="pinggul_atas" form="formkeranjang" type="number" class="form-control" placeholder="Pinggul Atas">
                      <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">cm</span>
                      </div>
                    </div>
                    <label>Panjang Baju</label>
                    <div class="input-group">
                      <input id="panjang_baju" name="panjang_baju" form="formkeranjang" type="number" class="form-control" placeholder="Panjang Baju">
                      <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">cm</span>
                      </div>
                    </div>
                    <label>Panjang Tangan (Lengan Panjang)</label>
                    <div class="input-group">
                      <input id="panjang_tangan_pjg" name="panjang_tangan_pjg" form="formkeranjang" type="number" class="form-control" placeholder="Panjang Tangan (Lengan Panjang)">
                      <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">cm</span>
                      </div>
                    </div>
                    <label>Panjang Tangan (Lengan Pendek)</label>
                    <div class="input-group">
                      <input id="panjang_tangan" name="panjang_tangan" form="formkeranjang" type="number" class="form-control" placeholder="Panjang Tangan (Lengan Pendek)">
                      <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">cm</span>
                      </div>
                    </div>
                    <label>Pergelangan</label>
                    <div class="input-group">
                      <input id="pergelangan" name="pergelangan" form="formkeranjang" type="number" class="form-control" placeholder="Pergelangan">
                      <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">cm</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <br>
            <button form="formkeranjang" type="submit" class="col-md-12" style="border-radius: 8px;">Tambahkan ke Keranjang</button>
          </div>
          <form id="formkeranjang" method="post">
            <input id="template" name="template" type="hidden" value="<?php echo $template;?>">
						<input id="potongan" name="potongan" type="hidden" value="Lengan Panjang">
						<input id="batik"  name="batik" type="hidden" onchange="gantiBatik()"value="1">
            <input id="ukuranstandar" name="ukuranstandar" type="hidden">
          </form>
        </div>
      </div>
    </div>
    <style>
      .scrollbar-deep-purple::-webkit-scrollbar-track {
      -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
      background-color: #F5F5F5;
      border-radius: 10px; }

      .scrollbar-deep-purple::-webkit-scrollbar {
      width: 12px;
      background-color: #F5F5F5; }

      .scrollbar-deep-purple::-webkit-scrollbar-thumb {
      border-radius: 10px;
      -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
      background-color: #512da8; }

      .scrollbar-cyan::-webkit-scrollbar-track {
      -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
      background-color: #F5F5F5;
      border-radius: 10px; }

      .scrollbar-cyan::-webkit-scrollbar {
      width: 12px;
      background-color: #F5F5F5; }

      .scrollbar-cyan::-webkit-scrollbar-thumb {
      border-radius: 10px;
      -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
      background-color: #00bcd4; }

      .scrollbar-dusty-grass::-webkit-scrollbar-track {
      -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
      background-color: #F5F5F5;
      border-radius: 10px; }

      .scrollbar-dusty-grass::-webkit-scrollbar {
      width: 12px;
      background-color: #F5F5F5; }

      .scrollbar-dusty-grass::-webkit-scrollbar-thumb {
      border-radius: 10px;
      -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
      background-image: -webkit-linear-gradient(330deg, #d4fc79 0%, #96e6a1 100%);
      background-image: linear-gradient(120deg, #d4fc79 0%, #96e6a1 100%); }

      .scrollbar-ripe-malinka::-webkit-scrollbar-track {
      -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
      background-color: #F5F5F5;
      border-radius: 10px; }

      .scrollbar-ripe-malinka::-webkit-scrollbar {
      width: 12px;
      background-color: #F5F5F5; }

      .scrollbar-ripe-malinka::-webkit-scrollbar-thumb {
      border-radius: 10px;
      -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
      background-image: -webkit-linear-gradient(330deg, #f093fb 0%, #f5576c 100%);
      background-image: linear-gradient(120deg, #f093fb 0%, #f5576c 100%); }

      .bordered-deep-purple::-webkit-scrollbar-track {
      -webkit-box-shadow: none;
      border: 1px solid #512da8; }

      .bordered-deep-purple::-webkit-scrollbar-thumb {
      -webkit-box-shadow: none; }

      .bordered-cyan::-webkit-scrollbar-track {
      -webkit-box-shadow: none;
      border: 1px solid #00bcd4; }

      .bordered-cyan::-webkit-scrollbar-thumb {
      -webkit-box-shadow: none; }

      .square::-webkit-scrollbar-track {
      border-radius: 0 !important; }

      .square::-webkit-scrollbar-thumb {
      border-radius: 0 !important; }

      .thin::-webkit-scrollbar {
      width: 6px; }

      .example-1 {
      position: relative;
      overflow-y: scroll;
      height: 200px; }
    </style>