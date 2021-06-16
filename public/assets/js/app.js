function limpar_form_produto() {
    $("#cadastrar-produto").each(function(){
        this.reset();
    });
}

$(function() {
    $("#cadastrar-produto").submit(function(e){
        e.preventDefault();

        // let form = $(this).serialize();
        //
        // console.log(form);
        //
        // $.post("/produto/novo", form, function(data, status){
        //     // Display the returned data in browser
        //     console.log(data)
        //     console.log(status.)
        //     let alertProduto = $('.cadastro-produto-modal .alert');
        //     alertProduto.removeClass('d-none');
        //     alertProduto.append(data);
        //
        // });

        // $.ajax({
        //     url: '/produto/novo',
        //     type: 'post',
        //     contentType: 'application/x-www-form-urlencoded',
        //     data: $(this).serialize(),
        //     success: function( data, textStatus, jQxhr ){
        //         let alertProduto = $('.cadastro-produto-modal .alert');
        //         alertProduto.removeClass('alert-danger')
        //         alertProduto.addClass('alert-success');
        //         alertProduto.removeClass('d-none');
        //         alertProduto.html('Produto Cadastrado com sucesso');
        //
        //         limpar_form_produto();
        //     },
        //     error: function( jqXhr, textStatus, errorThrown ){
        //         let alertProduto = $('.cadastro-produto-modal .alert');
        //         alertProduto.removeClass('alert-success');
        //         alertProduto.addClass('alert-danger')
        //         alertProduto.removeClass('d-none');
        //         alertProduto.html('Não foi possivel cadastrar o produto');
        //     }
        // });

        let formData = new FormData(this);
        $.ajax({
            url: '/produto/novo',
            type: 'post',
            contentType: false,
            processData: false,
            data: formData,
            success: function( data, textStatus, jQxhr ){
                let alertProduto = $('.cadastro-produto-modal .alert');
                alertProduto.removeClass('alert-danger')
                alertProduto.addClass('alert-success');
                alertProduto.removeClass('d-none');
                alertProduto.html('Produto Cadastrado com sucesso');

                limpar_form_produto();
            },
            error: function( jqXhr, textStatus, errorThrown ){
                let alertProduto = $('.cadastro-produto-modal .alert');
                alertProduto.removeClass('alert-success');
                alertProduto.addClass('alert-danger')
                alertProduto.removeClass('d-none');
                alertProduto.html('Não foi possivel cadastrar o produto');
            }
        });

    });

    $('.deleta-produto').on('click', function (e){
        e.preventDefault();
        let produto_obj = $(this),
        produto_id = produto_obj.attr('href').substr(1);

        $.ajax({
            url: 'produto/destroy/' + produto_id,
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            contentType: 'application/x-www-form-urlencoded',
            success: function( data, textStatus, jQxhr ){

                produto_obj.parents('tr').remove();
                console.log('deletado');

            },
            error: function( jqXhr, textStatus, errorThrown ){

                console.log('não deletado');
            }
        });
    })

    $('.editar-produto').on('click', function (e){
        e.preventDefault();

        let produtoid = $('form #produtoid'),
            produtonome = $('form #produtonome'),
            produtovalor = $('form #produtovalor'),
            produtoimagem = $('form #produtoimagem'),
            produtodescricao = $('form #produtodescricao');

        $('.cadastro-produto-modal').modal('show');

        let editar_obj = $(this),
        produto_id = editar_obj.attr('href').substr(1);

        $.ajax({
            url: 'produto/search/' + produto_id,
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            contentType: 'application/x-www-form-urlencoded',
            success: function( data, textStatus, jQxhr ){

                produtoid.val(data.id);
                produtonome.val(data.nome);
                produtovalor.val(data.valor);
                produtoimagem.val(data.imagem);
                produtodescricao.val(data.descricao);


            },
            error: function( jqXhr, textStatus, errorThrown ){

                console.log('ferrou meu nobre');
            }
        });

    })

    function add_produto_lista(){

    }


});
