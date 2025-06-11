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
                                            <h5 class="m-b-10">Lista de Proyectos</h5>
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
                                    <h5 style="margin: 13px 0px 0px 18px;">Proyectos</h5>
                                </div>
                                <div class="col-md-6  text-end" style="padding: 0px !important;">
                                    <div id="modaleAgregarProyecto" class="modal fade" tabindex="-1" role="dialog"
                                        aria-labelledby="modaleAgregarProyectoTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modaleAgregarProyectoTitle">Agregar Proyecto
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="mb-3 text-start">
                                                            <label class="form-label" for="descripcionProyecto">Nombre proyecto</label>
                                                            <input type="text" class="form-control" id="descripcionProyecto" placeholder="Nombre del proyecto...">
                                                        </div>
                                                        <div class="mb-3 text-start">
                                                            <label class="form-label" for="paisProyecto">Pais</label>
                                                            <select class="form-select" id="paisProyecto">
                                                                <option value="0">Seleccione un Pais</option>
                                                                <?php foreach ($paises as $pais) { ?>
                                                                    <option value="<?php echo $pais['idpais'] ?>"><?php echo $pais['nombre'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 text-start">
                                                            <label class="form-label" for="ipProyecto">IP</label>
                                                            <input type="text" class="form-control" id="ipProyecto" placeholder="Eje: 172.102.101">
                                                        </div>
                                                        <div class="mb-3 text-start">
                                                            <input class="form-check-input input-success" type="checkbox" class="form-control" id="esPropia">
                                                            <label class="form-check-label" for="esPropia">¿Es propia?</label>

                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Cerrar</button>
                                                    <button type="button" id="save-proyecto" class="btn btn-primary">Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" style="margin: 5px 30px 0px 0px;" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modaleAgregarProyecto"><i class="feather icon-plus"></i> Agregar Proyecto</button>
                                </div>
                            </div>
                            <div class="card-body table-border-style">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>

                                                <th>Nombre del Proyecto</th>
                                                <th>Nombre del Pais</th>
                                                <th>direccion Ip</th>
                                                <th>Acciones</th>

                                            </tr>
                                        </thead>
                                        <tbody id="body-proyecto" style="color: white;">
                                            <?php foreach ($proyectos as $proyecto) { ?>
                                                <tr>
                                                    <td style=" padding: 0.4rem !important; vertical-align: middle;"><?php echo $proyecto['nombre'] ?></td>
                                                    <td style=" padding: 0.4rem !important; vertical-align: middle;"><?php echo $proyecto['nombre_pais'] ?></td>
                                                    <td style=" padding: 0.4rem !important; vertical-align: middle;"><?php echo $proyecto['ip'] ?></td>
                                                    <td style="width: 20%;  padding: 0.4rem !important; vertical-align: middle;"><button data-bs-toggle="modal"
                                                            data-bs-target="#modalEditarProyecto" type="button" flag="<?php echo $proyecto['idproyecto'] ?>" class="btn btn-primary editar-proyecto"><i class="feather icon-edit"></i>Editar</button>
                                                        &nbsp;&nbsp;&nbsp;
                                                        <button type="button" flag="<?php echo $proyecto['idproyecto'] ?>" class="btn btn-danger eliminar-proyecto"><i class="feather icon-slash"></i>Eliminar</button>
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
<div id="modalEditarProyecto" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="modalEditarProyectoTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarProyectoTitle">Editar Proyecto
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form>
                    <input type="text" id="idproyecto" hidden>
                    <div class="mb-3 text-start">
                        <label class="form-label" for="editDescripcionProyecto">Nombre del Proyecto</label>
                        <input type="text" class="form-control" id="editDescripcionProyecto">
                    </div>
                    <div class="mb-3 text-start">
                        <label class="form-label" for="editPais">Pais</label>
                        <select class="form-select" id="editPais">
                            <option value="0">Seleccione un Pais</option>
                            <?php foreach ($paises as $pais) { ?>
                                <option value="<?php echo $pais['idpais'] ?>"><?php echo $pais['nombre'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3 text-start">
                        <label class="form-label" for="editIpProyecto">IP</label>
                        <input type="text" class="form-control" id="editIpProyecto">
                    </div>
                    <div class="mb-3 text-start">

                        <input class="form-check-input input-success" type="checkbox" class="form-control" id="editEsPropia">
                        <label class="form-check-label" for="editEsPropia">¿Es propia?</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light"
                    data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="edit-proyecto" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>