$(document).ready(function(){
    dadosModal();
    $('#cmbModal').change(function(e){
        dadosRegiao();
    });

    $('#cmbRegiao').change(function(e){
        dadosUf();
    });

    $('#cmbUF').change(function(e){
        createDropdownListEmprendimentos();
    });

    $('#cmbPais').change(function(e){
        dadosEmpreendimento();
    });

});


function dadosModal() {
    $.getJSON('conexao/consulta.php?opcao=modal', function (dados){
        if (dados.length > 0){
            var option = '';
            $.each(dados, function(i, obj){
                option += '<option value="'+obj.MODAL+'">'+obj.MODAL+'</option>';
            });
            $('#cmbModal').html(option);
            dadosRegiao();
        }else{
            Reset();
            $('#mensagem').html('<span class="mensagem">Não foram encontrados modais!</span>');
        }
    });
}

function dadosRegiao() {
    var regiao = $('#cmbModal').val();
    $.getJSON('conexao/consulta.php?opcao=regiao&valor='+regiao, function (dados){
        if (dados.length > 0){
            var option = '';
            $.each(dados, function(i, obj){
                option += '<option value="'+obj.REGIAO+'">'+obj.REGIAO+'</option>';
            });
            $('#cmbRegiao').html(option);
            dadosUf();
        }else{
            Reset();
            $('#mensagem').html('<span class="mensagem">Não foram encontrados regiao!</span>');
        }
    })
}


function dadosUf() {
    var modal = $('#cmbModal').val();
    var regiao = $('#cmbRegiao').val();
    $.getJSON('conexao/consulta.php?opcao=uf&modal='+modal+'&regiao='+regiao, function (dados){
        if (dados.length > 0){
            var option = '';
            $.each(dados, function(i, obj){
                option += '<option value="'+obj.UF+'">'+obj.UF+'</option>';
            });
            $('#cmbUF').html(option);
            createDropdownListEmprendimentos();
        }else{
            Reset();
            $('#mensagem').html('<span class="mensagem">Não foram encontrados regiao!</span>');
        }
    })
}



function createDropdownListEmprendimentos() {
    var modal = $('#cmbModal').val();
    var regiao = $('#cmbRegiao').val();
    var uf = $('#cmbUF').val();
    $.getJSON('conexao/consulta.php?opcao=empreendimentos&modal='+modal+'&regiao='+regiao+'&uf='+uf, function (dados){
        if (dados.length > 0){
            var option = '';
            $.each(dados, function(i, obj){
                option += '<option value="'+obj.EMPREENDIMENTO+'">'+obj.EMPREENDIMENTO+'</option>';
            });
            $('#cmbPais').html(option);
            dadosEmpreendimento();
        }else{
            Reset();
            $('#mensagem').html('<span class="mensagem">Não foram encontrados paises!</span>');
        }
    });
}



function dadosEmpreendimento() {
    var pais = $('#cmbPais').val();
    $.getJSON('conexao/consulta.php?opcao=empreendimento&valor='+pais, function (dados){
        if (dados.length > 0){
            $("#lbKm").html(dados[0].KM);
            $("#lbLotes").html(dados[0].QTD_LOTES);
            $("#lbImpositiva").html(dados[0].MEDIDA_IMPOSITIVA);
            $("#lbPAC").html(dados[0].PAC);
            $("#lbCodigo").html(dados[0].CODIGO);
            $("#lbInicio").html(dados[0].INICIO);
            $("#lbTermino").html(dados[0].CONCLUSAO);
            $("#lbNatureza").html(dados[0].NATUREZA);
            $("#lbFase").html(dados[0].FASE);
            $("#lbSituacao").html(dados[0].SITUACAO);
            $("#lbResumo").html(dados[0].RESUMO);

            $("#lbGepac").html(dados[0].VALOR_GEPAC);
            $("#lbContrato").html(dados[0].CONTRATO_OBRA);
            $("#lbValor").html(dados[0].VALOR_MEDIDO);
            $("#lbEmpenho").html(dados[0].VALOR_EMPENHADO);
            $("#lbSaldo").html(dados[0].SALDO_A_EMPENHAR);
        }
    })
}

function Reset(){
    $('#cmbPais').empty().append('<option>Carregar Países</option>>');
}