@extends('layouts.app')

@section('title','Edit')

@section('content')
@include ('shared.errors')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include ('flash::message')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Agenda Kegiatan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('schedules.index') }}">Agenda</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <!-- <form action="{{ asset("/stugas") }}" method="POST"> -->
                <!-- <form action="{{ route('schedules.update',$schedule->id) }}" method="post"> -->
                  
                    <div class="container">
                        <div class="row">

                            <div class="col-sm-2">
                                Tanggal Kegiatan*
                            </div>
                            <div class="col-sm-auto">
                                <input type="date" name="date" class="form-control form-control-sm"
                                    value="{{old('date') ?? $schedule->date}}" disabled>
                            </div>
                            <div class="col-sm-auto">
                                Waktu*
                            </div>
                            <div class="col-sm-auto">
                                <input type="time" name="time" class="form-control form-control-sm"
                                    value="{{old('time') ?? $schedule->time}}" disabled required>
                            </div>
                            WIB
                        </div>


                        <br>
                        <div class="row">

                            <div class="col-sm-2">
                                Tanggal Selesai*
                            </div>
                            <div class="col-sm-auto">
                                <input type="date" name="date_end" class="form-control form-control-sm"
                                    value="{{old('date') ?? $schedule->date_end}}" disabled required>
                            </div>
                            <div class="col-sm-auto">
                                Waktu Selesai*
                            </div>
                            <div class="col-sm-auto">
                                <input type="time" name="time_end" class="form-control form-control-sm"
                                    value="{{old('time_end')?? $schedule->time_end}}" disabled required>
                            </div>
                            WIB
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-sm-2">
                                Agenda*
                            </div>
                            <div class="col-sm-5">
                                <input type="text" name="agenda" placeholder="Nama Kegiatan/ Acara"
                                    class="form-control form-control-sm"
                                    value="{{old('agenda') ?? $schedule->agenda }}" disabled>
                            </div>
                        </div>
                        </br>
                        <div class="row">
                            <div class="col-sm-2">
                                Link Daring
                            </div>
                            <div class="col-sm-5">
                                <input type="text" name="link" placeholder="Link Meeting Online" disabled
                                    class="form-control form-control-sm" value="{{old('link')?? $schedule->link}}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-2">
                                Penyelenggara
                            </div>
                            <div class="col-sm-5">
                                <input type="text" name="organizer" placeholder="Penyelenggara Kegiatan/ Acara"
                                    class="form-control form-control-sm" disabled
                                    value="{{old('organizer') ?? $schedule->organizer }}">
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-sm-2">
                                Peserta
                            </div>
                            <div class="col-sm-5">
                                <input type="text" name="participant" placeholder="Peserta Kegiatan/ Acara"
                                    class="form-control form-control-sm" disabled
                                    value="{{old('participant') ?? $schedule->participant }}">
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-sm-2"> Keterangan
                            </div>
                            <div class="col-sm-5">

                                <input type="text" name="note" class="form-control form-control-sm" disabled
                                    placeholder="Keterangan" value="{{old('note') ?? $schedule->note }}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-2"> Lampiran
                            </div>
                            <div class="col-sm-5">
                            {{old('attachment') }}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-2">
                                Lokasi
                            </div>
                            <div class="col-sm-5">
                                <input type="text" name="location" placeholder="Lokasi Kegiatan/ Acara"
                                    class="form-control form-control-sm" disabled
                                    value="{{old('location') ?? $schedule->location }}">
                                <input type="hidden" id="lat" name="lat" value="{{old('lat') ?? $schedule->lat }}">
                                <input type="hidden" id="lng" name="lng" value="{{old('lng') ?? $schedule->lng }}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div id="googleMap" style="width:100%;height:380px;"></div>
                        </div>
                <!-- </form> -->
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection