<?php
/**
 * Created by PhpStorm.
 * User: guillaume
 * Date: 24/02/2017
 * Time: 11:05
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Style;

class LoadStyleData extends AbstractFixture implements OrderedFixtureInterface
{
    const STYLES_ARRAY = ['Black metal', 'Brutal death metal', 'Death metal', 'Deathcore', 'Doom', 'Drone', 'Grindcore', 'Hardcore', 'Heavy metal', 'Melodic death metal', 'Sludge', 'Trash metal'];

    public function load(ObjectManager $manager)
    {
        foreach (self::STYLES_ARRAY as $style){
            $styleEntity = new Style();
            $styleEntity->setName($style);
            $manager->persist($styleEntity);

            $this->addReference(str_replace(" ", "", $style), $styleEntity);
        }

        $manager->flush();

    }

    public function getOrder()
    {
        return 1;
    }
}
