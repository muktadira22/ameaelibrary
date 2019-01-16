@extends("templates/header")

@section("content")
<!-- Page Content -->
    <div class="container-fluid" id="main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">TRANSAKSI PERPUSTAKAAN</h1>
            </div>
            <!-- DAA MEMBER -->
            <div class="col-lg-4">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        DATA MEMBER
                    </div>
                    <div class="panel-body">

                        <!-- .has-success .has-error -->
                        <div class="row">
                            <div class="col-lg-10">   
                        <div class="form-group input-group">
                            <span class="input-group-addon">ID</span>
                            <input type="text" class="form-control" placeholder="Press Enter" id="searchMemberTxt">
                        </div>
                            </div>
                            <div class="col-lg-2">
                                <button type="button" class="btn btn-default btn-info btn-block" data-toggle="modal" data-target=".transaction-modal" id="searchMember">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div> <!-- row -->

                        <div class="row">
                            <div class="col-lg-4">
                                <img src="{{ asset('uploads') }}/member/default.png" width="100%">
                            </div>
                            <div class="col-lg-8">
                                <dl>
                                    <dt>Name</dt>
                                    <dd id="namaMember">Muhammad Aria Muktadir</dd>
                                    <dt>Address</dt>
                                    <dd id="alamatMember">Kp. Babakan Imbangan Rt 01/02</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DATA TRANSAKSI -->
            <div class="col-lg-8">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        TRANSAKSI PERPUSTAKAAN
                    </div>
                    <div class="panel-body">
                        <div id="pengembalian">
                            <legend>DAFTAR PENGEMBALIAN</legend>
                            <table width="100%" class="table table-striped table-bordered table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>ID BUKU</th>
                                    <th>JUDUL BUKU</th>
                                    <th>TGL PINJAM</th>
                                    <th>TGL MUSTI KEMBALI</th>
                                    <th>DENDA</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="i in 3">
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>Rp. 0,-</td>
                                    <td>
                                        <button class="btn btn-success btn-sm">
                                            KEMBALIKAN
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">TOTAL DENDA</td>
                                    <td>Rp. 0,-</td>
                                    <td>
                                        <button class="btn btn-success btn-sm">
                                            KEMBALIKAN
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </div>

                        <!-- DIV PEMINJAMAN -->
                        <div id="peminjaman" style="margin-top: 10px">
                            <legend>DAFTAR PEMINJAMAN</legend>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target=".transaction-modal"  id="searchBook">
                                TAMBAH PEMINJAMAN
                            </button>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="tblPeminjaman">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID BUKU</th>
                                    <th>JUDUL BUKU</th>
                                    <th>TANGGAL KEMBALI</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm">
                                            HAPUS
                                        </button>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm">
                                            HAPUS
                                        </button>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm">
                                            HAPUS
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-info btn-lg">
                            PINJAM
                        </button>
                        </div>

                        <div id="announcement">
                            <div class="alert alert-info">
                                <strong>SILAHKAN PILIH MEMBER TERLEBIH DAHULU</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- /.row -->



    <!-- MODAL -->
    <div class="modal fade transaction-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" style="text-transform: uppercase;">MODAL TITLE</h4>
          </div>
          <div class="modal-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTableMember">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID MEMBER</th>
                            <th>NAMA</th>
                            <th>PEKERJAAN</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTableBook">
                    <thead>
                        <tr>
                            <th>ID BUKU</th>
                            <th>JUDUL</th>
                            <th>PENGARANG</th>
                            <th>TAHUN TERBIT</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div><!-- /.modal-content -->  
      </div>
    </div>

    </div>
    <!-- /.container-fluid -->
@endsection

@push("script")
    <script type="text/javascript">
        var members = "";
        var books = "";
        $(document).ready(function() {
            // // DATA TABLE
            // $('#dataTable').DataTable({
            //     responsive: true,
            // });

            $("#peminjaman").hide();
            $("#pengembalian").hide();

            // MODAL
            $(".transaction-modal").modal({
                keyboard: false,
                backdrop: 'static',
                show: false
            });

            // IF SEARCH MEMBER HAS CLICKED
            $("#searchMember").click(function(){
                $(".modal-title").text("SEARCH MEMBER");
                $("#dataTableMember").show();
                $("#dataTableBook").hide();
                $("#dataTableMember").DataTable();
            });


            $.getJSON(baseUrl+"member", function(response){
                var body = "";
                members = response.result;
                console.log(members);

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
            });

            $.getJSON(baseUrl+"buku", function(response){
                var body = "";
                books = response.result;

                $("#dataTableBook tbody").html("");

                $.each(books, function(index, books){
                   body += "<tr>";
                   body += "<td>"+books.id_buku+"</td>";
                   body += "<td>"+books.judul_buku+"</td>";
                   body += "<td>"+books.pengarang+"</td>";
                   body += "<td>"+books.tahun_terbit+"</td>";
                   body += "<td>";
                   body += "<button onclick='addMember("+index+")' class='btn btn-primary'>PILIH</button>";
                   body += "</td>";
                   body += "</tr>";
                });

                $("#dataTableBook tbody").append(body);
            });


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
                    }
                }
            });
            $("#searchBook").click(function(){
                $(".modal-title").text("SEARCH BOOK");
                $("#dataTableBook").show();
                $("#dataTableMember").hide();
                $("#dataTableMember").parents('div.dataTables_wrapper').first().hide();
                $("#dataTableBook").DataTable();
            });

            // SCRIPT PA YAYAT
            // $("[NAMA TABLE]").on('click', '[nama class button]', function(){
            //     var currentRow = $(this).closest('tr');
            //     var kdoe = currentRow.find('th:eq(1)').text();

            //     $('#lnama').text('nama');
            // });
        });


            function addMember(index)
            {
                let member = members[index];
                let nama = member.nama;
                let addr = member.alamat;
                let id = member.id_member;

                $("#namaMember").text(nama);
                $("#alamatMember").text(addr);
                $("#searchMemberTxt").val(id);
                $(".transaction-modal").modal('hide');

                $("#searchMemberTxt").closest('div').removeClass('has-error');
                $("#searchMemberTxt").closest('div').addClass('has-success');
                $("#searchMemberTxt").attr('placeholder', 'Press Enter');

                loadPeminjaman(id);
            }

            function loadPeminjaman(id)
            {
                $.getJSON(baseUrl + "transaction/"+id, function(response){
                    var data = response;
                    if(data.pengembalian)
                    {
                        $("#peminjaman").show();
                        $("#pengembalian").show();
                        $("#announcement").hide();
                    }
                    else
                    {
                        $("#pengembalian").hide();
                        $("#peminjaman").show();
                        $("#announcement").hide();
                    }
                });
            }
    </script>
@endpush

