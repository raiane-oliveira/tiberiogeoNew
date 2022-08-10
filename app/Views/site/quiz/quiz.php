<?= $this->extend('site/layout/default'); ?>

<?= $this->section('content');
header('Content-type: text/html; charset=utf8');
setlocale(LC_ALL, 'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil');
?>

<div class="body-inner-content category-layout-6">
    <!-- single post start -->
    <!-- block post area start-->

    <section class="block-wrapper mt-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-8  mb-15">
                    <div class="ts-grid-box entry-header">
                        <ol class="ts-breadcrumb">
                            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li><a href="#">Category</a></li>
                        </ol>
                        <div class="clearfix entry-cat-header">
                            <h2 class="ts-title float-left">Simulado</h2>
                        </div>
                    </div>

                    <div class="ts-grid-box content-wrapper single-post">
                        <?php if (session()->has('erro')) : ?>
                            <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                                <?= 'Escolha uma opção para continuar!' ?>
                            </div>
                        <?php endif; ?>
                        <div class="post-content-area">
                            <div class="entry-content">

                                <?= form_open('/quiz/sendQuestion');
                                echo form_hidden('idQuestion', $quizzes['id']);

                                $contQuestion = $quizzes['position'];

                                $nextQuestion = $contQuestion + 1;
                                $nextQuestion;
                                //foreach ($quizzes as $quiz) : 
                                ?>
                                <strong>Questão: <?= $contQuestion; ?> / <?= $totalQuizzes; ?></strong><br>
                                <hr>
                                <?php
                                if (session('message')) : ?>
                                    <h2 class="text-<?= session('status') ?>"><?= session('return'); ?></h2>
                                    <div class="radio-toolbar">
                                    <div class="fail">
                                    <h4 class="justify-question">
                                        <?php
                                            echo  session('key_check') .' ' . session('response_check'); ?>
                                    </h4>
                                    <i class="fa fa-2x fa-times"></i>
                                    </div>
                                    </div>
                                    <?php echo "<h3>" . $contQuestion . '. ' . session('question') . "</h3>"; ?>
                                    <div class="radio-toolbar">
                                        <div class="active">
                                            <h4 class="justify-question">
                                                <?php echo (session('key')) . ' ' . session('response_correct'); ?>
                                            </h4>
                                            <i class="fa fa-2x fa-check"></i>
                                        </div>
                                        <?php session()->remove('message') ?>
                                        <?php //session()->remove('key') ?>
                                        <hr>
                                        <?php if ($nextQuestion <= $totalQuizzes) : ?>
                                            <?= anchor('quiz/' . $nextQuestion, 'Próxima Questão', ['class' => 'btn btn-primary', 'onclick' => 'carregar()']); ?>
                                            <?= anchor('quiz/', 'Recomeçar', ['class' => '']); ?>
                                        <?php else : ?>
                                            <div class="alert alert-warning" role="alert">
                                                <h2 class="alert-heading">Seus Acertos ::
                                                    <?= session('hits'); ?> / <?= $totalQuizzes ?>
                                                    <?php session()->remove('hits'); ?>
                                                </h2>
                                                <?= anchor('quiz/', 'Recomeçar', ['class' => 'btn btn-primary', 'onclick' => 'carregar()']); ?>
                                            </div>
                                        <?php endif ?>
                                    </div>

                                <?php else : ?>
                                    <h3> <?= $contQuestion . '. ' . $quizzes['question']; ?></h3>
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