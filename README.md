# Learning SOLID With PHP

## Whats is this project?
This is a very simple project created during a course at Alura Platform to study SOLID principles with PHP. The objective is to refactor an existing project using these principles.

## What are SOLID principles?
SOLID is a mnemonic acronym for five design principles intended to make object-oriented designs more understandable, flexible, and maintainable. They are:
 
1. Single Responsibility Principle
2. Open / Closed Principle
3. Liskov Substitution Principle
4. Interface Segregation Principle
5. Dependency Inversion Principle

### 1. Single Responsibility Principle
Every class/method <b>SHOULD</b> have <b>only</b> one reason to change. 

### 2. Open / Closed Principle
Software entities (classes, modules, functions, etc.) <b>SHOULD</b> be <b>open</b> for extension, but <b>closed</b> for modification.

### 3. Liskov Segregation Principle
Subclasses should be substitutable for their base classes. Child classes must never violate the type definitions of the parent class.

### 4. Dependency Inversion Principle
High-level modules should not depend on low-level modules; both should depend on abstractions.

### 5. Interface Segregation Principle
Clients should not be forced to depend upon interfaces that they do not use.

## Project initialization
This project requires Composer to install its dependencies. If you don't have it installed, go to [Composer](https://getcomposer.org/) for more information.

After installing Composer, you can use the command to install dependencies:

```
composer install
```

## Getting a report on relation between instability x abstraction

### [Pdepend](https://github.com/pdepend/pdepend) 

Pdepend is a package used to generate reports on dependencies in PHP.

#### Installation
If you already have use the command `composer install` to this project, you can skip this step.

To install pdepend
```
composer require "pdepend/pdepend:2.10.3"
```

#### List all commands
```
vendor\bin\pdepend.bat
```

#### Generate chart
```
vendor\bin\pdepend.bat --jdepend-chart=C:\wamp64\www\learning-solid-with-php\grafico2 C:\wamp64\www\learning-solid-with-php\src
```

#### Conclusion

The first image was generated in the begging of the project and shows that the project is far from ideal.  

![Chart 1](https://github.com/DaniPoletto/learning-solid-with-php/blob/main/grafico1.svg)

The second image shows that the work in progress is coming up with a good result.

![Chart 2](https://github.com/DaniPoletto/learning-solid-with-php/blob/main/grafico2.svg)

And finally, this project reaches a more ideal state when concrete class depends more on abstract classes than the opposite. 

![Chart 3](https://github.com/DaniPoletto/learning-solid-with-php/blob/main/grafico3.svg)
