<section class="block-wrapper">
   <div class="container">
      <div class="row">
         <div class="col-lg-9">
            <div class="ts-grid-box bg-dark-item">
              
               <div class="row ts-grid-item ts-post-style-2">
                  <div class="col-lg-12">
                     <div class="post-list ts-grid-box ts-grid-box-heighlight text-white">
                        <!-- ts title end-->
                        <div class="row mb-12">
                           <div class="col-md-3">
                              <div class="ts-post-thumb">
                                 <?php
                                 $image = [
                                    'src' => base_url() . '/assets/img/' . $dataCategoryEmphasis['category'] . '/' . $dataCategoryEmphasis['image-main'],
                                    'class' => 'img-fluid',
                                 ];
                                 echo anchorArticle($dataCategoryEmphasis['category'], $dataCategoryEmphasis['title'], img($image)); ?>

                              </div>
                           </div><!-- col lg end-->
                           <div class="col-md-9">
                              <div class="post-content text-white">
                                 <h3 class="post-title md"><a href="#"><?= $dataCategoryEmphasis['title']; ?></a></h3>
                                 <ul class="post-meta-info text-white">
                                    <li><a href="">Devid Ronald</a></li>
                                    <li><i class="fa fa-clock-o"></i> March 21, 2019</li>
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
               <?=view('site/side-category');?>
               <div class="widgets widget-banner"><a href="#"><img class="img-fluid" src="images/banner/sidebar-banner1.jpg" alt=""></a></div>
            </div>
         </div>
      </div>
   </div>
</section>