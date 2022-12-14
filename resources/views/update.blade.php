<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Properties') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


                <div class="push-top">
                    @if (session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div><br />
                    @endif


                    <nav class="navbar navbar-expand-lg navbar-light bg-light"> 
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse text-right" id="navbarSupportedContent">

                            <form action="{{ url('/properties') }}" class="form-inline my-2 my-lg-0">
                                @csrf

                                <input class="form-control mr-2" type="search" placeholder="Search Location"
                                    name="search" class="form-control" value="{{ $search }}" aria-label="Search">
                                <label for="from">From:</label>
                                <input class="mr-2" type="date" id="from" name="from" value="{{ $from }}">
                                <label for="to">To:</label>
                                <input class="mr-2" type="date" id="to" name="to" value="{{ $to }}">
                                <label for="accepts_pets">Sleeps:</label>
                                <input class="mr-2" style="width:60px" type="number" id="sleeps" name="sleeps"
                                    value="{{ $sleeps }}">
                                <label for="beds">Beds:</label>
                                <input class="mr-2" style="width:60px" type="number" id="beds" name="beds"
                                    value="{{ $beds }}">
                                <label for="near_beach">Near Beach:</label>
                                <input class="mr-2" type="checkbox" id="near_beach" name="near_beach"
                                    {{ $near_beach == 1 ? 'checked' : '' }}>
                                <label for="accepts_pets">Accepts Pets:</label>
                                <input class="mr-2" type="checkbox" id="accepts_pets" name="accepts_pets"
                                    {{ $accepts_pets == 1 ? 'checked' : '' }}>

                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </div>
                    </nav>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Near Beach</td>
                                <td>Accept Pets</td>
                                <td>Sleeps</td>
                                <td class="text-right">Beds</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($available_properties as $property)
                                <tr>
                                    <td>{{ $property['property_name'] }}</td>
                                    <td>{{ $property['near_beach'] == 1 ? 'Yes' : 'No' }}</td>
                                    <td>{{ $property['accepts_pets'] == 1 ? 'Yes' : 'No' }}</td>
                                    <td>{{ $property['sleeps'] }}</td>
                                    <td class="text-right">{{ $property['beds'] }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                    <div class="container-fluid mb-3">
                        {{ $available_properties->appends($_GET)->links() }}
                    </div>

                    <div>
                    </div>
                </div>
            </div>
</x-app-layout>
