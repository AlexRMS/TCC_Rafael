<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProdutoRepository")
 */
class Produto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nome;

    /**
     * @ORM\Column(type="float")
     */
    private $valor;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PedidoProduto", mappedBy="produto", orphanRemoval=true)
     */
    private $pedidoProdutos;

    public function __construct()
    {
        $this->pedidoProdutos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getValor(): ?float
    {
        return $this->valor;
    }

    public function setValor(float $valor): self
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * @return Collection|PedidoProduto[]
     */
    public function getPedidoProdutos(): Collection
    {
        return $this->pedidoProdutos;
    }

    public function addPedidoProduto(PedidoProduto $pedidoProduto): self
    {
        if (!$this->pedidoProdutos->contains($pedidoProduto)) {
            $this->pedidoProdutos[] = $pedidoProduto;
            $pedidoProduto->setProduto($this);
        }

        return $this;
    }

    public function removePedidoProduto(PedidoProduto $pedidoProduto): self
    {
        if ($this->pedidoProdutos->contains($pedidoProduto)) {
            $this->pedidoProdutos->removeElement($pedidoProduto);
            // set the owning side to null (unless already changed)
            if ($pedidoProduto->getProduto() === $this) {
                $pedidoProduto->setProduto(null);
            }
        }

        return $this;
    }
}
