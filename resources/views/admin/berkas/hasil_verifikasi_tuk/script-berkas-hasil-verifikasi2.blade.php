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

  //   1
  //   $('#addRow').on('click', function(e) {
  //     e.preventDefault();
  //     let table = document.getElementById('tableHasilVerifikasiTUK');
  //     let rowCount = table.rows.length - 1;
  //     let row = table.insertRow(rowCount);

  //     let cell1 = row.insertCell(0);
  //     cell1.innerHTML = rowCount - 1;

  //     let cell2 = row.insertCell(1);
  //     cell2.innerHTML = `
  //         <input type="text" name="sarana_prasarana[]" class="form-control" required>
  //         <button type="button" class="mt-2 border-0 bg-transparent text-primary font-extrabold" id="addRowSub">+</button>
  //     `;


  //     let cell3 = row.insertCell(2);
  //     let element = document.createElement("input");
  //     element.className = 'form-check-input';
  //     element.type = "checkbox";
  //     element.name = `status[]${rowCount}`;
  //     element.value = 1;
  //     cell3.appendChild(element);

  //     element.addEventListener('change', function() {
  //       $('input[name="' + this.name + '"]').not(this).prop('checked', false);
  //     });

  //     let cell4 = row.insertCell(3);
  //     let element2 = document.createElement("input");
  //     element2.className = 'form-check-input';
  //     element2.type = "checkbox";
  //     element2.name = `status[]${rowCount}`;
  //     element2.value = 0;
  //     cell4.appendChild(element2);

  //     element2.addEventListener('change', function() {
  //       $('input[name="' + this.name + '"]').not(this).prop('checked', false);
  //     });

  //     let cell5 = row.insertCell(4);
  //     let element3 = document.createElement("input");
  //     element3.className = 'form-check-input';
  //     element3.type = "checkbox";
  //     element3.name = `kondisi[]${rowCount}`;
  //     element3.value = 1;
  //     cell5.appendChild(element3);

  //     element3.addEventListener('change', function() {
  //       $('input[name="' + this.name + '"]').not(this).prop('checked', false);
  //     });

  //     let cell6 = row.insertCell(5);
  //     let element4 = document.createElement("input");
  //     element4.className = 'form-check-input';
  //     element4.type = "checkbox";
  //     element4.name = `kondisi[]${rowCount}`;
  //     element4.value = 0;
  //     cell6.appendChild(element4);

  //     element4.addEventListener('change', function() {
  //       $('input[name="' + this.name + '"]').not(this).prop('checked', false);
  //     });

  //     let cell7 = row.insertCell(6);
  //     let element5 = document.createElement("button");
  //     element5.className = 'border-0 bg-transparent text-danger';
  //     element5.type = "button";
  //     element5.innerHTML = 'X';
  //     cell7.appendChild(element5);

  //     element5.addEventListener('click', function() {
  //       let table = document.getElementById('tableHasilVerifikasiTUK');
  //       let rowCount = table.rows.length - 1;
  //       if (rowCount > 2) {
  //         table.deleteRow(rowCount - 1);
  //       }
  //     });

  //   })

  //   2
  //   $('#addRow').on('click', function(e) {
  //     e.preventDefault();
  //     let table = document.getElementById('tableHasilVerifikasiTUK');
  //     let rowCount = table.rows.length - 1;
  //     let row = table.insertRow(rowCount);

  //     let cell1 = row.insertCell(0);
  //     cell1.innerHTML = rowCount - 1;

  //     let cell2 = row.insertCell(1);
  //     cell2.innerHTML = `
  //         <input type="text" name="sarana_prasarana[]" class="form-control" required>
  //         <button type="button" class="mt-2 border-0 bg-transparent text-primary font-extrabold addRowSub">+</button>
  //     `;

  //     let cell3 = row.insertCell(2);
  //     let element = document.createElement("input");
  //     element.className = 'form-check-input';
  //     element.type = "checkbox";
  //     element.name = `status[]${rowCount}`;
  //     element.value = 1;
  //     cell3.appendChild(element);

  //     element.addEventListener('change', function() {
  //       $('input[name="' + this.name + '"]').not(this).prop('checked', false);
  //     });

  //     let cell4 = row.insertCell(3);
  //     let element2 = document.createElement("input");
  //     element2.className = 'form-check-input';
  //     element2.type = "checkbox";
  //     element2.name = `status[]${rowCount}`;
  //     element2.value = 0;
  //     cell4.appendChild(element2);

  //     element2.addEventListener('change', function() {
  //       $('input[name="' + this.name + '"]').not(this).prop('checked', false);
  //     });

  //     let cell5 = row.insertCell(4);
  //     let element3 = document.createElement("input");
  //     element3.className = 'form-check-input';
  //     element3.type = "checkbox";
  //     element3.name = `kondisi[]${rowCount}`;
  //     element3.value = 1;
  //     cell5.appendChild(element3);

  //     element3.addEventListener('change', function() {
  //       $('input[name="' + this.name + '"]').not(this).prop('checked', false);
  //     });

  //     let cell6 = row.insertCell(5);
  //     let element4 = document.createElement("input");
  //     element4.className = 'form-check-input';
  //     element4.type = "checkbox";
  //     element4.name = `kondisi[]${rowCount}`;
  //     element4.value = 0;
  //     cell6.appendChild(element4);

  //     element4.addEventListener('change', function() {
  //       $('input[name="' + this.name + '"]').not(this).prop('checked', false);
  //     });

  //     let cell7 = row.insertCell(6);
  //     let element5 = document.createElement("button");
  //     element5.className = 'border-0 bg-transparent text-danger';
  //     element5.type = "button";
  //     element5.innerHTML = 'X';
  //     cell7.appendChild(element5);

  //     element5.addEventListener('click', function() {
  //       let table = document.getElementById('tableHasilVerifikasiTUK');
  //       let rowCount = table.rows.length - 1;
  //       if (rowCount > 2) {
  //         table.deleteRow(rowCount - 1);
  //       }
  //     });

  //     $(cell2).on('click', '.addRowSub', function(e) {
  //       e.preventDefault();
  //       let rowIndex = $(this).closest('tr').index() + 2;
  //       console.log(rowIndex);
  //       let subrow = table.insertRow(rowIndex + 1);

  //       let subcell1 = subrow.insertCell(0);
  //       subcell1.innerHTML = "";

  //       let subcell2 = subrow.insertCell(1);
  //       subcell2.innerHTML = `<input type="text" name="sarana_prasarana_sub[]" class="form-control" required>`;

  //       let subcell3 = subrow.insertCell(2);
  //       let subelement = document.createElement("input");
  //       subelement.className = 'form-check-input';
  //       subelement.type = "checkbox";
  //       subelement.name = `status_sub[]${rowCount}-${rowIndex}`;
  //       subelement.value = 1;
  //       subcell3.appendChild(subelement);

  //       subelement.addEventListener('change', function() {
  //         $('input[name="' + this.name + '"]').not(this).prop('checked', false);
  //       });

  //       let subcell4 = subrow.insertCell(3);
  //       let subelement2 = document.createElement("input");
  //       subelement2.className = 'form-check-input';
  //       subelement2.type = "checkbox";
  //       subelement2.name = `status_sub[]${rowCount}-${rowIndex}`;
  //       subelement2.value = 0;
  //       subcell4.appendChild(subelement2);

  //       subelement2.addEventListener('change', function() {
  //         $('input[name="' + this.name + '"]').not(this).prop('checked', false);
  //       });

  //       let subcell5 = subrow.insertCell(4);
  //       let subelement3 = document.createElement("input");
  //       subelement3.className = 'form-check-input';
  //       subelement3.type = "checkbox";
  //       subelement3.name = `kondisi_sub[]${rowCount}-${rowIndex}`;
  //       subelement3.value = 1;
  //       subcell5.appendChild(subelement3);

  //       subelement3.addEventListener('change', function() {
  //         $('input[name="' + this.name + '"]').not(this).prop('checked', false);
  //       });

  //       let subcell6 = subrow.insertCell(5);
  //       let subelement4 = document.createElement("input");
  //       subelement4.className = 'form-check-input';
  //       subelement4.type = "checkbox";
  //       subelement4.name = `kondisi_sub[]${rowCount}-${rowIndex}`;
  //       subelement4.value = 0;
  //       subcell6.appendChild(subelement4);

  //       subelement4.addEventListener('change', function() {
  //         $('input[name="' + this.name + '"]').not(this).prop('checked', false);
  //       });

  //       let subcell7 = subrow.insertCell(6);
  //       let subelement5 = document.createElement("button");
  //       subelement5.className = 'border-0 bg-transparent text-danger';
  //       subelement5.type = "button";
  //       subelement5.innerHTML = 'X';
  //       subcell7.appendChild(subelement5);

  //       subelement5.addEventListener('click', function() {
  //         table.deleteRow(rowIndex + 1);
  //       });
  //     });
  //   });

  // 3
  //   $('#addRow').on('click', function(e) {
  //     e.preventDefault();
  //     let table = document.getElementById('tableHasilVerifikasiTUK');
  //     let rowCount = table.rows.length - 1;
  //     let row = table.insertRow(rowCount);
  //     row.className = 'rowMain' + rowCount;

  //     let cell1 = row.insertCell(0);
  //     cell1.innerHTML = rowCount - 1;

  //   let cell2 = row.insertCell(1);
  //   cell2.innerHTML = `
  //       <input type="text" name="sarana_prasarana[]" class="form-control" required>
  //       <button type="button" class="mt-2 border-0 bg-transparent text-primary font-extrabold addRowSub">+</button>
  //   `;

  //     let cell3 = row.insertCell(2);
  //     let element = document.createElement("input");
  //     element.className = 'form-check-input';
  //     element.type = "checkbox";
  //     element.name = `status[]${rowCount}`;
  //     element.value = 1;
  //     cell3.appendChild(element);

  //     element.addEventListener('change', function() {
  //       $('input[name="' + this.name + '"]').not(this).prop('checked', false);
  //     });

  //     let cell4 = row.insertCell(3);
  //     let element2 = document.createElement("input");
  //     element2.className = 'form-check-input';
  //     element2.type = "checkbox";
  //     element2.name = `status[]${rowCount}`;
  //     element2.value = 0;
  //     cell4.appendChild(element2);

  //     element2.addEventListener('change', function() {
  //       $('input[name="' + this.name + '"]').not(this).prop('checked', false);
  //     });

  //     let cell5 = row.insertCell(4);
  //     let element3 = document.createElement("input");
  //     element3.className = 'form-check-input';
  //     element3.type = "checkbox";
  //     element3.name = `kondisi[]${rowCount}`;
  //     element3.value = 1;
  //     cell5.appendChild(element3);

  //     element3.addEventListener('change', function() {
  //       $('input[name="' + this.name + '"]').not(this).prop('checked', false);
  //     });

  //     let cell6 = row.insertCell(5);
  //     let element4 = document.createElement("input");
  //     element4.className = 'form-check-input';
  //     element4.type = "checkbox";
  //     element4.name = `kondisi[]${rowCount}`;
  //     element4.value = 0;
  //     cell6.appendChild(element4);

  //     element4.addEventListener('change', function() {
  //       $('input[name="' + this.name + '"]').not(this).prop('checked', false);
  //     });

  //     let cell7 = row.insertCell(6);
  //     let element5 = document.createElement("button");
  //     element5.className = 'border-0 bg-transparent text-danger';
  //     element5.type = "button";
  //     element5.innerHTML = 'X';
  //     cell7.appendChild(element5);

  //     element5.addEventListener('click', function() {
  //       document.querySelectorAll('.rowMain' + rowCount).forEach((e, i, arr) => {
  //         arr[i].remove();
  //       });

  //       let table = document.getElementById('tableHasilVerifikasiTUK');

  //       for (let i = 1; i < rowCount; i++) {
  //         let rowObj = table.rows[i + 1];
  //         rowObj.cells[0].innerHTML = i;
  //         rowObj.className = 'rowMain' + i;
  //       }

  //     });

  //   $(cell2).on('click', '.addRowSub', function(e) {
  //     e.preventDefault();
  //     let rowIndex = $(this).closest('tr').index() + 2;
  //     let subrow = table.insertRow(rowIndex + 1);
  //     subrow.className = 'rowMain' + rowCount + ' rowSub' + rowIndex;

  //     let subcell1 = subrow.insertCell(0);
  //     subcell1.innerHTML = "";

  //     let subcell2 = subrow.insertCell(1);
  //     subcell2.innerHTML = `<input type="text" name="sarana_prasarana_sub[]" class="form-control" required>`;

  //     let subcell3 = subrow.insertCell(2);
  //     let subelement = document.createElement("input");
  //     subelement.className = 'form-check-input';
  //     subelement.type = "checkbox";
  //     subelement.name = `status_sub[]${rowCount}-${rowIndex}`;
  //     subelement.value = 1;
  //     subcell3.appendChild(subelement);

  //     subelement.addEventListener('change', function() {
  //       $('input[name="' + this.name + '"]').not(this).prop('checked', false);
  //     });

  //     let subcell4 = subrow.insertCell(3);
  //     let subelement2 = document.createElement("input");
  //     subelement2.className = 'form-check-input';
  //     subelement2.type = "checkbox";
  //     subelement2.name = `status_sub[]${rowCount}-${rowIndex}`;
  //     subelement2.value = 0;
  //     subcell4.appendChild(subelement2);

  //     subelement2.addEventListener('change', function() {
  //       $('input[name="' + this.name + '"]').not(this).prop('checked', false);
  //     });

  //     let subcell5 = subrow.insertCell(4);
  //     let subelement3 = document.createElement("input");
  //     subelement3.className = 'form-check-input';
  //     subelement3.type = "checkbox";
  //     subelement3.name = `kondisi_sub[]${rowCount}-${rowIndex}`;
  //     subelement3.value = 1;
  //     subcell5.appendChild(subelement3);

  //     subelement3.addEventListener('change', function() {
  //       $('input[name="' + this.name + '"]').not(this).prop('checked', false);
  //     });

  //     let subcell6 = subrow.insertCell(5);
  //     let subelement4 = document.createElement("input");
  //     subelement4.className = 'form-check-input';
  //     subelement4.type = "checkbox";
  //     subelement4.name = `kondisi_sub[]${rowCount}-${rowIndex}`;
  //     subelement4.value = 0;
  //     subcell6.appendChild(subelement4);

  //     subelement4.addEventListener('change', function() {
  //       $('input[name="' + this.name + '"]').not(this).prop('checked', false);
  //     });

  //     let subcell7 = subrow.insertCell(6);
  //     let subelement5 = document.createElement("button");
  //     subelement5.className = 'border-0 bg-transparent text-danger';
  //     subelement5.type = "button";
  //     subelement5.innerHTML = 'X';
  //     subcell7.appendChild(subelement5);

  //     subelement5.addEventListener('click', function() {
  //       table.deleteRow(rowIndex + 1);
  //     });
  //   });
  //   });

  // 4
  let number = 1;
  let table = document.getElementById('tableHasilVerifikasiTUK');
  $('#addRow').on('click', function(e) {
    e.preventDefault();
    let rowCount = table.rows.length - 1;
    let row = table.insertRow(rowCount);
    row.className = 'rowMain' + number;

    let cell1 = row.insertCell(0);
    cell1.innerHTML = number;

    let cell2 = row.insertCell(1);
    cell2.innerHTML = `
          <input type="text" name="sarana_prasarana[]" class="form-control" required>
          <button type="button" class="mt-2 border-0 bg-transparent text-primary font-extrabold addRowSub">+</button>
      `;

    let cell3 = row.insertCell(2);
    let element = document.createElement("input");
    element.className = 'form-check-input';
    element.type = "checkbox";
    element.name = `status[]${number}`;
    element.value = 1;
    cell3.appendChild(element);

    element.addEventListener('change', function() {
      $('input[name="' + this.name + '"]').not(this).prop('checked', false);
    });

    let cell4 = row.insertCell(3);
    let element2 = document.createElement("input");
    element2.className = 'form-check-input';
    element2.type = "checkbox";
    element2.name = `status[]${number}`;
    element2.value = 0;
    cell4.appendChild(element2);

    element2.addEventListener('change', function() {
      $('input[name="' + this.name + '"]').not(this).prop('checked', false);
    });

    let cell5 = row.insertCell(4);
    let element3 = document.createElement("input");
    element3.className = 'form-check-input';
    element3.type = "checkbox";
    element3.name = `kondisi[]${number}`;
    element3.value = 1;
    cell5.appendChild(element3);

    element3.addEventListener('change', function() {
      $('input[name="' + this.name + '"]').not(this).prop('checked', false);
    });

    let cell6 = row.insertCell(5);
    let element4 = document.createElement("input");
    element4.className = 'form-check-input';
    element4.type = "checkbox";
    element4.name = `kondisi[]${number}`;
    element4.value = 0;
    cell6.appendChild(element4);

    element4.addEventListener('change', function() {
      $('input[name="' + this.name + '"]').not(this).prop('checked', false);
    });

    let cell7 = row.insertCell(6);
    let element5 = document.createElement("button");
    element5.className = 'border-0 bg-transparent text-danger';
    element5.type = "button";
    element5.id = 'deleteRow';
    element5.innerHTML = 'X';
    element5.onclick = function() {
      deleteRow(rowCount);
    };
    cell7.appendChild(element5);

    let indexRowSubStatus = 1;
    $(cell2).on('click', '.addRowSub', function(e) {
      e.preventDefault();
      let rowSubCount = parseInt(row.cells[0].innerHTML);
      console.log(rowSubCount);
      let rowIndex = $(this).closest('tr').index() + 2;
      let subrow = table.insertRow(rowIndex + 1);
      subrow.className = 'rowMain' + rowSubCount + ' rowSub' + rowSubCount;

      let subcell1 = subrow.insertCell(0);
      subcell1.innerHTML = "";

      let subcell2 = subrow.insertCell(1);
      subcell2.innerHTML = `<input type="text" name="sarana_prasarana_sub[]" class="form-control" required>`;

      let subcell3 = subrow.insertCell(2);
      let subelement = document.createElement("input");
      subelement.className = 'form-check-input';
      subelement.type = "checkbox";
      subelement.name = `status_sub[]${rowSubCount}-${indexRowSubStatus}`;
      subelement.value = 1;
      subcell3.appendChild(subelement);

      subelement.addEventListener('change', function() {
        $('input[name="' + this.name + '"]').not(this).prop('checked', false);
      });

      let subcell4 = subrow.insertCell(3);
      let subelement2 = document.createElement("input");
      subelement2.className = 'form-check-input';
      subelement2.type = "checkbox";
      subelement2.name = `status_sub[]${rowSubCount}-${indexRowSubStatus}`;
      subelement2.value = 0;
      subcell4.appendChild(subelement2);

      subelement2.addEventListener('change', function() {
        $('input[name="' + this.name + '"]').not(this).prop('checked', false);
      });

      let subcell5 = subrow.insertCell(4);
      let subelement3 = document.createElement("input");
      subelement3.className = 'form-check-input';
      subelement3.type = "checkbox";
      subelement3.name = `kondisi_sub[]${rowSubCount}-${indexRowSubStatus}`;
      subelement3.value = 1;
      subcell5.appendChild(subelement3);

      subelement3.addEventListener('change', function() {
        $('input[name="' + this.name + '"]').not(this).prop('checked', false);
      });

      let subcell6 = subrow.insertCell(5);
      let subelement4 = document.createElement("input");
      subelement4.className = 'form-check-input';
      subelement4.type = "checkbox";
      subelement4.name = `kondisi_sub[]${rowSubCount}-${indexRowSubStatus}`;
      subelement4.value = 0;
      subcell6.appendChild(subelement4);

      subelement4.addEventListener('change', function() {
        $('input[name="' + this.name + '"]').not(this).prop('checked', false);
      });

      let subcell7 = subrow.insertCell(6);
      let subelement5 = document.createElement("button");
      subelement5.className = 'border-0 bg-transparent text-danger';
      subelement5.type = "button";
      subelement5.innerHTML = 'X';
      subcell7.appendChild(subelement5);

      subelement5.addEventListener('click', function() {
        table.deleteRow(rowIndex + 1);
      });

      indexRowSubStatus++;
    });

    number++;
  });

  function deleteRow(rowMain) {
    console.log(rowMain);
    rowMain = rowMain - 1;
    document.querySelectorAll('.rowMain' + rowMain).forEach((e, i, arr) => {
      arr[i].remove();
    });

    let table = document.getElementById('tableHasilVerifikasiTUK');
    let rowCount = table.rows.length - 1;

    console.log(table.rows);
    for (let i = 2; i < rowCount; i++) {
      let numberDelete = i - 1;
      let rowObj = table.rows[i];
      console.log(rowObj.cells[0].childNodes[0]);
      rowObj.cells[0].innerHTML = numberDelete;
      rowObj.className = 'rowMain' + numberDelete;
    }
  }
</script>
