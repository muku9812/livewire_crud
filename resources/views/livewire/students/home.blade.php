@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-conter">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <b style="text-transform: uppercase">Student Name</b></div>
                    <div style="float: right">
                        <input type="text" wire:model="search">
                    </div>
                    <div class="card-body">
                        @livewire('student-curd')
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
