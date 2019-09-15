<?php

/*
 * This file is part of the Beloop package.
 *
 * Copyright (c) 2016 AHDO Studio B.V.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Arkaitz Garro <arkaitz.garro@gmail.com>
 */

namespace Beloop\Component\User\Test\Unit\Entity\Abstracts;

use PHPUnit\Framework\TestCase;

use Beloop\Component\User\Exception\InvalidPasswordException;

/**
 * Class AbstractUserTest.
 */
class AbstractUserTest extends TestCase
{
    /**
     * Test set password method.
     */
    public function testSetPassword()
    {
        $user = $this->getMockForAbstractClass('Beloop\Component\User\Entity\Abstracts\AbstractUser');
        $user->setPassword('00000');
        $this->assertEquals(
            '00000',
            $user->getPassword()
        );

        $user->setPassword(null);
        $this->assertEquals(
            '00000',
            $user->getPassword()
        );
    }

    /**
     * Test set password method without exception.
     */
    public function testSetPasswordWithoutException()
    {
        $user = $this->getMockForAbstractClass('Beloop\Component\User\Entity\Abstracts\AbstractUser');
        $user->setPassword('  1  ');
        $user->setPassword('1234');
        $user->setPassword('blabla');

        $this->assertEquals(
            'blabla',
            $user->getPassword()
        );
    }

    /**
     * Test set password method with exception.
     *
     * @dataProvider dataSetPasswordWithException
     */
    public function testSetPasswordWithException($value)
    {
        $user = $this->getMockForAbstractClass('Beloop\Component\User\Entity\Abstracts\AbstractUser');
        $user->setPassword('00000');

        try {
            $user->setPassword($value);
            $this->fail('AbstractUser::setPassword($password) should contain a null value or a string');
        } catch (InvalidPasswordException $e) {
            $this->assertEquals(
                'The password is not a valid string',
                $e->getMessage()
            );
        }
    }

    /**
     * Data for testSetPasswordWithException.
     */
    public function dataSetPasswordWithException($value)
    {
        return [
            [true],
            [false],
            [''],
            ['   '],
            [0],
        ];
    }
}
