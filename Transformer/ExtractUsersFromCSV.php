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

namespace Beloop\Component\User\Transformer;

use League\Csv\Reader;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\PropertyAccess\PropertyAccess;

use Beloop\Component\User\Entity\User;
use Beloop\Component\User\Factory\UserFactory;

class ExtractUsersFromCSV
{
    protected $userFactory;
    protected $headers;

    /**
     * ExtractUsersFromCSV constructor.
     *
     * @param UserFactory $userFactory
     * @param array $headers Array of column names
     */
    public function __construct(UserFactory $userFactory, array $headers)
    {
        $this->userFactory = $userFactory;
        $this->headers = $headers;
    }

    /**
     * Create a list of users from CSV file
     *
     * @param $csv
     * @return ArrayCollection
     */
    public function extractUsers($csv)
    {
        $rows = $this->getRows($csv);

        $users = new ArrayCollection();
        foreach ($rows as $row) {
            $users->add($this->createUser($row));
        }

        return $users;
    }

    /**
     * Extract user rows from CSV string
     *
     * @param $csv
     * @return \Iterator
     */
    private function getRows($csv)
    {
        $reader = Reader::createFromString($csv);

        // Find column positions
        $columns = $this->findColumns($reader->fetchOne());

        return $reader->setOffset(1)->fetch(function ($row) use ($columns) {
            $user = [];

            foreach ($columns as $key => $name) {
                $user[$name] = $row[$key];
            }

            return $user;
        });
    }

    /**
     * Extract column position from header row
     *
     * @param array $header
     * @return array
     */
    private function findColumns(array $header)
    {
        $columns = [];

        foreach ($this->headers as $headerName) {
            $key = array_search($headerName, $header);

            if ($key !== false) {
                $columns[$key] = $headerName;
            }
        }

        return $columns;
    }

    /**
     * Create user instance from user row
     * 
     * @param $row
     * @return mixed
     */
    private function createUser($row)
    {
        $user = $this->userFactory->create();
        $accessor = PropertyAccess::createPropertyAccessor();

        foreach ($row as $column => $value) {
            $method = lcfirst(preg_replace('/\s+/', '', $column));
            $accessor->setValue($user, $method, $value);
        }
        
        return $user;
    }
}