<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Operators</title>
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
        @foreach ($operators->where('status', 'Active')->sortBy('last_name') as $operator)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $operator->last_name }}, {{ $operator->first_name }}</td>
                <td>{{ $operator->contact_number }}</td>
                <td>{{ $operator->age }}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
    
</body>
</html>
