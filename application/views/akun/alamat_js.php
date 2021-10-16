<script>
    $('#provinsi').on('change', function(){
        var provinsi = $('#provinsi').val().split('-')[0];
        $.ajax({
            type: "post",
            url: "<?= base_url('data/kabupaten')?>",
            data: {provinsi: provinsi},
            success: function (response) {
                $('#kabupaten').html(response);
            }
        });
    });
</script>