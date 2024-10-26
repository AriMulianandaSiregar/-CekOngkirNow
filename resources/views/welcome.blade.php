<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

         <!-- Link CSS online untuk Bootstrap 4.5.2 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

        <!-- icon -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/js/all.min.js"></script>

        <!-- Jquery -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- CDN untuk library install2 (digunakan untuk mencari kota tujuan dimana kita akan menggunakan keyword dan akan memunculkan data selanjutnya melalui api endpoint)-->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .ongkir-header {
                padding: 3rem 1.5rem;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="top-right links">
                <a href="#">Home</a>
                <a href="#">Login</a>
                <a href="#">Register</a>
            </div>


            <div class="container">
                <div class="ongkir-header">
                    <h1>Code Ongkir</h1>
                    <p class="lead">Project Cek Ongkir ke seluruh kota dan kabupaten seIndonesia</p>
                </div>

                <div class="card-deck mb-3 text-center">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Free</h4>
                        </div>
                        <div class="card-body">
                            <i class="fas fa-truck" style="font-size:80px"></i>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>Cek Ongkir Lebih Mudah</li>
                            </ul>
                            <button type="button" class="btn btn-lg btn-block btn-outline-primary">Sign up for free</button>
                        </div>
                    </div>

                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Pro</h4>
                        </div>
                        <div class="card-body">
                            <i class="fas fa-box" style="font-size:80px"></i>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>Lacak lokasi paket</li>
                            </ul>
                            <button type="button" class="btn btn-lg btn-block btn-primary">Get started</button>
                        </div>
                    </div>

                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Enterprise</h4>
                        </div>
                        <div class="card-body">
                            <i class="fas fa-plane-departure" style="font-size:80px"></i>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>Cek Ongkir Pengiriman Internasional</li>
                            </ul>
                            <button type="button" class="btn btn-lg btn-block btn-primary">Contact us</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
            <div class="card">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Formulir Cek Ongkir</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('store') }}" method="POST">
                        <!-- @csrf adalah directive di Laravel Blade yang menyisipkan token CSRF (Cross-Site Request Forgery) ke dalam form HTML untuk melindungi aplikasi dari serangan CSRF. Token ini memastikan bahwa request POST, PUT, PATCH, atau DELETE berasal dari sumber yang sah (aplikasi Anda) dan bukan dari situs eksternal. Tanpa token ini, Laravel akan menolak request karena alasan keamanan. -->
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <h5 class="text-muted">Asal Pengirim:</h5>
                                <div class="form-group">
                                    <label for="">Provinsi</label>
                                    <select name="origin_province" id="" class="form-control">
                                        <option value="#">-</option>  
                                        @foreach ($province as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Kota/Kabupaten</label>
                                    <select name="origin_city" id="" class="form-control">
                                        <option value="#">-</option>
                                    </select>
                                </div>
                                <h5 class="text-muted">Tujuan Pengirim:</h5>
                                <div class="form-group">
                                    <label for="">Kota/Kabupaten</label>
                                    <select name="destination_city" id="destination_city" class="form-control">
                                        <option value="#">-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <h5 class="text-muted">Pilih Expedisi:</h5>
                                @foreach ($courier as $key => $value)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="courier-{{ $key }}" name="courier[]" value="{{ $value->code }}">
                                        <label class="form-check-label" for="courier-{{ $key }}">{{ $value->title }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
            </div>

             <script>
               $('select[name="origin_province"]').on('change', function () {
                    let provinceId = $(this).val();

                    if (provinceId) {
                        jQuery.ajax({
                            url: '/api/province/' + provinceId + '/cities',
                            type: "GET",
                            dataType: "JSON",
                            success: function (data) {
                                $('select[name="origin_city"]').empty();
                                $.each(data, function (key, value) {
                                    $('select[name="origin_city"]').append(`<option value="${key}"> ${value} </option>`);
                                })
                            }
                        })
                    } else {
                        $('select[name="origin_city"]').empty();
                    }
                });

                $('#destination_city').select2({
                    ajax: {
                        url: '/api/cities',
                        type: "POST",
                        dataType: 'JSON',
                        delay: 150,
                        data: function (params) {
                            return {
                                _token: $('meta[name="csrf-token"]').attr('content'),
                                search: $.trim(params.term)
                            }
                        },
                        processResults: function (response) {
                            return {
                                results: response
                            }
                        },
                        cache: true
                    }
                });
            </script>
    </body>
</html>