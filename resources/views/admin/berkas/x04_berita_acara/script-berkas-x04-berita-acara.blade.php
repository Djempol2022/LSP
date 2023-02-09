<script>
  //   TTD
  let canvas;
  let signaturePad;

  function setupSignatureBox() {
    canvas = document.getElementById('sig');
    signaturePad = new SignaturePad(canvas);

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

  function clear() {
    signaturePad.clear();
  }

  function sentToController() {
    let ttdData = signaturePad.toDataURL();
    document.getElementById('ttd').value = ttdData;
  }

  document.getElementById('clear').addEventListener("click", clear);
  document.getElementById('simpan').addEventListener("click", sentToController);
  document.addEventListener("DOMContentLoaded", setupSignatureBox);


  //   jurusan & skema sertifikasi
  let jurusan_data = @json($jurusans);
  let skema_sertifikasi_data = @json($skema_sertifikasi);
  let jurusan = $("#jurusan");
  let skema_sertifikasi = $("#skema_sertifikasi");

  jurusan.html(jurusan_data.map(function(d) {
    return $(`
        <option value='${d.id}' ${1 == d.relasi_skema_sertifikasi.jurusan_id ? 'selected' : ''}>${d.jurusan}</option>
    `)
  }));

  skema_sertifikasi.html(skema_sertifikasi_data.map(function(d) {
    return $(`
        <option value='${d.id}' ${1 == d.jurusan_id ? 'selected' : ''}>${d.judul_skema_sertifikasi}</option>
    `)
  }));

  function selectAuto(e, type) {
    let opts = [],
      opt;
    let len = e.options.length;
    for (let i = 0; i < len; i++) {
      opt = e.options[i];

      if (opt.selected) {
        opts.push(opt);
        if (type === 'jurusan') {
          skema_sertifikasi.html(skema_sertifikasi_data.map(function(d) {
            return $(`
            <option value='${d.id}' ${opt.value == d.jurusan_id ? 'selected' : ''}>${d.judul_skema_sertifikasi}</option>
        `)
          }));
        } else {
          jurusan.html(jurusan_data.map(function(d) {
            return $(`
            <option value='${d.id}' ${opt.value == d.relasi_skema_sertifikasi.id ? 'selected' : ''}>${d.jurusan}</option>
        `)
          }));
        }
      }
    }

    return opts;
  }
</script>
