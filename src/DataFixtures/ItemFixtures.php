<?php
namespace App\DataFixtures;

use App\Entity\Item;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ItemFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $wallet = new Item();
        $wallet->setTitle('Black wallet');
        $wallet->setDescription('Medium-size, black leather wallet');
        $wallet->setLocation($this->getReference('location-1'));
        $wallet->setPicture('https://cdn.xl.thumbs.canstockphoto.com/cash-and-credit-cards-in-old-wallet-stock-photo_csp5218544.jpg');
        $wallet->setCategory($this->getReference('category-valuables'));
        $wallet->setStatus(Item::STATUS_FOUND);

        $manager->persist($wallet);


        $scarf = new Item();
        $scarf->setTitle("Kid's scarf");
        $scarf->setDescription('Ochre, woolen');
        $scarf->setLocation($this->getReference('location-1'));
        $scarf->setPicture('https://image.shutterstock.com/z/stock-photo-small-wooden-house-in-a-warming-scarf-comfortable-live-at-any-seasons-499530313.jpg');
        $scarf->setCategory($this->getReference('category-clothing'));
        $scarf->setStatus(Item::STATUS_LOST);

        $manager->persist($scarf);

        $keychain = new Item();
        $keychain->setTitle('Keychain');
        $keychain->setDescription('Set of 4 plain, silver keys on a keychain, found in a puddle by the side of the road');
        $keychain->setLocation($this->getReference('location-2'));
        $keychain->setPicture('https://thumbs.dreamstime.com/b/keys-keychain-four-silver-key-chain-isolated-white-33717257.jpg');
        $keychain->setCategory($this->getReference('category-keys'));
        $keychain->setStatus(Item::STATUS_FOUND_RETURNED);

        $manager->persist($keychain);

        $this->addReference('wallet-item', $wallet);
        $this->addReference('scarf-item', $scarf);
        $this->addReference('keychain-item', $keychain);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            CategoryFixtures::class,
            PointAndLocationFixtures::class
        );
    }
}