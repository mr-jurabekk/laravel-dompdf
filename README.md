<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>



## Laravel DomPDF

DomPDF Laravel is a PHP package that allows you to generate PDF files from HTML content in Laravel applications. It leverages the Dompdf library, which is a popular HTML-to-PDF conversion library written in PHP. The Dompdf library converts an HTML string into a PDF document, making it easy to create dynamic and customizable PDFs from your Laravel web application.

The DomPDF Laravel package provides a simple and convenient way to use Dompdf within your Laravel projects. It integrates seamlessly with Laravel’s view system, allowing you to generate PDFs using your existing Blade templates. You can pass data to the view, and the package will render the HTML content, converting it into a downloadable PDF file that can be served to users.

### Step 1: Install Laravel

```
composer create-project laravel/laravel:^8.0 example-app
```


### Step 2: Install the DomPDF package

```
  composer require barryvdh/laravel-dompdf
```

### Step 3: Add Configuration

After successfully installing the package, open the config/app.php file and add the service provider and alias.

**config/app.php**

```
'aliases' => Facade::defaultAliases()->merge([

        'PDF' => Barryvdh\DomPDF\Facade\Pdf::class,

    ])->toArray(),
```

### Step 4: Add Route

```
Route::get('/pdf', [PdfController::class, 'getPdf'])->name('pdf');
```
### Step 5: Add 

```
php artisan make:controller PdfController
```

**app/Http/Controllers/DomPdfController.php**

```
public function getPdf(Request $request)
    {
        $data = [
            'title' => 'Welcome my page',
            'date' => date('m/M/Y')
        ];

        $pdf = PdfAlias::loadview('mypdf', $data);

        return $pdf->download('my_pdf.pdf');
    }
```

### Step 6: Create view file

**resources/views/mypdf.blade.php**

```
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DomPDF </title>
</head>
<body>

<h1>PDF file</h1>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet ex in iste iusto libero numquam, pariatur repellendus? Adipisci aliquam, aliquid amet deserunt dolores, doloribus error excepturi facere illum in magnam maxime modi necessitatibus numquam possimus quasi quo quos totam unde, veniam. Cum impedit perferendis praesentium, quasi saepe temporibus veritatis vero.</p>

</body>
</html>
```

### Happy Coding! 😊