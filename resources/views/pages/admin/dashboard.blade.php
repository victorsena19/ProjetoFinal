@extends('layouts.default')
@section('content')
    <!-- Modal -->
    <div class="cadastro-produto-modal modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastro de Produto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="iq-card mb-0">
                        <div class="iq-card-body">
                            <div class="alert alert-success d-none" role="alert"></div>
                            <form id="cadastrar-produto" method="post" action="{{route('produto.novo')}}">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="produtoid" name="id" value="" required>
                                </div>
                                <div class="row form-group">
                                    <div class="col">
                                        <label for="exampleInputText1">Nome </label>
                                        <input type="text" class="form-control" id="produtonome" name="nome" value="" placeholder="Nome do produto" required>
                                    </div>
                                    <div class="col">
                                        <label for="exampleInputText1">Valor </label>
                                        <input type="text" class="form-control" id="produtovalor" name="valor" value="" placeholder="Valor do produto" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputurl">Imagem</label>
                                    <input type="file" class="form-control" id="produtoimagem" name="imagem" value="" placeholder="Imagem do produto" required>
                                </div>
                                <div class="form-group">
                                    <label>Descrição</label>
                                    <textarea class="form-control" id="produtodescricao" name="descricao" rows="3"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Salvar informações</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Produtos Cadastrados</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                             <button class="btn iq-bg-primary mr-2" data-toggle="modal" onclick="limpar_form_produto();" data-target="#exampleModal" style="padding: 8px 15px">
                                 Adicionar produto<i class="ri-add-fill ml-1 text-primary"></i>
                             </button>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-responsive">
                            <table class="table mb-0 mt-2 table-borderless table-test">
                                <tbody>
                                @foreach($produtos as $produto)
                                <tr>
                                    <td> {{$produto->id}} </td>
                                    <td class="text-center">
                                        <img class="rounded-circle img-fluid avatar-40" src="{{url($produto->imagem_path)}}" alt="profile">
                                    </td>
                                    <td>
                                        {{ $produto->nome }}
                                    </td>
                                    <td>
                                       {{ $produto->valor }}
                                    </td>
                                    <td>
                                       {{ date('d/m/Y', strtotime($produto->created_at)) }}
                                    </td>
                                    <td>
                                      {{ $produto->descricao }}
                                    </td>
                                    <td class="float-right">
                                        <div class="d-flex align-items-center text-right">
                                            <a href="#{{$produto->id}}" class="editar-produto avatar-45 text-center ml-3 rounded-circle iq-bg-success font-size-18"><i class="ri-pencil-fill font-size-16"></i></a>
                                            <a href="#{{$produto->id}}" class="deleta-produto avatar-45 rounded-circle text-center ml-3 iq-bg-danger font-size-18"><i class="ri-delete-bin-line font-size-16"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
