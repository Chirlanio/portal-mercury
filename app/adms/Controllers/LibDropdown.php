<?php

namespace App\adms\Controllers;

if (!defined('URLADM')) {
    header("Location: /");
    exit();
}

/**
 * Description of LibDropdown
 *
 * @copyright (c) year, Chirlanio Silva - Grupo Meia Sola
 */
class LibDropdown
{

    private $DadosId;
    private $NivId;
    private $PageId;

    public function libDropdown($DadosId = null)
    {
        $this->DadosId = (int) $DadosId;
        $this->NivId = filter_input(INPUT_GET, "niv", FILTER_SANITIZE_NUMBER_INT);
        $this->PageId = filter_input(INPUT_GET, "pg", FILTER_SANITIZE_NUMBER_INT);
        if (!empty($this->DadosId) and !empty($this->NivId) and !empty($this->PageId)) {
            $libDropdown = new \App\adms\Models\AdmsLibDropdown();
            $libDropdown->libDropdown($this->DadosId);
            $UrlDestino = URLADM . "permissoes/listar/{$this->PageId}?niv={$this->NivId}";
            header("Location: $UrlDestino");
        } else {
            $UrlDestino = URLADM . 'nivel-acesso/listar';
            header("Location: $UrlDestino");
        }
    }
}
