<script>
  const getAnotherData = () => {
    $.ajax({
      'url' : "<?= base_url("api/question") ?>",
      'type' : 'json',
      'method' : 'get',
      'data' : {'type' : 'exam'},
      'success' : (res) => {
        let html_option = ''
        $.each(res, (i, val) => {
          html_option += `<option value="${val.id}">${val.title}</option>`
        })
        $("[name='access_question[]']").html(html_option)
        $("[name='access_question[]']").select2()
      }
    })
  }
  getAnotherData()

  const getDataClient = () => {
    $.ajax({
      'url' : "<?= base_url("api/kelas") ?>",
      'type' : 'json',
      'method' : 'get',
      'success' : (res) => {
        $("#tableData tbody").html('')
        let no = 0

        $.each(res, (i, val) => {

          $("#tableData tbody").append(`
            <tr>
              <td>${++no}.</td>
              <td>${val.name}</td>
              <td>
                <a type="#" 
                  class="btn text-white bg-info my-1" 
                  data-toggle="modal" 
                  data-target="#detailModal"
                  data-id="${val.id}"
                >
                  Detail
                </a>
                <a type="#" 
                  class="btn text-white bg-warning my-1" 
                  data-toggle="modal" 
                  data-target="#editModal"
                  data-id="${val.id}"
                  data-name="${val.name}"
                >
                  Edit
                </a>
                <a type="#" 
                  class="btn text-white bg-danger my-1" 
                  data-toggle="modal" 
                  data-target="#deleteModal"
                  data-id="${val.id}"
                  data-name="${val.name}"
                >
                  Hapus
                </a>
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
      'url' : "<?= base_url("api/kelas/add") ?>",
      'type' : 'json',
      'method' : 'post',
      'processData': false,
      'contentType': false,
      'data' : new FormData(this),
      'success' : (res) => {
        if(res == true){
          getDataClient()
          $("#addModal").modal('hide')
          toastr["success"]("Data Berhasil Ditambahkan", "Tambah Kelas")
          $('input').val('')
        }else{
          toastr["error"](res, "Tambah Kelas")
        }
      }
    })
  })

  $(document).on('click',`[data-target="#detailModal"]`, function(){
    $.ajax({
      'url' : "<?= base_url("api/kelas") ?>",
      'type' : 'json',
      'method' : 'get',
      'data' : {id:$(this).data('id')},
      'success' : (res) => {
        $("#nameDetail").val(res.name)
        let access_question = res.access_question.split(',')
        $("#access_questionDetail").val(access_question)
        $("#access_questionDetail").select2()
      }
    })
  })

  $(document).on('click',`[data-target="#editModal"]`, function(){
    $('.dataName').html($(this).data('name'))
    $('#inputEditId').val($(this).data('id'))

    $.ajax({
      'url' : "<?= base_url("api/kelas") ?>",
      'type' : 'json',
      'method' : 'get',
      'data' : {id:$(this).data('id')},
      'success' : (res) => {

        $("#idEdit").val(res.id)
        $("#nameEdit").val(res.name)
        $("#access_questionEdit").val('')
        $("#access_questionEdit").select2()
        let access_question = res.access_question.split(',')
        $("#access_questionEdit").val(access_question)
        $("#access_questionEdit").select2()
      }
    })
  })

  $("#formEdit").on("submit", function(e){
    e.preventDefault()
    $.ajax({
      'url' : "<?= base_url("api/kelas/update") ?>",
      'type' : 'json',
      'method' : 'post',
      'processData': false,
      'contentType': false,
      'data' : new FormData(this),
      'success' : (res) => {
        if(res == true){
          getDataClient()
          $("#editModal").modal('hide')
          toastr["success"]("Data Berhasil Di Update", "Edit Kelas")
        }else{
          toastr["error"](res, "Edit Kelas")
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
      'url' : "<?= base_url("api/kelas/delete") ?>",
      'type' : 'json',
      'method' : 'post',
      'processData': false,
      'contentType': false,
      'data' : new FormData(this),
      'success' : (res) => {
        if(res == true){
          getDataClient()
          $("#deleteModal").modal('hide')
          toastr["success"]("Data Berhasil Dihapus", "Hapus Kelas")
        }else{
          toastr["error"](res, "Hapus Kelas")
        }
      }
    })
  })

</script>