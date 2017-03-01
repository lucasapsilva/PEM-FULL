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
    <div class="box-body">
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
            <table class="table table-bordered">
                <tr>
                    <th class="col-md-4" style="text-align: center; background-color: #1d75b3; color: white;"><p id="lbLotes"></p></th>
                    <th class="col-md-4" style="text-align: center; background-color: #1d75b3; color: white;"><p id="lbKm"></p></th>
                    <th class="col-md-2" style="text-align: center; background-color: #1d75b3; color: white;"><p id="lbImpositiva"></p></th>
                    <th class="col-md-2" style="text-align: center; background-color: #00a198; color: white;"><p id="lbPAC"></p></th>
                </tr>
            </table>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6"><b>Código: </b> <i id="lbCodigo"></i></div>
                    <div class="col-md-6"><b>Início: </b> <i id="lbInicio"></i></div>
                </div>
                <div class="row">
                    <div class="col-md-6"><b>Natureza: </b> <i id="lbNatureza"></i></div>
                    <div class="col-md-6"><b>Conclusão: </b> <i id="lbTermino"></i></div>
                </div>
                <div class="row">
                    <div class="col-md-6"><b>Fase: </b> <i id="lbFase"></i></div>
                    <div class="col-md-6"><b>Situação: </b> <i id="lbSituacao"></i></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-2">Estudos</div>
                    <div class="col-md-2">Planejamento</div>
                    <div class="col-md-2">Projeto</div>
                    <div class="col-md-2">Ambiental</div>
                    <div class="col-md-2">Desapropriaçao</div>
                    <div class="col-md-2">Reassentamento</div>
                </div>
                <br>
                <div class="row">
                    <a href="#"> <span class="col-md-2 glyphicon glyphicon-info-sign"></span></a>
                    <a href="#"><span class="col-md-2 glyphicon glyphicon-info-sign"></span></a>
                    <a href="#"><span class="col-md-2 glyphicon glyphicon-info-sign"></span></a>
                    <a href="#"><span class="col-md-2 glyphicon glyphicon-info-sign"></span></a>
                    <a href="#"><span class="col-md-2 glyphicon glyphicon-info-sign"></span></a>
                    <a href="#"> <span class="col-md-2 glyphicon glyphicon-info-sign"></span></a>
                </div>
            </div>
        </div>
        <br>
        <div class="row table-bordered" style="text-align: center;">
            <b>Comentários</b>
            <br>
            <i id="lbResumo"></i>
        </div>
        <div class="row">
            <div class="col-md-6" id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            <div class="col-md-6" id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        </div>
    </div>
</div>





<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Versão</b> 1.0
    </div>
    <strong>PEM © <?php echo date('Y'); ?>.</strong> DNIT - Departamento Nacional de Infraestrutura de Transportes.
</footer>
<script src="js/funcoes_pem.js"></script>
</body>
</html>
