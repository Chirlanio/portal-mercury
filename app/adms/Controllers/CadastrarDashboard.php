<?php

namespace App\adms\Controllers;

if (!defined('URLADM')) {
    header("Location: /");
    exit();
}

/**
 * Description of CadastrarDashboard
 *
 * @copyright (c) year, Chirlanio Silva - Grupo Meia Sola
 */
class CadastrarDashboard
{

    private $Dados;

    public function cadDash()
    {
        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (!empty($this->Dados['CadDash'])) {
            unset($this->Dados['CadDash']);
            $cadDash = new \App\adms\Models\AdmsCadastrarDashboard();
            $cadDash->cadDash($this->Dados);
            if ($cadDash->getResultado()) {
                $UrlDestino = URLADM . 'dashboard/listar';
                header("Location: $UrlDestino");
            } else {
                $this->Dados['form'] = $this->Dados;
                $this->cadDashViewPriv();
            }
        } else {
            $this->cadDashViewPriv();
        }
    }

    private function cadDashViewPriv()
    {
        $listarSelect = new \App\adms\Models\AdmsCadastrarDashboard();
        $this->Dados['select'] = $listarSelect->listarCadastrar();

        $botao = ['list_dash' => ['menu_controller' => 'dashboard', 'menu_metodo' => 'listar']];
        $listarBotao = new \App\adms\Models\AdmsBotao();
        $this->Dados['botao'] = $listarBotao->valBotao($botao);

        $listarMenu = new \App\adms\Models\AdmsMenu();
        $this->Dados['menu'] = $listarMenu->itemMenu();
        $carregarView = new \Core\ConfigView("adms/Views/dashboard/cadDash", $this->Dados);
        $carregarView->renderizar();
    }
}
