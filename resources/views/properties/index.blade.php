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
  <p style="text-align: center;font-size: 35px;font-weight: bold;">Property Details</p>
  <p style="text-align: right;font-size: 15px;font-weight: bold;margin-right: 113px;">        
        <button class="btn btn-primary" onclick="window.location.href='{{ route('properties.create') }}'">
            Add New Property
        </button></p>
</div>
<table class="table" style="padding: 51px;margin: 70px;width: 85%;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Property Name</th>
      <th scope="col">Property Slug</th>
      <th scope="col">Property Code</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">Price</th>
      <th scope="col">Currency</th>
      <th scope="col">Description</th>
      <th scope="col">Inclusions and Exclusions</th>
      <th scope="col">Primary Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($properties as $key=>$property)
    <tr>
      <th scope="row">{{++$key}}</th>
      <td>{{$property->property_name}}</td>
      <td>{{$property->property_slug}}</td>
      <td>{{$property->property_code}}</td>
      <td>{{$property->phone}}</td>
      <td>{{$property->email}}</td>
      <td>{{$property->price}}</td>
      <td>{{$property->currency}}</td>
      <td>{{$property->description}}</td>
      <td>{{$property->inclusions_exclusions}}</td>
      <td>{{$property->primary_image}}</td>
      <td>
        <a href="{{ route('properties.show', $property->id) }}" class="edit-link">
    <i class="fa fa-info-circle" style="font-size:16px"></i></a>
        
          <!-- <i class="fa fa-edit" style="font-size:16px"></i> -->
          <a href="{{ route('properties.edit', $property->id) }}" class="edit-link">
    <i class="fa fa-edit" style="font-size:16px"></i></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
    <!-- Include Bootstrap JS and your scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>