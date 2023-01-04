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

    // Adjust canvas coordinate space taking into account pixel ratio,
    // to make it look crisp on mobile devices.
    // This also causes canvas to be cleared.
    function resizeCanvas() {
        // When zoomed out to less than 100%, for some very strange reason,
        // some browsers report devicePixelRatio as less than 1
        // and only part of the canvas is cleared then.
        var ratio = Math.max(window.devicePixelRatio || 1, 1);

        // This part causes the canvas to be cleared
        canvas.width = canvas.offsetWidth * ratio;
        canvas.height = canvas.offsetHeight * ratio;
        canvas.getContext("2d").scale(ratio, ratio);

        // This library does not listen for canvas changes, so after the canvas is automatically
        // cleared by the browser, SignaturePad#isEmpty might still return false, even though the
        // canvas looks empty, because the internal data of this library wasn't cleared. To make sure
        // that the state of this library is consistent with visual state of the canvas, you
        // have to clear it manually.
        signaturePad.clear();
    }

    // On mobile devices it might make more sense to listen to orientation change,
    // rather than window resize events.
    window.onresize = resizeCanvas;
    resizeCanvas();



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
