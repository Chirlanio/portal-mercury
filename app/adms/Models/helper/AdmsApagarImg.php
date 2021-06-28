<?php

namespace App\adms\Models\helper;

if (!defined('URLADM')) {
    header("Location: /");
    exit();
}

/**
 * Description of AdmsApagarImg
 *
 * @copyright (c) year, Chirlanio Silva - Grupo Meia Sola
 */
class AdmsApagarImg
{

    private $NomeImg;
    private $Diretorio;

    public function apagarImg($NomeImg, $Diretorio = null)
    {
        $this->NomeImg = (string) $NomeImg;
        $this->Diretorio = (string) $Diretorio;
        $this->excluirImagem();
        if (!empty($this->Diretorio)) {
            $this->excluirDiretorio();
        }
    }

    private function excluirImagem()
    {
        if (file_exists($this->NomeImg)) {
            unlink($this->NomeImg);
        }
    }

    private function excluirDiretorio()
    {
        if (file_exists($this->Diretorio)) {
            rmdir($this->Diretorio);
        }
    }
}
