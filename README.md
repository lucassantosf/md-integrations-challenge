# MD Integrations Challenges

## Description

This repository contains the implementation for three technical challenges.

### Challenge 1: RESTful API for Person Entity

The goal of this challenge is to design a basic database structure and implement a set of RESTful API endpoints that provide full CRUD (Create, Read, Update, Delete) functionality for a simple entity. This was built primarily using the **Laravel** framework.

This application implements the required RESTful API endpoints to easily manage the `Person` entity.

## Technologies Used

- **PHP 8.2**
- **Laravel** (Latest)
- **SQLite** (Database)
- **Docker & Docker Compose**

## Prerequisites

Before you start, ensure you have the following installed on your target machine:

- [Docker](https://www.docker.com/products/docker-desktop) and [Docker Compose](https://docs.docker.com/compose/install/)
- *(Optional)* [PHP 8.2+](https://www.php.net/downloads) and [Composer](https://getcomposer.org/) (if running manually without Docker)

## Installation & Setup

The easiest and recommended way to run this application is through Docker, which is already configured to automatically handle composer dependencies, environment configuration, and database migrations.

### Method 1: Using Docker (Recommended)

1. **Clone the repository** (if you haven't already):
   ```bash
   git clone <repository-url>
   cd md-integrations-challenge
   ```

2. **Start the application with Docker Compose**:
   ```bash
   docker-compose up -d --build
   ```
   *Note: This operation builds the image, installs PHP dependencies via Composer, prepares the SQLite database, runs the required Laravel migrations (`php artisan migrate --force`), and serves the application on port 8000.*

3. **Access the API**:
   The API will now be successfully running and accessible at `http://localhost:8000`.

### Method 2: Manual Installation (Local PHP Environment)

If you prefer to run the project without Docker, follow these steps:

1. **Install PHP dependencies**:
   ```bash
   composer install
   ```

2. **Configure the environment**:
   ```bash
   cp .env.example .env
   ```

3. **Generate the application key**:
   ```bash
   php artisan key:generate
   ```

4. **Prepare the database**:
   By default, the project is structured to use SQLite. Ensure the database file exists:
   ```bash
   mkdir -p database && touch database/database.sqlite
   ```

5. **Run database migrations**:
   ```bash
   php artisan migrate
   ```

6. **Start the local development server**:
   ```bash
   php artisan serve
   ```
   *The server will be available at `http://127.0.0.1:8000`.*

---

## API Testing

An Insomnia collection is included in the root directory to help you quickly test the endpoints:
- 📄 `Insomnia_2026-03-05_md_integrations.yaml`

You can import this file directly into [Insomnia REST Client](https://insomnia.rest/) to immediately interact with the `Person` CRUD operations.

---

## Challenge 2: Subscription Score Calculation

**File:** `challenge2.php`

### Description
You've received a list of user scores related to active subscriptions. The data is structured as a single-dimensional array where values are organized in pairs: the first value is the Subscription ID (a positive integer), and the second is the Score (an integer, which can be positive or negative).

The challenge is to calculate the final balanced score for each unique Subscription ID and then determine which Subscription ID has the highest total score.

### Input Data
```php
$transactions = [ 
    101, 50, // Subscription ID 101, Score +50 
    202, 10,
    101, -20,
    303, 100,
    202, 5,
    303, -10,
    101, 75
];
```

### Requirements
Write a PHP script that performs the following actions:
- **Processing**: Iterate over the `$transactions` array, accumulating the total score for each unique Subscription ID.
- **Result**: Determine the Subscription ID that holds the highest final balanced score.
- **Output**: Print both the array of final balances (`$balances`) and the winning ID.

### Expected Output
```text
Final Balances: 
Array (
    [101] => 105 
    [202] => 15 
    [303] => 90 
) 
Winning Subscription ID: 101 (with a score of 105)
```

To run Challenge 2:
```bash
php challenge2.php
```

---

## Challenge 3: Conditional Price Adjustment Routine

**File:** `challenge3.php`

### Description
Using closure, implement a conditional price adjustment routine where the calculation operation (addition or subtraction) is determined by an algorithmic rule applied to a specific rate defined in the main scope.

You must use the provided function:
```php
function applyTax(array $data, callable $callback) : array {
    // implementation
}
```
which applies the given callback to every element in the input array (similar to `array_map`).

### Business Rule
Create an algorithm to identify whether a number is prime.
- If the external variable `$adjustmentRate` is a prime number, the rate must be added to each array element.
- Otherwise (if it is not a prime number), the rate must be subtracted from each array element.

### Input Data
```php
$adjustmentRate = 13;
$baseNumbers = [100,200,300];
```

### Expected Output
- `-> for adjustment rate 13: [113, 213, 313] // prime number`
- `-> for adjustment rate 12: [88, 188, 288] // not a prime number`

To run Challenge 3:
```bash
php challenge3.php
```
