# EASYBELL Coding challenge

## Description
The task involves implementing a checkout system for a retail store. The checkout system should be able to scan products and calculate the total price based on the pricing rules of the store.
You can find more details about the task [here](http://codekata.com/kata/kata09-back-to-the-checkout/).

#### The pricing rules for each product are defined as follow:
- Each product has a normal price.
- Some products have special pricing rules, where buying a certain quantity of a product results in a discounted price.

#### The task is to implement the `Checkout`class, which should have the following functionalities:
- `scan(item)`: Add an item to the list of scanned items.
- `total()`: Calculate the total price of all scanned items.

## Prerequisites

- php v8.3 or higher
- Check `composer.json`for the full list of the packages used

## Installation
- Clone the repository to your machine.
- Go to the application main root
- Run the following command `composer install`

## Usage

To use the checkout system:
1. Instantiate the `Checkout` class.
2. Scan each item using the `scan(item)` method.
3. Get the total price using the `total()` method.
4. Check the `PriceTest` class for some examples.

## Example:
```php
$co = new App\Checkout();
$co->scan('A');
$co->scan('B');
$co->scan('A');
$total = $co->total(); // Calculate the total price
echo "Total: $total";
```

## Testing
```shell
vendor/bin/phpunit
```

### Notes
- I have some concerns regarding the checkout class methods signature.
- I wanted to dockerize the app but I didn't due to the time limitation.