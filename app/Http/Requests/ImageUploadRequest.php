<?php

namespace App\Http\Requests;

use enshrined\svgSanitize\Sanitizer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageUploadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'mimes:png,gif,jpg,jpeg,svg,bmp,svg+xml',
        ];
    }

    /*public function response(array $errors)
    {
        return $this->redirector->back()->withInput()->withErrors($errors, $this->errorBag);
    }*/

    /**
     * Handle and store any images attached to request
     *
     */
    public function handleImages($item, $height, $input, $path = null, $column)
    {
        if ($this->hasFile($input)) {

            $image = $this->file($input);

            if ($image->isValid()) {
                // getting original extension for image
                $extension = $image->getClientOriginalExtension();
                // creating filename for image
                $filename = date("Y_m_d_h_i_s") . "_" . $input . "." . $extension;

                if ($image->getClientOriginalExtension() !== 'svg') {

                    $upload = Image::make($image->getRealPath())->resize(null, $height, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });

                    // This requires a string instead of an object, so we use ($string)
                    Storage::disk('public')->put($path . $filename, (string)$upload->encode());

                } else {
                    // if the file is an SVG, we need to clean it and NOT encode it
                    $sanitizer = new Sanitizer();
                    $dirtySVG = file_get_contents($image->getRealPath());
                    $cleanSVG = $sanitizer->sanitize($dirtySVG);

                    try {

                        Storage::disk('public')->put($path . $filename, $cleanSVG);

                    } catch (\Exception $exception) {

                        Log::debug($extension);
                        return null;

                    }
                }

                // remove Current image if exists
                if (Storage::disk('public')->exists($path . $item->{$column})) {

                    try {

                        Storage::disk('public')->delete($path . $item->{$column});

                    } catch (\Exception $exception) {

                        return null;

                    }

                }

                $item->{$column} = $filename;

            }
        }
        return $item;
    }
}
