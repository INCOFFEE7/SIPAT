<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Pemesanan</title>
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
          var hariIni = document.getElementById("hariIni").checked;
          var tanggalTertentu = document.getElementById("tanggalTertentu").checked;
        }

        // Menampilkan atau menyembunyikan input tanggal mulai dan selesai berdasarkan pilihan radio button
        document.getElementById("tanggalTertentu").addEventListener("change", function() {
          var inputTanggalTertentu = document.getElementById("tanggalTertentuInput");
          inputTanggalTertentu.style.display = this.checked ? "block" : "none";
        });

        document.getElementById("hariIni").addEventListener("change", function() {
          var inputTanggalTertentu = document.getElementById("tanggalTertentuInput");
          inputTanggalTertentu.style.display = this.checked ? "none" : "block";
        });

        function filterData2() {
          var hasilFilter2 = document.getElementById("hasilFilter2");
          var hariIni2 = document.getElementById("hariIni2").checked;
          var tanggalTertentu2 = document.getElementById("tanggalTertentu2").checked;
        }

        // Menampilkan atau menyembunyikan input tanggal mulai dan selesai berdasarkan pilihan radio button
        document.getElementById("tanggalTertentu2").addEventListener("change", function() {
          var inputTanggalTertentu2 = document.getElementById("tanggalTertentuInput2");
          inputTanggalTertentu2.style.display = this.checked ? "block" : "none";
        });

        document.getElementById("hariIni2").addEventListener("change", function() {
          var inputTanggalTertentu2 = document.getElementById("tanggalTertentuInput2");
          inputTanggalTertentu2.style.display = this.checked ? "none" : "block";
        });
        </script>
        <script>
            function toggleTab(button) {
                var targetId = button.id.replace('tab-', '');
        
                var allDivs = document.querySelectorAll('.result-form > div');
                allDivs.forEach(function(div) {
                    div.style.transform = 'rotateY(180deg)';
                });
        
                var targetDiv = document.getElementById(targetId + "-htm");
                if (targetDiv) {
                    targetDiv.style.transform = 'rotateY(0)';
                }
        
                var allButtons = document.querySelectorAll('.tab');
                allButtons.forEach(function(btn) {
                    btn.classList.remove('active');
                });
        
                button.classList.add('active');
            }
        </script>
        
    
</body>
</html>
