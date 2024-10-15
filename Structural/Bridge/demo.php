<?php

// Abstraction
abstract class Document {
    protected $displayMethod;

    public function __construct(DisplayMethod $displayMethod) {
        $this->displayMethod = $displayMethod;
    }

    abstract public function display();
}

// Refined Abstraction
class PDF extends Document {
    public function display() {
        echo "Displaying PDF...";
        $this->displayMethod->display();
    }
}

class Word extends Document {
    public function display() {
        echo "Displaying Word document...";
        $this->displayMethod->display();
    }
}

class PowerPoint extends Document {
    public function display() {
        echo "Displaying PowerPoint document...";
        $this->displayMethod->display();
    }
}

class Excel extends Document {
    public function display() {
        echo "Displaying Excel document...";
        $this->displayMethod->display();
    }
}

// Implementor
interface DisplayMethod {
    public function display();
}

// Concrete Implementor
class DisplayOnScreen implements DisplayMethod {
    public function display() {
        echo "on screen.<hr>";
    }
}

// Concrete Implementor
class PrintOnPaper implements DisplayMethod {
    public function display() {
        echo "on paper.<hr>";
    }
}

// Concrete Implementor
class PrintOnMobile implements DisplayMethod {
    public function display() {
        echo "on mobile.<hr>";
    }
}

// Client code
$screenDisplay = new DisplayOnScreen();
$pdfDocument = new PDF($screenDisplay);
$pdfDocument->display();

$paperPrint = new PrintOnPaper();
$wordDocument = new Word($paperPrint);
$wordDocument->display();

$paperPrint = new PrintOnMobile();
$wordDocument = new Excel($paperPrint);
$wordDocument->display();