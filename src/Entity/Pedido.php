<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PedidoRepository")
 */
class Pedido
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Mesa", inversedBy="pedidos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $mesa;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PedidoProduto", mappedBy="pedido", orphanRemoval=true)
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

    public function getMesa(): ?Mesa
    {
        return $this->mesa;
    }

    public function setMesa(?Mesa $mesa): self
    {
        $this->mesa = $mesa;

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
            $pedidoProduto->setPedido($this);
        }

        return $this;
    }

    public function removePedidoProduto(PedidoProduto $pedidoProduto): self
    {
        if ($this->pedidoProdutos->contains($pedidoProduto)) {
            $this->pedidoProdutos->removeElement($pedidoProduto);
            // set the owning side to null (unless already changed)
            if ($pedidoProduto->getPedido() === $this) {
                $pedidoProduto->setPedido(null);
            }
        }

        return $this;
    }
}
