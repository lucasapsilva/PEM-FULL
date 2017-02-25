<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
    <div class="container">
        <div class="row">
            <div id="pais">
                <select id="cmbPais">
                </select>
            </div>
        </div>
    </div>
</div>
<div class="row col-md-12">
    <div class="col-md-3">
        <label>Qtd Lotes</label>
        <p id="lbLotes"></p>
    </div>
    <div class="col-md-3">
        <label>km</label>
        <p id="lbKm"></p>
    </div>
    <div class="col-md-3">
        <label>Medida Impositiva</label>
        <p id="lbImpositiva"></p>
    </div>
    <div class="col-md-3">
        <label>Carteira PAC</label>
        <p id="lbPAC"></p>
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
