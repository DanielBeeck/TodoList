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
        <div class="row">
            <div class="col-12">

                <h1>Merkliste</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Beschreibung</th>
                            <th scope="col">Datum</th>
                            <th scope="col">Uhrzeit</th>
                            <th scope="col">Erledigt</th>
                            <th scope="col">Aktion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($todo as $t)
                            <tr>
                                <td>{{ $t['Name'] }}</td>
                                <td>{{ $t['Beschreibung'] }}</td>
                                <td>{{ $t['Datum'] }}</td>
                                <td>{{ date('H:i', strtotime($t['Uhrzeit'])) }}</td>

                                <form id="statusForm_{{ $t->id }}" action="{{ url('todo/Status/' . $t->id) }}" method="POST">
                                    @method('PATCH')
                                    @csrf
                                    <td>
                                        <input class="box" type="checkbox" name="Status" value="erledigt"
                                            {{ $t->Status == 'erledigt' ? 'checked' : '' }}
                                            onclick="submitFormOnCheckboxClick({{ $t->id }})">
                                    </td>
                                </form>
                                <td>
                                    <a href="{{ url('/edit/' . $t->id) }}"><span class="fa fa-edit mr-1"></span></a>
                                    <form action="{{ url('/' . $t->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit"
                                            style="border: none; background-color: transparent; cursor: pointer;">
                                            <span class="fa fa-times"></span>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
                <h2>
                    Neue Notiz anlegen
                </h2>
                <form action="insertTupel" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <label>Name</label><input name="Name" class="form-control" value="{{ old('name') }}">
                            <span style="color:red">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-12">
                            <label>Beschreibung</label>
                            <textarea name="Beschreibung" class="form-control" value="{{ old('Beschreibung') }}"></textarea>
                            <span style=" color:red">
                                @error('Beschreibung')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-6">
                            <label>Datum</label><input name="Datum" type="date" class="form-control"
                                value="{{ old('Datum') }}">
                            <span style=" color:red">
                                @error('Datum')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-6">
                            <label>Uhrzeit</label><input name="Uhrzeit" type="time" class="form-control"
                                value="{{ old('Uhrzeit') }}">
                            <span style=" color:red">
                                @error('Uhrzeit')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-12">
                            <br>
                            <button class="btn btn-success">Anlegen</button>
                            <button class="btn btn-danger">Zurücksetzen</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    function submitFormOnCheckboxClick(todoId) {
        var form = document.querySelector('#statusForm_' + todoId);
        form.submit();
    }
</script>
