<?php
namespace App\Http\Controllers;


 
use App\Models\Vendor as Vendor;
use App\Http\Controllers\Controller;
use App\Http\Resources\Vendor as VendorResource;


use Illuminate\Http\Request;

class ApiVendorController extends Controller
{
      public function index(Request $request)
      {
      $vendors = Vendor::all();
       // dd($vendors);
      $geoJSONdata = $vendors->map(function ($vendor) {
      return [
      'type' => 'Feature',
      'properties' => new VendorResource($vendor),
      'geometry' => [
      'type' => 'Point',
      'coordinates' => [
      $vendor->longitude,
      $vendor->latitude,
      ],
      ],
      ];
      });

      return response()->json([
      'type' => 'FeatureCollection',
      'features' => $geoJSONdata,
      ]);
      }
}
