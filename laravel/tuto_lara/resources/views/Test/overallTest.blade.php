<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Overall Testing</title>
</head>

<body>
    @if (session('message'))
        <div class="alert alert-danger d-block">
            <small>{{ session('message') }}</small>
        </div>
    @endif

    @if(session('status'))
        <small>{{ session('status') }}</small>
    @endif
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>
