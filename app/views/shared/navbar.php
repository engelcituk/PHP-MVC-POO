<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
  <div class="container">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item <?php echo activeMenu('poomvc'); ?>">
          <a class="nav-link" href="<?php echo URLROOT; ?>">Home <span class="sr-only">(current)</span></a>
        </li>
        <?php if (isset($_SESSION['user_id'])) : ?>
          <li class="nav-item <?php echo activeMenu('posts'); ?>">
            <a class="nav-link" href="<?php echo URLROOT; ?>/posts">Posts</a>
          </li>
        <?php endif; ?>
        <li class="nav-item <?php echo activeMenu('about'); ?>">
          <a class="nav-link" href="<?php echo URLROOT; ?>/paginas/about">About</a>
        </li>
      </ul>
      
      <ul class="navbar-nav mr-auto">
        <?php if (isset($_SESSION['user_id'])) : ?>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Salir <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="#"><?php echo $_SESSION['user_name']; ?></a>
          </li>
        <?php else : ?>
          <li class="nav-item <?php echo activeMenu('register'); ?>">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Registrar <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item <?php echo activeMenu('login'); ?>">
            <a class="nav-link " href="<?php echo URLROOT; ?>/users/login">Login</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

