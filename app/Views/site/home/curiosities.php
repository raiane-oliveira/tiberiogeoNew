<section class="block-wrapper mt-15">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="ts-grid-box clearfix ts-category-title">
               <h2 class="ts-title float-left">Curiosidades</h2><div class="float-right">
                        <?=anchor('/category/curiosity',"+ mais", ['class'=>'view-all-link']);?>
                       
                    </div>
            </div>
            <div class="row ts-col-list-post">
            <?php
            $count = 1;
            foreach ($dataCuriosity as $item) :
               if ($count <= 6) :
                  if ($count % 2 == 0) :
                     $class = 'yellow';
                  elseif ($count % 3 !== 0) :
                     $class = "pink";
                  else :
                     $class = "blue-light";
                  endif;
            ?>
               <div class="col-lg-4 col-md-6 mb-30">
                  <div class="ts-grid-box ts-grid-content"><a class="post-cat ts-<?=$class;?>-bg" href="#">Travel</a>
                     <div class="ts-post-thumb"><a href="#">
                     <?php
                        $image = [
                           'src' => base_url() . '/assets/img/' . $item['category'] . '/' . $item['image-main'],
                           'class' => 'img-fluid',
                        ];
                        echo anchorArticle($item['category'], $item['title'], img($image)); ?>

                     </div>
                     <div class="post-content">
                        <h3 class="post-title">
                           <?=anchorArticle($item['category'],$item['title'],$item['title']);?>
                           
                        </h3><span class="post-date-info"><i class="fa fa-clock-o"></i> March 21, 2019</span>
                     </div>
                  </div><!-- ts grid box-->
               </div><!-- col end-->
               <?php endif;
               $count++;
            endforeach; ?>
                </div>
         </div>
         
      </div><!-- row end-->
   </div><!-- container end-->
</section>
<!-- post wraper end-->