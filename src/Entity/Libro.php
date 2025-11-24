<?php

namespace App\Entity;

use App\Repository\LibroRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Autor;
use App\Entity\Categoria;

#[ORM\Entity(repositoryClass: LibroRepository::class)]
#[ORM\Table(name: "libros")]
class Libro
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id_libro")]
    private ?int $id = null;

    #[ORM\Column(name: "titulo", length: 255)]
    private string $titulo;

    #[ORM\ManyToOne(targetEntity: Autor::class)]
    #[ORM\JoinColumn(name: "id_autor", referencedColumnName: "id_autor", nullable: false)]
    private ?Autor $autor = null;

    #[ORM\Column(name: "isbn", length: 20, nullable: true, unique: true)]
    private ?string $isbn = null;

    #[ORM\Column(name: "editorial", length: 150, nullable: true)]
    private ?string $editorial = null;

    #[ORM\Column(name: "anio_publicacion", type: "integer", nullable: true)]
    private ?int $anioPublicacion = null;

    #[ORM\ManyToOne(targetEntity: Categoria::class)]
    #[ORM\JoinColumn(name: "id_categoria", referencedColumnName: "id_categoria", nullable: true)]
    private ?Categoria $categoria = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): static
    {
        $this->titulo = $titulo;
        return $this;
    }

    public function getAutor(): ?Autor
    {
        return $this->autor;
    }

    public function setAutor(?Autor $autor): static
    {
        $this->autor = $autor;
        return $this;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(?string $isbn): static
    {
        $this->isbn = $isbn;
        return $this;
    }

    public function getEditorial(): ?string
    {
        return $this->editorial;
    }

    public function setEditorial(?string $editorial): static
    {
        $this->editorial = $editorial;
        return $this;
    }

    public function getAnioPublicacion(): ?int
    {
        return $this->anioPublicacion;
    }

    public function setAnioPublicacion(?int $anioPublicacion): static
    {
        $this->anioPublicacion = $anioPublicacion;
        return $this;
    }

    public function getCategoria(): ?Categoria
    {
        return $this->categoria;
    }

    public function setCategoria(?Categoria $categoria): static
    {
        $this->categoria = $categoria;
        return $this;
    }
}