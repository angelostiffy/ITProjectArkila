<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Drivers</title>
</head>
<body>

    <style>
        table
        {
            width: 100%;
        }
        th, td
        {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        h1 
        {
            text-align: center;
        }
    </style>

    <h1>Ban Trans Operators List</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Contact Number</th>
                <th>Age</th>
            </tr>
        </thead>

        <tbody>
        @foreach ($operators->where('status', 'Active')->sortBy('last_name') as $driver)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $operators->last_name }}, {{ $operators->first_name }}</td>
                <td>{{ $operators->contact_number }}</td>
                <td>{{ $operators->age }}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
