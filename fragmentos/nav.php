    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
      <div class="container">
        <a class="navbar-brand" href="listar_libros.php">Biblioteca Virtual</a>
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav ms-auto">
            <?php 
              if (isset($_SESSION['usuario'])): ?>
                  <?php
                  if ($_SESSION['rol_id'] == 3) {
                      echo '<li class="nav-item"><a class="nav-link" href="usuarios.php">Administrar Usuarios</a></li>';
                  }
                  ?>
                  <li class="nav-item"><a class="nav-link" href="listar_libros.php">Inicio</a></li>
                  <li class="nav-item"><a class="nav-link" href="logout.php">Cerrar sesión</a></li>
            <?php else: ?>
                <li class="nav-item"><a class="nav-link" href="login.php">Iniciar sesión</a></li>
                <li class="nav-item"><a class="nav-link" href="registro_usuario.php">Registrarse</a></li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>