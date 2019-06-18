<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\News;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::with('user:id,name')->get();
        return response()->json($news);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = new News();
        $news->fill($request->all());
        $news->save();

        return response()->json($news, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);

        if(empty($news)) {
            return response()->json([
                'message'   => 'Registro não encontrado',
            ], 404);
        }

        return response()->json($news);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $new = News::find($id);

        if(empty($new)) {
            return response()->json([
                'message'   => 'Registro não encontrado',
            ], 404);
        }

        $new->fill($request->all());
        $new->save();

        return response()->json($new);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = News::find($id);

        if(empty($new)) {
            return response()->json([
                'message'   => 'Registro não encontrado',
            ], 404);
        }

        $new->delete();
        return response()->json(['message' => 'Noticia excluida com sucesso'], 200);
    }
}
