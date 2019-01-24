var members = "";
var books = "";
var listPBooks = new Array();
var listPgBooks = new Array();
var idMember = "";
var $loader = $('.loader');

const NUMBER_OF_DATE_ADD = 10;
const DENDA_PER_HARI = 500;

$(document).ready(function() {

//  CALLING FUNCTION GETALLBUKU & GET ALL MEMBER
    getAllBuku();
    getAllMember();

    $("#peminjaman").hide();
    $("#pengembalian").hide();

//  MODAL BOOTSTRAP FUNCTION
    $(".transaction-modal").modal({
        keyboard: false,
        backdrop: 'static',
        show: false
    });

//  IF SEARCH MEMBER HAS CLICKED
    $("#searchMember").click(function(){
        $(".modal-title").text("SEARCH MEMBER");
        $("#dataTableMember").show();
        $("#dataTableMember").parents('div.dataTables_wrapper').first().show();
        $("#dataTableBook").hide();
        $("#dataTableMember").DataTable();
    });

//  ON ENTER PRESS IN SEARCH MEMBER TEXT
    $("#searchMemberTxt").keyup(function(event) {
        if(event.key == "Enter")
        {
            let ketemu = false;
            let id_member = $(this).val();
            let index = '';
            for(var i = 0; i < members.length; i++)
            {
                if(id_member == members[i].id_member)
                {
                    ketemu = true;
                    index = i;
                    break;
                }
            }

            if(ketemu)
            {
                $(this).closest('div').removeClass('has-error');
                $(this).closest('div').addClass('has-success');
                $(this).attr('placeholder', 'Press Enter');

                $("#namaMember").text(members[i].nama);
                $("#alamatMember").text(members[i].alamat);

                loadPeminjaman(members[i].id_member);
            }
            else
            {
                $(this).closest('div').removeClass('has-success');
                $(this).closest('div').addClass('has-error');
                $(this).val('');
                $(this).attr('placeholder', 'Data not found');
                $("#namaMember").text("-");
                $("#alamatMember").text("-");

                $("#pengembalian").hide();
                $("#peminjaman").hide();
                $("#announcement").show();
            }
        }
    });

//  SHOWING BOOKS MODAL
    $("#searchBook").click(function(){
        let countBook = listPBooks.length + listPgBooks.length;
        if(countBook < 3)
        {
            $(".transaction-modal").modal('show');
            $(".modal-title").text("SEARCH BOOK");
            $("#dataTableBook").show();
            $("#dataTableMember").hide();
            $("#dataTableMember").parents('div.dataTables_wrapper').first().hide();
            $("#dataTableBook").DataTable();
        }
        else
        {
            alert("Tidak Bisa meminjam buku lagi");
        }
    });

//  STORE PEMINJAMAN TO DATABASE
    $("#btnPinjamBuku").click(function(){
        if(listPBooks.length != 0)
            storeBukuToDatabase();
        else
            alert("Minimal Harus satu buku yang dipinjam");
    });

    // SCRIPT PA YAYAT
    // $("[NAMA TABLE]").on('click', '[nama class button]', function(){
    //     var currentRow = $(this).closest('tr');
    //     var kdoe = currentRow.find('th:eq(1)').text();

    //     $('#lnama').text('nama');
    // });
});

// GET DATA MEMBER FROM DATABASE
function getAllMember(){
    // $.getJSON(baseUrl+"member", function(response){
    //     var body = "";
    //     members = response.result;

    //     $("#dataTableMember tbody").html("");

    //     $.each(members, function(index, members){
    //        body += "<tr>";
    //        body += "<td>"+members.id_member+"</td>";
    //        body += "<td>"+members.id_member+"</td>";
    //        body += "<td>"+members.nama+"</td>";
    //        body += "<td>"+members.pekerjaan+"</td>";
    //        body += "<td>";
    //        body += "<button onclick='addMember("+index+")' class='btn btn-primary'>PILIH</button>";
    //        body += "</td>";
    //        body += "</tr>";
    //     });

    //     $("#dataTableMember tbody").append(body);
    // });

     $.ajax({
      url         : baseUrl+"member",
      dataType    : "JSON",
      beforeSend  : function(){
        $loader.show();
      }
    })
    .done(function(response){
        var body = "";
        members = response.result;

        $("#dataTableMember tbody").html("");

        $.each(members, function(index, members){
           body += "<tr>";
           body += "<td>"+members.id_member+"</td>";
           body += "<td>"+members.id_member+"</td>";
           body += "<td>"+members.nama+"</td>";
           body += "<td>"+members.pekerjaan+"</td>";
           body += "<td>";
           body += "<button onclick='addMember("+index+")' class='btn btn-primary'>PILIH</button>";
           body += "</td>";
           body += "</tr>";
        });

        $("#dataTableMember tbody").append(body);
    })
    .fail(function(){
        console.log("Error to Get Data Member");
    })
    .always(function(){
        $loader.hide();
    });
} 

