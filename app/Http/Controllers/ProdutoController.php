<?php

namespace App\Http\Controllers;

use App\Models\Imagens;
use App\Models\Produtos;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function novo(Request $request){

        unset($request['_token']);

        $request->validate([
            'imagem' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (empty($request->id)){

            unset($request['id']);

            $produtos = new Produtos();
            $produtos->fill($request->all());

            if ($request->file('imagem')) {
                $imagePath = $request->file('imagem');
                $imageName = $imagePath->getClientOriginalName();

                $path = $request->file('imagem')->storeAs('uploads', $imageName, 'public');
            }

            $produtos->imagem_nome = $imageName;
            $produtos->imagem_path = '/storage/'.$path;


            try {
                $produtos->save();
                return response()->json('Produto gravado com sucesso', 200);
            } catch (\Exception $e) {
                return response()->json('Erro: '. $e->getMessage(), 404);
            }
        } else {

            $produto_id = $request->id;
            $produto = [];

            $produto['nome'] = $request->nome;
            $produto['valor'] = $request->valor;
            $produto['imagem'] = $request->imagem;
            $produto['descricao'] = $request->descricao;



            try {
                Produtos::find($produto_id)->update($produto);
                return response()->json('Produto gravado com sucesso', 200);
            } catch (\Exception $e) {
                return response()->json('Erro: '. $e->getMessage(), 404);
            }

        }
    }

    public function getProduto($id){

        $produto = Produtos::find($id);

        return response()->json($produto);

    }

    public function destroy($id){

        try {
            Produtos::findOrFail($id)->delete();
            echo 'Produto deletado';
        } catch (\Exception $e){
            echo 'Erro: ' . $e->getMessage();
        }
    }
}
