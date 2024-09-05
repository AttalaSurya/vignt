<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vignt Ikatta</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        .full-height {
            height: 100vh;
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
            font-size: 84px;
        }
        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<?php 
$a = 1;
?>
<!-- 
!@for ($i = 0; $i < count($datas); $i++) @!
<div class="row">
    {! $a++ !}
</div>
!@endfor -->

<body>
    <div class="flex-center full-height">
        <div class="content">
            <div>
                <h2 class="title">
                    <i class="far fa-snowflake fa-spin" style="color: #b1f7ff; margin-right:7px;"></i>
                    Vig<span style="color:#3cdfff">nt</span>
                </h2>
                <p>{! $data !}</p>
            </div>
        </div>
    </div>
    <!-- !@foreach ($datas as $item) @!
        <div class="row">
            !@if ($item == 'Attala') @!
                <h5> Attala Found </h5>
            !@else
                {! $item !}
            !@endif
        </div>
    !@endforeach -->

</body>

</html>
