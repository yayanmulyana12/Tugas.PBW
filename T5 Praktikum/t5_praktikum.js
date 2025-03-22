// Program untuk mencetak deret Fibonacci dengan opsi menampilkan sebagai string atau array
function fibonacci(n, asString = false) {
  let fib = [0, 1];
  for (let i = 2; i < n; i++) {
    fib[i] = fib[i - 1] + fib[i - 2];
  }
  return asString ? fib.join(", ") : fib;
}

console.log(fibonacci(10)); // Cetak 10 angka pertama dari Fibonacci dalam bentuk array
console.log(fibonacci(10, true)); // Cetak dalam bentuk string

// Kalkulator menggunakan arrow function dan spread operator dengan validasi input
const calculator = (operator, ...numbers) => {
  if (numbers.length === 0) return "Masukkan angka untuk dihitung";
  if (!["+", "-", "*", "/", "%"].includes(operator))
    return "Operator tidak valid";

  return numbers.reduce((acc, num) => {
    if (typeof num !== "number" || isNaN(num))
      return "Semua input harus berupa angka";
    switch (operator) {
      case "+":
        return acc + num;
      case "-":
        return acc - num;
      case "*":
        return acc * num;
      case "/":
        return num === 0 ? "Tidak dapat membagi dengan nol" : acc / num;
      case "%":
        return num === 0
          ? "Tidak dapat menggunakan modulus dengan nol"
          : acc % num;
      default:
        return "Operator tidak valid";
    }
  });
};

console.log(calculator("+", 10, 5, 2)); // Penjumlahan
console.log(calculator("-", 10, 5)); // Pengurangan
console.log(calculator("*", 10, 5)); // Perkalian
console.log(calculator("/", 10, 5)); // Pembagian
console.log(calculator("%", 10, 3)); // Modulus
console.log(calculator("/", 10, 0)); // Pembagian dengan nol
console.log(calculator("^", 10, 2)); // Operator tidak valid
