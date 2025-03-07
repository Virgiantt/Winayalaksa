<script>

  const getDataClient = () => {
    $.ajax({
      'url' : "<?= base_url("api/question") ?>",
      'type' : 'json',
      'method' : 'get',
      'data' : {'type' : 'exam'},
      'success' : (res) => {
        $("#tableData tbody").html('')
        let no = 0

        $.each(res, (i, val) => {

          $("#tableData tbody").append(`
            <tr>
              <td>${++no}.</td>
              <td>${val.title}</td>
              <td>${val.time} menit</td>
              <td>
                Passing Grade TWK : ${val.pg_twk} <br>
                Passing Grade TIU : ${val.pg_tiu} <br>
                Passing Grade TKP : ${val.pg_tkp} <br>
              </td>
              <td>
                Total TWK : ${val.count_twk} <br>
                Total TIU : ${val.count_tiu} <br>
                Total TKP : ${val.count_tkp} <br>
              </td>
              <td>${val.status == 1 ? 'Aktif' : 'Nonaktif'}</td>
              <td>

                <a type="#" 
                  class="btn text-white bg-info my-1" 
                  data-toggle="modal" 
                  data-target="#detailModal"
                  data-id="${val.id}"
                  data-name="${val.title}"
                >Detail</a>
                <a type="#" 
                  class="btn text-white bg-warning my-1" 
                  data-toggle="modal" 
                  data-target="#editModal"
                  data-id="${val.id}"
                  data-name="${val.title}"
                >Edit</a>
                <a href="<?= base_url('admin/kelola_soal') ?>/${val.id}" 
                  class="btn text-white bg-success my-1"
                >Kelola Tryout</a>
                <a type="#" 
                  class="btn text-white bg-secondary my-1" 
                  data-toggle="modal" 
                  data-target="#statusModal"
                  data-id="${val.id}"
                  data-name="${val.title}"
                >${val.status == 1 ? 'Nonaktifkan' : 'Aktifkan'}</a>
                <a type="#" 
                  class="btn text-white bg-danger my-1" 
                  data-toggle="modal" 
                  data-target="#deleteModal"
                  data-id="${val.id}"
                  data-name="${val.title}"
                >Hapus</a>

              </td>
            </tr>
          `)
        })
        
        $("#tableData").DataTable()
      }
    })
  }
  getDataClient()

  $("#formAdd").on("submit", function(e){
    e.preventDefault()
    $.ajax({
      'url' : "<?= base_url("api/question/add") ?>",
      'type' : 'json',
      'method' : 'post',
      'processData': false,
      'contentType': false,
      'data' : new FormData(this),
      'success' : (res) => {
        if(res == true){
          getDataClient()
          $("#addModal").modal('hide')
          toastr["success"]("Data Berhasil Ditambahkan", "Tambah Tryout")
          $('input').val('')
        }else{
          toastr["error"](res, "Tambah Tryout")
        }
      }
    })
  })

  $(document).on('click',`[data-target="#detailModal"]`, function(){
    $.ajax({
      'url' : "<?= base_url("api/question") ?>",
      'type' : 'json',
      'method' : 'get',
      'data' : {id:$(this).data('id')},
      'success' : (res) => {

        $("#titleDetail").val(res.title)
        $("#timeDetail").val(res.time)
        $("#typeDetail").val(res.type)
        $("#statusDetail").val(res.status)
        $("#descriptionDetail").val(res.description)
      }
    })
  })

  $(document).on('click',`[data-target="#editModal"]`, function(){
    $('.dataName').html($(this).data('name'))
    $('#inputEditId').val($(this).data('id'))

    $.ajax({
      'url' : "<?= base_url("api/question") ?>",
      'type' : 'json',
      'method' : 'get',
      'data' : {id:$(this).data('id')},
      'success' : (res) => {

        $("#idEdit").val(res.id)
        $("#titleEdit").val(res.title)
        $("#timeEdit").val(res.time)
        $("#typeEdit").val(res.type)
        $("#statusEdit").val(res.status)
        $("#descriptionEdit").val(res.description)
        $("#pg_twkEdit").val(res.pg_twk)
        $("#pg_tiuEdit").val(res.pg_tiu)
        $("#pg_tkpEdit").val(res.pg_tkp)
      }
    })
  })

  $("#formEdit").on("submit", function(e){
    e.preventDefault()
    $.ajax({
      'url' : "<?= base_url("api/question/update") ?>",
      'type' : 'json',
      'method' : 'post',
      'processData': false,
      'contentType': false,
      'data' : new FormData(this),
      'success' : (res) => {
        if(res == true){
          getDataClient()
          $("#editModal").modal('hide')
          toastr["success"]("Data Berhasil Di Update", "Edit Tryout")
        }else{
          toastr["error"](res, "Edit Tryout")
        }
      }
    })
  })

  $(document).on('click',`[data-target="#statusModal"]`, function(){
    $('.dataName').html($(this).data('name'))
    $('#inputEditId').val($(this).data('id'))

    $.ajax({
      'url' : "<?= base_url("api/question") ?>",
      'type' : 'json',
      'method' : 'get',
      'data' : {id:$(this).data('id')},
      'success' : (res) => {

        $("#idStatus").val(res.id)
      }
    })
  })

  $("#formStatus").on("submit", function(e){
    e.preventDefault()
    $.ajax({
      'url' : "<?= base_url("api/question/status") ?>",
      'type' : 'json',
      'method' : 'post',
      'processData': false,
      'contentType': false,
      'data' : new FormData(this),
      'success' : (res) => {
        if(res == true){
          getDataClient()
          $("#statusModal").modal('hide')
          toastr["success"]("Status Berhasil Di Update", "Ubah Status Tryout")
        }else{
          toastr["error"](res, "Ubah Status Tryout")
        }
      }
    })
  })

  $(document).on('click',`[data-target="#deleteModal"]`, function(){
    $('.dataName').html($(this).data('name'))
    $('#inputDeleteId').val($(this).data('id'))
  })

  $("#formDelete").on("submit", function(e){
    e.preventDefault()
    $.ajax({
      'url' : "<?= base_url("api/question/delete") ?>",
      'type' : 'json',
      'method' : 'post',
      'processData': false,
      'contentType': false,
      'data' : new FormData(this),
      'success' : (res) => {
        if(res == true){
          getDataClient()
          $("#deleteModal").modal('hide')
          toastr["success"]("Data Berhasil Dihapus", "Hapus Tryout")
        }else{
          toastr["error"](res, "Hapus Tryout")
        }
      }
    })
  })

</script>