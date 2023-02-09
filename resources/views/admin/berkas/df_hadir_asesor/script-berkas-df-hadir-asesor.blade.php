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

  $("#addRowPanitia").click(function() {
    console.log('ok');
    renderRowPanitia();
  });

  function removeRowPanitia(btnName) {
    try {
      let table = document.getElementById('tableDFHadirAsesorPanitia');
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
            if (j % 2 === 0) {
              rowJ.cells[3].style = 'padding-left: 50px';
            } else {
              rowJ.cells[3].style = '';
            }
            rowJ.cells[3].innerHTML = j;
          }
        }
      }
    } catch (e) {
      alert(e);
    }
  }

  let renderRowPanitia = () => {
    let table = document.getElementById('tableDFHadirAsesorPanitia');


    let rowCount = table.rows.length - 1;
    let row = table.insertRow(rowCount);

    let cell1 = row.insertCell(0);
    cell1.className = 'text-center';
    cell1.innerHTML = rowCount + '.';


    let cell2 = row.insertCell(1);
    let element1 = document.createElement("input");
    element1.className = 'form-control mb-2';
    element1.type = "text";
    element1.name = 'nama_nip[]';
    element1.placeholder = 'Masukkan nama';
    let element1_1 = document.createElement("input");
    element1_1.className = 'form-control';
    element1_1.type = "number";
    element1_1.name = 'nip[]';
    element1_1.placeholder = 'Masukkan nip';
    cell2.appendChild(element1);
    cell2.appendChild(element1_1);


    let cell3 = row.insertCell(2);
    let element2 = document.createElement("input");
    element2.className = 'form-control';
    element2.name = "jabatan_nip[]";
    cell3.appendChild(element2);

    let cell4 = row.insertCell(3);
    if (rowCount % 2 === 0) {
      cell4.style = 'padding-left: 50px';
    }
    cell4.innerHTML = rowCount;

    let cell5 = row.insertCell(4);
    let element4 = document.createElement("button");
    element4.className = 'border-0 bg-transparent text-danger text-center w-100';
    element4.innerHTML = 'X'
    element4.type = "button";
    element4.name = "button" + (rowCount + 1);
    element4.onclick = function() {
      removeRowPanitia("button" + (rowCount + 1))
    };
    cell5.appendChild(element4);
  }

  $("#addRow").click(function() {
    renderRow();
  });

  function removeRow(btnName) {
    try {
      let table = document.getElementById('tableDFHadirAsesorPleno');
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
    let table = document.getElementById('tableDFHadirAsesorPleno');


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
    element2.name = "no_reg_met[]";
    cell3.appendChild(element2);

    let cell4 = row.insertCell(3);
    let element3 = document.createElement("input");
    element3.className = 'form-control';
    element3.name = "jabatan[]";
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

  //   yearpicker

  $('.yearpicker').yearpicker({
    onChange: function(value) {
      if (value != null) {
        $('#thn_ajaran_df_hadir_asesor_2').text(value + 1);
        $('#thn_ajaran_df_hadir_asesor_3').text(value);
        $('#thn_ajaran_df_hadir_asesor_4').text(value + 1);
      } else {
        $('#thn_ajaran_df_hadir_asesor_2').text('-');
        $('#thn_ajaran_df_hadir_asesor_3').text('-');
        $('#thn_ajaran_df_hadir_asesor_4').text('-');
      }
    }
  });
</script>
