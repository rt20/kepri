<!-- jQuery -->
<script src="{{ asset('dist/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('dist/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}" defer></script>


<!-- datatables -->

<script src="{{ asset('dist/plugins/datatables-buttons/js/buttons.html5.min.js') }}"> </script>
<script src="{{ asset('dist/plugins/datatables-buttons/js/buttons.print.min.js') }}"> </script>
<script src="{{ asset('js/jszip.min.js')}}"> </script>
<script src="{{ asset('js/pdfmake.min.js')}}"> </script>
<script src="{{ asset('js/vfs_fonts.js')}}"> </script>
 
<script type="text/javascript" language="javascript" src="{{ asset('js/jquery/jquery-3.5.1.js')}}"></script>
<script type="text/javascript" language="javascript"
    src="{{ asset('dist/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" language="javascript"
    src="{{ asset('dist/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

<!-- datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>

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
            $('#refresh').click(function () {
                $('#from_date').val('');
                $('#to_date').val('');
                $('#schedule').DataTable().destroy();
                load_data();
            });
            $('#bersih').click(function () {
                $('#date').val('');
                $('#time').val('');
                $('#date_end').val('');
                $('#time_end').val('');
                $('#agenda').val('');
                $('#organizer').val('');
                $('#location').val('');
                $('#link').val('');
                $('#note').val('');
                $('#attachment').val('');
                $('#participant').val('');
                $('#participant').val('');
            });
            //LOAD DATATABLE
            //script untuk memanggil data json dari server dan menampilkannya berupa datatable
            //load data menggunakan parameter tanggal dari dan tanggal hingga
            function load_data(from_date = '', to_date = '') {
                $('#schedule').DataTable({
                    processing: true,
                    serverSide: true, //aktifkan server-side 
                    ajax: {
                        url: "{{ route('schedules.index') }}",
                        // url: "https://jadwal.balok.id/schedules", 
                        type: 'GET',
                        data:{from_date:from_date, to_date:to_date} //jangan lupa kirim parameter tanggal 
                    },
                    columns: [{
                            data: 'date_start',
                            name: 'date_start'
                        },
                        {
                            data: 'time_start',
                            name: 'time_start'
                        },
                        {
                            data: 'date_end',
                            name: 'date_end'
                        },
                        {
                            data: 'time_end',
                            name: 'time_end'
                        },
                        {
                            data: 'agenda',
                            name: 'agenda'
                        },
                        {
                            data: 'organizer',
                            name: 'organizer'
                        },
                        {
                            data: 'location',
                            name: 'location'
                        },
                        {
                            data: 'link',
                            name: 'link',
                            render: function ( data, type, row, meta ) {

                                if (data == null) {
                                        return '';
                                        }
                                    else {
                                        return '<a href='+ data +'><i class="fa fa-link"></i></a>';
                                        }


                                // return '<a href="'+data+'" target="_blank">'+data+'</a>';
                            }
                        },
                        {
                            data: 'participant',
                            name: 'participant'
                        },
                        {
                            data: 'attachment',
                            name: 'attachment',
                            render: function ( data, type, row, meta ) {
                                if (data == null) {
                                        return '';
                                        }
                                    else {
                                        return '<a href='+ data +'><i class="fa fa-download"></i></a>';
                                        }


                                // return '<a href="'+data+'" target="_blank">'+data+'</a>';
                            }
                        },
                        {
                            data: 'note',
                            name: 'note'
                        },
                       
                    ],
                    order: [
                        [0, 'asc']
                    ]
                });
            }
        });
        </script>
        
<!-- select2 -->
<script src="{{ asset('dist/plugins/select2/js/select2.min.js') }}"></script>
<!-- select2 di create borrow -->
<script>
    $(document).ready(function () {
        $('#select2').select2({
            placeholder: 'Pilih Barang',
            allowClear: true,
        });
    });
</script>
<!-- waktu mulai kurang dari waktu akhir -->
<script>
    $("#my_form").submit(function () {
        var startTime = $("#start").val();
        var endTime = $("#end").val();
        if (Date.parse(startTime) > Date.parse(endTime)) {
            $("#error_container").show();
            $("#error_container").text("Start Date should be greater the end time");
            return false;
        } else {
            return true;
        }

        return false;
    })
</script>
<!-- map api google  -->

<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCWd7tSEONvnnq9uzd9etwxkpy7-tgn6jI&callback=initMap"></script>
<script>
    // variabel global marker
    var marker;

    function taruhMarker(peta, posisiTitik) {

        if (marker) {
            // pindahkan marker
            marker.setPosition(posisiTitik);
        } else {
            // buat marker baru
            marker = new google.maps.Marker({
                position: posisiTitik,
                map: peta
            });
        }
        console.log("Posisi marker: " + posisiTitik);
        // isi nilai koordinat ke form
        document.getElementById("lat").value = posisiTitik.lat();
        document.getElementById("lng").value = posisiTitik.lng();

    }

    function initialize() {
        var propertiPeta = {
            center: new google.maps.LatLng(-7.9023286,110.2925648),
            zoom: 10,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

        // even listner ketika peta diklik
        google.maps.event.addListener(peta, 'click', function (event) {
            taruhMarker(this, event.latLng);
        });

    }


    // event jendela di-load  
    google.maps.event.addDomListener(window, 'load', initialize);
</script>


