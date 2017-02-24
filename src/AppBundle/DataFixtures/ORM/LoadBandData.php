<?php
/**
 * Created by PhpStorm.
 * User: guillaume
 * Date: 24/02/2017
 * Time: 11:05
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Band;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Style;

class LoadBandData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $band = new Band();
        $band->setName('Emmure');
        $band->setStyle($this->getReference('Deathcore'));
        $manager->persist($band);
        $manager->flush();

        $band = new Band();
        $band->setName('Rise of the northstar');
        $band->setStyle($this->getReference('Hardcore'));
        $manager->persist($band);
        $manager->flush();

        $band = new Band();
        $band->setName('Pantera');
        $band->setStyle($this->getReference('Heavymetal'));
        $manager->persist($band);
        $manager->flush();

        $band = new Band();
        $band->setName('Metallica');
        $band->setStyle($this->getReference('Heavymetal'));
        $manager->persist($band);
        $manager->flush();

        $band = new Band();
        $band->setName('Slayer');
        $band->setStyle($this->getReference('Trashmetal'));
        $manager->persist($band);
        $manager->flush();

        $band = new Band();
        $band->setName('Behemoth');
        $band->setStyle($this->getReference('Blackmetal'));
        $manager->persist($band);
        $manager->flush();

        $band = new Band();
        $band->setName('Mayhem');
        $band->setStyle($this->getReference('Blackmetal'));
        $manager->persist($band);
        $manager->flush();

        $band = new Band();
        $band->setName('Immortal');
        $band->setStyle($this->getReference('Blackmetal'));
        $manager->persist($band);
        $manager->flush();

        $band = new Band();
        $band->setName('Burzum');
        $band->setStyle($this->getReference('Blackmetal'));
        $manager->persist($band);
        $manager->flush();

        $band = new Band();
        $band->setName('Cannibal corpse');
        $band->setStyle($this->getReference('Brutaldeathmetal'));
        $manager->persist($band);
        $manager->flush();

        $band = new Band();
        $band->setName('Napalm death');
        $band->setStyle($this->getReference('Grindcore'));
        $manager->persist($band);
        $manager->flush();

        $band = new Band();
        $band->setName('Death');
        $band->setStyle($this->getReference('Deathmetal'));
        $manager->persist($band);
        $manager->flush();

        $band = new Band();
        $band->setName('Dopethrone');
        $band->setStyle($this->getReference('Doom'));
        $manager->persist($band);
        $manager->flush();

        $band = new Band();
        $band->setName('Black sabbath');
        $band->setStyle($this->getReference('Sludge'));
        $manager->persist($band);
        $manager->flush();

        $band = new Band();
        $band->setName('Sunn O)))');
        $band->setStyle($this->getReference('Drone'));
        $manager->persist($band);
        $manager->flush();

        $band = new Band();
        $band->setName('In flames');
        $band->setStyle($this->getReference('Melodicdeathmetal'));
        $manager->persist($band);
        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}
