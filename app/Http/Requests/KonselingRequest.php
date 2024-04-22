<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class KonselingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'psikolog_id' => 'required',
            'phone' => 'required|max:12',
            'gender' => 'required|in:1,2',
            'address' => 'required|max:255',
            'category' => 'required|in:1,2',
            'date' => 'nullable|date',
            'time' => 'nullable|date_format:H:i',
            'description' => 'required',
        ];
    }

    //perform manual validation after
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            //check if input date and time is not null
            if ($this->input('category') == 2) {

                if ($this->input('date') == null) {
                    $validator->errors()->add('date', 'Tanggal tidak boleh kosong');
                }

                if ($this->input('time') == null) {
                    $validator->errors()->add('time', 'Jam tidak boleh kosong');
                }

                if ($this->input('date') < date('Y-m-d')) {
                    $validator->errors()->add('date', 'Tanggal tidak boleh kurang dari hari ini');
                }

                //get psikolog from id
                $psikolog = \App\Models\Psikolog::find($this->input('psikolog_id'));

                //get praktik days
                $days = $psikolog->praktik->pluck('hari')->toArray();

                //get day from date in indonesia
                $the_day = date('l', strtotime($this->input('date')));
                $translated_day = strtolower(__('app.days.' . $the_day));

                // dd($translated_day, $days, in_array($translated_day, $days));
                //check if date day is with in psikolog workdays list
                if (!in_array($translated_day, $days)) {
                    $validator->errors()->add('date', 'Psikolog tidak bekerja pada hari ini');
                }

                //get psikolog praktik that match the day
                $praktik = $psikolog->praktik->where('hari', $translated_day)->first();
                
                if ($praktik) {
                    //get psikolog praktik jam_mulai dan jam_selesai
                    $start = $praktik->jam_mulai;
                    $end = $praktik->jam_selesai;

                    //check if time is within psikolog work hours
                    if ($this->input('time') < $start || $this->input('time') > $end) {
                        $validator->errors()->add('time', 'Psikolog tidak bekerja pada jam ini');
                    }
                }
            }
        });
    }
}
