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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWd7tSEONvnnq9uzd9etwxkpy7-tgn6jI&callback=initMap" async
    defer></script>
<script src="http://maps.googleapis.com/maps/api/js"></script>
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

        // isi nilai koordinat ke form
        document.getElementById("lat").value = posisiTitik.lat();
        document.getElementById("lng").value = posisiTitik.lng();

    }

    function initialize() {
        var propertiPeta = {
            center: new google.maps.LatLng(-6.2791059, 106.9236549, 19),
            zoom: 9,
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
