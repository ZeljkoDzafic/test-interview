<?php


/**
 * @Entity
 * @Table(name="Menu")
 */
class Menu {
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;

    /**
     * @Column(type="string", length=255, nullable=false)
     */
    private $name;

    // Getters and setters...
}
