<style type="text/css">

</style>
<?php $layout = "Layout.php" ?>
<div class="col-md-12">
    <div style="margin-bottom:5px;">
        <a href="index.php?controller=users&action=create" class="btn btn-primary">Add user</a>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading" style="color: #fff; background-color: #337ab7; border-color: #337ab7; padding: 10px 15px; border-bottom: 1px solid transparent; border-top-left-radius: 3px; border-top-right-radius: 3px;">List User</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover" style="border: 1px">
                <tr>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th style="width:150px; text-align:center;">Action</th>
                </tr>
                <?php foreach ($data as $rows) : ?>
                    <tr>
                        <td><?php echo $rows->name; ?></td>
                        <td><?php echo $rows->email; ?></td>
                        <td><?php echo $rows->password; ?></td>
                        <td style="text-align:center;">
                            <a href="index.php?controller=users&action=update&id=<?php echo $rows->id; ?>">Edit</a>&nbsp;
                            <a href="index.php?controller=users&action=delete&id=<?php echo $rows->id; ?>" onclick="return window.confirm('Are you sure?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <style type="text/css">
                .pagination {
                    padding: 0px;
                    margin: 0px;
                }
            </style>
            <ul class="pagination">
                <li class="page-item active"><a href="#" class="page-link">Trang</a></li>
                <?php for ($i = 1; $i <= $numPage; $i++) : ?>
                    <li class="page-item"><a href="index.php?controller=users&p=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>
</div>