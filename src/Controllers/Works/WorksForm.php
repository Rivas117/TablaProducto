<?php

namespace Controllers\Works;

use Controllers\PublicController;
use Views\Renderer;
use Utilities\Site;
use Dao\Works\Works;

class WorksForm extends PublicController
{
    private $viewData = [];
    private $modeDscArr = [
        "INS" => "Crear nuevo Producto",
        "UPD" => "Editando %s (%s)",
        "DSP" => "Detalle de %s (%s)",
        "DEL" => "Eliminando %s (%s)",
    ];
    private $mode = "";

    private $work = [
        "codigo" => 0,
        "nombre" => "",
        "descripcion" => "",
        "precio" => 0,
        "estado" => "",
        "creado" => "",
        "actualizado" => null
    ];

    public function run(): void
    {
        $this->inicializarForm();
        if ($this->isPostBack()) {
            $this->cargarDatosDelFormulario();
            $this->procesarAccion();
        }
        $this->generarViewData();
        Renderer::render("works/works_form", $this->viewData);
    }

    private function inicializarForm()
    {
        if (isset($_GET["mode"]) && isset($this->modeDscArr[$_GET["mode"]])) {
            $this->mode = $_GET["mode"];
        } else {
            Site::redirectToWithMsg("index.php?page=Works-WorksList", "Algo sucedio mal. intentelo De nuevo");
            die();
        }
        if ($this->mode !== "INS" && isset($_GET["codigo"])) {
            $this->work["codigo"] = $_GET["codigo"];
            $this->cargarDatosWork();
        }
    }
    private function cargarDatosWork()
    {
        $tmpWork = Works::obtenerWorkPorId($this->work["codigo"]);
        $this->work = $tmpWork;
    }

    private function cargarDatosDelFormulario()
    {
        $this->work["nombre"] = $_POST["nombre"];
        $this->work["descripcion"] = $_POST["descripcion"];
        $this->work["precio"] = floatval($_POST["precio"]);
        $this->work["estado"] = $_POST["estado"];
    }
    private function procesarAccion()
    {
        switch ($this->mode) {
            case "INS":
                $result = Works::agregarWork($this->work);
                if ($result) {
                    Site::redirectToWithMsg("index.php?page=Works-WorksList", "Carro Registrado Satisfactoriamnete");
                }
                break;
            case "UPD":
                $result = Works::actualizarWork($this->work);
                if ($result) {
                    Site::redirectToWithMsg("index.php?page=Works-WorksList", "Carro Actualizado Satisfactoriamnete");
                }
                break;
            case "DEL":
                $result = Works::eliminarWork($this->work["codigo"]);
                if ($result) {
                    Site::redirectToWithMsg("index.php?page=Works-WorksList", "Carro Eliminado Satisfactoriamnete");
                }
                break;
        }
    }
    //
    private function generarViewData()
    {
        $this->viewData["mode"] = $this->mode;
        $this->viewData["modes_dsc"] = sprintf(
            $this->modeDscArr[$this->mode],
            $this->work["nombre"],
            $this->work["codigo"]
        );
        $this->viewData["work"] = $this->work;
        $this->viewData["readonly"] =
            ($this->viewData["mode"] === "DEL"
                || $this->viewData["mode"] === "DSP")
            ? "readonly" : "";

        $this->viewData["showConfirm"] = ($this->viewData["mode"] !== "DSP");
    }
}
