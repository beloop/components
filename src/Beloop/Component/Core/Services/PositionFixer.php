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

namespace Beloop\Component\Core\Services;

use Doctrine\Common\Collections\Collection;

use Beloop\Component\Core\Entity\Interfaces\PositionInterface;
use Beloop\Component\Core\Services\ManagerProvider;

/**
 * Class PositionFixer
 */
class PositionFixer
{
    private $managerProvider;
    private $objectManager;

    public function __construct(ManagerProvider $managerProvider)
    {
        $this->managerProvider = $managerProvider;
    }

    /**
     * Update collection items based on new entity position
     *
     * @param Collection $collection
     * @param PositionInterface $positionable
     * @param $oldPosition
     * @param $newPosition
     */
    public function fixEntitiesPosition(Collection $collection, PositionInterface $positionable, $oldPosition, $newPosition)
    {
        $this->objectManager = $this->managerProvider->getManagerByEntityNamespace(get_class($positionable));

        if ($oldPosition > $newPosition) {
            $this->increaseEntitiesPosition($collection, $positionable, $oldPosition, $newPosition);
        } else if ($oldPosition < $newPosition) {
            $this->decreaseEntitiesPosition($collection, $positionable, $oldPosition, $newPosition);
        }
    }

    /**
     * @param Collection $collection
     * @param PositionInterface $positionable
     * @param $oldPosition
     * @param $newPosition
     */
    protected function decreaseEntitiesPosition(Collection $collection, PositionInterface $positionable, $oldPosition, $newPosition)
    {
        foreach ($collection as $item) {
            if ($item->getId() !== $positionable->getId()) {
                if ($item->getPosition() <= $newPosition && $item->getPosition() > $oldPosition) {
                    $item->setPosition($item->getPosition() - 1);

                    $this->objectManager->persist($item);
                }
            }
        }

        $this->objectManager->flush();
    }

    /**
     * @param Collection $collection
     * @param PositionInterface $positionable
     * @param $oldPosition
     * @param $newPosition
     */
    protected function increaseEntitiesPosition(Collection $collection, PositionInterface $positionable, $oldPosition, $newPosition)
    {
        foreach ($collection as $item) {
            if ($item->getId() !== $positionable->getId()) {
                if ($item->getPosition() >= $newPosition && $item->getPosition() < $oldPosition) {
                    $item->setPosition($item->getPosition() + 1);

                    $this->objectManager->persist($item);
                }
            }
        }

        $this->objectManager->flush();
    }
}