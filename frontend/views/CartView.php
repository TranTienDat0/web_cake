<?php $layout = 'LayoutTrangTrong.php'; ?>

<section id="cart_items">
	
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
		
			<div class="table-responsive cart_info">
			<form action="index.php?controller=cart&action=update" method="post">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Tên sản phẩm</td>
							<td class="price">Giá bán</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng tiền</td>
							<td class="delete">Xóa</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php foreach($_SESSION['cart'] as $product): ?>
						<tr>
							<td class="cart_product">
								<a href=""><img width="150px" height="100px" src="../assets/IMG/<?php echo $product['photo']; ?>" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $product['name'] ?></a></h4>
								<p>Web ID: <?php echo $product['id']; ?></p>
							</td>
							<td class="cart_price">
								<p><?php echo number_format($product['price']) ?> đ</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<input type="number" id="qty" class="cart_quantity_input" min="1" value="<?php echo $product["number"]; ?>" name="product_<?php echo $product["id"]; ?>" required="Không thể để trống" autocomplete="off" size="2">
									
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo number_format(($product['price'] - ($product['price']*$product['discount'])/100)*$product["number"]) ?> đ</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="index.php?controller=cart&action=delete&productId=<?php echo $product["id"]; ?>"><i class="fa fa-times"></i></a>								
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
					<tfoot>
						<tr><td>
							<a class="btn btn-default update" href="index.php">Tiếp tục mua hàng</a>
							<input type="submit" class="btn btn-default update" value="Cập nhật">

						</td></tr>
					</tfoot>
				</table>
			</form>
			</div>
		
		</div>
	</form>
</section><!--/#do_action-->
	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">	
					<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tổng <span><?php echo number_format($this->cartTotal()); ?> ₫ <br></span></li>
							<li>Thuế <span>0đ</span></li>
							<li>Phí vận chuyển <span>Free</span></li>
							<li>Thành tiền <span><?php echo number_format($this->cartTotal()); ?> ₫</span></li>
						</ul>
							<a class="btn btn-default check_out" href="index.php?controller=cart&action=checkout">Than toán</a>
					</div>
				</div>
				
			</div>
		</div>
	</section><!--/#do_action-->
