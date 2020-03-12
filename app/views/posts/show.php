<?php require APPROOT . '/views/shared/header.php'; ?>
<a class="btn btn-warning pull-right" href="<?php echo URLROOT . '/posts'; ?>" role="button">
    <i class="fas fa-arrow-left"></i> Regresar
</a>
<br>
<div class="row mb-3">
    <div class="col-md-12">
        <h1><?php echo $data['post']->title; ?></h1>

        <div class="bg-secondary text-white p-2 mb-3">
            Creado por: <?php echo $data['user']->name; ?> el <?php echo $data['post']->created_at; ?>
        </div>
        <p>
            <?php echo $data['post']->body; ?>
        </p>
        <?php if ($data['post']->user_id == $_SESSION['user_id']) : ?>
            <hr>

            <div class="row">
                <div class="col">
                    <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>" class="btn btn-success btn-block">
                        <i class="fas fa-edit"></i> editar
                    </a>
                </div>
                <div class="col">
                    <form action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" method="post">                        
                        <button type="submit" class="btn btn-danger btn-block">
                            <i class="fas fa-trash"></i> Borrar post
                        </button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php require APPROOT . '/views/shared/footer.php'; ?>