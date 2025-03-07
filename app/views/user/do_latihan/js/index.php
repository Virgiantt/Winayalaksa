<script>

  $(document).ready(function(){
    let startTime = <?php echo $this->session->userdata('question_start_time'); ?>;
    let duration = <?php echo $this->session->userdata('question_duration'); ?>;

    function updateTimer() {
      let currentTime = Math.floor(new Date().getTime() / 1000);
      let elapsedTime = currentTime - startTime;
      let remainingTime = duration - elapsedTime;

      let minutes = Math.floor(remainingTime / 60);
      let seconds = remainingTime % 60;

      $('#timer').text(minutes + "m " + seconds + "s");

      if(remainingTime <= 0) {
        clearInterval(interval);
        alert('WAKTU HABIS!!')
        let answerid = $("[name='answerid']").val()
        window.location.href = "<?= base_url("user/riwayat") ?>/"+answerid
      }
    }

    let interval = setInterval(updateTimer, 1000);
  });

  setTimeout(() => {
    $(".click-question").first().trigger('click')
  },500)

  setInterval(() => {
    $(".click-question").each(function() {
        var now_element = $(this)
        if (now_element.attr('data-checked') != '' && !now_element.hasClass('bg-orange')) {
            now_element.removeClass('bg-grey')
            now_element.addClass('bg-green')
        }else{
            now_element.removeClass('bg-green')
        }
    });
  }, 500);

  $(document).on('click',`.btn-prev`, function(){
    $('.click-question').each(function() {
      if($(this).hasClass('active')) {
          var previousElement = $(this).prev();
          if (previousElement.length !== 0){
            previousElement.click();
          }
          return false;
      }
    });
  })
  $(document).on('click',`.btn-next`, function(){
    $('.click-question').each(function() {
      if($(this).hasClass('active')) {
          var nextElement  = $(this).next();
          if (nextElement.length !== 0){
            nextElement .click();
          }
          return false;
      }
    });
  })


  $(document).on('click',`.click-question`, function(){
    $('.click-question').removeClass('bg-orange')
    $('.click-question').addClass('bg-grey')
    $(this).removeClass('bg-grey')
    $(this).addClass('bg-orange')

    $('.click-question').removeClass('active')
    $(this).addClass('active')

    const questiondetailid = $(this).data('questiondetailid')
    const questionchecked = $(this).data('questionchecked')
    const nomor = $(this).data('nomor')
    const question = $(this).data('question')
    const checked = $(this).attr('data-checked')
    const image = $(this).data('image')
    const description = $(this).data('description')
    const choice_a = $(this).data('choice_a')
    const choice_b = $(this).data('choice_b')
    const choice_c = $(this).data('choice_c')
    const choice_d = $(this).data('choice_d')
    const choice_e = $(this).data('choice_e')

    $("[name='input_choice']").prop('checked',false)
    $(`[name='input_choice'][value="${checked}"]`).prop('checked',true)
    // console.log($(this));
    if(checked == 'A') $('[type="radio"][name="input_choice"][value="a"]').prop('checked', true)
    if(checked == 'B') $('[type="radio"][name="input_choice"][value="b"]').prop('checked', true)
    if(checked == 'C') $('[type="radio"][name="input_choice"][value="c"]').prop('checked', true)
    if(checked == 'D') $('[type="radio"][name="input_choice"][value="d"]').prop('checked', true)
    if(checked == 'E') $('[type="radio"][name="input_choice"][value="e"]').prop('checked', true)

    $(".question_image").addClass('d-none')
    if(image){
    $(".question_image").removeClass('d-none')
      $(".question_image").attr('src',"<?= base_url() ?>"+image)
    }

    $(".table-question").removeClass('d-none')
    $(".question_text").html(nomor + ". " + question)
    $("[name='questiondetailid']").val(questiondetailid)
    $(".question_choice_a").html("A ."+choice_a)
    $(".question_choice_b").html("B ."+choice_b)
    $(".question_choice_c").html("C ."+choice_c)
    $(".question_choice_d").html("D ."+choice_d)
    $(".question_choice_e").html("E ."+choice_e)
  })

  $(document).on('click',`[name='input_choice']`, function(){
    const questiondetailid = $("[name='questiondetailid']").val()
    const answer_id = $(".click-question").data('answer_id')
    const questionchecked = $(this).val()
    $(`[data-questionchecked='${questiondetailid}']`).val(questionchecked)
    $(`.click-question[data-questiondetailid="${questiondetailid}"]`).attr('data-checked',questionchecked)

    const data = new FormData()
    data.append('question_detail_id',questiondetailid)
    data.append('choice_order',questionchecked)
    data.append('answer_id',answer_id)

    $.ajax({
      'url' : "<?= base_url("api/answer/update") ?>",
      'type' : 'json',
      'method' : 'post',
      'processData': false,
      'contentType': false,
      'data' : data,
    })
  })

</script>