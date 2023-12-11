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
<form method="POST" action="{{ route('properties.store') }}" style="padding: 150px;margin-top: -75px;"
>
@csrf
  <div class="form-group row">
    <label for="property_name" class="col-sm-2 col-form-label">Property Name</label>
    <div class="col-sm-10">
      <input type="text" name="property_name" class="form-control" placeholder="Property Name">
    </div>
  </div>
  <div class="form-group row">
    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
    <div class="col-sm-10">
      <input type="text" name="phone" class="form-control" placeholder="Phone">
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" name="email" class="form-control" placeholder="Email">
    </div>
  </div>
  <div class="form-group row">
    <label for="price" class="col-sm-2 col-form-label">Price</label>
    <div class="col-sm-10">
      <input type="text" name="price" class="form-control" placeholder="Price">
    </div>
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Currency</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="currency" id="inr" value="INR" checked>
          <label class="form-check-label" for="inr">
            INR
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="currency" id="aed" value="AED">
          <label class="form-check-label" for="aed">
            AED
          </label>
        </div>
        
      </div>
    </div>
  </fieldset>

  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="description" placeholder="Description">
    </div>
  </div>
  
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Inclusions Exclusions</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inclusions_exclusions" placeholder="Inclusions Exclusions">
    </div>
  </div>
<div id="facilityContainer">
            <!-- Initial variant input fields -->
            <div class="variantRow">
                <label for="facilityName">Facility Name:</label>
                <input type="text" name="facilityName[]" required>
                <label for="facilitystatus">Facility Status:</label>
                <input type="text" name="facilitystatus[]" required>
                <button type="button" onclick="removeVariant(this)">Remove</button>
            </div>
        </div>
        <button type="button" onclick="addFacility()">Add Facility</button>
 
 

  <div class="form-group row">
    <div class="col-sm-10"style="text-align: center;font-size: 15px;font-weight: bold;margin-right: 314px; padding: 55px; ">
      <button type="submit" class="btn btn-primary">Add</button>
    </div>
  </div>
</form>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>

 <script>
        function addFacility() {
            const facilityContainer = document.getElementById('facilityContainer');
            const newFacilityRow = document.createElement('div');
            newFacilityRow.className = 'facilityRow';

            const labelName = document.createElement('label');
            labelName.innerText = 'Facility Name:';
            newFacilityRow.appendChild(labelName);

            const inputName = document.createElement('input');
            inputName.type = 'text';
            inputName.name = 'facilityName[]';
            inputName.required = true;
            newFacilityRow.appendChild(inputName);

            const labelValue = document.createElement('label');
            labelValue.innerText = 'Facility Status:';
            newFacilityRow.appendChild(labelValue);

            const inputValue = document.createElement('input');
            inputValue.type = 'text';
            inputValue.name = 'facilitystatus[]';
            inputValue.required = true;
            newFacilityRow.appendChild(inputValue);

            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.innerText = 'Remove';
            removeButton.addEventListener('click', function() {
                removeVariant(this);
            });
            newFacilityRow.appendChild(removeButton);

            facilityContainer.appendChild(newFacilityRow);
        }

        function removeVariant(button) {
            const facilityRow = button.parentNode;
            const facilityContainer = document.getElementById('facilityContainer');
            facilityContainer.removeChild(facilityRow);
        }
    </script>
</body>
</html>