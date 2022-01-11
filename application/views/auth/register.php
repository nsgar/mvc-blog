
<?php 

foreach ($data as $key => $value) {
   $$key = $value;
}


?>

<div class="valid-feedback">
      Please provide a valid city.
    </div>
<h1>Registration</h1>
<form action="" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputFirstname">Firstname</label>
        <input type="text" 
        class="form-control <?php echo isset($error['firstname']) ? ' is-invalid' : ''; ?>"
        name="firstname"
        value="<?php echo isset($firstname) ? $firstname : ''; ?>">
        <small class="text-danger">
        <?php echo isset($error['firstname']) ? $error['firstname'] : ''; ?>
        </small>
    </div>
    
    <div class="form-group col-md-6">
        <label for="inputLastname">Lastname</label>
        <input type="text" 
        class="form-control <?php echo isset($error['lastname']) ? ' is-invalid' : ''; ?>"
        name="lastname"
        value="<?php echo isset($lastname) ? $lastname : ''; ?>">
        <small class="text-danger">
        <?php echo isset($error['lastname']) ? $error['lastname'] : ''; ?>
        </small>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputemail">Email</label>
        <input type="email" 
        class="form-control <?php echo isset($error['email']) ? ' is-invalid' : ''; ?>"
        name="email"
        value="<?php echo isset($email) ? $email : ''; ?>">
        <small class="text-danger">
        <?php echo isset($error['email']) ? $error['email'] : ''; ?>
        </small>
    </div>
    <div class="form-group col-md-6">
        <label for="inputEmail">Confirm email</label>
        <input type="email" 
        class="form-control <?php echo isset($error['email']) ? ' is-invalid' : ''; ?>"
        name="confirmEmail"
        value="<?php echo isset($email) ? $email : ''; ?>">
        <small class="text-danger">
        <?php echo isset($error['email']) ? $error['email'] : ''; ?>
        </small>
    </div>
  </div> 
  <div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputPassword">Password</label>
        <input type="password" 
        class="form-control <?php echo isset($error['password']) ? ' is-invalid' : ''; ?>"
        name="password"
        value="<?php echo isset($password) ? $password : ''; ?>">
        <small class="text-danger">
        <?php echo isset($error['password']) ? $error['password'] : ''; ?>
        </small>
    </div>
    <div class="form-group col-md-6">
        <label for="inputPassword">Password</label>
        <input type="password" 
        class="form-control <?php echo isset($error['password']) ? ' is-invalid' : ''; ?>"
        name="confirmPassword"
        value="<?php echo isset($password) ? $password : ''; ?>">
        <small class="text-danger">
        <?php echo isset($error['password']) ? $error['password'] : ''; ?>
        </small>
    </div>
  </div> 
 
  <button type="submit" class="btn btn-primary">Register</button>
</form>
