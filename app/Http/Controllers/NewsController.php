<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;

class NewsController extends Controller
{

    public function index()
    {
        $notices = Notice::all(); //GET all, mostra todas as noticias

        return response()->json([
            'notices' => $notices
        ]);
    }

    public function store(Request $request)
    {
        $notice = new Notice; //inserindo nova noticia (POST)

        //tabelas da migrations
        $notice->titleNotice = $request->titleNotice; //preenche o titulo da noticia
        $notice->descriptionNotice = $request->descriptionNotice; //preenche a descrição da noticia
        $notice->imageNotice = $request->imageNotice; //preenche a imagem da noticia

        $notice->save(); //metodo do model para cadastrar

        return response()->json([ //retorna uma mensagem json cadastrando uma nova noticia
            'message'=> 'Notícia cadastrada com sucesso!'
        ]);
    }

    public function show($id)
    {
        $notice = Notice::find($id); //GETfind busca somente o id da noticia

        return response()->json([
            'notice' => $notice
        ]);
    }

    public function update(Request $request, $id)
    {
        $notice = Notice::find($id);
        $notice->update($request->all());

        return response()->json([ //retorna uma mensagem json deletando uma nova noticia
            'message'=>  'Alteração feita com sucesso!'
        ]);
    }   

    public function destroy($id)
    {
        $notice = Notice::find($id);

        $notice->delete(); //método para deletar a noticia inserida

        return response()->json([ //retorna uma mensagem json deletando uma nova noticia
            'message'=> 'Notícia deletada com sucesso!'
        ]);
    }
}