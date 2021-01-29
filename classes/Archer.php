<?php

class Archer extends Character
{
    private $boost = false;
    public $damage = 10;
    public $arrows = 10;

    public function turn($target) {
        $rand = rand(1, 10);
        if ($this->arrows ==0){
            $status = $this->dagger($target);
        }else if ($rand <= 3 && !$this->boost) {
            $status = $this->weakness();
        } else {
            $status = $this->attack($target);
        }
        return $status;
    }

    public function attack($target){
        if ($this->boost){
            $this->arrows --;
            $rand = rand(15, 30)/10;
            $weaknessDamage = $this->damage * $rand;
            $target->setHealthPoints($weaknessDamage);
            $status = "$this->name tire une flèche dans le téton de $target->name ! Il reste $target->healthPoints points de vie à $target->name!";
            $this->rage = false;
        }else {
            $this->arrows --;
            $target->setHealthPoints($this->damage);
            $status = "$this->name tire une flèche sur $target->name ! Il reste $target->healthPoints points de vie à $target->name !";
        }
        return $status;
    }

    public function weakness(){
        $this->boost = true;
        $status = "$this->name vise le point faible de son ennemi, ça va piquer !";
        return $status;
    }

    public function dagger($target){
        $target->setHealthPoints($this->damage/2);
        $status = "$this->name écorche $target->name avec sa petite dague ridicule ! Il reste $target->healthPoints à $target->name !";
        return $status;
    }

}
