<?php $layout = 'LayoutTrangTrong.php'; ?>
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Trang chủ</a></li>
				  <li class="active">Thanh toán giỏ hàng</li>
				</ol>
			</div><!--/breadcrums-->


			<div class="review-payment">
				<h2>Xem lại giỏ hàng</h2>
			</div>
           <div class="table-responsive cart_info">
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
									
									<input type="number" class="cart_quantity_input" name="quantity" value="<?php echo $product["number"]; ?>" name="product_<?php echo $product["id"]; ?>" required="Không thể để trống" autocomplete="off" size="2">
									
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo number_format($product['price'] - ($product['price']*$product['discount'])/100) ?> đ</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="index.php?controller=cart&action=delete&productId=<?php echo $product["id"]; ?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
					<tfoot>
						<tr><td><input type="submit" class="btn btn-default update" value="Cập nhật"></td></tr>
					</tfoot>
				</table>
			</div>
            <div class="review-payment">
                <h2>Chọn hình thức thanh toán</h2>
            </div>
		    
			<form action="index.php?controller=cart&action=orderplace" method="POST">
                
                <div class="payment-options" style="margin-top: 20px">
					<span>
						<label><input name="payment_options" value="1" type="checkbox"> Thanh toán bằng thẻ ATM</label>
					</span>
					<span>
						<label><input name="payment_options" value="2" type="checkbox"> Thanh toán bằng tiền mặt</label>
					</span>
					<span>
						<label><input name="payment_options" value="3" type="checkbox"> Thanh toán bằng thẻ ghi nợ</label>
					</span>
                   <input type="submit" value="Đặt hàng" name="send_order_place" class="btn btn-primary btn-sm" />
			    </div>
            </form>
		</div>
	</section> <!--/#cart_items-->