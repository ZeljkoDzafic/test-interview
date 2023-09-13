<?php

/**
 * @Entity
 * @Table(name="MenuElements")
 */
class MenuElement {
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

    /**
     * @ManyToOne(targetEntity="Menu")
     * @JoinColumn(name="menu_id", referencedColumnName="id")
     */
    private $menu;

    /**
     * @ManyToOne(targetEntity="MenuElement", inversedBy="children")
     * @JoinColumn(name="parent_id", referencedColumnName="id")
     */
    private $parent;

    /**
     * @OneToMany(targetEntity="MenuElement", mappedBy="parent")
     */
    private $children;

    /**
     * @Column(type="integer", nullable=true)
     */
    private $order;

    // Getters and setters...

    // Constructor...
}
