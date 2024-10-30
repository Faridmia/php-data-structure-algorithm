<?php
// Write a PHP a class hierarchy for a  library system, including classes like 'LibraryItem', 'Book', 'DVD', etc. Implement appropriate properties and methods for each class.

class LibraryItem {

    protected $title;
    protected $author;
    protected $year;

    public function __construct( $title, $author, $year ) {
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getYear() {
        return $this->year;
    }

}

class Book extends LibraryItem {

    protected $genre;

    public function __construct( $title, $author, $year, $genre ) {
        parent::__construct( $title, $author, $year );

        $this->genre = $genre;
    }

    public function getGenre() {
        return $this->genre;
    }

    public function displayDetails() {
        echo "Title: " . $this->title . "\n";
        echo "author: " . $this->author . "\n";
        echo "year: " . $this->year . "\n";
        echo "genre: " . $this->genre . "\n";
    }

}


class DVD extends LibraryItem {

    protected $duration;

    public function __construct( $title, $author, $year, $duration ) {
        parent::__construct( $title, $author, $year );

        $this->duration = $duration;
    }

    public function getDuration() {
        return $this->duration;
    }

    public function displayDetails() {
        echo "Title: " . $this->title . "\n";
        echo "author: " . $this->author . "\n";
        echo "year: " . $this->year . "\n";
        echo "duration: " . $this->duration . "\n";
    }

}


$book = new Book("Don Quixote", "Miguel de Cervantes", 1605, "Epic novel");
$book->displayDetails();

$dvd = new DVD("The Land Before Time", "Charles Grosvenor", 2010, 150);
$dvd->displayDetails();