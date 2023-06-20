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
                            <div class="col-md-12 article">
                                 <h3><?php echo $record->name; ?></h3>
                                 <img src="../assets/IMG/<?php echo $record->photo; ?>" style="width: 100%;">
                                 <p><?php echo $record->description; ?></p>
                                 <p><?php echo $record->content; ?></p>
                            </div>
                           
                        </div>
                        <!-- end list news -->                     
                    </div>
                </div>
                <!--features_items-->
            </div>
        </div>
    </div>
</section>
