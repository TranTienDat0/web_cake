<?php $layout = "LayoutTrangTrong.php"; ?>

    <section id="slider"><!--slider-->
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
	</section><!--/slider-->

	<section>
		<div class="container">
			<div class="row">
				 <?php include "views/ContentLeft.php"; ?>

				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">
						<?php 
                            $categoryId = isset($_GET["catId"]) ? $_GET["catId"] : 0;
                            $category = $this->modelGetCategory($categoryId);
                            echo isset($category->name)?$category->name:"";
                        ?>          	
                        </h2>
	  	                <?php foreach($data as $rows): ?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><img width="50px" height="150px" src="../assets/IMG/<?php echo $rows->photo; ?>" title="<?php echo $rows->name ?>" alt="<?php echo $rows->name ?>" /></a>											
											<h2><?php echo number_format($rows->price); ?> đ</h2>
											<!-- <h2> <?php echo number_format($rows->price - ($rows->price * $rows->discount)/100); ?> VNĐ</h2> -->
											<p><?php echo $rows->name; ?></p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2><?php echo number_format($rows->price); ?> đ</h2>
												<a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><p><?php echo $rows->name; ?></p></a>
												<a href="index.php?controller=cart&action=create&productId=<?php echo $rows->id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
					    <?php endforeach; ?>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>