<?php

namespace App\adms\Models;

if (!defined('URLADM')) {
    header("Location: /");
    exit();
}

/**
 * Description of AdmsCadastrarNivAc
 *
 * @copyright (c) year, Chirlanio Silva - Grupo Meia Sola
 */
class AdmsCadastrarNivAc
{

    private $Resultado;
    private $Dados;
    private $UltimoNivAc;

    function getResultado()
    {
        return $this->Resultado;
    }

    public function cadNivAc(array $Dados)
    {
        $this->Dados = $Dados;

        $valCampoVazio = new \App\adms\Models\helper\AdmsCampoVazio;
        $valCampoVazio->validarDados($this->Dados);

        if ($valCampoVazio->getResultado()) {
            $this->inserirNivAc();
        } else {
            $this->Resultado = false;
        }
    }

    private function inserirNivAc()
    {
        $this->Dados['created'] = date("Y-m-d H:i:s");
        $this->verUltimoNivAc();
        $this->Dados['ordem'] = $this->UltimoNivAc[0]['ordem'] + 1;
        $cadNivAc = new \App\adms\Models\helper\AdmsCreate;
        $cadNivAc->exeCreate("adms_niveis_acessos", $this->Dados);
        if ($cadNivAc->getResultado()) {
            $_SESSION['msg'] = "<div class='alert alert-success'>Nível de acesso cadastrado com sucesso!</div>";
            $this->Resultado = true;
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: O nível de acesso não foi cadastrado!</div>";
            $this->Resultado = false;
        }
    }

    private function verUltimoNivAc()
    {
        $verNivAc = new \App\adms\Models\helper\AdmsRead();
        $verNivAc->fullRead("SELECT ordem FROM adms_niveis_acessos ORDER BY ordem DESC LIMIT :limit", "limit=1");
        $this->UltimoNivAc = $verNivAc->getResultado();
    }

    public function listarCadastrar()
    {
        $listar = new \App\adms\Models\helper\AdmsRead();

        $listar->fullRead("SELECT id cor_id, nome cor FROM adms_cors ORDER BY id ASC");
        $registro['cor'] = $listar->getResultado();

        $this->Resultado = ['cor' => $registro['cor']];

        return $this->Resultado;
    }
}
