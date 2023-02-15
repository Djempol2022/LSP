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
      element2.className = 'form-check-input';
      element2.type = "checkbox";
      element2.name = "status[]" + rowCount;
      element2.value = 1;
      element2.onchange = function() {
        $('input[name="' + this.name + '"]').not(this).prop('checked', false);
      };
      cell3.appendChild(element2);

      let cell4 = row.insertCell(3);
      let element3 = document.createElement("input");
      element3.className = 'form-check-input';
      element3.type = "checkbox";
      element3.name = "status[]" + rowCount;
      element3.value = 0;
      element3.onchange = function() {
        $('input[name="' + this.name + '"]').not(this).prop('checked', false);
      };
      cell4.appendChild(element3);

      let cell5 = row.insertCell(4);
      let element4 = document.createElement("input");
      element4.className = 'form-check-input';
      element4.type = "checkbox";
      element4.name = "kondisi[]" + rowCount;
      element4.value = 0;
      element4.onchange = function() {
        $('input[name="' + this.name + '"]').not(this).prop('checked', false);
      };
      cell5.appendChild(element4);

      let cell6 = row.insertCell(5);
      let element5 = document.createElement("input");
      element5.className = 'form-check-input';
      element5.type = "checkbox";
      element5.name = "kondisi[]" + rowCount;
      element5.value = 0;
      element5.onchange = function() {
        $('input[name="' + this.name + '"]').not(this).prop('checked', false);
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
        removeRow("rowMain" + rowCount);
      };
      cell7.appendChild(element6);

    }

    let arrayRowSub = [];
    let renderRowSub = (lengthRowMain) => {
      let rowMainString = lengthRowMain.split('_');
      let rowMainCount = parseInt(rowMainString[1]);

      let table = document.getElementById('tableHasilVerifikasiTUK');
      console.log(table.rows);
      console.log($('tr.rowMain' + rowMainCount).last()[0].className);
      let index_table_array = 0;
      let filtered_table_array = Array.from(table.rows);
      filtered_table_array.forEach(function(row, i, arr) {
        if (row.className === 'rowMain' + rowMainCount) {
          index_table_array = i;
        }
      });


      let rowCount = index_table_array + 1;

      // let is_exists = arrayRowSub.includes('rowMain' + rowMainCount);
      // if (is_exists) {
      // arrayRowSub.push('rowMain' + rowMainCount);
      arrayRowSub.push('rowMain' + rowMainCount);
      // }

      console.log(arrayRowSub);

      let row = table.insertRow(rowCount);
      row.className = 'rowSub' + (arrayRowSub.length) + ' rowMain' + rowMainCount;

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
      element1.name = `sarana_prasarana_sub[${$('tr.rowMain' + rowMainCount).length - 2}][]`;
      let element1_1 = document.createElement('button');
      element1_1.className =
        'mt-2 border-0 bg-transparent text-primary font-extrabold';
      element1_1.id = 'addRowSub_2';
      element1_1
        .innerHTML = '+';
      element1_1.type = 'button';
      element1_1.onclick = function() {
        renderRowSub2(rowCount, noMain, noSub);
      };
      cell2.appendChild(element1);
      cell2.appendChild(element1_1);


      let cell3 = row.insertCell(2);
      let element2 = document.createElement("input");
      element2.className = 'form-check-input';
      element2.type =
        "checkbox";
      element2.name = "status_sub[]" + rowCount;
      element2.value = 1;
      element2.onchange =
        function() {
          $('input[name="' + this.name + '"]').not(this).prop('checked', false);
        };
      cell3.appendChild(element2);

      let cell4 = row.insertCell(3);
      let element3 = document.createElement("input");
      element3.className = 'form-check-input';
      element3.type =
        "checkbox";
      element3.name = "status_sub[]" + rowCount;
      element3.value = 0;
      element3.onchange =
        function() {
          $('input[name="' + this.name + '"]').not(this).prop('checked', false);
        };
      cell4.appendChild(element3);

      let cell5 = row.insertCell(4);
      let element4 = document.createElement("input");
      element4.className = 'form-check-input';
      element4.type =
        "checkbox";
      element4.name = "kondisi_sub[]" + rowCount;
      element4.value = 0;
      element4.onchange =
        function() {
          $('input[name="' + this.name + '"]').not(this).prop('checked', false);
        };
      cell5.appendChild(element4);

      let cell6 = row.insertCell(5);
      let element5 = document.createElement("input");
      element5.className = 'form-check-input';
      element5.type =
        "checkbox";
      element5.name = "kondisi_sub[]" + rowCount;
      element5.value = 0;
      element5.onchange =
        function() {
          $('input[name="' + this.name + '"]').not(this).prop('checked', false);
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

    let renderRowSub2 = (lengthRowSub, noMain, noSub) => {
      let table = document.getElementById('tableHasilVerifikasiTUK');
      let row = $('tr.rowSub' + lengthRowSub)[0].childNodes[1];
      let rowMainCountString = noMain.split('.');
      let rowMainCount = parseInt(rowMainCountString[0] - 1);
      let rowSubCount2String = noSub.split('.');
      let rowSubCount2 = parseInt(rowSubCount2String[0] - 1);
      let rowSubCount = $('.rowSub_2_' + lengthRowSub).length;
      let element1 = document.createElement("input");
      element1.className = 'form-control mt-2 rowSub_2_' + lengthRowSub;
      element1.type = "text";
      element1.name = `sarana_prasarana_sub2[${rowSubCount}][${rowMainCount}][${rowSubCount2}]`;
      //   element1.name = `sarana_prasarana_sub2[${lengthRowSub}][]`;
      row.appendChild(element1);
    }

    function removeRow(rowMain) {
      console.log(document.querySelectorAll('.' + rowMain));
      document.querySelectorAll('.' + rowMain).forEach(e => {
        e.remove();

        // reset main input after remove
        let table = document.getElementById('tableHasilVerifikasiTUK');

        arrayRowMain = [];
        let rowCount = table.rows.length - 1;
        for (let i = 2; i < rowCount; i++) {
          let row = table.rows[i];

          arrayRowMain.push('rowMain' + i);

          row.className = 'rowMain' + i;
          row.cells[6].childNodes[0].id = 'button' + i;
          row.cells[0].innerHTML = i - 1 + '.';
          $('#button' + i).prop('onclick', null);
          row.cells[6].onclick = function() {
            removeRow("rowMain" + i)
          };
        }
        // end reset main input after remove
      });

    }

    // coming soon
    // function removeRowSub(btnName) {
    //   try {
    // let table = document.getElementById('tableHasilVerifikasiTUK');
    // let rowCount = table.rows.length - 1;
    //     for (let i = 2; i < rowCount; i++) {
    //       let row = table.rows[i];
    //       let rowObj = row.cells[6].childNodes[0];
    //       if (rowObj.name == btnName) {
    //         table.deleteRow(i);
    //         rowCount--;
    //       }
    //     }
    //   } catch (e) {
    //     alert(e);
    //   }
    // }

  });
</script>
