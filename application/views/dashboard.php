    <div class="jumbotron jumbotron-fluid">
      <div class="container get">
        <h1 class="display-4">Custom Your <br> Batik Shirt</h1>
        <a class="nav-item btn btn-secondary" href="#">Get Yours</a>
      </div>
    </div>
    <!-- Product Grid -->
    <div class="container">
      <div class="row">
        <?php
        if (isset($data)) foreach ($data->result_array() as $row){?>
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100">
              <a href="<?php echo base_url('custom/template/'. $row['Id_Template']);?>"><img class="card-img-top" src="<?php echo base_url($row['Lokasi'])
              ;?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <center><a href="#"><?php echo $row['Nama_Template'];?></a></center>
                </h4>
              </div>
            </div>
          </div>
        <?php
        }
        ?>

      </div>
    </div>
    <!-- /.row -->

    <!-- <div class="container">
      <p class="text-center judul">Template Design</p>
      <hr>
      <div class="row justify-content-center">
        <div class="col-md-3 col-8 mt-3">
          <a href="#" class="thumbnail">
            <img src="<?php echo base_url();?>asset/img/template/template1.png" class="img-thumbnail">
          </a>
        </div>
        <div class="col-md-3 col-8 mt-3">
          <a href="#">
            <img src="<?php echo base_url();?>asset/img/template/template2.png" class="img-thumbnail">
          </a>
        </div>
        <div class="col-md-3 col-8 mt-3">
          <a href="#" class="thumbnail">
            <img src="<?php echo base_url();?>asset/img/template/template3.png" class="img-thumbnail">
          </a>
        </div>
        <div class="col-md-3 col-8 mt-3">
          <a href="#" class="thumbnail">
            <img src="<?php echo base_url();?>asset/img/template/template4.png" class="img-thumbnail">
          </a>
        </div>
      </div> 
      <div class="row footer mt-5">
        <div class="col text-center">
          <p>&#169; Copyright Etniq.id 2018</p>
        </div>
      </div>
    </div> -->

    <!-- Modal login-->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="loginLabel">Sign In</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?php echo base_url('home');?>" method="post">
            <div class="modal-body">
                <input type="hidden" name="action" value="login">
                <div class="form-group">
                    <label for="email-login">E-Mail</label>
                    <input type="email" class="form-control" id="email_login" name="email_login" aria-describedby="email" placeholder="Your Email" required="required">
                </div>
                <div class="form-group">
                    <label for="password-login">Password</label>
                    <input type="password" class="form-control" id="password_login" name="password_login" aria-describedby="password" placeholder="Your Password" required="required">
                    <input type="checkbox" onclick="passlog()">Show Password
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">SIGN IN</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- END Modal -->

    <!-- Modal join-->
    <div class="modal fade" id="join" tabindex="-1" role="dialog" aria-labelledby="joinLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="joinLabel">Sign Up</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="" method="post">
            <div class="modal-body">
              <div class="form-row">
                <div class="form-group col-sm-7">
                  <label for="nama-user">Full Name</label>
                  <input type="text" class="form-control" id="nama-user" name="nama-user" placeholder="Your Name" required="required" value="<?php echo @$_SESSION['nama-user'];?>">
                </div>
                <div class="form-group col-sm-5">
                  <label for="tanggal-lahir">Date of Birth</label>
                  <input type="date" class="form-control" name="tanggal-lahir" id="tanggal-lahir" required="required" value="<?php echo @$_SESSION['tanggal-lahir'];?>">
                </div>
              </div>
              <div class="form-group">
                <label for="jenis-kelamin col-sm-12" style="display: block;">Gender</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="jenis-kelamin" id="jenis-kelamin" value="L" <?php if (@$_SESSION['jenis-kelamin']=='L') {echo "checked";}?>>
                  <label class="form-check-label" for="jenis-kelamin">Male</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="jenis-kelamin" id="jenis-kelamin" value="P" <?php if (@$_SESSION['jenis-kelamin']=='P') {echo "checked";}?> >
                  <label class="form-check-label" for="jenis-kelamin" >Female</label>
                </div>
              </div>
              <div class="form-row">	
                <div class="form-group col-sm-6">
                  <label for="no-hp">No HP</label>
                  <input type="text" class="form-control" id="no-hp" name="no-hp" placeholder="Your Number" required="required" value="<?php echo @$_SESSION['no-hp'];?>">
                </div>
                <div class="form-group col-sm-6">
                  <label for="email-daftar">E-Mail</label>
                  <input type="email" class="form-control" id="email-daftar" name="email-daftar" aria-describedby="emailHelp" placeholder="Your Email" required="required" value="<?php echo @$_SESSION['email-daftar'];?>">
                </div>
                <div class="form-group col-sm-12">
                  <label for="password-daftar">Password</label>
                  <input type="password" class="form-control" id="password-daftar" name="password-daftar" aria-describedby="password" placeholder="Your Password" required="required" value="<?php echo @$_SESSION['password-daftar'];?>">
                  <input type="checkbox" onclick="passdaf()">Show Password
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">SIGN UP</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- END Modal -->
  </div>