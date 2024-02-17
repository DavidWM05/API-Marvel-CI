        <!--Particulas-->
        <div id="particles-js"></div>

        <!-- Encabezado -->
        <section class="section-encabezado justify-content-center">
            <img src="/marvelApp/public/img/letras_marvel.png" class="imagen-encabezado" alt="letras marvel">
        </section>

        <!-- Botones y Buscador -->
        <section class="section-buscador justify-content-start">
            <div class="container">
                <div class="row">                    
                    <!-- Enlistados -->
                    <div class="col-md-3">
                        <a href="enlistados" class='btn btn-outline-success' style="width: 100%;">
                            Ver Enlistados
                            <!-- Icono -->
                            <i class="bi bi-fingerprint"></i>
                        </a>
                    </div>
                </div>                
            </div>
        </section>

        <!-- Cards -->
        <section class="section-personajes justify-content-start">
            <div class="container">                
                <div class="row g-3">
                    <?php foreach ($personajes as $personaje) { ?>
                        <div class="col-lg-4">

                            <div class="card">
                                <div class="card-header">                                    
                                    <img src="<?php echo $personaje['miniatura']; ?>" class="card-img" alt="marvel">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $personaje['nombre']; ?></h5>                                    

                                    <div class="btn-group" role="group" aria-label="Basic outlined example">

                                        <?php 
                                        $estado = 0;    //  0: No existe | 1: Existe
                                        foreach ($enlistados as $enlistado){
                                            if($personaje['nombre'] === $enlistado['nombre']){
                                                $estado = 1;
                                                break;
                                            }
                                        }

                                        if($estado == 0){
                                            echo '<a href="index.php/enlistar?nombre='.$personaje['nombre'].'&miniatura='.$personaje['miniatura'].'" class="btn btn-outline-primary btn-sm">Enlistar</a>';
                                        }else{ ?>
                                            <button type="button" class='btn btn-outline-success' style="width: 100%;">
                                                Ya enlistado
                                                <!-- Icono -->
                                                <i class="bi bi-fingerprint"></i>
                                            </button>
                                            
                                       <?php } ?>                                        
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php } ?>
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

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="/marvelApp/public/js/particles.min.js"></script>
        <script src="/marvelApp/public/js/particles-config.js"></script>
    </body>    
</html>