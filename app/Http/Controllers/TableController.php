<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vangst;
use App\Models\Options;
use App\Models\Registratie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TableController extends Controller
{
    public function registratieFormulier() {
        $all = DB::table('options')->get();
        return view('visregistratie', ['all' => $all]);
    }

    public function showTableAll() {
        // $registraties = Registratie::with('gebruiker')->get()->paginate();
        return view('table-all', [
            'registraties' => Registratie::with('gebruiker')->paginate(5)
        ]);
    }

    public function profiel(User $user, Registratie $registratie) {
        return view('table-user', [
            'username' => $user->username, 
            'registraties' => Registratie::with('gebruiker')->paginate(5)
        ]);
    }

    // public function showTableUser(User $user) {

    //     return view('table-user', ['username' => $user->username, 'registraties' => $user->registraties()->get()]);
    // }

    public function registratieOpslaan(Request $request) {
        // validate the incoming request
        $incomingFields = $request->validate([
            'geslachtsnaam' => ['required'],
            'soortnaam' => ['required'],
            'vangplaats'=> ['required'],
            'ondersoort' => ['required'],
            'AS'=> ['required'],
            'KV'=> ['required'],
            'notitie' => ['nullable'],
            'aantal' => ['required'],
            'mv' => ['required'],
            'groep' => ['required'],
            'jongen' => ['required']
        ]);

        // Strip the incoming request from malicious html with php strip_tags function
        $incomingFields['geslachtsnaam'] = strip_tags($incomingFields['geslachtsnaam']);
        $incomingFields['soortnaam'] = strip_tags($incomingFields['soortnaam']);
        $incomingFields['vangplaats'] = strip_tags($incomingFields['vangplaats']);
        $incomingFields['ondersoort'] = strip_tags($incomingFields['ondersoort']);
        $incomingFields['AS'] = strip_tags($incomingFields['AS']);
        $incomingFields['KV'] = strip_tags($incomingFields['KV']);
        $incomingFields['aantal'] = strip_tags($incomingFields['aantal']);
        $incomingFields['mv'] = strip_tags($incomingFields['mv']);
        $incomingFields['groep'] = strip_tags($incomingFields['groep']);
        $incomingFields['jongen'] = strip_tags($incomingFields['jongen']);
        $incomingFields['notitie'] = strip_tags($incomingFields['notitie']);

        $incomingFields['user_id'] = auth() ->user()->id;

        // registers a blog post in the DB
        Registratie::create($incomingFields);

        return redirect('/profiel/' . auth()->user()->lidnummer)->with('success','Registratie voltooid.');
    }

    public function optiesOpslaan (Request $request) {
        $incomingFields = $request->validate([
            'geslachtsnaam' => ['nullable'],
            'soortnaam' => ['nullable'],
            'vangplaats'=> ['nullable'],
            'ondersoort' => ['nullable']
        ]);

        Options::create($incomingFields);
        return redirect('/beheerder')->with('success','Opties opgeslagen.');
    }

    public function delete(Registratie $registratie ) {

        if(auth()->user()->cannot('delete', $registratie)) {
            return 'You cannot do that..';
        }

        $registratie->delete();
        return redirect('/profiel/' . auth()->user()->lidnummer)->with('success', 'Deleted');
    }

    // public function deleteFromTableAll(Registratie $registratie ) {
    //     if(auth()->user()->cannot('delete', $registratie)) {
    //         return 'You cannot do that and I know your IP adress :)';
    //     }
    //     $registratie->delete();
    //     return redirect('/table-all')->with('success', 'Verwijderd');
    // }
}