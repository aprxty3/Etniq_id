    <nav class="navbar navbar-expand-lg navbar-light ">
      <a class="navbar-brand" href="<?php echo base_url();?>"><h2>Etniq.id</h2></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav kiri">
          <form class="cari">
            <div class="row">
              <div class="col">
                <input type="text" class="form-control" placeholder="search . . .">
              </div>
            </div>
          </form>
          <a class="nav-item nav-link" href="#">Help</a>
          <a class="nav-item nav-link mr-2" href="#">Stores</a>
          <form class="cari-l">
            <div class="row">
              <div class="col-12">
                <input type="text" class="form-control" placeholder="search . . .">
              </div>
            </div>
          </form>
        </div>
        <div class="navbar-nav ml-auto">
          <a class="nav-item nav-link" href="#" data-toggle="modal" data-target="#login">Sign In </a>
          <span class="nav-item nav-link cari-l">|</span>
          <a class="nav-item nav-link" href="#" data-toggle="modal" data-target="#join">Join</a>
          <a class="nav-item nav-link" href="#">Wishlist</a>
          <a class="nav-item nav-link mr-5" href="#">Trolley</a>
        </div>
      </div>
    </nav>

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
                    <input id="show_password" type="checkbox">Show Password
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
                  <input type="date" class="form-control" name="tanggal-lahir" id="tanggal-lahir" required="required">
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
                  <label for="email_daftar">E-Mail</label>
                  <input type="email" class="form-control" id="email_daftar" name="email_daftar" aria-describedby="emailHelp" placeholder="Your Email" required="required" value="<?php echo @$_SESSION['email_daftar'];?>">
                </div>
                <div class="form-group col-sm-12">
                  <label for="password_daftar">Password</label>
                  <input type="password" class="form-control" id="password_daftar" name="password_daftar" aria-describedby="password" placeholder="Your Password" required="required" value="<?php echo @$_SESSION['password_daftar'];?>">
                  <input id="show_password_daftar" type="checkbox">Show Password
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button name="action" value="daftar" type="submit" class="btn btn-primary">SIGN UP</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- END Modal -->