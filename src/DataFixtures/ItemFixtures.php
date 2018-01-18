<?php
namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Item;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ItemFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $valuables = new Category();
        $valuables->setTitle('valuables');

        $wallet = new Item();
        $wallet->setTitle('Black wallet');
        $wallet->setDescription('Medium-size, black leather wallet');
        $wallet->setLocation('Heinzelova 23, 10000 Zagreb');
        $wallet->setPicture('https://cdn.xl.thumbs.canstockphoto.com/cash-and-credit-cards-in-old-wallet-stock-photo_csp5218544.jpg');
        $wallet->setCategory($valuables);

        $manager->persist($valuables);
        $manager->persist($wallet);

        $clothing = new Category();
        $clothing->setTitle('clothing');

        $scarf = new Item();
        $scarf->setTitle("Kid's scarf");
        $scarf->setDescription('Ochre, woolen');
        $scarf->setLocation('Savska 46, 10000 Zagreb');
        $scarf->setPicture('https://image.shutterstock.com/z/stock-photo-small-wooden-house-in-a-warming-scarf-comfortable-live-at-any-seasons-499530313.jpg');
        $scarf->setCategory($clothing);

        $manager->persist($clothing);
        $manager->persist($scarf);

        $keys = new Category();
        $keys->setTitle('keys');

        $keychain = new Item();
        $keychain->setTitle('Keychain');
        $keychain->setDescription('Set of 4 plain, silver keys on a keychain, found in a puddle by the side of the road');
        $keychain->setLocation('Vukovarska 12, 10000 Zagreb');
        $keychain->setPicture('https://thumbs.dreamstime.com/b/keys-keychain-four-silver-key-chain-isolated-white-33717257.jpg');
        $keychain->setCategory($keys);

        $manager->persist($keys);
        $manager->persist($keychain);

        $this->addReference('wallet-item', $wallet);
        $this->addReference('valuables-category', $valuables);
        $this->addReference('scarf-item', $scarf);
        $this->addReference('clothing-category', $clothing);
        $this->addReference('keychain-item', $keychain);
        $this->addReference('keys-category', $keys);

        $manager->flush();
    }
}