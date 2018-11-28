<?php

namespace App\Http\Requests;
use App\Series;

use Illuminate\Foundation\Http\FormRequest;

class CreateSeriesRequest extends FormRequest
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
            //
        ];
    }
    public function uploadSeriesImage(){
      //uploadin a new pic to series directory
      $uploadedimage=$this->image;
      $this->filename=str_slug($this->title).'.'.$uploadedimage->getClientOriginalExtension();
     $uploadedimage->storePubliclyAs('series', $this->filename);
     return $this;
    }
    public function storeSeries(){
      //create a Series
      Series::create([
        'title'=>$this->title,
        'slug'=>str_slug($this->title),
        'description'=>$this->description,
        'image_url'=>'series/'.$this->filename
    ]);
    }

}
