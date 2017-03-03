<?php
require_once('db.php');
$empreendimento = isset($_GET['opcao']) ? $_GET['opcao'] : '';
$valor = isset($_GET['valor']) ? $_GET['valor'] : '';
$modal = isset($_GET['modal']) ? $_GET['modal'] : '';
$regiao = isset($_GET['regiao']) ? $_GET['regiao'] : '';
$uf = isset($_GET['uf']) ? $_GET['uf'] : '';

if (! empty($empreendimento)){
    switch ($empreendimento)
    {
        case 'empreendimentos':
        {
            echo getEmpreendimentos($modal, $regiao, $uf);
            break;
        }
        case 'modal':
        {
            echo getModal();
            break;
        }
        case 'regiao':
        {
            echo getRegiao($valor);
            break;
        }

        case 'lotes':
        {
            echo getLotes($valor);
            break;
        }

        case 'uf':
        {
            echo getUF($modal, $regiao);
            break;
        }

        case 'empreendimento':
        {
            echo getFilterEmpreendimento($valor);
            break;
        }
    }
}

function getEmpreendimentos($mod, $ref, $uf){
    $pdo = Conectar();

    $sql = "select distinct(TITLE) as empreendimento
            from LISTA_SP_AD.dbo.TB_PWA_DPP_CADASTRO_EMPREENDIMENTOS 
            where MODAL_EMPREENDIMENTO = '$mod'
            and   REGIAO_EMPREENDIMENT = '$ref'
            and   UF_EMPREENDIMENTO    = '$uf'
            order by TITLE asc";
    $stm = $pdo->prepare($sql);
    $stm->execute();
    echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
    $pdo = null;
}

function getModal(){
    $pdo = Conectar();
    $sql = 'select distinct(MODAL_EMPREENDIMENTO) as modal
            from LISTA_SP_AD.dbo.TB_PWA_DPP_CADASTRO_EMPREENDIMENTOS 
            order by MODAL_EMPREENDIMENTO asc';
    $stm = $pdo->prepare($sql);
    $stm->execute();

    echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));

    $pdo = null;
}

function getRegiao($val){
    $pdo = Conectar();
    $sql = "select distinct(REGIAO_EMPREENDIMENT) regiao
            from LISTA_SP_AD.dbo.TB_PWA_DPP_CADASTRO_EMPREENDIMENTOS
            where MODAL_EMPREENDIMENTO = '$val'
            order by REGIAO_EMPREENDIMENT asc";
    $stm = $pdo->prepare($sql);
    $stm->execute();
    echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
    $pdo = null;
}

function getUf($mod, $reg){
    $pdo = Conectar();
    $sql = "select distinct(UF_EMPREENDIMENTO) uf
            from LISTA_SP_AD.dbo.TB_PWA_DPP_CADASTRO_EMPREENDIMENTOS
            where MODAL_EMPREENDIMENTO = '$mod'
            and   REGIAO_EMPREENDIMENT = '$reg'
            order by UF_EMPREENDIMENTO asc";
    $stm = $pdo->prepare($sql);
    $stm->execute();
    echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
    $pdo = null;
}

