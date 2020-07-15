<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<table class="table header-border" style="width: 100%; border-spacing: 0px; text-align: center">
    <thead>
    <tr>
        <th style="font-weight: normal">Time</th>
        <th style="font-weight: normal">Date</th>
        <th style="font-weight: normal">Client Name</th>
        <th style="font-weight: normal">Title</th>
        <th style="font-weight: normal">Products</th>
        <th style="font-weight: normal">packages</th>
    </tr>
    </thead>
    <tbody>
    @for($i=0; $i<count($final_orders);$i++)
        <tr>
            <td style="border-bottom: 1px solid black; padding: 15px 0;">{{$final_orders[$i][0]['time']}}</td>
            <td style="border-bottom: 1px solid black; padding: 15px 0;">{{$final_orders[$i][0]['date']}}</td>
            <td style="border-bottom: 1px solid black; padding: 15px 0;">{{$final_orders[$i][0]['client']}}</td>
            <td style="border-bottom: 1px solid black; padding: 15px 0;">{{$final_orders[$i][0]['address']}}</td>
            <td style="border-bottom: 1px solid black; padding: 15px 0;">
                @for($j=0;$j<count($final_orders[$i][0]['product'][0]);$j++)
                    {{$final_orders[$i][0]['product'][0][$j][0]['product_name']}},
                @endfor
            </td>
            <td style="border-bottom: 1px solid black; padding: 15px 0">{{$final_orders[$i][0]['package']}}</td>
        </tr>
    @endfor
    </tbody>
</table>
</body>
</html>