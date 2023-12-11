<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Property Module</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Include your stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div>
  <p style="text-align: center;font-size: 35px;font-weight: bold;">Add Property Details</p>
</div>
<form method="POST" action="{{ route('properties.update',$property->id) }}" style="padding: 150px;margin-top: -75px;"
>
@csrf
@method('PUT')
  <div class="form-group row">
    <label for="property_name" class="col-sm-2 col-form-label">Property Name</label>
    <div class="col-sm-10">
      <label class="col-sm-2 col-form-label">{{$property->property_name}}</label>
      <!-- <label  name="property_name" class="form-control">{{$property->property_name}}"</label> -->
    </div>
  </div>
  <div class="form-group row">
    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
    <div class="col-sm-10">
      <label  class="col-sm-2 col-form-label">{{$property->phone}}</label>
     
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <label  class="col-sm-2 col-form-label">{{$property->email}}</label>
     
    </div>
  </div>
  <div class="form-group row">
    <label for="price" class="col-sm-2 col-form-label">Price</label>
    <div class="col-sm-10">
      <label  class="col-sm-2 col-form-label">{{$property->price}}</label>
      
    </div>
  </div>
  <div class="form-group row">
    <label for="currency" class="col-sm-2 col-form-label">Currency</label>
    <div class="col-sm-10">
      <label  class="col-sm-2 col-form-label">{{$property->currency}}</label>
      
    </div>
  </div>
  

  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-10">
      <label class="col-sm-2 col-form-label">{{$property->description}}</label>
      
    </div>
  </div>
  
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Inclusions Exclusions</label>
    <div class="col-sm-10">
      <label  class="col-sm-2 col-form-label">{{$property->inclusions_exclusions}}</label>
      
    </div>
  </div>

  <div id="facilityContainer">
                @foreach ($property->facilities as $facility)
                    <div class="facilityRow">
                        <label for="facilityName">Facility Name:</label>
                        <label for="facilityName[]" class="col-sm-2 col-form-label">{{$facility->facility_name}}</label>
                        

                        <label for="facilitystatus">Facility Status:</label>
                        <label  class="col-sm-2 col-form-label">{{$facility->status}}</label>
                        

                        
                    </div>
                @endforeach
            </div>

           
<a href="{{ route('properties.index') }}" class="btn btn-primary">Back to Properties</a>
</form>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>