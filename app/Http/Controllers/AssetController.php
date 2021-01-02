<?php

namespace App\Http\Controllers;

use App\Asset;
use App\AssetImage;
use App\Contractor;
use App\Department;
use App\Hospital;
use App\Http\Requests\SaveAssetRequest;
use App\Location;
use App\Manufacturer;
use App\Vendor;
use enshrined\svgSanitize\Sanitizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        if (request()->status == 'deleted') {
            $assets = Asset::onlyTrashed()->get();
        } else {
            $assets = Asset::all();
        }
        return view('assets.index')->with(compact('assets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $hospitals = Hospital::all();
        $contractors = Contractor::all();
        $locations = Location::all();
        $departments = Department::all();
        $vendors =  Vendor::all();
        $manufacturers = Manufacturer::all();
        return view('assets.create', [
            'asset' => new Asset,
            'hospitals' => $hospitals,
            'contractors' => $contractors,
            'locations' => $locations,
            'departments' => $departments,
            'vendors' => $vendors,
            'manufacturers' => $manufacturers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $asset = new Asset;
        $asset->asset_id = $request->input('asset_id');
        $asset->brand = $request->input('brand');
        $asset->model = $request->input('model');
        $asset->serial_no = $request->input('serial_no');
        $asset->purchase_date = $request->input('purchase_date');
        $asset->warranty_period = $request->input('warranty_period');
        $asset->warranty_end = $request->input('warranty_end');
        $asset->warranty_status = $request->input('warranty_status');
        $asset->cost = $request->input('cost');
        $asset->variation = $request->input('variation');
        $asset->contract = $request->input('contract');
        $asset->asset_condition = $request->input('asset_condition');
        $asset->remarks = $request->input('remarks');
        $asset->created_by = $request->input('created_by');
        $asset->description = $request->input('description');
        $asset->hospital_id = $request->input('hospital_id');
        $asset->department_id = $request->input('department_id');
        $asset->location_id = $request->input('location_id');
        $asset->manufacturer_id = $request->input('manufacturer_id');
        $asset->vendor_id = $request->input('vendor_id');

        // multiple image upload
        if ($request->hasFile('image')) {

            $files = $request->file('image');

            foreach ($files as $file) {

                if ($file->isValid()) {

                    // getting original extension for image
                    $extension = $file->getClientOriginalExtension();
                    // creating filename for image
                    $filename = date("Y_m_d_h_i_s") . "_" . Str::random(10) . "." . $extension;

                    if ($file->getClientOriginalExtension() !== 'svg') {

                        $upload = Image::make($file->getRealPath())->resize(null, 600, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        });

                        // This requires a string instead of an object, so we use ($string)
                        Storage::disk('public')->put('assets/image/' . $filename, (string)$upload->encode());

                    } else {
                        // if the file is an SVG, we need to clean it and NOT encode it
                        $sanitizer = new Sanitizer();
                        $dirtySVG = file_get_contents($file->getRealPath());
                        $cleanSVG = $sanitizer->sanitize($dirtySVG);

                        try {

                            Storage::disk('public')->put('assets/image/' . $filename, $cleanSVG);

                        } catch (\Exception $exception) {

                            Log::debug($extension);
                            return null;

                        }
                    }
                    // save image data in AssetImages
                    $image = new AssetImage();
                    $image->asset_id = $request->input('asset_id');
                    $image->image = $filename;
                    $image->save();

                }

            }
        }

        $asset->save();

        return redirect()->route('assets.index')->with('success', 'Asset created successfully.');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Asset $asset)
    {
        return view('assets.view')->with('asset', $asset);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Asset $asset)
    {
        $hospitals = Hospital::all();
        $contractors = Contractor::all();
        $locations = Location::all();
        $departments = Department::all();
        $vendors =  Vendor::all();
        $manufacturers = Manufacturer::all();
        return view('assets.edit', [
            'asset' => $asset,
            'hospitals' => $hospitals,
            'contractors' => $contractors,
            'locations' => $locations,
            'departments' => $departments,
            'vendors' => $vendors,
            'manufacturers' => $manufacturers,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(SaveAssetRequest $request, Asset $asset)
    {
        $asset->asset_id = $request->input('asset_id');
        $asset->brand = $request->input('brand');
        $asset->model = $request->input('model');
        $asset->serial_no = $request->input('serial_no');
        $asset->purchase_date = $request->input('purchase_date');
        $asset->warranty_period = $request->input('warranty_period');
        $asset->warranty_end = $request->input('warranty_end');
        $asset->warranty_status = $request->input('warranty_status');
        $asset->cost = $request->input('cost');
        $asset->variation = $request->input('variation');
        $asset->contract = $request->input('contract');
        $asset->asset_condition = $request->input('asset_condition');
        $asset->remarks = $request->input('remarks');
        $asset->created_by = $request->input('created_by');
        $asset->description = $request->input('description');
        $asset->hospital_id = $request->input('hospital_id');
        $asset->department_id = $request->input('department_id');
        $asset->location_id = $request->input('location_id');
        $asset->manufacturer_id = $request->input('manufacturer_id');
        $asset->vendor_id = $request->input('vendor_id');

        // multiple image upload
        if ($request->hasFile('image')) {

            $files = $request->file('image');

            foreach ($files as $file) {

                if ($file->isValid()) {

                    // getting original extension for image
                    $extension = $file->getClientOriginalExtension();
                    // creating filename for image
                    $filename = date("Y_m_d_h_i_s") . "_" . Str::random(10) . "." . $extension;

                    if ($file->getClientOriginalExtension() !== 'svg') {

                        $upload = Image::make($file->getRealPath())->resize(null, 600, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        });

                        // This requires a string instead of an object, so we use ($string)
                        Storage::disk('public')->put('assets/image/' . $filename, (string)$upload->encode());

                    } else {
                        // if the file is an SVG, we need to clean it and NOT encode it
                        $sanitizer = new Sanitizer();
                        $dirtySVG = file_get_contents($file->getRealPath());
                        $cleanSVG = $sanitizer->sanitize($dirtySVG);

                        try {

                            Storage::disk('public')->put('assets/image/' . $filename, $cleanSVG);

                        } catch (\Exception $exception) {

                            Log::debug($extension);
                            return null;

                        }
                    }
                    // save image data in AssetImages
                    $image = new AssetImage();
                    $image->asset_id = $asset->asset_id;
                    $image->image = $filename;
                    $image->save();

                }

            }
        }

        $asset->save();

        return redirect()->route('assets.index')->with('success', 'Asset Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Asset $asset)
    {
        $asset->delete();
        return back()->with('success', 'The Accessory was deleted successfully.');
    }

    public function restore($asset_id = null)
    {
        Asset::onlyTrashed()->where('asset_id', $asset_id)->restore();
        return redirect()->route('assets.index')->with('success', 'Asset restored successfully.');
    }

    public function fdelete($asset_id = null)
    {
        Asset::onlyTrashed()->where('asset_id', $asset_id)->forceDelete();
        return back()->with('success', 'The Asset was permanently deleted successfully.');
    }

    public function deleteImage($id = null)
    {
        $image = AssetImage::where('id', $id)->first();

        // remove Current image if exists
        if (Storage::disk('public')->exists('assets/image/' . $image->image)) {

            try {

                Storage::disk('public')->delete('assets/image/' . $image->image);

            } catch (\Exception $exception) {

                return null;

            }

        }

        AssetImage::where('id', $id)->delete();
        return back()->with('success', 'Asset Image has been deleted successfully!');
    }
}
