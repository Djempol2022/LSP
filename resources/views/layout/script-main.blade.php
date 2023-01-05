{{-- JAVASCRIPT BOOTSTRAP --}}
<script src="/js/bootstrap.js"></script>
<script src="/js/app.js"></script>
<script src="/js/sweetalert.js"></script>
{{-- AJAX JQUERY --}}
<script src="/extensions/jquery/jquery.min.js"></script>
{{-- TTD --}}
<script src="/extensions/signature-pad/dist/signature_pad.umd.js"></script>

{{-- TTD --}}
<script type="text/javascript">
    var wrapper = document.getElementById("signature-pad");
    // var clear = document.getElementById("signature-clear");
    // var clearButton = clear.querySelector("[data-action=clear]");
    var undoButton = wrapper.querySelector("[data-action=undo]");
    var savePNGButton = wrapper.querySelector("[data-action=save-png]");
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

    // clearButton.addEventListener("click", function(event) {
    //     signaturePad.clear();
    // });
</script>

{{-- FUNGSI MEMANGGIL JURUSAN SESUAI YANG DIPILIH --}}
<script>
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
