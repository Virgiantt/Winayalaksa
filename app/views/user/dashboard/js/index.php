<script>

  const getDataClient = () => {
    $.ajax({
      'url' : "<?= base_url("api/question") ?>",
      'type' : 'json',
      'method' : 'get',
      'data' : {'type' : 'exam','status' : 1},
      'success' : (res) => {
        $("#tableData tbody").html('')
        let no = 0

        $.each(res, (i, val) => {

          $("#tableData tbody").append(`
            <tr>
              <td>${++no}.</td>
              <td>${val.title}</td>
              <td>${val.time} menit</td>
              <td>${val.answer ? 'Sudah Dikerjakan' : 'Belum Dikerjakan'}</td>
              <td>

                <a type="#" 
                  class="btn text-white bg-info my-1" 
                  data-toggle="modal" 
                  data-target="#detailModal"
                  data-id="${val.id}"
                  data-name="${val.title}"
                >${val.answer ? 'Lihat Tryout' :'Mulai Tryout'}</a>
              </td>
            </tr>
          `)
        })
        
        $("#tableData").DataTable()
      }
    })
  }
  getDataClient()

  $(document).on('click',`[data-target="#detailModal"]`, function(){
    $.ajax({
      'url' : "<?= base_url("api/question") ?>",
      'type' : 'json',
      'method' : 'get',
      'data' : {id:$(this).data('id')},
      'success' : (res) => {

        $(".title").html(res.title)
        $(".time").html(res.time)
        $(".description").html(res.description)
        $(".mulai-latihan").data('id',res.id)
      }
    })
  })

  $(".mulai-latihan").click(() => {
    const id = $(".mulai-latihan").data('id')
    window.location.href = "<?= base_url('user/do_latihan/') ?>"+id
  })

</script>