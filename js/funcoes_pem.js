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

    $('#container').change(function(e){
        graficoBarra();
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
            if  (dados[0].QTD_LOTES == 1)
                dados[0].QTD_LOTES = dados[0].QTD_LOTES + ' Lote';
            else
                dados[0].QTD_LOTES =  dados[0].QTD_LOTES + ' Lotes';

            if  (dados[0].MEDIDA_IMPOSITIVA == "Sim")
                dados[0].MEDIDA_IMPOSITIVA = 'MEDIDA IMPOSITIVA';
            else
                dados[0].MEDIDA_IMPOSITIVA = 'SEM MEDIDA IMPOSITIVA';

            if  (dados[0].PAC == "Sim")
                dados[0].PAC = 'CARTEIRA PAC';
            else
                dados[0].PAC = 'CARTEIRA DEMAIS';

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

function graficoBarra() {
    // Create the chart
    Highcharts.chart(
        'container',
        {
            chart : {
                type : 'column',
                borderColor: '#CFCFCF',
                borderWidth: 1
            },
            //colors: ['#BDBDBD','#5882FA'],
            title : {
                text : 'Financeiro'
            },
            xAxis : {
                type : 'category'
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Valor em R$'
                }
            },
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.series.name +'</b><br/>'+
                        'R$'+ this.y.toFixed(2).replace(".",",");
                }
            },
            legend : {
                enabled : false
            },
            plotOptions : {
                series : {
                    borderWidth : 0,
                    dataLabels : {
                        enabled : true,
                        format : 'R$ {point.y:,.2f}'
                    }
                }
            },
            tooltip : {
                headerFormat : '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat : '<span style="color:{point.color}">{point.name}</span>: <b>R${point.y:,.2f}</b><br/>'
            },
            credits : {
                enabled : false
            },
            exporting : {
                enabled : false
            },
            series : [ {
                name : 'Planejamento',
                colorByPoint : true,
                data : [ {
                    name : 'Valor GEPAC',
                    y : 188.6
                }, {
                    name : 'Valor Contrato',
                    y : 161.3

                },
                    {
                        name : 'Loa Vigente',
                        y : 10.0
                    }

                ]
            } ]
        });
    };