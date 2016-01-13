<?php

namespace HandMadeBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use HandMadeBundle\Entity\Category;
use HandMadeBundle\Entity\Product;

class LoadCategoryData extends AbstractFixture implements FixtureInterface {

    public function load(ObjectManager $manager)
    {
        $category1 = new Category();
        $category1->setName('Ляльки');

        $product1 = new Product();
        $product1->setName('Еллі');
        $product1->setPrice(425);
        $product1->setDescription('Гарна і проста лялька.Гарна і проста лялька.Гарна і проста лялька.Гарна і проста лялька.Гарна і проста лялька.');
        $product1->setCategory($category1);

        $category2 = new Category();
        $category2->setName('Тканини');

        $product2 = new Product();
        $product2->setName('Ажур');
        $product2->setPrice(25);
        $product2->setDescription('Тканина з бавовняної, вовняної або шовкової пряжі, що має наскрізний орнамент.');
        $product2->setCategory($category2);


        $category3 = new Category();
        $category3->setName('Прикраси');

        $product3 = new Product();
        $product3->setName('Бісер');
        $product3->setPrice(2.50);
        $product3->setDescription('Гарний і простий бісер.Гарний і простий бісер.Гарний і простий бісер.');
        $product3->setCategory($category3);


        $product4 = new Product();
        $product4->setName('Емма');
        $product4->setPrice(475.50);
        $product4->setDescription('Гарна і проста лялька.Гарна і проста лялька.Гарна і проста лялька.Гарна і проста лялька.Гарна і проста лялька.');
        $product4->setCategory($category1);



        $product5 = new Product();
        $product5->setName('Дженні');
        $product5->setPrice(548.75);
        $product5->setDescription('Гарна і проста лялька.Гарна і проста лялька.Гарна і проста лялька.Гарна і проста лялька.Гарна і проста лялька.');
        $product5->setCategory($category1);


        $product6 = new Product();
        $product6->setName('Альпака');
        $product6->setPrice(55.50);
        $product6->setDescription("легка, м'яка, тонка тканина, виготовлена полотняним або саржевим переплетенням з вовни однойменної свійської тварини, якого розводять у Перу й Болівії.");
        $product6->setCategory($category2);

        $manager->persist($category1);
        $manager->persist($product1);
        $manager->persist($category2);
        $manager->persist($product2);
        $manager->persist($category3);
        $manager->persist($product3);
        $manager->persist($product4);
        $manager->persist($product5);
        $manager->persist($product6);

        $manager->flush();
    }
}