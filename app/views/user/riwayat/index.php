<div class="container">

    <ol class="breadcrumb bg-light mt-3 mb-3">
        <li class="breadcrumb-item"><a href="<?= base_url('user/dashboard') ?>">Home</a></li>
        <li class="breadcrumb-item text-dark"><a href="<?= base_url('user/hasil') ?>">Hasil</a></li>
    </ol>

    <h1 class="h3 text-gray-800"><?= $question['title'] ?></h1>
    <p><?= $question['description'] ?></p>

    <div class="row">
        <div class="col-sm-12 mb-5">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="statistik-tab" data-toggle="tab" data-target="#statistik" type="button" role="tab" aria-controls="statistik" aria-selected="true">Statistik</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pembahasan-tab" data-toggle="tab" data-target="#pembahasan" type="button" role="tab" aria-controls="pembahasan" aria-selected="false">Pembahasan</button>
                </li>
            </ul>
            <div class="tab-content" style="margin-bottom: 120px;" id="myTabContent">
                <div class="tab-pane mb-5 fade show active" id="statistik" role="tabpanel" aria-labelledby="statistik-tab">
                    <div class="row mb-5">
                        <?php if ($question['type'] == 'exam'): ?>
                        <div class="col-sm-6  text-decoration-none">
                            <div class="bg-warning p-4 my-3 text-white rounded shadow" style="height:210px">
                                <h4>Skor Akhir</h4>
                                <h4><?= $count_point ?> dari <?= $total_point ?></h4>
                                <?php if ($kelulusan == 1): ?>
                                    <h6 class="bg-green font-weight-bold rounded px-4 py-3" style="line-height:30px">Selamat anda lulus <?= $question['title'] ?></h6>
                                <?php else: ?>
                                    <h6 class="bg-red font-weight-bold rounded px-4 py-3" style="line-height:30px">Maaf anda belum lulus <?= $question['title'] ?> Harap belajar Lebih giat lagi </h6>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-sm-6 text-decoration-none">
                            <div class="bg-warning p-4 my-3 text-white rounded shadow" style="height:210px">
                                <p>Skor Tes Wawasan Kebangsaan : <?= $question['count_point_twk'] ?> (Passing Grade <?= $question['pg_twk'] ?>)</p>
                                <p>Skor Tes Intelegensia Umum : <?= $question['count_point_tiu'] ?> (Passing Grade <?= $question['pg_tiu'] ?>)</p>
                                <p>Skor Tes Karakteristik Pribadi : <?= $question['count_point_tkp'] ?> (Passing Grade <?= $question['pg_tkp'] ?>)</p>
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="col-sm-12  text-decoration-none">
                            <div class="bg-warning w-50 p-4 my-3 text-white rounded shadow" style="height:115px">
                                <h4>Skor Akhir</h4>
                                <h4><?= $count_point ?> dari <?= $total_point ?></h4>
                            </div>
                        </div>
                        <?php endif ?>
                        <div class="col-sm-12 mb-4">
                            <h3 class="mt-3">Detail Paket</h3>
                            <div class="card">
                                <table class="table">
                                    <tr>
                                        <th>Nama</th>
                                        <td><?= $question['title'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Waktu</th>
                                        <td><?= $question['time'] ?> Menit</td>
                                    </tr>
                                    <?php if ($question['type'] == "exam"): ?>
                                    <tr>
                                        <th>Passing Grade TWK</th>
                                        <td><?= $question['pg_twk'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Passing Grade TIU</th>
                                        <td><?= $question['pg_tiu'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Passing Grade TKP</th>
                                        <td><?= $question['pg_tkp'] ?></td>
                                    </tr>
                                    <?php endif ?>
                                </table>
                            </div>
                        </div>
                        <?php if ($question['type'] == 'exam'): ?>
                        <div class="col-sm-12 mb-5">
                            <h3 class="mt-1">Ranking</h3>
                            <div class="card">
                                <table class="table bg-white">
                                    <thead>
                                        <tr>
                                            <th>Rank</th>
                                            <th>Tanggal</th>
                                            <th>Nama User</th>
                                            <th>TWK</th>
                                            <th>TIU</th>
                                            <th>TKP</th>
                                            <th>Total Nilai</th>
                                            <th>Kelulusan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($answer as $key => $value): ?>
                                        <tr>
                                            <td><?= $key+1 ?></td>
                                            <td><?= explode(' ',$value['date'])[0] ?></td>
                                            <td><?= $value['name'] ?></td>
                                            <td><?= $value['count_point_twk'] ?></td>
                                            <td><?= $value['count_point_tiu'] ?></td>
                                            <td><?= $value['count_point_tkp'] ?></td>
                                            <td><?= $value['count_point'] ?></td>
                                            <td><?= $value['kelulusan'] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php endif ?>

                    </div>
                </div>
                <div class="tab-pane mb-5 fade" id="pembahasan" role="tabpanel" aria-labelledby="pembahasan-tab">
                    <div class="row mx-1">
                        <div class="col-sm-8 mt-3 px-4 py-4 bg-light rounded mb-5">
                          <input type="hidden" name="questiondetailid">
                          <p class="question_text text-dark font-weight-bold"></p>
                          <img src="" width="50%" class="question_image mb-3">
                          <table class="table table-question d-none">
                            <tr>
                              <td class="d-flex align-items-center justify-content-start row">
                                 <span class="col-sm-1"readonly name="input_choice" data-value="A">A</span>
                                 <label class="col-sm-9  ml-3 mt-2 question_choice_A"></label>
                                 <label class="col-sm-1  ml-3 mt-2 question_point_A"></label>
                             </td>
                         </tr>
                         <tr>
                            <td class="d-flex align-items-center justify-content-start row">
                               <span class="col-sm-1"readonly name="input_choice" data-value="B">B</span>
                               <label class="col-sm-9  ml-3 mt-2 question_choice_B"></label>
                               <label class="col-sm-1  ml-3 mt-2 question_point_B"></label>
                           </td>
                       </tr>
                       <tr>
                          <td class="d-flex align-items-center justify-content-start row">
                             <span class="col-sm-1"readonly name="input_choice" data-value="C">C</span>
                             <label class="col-sm-9  ml-3 mt-2 question_choice_C"></label>
                             <label class="col-sm-1  ml-3 mt-2 question_point_C"></label>
                         </td>
                     </tr>
                     <tr>
                        <td class="d-flex align-items-center justify-content-start row">
                           <span class="col-sm-1"readonly name="input_choice" data-value="D">D</span>
                           <label class="col-sm-9  ml-3 mt-2 question_choice_D"></label>
                           <label class="col-sm-1  ml-3 mt-2 question_point_D"></label>
                       </td>
                   </tr>
                   <tr>
                      <td class="d-flex align-items-center justify-content-start row">
                         <span class="col-sm-1"readonly name="input_choice" data-value="E">E</span>
                         <label class="col-sm-9  ml-3 mt-2 question_choice_E"></label>
                         <label class="col-sm-1  ml-3 mt-2 question_point_E"></label>
                     </td>
                 </tr>
             </table>
             <div class="bg-white rounded p-3">
             <p>Pembahasan</p>
             <small class="pembahasan"></small>
             </div>
         </div>

         <div class="col-sm-12 mb-5">
            <?php foreach ($question_detail as $key => $value): 
                $bg_selected = 'bg-green';
                if( $value['choice'][0]['point'] == 0 ||
                    $value['choice'][1]['point'] == 0 ||
                    $value['choice'][2]['point'] == 0 ||
                    $value['choice'][3]['point'] == 0 ||
                    $value['choice'][4]['point'] == 0
                ){
                  $bg_selected = 'bg-red';
                  $point_checked = 0;
                  if("A" == $value['checked']){
                    $point_checked = $value['choice'][0]['point'];
                  }elseif("B" == $value['checked']){
                    $point_checked = $value['choice'][1]['point'];
                  }elseif("C" == $value['checked']){
                    $point_checked = $value['choice'][2]['point'];
                  }elseif("D" == $value['checked']){
                    $point_checked = $value['choice'][3]['point'];
                  }elseif("E" == $value['checked']){
                    $point_checked = $value['choice'][4]['point'];
                  }
                  if($point_checked != 0){
                    $bg_selected = 'bg-green';
                  }
                }else{
                    $maxValue = max($value['choice'][0]['point'], $value['choice'][1]['point'], $value['choice'][2]['point'], $value['choice'][3]['point'], $value['choice'][4]['point']);
                    $bg_selected = 'bg-red';
                    $point_checked = 0;
                    if("A" == $value['checked']){
                        $point_checked = $value['choice'][0]['point'];
                      }elseif("B" == $value['checked']){
                        $point_checked = $value['choice'][1]['point'];
                      }elseif("C" == $value['checked']){
                        $point_checked = $value['choice'][2]['point'];
                      }elseif("D" == $value['checked']){
                        $point_checked = $value['choice'][3]['point'];
                      }elseif("E" == $value['checked']){
                        $point_checked = $value['choice'][4]['point'];
                    }
                    if($point_checked == $maxValue){
                        $bg_selected = 'bg-green';
                    }
                }
            ?>
                <div 
                class="<?= $value['checked'] == '' ? 'bg-grey' : $bg_selected ?> rounded py-2 my-2 text-white text-center click-question" 
                style="cursor: pointer;width: 40px;display: inline-block;"
                data-questiondetailid="<?= $value['id'] ?>"
                data-checked="<?= $value['checked'] ?>"
                data-nomor="<?= $key+1 ?>"
                data-question="<?= $value['question'] ?>"
                data-answer_id="<?= $value['answer_id'] ?>"
                data-image="<?= $value['image'] ?>"
                data-description="<?= $value['description'] ?>"
                data-choice_A="<?= $value['choice'][0]['text'] ?>"
                data-choice_B="<?= $value['choice'][1]['text'] ?>"
                data-choice_C="<?= $value['choice'][2]['text'] ?>"
                data-choice_D="<?= $value['choice'][3]['text'] ?>"
                data-choice_E="<?= $value['choice'][4]['text'] ?>"
                data-point_A="<?= $value['choice'][0]['point'] ?>"
                data-point_B="<?= $value['choice'][1]['point'] ?>"
                data-point_C="<?= $value['choice'][2]['point'] ?>"
                data-point_D="<?= $value['choice'][3]['point'] ?>"
                data-point_E="<?= $value['choice'][4]['point'] ?>"
                ><?= $key+1 ?></div>
        <?php endforeach ?>
</div>
</div>
</div>
</div>
</div>
</div>

</div>
