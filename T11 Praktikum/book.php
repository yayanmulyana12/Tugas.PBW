<?php

// Mendefinisikan class Book
class Book {
    // Properti dideklarasikan sebagai private (enkapsulasi)
    private $code_book;
    private $name;
    private $qty;

    // Constructor yang akan dijalankan saat object dibuat
    public function __construct($code_book, $name, $qty) {
        // Memanggil setter private untuk validasi dan set nilai
        $this->setCodeBook($code_book);
        $this->setName($name);
        $this->setQty($qty);
    }

    // Getter untuk mendapatkan nilai code_book
    public function getCodeBook() {
        return $this->code_book;
    }

    // Getter untuk mendapatkan nilai qty
    public function getQty() {
        return $this->qty;
    }

    // Getter untuk mendapatkan nilai name
    public function getName() {
        return $this->name;
    }

    // Setter private untuk memvalidasi dan menyetel code_book
    private function setCodeBook($code_book) {
        // Validasi menggunakan regular expression: 2 huruf kapital + 2 angka
        if (preg_match('/^[A-Z]{2}[0-9]{2}$/', $code_book)) {
            $this->code_book = $code_book; // Jika valid, set ke properti
        } else {
            // Jika tidak valid, lempar exception dengan pesan kesalahan
            throw new Exception("Format code_book salah! Gunakan 2 huruf kapital diikuti 2 angka (misal: AB12).");
        }
    }

    // Setter private untuk menyetel nama buku
    private function setName($name) {
        // Validasi agar nama tidak kosong (setelah di-trim)
        if (!empty(trim($name))) {
            $this->name = $name;
        } else {
            // Jika kosong, lempar exception
            throw new Exception("Nama buku tidak boleh kosong.");
        }
    }

    // Setter private untuk menyetel jumlah buku
    private function setQty($qty) {
        // Validasi agar qty adalah bilangan bulat positif
        if (is_int($qty) && $qty > 0) {
            $this->qty = $qty;
        } else {
            // Jika tidak valid, lempar exception
            throw new Exception("Qty harus berupa bilangan bulat positif.");
        }
    }
}

// Blok try-catch untuk menangani error saat membuat object
try {
    // Membuat objek Book dengan data yang valid
    $book1 = new Book("CD34", "Belajar PHP OOP", 10);

    // Menampilkan hasil jika tidak ada error
    echo "Code Book: " . $book1->getCodeBook() . "<br>";
    echo "Nama Buku: " . $book1->getName() . "<br>";
    echo "Qty: " . $book1->getQty() . "<br>";

} catch (Exception $e) {
    // Menangkap dan menampilkan pesan error jika validasi gagal
    echo "Terjadi kesalahan: " . $e->getMessage();
}

?>
