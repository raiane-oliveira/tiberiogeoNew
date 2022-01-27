<section class="block-wrapper p-30 section-bg">  
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ts-title-item clearfix">
                    <h2 class="ts-cat-title float-left ts-pink-bg"><span>Links Úteis</span></h2>
                </div>
                <div class="row ts-col-list-post">
                    <div class="col-lg-3">
                        <div class="ts-grid-box ts-col-box">
                            <div class="item">
                                <span class="post-cat ts-pink-bg">Interatividade</span>
                                <div class="post-content">
                                    <h3 class="post-title">
                                        <?= anchor('http://www.ibge.gov.br/cidadesat/topwindow.htm?1', 'Conheça Cidades e Estados do Brasil', ['target' => '_blank']); ?>
                                    </h3>
                                    <p><?=character_limiter('O Cidades@ é o sistema agregador de informações do IBGE sobre os municípios e estados do Brasil. Você pode encontrar as pesquisas do IBGE, infográficos e mapas.',80,' [...]');?>
                                        <?= anchor('http://www.ibge.gov.br/cidadesat/topwindow.htm?1', 'Veja mais', ['target' => '_blank']); ?>
                                    </p>
                                </div>
                            </div><!-- item end-->
                        </div><!-- ts gird box end-->
                    </div><!-- col end-->                    
                    <div class="col-lg-3">
                        <div class="ts-grid-box ts-col-box">
                            <div class="item">
                                <span class="post-cat ts-pink-bg">Interatividade</span>
                                <div class="post-content">
                                    <h3 class="post-title">
                                        <?= anchor('http://www.ibge.gov.br/paisesat', 'Conheça o Mundo', ['target' => '_blank']); ?>
                                    </h3>
                                    <p><?=character_limiter('O site Países agrega dados de várias fontes oficiais sobre 193 países reconhecidos pela ONU. Divididos em seis temas (Economia, Indicadores Sociais, Meio Ambiente, ',120,' [...]');?>
                                    <?= anchor('http://www.ibge.gov.br/paisesat', 'Veja mais', ['target' => '_blank']); ?>
                                    </p>

                                </div>
                            </div><!-- item end-->
                        </div><!-- ts gird box end-->
                    </div><!-- col end-->
                    <div class="col-lg-3">
                        <div class="ts-grid-box ts-col-box">
                            <div class="item">
                                <span class="post-cat ts-pink-bg">Artigo</span>
                                <div class="post-content">
                                    <h3 class="post-title">
                                        <?= anchor('http://www.tiberiogeo.com.br/artigo/EscravidaoCampinaGrande.pdf', 'Histórias da Escravidão em Campina Grande', ['target' => '_blank']); ?>
                                    </h3>
                                    <p><?=character_limiter('O objetivo desta pesquisa é entender a dinâmica da escravidão num município periférico no contexto do Império brasileiro,',90,' [...]');?> <?= anchor('#', 'Continue lendo', ['title' => 'Clique aqui']); ?></p>
                                </div>
                            </div><!-- item end-->
                        </div><!-- ts gird box end-->
                    </div><!-- col end-->
                    <div class="col-lg-3">
                        <div class="ts-grid-box ts-col-box">
                            <div class="item">
                                <span class="post-cat ts-pink-bg">Artigo</span>
                                <div class="post-content">
                                    <h3 class="post-title">
                                        <?= anchor('http://www.tiberiogeo.com.br/artigo/SombrasEmMovimento.pdf', 'Sombras em Movimento: os escravos e o quebra-quilos em Campina Grande', ['target' => '_blank']); ?>
                                    </h3>
                                    <p><?=character_limiter('Nos meses finais de 1874, diversas vilas e cidades das províncias da
                                        Paraíba, Pernambuco,',70,' [...]');?><?= anchor('#', ' Continue lendo', ['title' => 'Clique aqui']); ?></p>
                                </div>
                            </div><!-- item end-->
                        </div><!-- ts gird box end-->
                    </div><!-- col end-->
                </div>
            </div>
        </div>
    </div>
    </div><!-- row end-->
</section>
<div class="clearfix"></div>