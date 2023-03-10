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
<script src="/js/moment.js"></script>
{{-- <script src="/js/dataTables.responsive.min.js"></script> --}}

{{-- yearpicker --}}
<script src="{{ asset('js/yearpicker.js') }}"></script>

@yield('script')
@stack('script')
<script>
  $(document).ready(function() {
    $('#table1').DataTable({
      drawCallback: function() {
        $('.js-example-basic-single').select2({
          theme: 'bootstrap-5'
        })
      }
    });
  });
</script>

<script>
  $(document).ready(function() {
    $('.js-example-basic-single').select2({
      theme: 'bootstrap-5',
    });
  });
</script>
{{-- TTD --}}
<script src="/extensions/signature-pad/dist/signature_pad.umd.js"></script>
{{-- TTD --}}
{{-- <script src="/js/ttd_app.js"></script> --}}
{{-- TTD --}}
{{-- <script type="text/javascript">
  var wrapper = document.getElementById("signature-pad");
  // var clear = document.getElementById("signature-clear");
  // var clearButton = clear.querySelector("[data-action=clear]");
  // var undoButton = wrapper.querySelector("[data-action=undo]");
  // var savePNGButton = wrapper.querySelector("[data-action=save-png]");
  var canvas = wrapper.querySelector("canvas");
  var signaturePad = new SignaturePad(canvas, {
    backgroundColor: 'rgb(255, 255, 255)'
  });

  function resizeCanvas() {
    var ratio = Math.max(window.devicePixelRatio || 1, 1);
    canvas.width = canvas.offsetWidth * ratio;
    canvas.height = canvas.offsetHeight * ratio;
    var w = window.innerWidth;
    if (canvas.width == 0 && canvas.height == 0) {
      if (w > 1200) {
        canvas.width = 496 * ratio;
        canvas.height = 200 * ratio;
      } else if (w < 1200 && w > 992) {
        canvas.width = 334 * ratio;
        canvas.height = 200 * ratio;
      } else if (w < 992) {
        canvas.width = 399 * ratio;
        canvas.height = 200 * ratio;
      }
    } else {
      canvas.width = canvas.offsetWidth * ratio;
      canvas.height = canvas.offsetHeight * ratio;
    }
    canvas.getContext("2d").scale(ratio, ratio);
    signaturePad.clear();
  }
  window.addEventListener("resize", resizeCanvas)
  resizeCanvas()

  //   clearButton.addEventListener("click", function(event) {
  //     signaturePad.clear();
  //   });
</script> --}}

{{-- <script>
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
</script> --}}
{{--
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
    }); --}}

{{-- </script> --}}
{{-- COUNTDOWN --}}
{{-- <script>
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
</script> --}}
