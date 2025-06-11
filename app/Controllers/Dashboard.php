<?php

namespace App\Controllers;
use App\Models\DashboardModel;

class Dashboard extends BaseController 
{

    private $dashboardModel;

    public function __construct() {
        $this->dashboardModel = new DashboardModel();

    }

    public function dashboard()
    {
        echo view('templates/head');
        echo view('dashboard');
        echo view('templates/footer');
    }

    public function listProyectos()
    {

        $data['proyectos'] = $this->dashboardModel->getProyectos();
        $data['paises'] = $this->dashboardModel->getPaises();

        echo view('templates/head');
        echo view('configuracion/listProyectos', $data);
        echo view('templates/footer');
    }

    public function listPaises()
    {

        $data['paises'] = $this->dashboardModel->getPaises();

        echo view('templates/head');
        echo view('configuracion/listPaises', $data);
        echo view('templates/footer');
    }

    public function listGrupos()
    {

        $data['grupos'] = $this->dashboardModel->getGrupos();
        $data['proyectos'] = $this->dashboardModel->getProyectos();
        
        foreach ($data['grupos'] as $i => $grupo) {
            $nombre = '';
            $ids = explode(';', $grupo['idproyectos']);
                    foreach ($ids as $id) {
                    $nombreUno = $this->dashboardModel->getNombreProyecto($id);
                
                    $nombre .= $nombreUno[0]['nombre'] . " -- ";
                    }


            $data['grupos'][$i]['nombre_proyectos'] = $nombre;
        }


        
        echo view('templates/head');
        echo view('configuracion/listGrupos', $data);
        echo view('templates/footer');
    }



    public function savePais()
    {
        $descripcion = $this->request->getPost('pais');
        $this->dashboardModel->savePais($descripcion);

        $paises = $this->dashboardModel->getPaises();
        $html = "";

        foreach($paises as $pais){
            $html .= '<tr>
                        
                            <td sytle=" padding: 0.4rem !important; vertical-align: middle;">'.$pais['nombre'].'</td>
                            <td style="width: 20%;  padding: 0.4rem !important; vertical-align: middle;"><button type="button" flag= "'.$pais['idpais'].'" class="btn btn-primary editar-pais"><i class="feather icon-edit"></i>Editar</button>
                            &nbsp;&nbsp;&nbsp;
                            <button type="button" flag= "'.$pais['idpais'].'" class="btn btn-danger eliminar-pais"><i class="feather icon-slash"></i>Eliminar</button>
                            </td>
                        </tr>';
        }
        return $html;
    }

    public function getEditPais()
    {

        $id = $this->request->getPost('id');

        $data['pais'] = $this->dashboardModel->getPais($id);

        return $this->response->setJSON($data);
    }


    public function getEditGrupo()
    {

        $id = $this->request->getPost('id');

        $data['grupo'] = $this->dashboardModel->getGrupo($id);

        return $this->response->setJSON($data);
    }

    public function editPais()
    {
        $descripcion = $this->request->getPost('pais');
        $id = $this->request->getPost('id');

        $this->dashboardModel->updatePais($descripcion, $id);

        $paises = $this->dashboardModel->getPaises();
        $html = "";

        foreach($paises as $pais){
            $html .= '<tr>
                        
                            <td sytle=" padding: 0.4rem !important; vertical-align: middle;">'.$pais['nombre'].'</td>
                            <td style="width: 20%;  padding: 0.4rem !important; vertical-align: middle;"><button type="button" flag= "'.$pais['idpais'].'" class="btn btn-primary editar-pais"><i class="feather icon-edit"></i>Editar</button>
                            &nbsp;&nbsp;&nbsp;
                            <button type="button" flag= "'.$pais['idpais'].'" class="btn btn-danger eliminar-pais"><i class="feather icon-slash"></i>Eliminar</button>
                            </td>
                        </tr>';
        }
        return $html;
    }

    public function deletePais()
    {
        $id = $this->request->getPost('id');
        $this->dashboardModel->deletePais($id);

        $paises = $this->dashboardModel->getPaises();
        $html = "";

        foreach($paises as $pais){
            $html .= '<tr>
                        
                            <td sytle=" padding: 0.4rem !important; vertical-align: middle;">'.$pais['nombre'].'</td>
                            <td style="width: 20%;  padding: 0.4rem !important; vertical-align: middle;"><button type="button" flag= "'.$pais['idpais'].'" class="btn btn-primary editar-pais"><i class="feather icon-edit"></i>Editar</button>
                            &nbsp;&nbsp;&nbsp;
                            <button type="button" flag= "'.$pais['idpais'].'" class="btn btn-danger eliminar-pais"><i class="feather icon-slash"></i>Eliminar</button>
                            </td>
                        </tr>';
        }
        return $html;
    }



