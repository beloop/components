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

namespace Beloop\Component\Course\Services;

use Beloop\Component\Core\Services\ObjectDirector;
use Beloop\Component\Course\Entity\Interfaces\CourseInterface;
use Beloop\Component\User\Entity\Interfaces\UserInterface;
use Beloop\Component\User\Services\UserManager;
use Beloop\Component\User\Transformer\ExtractUsersFromCSV;

/**
 * Class UserEnrollment
 */
class UserEnrollment
{
    /**
     * @var ExtractUsersFromCSV
     */
    private $transformer;

    /**
     * @var UserManager
     */
    private $userManager;

    /**
     * @var ObjectDirector
     */
    private $courseDirector;

    /**
     * @param ExtractUsersFromCSV $transformer
     * @param UserManager $userManager
     * @param ObjectDirector $courseDirector
     */
    public function __construct(
        ExtractUsersFromCSV $transformer,
        UserManager $userManager,
        ObjectDirector $courseDirector
    ) {
        $this->transformer = $transformer;
        $this->userManager = $userManager;
        $this->courseDirector = $courseDirector;
    }

    /**
     * Enrol users from CSV file on given course
     *
     * @param CourseInterface $course
     * @param $csv
     */
    public function enrolFromCSV(CourseInterface $course, $csv)
    {
        // Extract users from CSV file
        $users = $this->transformer->extractUsers($csv);

        // Insert or update users on database
        $procesedUsers = $this->userManager->insertOrUpdate($users);

        // Enroll users on course
        foreach ($procesedUsers as $user) {
            $user->addRole('ROLE_USER');
            $course->enrollUser($user);
        }

        $this->courseDirector->save($course);
    }

    /**
     * Enrol an user on a given course
     *
     * @param CourseInterface $course
     * @param UserInterface $user
     */
    public function enrol(CourseInterface $course, UserInterface $user) {
        $course->enrollUser($user);
        $this->courseDirector->save($course);
    }
}