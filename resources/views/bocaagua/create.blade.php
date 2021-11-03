<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Registrar Herramientas</title>
  </head>
  <body>
    <div  class="container">
        <form action="{{ route('bocaagua.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <h3>Registro boca de agua</h3> 
                </div>
                <div class="form-group">
                    <label for="input">Número</label>
                    <input type="text" class="form-control" id="numero" name="numero" placeholder="Ingrese el número">
                </div>
                <div class="form-group">
                    <label for="input">Dirección</label>
                    <input type="text" class="form-control" id="direccion" name="direccion"  placeholder="Ingrese la dirección">
                </div>
                <div class="form-group">
                    <label for="input">Latitud</label>
                    <input type="text" class="form-control" id="latitud" name="latitud" placeholder="Ingrese la latitud">
                </div>
                <div class="form-group">
                    <label for="input">Longitud</label>
                    <input type="text" class="form-control" id="longitud" name="longitud"  placeholder="Ingrese la longitud">
                </div>
                
                <div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a type="button" href="{{route('bocaagua.index') }}" class="btn btn-danger">Cancelar</a>
                </div>
        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>