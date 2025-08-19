<?php

namespace App\Filters\Auth;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null){

        // 1. Validar si hay sesión activa
        if (!session()->has('usuario')) {
            return redirect()->to(base_url());

        }
        $rolUsuario = session()->get('usuario.rol_id');

        if ($arguments && !in_array($rolUsuario, $arguments)) {
            return redirect()->to(base_url('accesodenegado'));
        }

        // 2. Validar si el rol tiene acceso a esta ruta
        if ($arguments && !in_array($rolUsuario, $arguments)) {
            // Si no es AJAX -> redirigir
            return redirect()->to(base_url('accesodenegado'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
