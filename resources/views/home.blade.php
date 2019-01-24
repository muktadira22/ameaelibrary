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
                            <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="tblPengembalian">
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
                            </tbody>
                        </table>
                        </div>

                        <!-- DIV PEMINJAMAN -->
                        <div id="peminjaman" style="margin-top: 10px">
                            <legend>DAFTAR PEMINJAMAN</legend>
                            <button class="btn btn-primary btn-sm" id="searchBook">
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
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                    </td>
                                </tr>
                                 <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                    </td>
                                </tr>
                                 <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-info btn-lg" id="btnPinjamBuku">
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
    <script type="text/javascript" src="{{ asset('assets') }}/js/ameaelibrary.js"></script>
@endpush

