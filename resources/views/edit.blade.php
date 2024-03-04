<!doctype html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('../resources/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>

<body>
  <div class="container">
    <h1>Todo bearbeiten</h1>

    <form action="{{ url('todo/'.$todos->id) }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="col-12">
                <label>Name</label><input name="Name" class="form-control" value="{{ $todos->Name }}">
                <span style="color:red">
                    @error('name')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="col-12">
                <label>Beschreibung</label>
                <textarea name="Beschreibung" class="form-control">{{ $todos->Beschreibung }}</textarea>
                <span style=" color:red">
                    @error('Beschreibung')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="col-6">
                <label>Datum</label><input name="Datum" type="date" class="form-control"
                    value="{{ $todos->Datum }}">
                <span style=" color:red">
                    @error('Datum')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="col-6">
                <label>Uhrzeit</label><input name="Uhrzeit" type="time" class="form-control"
                    value="{{ $todos->Uhrzeit }}">
                <span style=" color:red">
                    @error('Uhrzeit')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="col-12">
                <br>
                <button class="btn btn-warning">Änderung speichern</button>
                <a href="{{ url('/') }}" class="btn btn-danger">Abbrechen</a>
            </div>
        </div>
    </form>
  </div>
</body>

</html>
