<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Livewire\Component;

class productos extends Component
{
    public $producto;
    public $codigoBarras;
    public $textMessage;
    public $message;
    public $total = 0;


    /**
     * anyadirProducto
     *Añado producto a la variable de sesión comprobando si existe un producto con ese código de barras.
     * @return void
     */
    public function anyadirProducto()
    {
        $producto = Producto::all()->where('codigo', $this->codigoBarras)->first();
        if (empty($producto)) {
            $this->textMessage = 'Código de barras incorrecto';
            $this->message = 'fault';
        } else {
            session_start();
            $carrito =  $_SESSION['productos'];
            $carrito[] = $producto;
            $_SESSION['productos'] = $carrito;
            $this->textMessage = 'Producto añadido correctamente';
            $this->message = 'success';
            /* Calculo el total */
            $this->total += $producto->precio;
        }
    }

    /**
     * borrarProducto
     *Recorro la sessión donde estan todos los productos y filtro por los que sean distintos al id del producto pasado.
     * @param  mixed $producto
     * @return void
     */
    public function borrarProducto($producto)
    {
        $primeraVez = false;
        $productoId = $producto['id'];
        $productos = [];
        session_start();
        foreach ($_SESSION['productos'] as $producto) {
            if ($producto->id != $productoId) {
                array_push($productos, $producto);
            } else {
                if (!$primeraVez) {
                    $primeraVez = true;
                } else {
                    array_push($productos, $producto);
                }
            }
        }
        /* Calculo el total */
        $this->total -= $producto->precio;
        $_SESSION['productos'] = $productos;
    }

    /**
     * initSession
     *Inicio una sesión
     * @return void
     */
    public function initSession()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (empty($_SESSION['productos'])) {
            $_SESSION['productos'] = [];
        }
    }



    public function render()
    {
        $this->initSession();
        return view(
            'livewire.productos',
            [
                'carrito' => $_SESSION['productos']
            ]
        );
    }
}
