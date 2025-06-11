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
                                            <h5 class="m-b-10">Lista de Paises</h5>
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
                                    <h5 style="margin: 13px 0px 0px 18px;">Paises</h5>
                                </div>
                                <div class="col-md-6  text-end" style="padding: 0px !important;">
                                    <div id="modalAgregarPais" class="modal fade" tabindex="-1" role="dialog"
                                        aria-labelledby="modalAgregarPaisTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalAgregarPaisTitle">Agregar Pais
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="mb-3 text-start">
                                                            <label class="form-label" for="descripcionPais">Pais</label>
                                                            <input type="text" class="form-control" id="descripcionPais" placeholder="Nombre del pais...">
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Cerrar</button>
                                                    <button type="button" id="save-pais" class="btn btn-primary">Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" style="margin: 5px 30px 0px 0px;" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modalAgregarPais"><i class="feather icon-plus"></i> Agregar Pais</button>
                                </div>
                            </div>
                            <div class="card-body table-border-style">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>

                                                <th>Nombre del Pais</th>
                                                <th>Acciones</th>

                                            </tr>
                                        </thead>
                                        <tbody id="body-paises" style="color: white;">
                                            <?php foreach ($paises as $pais) { ?>
                                                <tr>

                                                    <td style=" padding: 0.4rem !important; vertical-align: middle;"><?php echo $pais['nombre'] ?></td>

                                                    <td style="width: 20%;  padding: 0.4rem !important; vertical-align: middle;"><button data-bs-toggle="modal"
                                                            data-bs-target="#modalEditarPais" type="button" flag="<?php echo $pais['idpais'] ?>" class="btn btn-primary editar-pais"><i class="feather icon-edit"></i>Editar</button>
                                                        &nbsp;&nbsp;&nbsp;
                                                        <button type="button" flag="<?php echo $pais['idpais'] ?>" class="btn btn-danger eliminar-pais"><i class="feather icon-slash"></i>Eliminar</button>
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

<div id="modalEditarPais" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="modalEditarPaisTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarPaisTitle">Editar Pais
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="text" id="idpais" hidden>
                    <div class="mb-3 text-start">
                        <label class="form-label" for="editDescripcionPais">Pais</label>
                        <input type="text" class="form-control" id="editDescripcionPais">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light"
                    data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="edit-pais" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>