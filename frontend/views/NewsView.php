<?php $layout = 'LayoutTrangTrong.php'; ?>
<section id="slider">
    <!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                   <?php include "views/SliderView.php" ?>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
<!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <?php include "views/ContentLeft.php"; ?>

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <!--features_items-->
                    <h2 class="title text-center">News</h2>
                    <div class="wrapper-blog">
                        <!-- list news -->
                        <div class="row">
                            <?php foreach($data as $rows): ?>
                            <div class="col-md-6 article"> <a
                                    href="index.php?controller=news&action=detail&newsId=<?php echo $rows->id; ?>"
                                    class="image"> <img src="../assets/IMG/<?php echo $rows->photo; ?>"
                                        alt="<?php echo $rows->name; ?>" title="<?php echo $rows->name; ?>"
                                        class="img-responsive"> </a>
                                <h3><a
                                        href="index.php?controller=news&action=detail&newsId=<?php echo $rows->id; ?>"><?php echo $rows->name; ?></a>
                                </h3>
                                <p class="desc"><?php echo $rows->description; ?></p>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <!-- end list news -->
                        <ul class="pagination pull-right" style="margin-top: 0px !important">
                            <li><a href="#">Trang</a></li>
                            <?php for($i = 1; $i <= $numPage; $i++): ?>
                            <li><a href="index.php?controller=news&p=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                            <?php endfor; ?>
                        </ul>
                    </div>
                </div>
                <!--features_items-->
            </div>
        </div>
    </div>
</section>
