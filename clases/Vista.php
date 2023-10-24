<?php
class Vista {
    private $variables = [];

    public function set($clave, $valor)
    {
        $this->variables[$clave] = $valor;
    }

    public function render($vista, $main = true) {
        extract($this->variables);

        if ($main) {
            // Abro un buffer para no hacer el include directamente
            ob_start();
            // Se carga el buffer con el contenido de la vista
            include $vista;
            // El contenido del buffer se asigna a la variable $content
            $content = ob_get_clean();

            // Se incluye la vista principal
            include 'vistas/layouts/main.php';
        } else {
            include $vista;
        }  
    }
}