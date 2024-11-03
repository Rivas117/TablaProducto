<?php

namespace Dao\Works;

use Dao\Table;

class Works extends Table
{
    public static function obtenerWorks()
    {
        $sqlstr = "SELECT * FROM works;";
        $works = self::obtenerRegistros($sqlstr, []);
        return $works;
    }

    public static function obtenerWorkPorId($id)
    {
        $sqlstr = "SELECT * from works where codigo=:codigo;";
        $work = self::obtenerUnRegistro($sqlstr, ["codigo" => $id]);
        return $work;
    }
    public static function agregarWork($work)
    {
        unset($work["codigo"]);
        unset($work["creado"]);
        unset($work["actualizado"]);
        $sqlstr = "insert into works (
            nombre, descripcion, precio, estado, 
            creado, actualizado) values
        (
            :nombre, :descripcion, :precio, 
            :estado, now(), now()
        );";
        return self::executeNonQuery($sqlstr, $work);
    }
    public static function actualizarWork($work)
    {
        unset($work["creado"]);
        unset($work["actualizado"]);
        $sqlstr = "update works set nombre = :nombre, descripcion= :descripcion, precio= :precio, estado = :estado, 
            actualizado = :now(), where codigo = :codigo;";

        return self::executeNonQuery($sqlstr, $work);
    }
    public static function eliminarWork($codigo)
    {
        $sqlstr = "delete from works where codigo = :codigo;";
        return self::executeNonQuery($sqlstr, ["codigo" => $codigo]);
    }
}
