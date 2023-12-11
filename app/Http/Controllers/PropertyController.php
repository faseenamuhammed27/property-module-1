<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Money\Currency;
use Money\Money;
use App\Models\Property;
use App\Models\PropertyFacility;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::get();
        return view('properties.index', compact('properties'));
    }

    public function create()
    {
        return view('properties.create');
    }

    public function store(Request $request)
    {
        // dd(1);
        // dd($request->all());
       $validator = $request->validate([
            'property_name' => 'required|max:100',
            'phone' => 'required',
            'email' => 'required|email',
            'price' => 'required|numeric',
            'currency' => 'required|in:INR,AED', 
            'description' => 'required',
            'inclusions_exclusions' => 'required',
        ]);
    $slug=Property::generateUniqueSlug($request->property_name);
    $request->merge(['property_slug' => $slug]);

    $property = Property::create($request->all());
        

        // if ($request->hasFile('image')) {
        //     $property->addMedia($request->file('image'))->toMediaCollection('images');
        // }
  if ($request->has('facilityName') && $request->has('facilitystatus')) {


    $facilityData = $request->validate([
        'facilityName.*' => 'required|string|max:255',
        'facilitystatus.*' => 'required|in:Y,N',
    ]);

    foreach ($facilityData['facilityName'] as $key => $name) {
        $status = $facilityData['facilitystatus'][$key];

        PropertyFacility::create([
            'facility_name' => $name,
            'status' => $status,
            'property_id'=> $property->id
        ]);
    }
   }

        return redirect()->route('properties.index')->with('success', 'Property created successfully');
    }

    public function show(Property $property)
    {
        return view('properties.show', compact('property'));
    }

    public function edit(Property $property)
    {
        return view('properties.edit', compact('property'));
    }

    public function update(Request $request, Property $property)
    {
        // dd($request->all());
        $request->validate([
            'property_name' => 'required|max:100',
            'phone' => 'required',
            'email' => 'required|email',
            'price' => 'required|numeric',
            'currency' => 'required|in:INR,AED', 
            'description' => 'required',
            'inclusions_exclusions' => 'required',
            // 'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'facilities.*.facility_name' => 'required',
        ]);
        
        $slug=Property::generateUniqueSlug($request->property_name);
        $request->merge(['property_slug' => $slug]);
        // dd($request->all());
        $property->update($request->all());
        // $property->update($request->except(['image', 'facilities']));

        // // Update or sync facilities
        // $property->facilities()->delete();
        // $property->facilities()->createMany($request->input('facilities'));

        // if ($request->hasFile('image')) {
        //     $property->getMedia('images')->each(function ($media) {
        //         $media->delete();
        //     });

        //     $property->addMedia($request->file('image'))->toMediaCollection('images');
        // }


    //      $facilityData = $request->validate([
    //     'facilityName.*' => 'required|string|max:255',
    //     'facilitystatus.*' => 'required|in:Y,N',
    // ]);

    // foreach ($facilityData['facilityName'] as $key => $name) {
    //     $status = $facilityData['facilitystatus'][$key];

    //     PropertyFacility::create([
    //         'facility_name' => $name,
    //         'status' => $status,
    //         // Add more columns if needed
    //     ]);
    // }

         $facilityData = [];
        foreach ($request->input('facilityName') as $key => $facilityName) {
            $facilityData[] = [
                'facility_name' => $facilityName,
                'status' => $request->input('facilitystatus')[$key],
                'property_id'=> $property,
            ];
        }

        // Sync facilities with the property
        $property->facilities()->delete(); // Remove existing facilities
        $property->facilities()->createMany($facilityData);
// dd(123);
        return redirect()->route('properties.index')->with('success', 'Property updated successfully');
    }

    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('properties.index')->with('success', 'Property deleted successfully');
    }
}
