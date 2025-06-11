<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Content-header ] start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Lista de Grupos</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- [ Content-header ] end -->

                        <!-- [ basic-table ] start -->
                        <div class="card">
                            <div class="row card-header" style="padding: 10px !important;">
                                <div class="col-md-6">
                                    <h5 style="margin: 13px 0px 0px 18px;">Grupos</h5>
                                </div>
                                <div class="col-md-6  text-end" style="padding: 0px !important;">
                                    <div id="modalAgregarGrupo" class="modal fade" tabindex="-1" role="dialog"
                                        aria-labelledby="modalAgregarGrupoTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalAgregarGrupoTitle">Agregar Grupo
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="mb-3 text-start">
                                                            <label class="form-label" for="descripcionGrupo">Nombre del grupo</label>
                                                            <input type="text" class="form-control" id="descripcionGrupo" placeholder="Nombre del grupo...">
                                                        </div>
                                                        <div class="mb-3 text-start">
                                                            <label class="form-label" for="carteras">Carteras del grupo</label>
                                                            <select class="form-select" name="cartera" id="cartera" multiple>
                                                                <?php foreach ($proyectos as $proyecto) { ?>
                                                                    <option value="<?php echo $proyecto['idproyecto'] ?>"><?php echo $proyecto['nombre'] ?></option>
                                                                <?php } ?>

                                                            </select><br><br>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Cerrar</button>
                                                    <button type="button" id="save-grupo" class="btn btn-primary">Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" style="margin: 5px 30px 0px 0px;" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modalAgregarGrupo"><i class="feather icon-plus"></i> Agregar Grupo</button>
                                </div>
                            </div>
                            <div class="card-body table-border-style">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>

                                                <th>Nombre del Grupo</th>
                                                <th>Carteras</th>
                                                <th>Acciones</th>

                                            </tr>
                                        </thead>
                                        <tbody id="body-grupo" style="color: white;">
                                            <?php foreach ($grupos as $grupo) { ?>
                                                <tr>

                                                    <td style=" padding: 0.4rem !important; vertical-align: middle;"><?php echo $grupo['nombre'] ?></td>
                                                    <td style=" padding: 0.4rem !important; vertical-align: middle;"><?php echo $grupo['nombre_proyectos'] ?></td>

                                                    <td style="width: 20%;  padding: 0.4rem !important; vertical-align: middle;"><button data-bs-toggle="modal"
                                                            data-bs-target="#modalEditarGrupo" type="button" flag="<?php echo $grupo['idgrupo'] ?>" class="btn btn-primary editar-grupo"><i class="feather icon-edit"></i>Editar</button>
                                                        &nbsp;&nbsp;&nbsp;
                                                        <button type="button" flag="<?php echo $grupo['idgrupo'] ?>" class="btn btn-danger eliminar-grupo"><i class="feather icon-slash"></i>Eliminar</button>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- [ Main Content ] end -->

<div id="modalEditarGrupo" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="modalEditarGrupoTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarGrupoTitle">Editar Grupo
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="text" id="idgrupo" hidden>
                    <div class="mb-3 text-start">
                        <label class="form-label" for="editDescripcionGrupo">Pais</label>
                        <input type="text" class="form-control" id="editDescripcionGrupo">
                    </div>
                    <div class="mb-3 text-start">
                        <label class="form-label" for="editCartera">Carteras del grupo</label>
                        <select class="form-select" name="editCartera" id="editCartera" multiple>
                            <?php foreach ($proyectos as $proyecto) { ?>
                                <option value="<?php echo $proyecto['idproyecto'] ?>"><?php echo $proyecto['nombre'] ?></option>
                            <?php } ?>

                        </select><br><br>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light"
                    data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="edit-grupo" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>