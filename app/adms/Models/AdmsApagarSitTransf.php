<?php

namespace App\adms\Models;

if (!defined('URLADM')) {
    header("Location: /");
    exit();
}

/**
 * Description of AdmsApagarSitTransf
 *
 * @copyright (c) year, Chirlanio Silva - Grupo Meia Sola
 */
class AdmsApagarSitTransf
{

    private $DadosId;
    private $Resultado;

    function getResultado()
    {
        return $this->Resultado;
    }

    public function apagarSit($DadosId = null)
    {
        $this->DadosId = (int) $DadosId;
        $apagarSit = new \App\adms\Models\helper\AdmsDelete();
        $apagarSit->exeDelete("tb_status_transf", "WHERE id =:id", "id={$this->DadosId}");
        if ($apagarSit->getResultado()) {
            $_SESSION['msg'] = "<div class='alert alert-success'>Situação apagada com sucesso!</div>";
            $this->Resultado = true;
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: A situação não foi apagada!</div>";
            $this->Resultado = false;
        }
    }
}
