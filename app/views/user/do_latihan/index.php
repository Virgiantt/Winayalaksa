<div class="container">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 my-0 text-gray-800">Kerjakan Latihan</h1>
    <div>
        <a href="<?= base_url('user/latihan/') . $question_detail[0]['answer_id'] ?>" onclick="return confirm('Yakin untuk membatalkan Latihan?')" class="btn btn-danger">Batalkan</a>
        <a href="<?= base_url('user/riwayat/') . $question_detail[0]['answer_id'] ?>" onclick="return confirm('Yakin untuk mengakhiri Latihan?')" class="btn btn-primary">Selesai</a>
    </div>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
  </div>


  <input type="hidden" name="answerid" value="<?= $question_detail[0]['answer_id'] ?>">
  <div class="row mx-1 mb-5">
    <div class="col-sm-8 mt-3 px-4 py-4 bg-light rounded mb-5">
      <input type="hidden" name="questiondetailid">
      <p class="question_text text-dark"></p>
      <img src="" width="50%" class="question_image mb-3">
      <table class="table table-question table-bordered d-none">
        <tr>
          <td class="d-flex align-items-center justify-content-start">
           <input style="transform: scale(1.5);" type="radio" name="input_choice" value="A">
           <label class="ml-3 mt-2 question_choice_a"></label>
         </td>
       </tr>
       <tr>
        <td class="d-flex align-items-center justify-content-start">
         <input style="transform: scale(1.5);" type="radio" name="input_choice" value="B">
         <label class="ml-3 mt-2 question_choice_b"></label>
       </td>
     </tr>
     <tr>
      <td class="d-flex align-items-center justify-content-start">
       <input style="transform: scale(1.5);" type="radio" name="input_choice" value="C">
       <label class="ml-3 mt-2 question_choice_c"></label>
     </td>
   </tr>
   <tr>
    <td class="d-flex align-items-center justify-content-start">
     <input style="transform: scale(1.5);" type="radio" name="input_choice" value="D">
     <label class="ml-3 mt-2 question_choice_d"></label>
   </td>
 </tr>
 <tr>
  <td class="d-flex align-items-center justify-content-start">
   <input style="transform: scale(1.5);" type="radio" name="input_choice" value="E">
   <label class="ml-3 mt-2 question_choice_e"></label>
 </td>
</tr>
</table>
<hr>
    <button class="btn btn-primary btn-prev" type="button">
        Sebelumnya
    </button>
    <button class="btn btn-primary btn-next" type="button">
        Selanjutnya
    </button>
<br><br>
</div>
<div class="col-sm-4 mt-3">
    <h4 class="alert mb-3 alert-primary">Waktu Tersisa: <span id="timer">0</span></h4>
    <div class="mb-4 text-center">
        <h6 class="alert my-0 alert-danger">Mohon Tidak Refresh Halaman, ketika Refresh Halaman anda akan dianggap selesai mengerjakan</h6>
    </div>
</div>

<div class="col-sm-12 mb-5">
    <?php foreach ($question_detail as $key => $value): ?>
        <div 
        class="bg-grey rounded py-2 my-2 text-white text-center click-question" 
        style="cursor: pointer;width: 40px;display: inline-block;"
        data-questiondetailid="<?= $value['id'] ?>"
        data-nomor="<?= $key+1 ?>"
        data-checked="<?= $value['checked'] ?>"
        data-question="<?= $value['question'] ?>"
        data-answer_id="<?= $value['answer_id'] ?>"
        data-image="<?= $value['image'] ?>"
        data-description="<?= $value['description'] ?>"
        data-choice_a="<?= $value['choice'][0]['text'] ?>"
        data-choice_b="<?= $value['choice'][1]['text'] ?>"
        data-choice_c="<?= $value['choice'][2]['text'] ?>"
        data-choice_d="<?= $value['choice'][3]['text'] ?>"
        data-choice_e="<?= $value['choice'][4]['text'] ?>"
        ><?= $key+1 ?></div>
<?php endforeach ?>
</div>
</div>

</div>