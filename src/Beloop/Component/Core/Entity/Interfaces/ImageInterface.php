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

namespace Beloop\Component\Core\Entity\Interfaces;

use Symfony\Component\HttpFoundation\File\File;

interface ImageInterface
{
    /**
     * @param File|null $image
     * @return mixed
     */
    public function setImageFile(File $image = null);

    /**
     * @return File
     */
    public function getImageFile();

    /**
     * @param string $imageName
     *
     * @return Self
     */
    public function setImageName($imageName);

    /**
     * @return string
     */
    public function getImageName();
}