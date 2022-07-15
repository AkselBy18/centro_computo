<?php
class Paginas 
{
    static public function enlacesPaginasModelo($enlace)
    {
        if($enlace == "principal")
        {
            $modulo = "vistas/modulos/principal.php";
        }
        elseif($enlace == "alta_usuarios")
        {
            $modulo = "vistas/modulos/alta_usuarios.php";
        }
        elseif($enlace == "alta_software")
        {
            $modulo = "vistas/modulos/alta_software.php";
        }
        elseif($enlace == "alta_control")
        {
            $modulo = "vistas/modulos/alta_control.php";
        }
        elseif($enlace == "actualizar_usuario")
        {
            $modulo = "vistas/modulos/actualizar_usuario.php";
        }
        elseif($enlace == "listado_software")
        {
            $modulo = "vistas/modulos/listado_software.php";
        }
        elseif($enlace == "listado_prestamos")
        {
            $modulo = "vistas/modulos/listado_prestamos.php";
        }
        elseif($enlace == "listado_sancionados")
        {
            $modulo = "vistas/modulos/listado_sancionados.php";
        }
        elseif($enlace == "listado_control")
        {
            $modulo = "vistas/modulos/listado_control.php";
        }
        elseif($enlace == "entregar_software")
        {
            $modulo = "vistas/modulos/entregar_software.php";
        }
        else
        {
            $modulo = "vistas/modulos/principal.php";
        }
        return $modulo;
    }
}