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


  function onlyOneCheckBox(e) {
    $('input[name="' + e.name + '"]').not(e).prop('checked', false);
  }

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


  $(document).ready(function() {
    $("#addRow").click(function() {
      renderRow();
    });

    let arrayRowMain = [];
    let renderRow = () => {
      let table = document.getElementById('tableHasilVerifikasiTUK');


      let rowCount = table.rows.length - 1;
      let row = table.insertRow(rowCount);

      let is_exists = arrayRowMain.includes('rowMain' + rowCount);
      if (!is_exists) {
        arrayRowMain.push('rowMain' + rowCount);
      }

      row.className = 'rowMain' + (arrayRowMain.length + 1);
      let cell1 = row.insertCell(0);
      cell1.innerHTML = arrayRowMain.length + '.';


      let cell2 = row.insertCell(1);
      cell2.className = 'text-center'
      let element1 = document.createElement("input");
      element1.className = 'form-control';
      element1.type = "text";
      element1.name = 'sarana_prasarana[]';
      let element1_1 = document.createElement('button');
      element1_1.className = 'mt-2 border-0 bg-transparent text-primary font-extrabold';
      element1_1.id = 'addRowSub_' + (arrayRowMain.length + 1);
      element1_1.innerHTML = '+';
      element1_1.type = 'button';
      element1_1.onclick = function() {
        renderRowSub(this.id);
      };
      cell2.appendChild(element1);
      cell2.appendChild(element1_1);

      let cell3 = row.insertCell(2);
      let element2 = document.createElement("input");
      element2.className = 'form-check-input status' + rowCount;
      element2.type = "checkbox";
      element2.name = "status[]";
      element2.value = 1;
      element2.onchange = function() {
        $('.' + element2.className.replace(/\s/g, '.')).not(this).prop('checked', false);
      };
      cell3.appendChild(element2);

      let cell4 = row.insertCell(3);
      let element3 = document.createElement("input");
      element3.className = 'form-check-input status' + rowCount;
      element3.type = "checkbox";
      element3.name = "status[]";
      element3.value = 0;
      element3.onchange = function() {
        $('.' + element3.className.replace(/\s/g, '.')).not(this).prop('checked', false);
      };
      cell4.appendChild(element3);

      let cell5 = row.insertCell(4);
      let element4 = document.createElement("input");
      element4.className = 'form-check-input kondisi' + rowCount;
      element4.type = "checkbox";
      element4.name = "kondisi[]";
      element4.value = 1;
      element4.onchange = function() {
        $('.' + element4.className.replace(/\s/g, '.')).not(this).prop('checked', false);
      };
      cell5.appendChild(element4);

      let cell6 = row.insertCell(5);
      let element5 = document.createElement("input");
      element5.className = 'form-check-input kondisi' + rowCount;
      element5.type = "checkbox";
      element5.name = "kondisi[]";
      element5.value = 0;
      element5.onchange = function() {
        $('.' + element5.className.replace(/\s/g, '.')).prop('checked', false);
      };
      cell6.appendChild(element5);

      let cell7 = row.insertCell(6);
      let element6 = document.createElement("button");
      element6.className = 'border-0 bg-transparent text-danger';
      element6.innerHTML = 'X';
      element6.dataToggle = 'modal';
      element6.type = "button";
      element6.id = 'button' + rowCount;
      element6.onclick = function() {
        removeRow(rowCount);
      };
      cell7.appendChild(element6);

    }

    let renderRowSub = (lengthRowMain) => {
      let rowMainString = lengthRowMain.split('_');
      let rowMainCount = parseInt(rowMainString[1]);

      let table = document.getElementById('tableHasilVerifikasiTUK');

      let index_table_array = 0;
      let filtered_table_array = Array.from(table.rows);
      let text_rowSub_rowMain = 'rowSub' + ($('tr.rowMain' + rowMainCount).length - 1) + ' ' + 'rowMain' +
        rowMainCount;
      filtered_table_array.forEach(function(row, i, arr) {
        if (row.className === 'rowMain' + rowMainCount) {
          index_table_array = i;
        }
        if (row.className === text_rowSub_rowMain) {
          index_table_array = i;
        }
      });

      let rowCount = index_table_array + 1;

      let row = table.insertRow(rowCount);
      row.className = 'rowSub' + ($('tr.rowMain' + rowMainCount).length) + ' rowMain' + rowMainCount;

      let cell1 = row.insertCell(0);
      let noMain = $('tr.rowMain' + rowMainCount)[0].firstChild.innerHTML;
      let noSub = $('tr.rowMain' + rowMainCount).length - 1 + '.';
      cell1.innerHTML = noMain + noSub;

      let cell2 = row.insertCell(1);
      cell2.className = 'text-center'
      let element1 = document.createElement("input");
      element1.className = 'form-control';
      element1.type =
        "text";
      element1.name = `sarana_prasarana_sub[${rowMainCount - 2}][${$('tr.rowMain' + rowMainCount).length - 2}]`;
      let element1_1 = document.createElement('button');
      element1_1.className =
        'mt-2 border-0 bg-transparent text-primary font-extrabold';
      element1_1.id = 'addRowSub_2';
      element1_1
        .innerHTML = '+';
      element1_1.type = 'button';
      element1_1.onclick = function() {
        renderRowSub2(noMain, noSub);
      };
      cell2.appendChild(element1);
      cell2.appendChild(element1_1);


      let cell3 = row.insertCell(2);
      let element2 = document.createElement("input");
      element2.className = 'form-check-input status_sub_' + (rowMainCount) + '_' + ($('tr.rowMain' +
        rowMainCount).length);
      element2.type =
        "checkbox";
      element2.name =
        `status_sub[${rowMainCount - 2}][${$('tr.rowMain' + rowMainCount).length - 2}]`;
      element2.value = 1;
      element2.onchange =
        function() {
          $('.' + element2.className.replace(/\s/g, '.')).not(this)
            .prop('checked', false);
        };
      cell3.appendChild(element2);

      let cell4 = row.insertCell(3);
      let element3 = document.createElement("input");
      element3.className = 'form-check-input status_sub_' + (rowMainCount) + '_' + ($('tr.rowMain' +
        rowMainCount).length);
      element3.type =
        "checkbox";
      element3.name =
        `status_sub[${rowMainCount - 2}][${$('tr.rowMain' + rowMainCount).length - 2}]`;
      element3.value = 0;
      element3.onchange =
        function() {
          $('.' + element3.className.replace(/\s/g, '.')).not(this)
            .prop('checked', false);
        };
      cell4.appendChild(element3);

      let cell5 = row.insertCell(4);
      let element4 = document.createElement("input");
      element4.className = 'form-check-input kondisi_sub_' + (rowMainCount) + '_' + ($('tr.rowMain' +
        rowMainCount).length);
      element4.type =
        "checkbox";
      element4.name =
        `kondisi_sub[${rowMainCount - 2}][${$('tr.rowMain' + rowMainCount).length - 2}]`;
      element4.value = 1;
      element4.onchange =
        function() {
          $('.' + element4.className.replace(/\s/g, '.')).not(this)
            .prop('checked', false);
        };
      cell5.appendChild(element4);

      let cell6 = row.insertCell(5);
      let element5 = document.createElement("input");
      element5.className = 'form-check-input kondisi_sub_' + (rowMainCount) + '_' + ($('tr.rowMain' +
        rowMainCount).length);
      element5.type =
        "checkbox";
      element5.name =
        `kondisi_sub[${rowMainCount - 2}][${$('tr.rowMain' + rowMainCount).length - 2}]`;
      element5.value = 0;
      element5.onchange =
        function() {
          $('.' + element5.className.replace(/\s/g, '.')).not(this)
            .prop('checked', false);
        };
      cell6.appendChild(element5);

      let cell7 = row.insertCell(6);
      cell7.innerHTML = '';
      //   let element6 = document.createElement("button");
      //   element6.className = 'border-0 bg-transparent text-danger';
      //   element6.innerHTML = 'X';
      //   element6.dataToggle = 'modal';
      //   element6.type = "button";
      //   element6.name = "button" + (rowCount);
      //   element6.onclick = function() {
      //     removeRowSub("button" + (rowCount))
      //   };
      //   cell7.appendChild(element6);

    }

    let renderRowSub2 = (noMain, noSub) => {
      let rowMainCountString = noMain.split('.');
      let rowMainCount = parseInt(rowMainCountString[0]) + 1;
      let rowSubCountString = noSub.split('.');
      let rowSubCount = parseInt(rowSubCountString[0]);

      let table = document.getElementById('tableHasilVerifikasiTUK');
      let row = $('tr.rowSub' + rowSubCount + '.rowMain' + rowMainCount)[0].childNodes[1];
      let element1 = document.createElement("input");
      element1.className = 'form-control mt-2';
      element1.type = "text";
      element1.name = `sarana_prasarana_sub2[${rowMainCount - 2}][${rowSubCount - 1}][]`;
      row.appendChild(element1);
    }

    // function removeRow(rowMain) {
    //   document.querySelectorAll('.rowMain' + rowMain).forEach((e, i, arr) => {
    //     arr[i].remove();
    //   });

    //   arrayRowMain = [];
    //   let table = document.getElementById('tableHasilVerifikasiTUK');
    //   console.log(table.rows);
    //   let rowCount = table.rows.length - 1;
    //   for (let i = 2; i < rowCount; i++) {
    //     arrayRowMain.push('rowMain' + i);
    //     let row = table.rows[i];
    //     document.querySelectorAll('.rowMain' + i).forEach((e, k, arr) => {
    //       if (arr.length == 1) {
    //         resetTableRow(e, i);
    //       } else {
    //         if (k == 0) {
    //           resetTableRow(e, i);
    //         } else {
    //           resetTableRowSub(e, i)
    //         }
    //       }
    //       //   console.log(e);
    //     });

    //     // if (table.rows[i + 1].className == 'rowSub' + (i + 1) + ' ' + 'rowMain' + (i + 1)) {
    //     //   resetTableRow(row, i);

    //     //   let j = i;
    //     //   while (table.rows[j + 1].className == 'rowSub' + (i + 1) + ' ' + 'rowMain' + (i + 1)) {
    //     //     let rowSub = table.rows[j + 1];
    //     //     rowSub.className = 'rowSub' + i + ' ' + 'rowMain' + i;
    //     //     rowSub.firstChild.innerHTML = (i - 1) + '.' + (j - i + 1) + '.';
    //     //     j++;
    //     //   }
    //     //   k = j;

    //     // } else {
    //     //   resetTableRow(row, i);
    //     // }

    //   }

    //   //   end reset main input after remove
    // }

    function removeRow(rowMain) {
      document.querySelectorAll('.rowMain' + rowMain).forEach((e, i, arr) => {
        arr[i].remove();
      });
    }

    function resetTableRow(row, index) {
      row.firstChild.innerHTML = (index - 1) + '.';
      row.className = 'rowMain' + (index);
      row.cells[1].childNodes[1].id = 'addRowSub_' + (index);
      row.cells[1].childNodes[1].onclick = function() {
        renderRowSub('addRowSub_' + index)
      };
      row.cells[2].childNodes[0].name = 'status[]' + (index);
      row.cells[3].childNodes[0].name = 'status[]' + (index);
      row.cells[4].childNodes[0].name = 'kondisi[]' + (index);
      row.cells[5].childNodes[0].name = 'kondisi[]' + (index);
      row.cells[6].childNodes[0].id = 'button' + (index);
      row.cells[6].childNodes[0].onclick = function() {
        removeRow(index)
      };
    }

    function resetTableRowSub(row, index) {
      //   console.log(row);
      //   console.log(row.firstChild);
      rowMainCount = index - 1;
      row.firstChild.innerHTML = (index - 1) + '.' + (index - 1) + '.';
      row.className = 'rowSub' + (index) + ' ' + 'rowMain' + (index);

    }

  });
</script>
