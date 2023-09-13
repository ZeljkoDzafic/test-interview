<?php

require_once "Birds.php";
class BirdController {
    private $bird;

    public function __construct(Bird $bird) {
        $this->bird = $bird;
    }

    public function feed() {
        $this->bird->eat();
    }

    public function releaseFromCliff() {
        if ($this->bird instanceof Eagle) {
            $this->bird->fly();
        } else {
            echo "Only eagles can be released from cliffs.\n";
        }
    }

    public function runFrom() {
        if ($this->bird instanceof Ostrich) {
            $this->bird->run();
        } else {
            echo "Only ostriches can run.\n";
        }
    }

    public function walk() {
        $this->bird->walk();
    }
}