// GET DATA BUKU FROM DATABASE
function getAllBuku() {
    // $.getJSON(baseUrl+"buku", function(response){
    //     books = response.result;
    //     tampilBuku(books);
    // });
    

    $.ajax({
      url         : baseUrl+"buku",
      type        : "GET",
      dataType    : "JSON",
      beforeSend  : function(){
        $loader.show();
      }
    })
    .done(function(response){
        books = response.result;
        tampilBuku(books);
    })
    .fail(function(){
        console.log("Error to Get Data Buku");
    })
    .always(function(){
        $loader.hide();
    });
}

// SHOWING BOOKS DATA TO MODAL
function tampilBuku(books){
    var body = "";
    $("#dataTableBook tbody").html("");
    // console.log(books);
    $.each(books, function(index, books){
       body += "<tr>";
       body += "<td>"+books.id_buku+"</td>";
       body += "<td>"+books.judul_buku+"</td>";
       body += "<td>"+books.pengarang+"</td>";
       body += "<td>"+books.tahun_terbit+"</td>";
       body += "<td>";
       body += "<button onclick='addBuku("+index+")' class='btn btn-primary'>PILIH</button>";
       body += "</td>";
       body += "</tr>";
    });

    $("#dataTableBook tbody").append(body);
}  

// ADDING MEMBER TO PANEL
function addMember(index) {
    let member = members[index];
    let nama = member.nama;
    let addr = member.alamat;
    let id = member.id_member;
    idMember = id;

    $("#namaMember").text(nama);
    $("#alamatMember").text(addr);
    $("#searchMemberTxt").val(id);
    $(".transaction-modal").modal('hide');

    $("#searchMemberTxt").closest('div').removeClass('has-error');
    $("#searchMemberTxt").closest('div').addClass('has-success');
    $("#searchMemberTxt").attr('placeholder', 'Press Enter');

    loadPeminjaman(id);
    listPBooks = [];
    listPeminjamanBook();
}

// ADDING BOOKS TO TABLE PEMINJAMAN
function addBuku(index) {
    let buku = books[index];
    $("#dataTableBook tbody").find("tr:eq("+index+")").hide(function(){
        listPBooks.push(buku);
        books.splice(index, 1);
        console.log(books);
        $(".transaction-modal").modal('hide');
        listPeminjamanBook();
    });
}

// Date function
function addDaysPeminjaman(){
    var someDate = new Date();
    someDate.setDate(someDate.getDate() + NUMBER_OF_DATE_ADD); 

    var dd = someDate.getDate();
    var mm = someDate.getMonth() + 1;
    var y = someDate.getFullYear();

    var someFormattedDate = y + '-'+ mm + '-'+ dd;
    return someFormattedDate;
}

//Detail Date Function 1
function sqlFormatDate(date){
    var dates = date.split("-");
    var yy = dates[0];
    var mm = "00".substring(dates[1].length)+dates[1];
    var dd = "00".substring(dates[2].length)+dates[2];
    return yy+"-"+mm+"-"+dd;
}

console.log(sqlFormatDate(addDaysPeminjaman()));

//Detail Date Function 2
function detailDate(date){
    var month = ["Januari", "Februari", "Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober","November","Desember"];
    var dates = date.split("-");
    return dates[2] + " " + month[parseInt(dates[1]) - 1] +" "+dates[0];
}

// GET LIST DATA TO PEMINJAMAN
function listPeminjamanBook(){
    let body = "";
    let id = "";
    $.each(listPBooks, function(index, data){
        body += "<tr>";
        body += "<td>"+ (parseInt(index)+1)+"</td>";
        body += "<td>"+data.id_buku+"</td>";
        body += "<td>"+data.judul_buku+"</td>";
        body += "<td>"+detailDate(addDaysPeminjaman())+"</td>";
        body += `<td><button class='btn btn-danger' onclick='deleteBuku("`+data.id_buku+`")'>HAPUS</button></td>`;
        body += "</tr>";
    });

    $('#tblPeminjaman tbody').html(body);
        // console.log(body); 
}

// DELETE ONE BOOKS IN TABLE PEMINJAMAN
function deleteBuku(id) {
    for(var i = 0; i < listPBooks.length; i++)
    {
        if(listPBooks[i].id_buku == id)
        {
            books.push(listPBooks[i]);
            listPBooks.splice(i, 1);
            break;
        }
    }

    listPeminjamanBook();
    tampilBuku(books);
    // alert(id);
}

