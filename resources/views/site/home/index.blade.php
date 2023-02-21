<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>{{env('APP_NAME')}}</title>
    <link href="{{asset('assets/site/css/main.css')}}" rel="stylesheet" type="text/css"/>
</head>
<body>

<div class="s010">

    <form method="get" action="{{route('search')}}">

        <div class="inner-form">
            <div class="basic-search">
                <div class="input-field">

                    <input onkeyup="this.value=removeSpaces(this.value)" value="{{request()->input('keyword')}}"
                           id="keyword" name="keyword" type="search"
                           placeholder="Type Keywords"/>

                    <div class="icon-wrap">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                        </svg>
                    </div>

                </div>
            </div>

            @isset($error_message)

                @if($error_message)
                    <div class="advance-search" style="text-align: center">
                        <span class="desc" style="font-size: 20px;color: red">{{$error_message}}</span>
                    </div>
                @endif

            @endisset

            @isset($items)

                @foreach($items as $item)

                    <div class="advance-search">

                        <p>city : {{$item['city']}}</p>

                        <span class="desc">The most popular hotel in [{{$item['city']}}]
                            is [{{$item['cheapest_hotel']['hotel_name']}}].
                            Book now for [{{$item['cheapest_hotel']['min_rate']}}]</span>

                        <span class="desc">
                            The cheapest hotel in [{{$item['city']}}]
                            is [{{$item['popular_hotel']['hotel_name']}}]
                            . Book now for [{{$item['popular_hotel']['min_rate']}}]
                        </span>

                    </div>

                @endforeach

            @endisset

        </div>

    </form>
</div>

<script src="{{asset('assets/site/js/public.js')}}" type="text/javascript"></script>

</body>
</html>
