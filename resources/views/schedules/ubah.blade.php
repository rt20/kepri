@extends('layouts.app')

@section('title','Ubah')

@section('content')   

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  @include ('flash::message')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ubah Agenda Kegiatan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
              <li class="breadcrumb-item active">Jadwal</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- <div class="mb-10">
                <a href="{{ route('schedules.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    + Tambah Jadwal
                </a>
            </div> -->
          
            <!-- <div class="bg-white"> -->
            <div class="card-body table-responsive p-0" style="overflow-x:auto;">
                <table id="example" class="table table-striped table-bordered table-sm" >
                <!-- <table id="schedule" class="table table-striped table-bordered table-sm" style="width:100%"> -->
                    <thead>
                    <tr>
                        <th>Hari, Tanggal</th>
                        <th>Waktu</th>
                        <th>Agenda</th>
                        <th>Lokasi</th>
                        <th>Penyelenggara</th>
                        <th>Peserta</th>
                        <th>Action</th>
                    </tr> 
                    </thead>
                    <tbody> 
                        @forelse($schedule as $data)
                            <tr>
                                <td>{{ $data->date_start }}</td>
                                <td>{{ $data->time_start }}</td>
                                <td>{{ $data->agenda }}</td>
                                <td>{{ $data->location }}</td>
                                <td>{{ $data->organizer }}</td>
                                <td>{{ $data->participant }}</td>
                                <td>
                               
                                    <a href="{{ route('schedules.edit', $data->id) }}" class="btn btn-success btn-sm" title="Ubah">
                                    <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('schedules.destroy', $data->id) }}" method="POST" class="d-inline" title="Hapus">
                                        {!! method_field('delete') . csrf_field() !!}
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ?')">
                                        <i class="fa fa-trash"></i>
                                        </button>
                                        
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                               <td colspan="10" class="border text-center p-8">
                                   Data Tidak Ditemukan
                               </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- <div class="text-center mt-5">
               
            </div> -->
        </div>
    



      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection