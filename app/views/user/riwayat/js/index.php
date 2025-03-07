<script>

  setTimeout(() => {
    $(".click-question").first().trigger('click')
  },500)

  // setInterval(() => {
  //   $(".click-question").each(function() {
  //       var now_element = $(this)
  //       if (now_element.attr('data-checked') != '' && !now_element.hasClass('bg-orange')) {
  //           now_element.removeClass('bg-grey')
  //           now_element.addClass('bg-green')
  //       }else{
  //           now_element.removeClass('bg-green')
  //       }
  //   });
  // }, 100);


  $(document).on('click',`.click-question`, function(){
    // $('.click-question').removeClass('bg-orange')
    // $('.click-question').addClass('bg-grey')
    // $(this).removeClass('bg-grey')
    // $(this).addClass('bg-orange')

    // $('.click-question').removeClass('active')
    $(this).addClass('active')

    const questiondetailid = $(this).data('questiondetailid')
    const questionchecked = $(this).data('questionchecked')
    const question = $(this).data('question')
    const nomor = $(this).data('nomor')
    let checked = $(this).attr('data-checked')
    const image = $(this).data('image')
    const description = $(this).data('description')
    const choice_A = $(this).data('choice_a')
    const choice_B = $(this).data('choice_b')
    const choice_C = $(this).data('choice_c')
    const choice_D = $(this).data('choice_d')
    const choice_E = $(this).data('choice_e')
    const point_A = $(this).data('point_a')
    const point_B = $(this).data('point_b')
    const point_C = $(this).data('point_c')
    const point_D = $(this).data('point_d')
    const point_E = $(this).data('point_e')

    let bg_selected = 'bg-green'
    if( point_A == 0 ||
        point_B == 0 ||
        point_C == 0 ||
        point_D == 0 ||
        point_E == 0
    ){
      bg_selected = 'bg-red'
      checked2 = checked.toLowerCase()
      if($(this).data('point_'+checked2) != 0){
        bg_selected = 'bg-green'
      }
    }else{
      bg_selected = 'bg-red'
      const maxValue = Math.max(point_A, point_B, point_C, point_D, point_E)
      checked2 = checked.toLowerCase()
      if($(this).data('point_'+checked2) == maxValue){
        bg_selected = 'bg-green'
      }
    }

    $(`[name='input_choice']`).parent('td').removeClass('bg-red')
    $(`[name='input_choice']`).parent('td').removeClass('bg-green')
    $(`[name='input_choice']`).addClass('text-dark')
    $(`[name='input_choice']`).removeClass('text-white')
    $(`.question_choice_A`).addClass('text-dark')
    $(`.question_choice_B`).addClass('text-dark')
    $(`.question_choice_C`).addClass('text-dark')
    $(`.question_choice_D`).addClass('text-dark')
    $(`.question_choice_E`).addClass('text-dark')
    $(`.question_choice_A`).removeClass('text-white')
    $(`.question_choice_B`).removeClass('text-white')
    $(`.question_choice_C`).removeClass('text-white')
    $(`.question_choice_D`).removeClass('text-white')
    $(`.question_choice_E`).removeClass('text-white')
    $(`.question_point_A`).addClass('text-dark')
    $(`.question_point_B`).addClass('text-dark')
    $(`.question_point_C`).addClass('text-dark')
    $(`.question_point_D`).addClass('text-dark')
    $(`.question_point_E`).addClass('text-dark')
    $(`.question_point_A`).removeClass('text-white')
    $(`.question_point_B`).removeClass('text-white')
    $(`.question_point_C`).removeClass('text-white')
    $(`.question_point_D`).removeClass('text-white')
    $(`.question_point_E`).removeClass('text-white')

    $(`[name='input_choice'][data-value="${checked}"]`).removeClass('text-dark')
    $(`[name='input_choice'][data-value="${checked}"]`).addClass('text-white')
    $(`.question_choice_${checked}`).removeClass('text-dark')
    $(`.question_choice_${checked}`).addClass('text-white')
    $(`.question_point_${checked}`).removeClass('text-dark')
    $(`.question_point_${checked}`).addClass('text-white')
    $(`[name='input_choice'][data-value="${checked}"]`).parent('td').addClass(bg_selected)

    $(".question_image").addClass('d-none')
    if(image){
    $(".question_image").removeClass('d-none')
      $(".question_image").attr('src',"<?= base_url() ?>"+image)
    }

    $(".table-question").removeClass('d-none')
      $(".question_text").html(nomor + ". " + question)
    $("[name='questiondetailid']").val(questiondetailid)
    $(".question_choice_A").html(choice_A)
    $(".question_choice_B").html(choice_B)
    $(".question_choice_C").html(choice_C)
    $(".question_choice_D").html(choice_D)
    $(".question_choice_E").html(choice_E)
    // $(".question_choice_"+checked).append(`<br><small>${description}</small>`)
    $(".pembahasan").html(description)
    $(".question_point_A").html(point_A)
    $(".question_point_B").html(point_B)
    $(".question_point_C").html(point_C)
    $(".question_point_D").html(point_D)
    $(".question_point_E").html(point_E)
  })

</script>