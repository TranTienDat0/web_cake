 <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <?php
                    $conn = Connection::getInstance();
                    $query = $conn->query('select * from categories where parent_id = 0 order by id desc');
                    $categories = $query->fetchAll(PDO::FETCH_OBJ);
                    ?>
                    <div class="panel-group category-products" id="accordian">
                        <!--category-productsr-->
                        <?php foreach($categories as $rows): ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordian"
                                        href="index.php?controller=products&action=category&catId=<?php echo $rows->id; ?>">
                                        <span class="badge pull-right">
                                            <!-- <i class="fa fa-plus"></i> -->
                                        </span>
                                        <?php echo $rows->name; ?>
                                    </a>
                                </h4>
                            </div>
                            <?php
                            $querySub = $conn->query("select * from categories where parent_id={$rows->id} order by id desc");
                            $categoriesSub = $querySub->fetchAll(PDO::FETCH_OBJ);
                            ?>
                            <a href="index.php?controller=products&action=category&catId=<?php echo $rows->id; ?>"
                                class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <?php foreach($categoriesSub as $rowsSub): ?>
                                        <li><a
                                                href="index.php?controller=products&action=category&catId=<?php echo $rowsSub->id; ?>"><?php echo $rowsSub->name; ?></a>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <!--/category-products-->
                    <?php
                    $fromPrice = isset($_GET['fromPrice']) ? $_GET['fromPrice'] : 0;
                    $toPrice = isset($_GET['toPrice']) ? $_GET['toPrice'] : 0;
                    ?>
                    <div class="price-range" >
                        <!--price-range-->
                        <h2>Price Range</h2>
                        <div class="panel-body" style="margin-left: -50px">
                            <ul class="list-group" style="border:0px;">
                                <li class="list-group-item" style="border:0px;">Giá từ &nbsp;&nbsp;
                                    <input type="number" min="0" value="<?php echo $fromPrice; ?>" id="fromPrice"
                                        class="form-control" />
                                </li>
                                <li class="list-group-item" style="border:0px;">Đến &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="number" min="0" value="<?php echo $toPrice; ?>" id="toPrice"
                                        class="form-control" />
                                </li>
                                <li class="list-group-item" style="border:0px; text-align:center">
                                    <input type="button" class="btn btn-warning" value="Tìm mức giá"
                                        onclick="location.href = 'index.php?controller=search&action=price&fromPrice=' + document.getElementById('fromPrice').value + '&toPrice=' + document.getElementById('toPrice').value;" />
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--/price-range-->

                    <div class="shipping text-center">
                        <!--shipping-->
                        <img src="images/home/shipping.jpg" alt="" />
                    </div>
                    <!--/shipping-->

                </div>
            </div>
