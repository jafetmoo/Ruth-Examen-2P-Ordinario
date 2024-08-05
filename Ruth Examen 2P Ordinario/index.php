<?php
include 'conexion.php'
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>crud dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!----css3---->
    <link rel="stylesheet" href="css/custom.css">
    
    <!--google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
    <div class="body-overlay"></div>
    
    <!-------sidebar--design------------>
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3><span>Biblioteca</span></h3>
        </div>
        <ul class="list-unstyled components">
            <li class="tab-button active">
                <a onclick="openTab('autores')"><i class="material-icons">people</i><span>Autores</span></a>
            </li>
            <li class="tab-button">
                <a  onclick="openTab('libros')"><i class="material-icons">book</i><span>Libros</span></a>
            </li>
        </ul>
    </nav>
    
    <!-------sidebar--design- close----------->
    <!-------page-content start----------->
    <div id="content">
    <!------top-navbar-start-----------> 
    <div class="top-navbar">
        <div class="xd-topbar">
        <div class="row">
            <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
            
            </div>
            <div class="col-md-5 col-lg-3 order-3 order-md-2">
            <div class="xp-searchbar">
                <form>
                <div class="input-group">
                    <input type="search" class="form-control" placeholder="Search">
                    <div class="input-group-append">
                    <button class="btn" type="submit" id="button-addon2">Buscar</button>
                    </div>
                </div>
                </form>
            </div>
            </div>
        </div>
        <div class="xp-breadcrumbbar text-center">
        </div>
        </div>
    </div>
        
    <!------top-navbar-end-----------> 
    
    <!------main-content-start-----------> 
    <!------main-content-start----------->
<!------main-content-start----------->
<div class="main-content tab-pane active" id="autores">
    <div class="row">
        <div class="col-md-12">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
                            <h2 class="ml-lg-2">Autores</h2>
                        </div>
                        <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
                            <a href="#addAutorModal" class="btn btn-success" data-toggle="modal">
                                <i class="material-icons">&#xE147;</i>
                                <span>Añadir Nuevo Autor</span>
                            </a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Fecha Nacimiento</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM Autores";
                        $result = sqlsrv_query($conn, $sql);
                        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["nombre"] . "</td>";
                            echo "<td>" . $row["apellidos"] . "</td>";
                            echo "<td>" . $row["fecha_nacimiento"]->format('Y-m-d') . "</td>";
                            echo '<td>
                                    <a href="#editAutorModal" class="editAutor" data-toggle="modal" data-id="' . $row["id"] . '" data-nombre="' . $row["nombre"] . '" data-apellidos="' . $row["apellidos"] . '" data-fechanacimiento="' . $row["fecha_nacimiento"]->format('Y-m-d') . '">
                                      <i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i>
                                    </a>
                                    <a href="#deleteAutorModal" class="deleteAutor" data-toggle="modal" data-id="' . $row["id"] . '">
                                      <i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i>
                                    </a>
                                  </td>';
                            echo "</tr>";
                        }
                        sqlsrv_free_stmt($result);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Autor Modal -->
<div class="modal fade" tabindex="-1" id="addAutorModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Añadir Autor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="add_autor.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label>Apellidos</label>
                        <input type="text" class="form-control" name="apellidos" required>
                    </div>
                    <div class="form-group">
                        <label>Fecha Nacimiento</label>
                        <input type="date" class="form-control" name="fecha_nacimiento" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Añadir</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Autor Modal -->
<div class="modal fade" tabindex="-1" id="editAutorModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Autor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="edit_autor.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" id="editAutor-id">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="editAutor-nombre" required>
                    </div>
                    <div class="form-group">
                        <label>Apellidos</label>
                        <input type="text" class="form-control" name="apellidos" id="editAutor-apellidos" required>
                    </div>
                    <div class="form-group">
                        <label>Fecha Nacimiento</label>
                        <input type="date" class="form-control" name="fecha_nacimiento" id="editAutor-fecha_nacimiento" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Autor Modal -->
