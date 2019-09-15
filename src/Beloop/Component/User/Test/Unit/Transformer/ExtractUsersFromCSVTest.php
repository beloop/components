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

namespace Beloop\Component\User\Test\Unit\Transformer;

use PHPUnit\Framework\TestCase;

use Beloop\Component\Core\Generator\RandomGenerator;
use Beloop\Component\User\Factory\UserFactory;
use Beloop\Component\User\Transformer\ExtractUsersFromCSV;

/**
 * Class ExtractUsersFromCSVTest
 */
class ExtractUsersFromCSVTest extends TestCase
{
    private $transformer;
    private $userFactory;

    public function setUp(): void
    {
        $this->userFactory = new UserFactory();
        $this->userFactory->setEntityNamespace('Beloop\Component\User\Entity\User');
        $this->userFactory->setGenerator(new RandomGenerator());

        $this->transformer = new ExtractUsersFromCSV($this->userFactory, ['Email', 'First Name', 'Last Name']);
    }

    public function testExtractUsers()
    {
        $str = file_get_contents(dirname(__FILE__) . '/test_users.csv');

        $users = $this->transformer->extractUsers($str);

        $this->assertEquals(5, $users->count());
        $this->assertEquals('chris@contoso.com', $users->first()->getEmail());
        $this->assertEquals('Chris Green', $users->first()->getFullName());
    }
}
