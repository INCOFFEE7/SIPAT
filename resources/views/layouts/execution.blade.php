<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Pelaksanaan</title>
	<link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Pemesanan App
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Opsi menu tambahan bisa ditambahkan di sini -->
                    </ul>
                </div>
            </div>
        </nav> --}}

        @yield('content')


    <!-- Tambahkan JavaScript seperti Bootstrap atau custom JavaScript di sini -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function filterData() {
          var hasilFilter = document.getElementById("hasilFilter");
          var tanggalTertentu = document.getElementById("tanggalTertentu").checked;
        }

        // Menampilkan atau menyembunyikan input tanggal mulai dan selesai berdasarkan pilihan radio button
        document.getElementById("tanggalTertentu").addEventListener("change", function() {
          var inputTanggalTertentu = document.getElementById("tanggalTertentuInput");
          inputTanggalTertentu.style.display = this.checked ? "block" : "none";
        });
        </script>

<script>
    function toggle(source) {
        checkboxes = document.getElementsByName('no_blangko[]');
        for(var i=0, n=checkboxes.length; i<n; i++) {
            checkboxes[i].checked = source.checked;
        }
    }
</script>

</body>
</html>
