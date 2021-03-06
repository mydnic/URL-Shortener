@extends('layout')

@section('content')
<div class="container">
    <div class="row put-the-dang-thing-in-the-middle">
        <div class="col-md-8 col-md-offset-2">
            <div class="">
                <h1>Shorten a URL</h1>
            
                {{ Form::open(['url' => 'api/v1/url']) }}
                    <div class="input-group">
                        {{ Form::text('url', null, ['class' => 'form-control', 'id' => 'shorten-input', 'placeholder' => 'http://innervisionweb.com', 'autofocus'=>'autofocus']) }}
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">Go!</button>
                        </span>
                    </div>
                    {{ $errors->first('url', '<div class="error">:message</div>') }}
                {{ Form::close() }}

            
                @if (Session::has('hashed'))
                    <br>
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            <div class="well well-sm">
                                <output>{{ link_to(Session::get('hashed')) }}</output>
                            </div>
                        </div>
                    </div>
                @endif

                @if (Session::has('tags'))
                    <div class="panel panel-default">
                        <div class="panel-heading">Hashtag suggestion</div>
                        <div class="panel-body">
                            @foreach (Session::get('tags') as $word => $count)
                                #{{ $word }}
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@stop
