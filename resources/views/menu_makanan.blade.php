<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta id="token" name="_token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('sc/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu_makanan.css') }}">
    <title>Halaman Pemesanan</title>
</head>

<body>
    <span class="id_transaksi" style="display:none"></span>
    <div class="container-fluid">
        <div class="container">
            <div class="navigasi">
                <div class="logo">
                    <a href="/">
                        <h3>LOGO</h3>
                    </a>
                </div>
            </div>
            <!-- <form action="/pembayaran" method="post"> -->
            <hr>
            <div class="box">
            </div>
            <h3 class="title">MEALS</h3>
            <hr>
            <div class="row list-item">
                @foreach($data as $menu)
                    @if($menu->tipe == 'Makanan Utama')
                        <div id="menu" class="card" style="width: 15rem;">
                            <div class="card-img-top d-flex justify-content-center">
                                <img src="gambar/makanan/{{ $menu->photo }}" width="100px" height="auto"
                                    alt="Card image cap">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $menu->nama }}</h5>
                                <div class="hitung a{{ $menu->id }}">
                                    <button class="btn btn-light kurang"
                                        onclick="return minus({{ $menu->id }},{{ $menu->harga }});">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-dash"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                                        </svg>
                                    </button>
                                    <span id="{{ $menu->id }}">1</span>
                                    <button class="btn btn-light tambah"
                                        onclick="return plus({{ $menu->id }},{{ $menu->harga }});">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                        </svg>
                                    </button>
                                </div>

                                <span style="display:none" id="save_id_{{ $menu->id }}"></span>

                                <p class="id_menu" style="display:none">{{ $menu->id }}</p>
                                <p class="card-text text-right">
                                    {{ "Rp. " . number_format($menu->harga, 0, ".", ".") }}
                                </p>
                                <input class="baru" type="hidden" id="csrf_{{ $menu->id }}"
                                    value="{{ Session::token() }}">
                                <input class="baru" type="hidden" id="jumlah_{{ $menu->id }}" value="1">
                                <input class="baru" type="hidden" id="sub_total_{{ $menu->id }}"
                                    value="{{ $menu->harga }}">
                                <button id="{{ $menu->id }}"
                                    onclick="return pesan({{ $menu->id }},'{{ $menu->nama }}',{{ $menu->harga }},'{{ $menu->photo }}','{{ $menu->tipe }}');"
                                    class="btn d-flex align-items-center justify-content-center body baru">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16"
                                        class="bi bi-bag-plus-fill pesan a{{ $menu->id }}" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.5 3.5a2.5 2.5 0 0 1 5 0V4h-5v-.5zm6 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5V8z" />
                                    </svg>
                                    <svg width="1em" height="1em" viewBox="0 0 16 16"
                                        class="bi bi-bag-check-fill terpesan a{{ $menu->id }}" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.5 3.5a2.5 2.5 0 0 1 5 0V4h-5v-.5zm6 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <hr>
            <div class="box">
            </div>
            <h3 class="title">DRINKS</h3>
            <hr>
            <div class="row list-item">
                @foreach($data as $menu)
                    @if($menu->tipe == 'Minuman')
                        <div id="menu" class="card" style="width: 15rem;">
                            <div class="card-img-top d-flex justify-content-center">
                                <img src="gambar/minuman/{{ $menu->photo }}" width="100px" height="auto"
                                    alt="Card image cap">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $menu->nama }}</h5>
                                <div class="hitung a{{ $menu->id }}">
                                    <button class="btn btn-light kurang"
                                        onclick="return minus({{ $menu->id }},{{ $menu->harga }});">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-dash"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                                        </svg>
                                    </button>
                                    <span id="{{ $menu->id }}">1</span>
                                    <button class="btn btn-light tambah"
                                        onclick="return plus({{ $menu->id }},{{ $menu->harga }});">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                        </svg>
                                    </button>
                                </div>

                                <span style="display:none" id="save_id_{{ $menu->id }}"></span>

                                <p class="id_menu" style="display:none">{{ $menu->id }}</p>
                                <p class="card-text text-right">
                                    {{ "Rp. " . number_format($menu->harga, 0, ".", ".") }}
                                </p>
                                <input class="baru" type="hidden" id="csrf_{{ $menu->id }}"
                                    value="{{ Session::token() }}">
                                <input class="baru" type="hidden" id="jumlah_{{ $menu->id }}" value="1">
                                <input class="baru" type="hidden" id="sub_total_{{ $menu->id }}"
                                    value="{{ $menu->harga }}">
                                <button id="{{ $menu->id }}"
                                    onclick="return pesan({{ $menu->id }},'{{ $menu->nama }}',{{ $menu->harga }},'{{ $menu->photo }}','{{ $menu->tipe }}');"
                                    class="btn d-flex align-items-center justify-content-center body baru">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16"
                                        class="bi bi-bag-plus-fill pesan a{{ $menu->id }}" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.5 3.5a2.5 2.5 0 0 1 5 0V4h-5v-.5zm6 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5V8z" />
                                    </svg>
                                    <svg width="1em" height="1em" viewBox="0 0 16 16"
                                        class="bi bi-bag-check-fill terpesan a{{ $menu->id }}" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.5 3.5a2.5 2.5 0 0 1 5 0V4h-5v-.5zm6 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="total">
                <div class="card text-center">
                    <div class="card-body">
                        <h6 class="card-title">Total</h6>
                        <p class="nominal card-text mb-3">Rp.-</p>
                        <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal1"
                            title="Keranjang"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                <path
                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg></a>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2"
                            title="Selesai"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16">
                                <path
                                    d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                                <path
                                    d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                            </svg></a>
                    </div>
                </div>
            </div>
            <!-- </form> -->
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="overflow-x: auto;">
                    <h1>Daftar Pesanan</h1>
                    <table id="mytable" class="table">
                        <!-- <thead> -->
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        <!-- </thead> -->
                        <!-- <tbody class="keranjang"> -->
                        <tr id="kosong">
                            <td>Belum melakukan pesanan</td>
                        </tr>

                        <!-- </tbody> -->
                    </table>
                </div>
                <div class="modal-footer">
                    <div class="text-right">
                        <h2>Total : <span
                                class="total">{{ "Rp. " . number_format(0, 0, ".", ".") }}</span>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">PILIH PEMBAYARAN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="total_pesanan" style="display:none"></p>
                    <div class="card-group">
                        <div onclick="show_form()" style="cursor:pointer" class="card text-white bg-primary mb-3"
                            style="max-width: 18rem;">
                            <div class="card-body">
                                <img src="{{ asset('gambar/icon/kembalian.png') }}"
                                    class="img-fluid" alt="">
                                <h5 class="card-title">Pakai Kembalian..</h5>
                            </div>
                        </div>
                        <div onclick="" style="cursor:pointer" class="card text-white bg-success mb-3"
                            style="max-width: 18rem;">
                            <div class="card-body">
                                <img src="{{ asset('gambar/icon/pas.png') }}" class="img-fluid"
                                    alt="">
                                <h5 class="card-title">Uang Pas Aja..</h5>
                            </div>
                        </div>
                    </div>
                    <div class="form-row" style="display:none" id="kembalian">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nominal" placeholder="Masukkan Nominal">
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <a class="btn btn-primary" onclick="hitung_kembalian()">Selesai</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <a href="/cek-old/1">Klik</a> -->
    <a href="/add/20">Klik</a>

    <!-- <form action="/baru" method="post">
