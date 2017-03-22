<?php

namespace App\Model;

use App\Model\CurriculumUser;
use App\Type\UserType;

class User
{
    private $curriculumUser;

    public function setCurriculum(CurriculumUser $curriculumUser)
    {
        $this->curriculumUser = $curriculumUser;
        return $this;
    }

    public function showCurriculum()
    {
        return $this->curriculumUser->get();
    }

    public function isUser()
    {
        return true;
    }

    public function statusUser($status)
    {
        $this->validateStatusUser($status);

        if($status == UserType::ACTIVE) {
            return 'Active';
        }

        return 'Inactive';
    }

    private function validateStatusUser($status)
    {
        if($status != 'A' && $status != 'I') {
            throw new \Exception("Status invalid");
        }
    }
}
