<?= $this->extend('site/layout/default'); ?>

<?= $this->section('content');

header('Content-type: text/html; charset=utf8');
setlocale(LC_ALL, 'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil');

if(session('control') != $quizzes['position'])
{  
    //session()->remove('hits');
    //return redirect()->to('/school');
    //print_r(session('control'));
};
?>

<div class="body-inner-content category-layout-6">
    <!-- single post start -->
    <!-- block post area start-->

    <section class="block-wrapper mt-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-8  mb-15"> 
                    <div class="ts-grid-box content-wrapper single-post">
                        <div class="entry-content">
                            <div class="post-content-area">
                            <?=session('hits');?>
                            <?= form_open('/quiz/sendQuestion');
                                echo form_hidden('idQuestion', $quizzes['id']);

                                $contQuestion = $quizzes['position'];

                                $nextQuestion = $contQuestion + 1;
                                $nextQuestion;
                                //foreach ($quizzes as $quiz) : 
                                ?>
                                 <div class="clearfix entry-cat-header">
                            <h2 class="ts-title float-left">Simulado</h2>
                        </div>
                        <br>
                        <?php if (session()->has('erro')) : ?>
                                <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                                    <?= 'Escolha uma opção para continuar!' ?>
                                </div>
                            <?php endif; ?>
                            
                                <strong>Questão: <?= $contQuestion; ?> / <?= $totalQuizzes; ?></strong><br>
                                <hr>
                                <?php
                                if (session('message')) : ?>
                                    <h2 class="text-<?= session('status') ?>"><?= session('return'); ?></h2>
                                    <?php if (session('status') == 'danger') : ?>
                                        <div class="radio-toolbar">
                                            <div class="fail">
                                                <i class="fa fa-2x fa-times"></i>
                                                <h4 class="justify-question">
                                                    <?php
                                                    echo  session('key_check') . ' ' . session('response_check'); ?>
                                                </h4>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php 
                                    echo "<h3>" . $contQuestion . '. ' . session('question') . "</h3>"; 
                                    if(session('img')):?>
                                    
                                     <img class="img-fluid" src="<?=base_url().'/assets/img/quiz/'.session('img');?>"/>
                                     <br>
                                     <?php endif;?>
                                    <div class="radio-toolbar">
                                        <div class="active">
                                            <i class="fa fa-2x fa-check"></i>
                                            <h4 class="justify-question">
                                                <?php echo (session('key')) . ' ' . session('response_correct'); ?>
                                            </h4>
                                        </div>
                                        <?php session()->remove('message') ?>
                                        <?php //session()->remove('key') 
                                        ?>
                                        <hr>
                                        <?php if ($nextQuestion <= $totalQuizzes) : ?>
                                            <?= anchor('quiz/' . $nextQuestion, 'Próxima Questão', ['class' => 'btn btn-primary', 'onclick' => 'carregar()']); ?>
                                            <?= anchor('quiz/', 'Recomeçar', ['class' => 'btn btn-link']); ?>
                                            <?php else : ?>
                                                <?php $aproveitamento = floor((session('hits') / $totalQuizzes) * 100);?>
                                                <div class="alert alert-warning" role="alert">
                                                    <h4 class="alert-heading">ACERTOS ::
                                                        </h4>
                                                        <div class="check">
                                                            <div class="item">
                                                                <h1>
                                                                    <?= session('hits'); ?>/<?= $totalQuizzes ?>
                                                                </h1>
                                                            </div>
                                                    <div class="item">
                                                        <p style="font-size: 50px; align-items: center; align-content: center ;"><?=defineEmotion($aproveitamento);?></p>
                                                    </div>
                                                </div>
                                                <h4>Você acertou <?= session('hits'); ?> de <?= $totalQuizzes; ?> </h4>

                                                <?php

                                                ?>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: <?= $aproveitamento; ?>%;" aria-valuenow="<?= $aproveitamento; ?>" aria-valuemin="0" aria-valuemax="100"><?= $aproveitamento; ?>%</div>

                                                </div>
                                                <?php session()->remove('hits'); ?>
                                                <br>
                                                <?= anchor('quiz/', 'Recomeçar', ['class' => 'btn btn-primary', 'onclick' => 'carregar()']); ?>
                                            </div>
                                        <?php endif ?>
                                    </div>

                                <?php else : ?>
                                    <h3> <?= $contQuestion . '. ' . $quizzes['question']; ?></h3>
                                    <?php if($quizzes['img']):?>
                                    <img class="img-fluid" src="<?=base_url().'/assets/img/quiz/'.$quizzes['img'];?>"/>
                                    <br>
                                    <?php endif;?>
                                    <div class="radio-toolbar">
                                        <?php //shuffle($quizzes['alternatives']);
                                        //dd($quizzes['alternatives']);
                                        foreach ($quizzes['alternatives'] as $key => $alternatives) : ?>
                                            <div class="form-check">
                                                <input class="form-check-input justify-question" type="radio" name="alternative" id="<?= $alternatives['id']; ?>" value="<?= $alternatives['id']; ?>">
                                                <label class="form-check-label justify-question" for="<?= $alternatives['id']; ?>">
                                                    <?= convertNumberString($key) . ' ' . $alternatives['alternative']; ?>
                                                </label>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-primary" onclick="carregar()">Enviar</button>
                                    <?php $contQuestion++;
                                    //endforeach; 
                                    ?>
                                    <?= form_close(); ?>
                                <?php endif ?>

                            </div><!-- entry content end-->
                        </div><!-- post content area-->

                    </div>

                </div>

                <div class="col-lg-4">
                    <div class="right-sidebar-1">
                        <?= view('site/side-favorite'); ?>
                        <?= view('site/side-category'); ?>
                        <?= view('site/side-cloud'); ?>

                    </div>
                </div>

            </div><!-- row end-->
        </div>

    </section><!-- block area end-->
</div>
<?= $this->endSection(); ?>