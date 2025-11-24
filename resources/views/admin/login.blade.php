<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
<title>K2: Аутентификация</title>
<style>
/* Структура */
html, body {
    height: 100%;
}
body {
    margin: 0;
    background: #585758 url(data:image/gif;base64,R0lGODlhBAAEAJEAAFhXWEhGSFBPUFlYWSH5BAAAAAAALAAAAAAEAAQAAAIHBBImggNrCgA7);
    display: flex;
    flex-direction: column;
    justify-content: center;
    font-family: Arial, Helvetica, Verdana;
    font-size: 0.8rem;
    color: #b3b4b5;
}

/* Атомарные классы */
.field_area {
    label {
        cursor: pointer;
    }
    &.radiocheck {
        .field {
            display: inline-block;
            width: auto;
            margin: 0;
        }
    }
}
.field {
    display: block;
    padding: 6px 6px 7px;
    box-sizing: border-box;
    width: 100%;
    border: 0;
    outline: none;
}
.btn {
    border-radius: 0;
    border: 0;
    cursor: pointer;
    padding: 0 15px;
}

/* Блоки */
#auth {
    background: rgba(0,0,0,0.2);
    display: flex;
    justify-content: center;
    .inner {
        padding: 20px 15px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        .row {
            &.c1 {
                display: flex;
                justify-content: center;
                gap: 10px;
            }
        }
    }
}
</style>
</head>
<body>

<form action="{{ route('admin.auth') }}" method="post" id="auth">
    <div class="inner">
        <div class="row">
            @error('login') <div>{{ $message }}</div> @enderror
            @error('password') <div>{{ $message }}</div> @enderror
        </div>
        <div class="row c1">
            <input type="text" name="login" class="field" placeholder="Login">
            <input type="password" name="password" class="field" placeholder="Password">
            @csrf
            <input type="submit" value="Enter" class="btn">
        </div>
        <div class="row c2">
            <div class="field_area radiocheck">
                <input type="hidden" name="remember" value="0">
                <input type="checkbox" name="remember" id="remember_field" class="field" value="1">
                <label for="remember_field">Remember me</label>
            </div>
        </div>
    </div>
</form>

</body>
</html>
