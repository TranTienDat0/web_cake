<script type="text/javascript">
                        function search() {
                            //lay gia tri cua textbox co id=key
                            var key = document.getElementById("key").value;
                            //di chuyen den trang tim kiem
                            location.href = "index.php?controller=search&action=name&key=" + key;
                        }
                        /*
                        //kiem tra jquery (neu website chua co jquery thi phai download va add jquery vao trang)
                        $(document).ready(function(){
                          alert("jquery da load vao trang");
                        });*/
                        function searchAjax() {
                            var key = $("#key").val();
                            //hien thi box search
                            $("#smart-search-box").attr("style", "display:block");
                            //thuc hien lay thong tin bang ajax
                            $.get("index.php?controller=search&action=ajax&key=" + key, function(data) {
                                //lam rong du lieu trong the ul
                                $("#smart-search-box ul").empty();
                                //them du lieu vao the ul
                                $("#smart-search-box ul").append(data);
                            });
                        }
</script>
<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href=""><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href=""><i class="fa fa-envelope"></i> nhom_3@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-linkedin"></i></a></li>
								<li><a href=""><i class="fa fa-dribbble"></i></a></li>
								<li><a href=""><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="index.html"><img src="images/home/logo.png" alt="" /></a>
						</div>
						<div class="btn-group pull-right clearfix">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									Việt Nam
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="">Canada</a></li>
									<li><a href="">UK</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									VNĐ
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="">Canadian Dollar</a></li>
									<li><a href="">Pound</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
							<?php if(!isset($_SESSION["customer_email"])): ?>
								<li><a href=""><i class="fa fa-user"></i> Account</a></li>
								<li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>
								<!-- <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li> -->
								<li><a href="index.php?controller=cart"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li><a href="index.php?controller=account&action=login"><i class="fa fa-lock"></i> Login</a></li>
							<?php else: ?>
								<li><a href=""><i class="fa fa-user"></i> <?php echo $_SESSION["customer_email"]; ?></a></li>
								<li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="index.php?controller=cart&action=Viewcheckout"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="index.php?controller=cart"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li><a href="index.php?controller=account&action=logout"><i class="fa fa-lock"></i> Logout</a></li>
							<?php endif ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php">Home</a></li>
								<?php 
                                   $conn = Connection::getInstance();
                                   $query = $conn->query("select * from categories where parent_id = 0 order by id desc");
                                   $categories = $query->fetchAll(PDO::FETCH_OBJ);
                                ?>
                                <?php foreach($categories as $rows): ?>
								<li class="dropdown"><a href="index.php?controller=products&action=category&catId=<?php echo $rows->id; ?>"><?php echo $rows->name; ?><i class="fa fa-angle-down"></i></a>
								<?php 
                                $querySub = $conn->query("select * from categories where parent_id={$rows->id} order by id desc");
                                $categoriesSub = $querySub->fetchAll(PDO::FETCH_OBJ);
                                ?>                        
                                    <ul role="menu" class="sub-menu">
                                    	<?php foreach($categoriesSub as $rowsSub): ?>
                                        <li><a href="index.php?controller=products&action=category&catId=<?php echo $rowsSub->id; ?>"><?php echo $rowsSub->name; ?></a></li>
										<?php endforeach; ?>
                                    </ul>
                                </li> 
                                <?php endforeach; ?>
								<li><a href="index.php?controller=news">Tin tức</a></li>
								<li><a href="index.php?controller=contact">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search" id="key"/>
							<input id="btnSearch" style="margin-top: 0px; color: #000; width: 50px"  type="button" class="btn btn-warning" value="Tìm" onclick="return search();" />
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	