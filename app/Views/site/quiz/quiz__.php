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
                    <div class="ts-grid-box content-wrapper single-post">
                        <div class="entry-content">
                            <div class="post-content-area">


                                <?= form_open('/quiz/sendQuestion');

                                //foreach ($quizzes as $quiz) : 
                                ?>
                                <div class="clearfix entry-cat-header">
                                    <h2 class="ts-title float-left">Simulado</h2>
                                </div>
                                <br>

                                <?php if (session()->has('erro')) : ?>
                                    <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                                        <?= $erro->getError().'Escolha uma opção para continuar!' ?>
                                    </div>
                                <?php endif; ?>

                                <hr>

                                <?php //dd($erro); 
                                foreach ($quizzes as $quiz):
                                echo form_input('id_question'.$quiz['id'], $quiz['id']);
                                ?>


                                <strong>Questão: <?= $quiz['position']; ?> / <?= $totalQuizzes; ?></strong><br>
                                
                                <br>
                                <h3> <?= $quiz['position'] . '. ' . $quiz['question']; ?></h3>
                                <?php if ($quiz['img']) : ?>
                                    <img class="img-fluid" src="<?= base_url() . '/assets/img/quiz/' . $quiz['img']; ?>" />
                                    <br>
                                <?php endif; ?>
                                <div class="radio-toolbar">
                                    <?php //shuffle($quizzes['alternatives']);
                                    //dd($quizzes['alternatives']);
                                    foreach ($quiz['alternatives'] as $key => $alternatives) : ?>
                                        <div class="form-check">
                                            <input class="form-check-input justify-question" type="radio" name="alternative<?=$quiz['id'];?>" id="<?= $alternatives['id']; ?>" value="<?= $alternatives['id']; ?>" <?= set_radio('alternative'.$quiz['id'], $alternatives['id'], false) ?>>
                                            <label class="form-check-label justify-question" for="<?= $alternatives['id']; ?>">
                                                <?= convertNumberString($key) . ' ' . $alternatives['alternative']; ?>
                                            </label>
                                        </div>
                                        <?php endforeach; ?>
                                        <span style="color:red" class="font-italic font-weight-bold"><?php echo $erro !== '' ? $erro->getError() : ''; ?></span>
                                </div>
                                <hr>
                                <?php endforeach; 
                                ?>
                                <button type="submit" class="btn btn-primary" onclick="carregar()">Enviar</button>
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