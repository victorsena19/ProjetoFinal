<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function dashboard(){

        $user = auth()->user();

        $events = $user->events;

    }

    public function destroy($id){

        Event::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Registro excluido com sucesso!');

    }
}