function getFilterEmpreendimento($val){
    $pdo = Conectar();
    $sql = "select count(lotes.TITLE) qtd_lotes,
       'KM ' + cast(empreendimentos.KM_INICIAL_EMPREENDI as varchar) + ' a ' + cast(empreendimentos.KM_FINAL_EMPREENDIME as varchar) as km,
       empreendimentos.MEDIDA_IMPOSITIVA,
       empreendimentos.PAC,
       empreendimentos.CODIGO_MT_EMPR as codigo,
       CONVERT(varchar, empreendimentos.DATA_INICIO_EM, 103) as inicio,
       CONVERT(varchar, empreendimentos.DATA_FIM_EMPREENDIME, 103) as conclusao,
       empreendimentos.NATUREZA_EMPREENDIMENTO as natureza,
       empreendimentos.FASE_EMPREENDIMENTO as fase,
       empreendimentos.SITUACAO_EMPRE as situacao,
       empreendimentos.COMENTARIOS_EMPREEND as resumo,
       empreendimentos.VALOR_GEPAC_EMPREEND as valor_gepac,
       empreendimentos.CONTRATO_OBRA_EMPREE as contrato_obra,
       empreendimentos.VALOR_MEDIDO_EMPREEN as valor_medido,
       empreendimentos.VALOR_EMPENHADO_EMPR as valor_empenhado,
       cast(empreendimentos.CONTRATO_OBRA_EMPREE - empreendimentos.VALOR_EMPENHADO_EMPR as numeric(14,2)) as saldo_a_empenhar
from LISTA_SP_AD.dbo.TB_PWA_DPP_CADASTRO_LOTES lotes,
     LISTA_SP_AD.dbo.TB_PWA_DPP_CADASTRO_EMPREENDIMENTOS empreendimentos       
where empreendimentos.TITLE = lotes.EMPREENDIMENTO
and lotes.EMPREENDIMENTO = '$val'
group by empreendimentos.KM_INICIAL_EMPREENDI,
         empreendimentos.KM_FINAL_EMPREENDIME,
         empreendimentos.MEDIDA_IMPOSITIVA,
         empreendimentos.PAC,
         empreendimentos.CODIGO_MT_EMPR,
         empreendimentos.DATA_INICIO_EM,
         empreendimentos.DATA_FIM_EMPREENDIME,
         empreendimentos.NATUREZA_EMPREENDIMENTO,
         empreendimentos.FASE_EMPREENDIMENTO,
         empreendimentos.SITUACAO_EMPRE,
         empreendimentos.COMENTARIOS_EMPREEND,
         empreendimentos.VALOR_GEPAC_EMPREEND,
         empreendimentos.CONTRATO_OBRA_EMPREE,
         empreendimentos.VALOR_MEDIDO_EMPREEN,
         empreendimentos.VALOR_EMPENHADO_EMPR,
         empreendimentos.VALOR_A_EMPENHAR";
    //var_dump($sql);exit();
    $stm = $pdo->prepare($sql);
    //var_dump($stm);exit();
    $stm->bindValue(1, $val);
    $stm->execute();
    echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
    $pdo = null;
}

function getLotes($val){

    $pdo = Conectar();
    $sql = "select lotes.TITLE as lote,
       lotes.NUMERO_CONTRATO as contrato,
       contrato.ds_fas_contrato,
       contrato.NO_EMPRESA as empresa,
       CONVERT(varchar, contrato.DT_INICIO,103) data_inicio,
       CONVERT(varchar, contrato.DT_TER_ATZ,103) data_termino,
       contrato.Valor_Inicial as valor_inicial,
       contrato.Valor_Inicial_Adit_Rejustes valor_piar,
       sum(empenho.VLR_EMPENHO_INICIAL) as empenho_inicial,
       lotes.VALOR_EMPANHADO_LOTE as empenho_consumido,
       cast(sum(medicao.VLR_MEDICAO_PIR) as numeric(14,2)) as valor_total_medicao,
       contrato.Valor_do_Saldo,
       contrato.Valor_Medicao_PI_R as medicao_atestada
from LISTA_SP_AD.dbo.TB_PWA_DPP_CADASTRO_LOTES lotes,
     LISTA_SP_AD.dbo.TB_PWA_DPP_CADASTRO_EMPREENDIMENTOS empreendimentos,
     SIMDNIT.dbo.Dados_Contrato contrato,
     SIMDNIT.dbo.Dados_Empenho empenho,
     SIMDNIT.dbo.Dados_Medicao medicao
where empreendimentos.TITLE = lotes.EMPREENDIMENTO
and   contrato.NU_CON_FORMATADO = lotes.NUMERO_CONTRATO
and   empenho.NU_CON_FORMATADO = contrato.NU_CON_FORMATADO
and   medicao.NU_CON_FORMATADO = contrato.NU_CON_FORMATADO
and   lotes.EMPREENDIMENTO = '$val'
group by lotes.TITLE,
         lotes.NUMERO_CONTRATO,
         contrato.ds_fas_contrato,
         contrato.NO_EMPRESA,
         contrato.DT_INICIO,
         contrato.DT_TER_ATZ,
         contrato.Valor_Inicial,
         contrato.Valor_Inicial_Adit_Rejustes,
         lotes.VALOR_EMPANHADO_LOTE,
         contrato.Valor_do_Saldo,
         contrato.Valor_Medicao_PI_R";
    //var_dump($sql);exit();
    $stm = $pdo->prepare($sql);
    var_dump($stm);
    $stm->bindValue(1, $val);
    $stm->execute();
    echo json_encode($stm->fetchAll(PDO::FETCH_ASSOC));
    $pdo = null;
}

?>