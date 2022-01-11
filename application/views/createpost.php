<?php
  
 foreach ($data as $key => $value) {
   $$key = $value;
 } 
 ?>

<h1>Create Post</h1>
<form action="" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputEmail">Title</label>
        <input type="text" class="form-control <?php echo isset($error['title']) ? ' is-invalid' : ''; ?>"
         name="title" value="<?php echo isset($title) ? $title : '' ?>">
    </div>
  </div> 
  <div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputEmail">Text</label>
        <textarea name="text" id="" cols="58" rows="10" class="form-control<?php echo isset($error['text']) ? ' is-invalid' : '';?>"><?php echo isset($text) ? $text : ''; ?></textarea>
    </div>
  </div> 
  
  <button type="submit" class="btn btn-primary">Create</button>
</form>
