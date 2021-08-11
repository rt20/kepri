@extends('layouts.app')

@section('title','Tambah Perencanaan')

@section('content')
@include ('shared.errors')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Perencanaan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('plan.index') }}">Perencanaan</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <form action="{{ route('plan.store')}}" method="post" enctype='multipart/form-data'>
                    @csrf
                    <div class="container">
                    <div class="row">
                            <div class="col-sm-3">
                                Desa*
                            </div>
                            <div class="col-sm-auto">
                                <select name="desa_id" id="select2" required>
                                    <option value=""></option>
                                    @foreach($desas ?? '' as $desa)
                                    <option value="{{ $desa->id }}"
                                        {{ old('desa_id') == $desa->id ? 'selected' : null }}>
                                        {{ $desa->desa }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        </br>
                        <div class="row">
                            <div class="col-sm-3">
                                Pelantikan RPJMDes
                            </div>
                            <div class="col-sm-auto">
                                <input id="pelantikan_rpjmdes" type="date" name="pelantikan_rpjmdes" class="form-control form-control-sm"
                                    value="{{old('pelantikan_rpjmdes')}} ">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-3">
                                Penetapan RPJMDes
                            </div>
                            <div class="col-sm-auto">
                                <input id="penetapan_rpjmdes" type="date" name="penetapan_rpjmdes" class="form-control form-control-sm"
                                    value="{{old('penetapan_rpjmdes')}} ">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-3">
                                No. Perdes RPJMDes
                            </div>
                            <div class="col-sm-5">
                                <input id="no_rpjmdes" type="text" name="no_rpjmdes" placeholder="No. Perdes RPJMDes"
                                    class="form-control form-control-sm" value="{{old('no_rpjmdes')}}">
                            </div>
                        </div>
                        </br>
                        <div class="row">
                            <div class="col-sm-3">
                                Perencanaan RKPDes
                            </div>
                            <div class="col-sm-auto">
                                <input id="perencanaan_rkpdes" type="date" name="perencanaan_rkpdes" class="form-control form-control-sm"
                                    value="{{old('perencanaan_rkpdes')}} ">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-3">
                                Penetapan RKPDes
                            </div>
                            <div class="col-sm-auto">
                                <input id="penetapan_rkpdes" type="date" name="penetapan_rkpdes" class="form-control form-control-sm"
                                    value="{{old('penetapan_rkpdes')}} ">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-3">
                                No. Perdes RKPDes
                            </div>
                            <div class="col-sm-5">
                                <input id="no_rkpdes" type="text" name="no_rkpdes" placeholder="No. Perdes RKPDes"
                                    class="form-control form-control-sm" value="{{old('no_rkpdes')}}">
                            </div>
                        </div>
                        </br>
                        <div class="row">
                            <div class="col-sm-3">
                                Penetapan APBDes
                            </div>
                            <div class="col-sm-auto">
                                <input id="penetapan_apbdes" type="date" name="penetapan_apbdes" class="form-control form-control-sm"
                                    value="{{old('penetapan_apbdes')}} ">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-3">
                                No. Perdes APBDes
                            </div>
                            <div class="col-sm-5">
                                <input id="no_apbdes" type="text" name="no_apbdes" placeholder="No. Perdes APBDes"
                                    class="form-control form-control-sm" value="{{old('no_apbdes')}}">
                            </div>
                        </div>
                        </br>
                        <div class="row">
                            <div class="col-sm-3">
                                Alokasi DD
                            </div>
                            <div class="col-sm-5">
                                <input id="alokasidd" type="number" name="alokasidd" placeholder="Alokasi DD"
                                    class="form-control form-control-sm" value="{{old('alokasidd')}}">
                            </div>
                        </div>
                        </br>
                        <div class="row">
                            <div class="col-sm-3">
                                Alokasi ADD
                            </div>
                            <div class="col-sm-5">
                                <input id="alokasiadd" type="number" name="alokasiadd" placeholder="Alokasi ADD"
                                    class="form-control form-control-sm" value="{{old('alokasiadd')}}">
                            </div>
                        </div>
                        </br>
                        <div class="row">
                            <div class="col-sm-3">
                                Alokasi DBHPRD
                            </div>
                            <div class="col-sm-5">
                                <input id="alokasidbhprd" type="number" name="alokasidbhprd" placeholder="Alokasi DBHPRD"
                                    class="form-control form-control-sm" value="{{old('alokasidbhprd')}}">
                            </div>
                        </div>
                        </br>
                        <div class="row">
                            <div class="col-sm-3">
                                Bantuan Keuangan Kabupaten
                            </div>
                            <div class="col-sm-5">
                                <input id="bankeu_kab" type="number" name="bankeu_kab" placeholder="Bantuan Keuangan Kabupaten"
                                    class="form-control form-control-sm" value="{{old('bankeu_kab')}}">
                            </div>
                        </div>
                        </br>
                        <div class="row">
                            <div class="col-sm-3">
                                Bantuan Keuangan Provinsi
                            </div>
                            <div class="col-sm-5">
                                <input id="bankeu_prov" type="number" name="bankeu_prov" placeholder="Bantuan Keuangan Provinsi"
                                    class="form-control form-control-sm" value="{{old('bankeu_prov')}}">
                            </div>
                        </div>
                        </br>
                        <div class="row">
                            <div class="col-sm-3">
                                DLL
                            </div>
                            <div class="col-sm-5">
                                <input id="dll" type="number" name="dll" placeholder="DLL"
                                    class="form-control form-control-sm" value="{{old('dll')}}">
                            </div>
                        </div>
                        </br>
                        <div class="row">
                            <div class="col-sm-3">
                                Total
                            </div>
                            <div class="col-sm-5">
                                <input id="total" type="number" name="total" placeholder="Total"
                                    class="form-control form-control-sm" value="{{old('total')}}">
                            </div>
                        </div>
                        </br>
                        <div class="row">
                            <div class="col-sm-3">
                            </div>



                            <div class="col-sm-4">

                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
@push('after-script')
<!-- select2 di create borrow -->
<script>
    $(document).ready(function () {
        $('#select2').select2({
            placeholder: 'Pilih Desa',
            // allowClear: true,
        });
    });

</script>
@endpush
