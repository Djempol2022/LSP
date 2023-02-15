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
      element3.name = "penanggung_jawab[]";
      cell4.appendChild(element3);

      let cell5 = row.insertCell(4);
      let element4 = document.createElement("button");
      element4.className = 'border-0 bg-transparent text-danger';
      element4.innerHTML = 'X'
      element4.type = "button";
      element4.name = "button" + (rowCount + 1);
      element4.onclick = function() {
        removeRow("button" + (rowCount + 1))
      };
      cell5.appendChild(element4);
    }


  });
</script>
