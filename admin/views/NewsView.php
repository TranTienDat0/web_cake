<?php 
    //load file Layout.php vao day
    $layout = "Layout.php";
 ?>
<div class="col-md-12">
     <div class="panel panel-primary"  style="border: 1px solid #337ab7; border-radius: 3px; margin: 10px;">
        <div class="panel-heading"style="color: #fff; background-color: #337ab7; border-color: #337ab7; padding: 10px 15px; border-bottom: 1px solid transparent; border-top-left-radius: 3px; border-top-right-radius: 3px;">List News</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th style="width: 100px;">Photo</th>
                    <th>Name</th>
                    <th style="width: 70px;">Hot</th>
                    <th style="width:200px; text-align: center;">Action</th>
                </tr>
                <?php foreach($data as $rows): ?>
                <tr>
                    <td style="text-align:center;">
                        <?php if(file_exists("../assets/IMG/".$rows->photo)&&$rows->photo != ""): ?>
                            <img src="../assets/IMG/<?php echo $rows->photo; ?>" style="width:100px;">
                        <?php endif; ?>
                    </td>
                    <td><?php echo $rows->name; ?></td>
                    <td style="text-align:center;">
                        <?php if($rows->hot == 1): ?>
                            <span class="fa fa-check"></span>
                        <?php endif; ?>
                    </td>
                    <td style="text-align:center;">
                        <a href="index.php?controller=news&action=update&id=<?php echo $rows->id; ?>">Edit</a>&nbsp;
                        <a href="index.php?controller=news&action=delete&id=<?php echo $rows->id; ?>" onclick="return window.confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <style type="text/css">
                .pagination{padding:0px; margin:0px;}
            </style>
            <ul class="pagination">
                <li class="page-item active"><a href="#" class="page-link">Trang</a></li>
                <?php for($i = 1; $i <= $numPage; $i++): ?>
                <li class="page-item"><a href="index.php?controller=news&p=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>
</div>