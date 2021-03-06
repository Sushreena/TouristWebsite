{{--this is the package page where a specific package details and comments are shown--}}
@extends('layouts.master')

@section('title')
    {{$city->name}}
@endsection

@section('body')

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{route('welcome')}}">ReadCeylon</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{route('welcome')}}">Home</a></li>
                <li><a href="{{route('cities')}}">All Cities</a></li>
                <li class="active"><a href="/cities/{{$city->name}}">{{$city->name}}</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                @else
                    <li><a href="/register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>

                    <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                @endif
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1 style="color: #1b6d85"><b>{{$city->name}}</b></h1>
        <br>
        <div class="row">

            <!-- Indicators -->


                <div id="myCarousel" class="carousel slide" data-ride="carousel">

                    @if(sizeof($city->has_image)>1)
                        <ol class="carousel-indicators">
                            @foreach($city->has_image as $key=>$i)
                                @if($key==0)
                                    <li data-target="#myCarousel" data-slide-to="{{$key}}" class="active"></li>
                                @else
                                    <li data-target="#myCarousel" data-slide-to="{{$key}}"></li>
                                @endif
                            @endforeach
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            @foreach($city->has_image as $key=>$i)
                                @if($key==0)
                                    <div class="item active">
                                        <img src="\img\{{$i->image->url}}" alt="{{$i->image->name}}"
                                             style="width:100%;">
                                    </div>
                                @else
                                    <div class="item ">
                                        <img src="\img\{{$i->image->url}}" alt="{{$i->image->name}}"
                                             style="width:100%;">
                                    </div>
                                @endif
                            @endforeach

                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    @else
                        @foreach($city->has_image as $i)
                            <img src="\img\{{$i->image->url}}" alt="{{$i->image->name}}" style="width:100%;">

                        @endforeach
                    @endif
                </div>


        </div>
        <br>
        <br>
        <div class="col-md-12">
            <h2>Description :</h2>
            <p align="justify">{{$city->description}}</p>
        </div>


    </div>
@endsection