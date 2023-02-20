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

  //   tgl_tes_tertulis
  let tgl_tes_tertulis_1 = document.getElementById('tgl_tes_tertulis_1');
  let tgl_tes_tertulis_2 = document.getElementById('tgl_tes_tertulis_2');

  tgl_tes_tertulis_2.innerHTML = '-';

  function inputAutoTglTesTertulis() {
    let date_tgl_tes_tertulis = date_format(tgl_tes_tertulis_1.value, false);
    tgl_tes_tertulis_2.innerHTML = date_tgl_tes_tertulis;
  }

  //   tgl_tes_praktek
  let tgl_tes_praktek_1 = document.getElementById('tgl_tes_praktek_1');
  let tgl_tes_praktek_2 = document.getElementById('tgl_tes_praktek_2');

  tgl_tes_praktek_2.innerHTML = '-';

  function inputAutoTglTesPraktek() {
    let date_tgl_tes_praktek = date_format(tgl_tes_praktek_1.value);
    tgl_tes_praktek_2.innerHTML = date_tgl_tes_praktek;
  }

  //   jabatan_bttd
  let jabatan_bttd_1 = document.getElementById('jabatan_bttd_1');
  let jabatan_bttd_2 = document.getElementById('jabatan_bttd_2');

  jabatan_bttd_2.innerHTML = jabatan_bttd_1.value;

  function inputAutoJabatan() {
    jabatan_bttd_2.innerHTML = jabatan_bttd_1.value;
  }

  //   nama_bttd
  let nama_bttd_1 = document.getElementById('nama_bttd_1');
  let nama_bttd_2 = document.getElementById('nama_bttd_2');

  nama_bttd_2.innerHTML = nama_bttd_1.value;

  function inputAutoNamaBttd() {
    nama_bttd_2.innerHTML = nama_bttd_1.value;
  }

  //   no_met_bttd
  let no_met_bttd_1 = document.getElementById('no_met_bttd_1');
  let no_met_bttd_2 = document.getElementById('no_met_bttd_2');

  no_met_bttd_2.innerHTML = no_met_bttd_1.value;

  function inputAutoNoMetBttd() {
    no_met_bttd_2.innerHTML = no_met_bttd_1.value;
  }

  //   notulis
  let notulis_1 = document.getElementById('notulis_1');
  let notulis_2 = document.getElementById('notulis_2');

  notulis_2.innerHTML = notulis_1.value;

  function inputAutoNotulis() {
    notulis_2.innerHTML = notulis_1.value;
  }

  $('#addBahasanDiskusi').click(function(e) {
    e.preventDefault();
    if ($('#bahasan_diskusi')[0].children.length < 15) {
      let element_1 = document.createElement('input');
      element_1.type = 'text';
      element_1.name = 'bahasan_diskusi[]';
      element_1.className = 'form-control w-40 mt-2';
      element_1.required = true;
      document.getElementById('bahasan_diskusi').appendChild(element_1);
    }
  });

  $('#removeBahasanDiskusi').click(function(e) {
    e.preventDefault();
    if ($('#bahasan_diskusi')[0].children.length > 1) {
      $('#bahasan_diskusi').children().last().remove();
    }
  });

  $("#addRow").click(function() {
    renderRow();
  });

  function removeRow(btnName) {
    try {
      let table = document.getElementById('tableZBARP');
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
    let table = document.getElementById('tableZBARP');


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
    let element3 = document.createElement("input");
    element3.className = 'form-control';
    element3.name = "jml_asesi[]";
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

  function date_format(value, format = true) {
    const date = new Date(value);
    let result;
    if (format === true) {
      result = new Intl.DateTimeFormat('id', {
        year: "numeric",
        month: "long",
        day: "2-digit"
      }).format(date).split(" ").join(" ");
    } else {
      result = new Intl.DateTimeFormat('id', {
        month: "long",
        day: "2-digit"
      }).format(date).split(" ").join(" ");
    }

    return result;
  }
</script>
