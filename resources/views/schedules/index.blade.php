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
                <!-- SEARCH FORM -->
                <form class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="text" name="search"
                            placeholder="Cari Agenda" aria-label="Search" value="{{old('search')}}">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <!--  <div class="row input-daterange">
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
                </div>-->
            </div>

            <div class="card-body " style="overflow-x:auto;">
                <table class="table table-striped table-responsive table-bordered table-sm" style="width:100%">
                    <!-- <table id="schedule" class="table table-striped table-bordered table-sm" style="width:100%"> -->
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Mulai</th>

                            <th>Selesai</th>

                            <th>Agenda</th>
                            <th>Penyelenggara</th>
                            <th>Lokasi</th>

                            <th>Peserta</th>
                            <th>Lampiran</th>
                            <th>Keterangan</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $row)
                        <tr>
                            <th>{{ ($data->currentPage()-1) * $data->perPage()+$loop->index+1 }}</th>
                            <td>{{ $row->date_start }} {{ $row->time_start }}</td>
                            <td>{{ $row->date_end }} {{ $row->time_end }}</td>
                            <td>{{ $row->agenda }}</td>
                            <td>{{ $row->organizer }}</td>
                            <td>{{ $row->location }}</td>
                            <td>{{ $row->participant }}</td>
                            <td>{{ $row->atachment }}</td>
                            <td>{{ $row->note }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8">Data tidak ditemukan</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>

            </div>

            <!-- </div> -->



            {!! $data->render() !!}
        </div>

        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
