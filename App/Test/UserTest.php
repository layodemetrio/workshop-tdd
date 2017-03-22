<?php

namespace App\Test;

use App\Model\User;
use PHPUnit_Framework_TestCase;

class UserTest extends PHPUnit_Framework_TestCase
{
    private $user;

    public function setUp()
    {
        $this->user = new User();
    }
    /**
    * @test
    */
    public function verifyUserSubscriber()
    {
        $this->assertTrue($this->user->isUser());
    }

    /**
    * @test
    */
    public function verifyUserActive()
    {
        $this->assertEquals('Active', $this->user->statusUser('A'));
    }

    /**
    * @test
    */
    public function verifyUserInactive()
    {
        $this->assertEquals('Inactive', $this->user->statusUser('I'));
    }

    /**
    * @test
    * @expectedException Exception
    * @expectedExceptionMessage Status invalid
    */
    public function verifyUserInvalid()
    {
        $this->user->statusUser('C');
    }

    /**
    * @test
    */
    public function verifyUserCurriculum()
    {
        $curriculum = $this->getMock(
            'App\Model\CurriculumUser',
            array('get', 'method')
        );

        $curriculum->expects($this->once())
            ->method('get')
            ->will(
                $this->returnValue([
                    'name' => 'Layo Demetrio',
                    'age' => 28
                ])
            );

        $this->user->setCurriculum($curriculum);

        $this->assertEquals(
            array(
                'name' => 'Layo Demetrio',
                'age' => 28
            ),
            $this->user->showCurriculum()
        );
    }
}
