<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Funcionario;

class FuncionarioFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $funcionario = new Funcionario();
        
        $funcionario
        ->setNome("Alex");
        $manager->persist($funcionario);

        $funcionario
        ->setNome("Gilmar");
        $manager->persist($funcionario);

        $funcionario
        ->setNome("Leo");
        $manager->persist($funcionario);

        $manager->flush();
    }
}