    public function deleteGrupo()
    {
        $id = $this->request->getPost('id');
        $this->dashboardModel->deleteGrupo($id);

        $grupos = $this->dashboardModel->getGrupos();
        $html = "";

        foreach($grupos as $grupo){
            
            
            $nombre = '';
            $ids = explode(';', $grupo['idproyectos']);
                    foreach ($ids as $id) {
                    $nombreUno = $this->dashboardModel->getNombreProyecto($id);
                
                    $nombre .= $nombreUno[0]['nombre'] . " -- ";
                    }


            $grupo['nombre_proyectos'] = $nombre;
        

            $html .= '<tr>
                        
                            <td sytle=" padding: 0.4rem !important; vertical-align: middle;">'.$grupo['nombre'].'</td>
                            <td sytle=" padding: 0.4rem !important; vertical-align: middle;">'.$grupo['nombre_proyectos'].'</td>

                            <td style="width: 20%;  padding: 0.4rem !important; vertical-align: middle;"><button type="button" flag= "'.$grupo['idgrupo'].'" class="btn btn-primary editar-grupo"><i class="feather icon-edit"></i>Editar</button>
                            &nbsp;&nbsp;&nbsp;
                            <button type="button" flag= "'.$grupo['idgrupo'].'" class="btn btn-danger eliminar-grupo"><i class="feather icon-slash"></i>Eliminar</button>
                            </td>
                        </tr>';
        }
        return $html;
    }



    public function saveGrupo()
    {
        $nombre = $this->request->getPost('nombre');
        $proyectos = $this->request->getPost('proyectos');

        $this->dashboardModel->saveGrupo($nombre, $proyectos);

        $grupos = $this->dashboardModel->getGrupos();
        $html = "";

        foreach($grupos as $grupo){
            
            
            $nombre = '';
            $ids = explode(';', $grupo['idproyectos']);
                    foreach ($ids as $id) {
                    $nombreUno = $this->dashboardModel->getNombreProyecto($id);
                
                    $nombre .= $nombreUno[0]['nombre'] . " -- ";
                    }


            $grupo['nombre_proyectos'] = $nombre;
        

            $html .= '<tr>
                        
                            <td sytle=" padding: 0.4rem !important; vertical-align: middle;">'.$grupo['nombre'].'</td>
                            <td sytle=" padding: 0.4rem !important; vertical-align: middle;">'.$grupo['nombre_proyectos'].'</td>

                            <td style="width: 20%;  padding: 0.4rem !important; vertical-align: middle;"><button data-bs-toggle="modal"
                            data-bs-target="#modalEditarGrupo" type="button" flag="'.$grupo['idgrupo'].'" class="btn btn-primary editar-grupo"><i class="feather icon-edit"></i>Editar</button>
                            &nbsp;&nbsp;&nbsp;
                            <button type="button" flag= "'.$grupo['idgrupo'].'" class="btn btn-danger eliminar-grupo"><i class="feather icon-slash"></i>Eliminar</button>
                            </td>
                        </tr>';
        }
        return $html;
    }


public function editGrupo()
    {
        $nombre = $this->request->getPost('nombre');
        $proyectos = $this->request->getPost('proyectos');
        $id = $this->request->getPost('id');

        $this->dashboardModel->updateGrupo($nombre, $proyectos, $id);

        $grupos = $this->dashboardModel->getGrupos();
        $html = "";

        foreach($grupos as $grupo){
            
            
            $nombre = '';
            $ids = explode(';', $grupo['idproyectos']);
                    foreach ($ids as $id) {
                    $nombreUno = $this->dashboardModel->getNombreProyecto($id);
                
                    $nombre .= $nombreUno[0]['nombre'] . " -- ";
                    }


            $grupo['nombre_proyectos'] = $nombre;
        

            $html .= '<tr>
                        
                            <td sytle=" padding: 0.4rem !important; vertical-align: middle;">'.$grupo['nombre'].'</td>
                            <td sytle=" padding: 0.4rem !important; vertical-align: middle;">'.$grupo['nombre_proyectos'].'</td>

                            <td style="width: 20%;  padding: 0.4rem !important; vertical-align: middle;"><button data-bs-toggle="modal"
                            data-bs-target="#modalEditarGrupo" type="button" flag="'.$grupo['idgrupo'].'" class="btn btn-primary editar-grupo"><i class="feather icon-edit"></i>Editar</button>
                            &nbsp;&nbsp;&nbsp;
                            <button type="button" flag= "'.$grupo['idgrupo'].'" class="btn btn-danger eliminar-grupo"><i class="feather icon-slash"></i>Eliminar</button>
                            </td>
                        </tr>';
        }
        return $html;
    }



    
    public function saveProyecto()
    {
        $descripcion = $this->request->getPost('descripcion');
        $pais = $this->request->getPost('pais');
        $ip = $this->request->getPost('ip');
        $espropia = $this->request->getPost('espropia');
        if($espropia == "true"){
            $espropia = 1;
        }else{
            $espropia = 0;
        }

        $this->dashboardModel->saveProyecto($descripcion, $pais, $ip, $espropia);

        $proyectos = $this->dashboardModel->getProyectos();
        $html = "";

        foreach($proyectos as $proyecto){
            $html .= ' <tr>
                            <td style=" padding: 0.4rem !important; vertical-align: middle;">'.$proyecto['nombre'].'</td>
                            <td style=" padding: 0.4rem !important; vertical-align: middle;">'.$proyecto['nombre_pais'].'</td>
                            <td style=" padding: 0.4rem !important; vertical-align: middle;">'.$proyecto['ip'].'</td>
                            <td style="width: 20%;  padding: 0.4rem !important; vertical-align: middle;"><button data-bs-toggle="modal"
                            data-bs-target="#modalEditarProyecto" type="button" flag="'.$proyecto['idproyecto'].'" class="btn btn-primary editar-proyecto"><i class="feather icon-edit"></i>Editar</button>
                            &nbsp;&nbsp;&nbsp;
                            <button type="button" flag="'.$proyecto['idproyecto'].'" class="btn btn-danger eliminar-proyecto"><i class="feather icon-slash"></i>Eliminar</button>
                            </td>
                        </tr>';
        }
        return $html;
    }

