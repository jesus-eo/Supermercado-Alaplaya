<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Livewire\Component;

class CrudProductos extends Component
{
    public $codigo;
    public $denominacion;
    public $precio;
    public $formUpdate = false;
    public $productoId;

    protected $rules = [
        'codigo' => 'required',
        'denominacion' => 'required',
        'precio'=> 'required|numeric|min:1'
    ];

    /**
     * updated:verificación del formulario a medida que escribe.
     *
     * @param  mixed $propertyName
     * @return void
     */
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected function limpiarCampos(){
        $this->codigo = '';
        $this->denominacion = '';
        $this->precio = '';
        $this->productoId = '';
    }

    public function index(){
       return Producto::get();
    }

    /**
     * storeProducto: Crea nuevo producto.
     *
     * @return void
     */
    public function storeProducto(){
        $this->validate();
        $producto = Producto::where('codigo',$this->codigo)->where('denominacion',$this->denominacion)->first();
        if($producto){
            return redirect()->route('dashboard')->with('fault','Producto no creado, producto ya existente');
        }else{
            $nuevoProducto = new Producto();
            $nuevoProducto->codigo = $this->codigo;
            $nuevoProducto->denominacion = $this->denominacion;
            $nuevoProducto->precio = $this->precio;
            $nuevoProducto->save();
            return redirect()->route('dashboard')->with('success','Producto creado con exito');
        };
        $this->limpiarCampos();
    }

    /**
     * updateProducto:Actualiza producto.
     *
     * @return void
     */
    public function updateProducto(){
        $this->validate();
        $producto = Producto::find($this->productoId);
        if($producto == null){
            return redirect()->route('dashboard')->with('fault','Producto no actualizado');
        }else{
            $producto->codigo = $this->codigo;
            $producto->denominacion = $this->denominacion;
            $producto->precio = $this->precio;
            $producto->save();
            return redirect()->route('dashboard')->with('success','Producto actualizado con exito');
        }
        $this->limpiarCampos();
    }

    /**
     * borrarProducto:Borra producto
     *
     * @param  mixed $productoID
     * @return void
     */
    public function borrarProducto($productoID){
        Producto::find($productoID)->delete();
    }


    /**
     * createProducto:Inserta datos en los input el formulario de actualizar para visualizar los datos del producto seleccionado.
     *
     * @param  mixed $producto
     * @return void
     */
    public function createProducto($producto){
        $this->productoId = $producto['id'];
        $this->codigo = $producto['codigo'];
        $this->denominacion = $producto['denominacion'];
        $this->precio = $producto['precio'];
        $this->formUpdate= true;
    }

    /* private function validados(){
        $validados = request()->validate([
            'codigo' => 'required',
            'denominacion' => 'required',
            'precio' => 'required'
        ]);
        return $validados;
    } */

    public function render()
    {
        return view('livewire.crud-productos',[
            'productos' => $this->index(),
        ]);
    }
}
