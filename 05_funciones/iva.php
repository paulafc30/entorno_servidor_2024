
<?php
    define("GENERAL", 1.21);
    define("REDUCIDO", 1.1);
    define("SUPERREDUCIDO", 1.04);
    function CalcularIva(int|float $precio, string $iva) : float{
        $pvp = match($iva){
            "general" => $precio * 1.21,
            "reducido" => $precio * 1.1,
            "superreducido" => $precio * 1.04,
        };
        return $pvp;
    }
?>