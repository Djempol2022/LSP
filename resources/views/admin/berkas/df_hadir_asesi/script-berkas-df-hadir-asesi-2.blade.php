<script>
  $(document).ready(function() {

    let getData = async (id) => {
      let url = "http://127.0.0.1:8000/api/admin/berkas/df-hadir-asesi-api/";
      let fd = new FormData();
      fd.append("id", id);
      let requestOptions = {
        method: "POST",
        Headers: {
          "Content-Type": "application/json",
        },
        body: fd,
      };
      return fetch(`${url}`, requestOptions)
        .then((response) => response.text())
        .then((result) => {
          return JSON.parse(result);
        })
        .catch((error) => console.log("error", error));
    };

    let setDataAsesor = async (idSkema) => {
      let dataS = await getData(idSkema);
      if (dataS.length == 0) {
        console.log('data kosong');
      } else {
        console.log(dataS);
      }
    };

    $("#skema_sertifikasi").change(function(e) {
      e.preventDefault();
      setDataAsesor($(this).val());
      console.log($(this).val());
    });

  });
</script>
