@extends('layouts.app')

@section('title','ID Desa')

@section('content')   

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Desa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Desa</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{ route('desa.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    + Tambah
                </a>
            </div>

            <!-- <div class="bg-white"> -->
            <div class="card-body table-responsive p-0" style="overflow-x:auto;">
                <table class="table-auto w-full">
                    <thead>
                    <tr>
                        <th class="border px-6 py-4">No</th>
                        <th class="border px-6 py-4">ID Prov</th>
                        <th class="border px-6 py-4">Provinsi</th>
                        <th class="border px-6 py-4">ID Kab/Kota</th>
                        <th class="border px-6 py-4">Kabupaten / Kota</th>
                        <th class="border px-6 py-4">ID Kec</th>
                        <th class="border px-6 py-4">Kecamatan</th>
                        <th class="border px-6 py-4">ID Desa</th>
                        <th class="border px-6 py-4">Desa</th>
                        <th class="border px-6 py-4">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($desa as $data)
                            <tr>
                                <td class="border px-6 py-4">{{ ($desa->currentPage()-1) * $desa->perPage()+$loop->index+1 }}</td>
                                <td class="border px-6 py-4 ">{{ $data->idprov }}</td>
                                <td class="border px-6 py-4">{{ $data->provinsi }}</td>
                                <td class="border px-6 py-4">{{ $data->idkab }}</td>
                                <td class="border px-6 py-4">{{ $data->kabkota }}</td>
                                <td class="border px-6 py-4">{{ $data->idkec }}</td>
                                <td class="border px-6 py-4">{{ $data->kecamatan }}</td>
                                <td class="border px-6 py-4">{{ $data->iddesa }}</td>
                                <td class="border px-6 py-4">{{ $data->desa }}</td>
                                <td class="border px-6 py- text-center">
                                    <a href="{{ route('desa.edit', $data->id) }}" class="btn btn-success btn-sm" title="Ubah">
                                    <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('desa.destroy', $data->id) }}" method="POST" class="d-inline" title="Hapus">
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
            <div class="text-center mt-5">
                {{ $desa->links() }}
            </div>
        </div>
    



      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection