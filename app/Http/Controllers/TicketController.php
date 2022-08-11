<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class TicketController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(request()->total > 0){
            return view('pasarelaPago',
            ['total' => request()->total]);
        }else{
            return back()->with('fault','Debes comprar algún producto');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validados = $this->validados();
        $ticket = new Ticket($validados);
        $ticket->save();
        $this->storeLineas($ticket->id);
        return back()->with('success','Compra realizada con exito');
    }

    /**
     * storeLineas: Crea las lineas asociando el ticket(id) al producto(id)
     *
     * @param  mixed $ticketId
     * @return void
     */
    public function storeLineas($ticketId){
        session_start();
        $productos = $_SESSION['productos'];
        foreach ($productos as $producto) {
            DB::table('lineas')->insert([
                'ticket_id' => $ticketId,
                'producto_id' => $producto['id'],
            ]);
        };
        session_destroy();
    }


   private function validados(){
        $validados = request()->validate([
            'targeta' => 'required',
        ]);
        return $validados;
    }
}
