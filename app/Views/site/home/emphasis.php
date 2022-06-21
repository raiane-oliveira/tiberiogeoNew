<section class="block-wrapper">
   <div class="container">
      <div class="row tab-content">
         <div class="col-lg-9 bg-dark-item">
            <div class="ts-grid-box ">

               <div class="row ts-grid-item ts-post-style-2">
                  <div class="col-lg-12">
                     <div class="post-list ts-grid-box ts-grid-box-heighlight text-white">
                        <!-- ts title end-->
                        <div class="row mb-12">
                           <div class="col-md-4">
                              <div class="ts-post-thumb">
                                 <?php
                                 $image = [
                                    'src' => base_url() . '/assets/img/' . $dataCategoryEmphasis['category'] . '/' . $dataCategoryEmphasis['slug'] . '/' . $dataCategoryEmphasis['image-main'],
                                    'class' => 'img-fludid',
                                    'height' => '150',
                                    'width' => '150'
                                 ];
                                 echo anchorArticle($dataCategoryEmphasis['category'], $dataCategoryEmphasis['slug'], img($image)); ?>

                              </div>
                           </div><!-- col lg end-->
                           <div class="col-md-8">
                              <div class="post-content text-white">
                                 <h3 class="post-title md">
                                    <?= anchorArticle($dataCategoryEmphasis['category'], $dataCategoryEmphasis['slug'], $dataCategoryEmphasis['title']); ?>

                                 </h3>
                                 <ul class="post-meta-info text-white">
                                    <li><i class="fa fa-clock-o"></i> <?= toDatePost($dataCategoryEmphasis['date']); ?></li>
                                 </ul>
                                 <p class="text-white"><?= $dataCategoryEmphasis['resume']; ?></p>

                              </div>
                           </div>
                        </div><!-- row end-->
                     </div>

                  </div>

               </div>
            </div>
         </div>

         <div class="col-lg-3">
            <div class="right-sidebar">
               <?= view('site/side-category'); ?>
            </div>
         </div>
      </div>
   </div>
</section>

<section class="block-wrapper">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
         <?=view('site/side-cloud');?>
         </div><!-- col end-->
      </div>
   </div>
</section>