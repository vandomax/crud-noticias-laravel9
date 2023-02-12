<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;

class NewsController extends Controller
{

    public function index()
    {
        $notices = Notice::all(); //get all, mostra todas as noticias

        return response()->json([
            'notices' => $notices
        ]);
    }

    public function store(Request $request)
    {
        $notice = new Notice; //inserindo nova noticia

        //tabelas da migrations
        $notice->titleNotice = $request->titleNotice; //preenche o titulo da noticia
        $notice->descriptionNotice = $request->descriptionNotice; //preenche a descrição da noticia
        $notice->imageNotice = $request->imageNotice; //preenche a imagem da noticia

        $notice->save(); //metodo do model para cadastrar

        return response()->json([
            'message'=> 'Notícia cadastrada com sucesso!'
        ]);
    }

    public function show($id)
    {
        $notice = Notice::find($id); //getfind busca somente o id da noticia

        return response()->json([
            'notice' => $notice
        ]);
    }

    public function update(Request $request, $id)
    {
        return response()->json([
            'rota' => 'update'
        ]);
    }

    public function destroy($id)
    {
        return response()->json([
            'rota' => 'destroy'
        ]);
    }
}