// LOAD ALL DATA PEMINJAMAN AND PENGEMBALIAN AFTER MEMBER CHOOSING
function loadPeminjaman(id) {
    console.log("Load Peminjaman");
    listPBooks = [];
    listPgBooks = [];
    $.getJSON(baseUrl + "transaction/"+id, function(response){
        var data = response;
        if(data.pengembalian)
        {
            $("#peminjaman").show();
            $("#pengembalian").show();
            $("#announcement").hide();

            loadPengembalian(data);
        }
        else
        {
            $("#pengembalian").hide();
            $("#peminjaman").show();
            $("#announcement").hide();
        }
    });
}

// COUNT DENDA
function countDenda(end){
    let now = new Date();
    let date2 = end.split("-");
    let endDate = new Date(date2[1]+"/"+date2[2]+"/"+date2[0]);

    endDate.setHours(0,0,0,0);

    if(now > endDate){
        let oneDay = 24*60*60*1000; // jam/menit/detik/milidetik
        let count = Math.round(Math.round((now.getTime() - endDate.getTime())/ (oneDay)));
        count = count * DENDA_PER_HARI;
        return count;
    }
    else{
        return "0";
    }
}

// FUNCTION JIKA DENDA ADA 
function btnDendaBehav(denda, total){
    switch(total) {
        case true:
            if(denda > 0)
                return `<button class="btn btn-danger btn-sm" onclick="payDenda(true)">Bayar Denda Semuanya</button>`;
            else
                return `<button class="btn btn-success btn-sm" onclick="backBuku(true)">Kembalikan Semuanya</button>`;
        break;
        case false:
            if(denda > 0)
                return `<button class="btn btn-danger btn-sm" onclick="payDenda(false)">Bayar Denda</button>`;
            else
                return `<button class="btn btn-success btn-sm" onclick="backBuku(false)">Kembalikan</button>`;
        break;
    }
}

// BAYAR DENDA FUNCTION
function payDenda(status) {
    switch(status) {
        case true:
        // BAYAR KESELURUHAN DENDA
        alert("bayar keseluruhan denda");
        break;
        case false:
        // BAYAR DENDA 1 BUKU
        alert("bayar denda 1 buku");
        break;
    }
}

// FUNCTION KEMBALIKAN BUKU
function backBuku(status) {
    switch(status) {
        case true:
        // KEMBALIKAN KESELURUHAN BUKU
        alert("KEMBALIKAN keseluruhan BUKU");
        break;
        case false:
        // KEMBALIKAN BUKU 
        alert("KEMBALIKAN 1 BUKU");
        break;
    }
}

// LOAD ALL DATA PENGEMBALIAN
function loadPengembalian(response) {
    let databuku = response.result;
    let body = "";
    let total = 0;
    console.log(databuku);
    $("#tblPengembalian tbody").html("");
    $.each(databuku, function(index, data){
        body += "<tr>";
        body += "<td>"+data.id_buku+"</td>";
        body += "<td>"+data.judul_buku+"</td>";
        body += "<td>"+data.tgl_peminjaman+"</td>";
        body += "<td>"+data.tgl_kembali+"</td>";
        body += "<td>Rp. <span>"+countDenda(data.tgl_kembali)+"</span></td>";
        body += "<td>"+btnDendaBehav(countDenda(data.tgl_kembali), false)+"</td>";
        body += "</tr>";
        listPgBooks.push(data);
        total += parseFloat(countDenda(data.tgl_kembali));
    });


    body += "<tr>";
    body += "<td></td>";
    body += "<td></td>";
    body += "<td colspan='2'>TOTAL DENDA</td>";
    body += "<td colspan='1'> Rp. "+total+"</td>";
    body += "<td>"+btnDendaBehav(total, true)+"</td>";
    body += "</tr>";
    $("#tblPengembalian tbody").html(body);
}

function clearDataTransaction(){
    listPBooks = [];
    listPeminjamanBook();

    $("#namaMember").text("-");
    $("#alamatMember").text("-");
    $("#searchMemberTxt").val("");
    $("#searchMemberTxt").closest('div').removeClass('has-success');

    $("#pengembalian").hide();
    $("#peminjaman").hide();
    $("#announcement").show();
}

// STORE PEMINJAMAN BOOKS TO DATABASE
function storeBukuToDatabase(){
    let token = localStorage.getItem("api_token");
    let data = new Array();
    for(var i = 0; i < listPBooks.length; i++)
    {
        data.push(listPBooks[i].id_buku);
    }
    data = data.toString();
    console.log(data);

    $.ajax({
        url: baseUrl+'transaction/'+idMember+"?api_token="+token,
        type: 'POST',
        data: { id_buku : data, tgl_kembali: addDaysPeminjaman()},
    })
    .done(function(response) {
        console.log("success");
        window.location = "<?php echo url('') ?>";

    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
    
}