<?php

namespace App\Http\Controllers;

use App\Models\Location_amphure;
use App\Models\Location_province;
use App\Models\Location_tumbon;
use App\Models\Property_image;
use App\Models\Property_Listing;
use App\Models\Property_type;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $prop_lists = Property_Listing::paginate(10);
        return view('content.posts.allposts', compact('prop_lists'));
    }

    function generateCustomId($int)
    {
        try {
            $prefix = 'INSR';
            $length = 10; // Including the prefix

            $formattedInt = str_pad($int, $length - strlen($prefix), '0', STR_PAD_LEFT);
            return $prefix . $formattedInt;
        } catch (\Throwable $th) {
            //throw $th;
            return "";
        }
    }

    // Convert to metric
    // 1 ไร่ = 1600 m^2
    // 1 งาน = 400 m^2
    // 1 ตารางวา = 4 m^2
    function calculateArea($rai = 0, $ngan = 0, $tarangwa = 0)
    {
        return ($rai * 1600) + ($ngan * 400) + ($tarangwa * 4);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Property_type::all();
        $provinces = Location_province::all();
        return view('content.posts.add-posts', compact('types', 'provinces'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $newPost = Property_Listing::create([
                "listing_id" => "",
                "title" => $request->news_title,
                "type_id" => $request->asset_type,
                "province" => $request->address_province,
                "amphure" => $request->address_amphure,
                "tumbon" => $request->address_tumbon,
                "address" => $request->address,
                "description" => $request->news_desc,
                "price" => $request->price,
                "area_size" => 0,
                "created_by" => $request->user()->id,
                "status" => 1,
                "google_map" => $request->googlemap
            ]);

            // Set listing_id
            $newPost->listing_id = $this->generateCustomId($newPost->id);
            // set area_size
            $newPost->area_size = $this->calculateArea($request->area_size_rai ?? 0, $request->area_size_ngan ?? 0, $request->area_size_tarangw ?? 0);
            $newPost->save();

            // set image
            foreach ($request->doc_files ?? [] as $file) {
                $propImage = Property_image::find($file);
                if ($propImage) {
                    $propImage->property_id = $newPost->id;
                    $propImage->save();
                }
            }

            return redirect()->route('posts.index')->with(["success" => "บันทึกสำเร็จ"]);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with(["error" => "บันทึกไม่สำเร็จ กรุณาลองใหม่อีกครั้ง"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $types = Property_type::all();
            $provinces = Location_province::all();
            $prop = Property_Listing::where('listing_id', $id)->firstOrFail();
            $prop_images = Property_image::where('property_id', $prop->id)->get();
            return view('content.posts.edit-posts', compact('prop', 'types', 'provinces', 'prop_images'));
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with(['error' => "Something wrong!"]);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $post = Property_Listing::findOrFail($id);
            $post->update([
                "title" => $request->news_title,
                "type_id" => $request->asset_type,
                "province" => $request->address_province,
                "amphure" => $request->address_amphure,
                "tumbon" => $request->address_tumbon,
                "address" => $request->address,
                "description" => $request->news_desc,
                "price" => $request->price,
                "google_map" => $request->googlemap
            ]);

            // set area_size
            $post->area_size = $this->calculateArea($request->area_size_rai ?? 0, $request->area_size_ngan ?? 0, $request->area_size_tarangw ?? 0);
            $post->save();

            // set image
            foreach ($request->doc_files ?? [] as $file) {
                $propImage = Property_image::find($file);
                if ($propImage) {
                    $propImage->property_id = $post->id;
                    $propImage->save();
                }
            }

            return redirect()->route('posts.index')->with(["success" => "บันทึกสำเร็จ"]);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with(["error" => "บันทึกไม่สำเร็จ กรุณาลองใหม่อีกครั้ง"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            Property_Listing::where('id', $id)->delete();
            $post_medias = Property_image::where('property_id', $id)->get();
            foreach ($post_medias as $media) {
                $filePath = public_path($media->folder . '/' . $media->file_name);
                if (file_exists($filePath)) {
                    unlink($filePath);
                    $media->delete();
                }
            }
            return response()->json([
                'message' => 'Data deleted successfully.'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function getAmphures($provinceId)
    {
        $amphures = Location_amphure::where('province_id', $provinceId)->get();
        return response()->json($amphures);
    }

    public function getDistricts($amphureId)
    {
        $districts = Location_tumbon::where('amphure_id', $amphureId)->get();
        return response()->json($districts);
    }
}
