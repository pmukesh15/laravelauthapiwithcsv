<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 50vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 30px;
            }
            .link{
                 font-weight: 600 !important;
            }

            .links > a {
                color: #636b6f !important;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600 !important;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                font-weight: 700;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .alert-success{
                color: #333 !important;
                font-size: large !important;
                font-weight: 600 !important;
                background-color: #72d298 !important;
                border-color: #d6e9c6 !important;
            }
            .alert-error{
                color: #de0000 !important;
                font-size: large !important;
                font-weight: 600 !important;
                background-color: #ea5b688a !important;
                border-color: #e82c2c !important;
            }
        </style>
    </head>
    <body>
        <p class = "flex-center title"> Upload CSV file</p>
        <div class="flex-center position-ref full-height">
           <div class="content">
                <div class="container max-w-7xl mx-auto sm:px-6 lg:px-8" style="width: 50%">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                            @if (session('error'))
                                <div class="alert alert-error">
                                    {{ session('error') }}
                                </div>
                            @endif
                        <form class="flex-center" action="{{route('import')}}" method="post" enctype="multipart/form-data">
                        <input name="_token" value="{{ csrf_token() }}" type="hidden">
                            <div class="custom-file">
                                <input type="file" accept=".csv" name="excel" class="custom-file-input" id="customFile" />
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary btn-sm" style="margin-top: 10px">Submit</button>
                            </div>
                        </form><br/><br/>
                        <a class="links link" href="{{ asset('public/sample/samplecsv.csv') }}"> Download Csv Template</a><br/><br/>
                        <a class="links link" href="{{route('viewuploads')}}"> View Imported Data</a><br/><br/>
                        <a class="links link" href="{{route('home')}}"> Go Home !!!</a>
                </div>
            </div>
        </div>
    </body>
    <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</html>
