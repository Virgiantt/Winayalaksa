<script>

  const getDataClient = () => {
    $.ajax({
      'url' : "<?= base_url("api/category") ?>",
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
              <td>${val.pg}</td>
              <td>
                <a type="#" 
                  class="btn text-white bg-warning my-1" 
                  data-toggle="modal" 
                  data-target="#editModal"
                  data-id="${val.id}"
                  data-name="${val.name}"
                >
                  Edit
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
      'url' : "<?= base_url("api/category/add") ?>",
      'type' : 'json',
      'method' : 'post',
      'processData': false,
      'contentType': false,
      'data' : new FormData(this),
      'success' : (res) => {
        if(res == true){
          getDataClient()
          $("#addModal").modal('hide')
          toastr["success"]("Data Berhasil Ditambahkan", "Tambah Kategori")
          $('input').val('')
        }else{
          toastr["error"](res, "Tambah Kategori")
        }
      }
    })
  })

  $(document).on('click',`[data-target="#detailModal"]`, function(){
    $.ajax({
      'url' : "<?= base_url("api/category") ?>",
      'type' : 'json',
      'method' : 'get',
      'data' : {id:$(this).data('id')},
      'success' : (res) => {

        $("#nameDetail").val(res.name)
        $("#pgDetail").val(res.pg)
      }
    })
  })

  $(document).on('click',`[data-target="#editModal"]`, function(){
    $('.dataName').html($(this).data('name'))
    $('#inputEditId').val($(this).data('id'))

    $.ajax({
      'url' : "<?= base_url("api/category") ?>",
      'type' : 'json',
      'method' : 'get',
      'data' : {id:$(this).data('id')},
      'success' : (res) => {

        $("#idEdit").val(res.id)
        $("#nameEdit").val(res.name)
        $("#pgEdit").val(res.pg)
      }
    })
  })

  $("#formEdit").on("submit", function(e){
    e.preventDefault()
    $.ajax({
      'url' : "<?= base_url("api/category/update") ?>",
      'type' : 'json',
      'method' : 'post',
      'processData': false,
      'contentType': false,
      'data' : new FormData(this),
      'success' : (res) => {
        if(res == true){
          getDataClient()
          $("#editModal").modal('hide')
          toastr["success"]("Data Berhasil Di Update", "Edit Kategori")

          $("#passwordEdit").val("")
          $("#idEdit").val("")
          $("#nameEdit").val("")

        }else{
          toastr["error"](res, "Edit Kategori")

          $("#passwordEdit").val("")
          $("#idEdit").val("")
          $("#nameEdit").val("")

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
      'url' : "<?= base_url("api/category/delete") ?>",
      'type' : 'json',
      'method' : 'post',
      'processData': false,
      'contentType': false,
      'data' : new FormData(this),
      'success' : (res) => {
        if(res == true){
          getDataClient()
          $("#deleteModal").modal('hide')
          toastr["success"]("Data Berhasil Dihapus", "Hapus Kategori")
        }else{
          toastr["error"](res, "Hapus Kategori")
        }
      }
    })
  })

</script>