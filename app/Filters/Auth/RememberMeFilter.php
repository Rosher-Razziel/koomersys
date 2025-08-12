<?php

namespace App\Filters\Auth;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Auth\UsuarioModel;

class RememberMeFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return RequestInterface|ResponseInterface|string|void
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('isLoggedIn') && isset($_COOKIE['remember_token'])) {
            $usuarioModel = new UsuarioModel();
            $usuario = $usuarioModel->where('FCRECORDARTOKEN', $_COOKIE['remember_token'])->first();

            if ($usuario && strtotime($usuario['FDRECORDARTOKENFIN']) > time()) {
                // Restaurar sesión
                session()->set([
                    'isLoggedIn' => true,
                    'usuario' => [
                        'id' => $usuario['FIUSUARIOID'],
                        'nombre' => $usuario['FCNOMBREUSUARIO'],
                        'apellido' => $usuario['FCAPELLIDOPATERNO'],
                        'email' => $usuario['FCEMAIL'],
                        'rol' => $usuario['FCNOMBREROL'],
                        'rol_id' => $usuario['FIROLID'],
                        'sucursal' => $usuario['FCNOMBRESUCURSAL']
                    ]
                ]);
            }
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return ResponseInterface|void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
