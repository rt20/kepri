<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.meta')

    <title>Home | APBDes Kepulauan Riau</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="">
    <link rel="shortcut icon" type="image/x-icon" href="">

    @stack('before-style')
    <!-- style -->
    @include('includes.style')
    @stack('after-style')

</head>

<body>

<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
           
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
        </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    <!-- </div> -->
    <!-- ./wrapper -->


    @include('home.sidebar')
    @section('title','Dashboard')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-10">
                        <h1>Jadwal Kegiatan</h1>
                    </div>
                   
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-3">
   
            <div class="bg-white">
                <table id="data_table" class="table">
                    <thead class="thead-light">
                    <tr>
                        <th class="border px-6 py-4">No</th>
                        <th class="border px-6 py-4">Hari, Tanggal</th>
                        <th class="border px-6 py-4">Waktu</th>
                        <th class="border px-6 py-4">Agenda</th>
                        <th class="border px-6 py-4">Lokasi</th>
                        <th class="border px-6 py-4">Penyelenggara</th>
                        <th class="border px-6 py-4">Peserta</th>
                        <th class="border px-6 py-4">No HP</th>
                        <th class="border px-6 py-4">Keterangan</th>
                     
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($schedule as $data)
                            <tr>
                                <td >{{ ($schedule->currentPage()-1) * $schedule->perPage()+$loop->index+1 }}</td>
                                <td class="border px-6 py-4 ">{{ date('D, d F y', strtotime($data->date)) }}</td>
                                <td class="border px-6 py-4 ">{{ date('H:i', strtotime($data->time)) }}</td>
                                <td class="border px-6 py-4">{{ $data->agenda }}</td>
                                <td class="border px-6 py-4">{{ $data->location }}</td>
                                <td class="border px-6 py-4">{{ $data->organizer }}</td>
                                <td class="border px-6 py-4">{{ $data->participant }}</td>
                                <td class="border px-6 py-4">{{ $data->phone }}</td>
                                <td class="border px-6 py-4">{{ $data->note }}</td>
                               
                            </tr>
                        @empty
                            <tr>
                               <td colspan="9" class="border text-center p-5">
                                   Data Tidak Ditemukan
                               </td>
                            </tr>
                        @endforelse
                        
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-5">
                {{ $schedule->links() }}
            </div>
        </div>
    



      </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



    @include('includes.footer')

    @stack('before-script')
    <!-- script -->
    @include('includes.script')
    @stack('after-script')

</body>

</html>
