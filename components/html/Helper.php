<?php

namespace app\components\html;

use yii\base\Component;

class Helper extends Component
{
    public function makeList(array $arrayLists,string $title = "Mensajes: ")
    {
        $resultHTML = "<h5>{$title}</h5>";
        $resultHTML .= "<ul>";
        foreach ($arrayLists as $key => $listItem) {
            $resultHTML .= "<li>- {$listItem}</li>";
        }
        $resultHTML .= "<ul>";
        return $resultHTML;
    }
}