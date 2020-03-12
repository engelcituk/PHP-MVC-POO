<?php require APPROOT . '/views/shared/header.php'; ?>
<?php flash('post_mensaje'); ?>
<div class="row mb-3">
  <div class="col-md-6">
    <h1>Posts</h1>
  </div>
  <div class="col-md-6">
    <a class="btn btn-primary pull-right" href="<?php echo URLROOT . '/posts/add'; ?>" role="button">
      <i class="fas fa-pencil-alt"></i> Crear publicación
    </a>
  </div>
</div>
<?php foreach ($data['posts'] as $post) : ?>
  <div class="card card-body mb-3">
    <h4 class="card-title"><?php echo $post->title; ?></h4>
    <div class="bg-light p-2 mb-3">
      Creado por : <?php echo $post->name; ?> el <?php echo $post->postCreatedAt; ?>
    </div>
    <p class="card-text">
      <?php echo $post->body; ?>
    </p>
    <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>" class="btn btn-dark">Más</a>
  </div>
<?php endforeach; ?>

<?php require APPROOT . '/views/shared/footer.php'; ?>