    public function getEditProyecto()
    {

        $id = $this->request->getPost('id');

        $data['proyecto'] = $this->dashboardModel->getProyecto($id);

        return $this->response->setJSON($data);
    }

    public function editProyecto()
    {
        $id = $this->request->getPost('id');
        $descripcion = $this->request->getPost('descripcion');
        $pais = $this->request->getPost('pais');
        $ip = $this->request->getPost('ip');
        $espropia = $this->request->getPost('espropia');
        if($espropia == "true"){
            $espropia = 1;
        }else{
            $espropia = 0;
        }
        $this->dashboardModel->updateProyecto($descripcion, $id, $pais, $ip, $espropia);

        $proyectos = $this->dashboardModel->getProyectos();
        $html = "";

        foreach($proyectos as $proyecto){
            $html .= ' <tr>
                            <td style=" padding: 0.4rem !important; vertical-align: middle;">'.$proyecto['nombre'].'</td>
                            <td style=" padding: 0.4rem !important; vertical-align: middle;">'.$proyecto['nombre_pais'].'</td>
                            <td style=" padding: 0.4rem !important; vertical-align: middle;">'.$proyecto['ip'].'</td>
                            <td style="width: 20%;  padding: 0.4rem !important; vertical-align: middle;"><button data-bs-toggle="modal"
                            data-bs-target="#modalEditarProyecto" type="button" flag="'.$proyecto['idproyecto'].'" class="btn btn-primary editar-proyecto"><i class="feather icon-edit"></i>Editar</button>
                            &nbsp;&nbsp;&nbsp;
                            <button type="button" flag="'.$proyecto['idproyecto'].'" class="btn btn-danger eliminar-proyecto"><i class="feather icon-slash"></i>Eliminar</button>
                            </td>
                        </tr>';
        }
        return $html;
    }

    public function deleteProyecto()
    {
        $id = $this->request->getPost('id');
        $this->dashboardModel->deleteProyecto($id);

        $proyectos = $this->dashboardModel->getProyectos();
        $html = "";

        foreach($proyectos as $proyecto){
            $html .= ' <tr>
                            <td style=" padding: 0.4rem !important; vertical-align: middle;">'.$proyecto['nombre'].'</td>
                            <td style=" padding: 0.4rem !important; vertical-align: middle;">'.$proyecto['nombre_pais'].'</td>
                            <td style=" padding: 0.4rem !important; vertical-align: middle;">'.$proyecto['ip'].'</td>
                            <td style="width: 20%;  padding: 0.4rem !important; vertical-align: middle;"><button data-bs-toggle="modal"
                            data-bs-target="#modalEditarProyecto" type="button" flag="'.$proyecto['idproyecto'].'" class="btn btn-primary editar-proyecto"><i class="feather icon-edit"></i>Editar</button>
                            &nbsp;&nbsp;&nbsp;
                            <button type="button" flag="'.$proyecto['idproyecto'].'" class="btn btn-danger eliminar-proyecto"><i class="feather icon-slash"></i>Eliminar</button>
                            </td>
                        </tr>';
        }
        return $html;
    }
}
