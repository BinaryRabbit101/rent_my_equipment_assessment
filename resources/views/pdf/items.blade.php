<!DOCTYPE html>
<html>
    <head>
        <title>
            @yield('title', 'Rent My Equipment')
        </title>
        <style>
            @page {
                margin: 0px;
            }
            body {
                margin: 0px;
                text-align: center;
            }
            .page-break {
                page-break-after: always;
            }
            .page {
                position: relative;
                padding: 32px;
            }
            .title {
                font-weight: bold;
                font-size: 32px;
                margin-bottom: 32px;
            }
            .image img {
                width: 85%;
                height: auto;
            }
            .link {
                margin-top: 32px;
            }
         </style>
    </head>
    <body style="position:relative">
        @foreach($items as $item)
            @include('pdf.item', ['item' => $item, 'last_page' => $loop->last])
        @endforeach
    </body>
</html>
