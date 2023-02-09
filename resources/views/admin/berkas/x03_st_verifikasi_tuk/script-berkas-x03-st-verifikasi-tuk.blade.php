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
    $("#addRow").click(function() {
      renderRow();
    });

    function removeRow(btnName) {
      try {
        let table = document.getElementById('tableX03STVerifikasiTUK');
        let rowCount = table.rows.length - 1;
        for (let i = 1; i < rowCount; i++) {
          let row = table.rows[i];
          let rowObj = row.cells[3].childNodes[0];
          if (rowObj.name == btnName) {
            table.deleteRow(i);
            rowCount--;
          }
        }
      } catch (e) {
        alert(e);
      }
    }

    let renderRow = () => {
      let table = document.getElementById('tableX03STVerifikasiTUK');


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
      let element3 = document.createElement("button");
      element3.className = 'border-0 bg-transparent text-danger text-center';
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
