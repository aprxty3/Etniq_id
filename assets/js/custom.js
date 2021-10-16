var btnContainer = document.getElementById("menucustom");
var btns = btnContainer.getElementsByTagName("button");

for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("button col-md-12 col-sm-2 col-2 active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";

        var divcurrent = document.getElementsByClassName("div-data");
        for(var j = 0; j < divcurrent.length; j++){
            if (divcurrent[j].id == this.getAttribute("data-target")){
                divcurrent[j].style = "display: block;";
            }else{
                divcurrent[j].style = "display: none;";
            }
        }
    });
}

var btnContainer = document.getElementById("container-ukuran-standar");
var btns = btnContainer.getElementsByTagName("button");

for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("button-ukuran active");
        if (current[0]) current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
        document.getElementById("ukuranstandar").value = this.value;
    });
}

var btnContainer = document.getElementById("container-potongan");
var btns = btnContainer.getElementsByTagName("button");

for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("potongan active");
        if (current[0]) current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
        document.getElementById("potongan").value = this.value;
        
        var batik = document.getElementById("batik").value;
        gantiBatik(batik);
    });
}

function gantiBatik(batik){
    var template = document.getElementById("template").value;
    document.getElementById("batik").value = batik;
    //ganti gambar batik
    $.ajax({
        type : 'POST',
        url : '../hasil',
        data :  {'template' : template, 'batik' : batik},
        success: function (data) {
            $("#hasil").html(data);
        }
    });
    //ganti harga
    $.ajax({
        type : 'POST',
        url : '../harga',
        data :  {'template' : template, 'batik' : batik},
        dataType: 'json',
        success: function (data) {
            var total_harga = data.Total_Harga;
            if(document.getElementById("potongan").value == "Lengan Panjang"){
                total_harga = parseInt(total_harga)+20000;
            }
            $("#total_harga").html(convertToRupiah(total_harga));
            $("#harga_coret").html("<strike>" + convertToRupiah(data.Harga_Coret) + "</strike>");
        }
    });
}

$(document).ready(function(){
    var batik = document.getElementById("batik").value;
    gantiBatik(batik);
});

function ukuranstandar(ukuran){
    document.getElementById("ukuran").value = ukuran;
}

document.getElementById("btnukuranstandar").addEventListener("click", function(){
    if(document.getElementById("container-ukuran-standar").className == "collapse"){
        document.getElementById("container-ukuran-custom").className = "collapse";
        reset_ukuran_custom();
    }else{
        reset_ukuran_standar();
    }
});

document.getElementById("btnukurancustom").addEventListener("click", function(){
    if(document.getElementById("container-ukuran-custom").className == "collapse"){
        document.getElementById("container-ukuran-standar").className = "collapse";
        reset_ukuran_standar();
    }else{
        reset_ukuran_custom();
    }
});

function reset_ukuran_standar(){
    var btnContainer = document.getElementById("container-ukuran-standar");
    var btns = btnContainer.getElementsByTagName("button");
    
    for (var i = 0; i < btns.length; i++) {
        var current = document.getElementsByClassName("button-ukuran active");
        current[0].className = current[0].className.replace(" active", "");
    }
    document.getElementById("ukuranstandar").value = "";
}

function reset_ukuran_custom(){
    $(document).ready(function(){
        var input = $(".input-group > input");
        for (var i = 0; i <= input.length; i++){
            input[i].value = "";
        }
    });
}

function convertToRupiah(angka){
	var rupiah = '';		
	var angkarev = angka.toString().split('').reverse().join('');
	for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
	return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
}

function convertToAngka(rupiah){
	return parseInt(rupiah.replace(/,.*|[^0-9]/g, ''), 10);
}