<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Utils;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeveloperController extends Controller
{
    use Utils;

    public function getDevelopers()
    {
        $developers = Developer::latest()->get();
        return response(['developers' => $developers], 200);
    }

    public function addDeveloper(Request $req)
    {
        $this->validateFormData($req);

        try {

            $inputs = $req->only('name', 'email', 'gender');
            $inputs['image'] = $this->fileUpload($req, 'image', 'public/developers');
            $inputs['skills'] = join(',', $req->skills);

            Developer::create($inputs);

            return response(['message' => 'Developer information saved successfully'], 201);

        } catch (Exception $e) {

            return response(['message' => $e->getMessage()], 500);
        }
    }

    public function updateDeveloper(Request $req)
    {
        $this->validateFormData($req);

        try {
            $developer = Developer::find($req->id);

            $inputs = $req->only('name', 'email', 'gender');
            $inputs['skills'] = join(',', $req->skills);

            if ($req->hasFile('image')) {

                if (!empty($developer->image) && Storage::exists($developer->image)) {
                    Storage::delete($developer->image);
                }

                $inputs['image'] = $this->fileUpload($req, 'image', 'public/developers');
            }

            $developer->update($inputs);

            return response(['message' => 'Developer information updated successfully'], 200);

        } catch (Exception $e) {

            return response(['message' => $e->getMessage()], 500);
        }
    }

    private function validateFormData($req)
    {
        $req->validate([
            'name' => 'required|max:70',
            'email' => 'required|email|max:100',
            'image' => 'nullable|image|max:5000|mimes:png,jpg,jpeg',
            'gender' => 'required|in:male,female',
            'skills' => 'required|array'
        ]);
    }

    public function deleteDeveloper($id)
    {
        try {

            $developer = Developer::find($id);
            $developer->delete();

            return response(['message' => 'Developer information deleted successfully'], 200);

        } catch (Exception $e) {

            return response(['message' => $e->getMessage()], 500);
        }
    }
}
