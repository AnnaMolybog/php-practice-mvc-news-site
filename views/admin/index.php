<?php include (VIEWS_PATH . DS . 'layouts' . DS . 'header.php')?>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <form method="post" class="navbar-form navbar-left" role="search" action="/tag/search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Поиск по тегам" list="tags" name="tag" required>
                <datalist id="tags">
                    <?php foreach($tags as $tag) { ?>
                    <option value="<?=$tag['tag']?>">
                        <?php } ?>
                </datalist>
            </div>
            <button type="submit" class="btn btn-default">Поиск</button>
        </form>
    </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
    </nav>

    </div>

    <div class="row">

    <div class="col-lg-12 col-md-12 col-sm-12">
        <nav class="navbar " role="navigation">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav nav-tabs nav-justified">
                        <li role="presentation" class="<?php if($categoryId == $category['id_category']) echo 'active'?>"><a href="/">Последние новости</a></li>
                        <?php foreach ($categories[0] as $category) { ?>
                            <?php if(isset($categories[$category['id_category']])) { ?>
                                <li role="presentation" class="dropdown <?php if($categoryId == $category['id_category']) echo 'active'?>">
                                    <a id="dLabel" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <?=$category['category']?><span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                        <li><a href="/category/<?=$category['id_category']?>"><?=$category['category']?></a></li>
                                        <?php foreach($categories[$category['id_category']] as $subCategory) { ?>
                                            <li><a href="/category/<?=$category['id_category']?>/<?=$subCategory['id_category']?>"><?=$subCategory['category']?></a></li>
                                        <?php }?>
                                    </ul>
                                </li>
                            <?php } else { ?>
                                <li role="presentation" class="<?php if($categoryId == $category['id_category']) echo 'active'?>" ><a href="/category/<?=$category['id_category']?>"><?=$category['category']?></a></li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2">
            Реклама
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="row">
                <?php if(!empty($latestNews)) { ?>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="col-sm-12 col-md-12">
                            <div class="thumbnail">
                                <a href = "/news/<?=$latestNews[0]['id_news']?>"><img style="height: 350px; width: 100%" class="img" src="/images/<?=$latestNews[0]['id_news']?>.jpg"></a>
                                <div class="caption" style="height: 180px">
                                    <h3><a href = "/news/<?=$latestNews[0]['id_news']?>"><?=$latestNews[0]['title']?></a></h3>
                                    <em><?=$latestNews[0]['date']; unset($latestNews[0])?></em>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <?php foreach($latestNews as $new) { ?>
                            <div class="col-sm-6 col-md-6">
                                <div class="thumbnail">
                                    <a href = "/news/<?=$new['id_news']?>"><img class="img" style="height: 140px; width: 100%" src="/images/<?=$new['id_news']?>.jpg"></a>
                                    <div class="caption" style="height: 110px">
                                        <h4><a href = "/news/<?=$new['id_news']?>"><?=$new['title']?></a></h4>
                                        <em><?=$new['date']?></em>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                <?php } else {echo "Нет новостей в данной категории";} ?>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <h2 style="text-align: center">Рекомендованные новости</h2>
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="height: 250px; width: 100%">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img style="height: 250px; width: 100%" src="/images/<?=$sliderNews[0]['id_news']?>.jpg" alt="...">
                                <div class="carousel-caption">
                                    <a href="/news/<?=$sliderNews[0]['id_news']?>"><h3><?=$sliderNews[0]['title'];?></h3></a>
                                    <?php unset($sliderNews[0]) ?>
                                </div>
                            </div>
                            <?php foreach($sliderNews as $sliderNew) { ?>
                                <div class="item">
                                    <img style="height: 250px; width: 100%" src="/images/<?=$sliderNew['id_news']?>.jpg" alt="...">
                                    <div class="carousel-caption">
                                        <a href="/news/<?=$sliderNew['id_news']?>?>"><h3><?=$sliderNew['title'] ?></h3> </a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4" style="text-align: center">
                    <h2 style="text-align: center">Топ-3 активных темы</h2>
                    <?php foreach($topThree as $top) { ?>
                        <h3><a href = "/news/<?=$top['id_news']?>"><?=$top['title']?></a></h3>
                        <em><?=$top['date'];?></em>
                        <div style="float: right; font-size: 12px; margin-right: 20px">
                            <span class="glyphicon glyphicon-comment" aria-hidden="true" style="padding-right: 10px;"></span><?=$top['count']?>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4" style="text-align: center">
                    <h2 style="text-align: center">Топ-5 комментаторов</h2>
                    <?php foreach($topFive as $topUsers) { ?>
                        <h3><a href = "#"><?=$topUsers['login']?></a></h3>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2">
            Реклама
        </div>



    </div>
    <hr>
<?php include (VIEWS_PATH . DS . 'layouts' . DS . 'footer.php');?>