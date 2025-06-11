<?php

namespace App\Models;

use CodeIgniter\Model;


class DashboardModel extends Model
{
    protected $table = 'paises';

    public function getPaises()
    {
        $db = db_connect('default');
        $query = $db->query("select * from paises where idestado = '1';");
        return $query->getResult('array');
    }

    public function getProyectos()
    {
        $db = db_connect('default');
        $query = $db->query("select pro.*, pa.nombre as nombre_pais from proyectos pro inner join paises pa on pro.idpais = pa.idpais where pro.idestado = '1';");
        return $query->getResult('array');
    }

    public function getProyecto($id)
    {
        $db = db_connect('default');
        $query = $db->query("select * from proyectos where idproyecto = '$id';");
        return $query->getResult('array');
    }

    public function getGrupos()
    {
        $db = db_connect('default');
        $query = $db->query("select * from grupos_cartera where idestado = '1'");
        return $query->getResult('array');
    }

    public function savePais($descripcion)
    {
        $db = db_connect('default');
        $query = $db->query("insert into paises (nombre, idestado) values ('$descripcion', '1');");
    }

    public function saveGrupo($descripcion, $proyectos)
    {
        $db = db_connect('default');
        $query = $db->query("insert into grupos_cartera (nombre, idproyectos, idestado) values ('$descripcion','$proyectos' ,'1');");
    }

    public function getPais($id)
    {
        $db = db_connect('default');
        $query = $db->query("select * from paises where idestado = '1' and idpais = '$id';");
        return $query->getResult('array');
    }

    public function getGrupo($id)
    {
        $db = db_connect('default');
        $query = $db->query("select * from grupos_cartera where idestado = '1' and idgrupo = '$id';");
        return $query->getResult('array');
    }

    public function getNombreProyecto($id)
    {
        $db = db_connect('default');
        $query = $db->query("select nombre from proyectos where idproyecto = '$id';");
        return $query->getResult('array');
    }

    public function updatePais($descripcion, $id)
    {
        $db = db_connect('default');
        $query = $db->query("update paises set nombre = '$descripcion' where idpais = '$id';");
    }

    public function deletePais($id)
    {
        $db = db_connect('default');
        $query = $db->query("update paises set idestado = '0' where idpais = '$id';");
    }

    public function deleteGrupo($id)
    {
        $db = db_connect('default');
        $query = $db->query("update grupos_cartera set idestado = '0' where idgrupo = '$id';");
    }


    public function saveProyecto($descripcion, $pais, $ip, $propia)
    {
        $db = db_connect('default');
        $query = $db->query("insert into proyectos (nombre, idpais, espropia, ip, idestado) values ('$descripcion', '$pais', '$propia', '$ip', '1');");
    }

    public function deleteProyecto($id)
    {
        $db = db_connect('default');
        $query = $db->query("update proyectos set idestado = '0' where idproyecto = '$id';");
    }

    public function updateProyecto($descripcion, $id, $pais, $ip, $espropia)
    {
        $db = db_connect('default');
        $query = $db->query("update proyectos set nombre = '$descripcion', idpais = '$pais', espropia = '$espropia', ip = '$ip' where idproyecto = '$id';");
    }


    public function updateGrupo($descripcion, $proyectos, $id)
    {
        $db = db_connect('default');
        $query = $db->query("update grupos_cartera set nombre = '$descripcion', idproyectos = '$proyectos'where idgrupo = '$id';");
    }

}