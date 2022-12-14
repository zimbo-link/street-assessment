<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('People') }} 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
       
          
          <div class="push-top">
            @if(session()->get('success'))
              <div class="alert alert-success">
                {{ session()->get('success') }}  
              </div><br />
            @endif

            
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand  btn"  href="{{ route('people.create')}}">Create Person</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
  
    </ul>
    <form action="{{url('/people')}}" class="form-inline my-2 my-lg-0">
    @csrf
      <input class="form-control mr-sm-2" type="search"  placeholder="Search by name... only!" name="search" class="form-control" value="{{ $search }}" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
            <table class="table">
              <thead>
                  <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Phone</td> 
                    <td class="text-right">Action</td>
                  </tr>
              </thead>
              <tbody>
                  @foreach($people as $person)
                  <tr>
                      <td>{{$person->id}}</td>
                      <td>{{$person->name}}</td>
                      <td>{{$person->email}}</td>
                      <td>{{$person->mobile_number}}</td> 
                      <td class="text-right">
                          <a href="{{ route('people.edit', $person->id)}}" class="btn">Edit</a>
                          <form action="{{ route('people.destroy', $person->id)}}" method="post" style="display: inline-block">
                              @csrf
                              @method('DELETE')
                              <button class="btn" type="submit">Delete</button>
                            </form>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
         
             
            <div class="container-fluid mb-3">
            {{ $people->links() }}
            </div>
 
          <div>
        </div>
        </div>
    </div>
</x-app-layout>