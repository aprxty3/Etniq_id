    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url('assets/js/jquery-3.3.1.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
<?php if(isset($js)){?>
    <script src="<?php echo base_url("$js");?>"></script>
<?php
}
if(isset($scripts))$this->view($scripts);
if(isset($msg)) echo $msg;?>
</body>
</html>