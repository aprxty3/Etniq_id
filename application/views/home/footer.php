    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url('assets/js/jquery-3.3.1.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
    <script>
        $('#show_password_login').click(function() {
            if($("#show_password_login").is(':checked') == true) $('#password_login').attr('type','text');
            else $('#password_login').attr('type','password');
        });
        $('#show_password_daftar').click(function() {
            if($("#show_password_daftar").is(':checked') == true) $('#password_daftar').attr('type','text');
            else $('#password_daftar').attr('type','password');
        });
    </script>
<?php if(isset($js)){?>
    <script src="<?php echo base_url("$js");?>"></script>
<?php
}
if(isset($scripts)) echo $scripts; 
if(isset($msg)) echo $msg;?>
</body>
</html>