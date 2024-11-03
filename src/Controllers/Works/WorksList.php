<?php

namespace Controllers\Works;

use Controllers\PublicController;
use Dao\Works\Works;
use Views\Renderer;

class WorksList extends PublicController
{
    public function run(): void
    {
        $worksDao = Works::obtenerWorks();
        $viewWorks = [];
        $estadosDscArr = [
            "DSP" => "Disponible",
            "RSV" => "Reservado",
            "SLD" => "Vendido"
        ];
        foreach ($worksDao as $works) {
            $works["estadoDsc"] = $estadosDscArr[$works["estado"]];
            $viewWorks[] = $works;
        }
        $viewData = [
            "works" => $viewWorks
        ];
        Renderer::render("works/works_list", $viewData);
    }
}
