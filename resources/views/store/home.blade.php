@extends('layouts.app')
@section('title', 'Welcome')

@section('content')
   
{{-- @vite(['resources/css/home.css']) --}}

<div class="container">

    <section>

        <div class="container text-start my-5"></div>
        <h1>Hello,Dental Solucions</h1>
        <div class="" style="width: 18rem;">
            <P>
                Crear una plantilla base: Crea una plantilla base para tus vistas, que contenga el contenido común que deseas mostrar en todas las páginas de tu aplicación. Esta plantilla base puede ser tan simple o compleja como desees, pero debe contener las secciones que deseas rellenar con contenido específico en cada vista.
                Por ejemplo, puedes crear un archivo 'app.blade.phpresources/views/layouts con el siguiente contenido:        
        
            </P>
            <a class="btn btn-primary" href="#">Leanmore>></a>
        </div>
    </div>
    </div>
    </section>

    <div class="col">
        <div class="row">
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Productos</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Nosotros</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Todo mas...</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>                
    </div>
@endsection