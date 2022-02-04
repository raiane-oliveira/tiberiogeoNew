<?= $this->extend('site/layout/default'); ?>

<?= $this->section('content') ?>
<!-- single post start -->

    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="error-page text-center col ts-grid-box">
                        <div class="error-code">
                            <h2><strong style="color: #808080;">OPS!</strong></h2>
                        </div>
                        <div class="error-message">
                            <h3><?= $message; ?></h3>
                        </div>
                        <div class="error-body">
                            <h4>O link que você seguiu provavelmente está quebrado ou a página foi removida.</h4>                         
                        </div>
                    </div>
                </div>
            </div><!-- Row end -->
        </div><!-- Container end -->
    </section><!-- footer social list start-->
<?= $this->endSection(); ?>