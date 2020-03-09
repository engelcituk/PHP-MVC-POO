<?php require APPROOT . '/views/shared/header.php'; ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2> Crear una cuenta</h2>
                <p>Por favor llena los campos para poder registrarse</p>
                <form action="<?php echo URLROOT . '/users/register'; ?>" method="post">
                    <div class="form-group">
                        <label for="name">Nombre: <sup>*</sup></label>
                        <input type="text" name="name" class="form-control <?php echo (!empty($data['name_err'])) ? 'is-invalid':''; ?>" value="<?php echo $data['name'];?>">
                        <span class="invalid-feedback"><?php echo $data['name_err'];?></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email: <sup>*</sup></label>
                        <input type="email" name="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid':''; ?>" value="<?php echo $data['email'];?>">
                        <span class="invalid-feedback"><?php echo $data['email_err'];?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña: <sup>*</sup></label>
                        <input type="password" name="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid':''; ?>" value="<?php echo $data['password'];?>">
                        <span class="invalid-feedback"><?php echo $data['password_err'];?></span>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirmar contraseña: <sup>*</sup></label>
                        <input type="password" name="confirm_password" class="form-control <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid':''; ?>" value="<?php echo $data['confirm_password'];?>">
                        <span class="invalid-feedback"><?php echo $data['confirm_password_err'];?></span>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="<?php echo URLROOT . '/users/login'; ?>">¿Ya tienes cuenta?, inicia sesión</a>
                        </div>
                        <div class="col">
                            <input type="submit" value="Registrar" class="btn btn-primary btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/shared/footer.php'; ?>

