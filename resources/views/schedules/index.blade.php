@extends('layouts.app')

@section('title','List')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include ('flash::message')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Agenda Kegiatan</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active">Agenda</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
        <div class="card-body">
            <div class="row input-daterange" >
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
            </div>
            <!-- AKHIR DATE RANGE PICKER -->
            <!-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> -->
            <!-- <div class="mb-10">
                <a href="{{ route('schedules.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    + Tambah Jadwal
                </a>
            </div> -->

            <!-- <div class="bg-white"> -->
            <div class="card-body table-responsive"  style="overflow-x:auto;">

                <table id="schedule" class="table table-striped table-bordered table-sm" style="width:100%">
                    <thead>
                        <tr>

                            <th class="border px-6 py-4">Hari, Tanggal Mulai</th>
                            <th class="border px-6 py-4">Waktu Mulai</th>
                            <th class="border px-6 py-4">Hari, Tanggal Selesai</th>
                            <th class="border px-6 py-4">Waktu Selesai</th>
                            <th class="border px-6 py-4">Agenda</th>
                            <th class="border px-6 py-4">Penyelenggara</th>
                            <th class="border px-6 py-4">Lokasi</th>
                            <th class="border px-6 py-4">Link</th>
                            <th class="border px-6 py-4">Peserta</th>

                            <th class="border px-6 py-4">Lampiran</th>
                            <th class="border px-6 py-4">Keterangan</th>

                        </tr>
                    </thead>
                </table>
            </div>
            <div class="text-center mt-5">

            </div>
            <!-- </div> -->




        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
