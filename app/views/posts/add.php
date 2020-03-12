<?php require APPROOT . '/views/shared/header.php'; ?>
<a class="btn btn-warning pull-right" href="<?php echo URLROOT . '/posts/index'; ?>" role="button">
      <i class="fas fa-arrow-left"></i> Regresar
    </a>
<div class="card card-body bg-light mt-5">
    <h2>Crear publicación</h2>
    <p>Por favor ingrese los datos de su publicación</p>
    <form action="<?php echo URLROOT . '/posts/add'; ?>" method="post">
        <div class="form-group">
            <label for="title">Título: <sup>*</sup></label>
            <input type="text" name="title" class="form-control <?php echo (!empty($data['title_err'])) ? 'is-invalid':''; ?>" placeholder="Título de la publicación" value="<?php echo $data['title'];?>">
            <span class="invalid-feedback"><?php echo $data['title_err'];?></span>
        </div>
        <div class="form-group">
            <label for="body">Contenido: <sup>*</sup></label>
            <textarea name="body" class="form-control  <?php echo (!empty($data['body_err'])) ? 'is-invalid':''; ?>" rows="5" placeholder="Su contenido"> 
                <?php echo $data['body'];?>
            </textarea>
            
            <span class="invalid-feedback"><?php echo $data['body_err'];?></span>
        </div>
        <div class="row">
            <div class="col">
                <input type="submit" value="Crear publicación" class="btn btn-primary btn-block">
            </div>
        </div>
    </form>
</div>
<?php require APPROOT . '/views/shared/footer.php'; ?>



