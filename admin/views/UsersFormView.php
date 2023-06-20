
<?php $layout = "Layout.php" ?>
<div class="col-md-12">
  <div class="panel panel-primary" style="border: 1px solid #337ab7; border-radius: 3px; margin: 15px">
    <div class="panel-heading" style="color: #fff; background-color: #337ab7; border-color: #337ab7; padding: 10px 15px; border-bottom: 1px solid transparent; border-top-left-radius: 3px; border-top-right-radius: 3px;">Add edit user</div>
    <div class="panel-body">
      <form method="post" action="<?php echo $action ?>">
        <!-- rows -->
        <div class="row" style="margin: 15px">
          <div class="col-md-2">Name</div>
          <div class="col-md-10">
            <input
              type="text"
              value="<?php echo isset($record->name)?$record->name:'';?>"
              name="name"
              class="form-control"
              required
            />
          </div>
        </div>
        <!-- end rows -->
        <!-- rows -->
        <div class="row" style="margin: 15px">
          <div class="col-md-2">Email</div>
          <div class="col-md-10">
            <input type="email" value="<?php echo isset($record->email)?$record->email:''; ?>" <?php if(isset($record->email)): ?> disabled <?php else: ?> required <?php endif; ?> 
            name="email" 
            class="form-control" required>
          </div>
        </div>
        <!-- end rows -->
        <!-- rows -->
        <div class="row" style="margin: 15px">
          <div class="col-md-2">Password</div>
          <div class="col-md-10">
            <input type="password" name="password" <?php if(isset($record->email)): ?> placeholder="Không đổi password thì không nhập thông tin vào ô textbox này" <?php else: ?> required <?php endif; ?> class="form-control">
          </div>
        </div>
        <!-- end rows -->
        <!-- rows -->
        <div class="row" style="margin: 15px">
          <div class="col-md-2"></div>
          <div class="col-md-10">
            <input style="background-color: #337ab7;" type="submit" value="Process" class="btn btn-primary" />
          </div>
        </div>
        <!-- end rows -->
      </form>
    </div>
  </div>
</div>
