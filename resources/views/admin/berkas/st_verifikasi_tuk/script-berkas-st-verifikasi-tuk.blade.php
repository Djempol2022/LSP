<script>
  //   tempat uji
  let tempat_uji_1 = document.getElementById('tempat_uji_1');
  let tempat_uji_2 = document.getElementById('tempat_uji_2');
  let tempat_uji_3 = document.getElementById('tempat_uji_3');

  tempat_uji_2.innerHTML = tempat_uji_1.value;
  tempat_uji_3.innerHTML = tempat_uji_1.value;

  function inputAutoTempatUji() {
    tempat_uji_2.innerHTML = tempat_uji_1.value;
    tempat_uji_3.innerHTML = tempat_uji_1.value;
  }

  //   skema_sertifikasi
  let skema_sertifikasi_1 = document.getElementById('skema_sertifikasi_1');
  let skema_sertifikasi_2 = document.getElementById('skema_sertifikasi_2');

  skema_sertifikasi_2.innerHTML = skema_sertifikasi_1.options[skema_sertifikasi_1.selectedIndex].text;

  function inputAutoSkemaSertifikasi() {
    skema_sertifikasi_2.innerHTML = skema_sertifikasi_1.options[skema_sertifikasi_1.selectedIndex].text;
  }

  //   tanggal_dilaksanakan
  let tanggal_dilaksanakan_1 = document.getElementById('tanggal_dilaksanakan_1');
  let tanggal_dilaksanakan_2 = document.getElementById('tanggal_dilaksanakan_2');

  function inputAutoTanggal() {
    const date = new Date(tanggal_dilaksanakan_1.value);
    let tanggal = new Intl.DateTimeFormat('id', {
      year: "numeric",
      month: "long",
      day: "2-digit"
    }).format(date).split(" ").join(" ");
    tanggal_dilaksanakan_2.textContent = tanggal;
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
    $("#addRow").click(function() {
      renderRow();
    });

    function removeRow(btnName) {
      try {
        let table = document.getElementById('tableSTVerifikasiTUK');
        let rowCount = table.rows.length - 1;
        for (let i = 1; i < rowCount; i++) {
          let row = table.rows[i];
          let rowObj = row.cells[3].childNodes[0];
          if (rowObj.name == btnName) {
            table.deleteRow(i);
            rowCount--;
            for (let j = 1; j < rowCount; j++) {
              let rowJ = table.rows[j];
              rowJ.cells[0].innerHTML = j + '.';
              rowJ.cells[3].childNodes[0].name = 'button' + (j + 1);
            }
          }
        }
      } catch (e) {
        alert(e);
      }
    }

    let renderRow = () => {
      let table = document.getElementById('tableSTVerifikasiTUK');


      let rowCount = table.rows.length - 1;
      let row = table.insertRow(rowCount);

      let cell1 = row.insertCell(0);
      cell1.className = 'text-center';
      cell1.innerHTML = rowCount + '.';


      let cell2 = row.insertCell(1);
      let element1 = document.createElement("input");
      element1.className = 'form-control';
      element1.type = "text";
      element1.name = 'nama[]';
      cell2.appendChild(element1);


      let cell3 = row.insertCell(2);
      let element2 = document.createElement("input");
      element2.className = 'form-control';
      element2.name = "jabatan[]";
      cell3.appendChild(element2);

      let cell4 = row.insertCell(3);
      cell4.className = 'text-center';
      let element3 = document.createElement("button");
      element3.className = 'border-0 bg-transparent text-danger';
      element3.innerHTML = 'X'
      element3.type = "button";
      element3.name = "button" + (rowCount + 1);
      element3.onclick = function() {
        removeRow("button" + (rowCount + 1))
      };
      cell4.appendChild(element3);
    }

  });
</script>
