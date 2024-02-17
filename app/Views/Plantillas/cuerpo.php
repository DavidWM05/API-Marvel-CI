<body>
        <!--Particulas-->
        <div id="particles-js"></div>

        <!-- Encabezado -->
        <section class="section-encabezado justify-content-center">
            <h1>PERSONAJES ENLISTADOS</h1>
        </section>

        <!-- Botones y Buscador -->
        <section class="section-buscador justify-content-start">
            <div class="container">
                <div class="row">
                    <!-- Buscador -->
                    <div class="col-md-5">
                        <form method="GET" action="enlistados/buscar">
                            <div class="input-group rounded">
                                <input name="buscador" id="buscador" type="search" class="form-control rounded" placeholder="Buscar Personaje..." minlength="3" required/>
                                <button type="submit" class="btn btn-success">Buscar</button>
                                <a href="enlistados" class="btn btn-success">Todos</a>
                            </div>
                        </form>
                        
                    </div>
                    <!-- Nuevo Registro -->
                    <div class="col-md-2">
                        <button type='button' class='btn btn-outline-success' style="width: 100%;" data-bs-toggle='modal' data-bs-target='#nuevo'>
                            Nuevo
                            <!-- Icono -->
                            <i class="bi bi-plus-circle"></i>
                        </button>
                    </div>
                    <!-- API -->
                    <div class="col-md-2">
                        <a href="<?= base_url() ?>" class='btn btn-outline-primary'>
                            API
                            <!-- Icono -->
                            <i class="bi bi-code"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Cards -->
        <section class="section-personajes justify-content-start">
            <div class="container">                
                <div class="row g-3" id="tabla_resultados">
                    <?php foreach ($personajes as $personaje) { ?>
                        <div class="col-lg-4">

                            <div class="card">
                                <div class="card-header">                                    
                                    <img src="<?php echo $personaje['miniatura']; ?>" class="card-img" alt="marvel">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $personaje['nombre']; ?></h5>
                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                        <a href="enlistados/editar?nombre=<?php echo $personaje['nombre']; ?>" class="btn btn-outline-primary btn-sm">Editar</a>
                                        <a href="enlistados/eliminar?nombre=<?php echo $personaje['nombre']; ?>" class="btn btn-outline-danger btn-sm">Eliminar</a>                                        
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php } ?>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <nav aria-label="Page navigation examplo">
                            <?php if(isset($paginador)){ echo $paginador->links(); }

                            ?>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- Pie de pagina -->
        <footer class="seccion-oscura d-flex flex-column align-items-center justify-content-center">            
            <div class="iconos-redes-sociales d-flex flex-wrap align-items-center justify-content-center">
                <a href="https://github.com/DavidWM05" target="_blank" rel="noopener noreferrer">
                    <i class="bi bi-github"></i>
                </a>
                <a href="https://www.linkedin.com/in/ldpg-wm97/" target="_blank" rel="noopener noreferrer">
                    <i class="bi bi-linkedin"></i>
                </a>
                <a href="mailto:luis.david080997@gmail.com" target="_blank" rel="noopener noreferrer">
                    <i class="bi bi-envelope"></i>
                </a>
            </div>
            <div class="derechos-de-autor">Created by David (2024) &#169;</div>
        </footer>

        <!-- Modal Nuevo Registro -->        
        <div class="modal fade" id="nuevo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="nuevoLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="nuevoLabel">Nuevo Personaje</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <?php echo validation_list_errors(); ?>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="enlistados/guardar" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nombre" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="miniatura" class="col-form-label">URL de miniatura:</label>
                                <input type="url" class="form-control" name="miniatura" id="miniatura" required>
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="col-form-label">Descripcion:</label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-success">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="/marvelApp/public/js/particles.min.js"></script>
        <script src="/marvelApp/public/js/particles-config.js"></script>
    </body>    
</html>