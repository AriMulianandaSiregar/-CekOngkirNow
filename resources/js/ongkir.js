// disini kita akan membuat event javascript pada saat kita sudah memilih atau berinteraksi dengan dropdown pada province, maka akan melakukan proses request ajax ke dalam
// service untuk menampilkan data city berdasarkan provinsinya menggunakan laravel mix

//buat selector terlebih dahulu berdasarkan nama dropdownnya
$('select[name="origin_province"]').on("change", function () {
    // jika terkena event change, maka kita akan menggunakan closure untuk memproses event tersebut
    let provinceId = $(this).val(); // kita mendapatkan province id dengan method this, dan mendapatkan valuenya dengan method val
    if (provinceId) {
        // jika provinceId memiliki data kita akan memanggil jquery ajax
        JQuery.ajax({
            //didalamnya kita akan tentukan url. Dimana url ini akan dibuat didalam web.php didalam route dan kita akan menggunakan endpoint API
            // kita akan mendapatkan data cities dari request ajax
            url: "/api/province/" + provinceId + "/cities",
            type: "GET",
            dataType: "JSON",
            // pada saat berhasil, kita akan membuatkan closure untuk proses berhasilnya
            success: function (data) {
                // kemudian kita akan origin citynya empty terlebih dahulu untuk memastikan nya kosong terlebih dahulu
                $('select[name="origin_city"]').empty;
                // disini kita akan mengeset origin citiesnya berdasarkan data api yang didapatkan
                $.each(data, function (key, value) {
                    $('select[name="origin_city"]').append(
                        '<option value="${key}"> ${value} </option>'
                    );
                });
            },
        });
    } else {
        $('select[name="origin_city"]').empty(); // apabila provinceId tidak ada maka origin city akan tetap kosong
    }
});
