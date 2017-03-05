<!DOCTYPE html>
<html lang="en">
<head>
    <title>DNIT | PEM</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/adminLTE/css/AdminLTE.min.css">
    <link rel="stylesheet" href="vendor/bootstrap/css/custom.css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">



    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/highcharts/highcharts.js"></script>
    <script src="vendor/highcharts/modules/data.js"></script>
    <script src="vendor/highcharts/modules/drilldown.js"></script>
    <script src="vendor/highcharts/modules/exporting.js"></script>
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }
        /* Add a gray background color and some padding to the footer */
        footer {
            background-color: #f2f2f2;
            padding: 10px;
        }
    </style>
    <link rel="icon" href="vendor/bootstrap/img/icon.png" type="image/x-icon" />
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand logo" href="#" >DNIT / PEM</a>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <b>Seleção de empreendimentos</b>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-inline">Modal</label>
                                <select class="form-control select2" id="cmbModal" style="width: 100%;">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Região</label>
                                <select class="form-control select2" id="cmbRegiao" style="width: 100%;">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>UF</label>
                                <select class="form-control select2" id="cmbUF" style="width: 100%;">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Empreendimento</label>
                                <select class="form-control select2" id="cmbPais" style="width: 100%;">
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-responsive">
                <tr>
                    <th class="col-md-4 btn-primary" data-toggle="modal" data-target="#modalLotes" style="text-align: center; cursor: pointer;">
                        <a href="#demo" data-target="#demo" >
                            <p id="lbLotes"</p></a>
                    </th>
                    <th class="col-md-2 btn-primary" style="text-align: center"><p id="lbKm"></p></th>
                    <th class="col-md-4 btn-primary" style="text-align: center"><p id="lbImpositiva"></p></th>
                    <th class="col-md-2 btn-success" style="text-align: center"><p id="lbPAC"></p></th>
                </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">

                <div class="panel-heading">
                    <b>Detalhamento</b>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th colspan="4" style="text-align: center">Detalhes do empreendimento</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="success">
                                            <td colspan="2"><b>Código: </b><font id="lbCodigo"></font> </b></td>
                                            <td colspan="2"><b>Início: </b><font id="lbInicio"></font></td>
                                        </tr>
                                        <tr class="warning">
                                            <td colspan="2"><b>Natureza:</b> <font id="lbNatureza"></font> </b></td>
                                            <td colspan="2"><b>Conclusão: </b><font id="lbTermino"></font></td>
                                        </tr>
                                        <tr class="info">
                                            <td colspan="2"><b>Fase: </b><font id="lbFase"></font> </b></td>
                                            <td colspan="2"><b>Situação: </b><font id="lbSituacao"></font></td>

                                        </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th colspan="6" style="text-align: center">Temáticas do empreendimento</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td style="text-align: center; font-size: 12px">Planejamento</td>
                                            <td style="text-align: center; font-size: 12px">Projeto</td>
                                            <td style="text-align: center; font-size: 12px">Ambiental</td>
                                            <td style="text-align: center; font-size: 12px">Desapropriaçao</td>
                                            <td style="text-align: center; font-size: 12px">Reassentamento</td>
                                        </tr>
                                        <tr>

                                            <td style="text-align: center"><a href="#"> <span class=" glyphicon glyphicon-info-sign"></span></a></td>
                                            <td style="text-align: center"><a href="#"> <span class=" glyphicon glyphicon-info-sign"></span></a></td>
                                            <td style="text-align: center"><a href="#"> <span class=" glyphicon glyphicon-info-sign"></span></a></td>
                                            <td style="text-align: center"><a href="#"> <span class=" glyphicon glyphicon-info-sign"></span></a></td>
                                            <td style="text-align: center"><a href="#"> <span class=" glyphicon glyphicon-info-sign"></span></a></td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div  id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div><br><br>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="panel panel-default" style="height: 269px;">
                                    <div class="panel-heading"><b>Comentários do Empreendiimento</b></div>
                                    <div class="panel-body"><font id="lbResumo"></font></div>
                                </div>
                            </div>
                            <div class="col-md-12" id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modalLotes" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Lotes</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-inline">Lote</label>
                                <select class="form-control select2" id="cmbLotes" style="width: 100%;">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="panel panel-default">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th colspan="6" style="text-align: center">Temáticas dos Lotes</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td style="text-align: center; font-size: 12px">Planejamento</td>
                                    <td style="text-align: center; font-size: 12px">Projeto</td>
                                    <td style="text-align: center; font-size: 12px">Ambiental</td>
                                    <td style="text-align: center; font-size: 12px">Desapropriaçao</td>
                                    <td style="text-align: center; font-size: 12px">Reassentamento</td>
                                </tr>
                                <tr>

                                    <td style="text-align: center"><a href="#"> <span class=" glyphicon glyphicon-info-sign"></span></a></td>
                                    <td style="text-align: center"><a href="#"> <span class=" glyphicon glyphicon-info-sign"></span></a></td>
                                    <td style="text-align: center"><a href="#"> <span class=" glyphicon glyphicon-info-sign"></span></a></td>
                                    <td style="text-align: center"><a href="#"> <span class=" glyphicon glyphicon-info-sign"></span></a></td>
                                    <td style="text-align: center"><a href="#"> <span class=" glyphicon glyphicon-info-sign"></span></a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="panel panel-default">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th colspan="4" style="text-align: center">Detalhes do lote</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="success">
                                    <td colspan="2"><b>Lote: </b><font id="lbLote"></font> </b></td>
                                    <td colspan="2"><b>Contrato: </b><font id="lbContrato"></font></td>
                                </tr>
                                <tr class="warning">
                                    <td colspan="2"><b>Situação Contrato:</b> <font id="lbSituacaoContrato"></font> </b></td>
                                    <td colspan="2"><b>Empresa Contratada: </b><font id="lbEmpresa"></font></td>
                                </tr>
                                <tr class="info">
                                    <td colspan="2"><b>Data de Início: </b><font id="lbDataInicio"></font> </b></td>
                                    <td colspan="2"><b>Data Termino: </b><font id="lbDataTermino"></font></td>
                                </tr>
                                <tr class="success">
                                    <td colspan="2"><b>Valor Inicial: </b><font id="lbValorInicial"></font> </b></td>
                                    <td colspan="2"><b>Valor Inicial + Aditivos + Reajuste: </b><font id="lbValorPIAR"></font></td>
                                </tr>
                                <tr class="warning">
                                    <td colspan="2"><b>Valor Empenho Inicial:</b> <font id="lbEmpenhoInicial"></font> </b></td>
                                    <td colspan="2"><b>Valor Empenho Consumido: </b><font id="lbEmpenhoConsumido"></font></td>
                                </tr>
                                <tr class="info">
                                    <td colspan="2"><b>Valor Total de Medições + Reajustes: </b><font id="lbValorTotalMedicao"></font> </b></td>
                                    <td colspan="2"><b>Valor do Saldo: </b><font id="lbValorSaldo"></font></td>
                                </tr>
                                <tr class="success">
                                    <td colspan="2"><b>Valor Atestado da Medição: </b><font id="lbMedicaoAtestada"></font> </b></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>







<footer class="main-footer" style="text-align: center">

    <strong>PEM © <?php echo date('Y'); ?>.</strong> DNIT - Departamento Nacional de Infraestrutura de Transportes. [Versão 1.0]
</footer>
<script src="js/funcoes_pem.js"></script>
</body>
</html>
