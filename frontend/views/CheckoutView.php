<?php $layout = 'LayoutTrangTrong.php'; ?>

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Trang chủ</a></li>
				  <li class="active">Điền thông tin người mua hàng</li>
				</ol>
			</div><!--/breadcrums-->


			<div class="register-req">
				<p>Làm ơn đăng ký hoặc đăng nhập để thanh toán giỏ hàng và xem lại lịch sử mua hàng</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Điền thông tin gửi hàng</p>
							<div class="form-one">
								<form action="index.php?controller=cart&action=checkoutcustomer" method="post">	
									<input type="text" name="email" placeholder="Địa chỉ email">								
									<input type="text" name="name" placeholder="Họ và tên">
									<input type="text" name="address" placeholder="Địa chỉ">
									<input type="text" name="phone" placeholder="Số điện thoại">
                                    <textarea name="note"  placeholder="Ghi chú đơn hàng" rows="16"></textarea>
                                    <input type="submit" value="Thanh toán" name="send_order"
                                    class="btn btn-primary btn-sm" />			
								</form>
							</div>
							<div class="form-two">
								
							</div>
						</div>
					</div>
									
				</div>
			</div>
		</div>
	</section> <!--/#cart_items-->

