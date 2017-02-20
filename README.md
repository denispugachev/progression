# Simple test task for progression checking

This console script helps you to check if any numeric sequence is progression.

### Usage

Just run following command:

```bash
./command check-progression <NUMERIC SEQUENCE>
```

Where `<NUMERIC_SEQUENCE>` is comma separated sequence of numbers.

### Examples
```bash
./command check-progression 1,2,3,4,5,6,7,8
./command check-progression "1.25, 1.5, 1.75, 2, 2.25"
./command check-progression "2, 4, 8, 16, 32"
./command check-progression "10, 5, 2.5, 1.25"
```

### Running unit tests

Just run following command:

```bash
vendor/bin/codecept run
```

### Skills demonstrated

1. PHP, OOP, patterns, Yii2
2. git workflow
3. composer
4. testing
5. markdown
6. travis