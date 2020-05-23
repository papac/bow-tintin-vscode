# Bow Tintin

## Introduction

Tintin is a PHP template that wants to be very simple and extensible. It can be used in any PHP project.

### Data display

You can display the contents of the name variable as follows:

```c
Hello, {{ $name }}.
```

Of course, you are not limited to displaying the content of the variables passed to the view. You can also echo the results of any PHP function. In fact, you can insert any PHP code into an Tintin echo statement:

```html
Hello, {{ strtoupper($name) }}.
```

> Tintin instructions `{{ }}` are automatically sent via the PHP function `htmlspecialchars` to prevent XSS attacks.

#### Affichage des données non échappées

Par défaut, les instructions Tintin `{{}}` sont automatiquement envoyées via la fonction PHP `htmlspecialchars` pour empêcher les attaques XSS. Si vous ne souhaitez pas que vos données soient protégées, vous pouvez utiliser la syntaxe suivante:

```html
Hello, {{{ $name }}}.
```

### Add a comment

This `{# comments #}` clause adds a comment to your `tintin` code.

### #if / #elseif or #elif / #else

Ce sont les clauses qui permettent d'établir des branchements conditionnels comme dans la plupart des langages de programmation.

```c
#if ($name == 'tintin')
  {{ $name }}
#elseif ($name == 'template')
  {{ $name }}
#else
  {{ $name }}
#endif
```

> You can use `#elif` instead of `#elseif`.

### #unless

Small specificity, the `#unless` meanwhile, it allows to make a reverse condition of `#if`.
To put it simply, here is an example:

```c
#unless ($name == 'tintin') => #if (!($name == 'tintin'))
```

### #loop / #for / #while

Often you may have to make lists or repetitions on items. For example, view all users of your platform.

#### Using #loop

This clause does exactly the `foreach` action.

```c
#loop ($names as $name)
  Hello {{ $name }}
#endloop
```

This clause can also be paired with any other clause such as `#if`.
A quick example.

```c
#loop ($names as $name)
  #if ($name == 'tintin')
    Hello {{ $name }}
    #stop
  #endif
#endloop
```

You may have noticed the `#stop` it allows to stop the execution of the loop. There is also his spouse `#jump`, him parcontre allows to stop the execution at his level and launch execution of the next round of the loop.

#### Syntax sugars #jump and #stop

Often the developer is made to make stop conditions of the `#loop` like this:

```c
#loop ($names as $name)
  #if ($name == 'tintin')
    #stop
    // Or
    #jump
  #endif
#endloop
```

With syntactic sugars, we can reduce the code like this:

```c
#loop ($names as $name)
  #stop($name == 'tintin')
  // Or
  #jump($name == 'tintin')
#endloop
```

#### Using #for

This clause does exactly the `for` action.

```c
#for ($i = 0; $i < 10; $i++)
 // ..
#endfor
```

#### Using #while

This clause does exactly the `while` action.

```c
#while ($name != 'tintin')
 // ..
#endwhile
```

### Include of file

Often when you are developing your code, you have to subdivide the views of your application to be more flexible and write less code.

`#include` allows to include another template file in another.

```c
 #include('filename', data)
```

#### Example of inclusion

Consider the following `hello.tintin.php` file:

```jinja
Hello {{ $name }}
```

Use:

```c
#include('hello', ['name' => 'Tintin'])
// => Hello Tintin
```

## Inherit with #extends, #block and #inject

Like any good template system **tintin** supports code sharing between files. This makes your code flexible and maintainable.

Consider the following **tintin** code:

```html
// The `layout.tintin.php` file
<!DOCTYPE html>
<html>
<head>
  <title>Hello, world</title>
</head>
<body>
  <h1>Page header</h1>
  <div id="page-content">
    #inject('content')
  </div>
  <p>Page footer</p>
</body>
</html>
```

And also, we have another file that inherits the code of the file `layout.tintin.php`

```c
// the file is named `content.tintin.php`
#extends('layout')

#block('content')
  <p>This is the page content</p>
#endblock
```

### Explication

The `content.tintin.php` file will inherit the code from` layout.tintin.php` and if you mark it well, in the file `layout.tintin.php` we have the clause `#inject` which has as parameter the name of `content.tintin.php` `block` which is `content`. Which means that the content of `# block` `content` will be replaced by `#inject`. Which will give in the end this:

```html
<!DOCTYPE html>
<html>
<head>
  <title>Hello, world</title>
</head>
<body>
  <h1>Page header</h1>
  <div id="page-content">
    <p>This is the page content</p>
  </div>
  <p>Page footer</p>
</body>
</html>
```

## Contribution

To participate in the project you must:

- Fork the project so that it is among the directories of your github ex account: `https://github.com/your-account/app`
- Clone the project from your github `git clone account https://github.com/your-account/tintin`
- Create a branch whose name will be the summary of your change `git branch branch-of-your-works`
- Make a publication on your depot `git push origin branch-of-your-works`
- Finally make a [pull-request](https://www.thinkful.com/learn/github-pull-request-tutorial/Keep-Tabs-on-the-Project#Time-to-Submit-Your-First-PR)

Or go to the [issues](https://github.com/bowphp/tintin/issues) page, make your corrections and finally follow [publish](#contribution).

## Author

**Franck DAKIA** is a Full Stack developer currently based in Africa, Ivory Coast, Abidjan. Passionate about code, and collaborative development, Speaker, Trainer and Member of several communities of developers.

Contact: [dakiafranck@gmail.com](mailto:dakiafranck@gmail.com) - [@franck_dakia](https://twitter.com/franck_dakia)

<a href="https://www.buymeacoffee.com/iOLqZ3h" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/default-black.png" alt="Buy Me A Coffee" style="height: 30px !important; width: 150px !important;" ></a>