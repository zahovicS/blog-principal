<?php

namespace app\components\security;

use yii\base\Component;
use yii\base\Security;

class Encrypter extends Component
{
    private $security;

    public function __construct($config = [])
    {
        parent::__construct($config);
        $this->security = new Security();
    }

    public function encrypt($id)
    {
        return $this->security->hashData($id, $this->getSecretKey());
    }

    public function decrypt($encryptedId)
    {
        return $this->security->validateData($encryptedId, $this->getSecretKey());
    }

    private function getSecretKey()
    {
        // Aquí debes devolver tu clave secreta
        return 'q5kjJ6rw5Qf@PCWsokLvEf';
    }
}