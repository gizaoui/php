<?php

namespace App\Form;

/**
 * Elements de création d'une page web.
 */
class Floating
{
    protected array $post = [];
    const FORM_FLOAT_START = "div class='form-floating mb-2 ps-0'";

    const DIV = "div";

    public function __construct(array $post=[], array $get=[])
    {
        // var_dump($data);
        $this->post = $post;

        // Permettra la mise à jour
        if (!empty($get['id'])) {
            echo "<input type='hidden' id='id' name='id' value='{$get['id']}'>";
        }
        if (!empty($get['method'])) {
            echo "<input type='hidden' id='method' name='method' value='{$get['method']}'>";
        }
    }

    /**
     * @param string $value
     * Padding des données numériques
     * @return string
     */
    private static function withZero(string $value): string
    {
        if (is_numeric($value)) {
            return sprintf('%07d', $value);
        } else {
            return $value;
        }
    }

    /**
     * @param string $index
     * Sélection d'un paramètre du tableau $_POST (attribut $data)
     * initialisé dans le constructeur
     *
     * @return string
     */
    private function getValues(string $index): string
    {
        return self::withZero( $this->post[$index] ?? '');
    }

    /**
     * @param $html : Code html entouré d'un paragraphe
     * @return string
     */
    private function surround_float($html): string
    {
        return "<" . self::FORM_FLOAT_START . ">{$html}</" . self::DIV . ">";
    }

    /**
     * @param $name : Champs de type 'text'
     * @return string
     */
    public function Input(string $name, string $type = 'text'): string
    {
        if ($type === 'textarea') {
            $ctrl =
                "<textarea id='{$name}' name='{$name}' style='height: 120px' class='form-control' placeholder='Leave a comment here'>{$this->getValues($name)}</textarea>" .
                "<label for='{$name}'>{$name}</label>";
            return $this->surround_float($ctrl);

        } elseif ($type === 'datetime') {

            if ($this->post[$name]) {
                $dte = explode(' ', $this->post[$name])[0];
                $hour = explode(' ', $this->post[$name])[1];
            } else {
                $dte = date("Y-m-d");
                $hour = date("H:i");
            }

            // echo date_default_timezone_set('Europe/Paris');
            $ctrl =
                "<div class='input-group'>" .
                $this->surround_float("<input id='{$name}_date' name='{$name}_date' value='{$dte}' type='date' placeholder='{$name}' class='form-control'>" .
                    "<label for='{$name}_date'>{$name}</label>") .
                $this->surround_float("<input id='{$name}_time' name='{$name}_time' value='{$hour}' type='time' placeholder='{$name}' class='form-control'>" .
                    "<label for='{$name}_time'>{$name}</label>") .
                "</div>".
                "<input type='hidden' id='{$name}' name='{$name}' value='{$this->getValues($name)}'>";

            return $ctrl;
        } else {
            $ctrl =
                "<input type='{$type}'  id='{$name}' name='{$name}' value='{$this->getValues($name)}' type='{$type}' placeholder='{$name}' class='form-control'>" .
                "<label for='{$name}'>{$name}</label>";
            return $this->surround_float($ctrl);
        }
    }

    /**
     * @param $name : Bouton 'Submit'
     * @return string
     */
    public function Submit(): string
    {
        return $this->surround_float("<button type='submit' class='btn btn-primary'>Envoyer</button>");
    }

    public function Cancel(string $url='index.php'): string
    {
        return $this->surround_float("<a class='btn btn-secondary' href='{$url}'>Annuler</a>");
    }

    public static function LogPost(array $post): string
    {
        $trace = '';
        foreach ($post as $key => $value) {
            $trace .= "<li class='list-group-item'>'$key' : '$value'</li>";
        }
        return "<ul class='list-group list-group-flush form-control'>" . $trace . "</ul>";
    }
}