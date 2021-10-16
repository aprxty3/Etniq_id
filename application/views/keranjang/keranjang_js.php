<script>
    $('#kurir').on('change', function(){
        var id_kabupaten = $('#alamat').val().split('-');
        var kurir = $('#kurir').val();
        $.ajax({
            type: "post",
            url: "<?= base_url('data/pelayanan')?>",
            data: {id_kabupaten: id_kabupaten[0], kurir: kurir},
            success: function (response) {
                $('#pelayanan').html(response);
            }
        });
    });

    $('#pelayanan').on('change', function(){
        var id_kabupaten = $('#alamat').val().split('-');
        var kurir = $('#kurir').val();
        var pelayanan = $('#pelayanan').val();
        $.ajax({
            type: "post",
            url: "<?= base_url('data/ongkir')?>",
            data: {id_kabupaten: id_kabupaten[0], kurir: kurir, pelayanan: pelayanan},
            success: function (response) {
                var total = $('#total');
                var ongkir = $('#ongkir');
                ongkir.text(convertToRupiah(response));
                total.text(convertToRupiah(parseInt(convertToAngka(ongkir.text())+parseInt(convertToAngka(total.text())))));
            }
        });
    });

    function convertToRupiah(angka){
        var rupiah = '';		
        var angkarev = angka.toString().split('').reverse().join('');
        for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
        return 'Rp '+rupiah.split('',rupiah.length-1).reverse().join('')+',00';
    }

    function convertToAngka(rupiah){
        return parseInt(rupiah.replace(/,.*|[^0-9]/g, '')*1);
    }
</script>