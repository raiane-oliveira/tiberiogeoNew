<header class="header-standerd">
    <div class="container">
        <div class="row">

            <!-- logo end-->
            <div class="col-lg-12 header-nav-item">

                <!--nav top end-->
                <nav class="navigation ts-main-menu navigation-landscape">
                    <div class="nav-header">
                        <div class="nav-toggle"></div>
                    </div>
                    <!--nav brand end-->
                    <div class="nav-menus-wrapper clearfix">
                        <ul class="nav-menu">
                            <li><?= anchor('/', "HOME"); ?></li>

                            <li>
                                <?= anchor('/category/world', "MUNDO"); ?>
                                <div class="megamenu-panel">
                                    <div class="row">
                                        <?php
                                        $count = 1;
                                        foreach ($dataMenuWorld as $item) :
                                            if ($count <= 4) :
                                        ?>
                                                <div class="col-12 col-lg-3">
                                                    <div class="item">
                                                        <div class="ts-post-thumb">
                                                            <?= anchorArticle(
                                                                $item['category'],
                                                                $item['title'],
                                                                '<img class="img-fluid" src="' . base_url() . '/assets/img/' . $item['category'] . '/' . $item['image-main'] . '" alt="">'
                                                            ); ?>
                                                        </div>
                                                        <div class="post-content">
                                                            <h3 class="post-title">
                                                                <?= anchorArticle($item['category'], $item['title'], $item['title']); ?>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                            endif;
                                            $count++;
                                        endforeach; ?>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <?= anchor('/category/brazil', "BRASIL"); ?>
                                <div class="megamenu-panel">
                                    <div class="row">
                                        <?php
                                        $count = 1;
                                        foreach ($dataMenuBrazil as $item) :
                                            if ($count <= 4) :
                                        ?>
                                                <div class="col-12 col-lg-3">
                                                    <div class="item">
                                                        <div class="ts-post-thumb">
                                                            <?= anchorArticle(
                                                                $item['category'],
                                                                $item['title'],
                                                                '<img class="img-fluid" src="' . base_url() . '/assets/img/' . $item['category'] . '/' . $item['image-main'] . '" alt="">'
                                                            ); ?>
                                                        </div>
                                                        <div class="post-content">
                                                            <h3 class="post-title">
                                                                <?= anchorArticle($item['category'], $item['title'], $item['title']); ?>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                            endif;
                                            $count++;
                                        endforeach; ?>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <?= anchor('/category/geography', "GEOGRAFIA"); ?>
                                <div class="megamenu-panel">
                                    <div class="row">
                                        <?php
                                        $count = 1;
                                        foreach ($dataMenuGeography as $item) :
                                            if ($count <= 4) :
                                        ?>
                                                <div class="col-12 col-lg-3">
                                                    <div class="item">
                                                        <div class="ts-post-thumb">
                                                            <?= anchorArticle(
                                                                $item['category'],
                                                                $item['title'],
                                                                '<img class="img-fluid" src="' . base_url() . '/assets/img/' . $item['category'] . '/' . $item['image-main'] . '" alt="">'
                                                            ); ?>
                                                        </div>
                                                        <div class="post-content">
                                                            <h3 class="post-title">
                                                                <?= anchorArticle($item['category'], $item['title'], $item['title']); ?>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                            endif;
                                            $count++;
                                        endforeach; ?>
                                    </div>
                                </div>
                            </li>
                            <li><?= anchor('/school', "ESCOLA"); ?></li>
                            <?php                             
                            if(getEnv('CI_ENVIRONMENT') === 'development'): ?>
                             <li>
                            <?= anchor('/school', "ADMIN"); ?>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><?= anchor('/build/create', "CRIAR ARTIGO", ['target'=>'_blank']); ?></li>
                                    <li><?= anchor('/build', "EDITAR ARTIGO", ['target'=>'_blank']); ?></li>
                                    <li><?= anchor('/buildSchool', "CRIAR ESCOLA", ['target'=>'_blank']); ?></li>
                                </ul>    
                            </li>
                            <?php endif; ?>   
                            
                            
                            
                        </ul>
                        <!--nav menu end-->
                    </div>
                </nav>
                <!-- nav end-->
            </div>
        </div>
    </div>
</header>
<!-- header nav end-->
<!-- block post area start-->