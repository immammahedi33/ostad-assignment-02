<?php
class Book {
    // Private properties for title and available copies
    private $title;
    private $availableCopies;

    // Constructor to initialize properties
    public function __construct($title, $availableCopies) {
        $this->title = $title;
        $this->availableCopies = $availableCopies;
    }

    // Method to get the title of the book
    public function getTitle() {
        return $this->title;
    }

    // Method to get the number of available copies
    public function getAvailableCopies() {
        return $this->availableCopies;
    }

    // Method to borrow a book (decrease available copies)
    public function borrowBook() {
        if ($this->availableCopies > 0) {
            $this->availableCopies--;
            return true;
        } else {
            return false;
        }
    }

    // Method to return a book (increase available copies)
    public function returnBook() {
        $this->availableCopies++;
    }
}

class Member {
    // Private property for member's name
    private $name;

    // Constructor to initialize member's name
    public function __construct($name) {
        $this->name = $name;
    }

    // Method to get the name of the member
    public function getName() {
        return $this->name;
    }

    // Method for a member to borrow a book
    public function borrowBook($book) {
        if ($book->borrowBook()) {
            echo $this->name . " borrowed " . $book->getTitle() . "\n";
        } else {
            echo $this->name . " could not borrow " . $book->getTitle() . " (no available copies)\n";
        }
    }

    // Method for a member to return a book
    public function returnBook($book) {
        $book->returnBook();
        echo $this->name . " returned " . $book->getTitle() . "\n";
    }
}

// Usage

// Create 2 books with the following properties
$book1 = new Book("The Great Gatsby", 5);
$book2 = new Book("To Kill a Mockingbird", 3);

// Create 2 members with the following properties
$member1 = new Member("John Doe");
$member2 = new Member("Jane Smith");

// Apply Borrow book method to each member
$member1->borrowBook($book1); // John Doe borrows The Great Gatsby
$member2->borrowBook($book2); // Jane Smith borrows To Kill a Mockingbird

// Print Available Copies with their names:
echo "Available Copies of '" . $book1->getTitle() . "': " . $book1->getAvailableCopies() . "\n";
echo "Available Copies of '" . $book2->getTitle() . "': " . $book2->getAvailableCopies() . "\n";

// Demonstrate returning books
$member1->returnBook($book1); // John Doe returns The Great Gatsby
$member2->returnBook($book2); // Jane Smith returns To Kill a Mockingbird

// Print Available Copies with their names again
echo "Available Copies of '" . $book1->getTitle() . "': " . $book1->getAvailableCopies() . "\n";
echo "Available Copies of '" . $book2->getTitle() . "': " . $book2->getAvailableCopies() . "\n";
?>