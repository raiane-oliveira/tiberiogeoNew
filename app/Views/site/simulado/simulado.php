<?= $this->extend('site/layout/default'); ?>

<?= $this->section('content');
header('Content-type: text/html; charset=utf8');
setlocale(LC_ALL,'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil');
 ?>

<div class="body-inner-content category-layout-6">
    <!-- single post start -->
    <!-- block post area start-->
    <section class="block-wrapper mt-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-8  mb-15">
                   <p>Coco mole</p>
                </div>
                
                <div class="col-lg-4">
                    <div class="right-sidebar-1">        
                    <?=view('site/side-favorite');?>
                    <?=view('site/side-category');?>
                    <?=view('site/side-cloud');?>
                    
                              </div>
                </div>
                
            </div><!-- row end-->
        </div>

    </section><!-- block area end-->
</div>
<?= $this->endSection(); ?>