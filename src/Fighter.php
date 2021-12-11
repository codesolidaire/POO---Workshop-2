<?php

class Fighter
{
    public const MAX_LIFE = 100;

    private string $name;

    private int $strength;
    private int $dexterity;
    private string $image;
    private ?Weapon $weapon = null;
    private ?Shield $shield = null;

    private int $life = self::MAX_LIFE;
    
    public function __construct(
        string $name,
        int $strength = 10,
        int $dexterity = 5,
        string $image = 'fighter.svg'
    ) {
        $this->name = $name;
        $this->strength = $strength;
        $this->dexterity = $dexterity;
        $this->image = $image;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getImage(): string
    {
        return 'assets/images/' . $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }



    public function fight(Fighter $adversary): void
    {
        $damage = rand(1, $this->getDamage()) - $adversary->getDexterity();
        if ($damage < 0) {
            $damage = 0;
        }
        $adversary->setLife($adversary->getLife() - $damage);
    }

    public function getDamage(): int
    {
        if ($this->getWeapon()) {
            return $this->getStrength() + $this->weapon->getDamage(); // $this->getWeapon()->getDamage();
        }

        return $this->getStrength();
    }


    public function getWeapon(): ?Weapon
    {
        return $this->weapon;
    }

    public function setWeapon(?Weapon $weapon): void
    {
        $this->weapon = $weapon;
    }

    public function getDefense(): int
    {
        if ($this->getShield()) {
            return $this->getDexterity() + $this->shield->getProtection();
        }

        return $this->getDexterity();
    }

    public function getShield(): ?Shield
    {
        return $this->shield;
    }

    public function setShield(?Shield $shield): void
    {
        $this->shield = $shield;
    }

    public function getLife(): int
    {
        return $this->life;
    }

    public function setLife($life): void
    {
        if($life < 0) {
            $life = 0;
        }
        $this->life = $life;

    }

    public function isAlive(): bool
    {
        return $this->getLife() > 0;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function setStrength($strength): void
    {
        $this->strength = $strength;
    }

    public function getDexterity(): int
    {
        return $this->dexterity;
    }

    public function setDexterity($dexterity): void
    {
        $this->dexterity = $dexterity;
    }


}