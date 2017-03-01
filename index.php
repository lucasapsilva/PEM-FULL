<!DOCTYPE html>
<html lang="en">
<head>
    <title>DNIT | PEM</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
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
            padding: 25px;
        }
    </style>
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
            <a class="navbar-brand" href="#">DNIT | PEM</a>
        </div>
    </div>
</nav>

<div class="jumbotron">
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label>Modal</label>
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
    <div class="row">
        <table class="table table-bordered col-md-12">
            <tr>
                <th class="col-md-4" style="text-align: center; background-color: #1d75b3; color: white;"><p id="lbLotes"></p></th>
                <th class="col-md-4" style="text-align: center; background-color: #1d75b3; color: white;"><p id="lbKm"></p></th>
                <th class="col-md-2" style="text-align: center; background-color: #1d75b3; color: white;"><p id="lbImpositiva"></p></th>
                <th class="col-md-2" style="text-align: center; background-color: #00a198; color: white;"><p id="lbPAC"></p></th>
            </tr>
        </table>
    </div>
    <div class="row col-md-12">
        <table class="table table-bordered">
            <tr>
                <label class="col-md-3" style="text-align: left">Código: <p id="lbCodigo"></p></label>
                <label class="col-md-3" style="text-align: right">Natureza: <p id="lbNatureza"></p></label>
            </tr>
        </table>
    </div>
</div>

<div class="row col-md-12">
    <div class="col-md-2">
        <label>Codigo</label>
        <p id="lbCodigo"></p>
    </div>
    <div class="col-md-2">
        <label>Data Inicio</label>
        <p id="lbInicio"></p>
    </div>
    <div class="col-md-2">
        <label>Data Termino</label>
        <p id="lbTermino"></p>
    </div>
    <div class="col-md-2">
        <label>Natureza</label>
        <p id="lbNatureza"></p>
    </div>
    <div class="col-md-2">
        <label>Fase</label>
        <p id="lbFase"></p>
    </div>
    <div class="col-md-2">
        <label>Situacao</label>
        <p id="lbSituacao"></p>
    </div>

</div>

<label>Comentários</label>
<div id="lbResumo"></div>


<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<label>Valor GEPAC</label>
<div id="lbGepac"></div>
<label>Valor Contrato Obra</label>
<div id="lbContrato"></div>
<label>Valor Medido</label>
<div id="lbValor"></div>
<label>Valor Empenhado</label>
<div id="lbEmpenho"></div>
<label>Saldo a Empenhar</label>
<div id="lbSaldo"></div>


<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Versão</b> 1.0
    </div>
    <strong>PEM © <?php echo date('Y'); ?>.</strong> DNIT - Departamento Nacional de Infraestrutura de Transportes.
</footer>
<script src="js/funcoes_pem.js"></script>
</body>
</html>
