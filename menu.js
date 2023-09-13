class MenuElement {
    constructor(id, name, parentId, order) {
        this.id = id;
        this.name = name;
        this.parentId = parentId;
        this.order = order;
    }
}

class Menu {
    constructor() {
        this.MenuElements = [];
    }

    // Create a new menu item
    createMenuElement(name, parentId, order) {
        const id = this.MenuElements.length + 1;
        const MenuElement = new MenuElement(id, name, parentId, order);
        this.MenuElements.push(MenuElement);
        return MenuElement;
    }

    // Read menu items based on criteria (e.g., parent ID)
    getMenuElements(criteria) {
        return this.MenuElements.filter((MenuElement) => {
            return Object.keys(criteria).every((key) => {
                return MenuElement[key] === criteria[key];
            });
        });
    }

    // Update a menu item
    updateMenuElement(id, newName, newParentId, newOrder) {
        const MenuElementIndex = this.MenuElements.findIndex((MenuElement) => MenuElement.id === id);
        if (MenuElementIndex !== -1) {
            const updatedMenuElement = this.MenuElements[MenuElementIndex];
            updatedMenuElement.name = newName;
            updatedMenuElement.parentId = newParentId;
            updatedMenuElement.order = newOrder;
            return updatedMenuElement;
        }
        return null;
    }

    // Delete a menu item
    deleteMenuElement(id) {
        const MenuElementIndex = this.MenuElements.findIndex((MenuElement) => MenuElement.id === id);
        if (MenuElementIndex !== -1) {
            this.MenuElements.splice(MenuElementIndex, 1);
            return true;
        }
        return false;
    }
}

// Example usage:
const menu = new Menu();

menu.createMenuElement('home', null, 1);
menu.createMenuElement('products', null, 2);
menu.createMenuElement('home appliances', 2, 1);
menu.createMenuElement('TV', 3, 1);
menu.createMenuElement('Washing machine', 3, 2);
menu.createMenuElement('Refrigerator', 3, 3);
menu.createMenuElement('electronics', 2, 3);
menu.createMenuElement('mobiles', 6, 1);
menu.createMenuElement('tablet', 6, 2);
menu.createMenuElement('PC', 6, 3);
menu.createMenuElement('laptop', 6, 4);
menu.createMenuElement('departments', null, 3);
menu.createMenuElement('sales', 10, 1);
menu.createMenuElement('servicing', 10, 2);
menu.createMenuElement('management', 10, 3);
menu.createMenuElement('contact', null, 4);

console.log(menu.getMenuElements({ parentId: null })); // Read top-level menu items
console.log(menu.getMenuElements({ parentId: 2 })); // Read sub-menu items under 'products'

menu.updateMenuElement(2, 'Products', null, 2); // Update 'products' menu item
console.log(menu.getMenuElements({ parentId: null }));

menu.deleteMenuElement(4); // Delete 'electronics' menu item
console.log(menu.getMenuElements({ parentId: 2 }));
