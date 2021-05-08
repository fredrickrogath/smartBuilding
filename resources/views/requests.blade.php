@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="card bg-dark">
            <div class="card-header d-flex justify-content-center ">
                <div class="flex flex-column">
                    <div class="text-secondary">
                        welcome <span class="text-info mx-1">
                            {{ auth()->user()->firstName . ' ' . auth()->user()->middleName . ' ' . auth()->user()->lastName }}
                        </span> to message box
                    </div>
                </div>
            </div>

            <div class="card-body">

                <div id="showConversation">

                    <div class="d-flex flex-column my-2">

                        @foreach ( $requests as $request )

                        <div class="d-flex flex-row justify-content-between">

                            <span class="text-secondary mx-3 my-2 w-75 font-weight-bold"> {{ $request->body }} </span>

                            <form action=" {{ route('deleteRequest') }}" method="post">
                                @csrf

                                @method('delete')

                                <input type="hidden" value="{{ $request->id}}" name="requestId">
                                <button type="submit" class="text-secondary btn btn-sm btn-dark" style="cursor:pointer;"> {{'delete'}} </button>
                            </form>

                        </div>

                        @endforeach


                    </div>

                </div>

{{--
                <div id="hideRequests" class="" style="display:none">

                    <div class="text-secondary text-right" style="cursor:pointer;">
                        back </div>

                    <div class="ml-2">

                        <div id="showRequestBody" class="text-secondary">
                            {{ 'request body' }}
                        </div>

                    </div>

                </div> --}}

                <div class="text-center">
                    <span class="text-info"> smartBuilding </span>
                </div>

            </div>
        </div>

    </div>

@endsection
