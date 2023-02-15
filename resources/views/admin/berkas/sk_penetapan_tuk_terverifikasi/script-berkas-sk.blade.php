<script>
  //   nomor_sk
  let no_sk_1 = document.getElementById('no_sk_1');
  let no_sk_2 = document.getElementById('no_sk_2');

  no_sk_2.value = no_sk_1.value;

  function inputAutoNoSK(data) {
    if (data === 'no_sk_1') {
      no_sk_2.value = no_sk_1.value;
    } else {
      no_sk_1.value = no_sk_2.value;
    }
  }

  //   ditetapkan di?
  let tempat_1 = document.getElementById('tempat_1');
  let tempat_2 = document.getElementById('tempat_2');

  tempat_2.value = tempat_1.value;

  function inputAutoTempat(data) {
    if (data === 'tempat_1') {
      tempat_2.value = tempat_1.value;
    } else {
      tempat_1.value = tempat_2.value;
    }
  }

  //   tanggal
  let tanggal_1 = document.getElementById('tanggal_1');
  let tanggal_2 = document.getElementById('tanggal_2');
  let tanggal_3 = document.getElementById('tanggal_3');

  tanggal_2.value = tanggal_1.value;
  tanggal_3.value = tanggal_1.value;

  function inputAutoTanggal(data) {
    if (data === 'tanggal_1') {
      tanggal_2.value = tanggal_1.value;
      tanggal_3.value = tanggal_1.value;
    } else if (data === 'tanggal_2') {
      tanggal_1.value = tanggal_2.value;
      tanggal_3.value = tanggal_2.value;
    } else {
      tanggal_1.value = tanggal_3.value;
      tanggal_2.value = tanggal_3.value;
    }
  }

  //   jabatan
  let jabatan_1 = document.getElementById('jabatan_1');
  let jabatan_2 = document.getElementById('jabatan_2');

  jabatan_2.value = jabatan_1.value;

  function inputAutoJabatan(data) {
    if (data === 'jabatan_1') {
      jabatan_2.value = jabatan_1.value;
    } else {
      jabatan_1.value = jabatan_2.value;
    }
  }

  //   nama
  let nama_1 = document.getElementById('nama_1');
  let nama_2 = document.getElementById('nama_2');

  nama_2.value = nama_1.value;

  function inputAutoNama(data) {
    if (data === 'nama_1') {
      nama_2.value = nama_1.value;
    } else {
      nama_1.value = nama_2.value;
    }
  }

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

  $(document).ready(function() {
    let nama_tuk = @json($nama_tuk);
    let skema_sertifikasi = @json($skema_sertifikasi);
    // add table row
    $("#addRow").click(function() {
      renderRow();
    })

    function removeRow(btnName) {
      try {
        let table = document.getElementById('tableTUK');
        let rowCount = table.rows.length - 1;
        for (let i = 1; i < rowCount; i++) {
          let row = table.rows[i];
          let rowObj = row.cells[4].childNodes[0];
          if (rowObj.name == btnName) {
            table.deleteRow(i);
            rowCount--;
            for (let j = 1; j < rowCount; j++) {
              let rowJ = table.rows[j];
              rowJ.cells[0].innerHTML = j + '.';
            }
          }
        }
      } catch (e) {
        alert(e);
      }
    }



    let renderRow = () => {
      let table = document.getElementById('tableTUK');


      let rowCount = table.rows.length - 1;
      let row = table.insertRow(rowCount);

      let cell1 = row.insertCell(0);
      cell1.innerHTML = rowCount + '.';


      let cell2 = row.insertCell(1);
      //   select
      let sel = document.createElement("select");
      sel.className = 'form-select';
      sel.name = 'nama_tuk[]';

      nama_tuk.map(function(value) {
        let opt = document.createElement("option");
        opt.setAttribute('value', value.id)

        let optText = document.createTextNode(value.nama_tuk);
        opt.appendChild(optText);

        sel.appendChild(opt);
      });
      cell2.appendChild(sel);


      let cell3 = row.insertCell(2);
      let sel2 = document.createElement("select");
      sel2.className = 'form-select';
      sel2.name = "nama_skema_sertifikasi[]";
      cell3.appendChild(sel2);

      skema_sertifikasi.map(function(value) {
        let opt2 = document.createElement("option");
        opt2.setAttribute('value', value.id)

        let optText2 = document.createTextNode(value.judul_skema_sertifikasi);
        opt2.appendChild(optText2);

        sel2.appendChild(opt2);
      });
      cell3.appendChild(sel2);

      let cell4 = row.insertCell(3);
      let element3 = document.createElement("input");
      element3.className = 'form-control';
      element3.type = "text";
      element3.name = "tempat[]";
      cell4.appendChild(element3);

      let cell5 = row.insertCell(4);
      cell5.className = 'text-center';
      let element4 = document.createElement("button");
      element4.className = 'border-0 bg-transparent text-danger';
      element4.innerHTML = 'X';
      element4.dataToggle = 'modal';
      element4.type = "button";
      element4.name = "button" + (rowCount + 1);
      element4.onclick = function() {
        removeRow("button" + (rowCount + 1))
      };
      cell5.appendChild(element4);
    }


  });
</script>
