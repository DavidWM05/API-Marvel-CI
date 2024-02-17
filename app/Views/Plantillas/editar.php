    <body>
        <!--Particulas-->
        <div id="particles-js"></div>

        <!-- Encabezado -->
        <section class="section-encabezado justify-content-center">
            <h1>Edicion</h1>
        </section>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="actualizar" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nombre" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $personaje[0]['nombre']?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="miniatura" class="col-form-label">URL de miniatura:</label>
                            <input type="url" class="form-control" name="miniatura" id="miniatura" value="<?php echo $personaje[0]['miniatura']?>" required>
                        </div>    
                        <div class="modal-footer">
                            <a href="regresar" class="btn btn-danger">Cancelar</a>
                            <button type="submit" class="btn btn-success">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        
        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="/marvelApp/public/js/particles.min.js"></script>
        <script src="/marvelApp/public/js/particles-config.js"></script>
    </body>    
</html>