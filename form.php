<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar/Editar Producto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2><?php echo isset($_GET['id']) ? 'Editar Producto' : 'Agregar Nuevo Producto'; ?></h2>
        <form id="productForm">
            <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            const urlParams = new URLSearchParams(window.location.search);
            const id = urlParams.get('id');
            if (id) {
                $.ajax({
                    url: 'get_product.php',
                    type: 'GET',
                    data: { id: id },
                    success: function(response) {
                        const product = JSON.parse(response);
                        $('#nombre').val(product.nombre);
                        $('#descripcion').val(product.descripcion);
                        $('#precio').val(product.precio);
                    }
                });
            }

            $('#productForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'save.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response == 'success') {
                            alert('Producto guardado.');
                            window.location.href = 'index.php';
                        } else {
                            alert('Error al guardar el producto.');
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>
