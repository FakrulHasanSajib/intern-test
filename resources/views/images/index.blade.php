<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
            color: #333;
        }

        h1 {
            text-align: center;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="file"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        button {
            background-color: #5cb85c;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #4cae4c;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            border-radius: 4px;
        }

        .success-message {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 10px;
            border: 1px solid #d6e9c6;
            border-radius: 4px;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

<h1>Image Upload</h1>

@if (session('success'))
    <div class="success-message">{{ session('success') }}</div>
@endif

@if (session('error'))
    <div class="error-message">{{ session('error') }}</div>
@endif

<form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="image">Select Image:</label>
        <input type="file" name="image" id="image" required>
    </div>
    <button type="submit">Upload</button>
</form>

<h2>Uploaded Images (Total: {{ $images->count() }})</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>File Path</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($images as $image)
            <tr>
                <td>{{ $image->id }}</td>
                <td><img src="{{ asset('storage/' . $image->filepath) }}" alt="Image" width="100"></td>
                <td>{{ $image->filepath }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>

