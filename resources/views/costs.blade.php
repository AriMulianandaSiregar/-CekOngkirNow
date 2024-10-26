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
        <div class="container">
            <div class="row justify-content-center mb-4">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Destination</div>

                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>Kota/Kab Asal</td>
                                        <td>Kota/Kab Tujuan</td>
                                        <td>Berat</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $origin->title }}</td>
                                        <td>{{ $destination->title }}</td>
                                        <td>{{ $weight }}gr</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            @foreach ($result as $cost)
                <div class="row justify-content-center mb-4">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ $cost[0]['name'] }}</div>

                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>Layanan</td>
                                            <td>Estimasi Hari</td>
                                            <td>Ongkir</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cost[0]['costs'] as $cost)
                                            <tr>
                                                <td>{{ $cost['description'] }} ({{$cost['service']}})</td>
                                                <td>{{ $cost['cost'][0]['etd'] }}</td>
                                                <td>Rp{{ number_format($cost['cost'][0]['value'], 0, ',', '.') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </body>
</html>