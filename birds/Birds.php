<?php
interface Bird {
    public function setGender($gender);
    public function eat();
}


// I have used this to show abstraction
// But in general I would go for classic base class
// and impelment eat funcionalty on Base Level and overide it if needed in child classes

abstract class BirdBase implements Bird {
    protected $gender;

    public function setGender($gender) {
        $this->gender = $gender;
    }

    abstract public function eat();
}

class Ostrich extends BirdBase {
    public function walk() {
        // Ostrich walking behavior
        echo "Ostrich is walking.\n";
    }

    public function run() {
        // Ostrich running behavior
        echo "Ostrich is running.\n";
    }

    public function eat() {
        echo get_class($this) . " is eating.\n";
    }


}

class Eagle extends BirdBase {
    public function walk() {
        // Eagle walking behavior
          echo "Eagle is walking.\n";
    }

    public function fly() {
        // Eagle flying behavior
        echo "Eagle is flying.\n";
    }

    public function eat() {
        echo get_class($this) . " is eating.\n";
    }


}
