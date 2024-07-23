<!-- -->


<?php
/* 
    singleton pattern  
    Key Features of Singleton Pattern:
    Single Instance: Ensures a class has only one instance.
    Global Access: Provides a global point of access to the instance.
    Lazy Initialization: The instance is created only when it is first needed.

*/
    
    class Singleton {
    private static $instance = null;

    private function __construct() {
        // Private constructor to prevent multiple instances
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }
}

// Usage
$instance = Singleton::getInstance();
print "<pre>";
var_dump($instance);
echo "<br><br>";
// ----------------------------------------------------//
/*
    Factory Pattern
    Key Features of Factory Pattern:
    Encapsulation of Object Creation: The creation logic is encapsulated in a separate class.
    Flexibility: Allows for the creation of different types of objects using a common interface.
    Decoupling: Reduces the dependency of the main code on specific classes.
*/

// Define an interface for the product
interface Product {
    public function getType();
}
// Concrete product classes
class ProductA implements Product {
    public function getType() {
        return "ProductA";
    }
}
class ProductB implements Product {
    public function getType() {
        return "ProductB";
    }
}
// Factory class
class ProductFactory {
    public static function createProduct(Product $type) {
        if ($type->getType() == 'ProductA') {
            return new ProductA;
        } elseif ($type->getType() == 'ProductB') {
            return new ProductB;
        } else {
            throw new Exception("Invalid product type");
        }
    }
}
// Usage
$productA = ProductFactory::createProduct(new ProductA);
echo $productA->getType(); // Outputs: ProductA
echo "<br>";
var_dump($productA);

$productB = ProductFactory::createProduct(new ProductB);
echo $productB->getType(); // Outputs: ProductB



