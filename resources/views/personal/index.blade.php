<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Registrar Personal</title>
  </head>
  <body>
      
    <div class="container">
      <h3>Lista de Personal</h3>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nombre</th>
              <th scope="col">Telefono</th>
              <th scope="col">Documento</th>
              <th scope="col">Direccion</th>
              <th scope="col">Rango</th>
              <th scope="col">Labor</th>
            </tr>
          </thead>
          <tbody>
            @foreach($personal as $personales)
            <tr>
                <th scope="personales">{{$personales->id}}</th>
                <td>{{$personales->nombre}}</td>
                <td>{{$personales->telefono}}</td>
                <td>{{$personales->documento}}</td>
                <td>{{$personales->direccion}}</td>
                <td>{{$personales->rango}}</td>
                <td>{{$personales->labor}}</td>
                <td>
                  <form action="{{route('personal.destroy', $personales->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{route('personal.edit', $personales->id)}}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <a type="button" href="{{route('personal.create') }}" class="btn btn-primary">Crear</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>