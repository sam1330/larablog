<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Hello - {{ "$nombre $apellido" }}</h1>
    <?php foreach ($users as $user) :?>
        The user is {{ $user }}
        <?php endforeach; ?>
    <ul>
    @forelse ($users as $user)
        <?php dd($loop) ?>
        @if ($loop->first)
            primero
        @endif
        <li>The user is {{ $user }}</li>
        @empty
        <li>No hay Usuarios</li>
    @endforelse
    </ul>
</body>
</html>