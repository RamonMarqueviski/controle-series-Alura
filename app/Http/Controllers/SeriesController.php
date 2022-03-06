<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $request->query();
        $Series = Serie::query()->orderBy('nome')->get();

        $mensagem = $request->session()->get('mensagem');
        $request->session()->remove('mensagem');
        return view('series.index', ['series' => $Series, 'mensagem' => $mensagem]);
    }

    public function create(Request $request)
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {


        $serie = Serie::create($request->all());
        $request->session()->put('mensagem', "Série: {$serie->id} criada com sucesso {$serie->nome}");

        return redirect('/series');
    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->id);
        $request->session()->put('mensagem', "Série removida com sucesso");

        return redirect('/series');
    }
}
