<?php
class MenuElement {
    public $id;
    public $name;
    public $parentId;
    public $order;

    public function __construct($id, $name, $parentId, $order) {
        $this->id = $id;
        $this->name = $name;
        $this->parentId = $parentId;
        $this->order = $order;
    }
}

class Menu {
    private $menuElements;

    public function __construct() {
        $this->menuElements = [];
    }

    // Create a new menu item
    public function createMenuElement($name, $parentId, $order) {
        $id = count($this->menuElements) + 1;
        $menuElement = new MenuElement($id, $name, $parentId, $order);
        $this->menuElements[] = $menuElement;
        return $menuElement;
    }

    // Read menu items based on criteria (e.g., parent ID)
    public function getMenuElements($criteria) {
        return array_filter($this->menuElements, function($menuElement) use ($criteria) {
            foreach ($criteria as $key => $value) {
                if ($menuElement->$key !== $value) {
                    return false;
                }
            }
            return true;
        });
    }

    // Update a menu item
    public function updateMenuElement($id, $newName, $newParentId, $newOrder) {
        $menuElementIndex = -1;
        foreach ($this->menuElements as $index => $menuElement) {
            if ($menuElement->id === $id) {
                $menuElementIndex = $index;
                break;
            }
        }

        if ($menuElementIndex !== -1) {
            $updatedMenuElement = $this->menuElements[$menuElementIndex];
            $updatedMenuElement->name = $newName;
            $updatedMenuElement->parentId = $newParentId;
            $updatedMenuElement->order = $newOrder;
            return $updatedMenuElement;
        }

        return null;
    }

// Get the whole menu and organize it into nested arrays
    public function getWholeMenu() {
           $menuTree = [];

           // Create a dictionary to quickly look up elements by ID
           $menuElementDict = [];
           foreach ($this->menuElements as $menuElement) {
               $menuElementDict[$menuElement->id] = $menuElement;
           }

           foreach ($this->menuElements as $menuElement) {
               if ($menuElement->parentId === null) {
                   // Top-level menu element
                   $menuTree[] = $menuElement;
               } else {
                   // Submenu element, add it to its parent's children
                   $parent = $menuElementDict[$menuElement->parentId];
                   if (!isset($parent->children)) {
                       $parent->children = [];
                   }
                   $parent->children[] = $menuElement;
               }
           }

           return $menuTree;
       }

    // Delete a menu item
    public function deleteMenuElement($id) {
        $menuElementIndex = -1;
        foreach ($this->menuElements as $index => $menuElement) {
            if ($menuElement->id === $id) {
                $menuElementIndex = $index;
                break;
            }
        }

        if ($menuElementIndex !== -1) {
            array_splice($this->menuElements, $menuElementIndex, 1);
            return true;
        }

        return false;
    }
}
