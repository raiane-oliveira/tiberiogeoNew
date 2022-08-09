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
                        <div class="post-content-area">
                            <div class="entry-content">
                                <?= form_open('/quiz/sendQuestion');
                                echo form_hidden('idQuestion', $quizzes['id']);
                                $contQuestion = 1;
                                //foreach ($quizzes as $quiz) : 
                                ?>
                                <strong>Questão: <?= $contQuestion; ?> / <?= $totalQuizzes; ?></strong>
                                <hr>
                                <h3> <?= $quizzes['question']; ?></h3>
                                <?php shuffle($quizzes['alternatives']);
                                foreach ($quizzes['alternatives'] as $key => $alternatives) : ?>
                                    <div class="form-check">
                                        <input class="form-check-input justify-question" type="radio" name="alternative" id="<?= $alternatives['id']; ?>" value="<?= $alternatives['id']; ?>">
                                        <label class="form-check-label justify-question" for="<?= $alternatives['id']; ?>">
                                            <?= convertNumberString($key) . ' ' . $alternatives['alternative']; ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                                <hr>
                                <button type="submit" class="btn btn-primary">Enviar</button>
                                <p><?=session('resposta');
                                session()->remove('resposta')?></p>
                                <?php $contQuestion++;
                                //endforeach; 
                                ?>
                                <?= form_close(); ?>
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