<div class="modal fade" tabindex="-1" id="deleteAutorModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar Autor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="delete_autor.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" id="deleteAutor-id">
                    <p>¿Estás seguro que deseas eliminar este autor?</p>
                    <p class="text-warning"><small>Esta acción no se puede deshacer.</small></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="main-content tab-pane" id="libros">
    <div class="row">
        <div class="col-md-12">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
                            <h2 class="ml-lg-2">Libros</h2>
                        </div>
                        <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
                            <a href="#addLibroModal" class="btn btn-success" data-toggle="modal">
                                <i class="material-icons">&#xE147;</i>
                                <span>Añadir Nuevo Libro</span>
                            </a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Fecha Publicación</th>
                            <th>Autor</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM vw_Libros";
                        $result = sqlsrv_query($conn, $sql);
                        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["titulo"] . "</td>";
                            echo "<td>" . $row["fecha_publicacion"]->format('Y-m-d') . "</td>";
                            echo "<td>" . $row["nombre_autor"] . "</td>";
                            echo '<td>
                                    <a href="#editLibroModal" class="editLibro" data-toggle="modal" data-id="' . $row["id"] . '" data-titulo="' . $row["titulo"] . '" data-fecha_publicacion="' . $row["fecha_publicacion"]->format('Y-m-d') . '" data-autor_id="' . $row["autor_id"] . '">
                                    <i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i>
                                    </a>
                                    <a href="#deleteLibroModal" class="deleteLibro" data-toggle="modal" data-id="' . $row["id"] . '">
                                    <i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i>
                                    </a>
                                </td>';
                            echo "</tr>";
                        }
                        sqlsrv_free_stmt($result);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" tabindex="-1" id="addLibroModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Añadir Libro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="add_libro.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Título</label>
                        <input type="text" class="form-control" name="titulo" required>
                    </div>
                    <div class="form-group">
                        <label>Fecha Publicación</label>
                        <input type="date" class="form-control" name="fecha_publicacion" required>
                    </div>
                    <div class="form-group">
                        <label>Autor ID</label>
                        <select class="form-control" name="autor_id" required>
                            <?php
                            $sql = "SELECT id, nombre FROM Autores";
                            $result = sqlsrv_query($conn, $sql);
                            while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                                echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . "</option>";
                            }
                            sqlsrv_free_stmt($result);
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Añadir</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Libro Modal -->
<div class="modal fade" tabindex="-1" id="editLibroModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Libro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="edit_libro.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" id="editLibro-id">
                    <div class="form-group">
                        <label>Título</label>
                        <input type="text" class="form-control" name="titulo" id="editLibro-titulo" required>
                    </div>
                    <div class="form-group">
                        <label>Fecha Publicación</label>
                        <input type="date" class="form-control" name="fecha_publicacion" id="editLibro-fecha_publicacion" required>
                    </div>
                    <div class="form-group">
                        <label>Autor ID</label>
                        <select class="form-control" name="autor_id" id="editLibro-autor_id" required>
                            <?php
                            $sql = "SELECT id, nombre FROM Autores";
                            $result = sqlsrv_query($conn, $sql);
                            while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                                echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . "</option>";
                            }
                            sqlsrv_free_stmt($result);
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Libro Modal -->
<div class="modal fade" tabindex="-1" id="deleteLibroModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar Libro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="delete_libro.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" id="deleteLibro-id">
                    <p>¿Estás seguro que deseas eliminar este libro?</p>
                    <p class="text-warning"><small>Esta acción no se puede deshacer.</small></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>





<!----------------------------FINAL-------------------------------->
    </div>
      
    <!-- Add your scripts at the end of the body to make the page load faster -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="script.js"></script>
  </body>
</html>

<?php
// Cerrar la conexión
sqlsrv_close($conn);
?>



