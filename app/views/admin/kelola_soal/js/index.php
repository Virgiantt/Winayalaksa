<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace('descriptionDetail');
  CKEDITOR.replace('descriptionAdd');
  CKEDITOR.replace('descriptionEdit');

  const question_id = "<?= $this->uri->segment(3) ?>"
  $("[name='question_id']").val(question_id)
  const getAnotherData = () => {
    $.ajax({
      'url' : "<?= base_url("api/question") ?>?id="+question_id,
      'type' : 'json',
      'method' : 'get',
      'success' : (res) => {
        $(".titleQuestion").html(res.title)
      }
    })
  }
  getAnotherData()

  const getDataClient = () => {
    $.ajax({
      'url' : "<?= base_url("api/questionDetail") ?>",
      'type' : 'json',
      'method' : 'get',
      'data' : {'question_id':question_id},
      'success' : (res) => {
        $("#tableData tbody").html('')
        let no = 0

        $.each(res, (i, val) => {

          $("#tableData tbody").append(`
            <tr>
              <td>${i+1}.</td>
              <td>${val.question}</td>
              <td>${val.image != null ? `<img src="<?= base_url() ?>${val.image}" width="100">` : '-'}</td>
              <td>${val.description}</td>
              <td>
                <a type="#" 
                  class="btn text-white bg-info my-1" 
                  data-toggle="modal" 
                  data-target="#detailModal"
                  data-id="${val.id}"
                  data-name="${i+1}"
                >Detail</a>
                <a type="#" 
                  class="btn text-white bg-warning my-1" 
                  data-toggle="modal" 
                  data-target="#editModal"
                  data-id="${val.id}"
                  data-name="${i+1}"
                >Edit</a>
                <a type="#" 
                  class="btn text-white bg-danger my-1" 
                  data-toggle="modal" 
                  data-target="#deleteModal"
                  data-id="${val.id}"
                  data-name="${i+1}"
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
    CKEDITOR.instances.descriptionAdd.updateElement();
    e.preventDefault()
    $.ajax({
      'url' : "<?= base_url("api/questionDetail/add") ?>",
      'type' : 'json',
      'method' : 'post',
      'processData': false,
      'contentType': false,
      'data' : new FormData(this),
      'success' : (res) => {
        if(res == true){
          getDataClient()
          $("#addModal").modal('hide')
          toastr["success"]("Data Berhasil Ditambahkan", "Tambah Soal")
          $('#questionAdd').val('')
          $('#imageAdd').val('')
          $('#descriptionAdd').val('')
          $('#choice1Add').val('')
          $('#choice2Add').val('')
          $('#choice3Add').val('')
          $('#choice4Add').val('')
          $('#choice5Add').val('')
          $('#point1Add').val('0')
          $('#point2Add').val('0')
          $('#point3Add').val('0')
          $('#point4Add').val('0')
          $('#point5Add').val('0')
          $('textarea').val('')
        }else{
          toastr["error"](res, "Tambah Soal")
        }
      }
    })
  })

  $(document).on('click',`[data-target="#detailModal"]`, function(){
    $.ajax({
      'url' : "<?= base_url("api/questionDetail") ?>",
      'type' : 'json',
      'method' : 'get',
      'data' : {id:$(this).data('id')},
      'success' : (res) => {

        $("#questionDetail").val(res.question)
        if(res.image)
        $("#imageDetailPreview").html(`<img src="<?= base_url()?>${res.image}" width="100" id="">`)
        // $("#descriptionDetail").val(res.description)
        CKEDITOR.instances.descriptionDetail.setData(res.description);
        CKEDITOR.instances.descriptionDetail.setReadOnly(true);
        $("#choice1Detail").val(res.choice[0]['text'])
        $("#point1Detail").val(res.choice[0]['point'])
        $("#choice2Detail").val(res.choice[1]['text'])
        $("#point2Detail").val(res.choice[1]['point'])
        $("#choice3Detail").val(res.choice[2]['text'])
        $("#point3Detail").val(res.choice[2]['point'])
        $("#choice4Detail").val(res.choice[3]['text'])
        $("#point4Detail").val(res.choice[3]['point'])
        $("#choice5Detail").val(res.choice[4]['text'])
        $("#point5Detail").val(res.choice[4]['point'])
      }
    })
  })

  $(document).on('click',`[data-target="#editModal"]`, function(){
    $('.dataName').html($(this).data('name'))
    $('#inputEditId').val($(this).data('id'))

    $.ajax({
      'url' : "<?= base_url("api/questionDetail") ?>",
      'type' : 'json',
      'method' : 'get',
      'data' : {id:$(this).data('id')},
      'success' : (res) => {

        $("#idEdit").val(res.id)
        $("#questionEdit").val(res.question)
        if(res.image)
        $("#imageEditPreview").html(`<img src="<?= base_url()?>${res.image}" width="100" id="">`)
        // $("#descriptionEdit").val(res.description)
        CKEDITOR.instances.descriptionEdit.setData(res.description);
        CKEDITOR.instances.descriptionEdit.setReadOnly(false);
        $("#id1Edit").val(res.choice[0]['id'])
        $("#choice1Edit").val(res.choice[0]['text'])
        $("#point1Edit").val(res.choice[0]['point'])
        $("#id2Edit").val(res.choice[1]['id'])
        $("#choice2Edit").val(res.choice[1]['text'])
        $("#point2Edit").val(res.choice[1]['point'])
        $("#id3Edit").val(res.choice[2]['id'])
        $("#choice3Edit").val(res.choice[2]['text'])
        $("#point3Edit").val(res.choice[2]['point'])
        $("#id4Edit").val(res.choice[3]['id'])
        $("#choice4Edit").val(res.choice[3]['text'])
        $("#point4Edit").val(res.choice[3]['point'])
        $("#id5Edit").val(res.choice[4]['id'])
        $("#choice5Edit").val(res.choice[4]['text'])
        $("#point5Edit").val(res.choice[4]['point'])
      }
    })
  })

  $("#formEdit").on("submit", function(e){
    CKEDITOR.instances.descriptionEdit.updateElement();
    e.preventDefault()
    $.ajax({
      'url' : "<?= base_url("api/questionDetail/update") ?>",
      'type' : 'json',
      'method' : 'post',
      'processData': false,
      'contentType': false,
      'data' : new FormData(this),
      'success' : (res) => {
        if(res == true){
          getDataClient()
          $("#editModal").modal('hide')
          toastr["success"]("Data Berhasil Di Update", "Edit Soal")
        }else{
          toastr["error"](res, "Edit Soal")
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
      'url' : "<?= base_url("api/questionDetail/delete") ?>",
      'type' : 'json',
      'method' : 'post',
      'processData': false,
      'contentType': false,
      'data' : new FormData(this),
      'success' : (res) => {
        if(res == true){
          getDataClient()
          $("#deleteModal").modal('hide')
          toastr["success"]("Data Berhasil Dihapus", "Hapus Soal")
        }else{
          toastr["error"](res, "Hapus Soal")
        }
      }
    })
  })

</script>