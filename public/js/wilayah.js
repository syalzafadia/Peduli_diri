$('#provinsi').change(function() {
    var province_id = $(this).val();
    if (province_id) {
        $.ajax({
            type:"GET",
            url:"/getkota?province_id="+province_id,
            dataType: 'JSON',
            success:function(res) {
                if (res) {
                    $("#kota").empty();
                    $("#kecamatan").empty();
                    $("#kelurahan").empty();
                    $("#kota").append('<option>---Pilih Kota---</option>');
                    $("#kecamatan").append('<option>---Pilih Kecamatan---</option>');
                    $("#kelurahan").append('<option>---Pilih Kelurahan---</option>');
                    $.each(res,function(nama,kode){
                        $("#kota").append('<option value="'+kode+'">'+nama+'</option>');
                    });
                }else{
                    $("#kota").empty();
                    $("#kecamatan").empty();
                    $("#kelurahan").empty();
                }
            }
        });
    }else{
        $("#kota").empty();
        $("#kecamatan").empty();
        $("#kelurahan").empty();
    }
});

$('#kota').change(function(){
    var city_id = $(this).val();    
    if(city_id){
        $.ajax({
           type:"GET",
           url:"/getkecamatan?city_id="+city_id,
           dataType: 'JSON',
           success:function(res){               
            if(res){
                $("#kecamatan").empty();
                $("#kelurahan").empty();
                $("#kecamatan").append('<option>---Pilih Kecamatan---</option>');
                $("#kelurahan").append('<option>---Pilih Kelurahan---</option>');
                $.each(res,function(nama,kode){
                    $("#kecamatan").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#kecamatan").empty();
               $("#kelurahan").empty();
            }
           }
        });
    }else{
        $("#kecamatan").empty();
        $("#kelurahan").empty();
    }      
});
 
$('#kecamatan').change(function(){
    var district_id = $(this).val();    
    if(district_id){
        $.ajax({
           type:"GET",
           url:"getkelurahan?district_id="+district_id,
           dataType: 'JSON',
           success:function(res){               
            if(res){
                $("#kelurahan").empty();
                $("#kelurahan").append('<option>---Pilih Kelurahan---</option>');
                $.each(res,function(nama,kode){
                    $("#kelurahan").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#kelurahan").empty();
            }
           }
        });
    }else{
        $("#kelurahan").empty();
    }      
});