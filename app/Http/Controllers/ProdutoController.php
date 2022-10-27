<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::all();

        return view('produto.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('produto.crud', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:300',
            'price' => 'required|numeric',
            'description' => 'required|string|max:1000',
            'quantity' => 'required|integer',
            'categoria_id' => 'required',
        ];

        $data = $request->validate($rules);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('produtos', 'public');
        }

        Produto::create($data);

        return redirect()->route('produto.index')->with('success', 'Produto cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::find($id);
        $produto->load('categoria');

        return response()->json($produto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produto::find($id);
        $categorias = Categoria::all();

        return view('produto.crud', compact('produto', 'categorias'));
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
        $rules = [
            'name' => 'required|string|max:300',
            'price' => 'required|numeric',
            'description' => 'required|string|max:1000',
            'quantity' => 'required|integer',
            'categoria_id' => 'required',
        ];

        $data = $request->validate($rules);

        $produto = Produto::find($id);

        if ($request->hasFile('image')) {
            Storage::delete('public/' . $produto->image);
            $data['image'] = $request->file('image')->store('produtos', 'public');
        }

        $produto->update($data);

        return redirect()->route('produto.index')->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);

        if ($produto->image) {
            Storage::delete('public/' . $produto->image);
        }

        $produto->delete();

        return redirect()->route('produto.index')->with('success', 'Produto excluído com sucesso!');
    }
}
