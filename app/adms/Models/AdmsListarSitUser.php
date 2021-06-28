<?php

namespace App\adms\Models;

if (!defined('URLADM')) {
    header("Location: /");
    exit();
}

/**
 * Description of AdmsListarSitUser
 *
 * @copyright (c) year, Chirlanio Silva - Grupo Meia Sola
 */
class AdmsListarSitUser
{

    private $Resultado;
    private $PageId;
    private $LimiteResultado = 20;
    private $ResultadoPg;

    function getResultadoPg()
    {
        return $this->ResultadoPg;
    }

    public function listarSitUser($PageId = null)
    {
        $this->PageId = (int) $PageId;
        $paginacao = new \App\adms\Models\helper\AdmsPaginacao(URLADM . 'situacao-user/listar');
        $paginacao->condicao($this->PageId, $this->LimiteResultado);
        $paginacao->paginacao("SELECT COUNT(id) AS num_result FROM adms_sits_usuarios");
        $this->ResultadoPg = $paginacao->getResultado();

        $listarSitUser = new \App\adms\Models\helper\AdmsRead();
        $listarSitUser->fullRead("SELECT sit.*,
                cr.cor cor_cr
                FROM adms_sits_usuarios sit 
                INNER JOIN adms_cors cr ON cr.id=sit.adms_cor_id
                ORDER BY sit.nome ASC LIMIT :limit OFFSET :offset", "limit={$this->LimiteResultado}&offset={$paginacao->getOffset()}");
        $this->Resultado = $listarSitUser->getResultado();
        return $this->Resultado;
    }
}
