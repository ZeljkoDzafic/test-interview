function addNumbers(...numbers) {
    return numbers.reduce((sum, number) => sum + number, 0);
}


console.log("addNumbers(3, 5, 6):", addNumbers(3, 5, 6));
console.log("addNumbers(4, 9):", addNumbers(4, 9));
console.log("addNumbers(29, 1, 4, 56, 79):", addNumbers(29, 1, 4, 56, 79));
