<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'description' => ['required', 'string', 'max:255'],
    //         'category' => ['required', 'string']
    //     ]);
    // }

    public function index()
    {
        $produtos = Product::all();
        return view('produto.index', compact('produtos'));
        //return view('produto.index')->with('produtos', $produtos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('produto.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = Validator::make( $request->all(),[
                        'name' => ['required', 'string', 'max:255'],
                        'description' => ['required', 'string', 'max:255'],
                        'category' => ['required', 'string'],
                    ],
                    [
                        'name.required' => 'Nome obrigatório.',
                        'name.max' =>  'Nome muito grande. Use somente 255 caracteres.',
                        'description.required' => 'A descrição é obrigatória.',
                        'description.max:255' => 'A descrição muito grande. Use somente 255 caracteres.',
                        'category.required' => 'A categoria é obrigatória.',
                    ],
                );

        if($validatedData->fails())
        {
            return redirect('/produto/create')->withErrors($validatedData)->withInput();
        }
        DB::beginTransaction();
        try
        {       
            $produto = new Product;
            $produto->name = $request->name;
            $produto->description = $request->description;
            $produto->category = $request->category;
            $produto->save();
            DB::commit();
            return redirect()->action([ProdutoController::class, 'index'])->with('success','Cadastrado com sucesso!');
        }
        catch(\Exception $e)
        {
            if (config('app.debug')) {
                dd($e);
            }
            return redirect('produto')->with('toast_error', "Não foi possível cadastrar o produto. Tente novamente mais tarde!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Product $produto)
    {
        $categories = Category::all();
        return view('produto.show', compact('produto','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $produto)
    {
        $categories = Category::all();
        return view('produto.edit', compact('produto','categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $produto)
    {
        $validatedData = Validator::make( $request->all(),[
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string'],
        ],
        [
            'name.required' => 'Nome obrigatório.',
            'name.max' =>  'Nome muito grande. Use somente 255 caracteres.',
            'description.required' => 'A descrição é obrigatória.',
            'description.max:255' => 'A descrição muito grande. Use somente 255 caracteres.',
            'category.required' => 'A categoria é obrigatória.',
        ],
        );

        if($validatedData->fails())
        {
        return redirect('/produto/create')->withErrors($validatedData)->withInput();
        }

        try
        {
            $produto = Product::find($produto->id);
            $produto->name = $request->name;
            $produto->description = $request->description;
            $produto->category = $request->category;
            $produto->save();
            return redirect()->action([ProdutoController::class, 'index'])->with('success','Editado com sucesso!');
        }
        catch(\Exception $e)
        {
            if(config('app.debug')){
                dd($e);
            }

            return redirect('produto')->with('toast_error','Não foi possível editar o produto. Tente novamente mais tarde!');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $destroy = Product::destroy($id);
            return redirect()->action([ProdutoController::class, 'index'])->with('success','Excluído com sucesso!');
        }
        catch(\Exception $e)
        {
            if(config('app.debug')){
                dd($e);
            }
            return redirect('produto')->with('toast_error','Não foi possível excluir o produto. Tente novamente mais tarde!');
        }
        
    }
}
