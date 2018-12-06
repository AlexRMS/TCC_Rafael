<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Funcionario;

class FuncionarioController extends AbstractController
{
    /**
     * @Route("/funcionario", name="funcionario")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Funcionario::class);

        $funcionarios = $repository
        ->findAll();

        return $this
        ->json($funcionarios);
    }

    /**
     * @Route("/funcionario/{id}", name="funcionario_show")
     */
    public function show(Funcionario $funcionario)
    {
        
    }
}
