<h1>Login</h1>
<form action="" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputEmail">Email</label>
        <input type="email" class="form-control" name="email" value="">
    </div>
  </div> 
  <div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputPassword">password</label>
        <input type="password" class="form-control" name="password" value="">
    </div>
  </div>
   <?php echo isset($data['errorMesage']) ? " 
    <div class='alert alert-danger'>
         $data[errorMesage]
    </div>" : '' ?>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
