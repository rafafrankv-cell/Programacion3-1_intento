<?php

namespace App\Entity;

use App\Repository\AutorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AutorRepository::class)]
#[ORM\Table(name: "autores")]
class Autor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id_autor")]
    private ?int $id = null;

    #[ORM\Column(name: "nombre", length: 150, nullable: false)]
    private ?string $nombre = null;

    #[ORM\Column(name: "nacionalidad", length: 150, nullable: false)]
    private ?string $nacionalidad = null;

    // YEAR en MySQL -> lo manejamos como entero (ej: 1980, 2003, etc.)
    #[ORM\Column(name: "anio_nacimiento", type: "integer", nullable: true)]
    private ?int $anio_nacimiento = null;

    // Getters / Setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): static
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getNacionalidad(): ?string
    {
        return $this->nacionalidad;
    }

    public function setNacionalidad(?string $nacionalidad): static
    {
        $this->nacionalidad = $nacionalidad;
        return $this;
    }

    public function getAnioNacimiento(): ?int
    {
        return $this->anio_nacimiento;
    }

    public function setAnioNacimiento(?int $anio_nacimiento): static
    {
        $this->anio_nacimiento = $anio_nacimiento;
        return $this;
    }
}
