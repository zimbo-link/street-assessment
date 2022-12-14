 
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
 

<div class="card push-top">
  <div class="card-header">
    Update
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
      <form method="post" action="{{ route('people.update', $person->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" value="{{ $person->name }}"/>
          </div>
          <div class="form-group">
              <label for="surnname">Surname</label>
              <input type="text" class="form-control" name="surnname" value="{{ $person->surnname }}"/>
          </div>
          <div class="form-group">
              <label for="national_id">National ID Number</label>
              <input type="number" class="form-control" name="national_id" value="{{ $person->national_id }}"/>
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" value="{{ $person->email }}"/>
          </div>
          <div class="form-group">
              <label for="mobile_number">Mobile Number</label>
              <input type="tel" class="form-control" name="mobile_number" value="{{ $person->mobile_number }}"/>
          </div>
          <div class="form-group">
              <label for="birth_date">Birth Date</label>
              <input type="date" class="form-control" name="birth_date" value="{{ $person->birth_date }}"/>
          </div> 
          <div class="form-group">
              <label for="phone">Language</label>
                <select class="form-control" name="language">
                  <option  
                  @if($person->language == 0)
                      selected="selected"
                  @endif 
                  value="0">English</option>
                  <option  
                  @if($person->language == 1)
                      selected="selected"
                  @endif 
                  value="1">Afrikaans</option>
                  <option  
                  @if($person->language == 2)
                      selected="selected"
                  @endif 
                  value="3">Zulu</option>
                </select>
          </div>  
          <div class="form-group">
                <label for="interests" >Interests</label>
                <select class="selectpicker" name="interests[]" multiple="multiple"> 
                    @foreach ($interests as $interest)
                        <option 
                        @if( in_array($interest->id, $person->interests->pluck('id')->toArray()))
                            selected="selected"
                        @endif
                        value="{{ $interest->id }}">{{ $interest->interest }}</option>
                    @endforeach
                </select>
          </div> 
          <x-button class="ml-3">
                    {{ __('Update Person') }}
          </x-button>
      </form>
  </div>
</div>
        </div>
    </div>
</x-app-layout>
