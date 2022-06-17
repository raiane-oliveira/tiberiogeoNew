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
                                                                $item['slug'],
                                                                '<img class="img-fluid" src="' . base_url() . '/assets/img/' . $item['category'] . '/' . $item['slug'] . '/' . $item['image-main'] . '" alt="">'
                                                            ); ?>
                                                        </div>
                                                        <div class="post-content">
                                                            <h3 class="post-title">
                                                                <?= anchorArticle($item['category'], $item['slug'], $item['title']); ?>
                                                            </h3>
                                                        </div>
                                                    </div>

                                                </div>
                                        <?php
                                            endif;
                                            $count++;
                                        endforeach; ?>
                                        <div class="megamenu-panel-row active text-center">
                                            <hr>
                                            <?= anchor('/category/' . $item['category'], '+ ' . toCategory($item['category']) . '</span>', ['class' => 'post-cat ts-orange-bg']); ?>
                                        </div>

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
                                                                $item['slug'],
                                                                '<img class="img-fluid" src="' . base_url() . '/assets/img/' . $item['category'] . '/' . $item['slug'] . '/' . $item['image-main'] . '" alt="">'
                                                            ); ?>
                                                        </div>
                                                        <div class="post-content">
                                                            <h3 class="post-title">
                                                                <?= anchorArticle($item['category'], $item['slug'], $item['title']); ?>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                            endif;
                                            $count++;
                                        endforeach; ?>
                                        <div class="megamenu-panel-row active text-center">
                                            <hr>
                                            <?= anchor('/category/' . $item['category'], '+ ' . toCategory($item['category']) . '</span>', ['class' => 'post-cat ts-blue-bg']); ?>
                                        </div>
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
                                                                $item['slug'],
                                                                '<img class="img-fluid" src="' . base_url() . '/assets/img/' . $item['category'] . '/' . $item['slug'] . '/' . $item['image-main'] . '" alt="">'
                                                            ); ?>
                                                        </div>
                                                        <div class="post-content">
                                                            <h3 class="post-title">
                                                                <?= anchorArticle($item['category'], $item['slug'], $item['title']); ?>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                            endif;
                                            $count++;
                                        endforeach; ?>
                                        <div class="megamenu-panel-row active text-center">
                                            <hr>
                                            <?= anchor('/category/' . $item['category'], '+ ' . toCategory($item['category']) . '</span>', ['class' => 'post-cat ts-green-bg']); ?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li><?= anchor('/school', "ESCOLA"); ?></li>
                            <?php
                            if (getEnv('CI_ENVIRONMENT') === 'development') : ?>
                                <li>
                                    <?= anchor('#', "ADMIN"); ?>
                                    <ul class="nav-dropdown nav-submenu">
                                        <li><?= anchor('/build/create', "CRIAR ARTIGO", ['target' => '_blank']); ?></li>
                                        <li><?= anchor('/buildSchool', "CRIAR ESCOLA", ['target' => '_blank']); ?></li>
                                    </ul>
                                </li>
                            <?php endif; ?>




                        </ul>
                        <ul class="right-menu align-to-right">
                            <li class="header-search">
                                <div class="nav-search">
                                    <div class="nav-search-button"><i class="icon icon-search"></i></div>
                                    <?php 
                                    echo form_open('/search') ?>

                                        <span class="nav-search-close-button" tabindex="0">✕</span>
                                        <span class="nav-search-close-button" tabindex="0">✕</span>
                                        <div class="nav-search-inner">
                                            <input type="search" name="search" placeholder="Digite uma palavra ...">
                                        </div>
                                    </form>
                                </div>
                            </li>
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