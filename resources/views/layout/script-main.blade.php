{{-- JAVASCRIPT BOOTSTRAP --}}
<script src="/js/bootstrap.js"></script>
<script src="/js/app.js"></script>
<script src="/js/sweetalert.min.js"></script>
{{-- AJAX JQUERY --}}
<script src="/extensions/jquery/jquery.min.js"></script>
<script src="/extensions/fontawesome/js/all.min.js"></script>
<script src="/js/jquery.form.min.js"></script>
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/dataTables.bootstrap4.min.js"></script>
<script src="/js/select2.full.min.js"></script>
{{-- <script src="/js/simple-datatables.js"></script> --}}

@yield('script')
<script>
    $(document).ready(function () {
        $('#table1').DataTable({
            drawCallback: function() {
                $('.js-example-basic-single').select2({
                    theme: 'bootstrap-5'
                })
            }}
        );
    });
</script>

<script>
    $(document).ready(function() {
        $( '.js-example-basic-single' ).select2( {
            theme: 'bootstrap-5',
        });
    });
</script>
<script>
    // FUNGSI MEMANGGIL JURUSAN SESUAI YANG DIPILIH
    $(document).ready(function() {
        $('select[name="sekolah_id"]').on('change', function() {
            let sekolahId = $(this).val();
            if (sekolahId) {
                jQuery.ajax({
                    url: 'getJurusan/' + sekolahId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        $('select[name="jurusan_id"]').empty();
                        $('select[name="jurusan_id"]').append(
                            '<option value="" selected disabled>Pilih Jurusan</option>');
                        $.each(response, function(key, value) {
                            $('select[name="jurusan_id"]').append(
                                '<option value="' +
                                key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                $('select[name="kota_id"]').append(
                    '<option value="" disabled selected>Pilih Jurusan</option>');
            }
        });
    });
    
</script>
{{-- COUNTDOWN --}}
<script>
    var hours = 2, // obtain these values somewhere else 
        minutes = 00,
        seconds = 00,
        target = new Date(),
        timerDiv = document.getElementById("timer"),
        handler;
    function init() {
        // set the target date time with the counter values
        // counters more then 24h should have a date setup or it wont work
        target.setHours(hours);
        target.setMinutes(minutes);
        target.setSeconds(seconds);
        target.setMilliseconds(0); // make sure that miliseconds is 0
        timerDiv.innerHTML = target.toTimeString().split(" ")[0]; // print the value
    }
    function updateTimer() {
        var time = target.getTime();
        target.setTime(time - 1000); // subtract 1 second with every thick
        timerDiv.innerHTML = target.toTimeString().split(" ")[0];
        if (
            target.getHours() === 0 &&
            target.getMinutes() === 0 &&
            target.getSeconds() === 0
        ) { // counter should stop
            clearInterval(handler);
        }
    }
    handler = setInterval(updateTimer, 1000);
    init();
</script>
