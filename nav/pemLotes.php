<script type="text/javascript" src="vendor/jquery/jquery.js"></script>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Empreendimentos</h1>
    </div>
</div>
<div class="row">
    <div id="pais">
        <select id="cmbPais">
            <option>Selecione o Empreendimento</option>
        </select>
    </div>
</div>

    <?php if ($mensagem){
        echo '<script>$.notify("' . ltrim((rtrim($mensagem))) . '", "danger");</script>';
    }

    ?>


<script type="text/javascript">
    $(document).ready(function(){
        <!-- Carrega os Empreendimentos -->
        $('#cmbPais').click(function(e){
            $.getJSON('conexao/consulta.php?opcao=empreendimentos', function (dados){
                if (dados.length > 0){
                    var option = '<option></option>';
                    $.each(dados, function(i, obj){
                        option += '<option value="'+obj.EMPREENDIMENTO+'">'+obj.EMPREENDIMENTO+'</option>';
                    })
                    $('#mensagem').html('<span class="mensagem">Total de paises encontrados.: '+dados.length+'</span>');
                    $('#cmbPais').html(option).show();
                }else{
                    Reset();
                    $('#mensagem').html('<span class="mensagem">Não foram encontrados paises!</span>');
                }
            })
        });

        <!-- Resetar Selects -->
        function Reset(){
            $('#cmbPais').empty().append('<option>Carregar Países</option>>');
        }
    });
</script>