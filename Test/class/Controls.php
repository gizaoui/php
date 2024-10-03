<?php
namespace Tutorial;

class Controls
{
    protected array $data = [];
    const FORM_FLOAT_START = "div class='form-floating mb-2'";
    const DIV = "div";

    protected function __construct(array $data)
    {
        $this->data = $data;
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
        return self::withZero($this->data[$index] ?? '');
    }

    /**
     * @param $html : Code html entouré d'un paragraphe
     * @return string
     */
    private function surround($html)
    {
        return "<" . self::FORM_FLOAT_START . ">{$html}</" . self::DIV . ">";
    }

    /**
     * @param $name : Champs de type 'text'
     * @return string
     */
    public function Input(string $name): string
    {
        return $this->surround(
            "<input id='{$name}' name='{$name}' value='{$this->getValues($name)}' type='text' class='form-control'>" .
            "<label for='{$name}'>{$name}</label>"
        );
    }

    /**
     * @param $name : Bouton 'Submit'
     * @return string
     */
    public function Submit($name): string
    {
        return $this->surround("<button type='submit' class='btn btn-primary'>Envoyer</button>");
    }
}
