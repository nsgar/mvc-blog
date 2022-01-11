<?php
// echo '<pre>';
// var_dump($data);
// echo '<pre>';

use mvc\app\models\CommentModel;

?>

<div class="row">
 <div class="col-md-10">
  <div class="card" style="margin-top:5px;">
  <img class="card-img-top" src="..." alt="Image">
  <div class="card-body">
    <h5 class="card-title"><?php echo $data['title']?></h5>
    <p class="card-text"><?php echo $data['body']; ?></p>
    
   </div>
  </div>
 </div>
</div>
<br><br>

<?php

$comment = new CommentModel();

foreach ($comment->allComment() as $key => $value) {
  if ($_GET['postid'] === $value['post_id']) {
    echo $value['username']."<br>";
    echo $value['comment']."<hr>";
  }
 
}

?>


<?php if (isset($_SESSION['token'])){?>
<form action="" method="POST">
  <p style="opacity: 0.3;">UserName</p>
  <textarea name="comment" id="" cols="50" rows="4" placeholder="Comment..." required=""></textarea>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php } ?>
