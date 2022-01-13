
<section class="top-bar bg-dark-item">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center md-center-item">
                <div class="ts-temperature">
                    <i class="fa fa-thermometer-empty" aria-hidden="true"></i>
                    <span id="tempo"><?=$data_temperature['results']['temp'];?></span>
                    <span><b>c</b></span> | <i class="fa fa-map-marker"></i>
                    <span id="city"><?=$data_temperature['results']['city'];?></span> | <img src="<?=base_url();?>/assets/images/temperature/<?php echo $data_temperature['results']['img_id']; ?>.png" class="imagem-do-tempo">
                    <span id="description"><?=$data_temperature['results']['description'];?></span> | 
                   
                    
                </div>
                <ul class="ts-top-nav">
                    <!--<li><a href="#">Blog</a></li>
            <li><a href="#">Forums</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Advertisement</a></li>-->
                </ul>
            </div>
            <!-- end col-->
            <div class="col-lg-6 text-right align-self-center">
                <ul class="top-social">
                    <li>
                        <?=defineSocial('facebook', getenv('FACEBOOK'));?>
                        <?=defineSocial('twitter', getenv('TWITTER'));?>                        
                    </li>
                    <li class="ts-date"><i class="fa fa-clock-o"></i> <?=$date_now;?></li>
                </ul>
            </div>
            <!--end col -->
        </div>
        <!-- end row -->
    </div>
</section>
<!-- end top bar-->
<!-- ad banner start -->