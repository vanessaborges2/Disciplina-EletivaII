<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exer1</title>
</head>
<body>
    <form action="/exer1resp" method="post">
        @csrf
        <input type="text" name="valor1" placeholder="Informe o valor 1">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>