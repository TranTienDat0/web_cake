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
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="../assets/IMG/<?php echo $record->photo; ?>" alt="" />
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-5">
							<div class="product-information"><!--/product-information-->
								<img src="" class="newarrival" alt="" />
								<h2><?php echo $record->name; ?></h2>
								<p>Web ID: <?php echo $record->id; ?></p>
								<img src="../assets/eshopper/images/product-details/rating.png" alt="" />
								<span>
									<span style="text-decoration:line-through; font-size: 20px;"><?php echo number_format($record->price); ?> đ</span>
									<span><?php echo number_format($record->price - ($record->price*$record->discount)/100) ?> đ</span>
									<!-- <label>Quantity:</label>
									<input type="text" value="3" /> -->
									
										<a href="index.php?controller=cart&action=create&productId=<?php echo $record->id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									
								</span>
								
								<p><b>Content:</b> <?php echo $record->content; ?></p>
								<!-- <p><b>Condition:</b> New</p>
								<p><b>Brand:</b> E-SHOPPER</p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a> -->
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						<?php $DiscountProduct = $this->modelDiscountProduct(); ?>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<?php foreach($DiscountProduct as $rows): ?>							
								<div class="item active">
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="index.php?controller=products&action=detail&id=<?php echo $rows->id; ?>"><img width="50px" height="150px" src="../assets/IMG/<?php echo $rows->photo; ?>" title="<?php echo $rows->name ?>" alt="<?php echo $rows->name ?>" /></a>											
											        <h2 style="text-decoration:line-through;"><?php echo number_format($rows->price); ?> VNĐ</h2>
											        <h2> <?php echo number_format($rows->price - ($rows->price * $rows->discount)/100); ?> VNĐ</h2>
											        <p><?php echo $rows->name; ?></p>
													<a href="index.php?controller=cart&action=create&productId=<?php echo $rows->id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>

											</div>
										</div>
									</div>									 									
								 </div>								 
							    <?php endforeach; ?>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>
						</div>					   
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
	