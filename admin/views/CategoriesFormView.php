    <?php 
    //load file Layout.php vao day
    $layout = "Layout.php";
 ?>
<div class="col-md-12">  
    <div class="panel panel-primary" style="border: 1px solid #337ab7; border-radius: 3px; margin: 10px;">
    <div class="panel-heading" style="color: #fff; background-color: #337ab7; border-color: #337ab7; padding: 10px 15px; border-bottom: 1px solid transparent; border-top-left-radius: 3px; border-top-right-radius: 3px;">Add edit category</div>
        <div class="panel-body">
        <form method="post" action="<?php echo $action; ?>">
            <!-- rows -->
            <div class="row" style="margin:15px;">
                <div class="col-md-2">Name</div>
                <div class="col-md-10">
                    <input type="text" value="<?php echo isset($record->name)?$record->name:''; ?>" name="name" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <div class="row" style="margin:15px;">
                <div class="col-md-2">Parent</div>
                <div class="col-md-10">
                    <?php 
                        //lay bien ket noi csdl
                        $conn = Connection::getInstance();
                        $query = $conn->query("select * from categories where parent_id = 0 order by id desc");
                        //lay tat ca cac ket qua tra ve
                        $categories = $query->fetchAll(PDO::FETCH_OBJ);
                     ?>
                     <select name="parent_id">
                         <option value="0"></option>
                         <?php foreach($categories as $rows): ?>
                            <option <?php if(isset($record->parent_id)&&$record->parent_id == $rows->id): ?> selected <?php endif; ?> value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
                         <?php endforeach; ?>
                     </select>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin:15px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <input style="background-color: #337ab7;" type="submit" value="Process" class="btn btn-primary">
                </div>
            </div>
            <!-- end rows -->
        </form>
        </div>
    </div>
</div>