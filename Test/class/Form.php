<?php
namespace Tutorial;
/**
 * Class Form
 *  Construction d'un formulaire
 */
class Form extends Controls
{
    private string $trace;

    /**
     * @param $data : Données envoyées par le $_POST
     * ex. ['firstname' => 'John', 'lastname' => 'DOE']
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
    }

    public function LogPost(): string
    {
        $trace = '';
        foreach ($_POST as $key => $value) {
            $trace .= "<li class='list-group-item'>'$key' : '$value'</li>";
        }
        return "<ul class='list-group list-group-flush'>" . $trace . "</ul>";
    }

    public function getDate(): string {
        return "<h6>".(new \DateTime())->format('Y-m-d H:i:s')."</h6>";
    }

}

