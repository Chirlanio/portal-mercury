<?php

namespace App\adms\Controllers;

if (!defined('URLADM')) {
    header("Location: /");
    exit();
}

/**
 * Description of ApagarTipoPg
 *
 * @copyright (c) year, Chirlanio Silva - Grupo Meia Sola
 */
class ApagarTipoPg
{

    private $DadosId;

    public function apagarTipoPg($DadosId = null)
    {
        $this->DadosId = (int) $DadosId;
        if (!empty($this->DadosId)) {
            $apagarTipoPg = new \App\adms\Models\AdmsApagarTipoPg();
            $apagarTipoPg->apagarTipoPg($this->DadosId);
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Necessário selecionar um tipo de página!</div>";
        }
        $UrlDestino = URLADM . 'tipo-pg/listar';
        header("Location: $UrlDestino");
    }
}
