console.log("Interfaces are available in TypeScript");

class Bird {
    constructor() {
        this.gender = '';
    }

    setGender(gender) {
        this.gender = gender;
    }

    eat() {
        console.log(`${this.constructor.name} is eating.`);
    }
}

class Ostrich extends Bird {
    walk() {
        console.log('Ostrich is walking.');
    }

    run() {
        console.log('Ostrich is running.');
    }
}

class Eagle extends Bird {
    walk() {
        console.log('Eagle is walking.');
    }

    fly() {
        console.log('Eagle is flying.');
    }
}

// Example usage:
const ostrich = new Ostrich();
ostrich.setGender('Male');
ostrich.eat();
ostrich.walk();
ostrich.run();

const eagle = new Eagle();
eagle.setGender('Female');
eagle.eat();
eagle.walk();
eagle.fly();
