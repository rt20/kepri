@extends('layouts.app')

@section('title','Perencanaan')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include ('flash::message')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Data Perencanaan</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active">Perencanaan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="card">
            <!-- <div class="card-body">
                 <div class="row input-daterange">
                    <div class="col-sm-2">
                        <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date"
                            readonly />
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date"
                            readonly />
                    </div>
                    <div class="col-sm-4">
                        <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>
                        <button type="button" name="refresh" id="refresh" class="btn btn-info">Refresh</button>
                    </div>
                </div>
            </div> -->
            <div class="card-body " style="overflow-x:auto;">
                <a href="{{ route('plan.create') }}" class="btn btn-success mb-3"><i class="fa fa-plus"></i> Tambah</a>
                <!-- <table class="table table-striped table-responsive table-bordered table-sm" style="width:100%"> -->
                <table id="plan" class="table table-responsive table-striped table-bordered table-sm"
                    style="width:100%">
                    <thead>
                        <tr>

                            <th>#</th>
                            <th>Desa</th>
                            <th>Penetapan RPJMDes</th>
                            <th>Penetapan RKPDes</th>
                            <th>Penetapan APBDes</th>
                            <th>Alokasi DD</th>
                            <th>Alokasi ADD</th>
                            <th>Alokasi DBHPRD</th>
                            <th>BanKeu Kab</th>
                            <th>BanKeu Prov</th>
                            <th>DLL</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                </table>

            </div>

            <!-- </div> -->



        </div>

        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- MULAI MODAL KONFIRMASI DELETE-->

<div class="modal fade" tabindex="-1" role="dialog" id="konfirmasi-modal" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">PERHATIAN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b>Data perencanaan akan dihapus</b></p>
                <p>Apakah anda yakin?</p>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" name="tombol-hapus" id="tombol-hapus">Hapus</button>
            </div>
        </div>
    </div>
</div>

<!-- AKHIR MODAL -->
@endsection

@push('after-script')
<script>
    //CSRF TOKEN PADA HEADER
    //Script ini wajib krn kita butuh csrf token setiap kali mengirim request post, patch, put dan delete ke server
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //jalankan function load_data diawal agar data ter-load
        load_data();
        //Iniliasi datepicker pada class input
        $('.input-daterange').datepicker({
            todayBtn: 'linked',
            format: 'yyyy-mm-dd',
            autoclose: true
        });
        $('#filter').click(function () {
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            if (from_date != '' && to_date != '') {
                $('#schedule').DataTable().destroy();
                load_data(from_date, to_date);
            } else {
                alert('Both Date is required');
            }
        });
        // $('#refresh').click(function () {
        //     $('#from_date').val('');
        //     $('#to_date').val('');
        //     $('#schedule').DataTable().destroy();
        //     load_data();
        // });
        // $('#bersih').click(function () {
        //     $('#date').val('');
        //     $('#time').val('');
        //     $('#date_end').val('');
        //     $('#time_end').val('');
        //     $('#agenda').val('');
        //     $('#organizer').val('');
        //     $('#location').val('');
        //     $('#link').val('');
        //     $('#note').val('');
        //     $('#attachment').val('');
        //     $('#participant').val('');
        //     $('#participant').val('');
        // });
        //LOAD DATATABLE
        //script untuk memanggil data json dari server dan menampilkannya berupa datatable
        //load data menggunakan parameter tanggal dari dan tanggal hingga
        function load_data(from_date = '', to_date = '') {
            $('#plan').DataTable({
                processing: true,
                serverSide: true, //aktifkan server-side
                ajax: {
                    url: "{{ route('plan.index') }}",
                    type: 'GET',
                    data: {
                        from_date: from_date,
                        to_date: to_date
                    } //jangan lupa kirim parameter tanggal
                },
                columns: [{
                        "data": "id",
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'desa_id',
                        name: 'desa_id'
                    },

                    {
                        data: 'penetapan_rpjmdes',
                        name: 'penetapan_rpjmdes'
                    },
                    {
                        data: 'penetapan_rkpdes',
                        name: 'penetapan_rkpdes'
                    },
                    {
                        data: 'penetapan_apbdes',
                        name: 'penetapan_apbdes'
                    },
                    {
                        data: 'alokasidd',
                        name: 'alokasidd'
                    },

                    {
                        data: 'alokasiadd',
                        name: 'alokasiadd'
                    },
                    {
                        data: 'alokasidbhprd',
                        name: 'alokasidbhprd'
                    },
                    {
                        data: 'bankeu_kab',
                        name: 'bankeu_kab'
                    },
                    {
                        data: 'bankeu_prov',
                        name: 'bankeu_prov'
                    },
                    {
                        data: 'dll',
                        name: 'dll'
                    },
                    {
                        data: 'total',
                        name: 'total'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },

                ],
                dom: 'Bfrtip',
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    ['10', '25', '50', '100', 'Semua']
                ],
                buttons: [
                    'pageLength',
                    {
                        extend: 'csv',
                        text: '<i class="fas fa-file-csv fa-1x"></i>'
                    },
                    {
                        extend: 'excel',
                        text: '<i class="fas fa-file-excel" aria-hidden="true"></i>'
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="fas fa-file-pdf fa-1x" aria-hidden="true"></i>'
                    },
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print" aria-hidden="true"></i>'
                    },
                ],
            });
        }
        //jika klik class delete (yang ada pada tombol delete) maka tampilkan modal konfirmasi hapus maka
        $(document).on('click', '.delete', function () {
            dataId = $(this).attr('id');
            $('#konfirmasi-modal').modal('show');
        });
        //jika tombol hapus pada modal konfirmasi di klik maka
        $('#tombol-hapus').click(function () {
            $.ajax({
                url: "plan/" + dataId, //eksekusi ajax ke url ini
                type: 'delete',
                beforeSend: function () {
                    $('#tombol-hapus').text('Hapus Data');
                }, //set text untuk tombol hapus
                success: function (data) { //jika sukses
                    setTimeout(function () {
                        $('#konfirmasi-modal').modal(
                            'hide'); //sembunyikan konfirmasi modal
                        var oTable = $('#plan').dataTable();
                        oTable.fnDraw(false); //reset datatable
                    });
                    iziToast.warning({ //tampilkan izitoast warning
                        title: 'Data Berhasil Dihapus',
                        message: '{{ Session('
                        delete ')}}',
                        position: 'bottomRight'
                    });
                }
            })
        });
    });

</script>
@endpush
