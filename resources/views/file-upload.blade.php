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
                    <div>
                   
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>


                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="col-lg-12">

                            <form action="{{ route('uploadTheFile') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Upload File</label>
                                    <input type="file" class="form-control" name="attachment" required>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-success bg-sky-500">Save</button>

                                </div>
                            </form>
                        </div>

                    

                    </nav>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Title</td>
                                <td>First Name</td>
                                <td>Initial</td> 
                                <td>Last Name</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($homeowners as $homeowner)
                                <tr>
                                    <td>{{ $homeowner->title }}</td>
                                    <td>{{ $homeowner->firstname }}</td>
                                    <td>{{ $homeowner->initial }}</td>
                                    <td>{{ $homeowner->lastname }}</td> 

                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                    <div class="container-fluid mb-3">
                        {{ $homeowners->links() }}
                    </div>


                </div>
            </div>
</x-app-layout>
