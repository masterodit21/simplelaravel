<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/create.css')}}">

    <link rel="shortcut icon" href="images/bear-head.png" type="image/png">
    <title>Data Motor</title>

</head>
<body>

    <div class="container mt-5 mb-5">
    <div class="card-header">{{ __('Tambah Data Baru') }}</div>
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('motors.store') }}" method="POST">

                        @csrf

                            <div class="row">
                                <label class="font-weight-bold col-md-2">Nama Motor</label>
                                <div class="col-md-4">
                                <input type="text" name="NamaMotor" value="{{ old('NamaMotor') }}" placeholder="Masukkan Nama Kendaraan">
                                </div>
                            </div>

                            <div class="row">
                            <label class="font-weight-bold col-md-2">Plat Nomor</label>
                                <div class="col-md-4">
                                <input type="text" name="PlatNomor" value="{{ old('PlatNomor') }}" placeholder="Masukkan Plat Nomor">
                                </div>
                            </div>

                            <div class="row">
                            <label class="font-weight-bold col-md-2">Harga Motor</label>
                                <div class="col-md-4">
                                <input type="text" name="HargaMotor" value="{{ old('HargaMotor') }}" placeholder="Masukkan Harga Motor">
                            </div>
                            </div>                                

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                            <a type="button" href="{{ url('/motors') }}" class="btn btn-danger float-right">BATAL</a>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>