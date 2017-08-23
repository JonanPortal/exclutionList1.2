
<!DOCTYPE html>
<html>
<head>
    <title>Exclusion List</title>
    <style type = "text/css">
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even){background-color: #f2f2f2}
    </style>
</head>
<body>

<table>
    <caption><h1> Exclusion List</h1></caption>
    <thead>
        <tr>
          <th>NAME</th>
          <th>DOB </th>
          <th>DATE_HIRED </th>
          <th>YEARMONTH</th>
          <th>OIG_RESULT </th>
          <th>EXCLTYPE </th>
        </tr>
    </thead>
    <tbody>
        @foreach($results as $key => $result)
        <tr>
            <td>{{$result->NAME}}</td>
            <td>{{$result->DOB}}</td>
            <td>{{$result->DATE_HIRED}}</td>
            <td>{{$result->YEARMONTH}}</td>
            <td>{{$result->OIG_RESULT}}</td>
            <td>{{$result->EXCLTYPE}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>
