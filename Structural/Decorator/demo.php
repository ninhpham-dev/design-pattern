<?php

/**
 * Tạo interface để định nghĩa (thiết kế) cho  đồ uống
 * Component
*/
interface Drink
{
    public function cost(): float;
    public function description(): string;
}

// Lớp cơ bản Coffee
// Concrete Component
class Coffee implements Drink
{
    public function cost(): float
    {
        return 2.0; // Giá coffee cơ bản
    }

    public function description(): string
    {
        return "Basic Coffee";
    }
}

// Lớp cơ bản Coffee
// Concrete Component
class MilkTea implements Drink
{
    public function cost(): float
    {
        return 3.0; // Giá tra sua cơ bản
    }

    public function description(): string
    {
        return "Basic Milk Tea";
    }
}

// Abstract Decorator
// Decorator
abstract class DrinkDecorator implements Drink
{
    protected $drink;

    public function __construct(Drink $drink)
    {
        $this->drink = $drink;
    }

    // Lớp này chỉ chuyển tiếp các phương thức đến đối tượng được trang trí
    public function cost(): float
    {
        return $this->drink->cost();
    }

    public function description(): string
    {
        return $this->drink->description();
    }
}

// Decorator thêm đường (Sugar)
// Concrete Decorators
class SugarDecorator extends drinkDecorator
{
    public function cost(): float
    {
        return $this->drink->cost() + 0.5; // Giá thêm đường
    }

    public function description(): string
    {
        return $this->drink->description() . ", with Sugar";
    }
}

// Decorator thêm sữa (Milk)
// Concrete Decorators
class MilkDecorator extends drinkDecorator
{
    public function cost(): float
    {
        return $this->drink->cost() + 1.0; // Giá thêm sữa
    }

    public function description(): string
    {
        return $this->drink->description() . ", with Milk";
    }
}

// Decorator thêm Chocolate
// Concrete Decorators
class ChocolateDecorator extends drinkDecorator
{
    public function cost(): float
    {
        return $this->drink->cost() + 1.5; // Giá thêm chocolate
    }

    public function description(): string
    {
        return $this->drink->description() . ", with Chocolate";
    }
}

// Sử dụng
$coffee = new Coffee();
echo $coffee->description() . " costs $" . $coffee->cost() . "<br>";

// Thêm đường
$coffeeWithSugar = new SugarDecorator($coffee);
echo $coffeeWithSugar->description() . " costs $" . $coffeeWithSugar->cost() . "<br>";

// Thêm đường và sữa
$coffeeWithSugarAndMilk = new MilkDecorator($coffeeWithSugar);
echo $coffeeWithSugarAndMilk->description() . " costs $" . $coffeeWithSugarAndMilk->cost() . "<br>";

// Thêm đường, sữa và chocolate
$coffeeFullyDecorated = new ChocolateDecorator($coffeeWithSugarAndMilk);
echo $coffeeFullyDecorated->description() . " costs $" . $coffeeFullyDecorated->cost() . "<br>";

?>
