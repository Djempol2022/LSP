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

  //   TTD Asesor
  let canvas_asesor;
  let signaturePad_asesor;

  function setupSignatureBoxAsesor() {
    canvas_asesor = document.getElementById('sig-asesor');
    signaturePad_asesor = new SignaturePad(canvas_asesor);

    var ratio = Math.max(window.devicePixelRatio || 1, 1);

    canvas_asesor.width = canvas_asesor.offsetWidth * ratio;
    canvas_asesor.height = canvas_asesor.offsetHeight * ratio;
    var w = window.innerWidth;
    if (canvas_asesor.width == 0 && canvas_asesor.height == 0) {
      if (w > 1200) {
        canvas_asesor.width = 496 * ratio;
        canvas_asesor.height = 200 * ratio;
      } else if (w < 1200 && w > 992) {
        canvas_asesor.width = 334 * ratio;
        canvas_asesor.height = 200 * ratio;
      } else if (w < 992) {
        canvas_asesor.width = 399 * ratio;
        canvas_asesor.height = 200 * ratio;
      }
    } else {
      canvas_asesor.width = canvas_asesor.offsetWidth * ratio;
      canvas_asesor.height = canvas_asesor.offsetHeight * ratio;
    }
    canvas_asesor.getContext("2d").scale(ratio, ratio);
    signaturePad_asesor.clear();
  }

  function clearAsesor() {
    signaturePad_asesor.clear();
  }

  function sentToControllerAsesor() {
    let ttdDataAsesor = signaturePad_asesor.toDataURL();
    document.getElementById('ttd-asesor').value = ttdDataAsesor;
  }

  document.getElementById('clear-asesor').addEventListener("click", clearAsesor);
  document.getElementById('simpan').addEventListener("click", sentToControllerAsesor);
  document.addEventListener("DOMContentLoaded", setupSignatureBoxAsesor);


  $(document).ready(function() {
    $("#addRow").click(function() {
      renderRow();

      $('.nama_asesi').select2();
    });

    function removeRow(btnName) {
      try {
        let table = document.getElementById('dfHadirAsesi');
        let rowCount = table.rows.length - 1;
        for (let i = 1; i < rowCount; i++) {
          let row = table.rows[i];
          let rowObj = row.cells[5].childNodes[0];
          if (rowObj.name == btnName) {
            table.deleteRow(i);
            rowCount--;
            for (let j = 1; j < rowCount; j++) {
              let rowJ = table.rows[j];
              rowJ.cells[0].innerHTML = j + '.';
              if (j % 2 === 0) {
                rowJ.cells[4].style = 'padding-left: 50px';
              } else {
                rowJ.cells[4].style = '';
              }
              rowJ.cells[4].innerHTML = j;
            }
          }
        }
      } catch (e) {
        alert(e);
      }
    }

    let renderRow = () => {
      let nama_asesi = @json($nama_asesi);

      let table = document.getElementById('dfHadirAsesi');


      let rowCount = table.rows.length - 1;
      let row = table.insertRow(rowCount);

      let cell1 = row.insertCell(0);
      cell1.className = 'text-center';
      cell1.innerHTML = rowCount + '.';


      let cell2 = row.insertCell(1);
      let element1 = document.createElement("input");
      element1.className = 'form-control';
      element1.type = "text";
      element1.name = 'no_peserta[]';
      cell2.appendChild(element1);


      let cell3 = row.insertCell(2);
      let element2 = document.createElement("select");
      element2.className = 'form-select nama_asesi';
      element2.name = "nama_asesi[]";

      let option = document.createElement("option");
      option.value = '';
      option.text = 'Pilih Asesi';
      element2.appendChild(option);

      nama_asesi.forEach((item, index) => {
        let option = document.createElement("option");
        option.value = item.id;
        option.text = item.nama_lengkap;
        element2.appendChild(option);
      });

      cell3.appendChild(element2);

      let cell4 = row.insertCell(3);
      let element3 = document.createElement("input");
      element3.className = 'form-control';
      element3.name = "asal_sekolah[]";
      cell4.appendChild(element3);

      let cell5 = row.insertCell(4);
      if (rowCount % 2 === 0) {
        cell5.style = 'padding-left: 50px';
      }
      cell5.innerHTML = rowCount;

      let cell6 = row.insertCell(5);
      let element5 = document.createElement("button");
      element5.className = 'border-0 bg-transparent text-danger text-center w-100';
      element5.innerHTML = 'X'
      element5.type = "button";
      element5.name = "button" + (rowCount + 1);
      element5.onclick = function() {
        removeRow("button" + (rowCount + 1))
      };
      cell6.appendChild(element5);
    }
  });
</script>
