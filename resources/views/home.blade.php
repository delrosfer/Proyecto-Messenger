@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">Messenger plusSilver</div>

                <div class="card-body" id="app">
                    <chat-app :user="{{ auth()->user() }}"> </chat-app>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<style lang="scss" scoped>
    .card-header {
        font-size: 22px;
        font-style:italic;
        font-family: times, serif;
        background-color: #01A9DB;
    }
    .card{
        background: #01A9DB;
    }

</style>