@csrf
        <input type="text" name="id_transaksi" value="1">
        <input type="text" name="id_menu" value="1">
        <input type="text" name="jumlah" value="1">
        <input type="text" name="sub_total" value="2000">
        <input type="text" name="catatan" value="joss">
        <input type="submit" value="asdasd">
    </form> -->

    <span id="hasil"></span>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('sc/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('sc/popper.min.js') }}">
    </script>
    <script src="{{ asset('sc/bootstrap.min.js') }}">
    </script>
    <script src="{{ asset('js/menu_makanan.js') }}"></script>

    <script>
        $(document).ready(function () {
            $.ajax({
                url: "/cek-old/1",
                type: "GET",
                success: function (hasil) {
                    console.log(hasil);
                    $("span.id_transaksi").html(hasil);
                    if (hasil.fuel == true) {
                        $("span.id_transaksi").html(hasil.id_transaksi);
                        // Update Table
                        const elm = $("table tr#kosong");
                        if (elm) {
                            elm.remove()
                        }
                        for (i = 0; i < hasil.data.length; i++) {
                            //Mengubah icon default
                            var icon_1st = $("svg.bi.pesan.a" + hasil.data[i].id_menu)
                            var icon_2st = $("svg.bi.terpesan.a" + hasil.data[i].id_menu)

                            icon_1st.hide()
                            icon_2st.show()

                            // Disable tombol
                            var ubah_node = $("button#" + hasil.data[i].id_menu +
                                ".btn.d-flex.align-items-center.justify-content-center.body");
                            ubah_node[0].disabled = true;


                            $("span#save_id_" + hasil.data[i].id_menu).html(hasil.data[i]
                                .id)

                            // Display count button
                            const hitung_1st = $(".hitung.a" + hasil.data[i].id_menu)

                            hitung_1st.show();

                            // Mengubah nilai pada counting button
                            var value = hasil.data[i].jumlah;
                            $(".hitung.a" + hasil.data[i].id_menu + " span#" + hasil.data[i]
                                .id_menu).text(value)

                            // Manipulasi tabel
                            if (hasil.data[i].tipe == 'Makanan Utama')
                                var elm_nama = "<img src='/gambar/makanan/" + hasil.data[i]
                                    .photo +
                                    "' width='100px' height='auto'><p>" + hasil.data[i].nama +
                                    "</p>";
                            else
                                var elm_nama = "<img src='/gambar/minuman/" + hasil.data[i]
                                    .photo +
                                    "' width='100px' height='auto'><p>" + hasil.data[i].nama +
                                    "</p>";

                            var elm_jml = "<p class='jumlah'>" + value + "</p>";
                            var elm_harga = "<p class='harga'>" + hasil.data[i].sub_total + "</p>";
                            var elm_aksi = "<a href='#' onclick='return hapus(" + hasil.data[i]
                                .id_menu +
                                ");' class='btn btn-outline-danger' id='hapus'> × Remove</a>"

                            var table = document.getElementsByTagName('table')[0];

                            var newRow = table.insertRow(table.rows.length / 2 + 1);

                            // add cells to the row
                            var cel1 = newRow.insertCell(0);
                            var cel2 = newRow.insertCell(1);
                            var cel3 = newRow.insertCell(2);
                            var cel4 = newRow.insertCell(3);

                            // add values to the cells
                            cel1.innerHTML = elm_nama;
                            cel2.innerHTML = elm_jml;
                            cel3.innerHTML = elm_harga;
                            cel4.innerHTML = elm_aksi;

                            var last = table.rows.length - 1

                            var tr = document.getElementsByTagName("tr")[last]

                            tr.setAttribute("id", "t" + hasil.data[i].id_menu);

                            // update_jml(hasil.data[i].id_menu)
                            update_ttl()
                        }
                        // alert("Terdapat transaksi yang belum selesai....")
                    } else {
                        $("span.id_transaksi").html(hasil.id_transaksi);
                    }
                }
            })
        });

    </script>

    <script>
        // if (hasil.length > 0) {
        //     alert("Ada transaksi yang belum selesai! ");
        //     $("span.id_transaksi").html(hasil.id_transaksi);
        //     // Update Table
        //     const elm = $("table tr#kosong");
        //     if (elm) {
        //         elm.remove()
        //     }
        //     for (i = 0; i < hasil.length; i++) {
        //         //Mengubah icon default
        //         var icon_1st = $("svg.bi.pesan.a" + hasil.data[i].id_menu)
        //         var icon_2st = $("svg.bi.terpesan.a" + hasil[i].id_menu)

        //         icon_1st.hide()
        //         icon_2st.show()

        //         // Disable tombol
        //         var ubah_node = $("button#" + hasil[i].id_menu +
        //             ".btn.d-flex.align-items-center.justify-content-center.body");
        //         ubah_node[0].disabled = true;


        //         $("span#save_id_" + hasil[i].id_menu).html(hasil[i]
        //             .id_menu)

        //         // Display count button
        //         const hitung_1st = $(".hitung.a" + hasil[i].id_menu)

        //         hitung_1st.show();

        //         // Mengubah nilai pada counting button
        //         var value = hasil[i].jumlah;
        //         $(".hitung.a" + hasil[i].id_menu + " span#" + hasil[i]
        //             .id_menu).text(value)

        //         // Manipulasi tabel
        //         if (hasil[i].tipe == 'Makanan Utama')
        //             var elm_nama = "<img src='/gambar/makanan/" + hasil[i]
        //                 .photo +
        //                 "' width='100px' height='auto'><p>" + hasil[i].nama +
        //                 "</p>";
        //         else
        //             var elm_nama = "<img src='/gambar/minuman/" + hasil[i]
        //                 .photo +
        //                 "' width='100px' height='auto'><p>" + hasil[i].nama +
        //                 "</p>";

        //         var elm_jml = "<p class='jumlah'>" + value + "</p>";
        //         var elm_harga = "<p class='harga'>" + hasil[i].harga + "</p>";
        //         var elm_aksi = "<a href='#' onclick='return hapus(" + hasil[i]
        //             .id_menu +
        //             ");' class='btn btn-outline-danger' id='hapus'> × Remove</a>"

        //         var table = document.getElementsByTagName('table')[0];

        //         var newRow = table.insertRow(table.rows.length / 2 + 1);

        //         // add cells to the row
        //         var cel1 = newRow.insertCell(0);
        //         var cel2 = newRow.insertCell(1);
        //         var cel3 = newRow.insertCell(2);
        //         var cel4 = newRow.insertCell(3);

        //         // add values to the cells
        //         cel1.innerHTML = elm_nama;
        //         cel2.innerHTML = elm_jml;
        //         cel3.innerHTML = elm_harga;
        //         cel4.innerHTML = elm_aksi;

        //         var last = table.rows.length - 1

        //         var tr = document.getElementsByTagName("tr")[last]

        //         tr.setAttribute("id", "t" + hasil[i].id_menu);

        //         update_ttl()
        //     }
        // } else {
        //     alert("Selamat Datang....")
        //     $("span.id_transaksi").html(hasil.id_transaksi);
        // }

    </script>
</body>

</html>



<!-- 
    TOMBOL "TAMBAH ITEM" BERFUNGSI UNTUK MENAMBAH BARIS DATA 
    PADA TABEL DETAIL TRANSAKSI, TERDIRI DARI : 
    ID, ID MENU, JUMLAH (1)


    TOMBOL "TAMBAH JUMLAH" BERFUNGSI UNTUK MENGUBAH DATA JUMLAH
    PADA TABEL DETAIL TRANSAKSI BERTAMBAH 1 YANG SESUAI DENGAN MENUNYA

    
    TOMBOL "KURANG JUMLAH" BERFUNGSI UNTUK MENGUBAH DATA JUMLAH
    PADA TABEL DETAIL TRANSAKSI BERKURANG 1 YANG SESUAI DENGAN
    MENUNYA


    TOMBOL "REMOVE" BERFUNGSI UNTUK MENGHAPUS 1 BARIS DATA YANG
    SUDAH DIBUAT SEBELUMNYA DENGAN TOMBOL "TAMBAH ITEM".

    SETELAH TRANSAKSI SELESAI SELANJUTNYA AKAN MENAMBAHKAN ID
    TRANSAKSI KEDALAM BARIS DETAIL TRANSAKSI.
 -->
