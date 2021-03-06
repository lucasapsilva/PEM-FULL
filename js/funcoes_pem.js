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
    $('#cmbLotes').change(function(e){
        dadosLotes();

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
            dadosLote();
        }else{
            Reset();
            $('#mensagem').html('<span class="mensagem">Não foram encontrados paises!</span>');
        }
    });
}


function dadosLote() {
    var empreendimento = $('#cmbPais').val();
    $.getJSON('conexao/consulta.php?opcao=lote&valor='+empreendimento, function (dados){
        if (dados.length > 0){
            var option = '';
            $.each(dados, function(i, obj){
                option += '<option value="'+obj.LOTE+'">'+obj.LOTE+'</option>';
            });
            $('#cmbLotes').html(option);
            dadosLotes();
        }else{
            Reset();
            $('#mensagem').html('<span class="mensagem">Não foram encontrados Lotes!</span>');
        }
    })
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
            var valor_gepac;
            if (dados[0].VALOR_GEPAC > 0)
                valor_gepac = dados[0].VALOR_GEPAC;
            else
                valor_gepac = 0;
            var valor_contrato;
            if (dados[0].CONTRATO_OBRA > 0)
                valor_contrato = dados[0].CONTRATO_OBRA;
            else
                valor_contrato = 0;
            var valor_medido;
            if (dados[0].VALOR_MEDIDO > 0)
                valor_medido = dados[0].VALOR_MEDIDO;
            else
                valor_medido = 0;
            var valor_empenhado;
            if (dados[0].VALOR_EMPENHADO > 0)
                valor_empenhado = dados[0].VALOR_EMPENHADO;
            else valor_empenhado = 0;
            var saldo_empenhar;
            if (dados[0].SALDO_A_EMPENHAR > 0)
                saldo_empenhar = dados[0].SALDO_A_EMPENHAR;
            else
                saldo_empenhar = 0;
            graficoBarra(valor_gepac, valor_contrato);
            graphPie (valor_medido,valor_empenhado,saldo_empenhar);
        }
    })
}

function dadosLotes() {
    var empreendimento = $('#cmbPais').val();
    var lote = $('#cmbLotes').val();
    $.getJSON('conexao/consulta.php?opcao=lotes&valor='+empreendimento+'&lote='+lote, function (dados){
        if (dados.length > 0){
            $("#lbLote").html(dados[0].LOTE);
            $("#lbContrato").html(dados[0].LOTE_CONTRATO);
            $("#lbSituacaoContrato").html(dados[0].LOTE_SITUACAO_CONTRATO);
            $("#lbEmpresa").html(dados[0].LOTE_EMPRESA);
            $("#lbDataInicio").html(dados[0].LOTE_DATA_INICIO);
            $("#lbDataTermino").html(dados[0].LOTE_DATA_TERMINO);
            $("#lbValorInicial").html('R$ ' + moeda(dados[0].LOTE_VALOR_INICIAL,2,',','.'));
            $("#lbValorPIAR").html('R$ ' + moeda(dados[0].LOTE_VALOR_PIAR,2,',','.'));
            $("#lbEmpenhoInicial").html('R$ ' + moeda(dados[0].LOTE_EMPENHO_INICIAL,2,',','.'));
            $("#lbEmpenhoConsumido").html('R$ ' + moeda(dados[0].LOTE_EMPENHO_CONSUMIDO,2,',','.'));
            $("#lbValorTotalMedicao").html('R$ ' + moeda(dados[0].LOTE_VALOR_TOTAL_MEDICAO,2,',','.'));
            $("#lbValorSaldo").html('R$ ' + moeda(dados[0].LOTE_VALOR_SALDO,2,',','.'));
            $("#lbMedicaoAtestada").html('R$ ' + moeda(dados[0].LOTE_MEDICAO_ATESTADA,2,',','.'));
        }
    })
}


function Reset(){
    $('#cmbPais').empty().append('<option>Carregar Países</option>>');
}

function FormataNumeroTooltip() {
    if (this.y != 0) {
        var valor = this.y.toFixed(2).replace(/\d(?=(?:\d{3})+(?:\D|$))/g, "$&,").replace(".", "-");
        while (valor.indexOf(",") >= 0) {
            valor = valor.replace(",", ".");
        }
        valor = valor.replace("-", ",");
        return '<span style=\"font-size: 8px\">' + this.series.name + '</span> <br/> <span style=\"font-weight: bold; color: ' + this.point.color + ' \"> ' + this.point.name + '</span>: <b>' + valor + '</b>';
    }
}

function graficoBarra(valor_gepac, valor_contrato) {
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
                    y : valor_gepac
                }, {
                    name : 'Valor Contrato',
                    y : valor_contrato

                }]
            } ]
        });
};



function graphPie (valor_medido,valor_empenhado,saldo_empenhar) {
    Highcharts.chart('container2', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false,
            borderColor: '#CFCFCF',
            borderWidth: 1
        },
        title: {
            text: 'Medição'
        },
        tooltip: {
            formatter: FormataNumeroTooltip,
            shared: true
        },
        plotOptions: {
            pie: {
                dataLabels: {
                    distance: -10,
                    enabled: false,
                    style: {
                        fontWeight: 'bold',
                        color: 'white'
                    }
                },
                showInLegend: true
            }
        },
        credits : {
            enabled : false
        },
        exporting : {
            enabled : false
        },
        series: [{
            type: 'pie',
            name: 'Valor em R$:',
            innerSize: '70%',
            data: [['Valor Medido', valor_medido],
                ['Valor Empenhado', valor_empenhado],
                ['Saldo a Empenhar', saldo_empenhar]
            ]
        }]
    });
};


function moeda(valor, casas, separdor_decimal, separador_milhar){
    var valor_total = parseInt(valor * (Math.pow(10,casas)));
    var inteiros =  parseInt(parseInt(valor * (Math.pow(10,casas))) / parseFloat(Math.pow(10,casas)));
    var centavos = parseInt(parseInt(valor * (Math.pow(10,casas))) % parseFloat(Math.pow(10,casas)));
    if(centavos%10 == 0 && centavos+"".length<2 ){
        centavos = centavos+"0";
    }else if(centavos<10){
        centavos = "0"+centavos;
    }

    var milhares = parseInt(inteiros/1000);
    inteiros = inteiros % 1000;

    var retorno = "";

    if(milhares>0){
        retorno = milhares+""+separador_milhar+""+retorno;
        if(inteiros == 0){
            inteiros = "000";
        } else if(inteiros < 10){
            inteiros = "00"+inteiros;
        } else if(inteiros < 100){
            inteiros = "0"+inteiros;
        }
    }
    retorno += inteiros+""+separdor_decimal+""+centavos;


    return retorno;

}
