<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="card push-top">
  <div class="card-header">
    Add Person
  </div>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('people.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="surnname">Surname</label>
              <input type="text" class="form-control" name="surnname"/>
          </div>
          <div class="form-group">
              <label for="national_id">National ID Number</label>
              <input type="number" class="form-control" name="national_id"/>
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="mobile_number">Mobile Number</label>
              <input type="tel" class="form-control" name="mobile_number"/>
          </div>
          <div class="form-group">
              <label for="birth_date">Birth Date</label>
              <input type="date" class="form-control" name="birth_date"/>
          </div>
          <div class="form-group">
              <label for="language" class="selectpicker">Language</label>
                <select class="form-control" name="language">
                    <option value="0">English</option>
                    <option value="1">Afrikaans</option>
                    <option value="3">Zulu</option>
                </select>
          </div> 
          <div class="form-group">
                <label for="interests" class="selectpicker">Interests</label>
                <select class="selectpicker" name="interests[]" multiple="multiple">
          
                    @foreach ($interests as $interest)
                        <option value="{{ $interest->id }}">{{ $interest->interest }}</option>
                    @endforeach
                </select>
          </div> 
          <x-button class="ml-3">
                    {{ __('Create Person') }}
                </x-button>
      </form>
  </div>
</div>
            </div>
        </div>
    </div>
</x-app-layout>
