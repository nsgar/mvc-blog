<h1>home page</h1>
3 post...
<div class="row">

<?php foreach ($data as $key => $value) { ?>

 <div class="col-md-4">
  <div class="card" style="margin-top:5px;">
  <img class="card-img-top" src="..." alt="Image">
  <div class="card-body">
    <h5 class="card-title"><?php echo $value['title']; ?></h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="posts?postid=<?php echo $value['id']; ?>" class="btn btn-primary">View More</a>
   </div>
  </div>
 </div>

<?php } ?>

</div>


