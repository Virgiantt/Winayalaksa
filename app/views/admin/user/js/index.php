<script>
  const getAnotherData = () => {
    $.ajax({
      'url' : "<?= base_url("api/kelas") ?>",
      'type' : 'json',
      'method' : 'get',
      'success' : (res) => {
        let html_option = '<option value="">Pilih Kelas</option>'
        $.each(res, (i, val) => {
          html_option += `<option value="${val.id}">${val.name}</option>`
        })
        $("[name='class_id']").html(html_option)
      }
    })
  }
  getAnotherData()

  const getDataClient = () => {
    $.ajax({
      'url' : "<?= base_url("api/user") ?>",
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
              <td>${val.username}</td>
              <td>${val.role == 1 ? "Admin" : "User"}</td>
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
      'url' : "<?= base_url("api/user/add") ?>",
      'type' : 'json',
      'method' : 'post',
      'processData': false,
      'contentType': false,
      'data' : new FormData(this),
      'success' : (res) => {
        if(res == true){
          getDataClient()
          $("#addModal").modal('hide')
          toastr["success"]("Data Berhasil Ditambahkan", "Tambah User")
          $('input').val('')
        }else{
          toastr["error"](res, "Tambah User")
        }
      }
    })
  })

  $(document).on('click',`[data-target="#detailModal"]`, function(){
    $.ajax({
      'url' : "<?= base_url("api/user") ?>",
      'type' : 'json',
      'method' : 'get',
      'data' : {id:$(this).data('id')},
      'success' : (res) => {

        $("#nameDetail").val(res.name)
        $("#emailDetail").val(res.email)
        $("#phoneDetail").val(res.phone)
        $("#genderDetail").val(res.gender)
        $("#addressDetail").val(res.address)
        $("#usernameDetail").val(res.username)
        $("#roleDetail").val(res.role)
        $("#class_idDetail").val(res.class_id).change()
      }
    })
  })

  $(document).on('click',`[data-target="#editModal"]`, function(){
    $('.dataName').html($(this).data('name'))
    $('#inputEditId').val($(this).data('id'))

    $.ajax({
      'url' : "<?= base_url("api/user") ?>",
      'type' : 'json',
      'method' : 'get',
      'data' : {id:$(this).data('id')},
      'success' : (res) => {

        $("#idEdit").val(res.id)
        $("#nameEdit").val(res.name)
        $("#emailEdit").val(res.email)
        $("#phoneEdit").val(res.phone)
        $("#genderEdit").val(res.gender)
        $("#addressEdit").val(res.address)
        $("#usernameEdit").val(res.username)
        $("#roleEdit").val(res.role)
        $("#class_idEdit").val(res.class_id).change()
      }
    })
  })

  $("#formEdit").on("submit", function(e){
    e.preventDefault()
    $.ajax({
      'url' : "<?= base_url("api/user/update") ?>",
      'type' : 'json',
      'method' : 'post',
      'processData': false,
      'contentType': false,
      'data' : new FormData(this),
      'success' : (res) => {
        if(res == true){
          getDataClient()
          $("#editModal").modal('hide')
          toastr["success"]("Data Berhasil Di Update", "Edit User")
        }else{
          toastr["error"](res, "Edit User")
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
      'url' : "<?= base_url("api/user/delete") ?>",
      'type' : 'json',
      'method' : 'post',
      'processData': false,
      'contentType': false,
      'data' : new FormData(this),
      'success' : (res) => {
        if(res == true){
          getDataClient()
          $("#deleteModal").modal('hide')
          toastr["success"]("Data Berhasil Dihapus", "Hapus User")
        }else{
          toastr["error"](res, "Hapus User")
        }
      }
    })
  })

</script>