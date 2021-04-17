$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
var jumlah;

function update_jml(id) {
  jumlah = $("span#"+id)
}
function update_ttl() {
    var table = document.getElementsByTagName("table")[0]
    var total = 0
    for(var t = 1; t < table.rows.length ; t++)
    {
      total = total + parseInt(table.rows[t].cells[2].innerText);
    }
    $("p#total_pesanan").html(total)
    var	reverse = total.toString().split('').reverse().join(''),
    ribuan 	= reverse.match(/\d{1,3}/g);
    ribuan	= ribuan.join('.').split('').reverse().join('');
    var elm_total = $(".modal-footer h2 span.total")
    var p_total = $("p.nominal")
    elm_total.html("Rp. "+ribuan)
    p_total.html("Rp. "+ribuan)
}

function pesan(id,nama,harga,photo,tipe) {
  // Fungsi ini berfungsi untuk melakukan beberapa perintah untuk memanipulasi element2 diantaranya:
  // 1. mengubah icon pada add item
  // 2. menambahkan item kedalam keranjang pemesanan (modal keranjang)
  // 3. menambahkan tombol count didalam box item
  // 4. setiap tombol count akan berpengaruh pada total di keranjang dan total belanja

  update_jml(id)
  var icon_1st = $("svg.bi.pesan.a"+id)
  var icon_2st = $("svg.bi.terpesan.a"+id)

  icon_1st.hide()
  icon_2st.show()

  const hitung_1st = $(".hitung.a"+id)

  hitung_1st.show();

  const elm = $("table tr#kosong");
  if(elm){
    elm.remove()
  }

  new_row(id)

  if(tipe == 'Makanan Utama')
  var elm_nama = "<img src='/gambar/makanan/"+photo+"' width='100px' height='auto'><p>"+nama+"</p>";
  else
  var elm_nama = "<img src='/gambar/minuman/"+photo+"' width='100px' height='auto'><p>"+nama+"</p>";

  var elm_jml = "<p class='jumlah'>"+jumlah.text()+"</p>";
  var elm_harga = "<p class='harga'>"+harga+"</p>";
  var elm_aksi =  "<a href='#' onclick='return hapus("+id+");' class='btn btn-outline-danger' id='hapus'> × Remove</a>"

  var table = document.getElementsByTagName('table')[0];
  
  var newRow = table.insertRow(table.rows.length/2+1);
  
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

  var last = table.rows.length-1

  var tr = document.getElementsByTagName("tr")[last]

  tr.setAttribute("id", "t"+id);
  
  var ubah_node = $("button#"+id+".btn.d-flex.align-items-center.justify-content-center.body");
  ubah_node[0].disabled = true;
  update_ttl()
}

function hapus(id) {
  var icon_1st = $("svg.bi.pesan.a"+id)
  var icon_2st = $("svg.bi.terpesan.a"+id)

  icon_1st.show()
  icon_2st.hide()

  const hitung = $(".hitung.a"+id)
  hitung.hide();

  var ubah_node = $("button#"+id+".btn.d-flex.align-items-center.justify-content-center.body");
  ubah_node[0].disabled = false;

  $(".hitung.a"+id+" span#"+id).text(1)

  var value = parseInt($(".hitung.a"+id+" span#"+id).text())
  value = 0;
  $(".hitung.a"+id+" span#"+id).text(1)
  update_jml(id)
  
  var elm_harga = $("tr#"+id+" p.harga")
  elm_harga.text(0)
  // const elm = $("table tr#"+id);
  // if(elm){
    //   elm.remove()
    // }
  var row = document.getElementById("t"+id)
  row.parentNode.removeChild(row);
  update_ttl()

  var id_hapus = $("span#save_id_"+id).text()
  remove(id_hapus)
}

function minus(id,harga) {
  var value = parseInt($(".hitung.a"+id+" span#"+id).text())
  if(value != 1){
    value = value-1;
    $(".hitung.a"+id+" span#"+id).text(value)

    update_jml(id)
    var elm_jumlah = $("tr#t"+id+" p.jumlah")
    elm_jumlah.text(jumlah.text())
  
    var jml = jumlah.text()
    harga = harga * jml
    var elm_harga = $("tr#t"+id+" p.harga")
    elm_harga.text(harga)
    update_ttl()
    var id_edit = $("span#save_id_"+id).text()
    min(id_edit)
  }
  else{
    alert("Tidak boleh bernilai Nol")
  }
}

function plus(id,harga) {
  var value = parseInt($(".hitung.a"+id+" span#"+id).text())
  value = value+1;
  $(".hitung.a"+id+" span#"+id).text(value)
  update_jml(id)
  var elm_jumlah = $("tr#t"+id+" td p.jumlah")
  elm_jumlah.text(jumlah.text())
  // var jml = jumlah.text()
  harga = harga * value
  var elm_harga = $("tr#t"+id+" td p.harga")
  elm_harga.text(harga)
  update_ttl()
  var id_edit = $("span#save_id_"+id).text()
  add(id_edit)
}

function new_row(id) {
  $.ajaxSetup({
    headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
  });
  $.ajax({
      url: "baru",
      type: "POST",
      data: {
          id_menu:id,
          id_transaksi:$('.id_transaksi').val(),
          jumlah:$('.baru#jumlah_'+id).val(),
          sub_total:$('.baru#sub_total_'+id).val(),
          catatan:'not approve'
      },
      success: function(hasil){
        // var row_id
        // row_id = hasil.id
        // tempel_id(row_id,id)
        }
    }
  );
}

function tempel_id(row_id,id) {
  $("span#save_id_"+id).html(row_id)
}

function remove(id_hapus) {
  $.ajax({
      url: "hapus/"+id_hapus,
      type: "GET",
    }
  );
}

function add(id_edit) {
  $.ajax({
      url: "add/"+id_edit,
      type: "GET",
    }
  );
}

function min(id_edit) {
  $.ajax({
      url: "min/"+id_edit,
      type: "GET",
    }
  );
}

function show_form() {
  $("#kembalian").show()
}

function hitung_kembalian() {
  var teks = $("p#total_pesanan").text();
  var total = parseInt(teks)
  var bayar = $("input#nominal")
  var kembalian = total - 
  // var newValue = teks.text().replace('Rp','');
  // newValue = newValue.replace('.', '');
  // var harga = parseInt(newValue);
  // harga = harga+1000;
  // console.log(harga);
  // console.log(newValue);
}