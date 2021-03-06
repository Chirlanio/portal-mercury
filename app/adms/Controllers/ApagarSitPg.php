<?php

namespace App\adms\Controllers;

if (!defined('URLADM')) {
    header("Location: /");
    exit();
}

/**
 * Description of ApagarSitPg
 *
 * @copyright (c) year, Chirlanio Silva - Grupo Meia Sola
 */
class ApagarSitPg
{

    private $DadosId;

    public function apagarSitPg($DadosId = null)
    {
        $this->DadosId = (int) $DadosId;
        if (!empty($this->DadosId)) {
            $apagarSitPg = new \App\adms\Models\AdmsApagarSitPg();
            $apagarSitPg->apagarSitPg($this->DadosId);
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Necessário selecionar uma situação de página!</div>";
        }
        $UrlDestino = URLADM . 'situacao-pg/listar';
        header("Location: $UrlDestino");
    }
}
