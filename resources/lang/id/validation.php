<?php

return [

    'required'    => 'Kolom :attribute harus diisi.',
    'max'         => [
        'string'  => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
    ],
    'date'        => 'Kolom :attribute harus berupa tanggal.',
    'date_format' => 'Kolom :attribute harus berupa format tanggal :format.',
    'after'       => 'Kolom :attribute harus berupa tanggal setelah :date.',
    'in'          => 'Kolom :attribute harus berisi salah satu dari :values.',
    'numeric'     => 'Kolom :attribute harus berupa angka.',
    'email'       => 'Kolom :attribute harus berupa alamat email yang valid.',
    'unique'      => 'Kolom :attribute sudah ada sebelumnya.',
    'exists'      => 'Kolom :attribute tidak ditemukan.',
    'required_with' => 'Kolom :attribute harus diisi jika :values diisi.',
    'min'         => [
        'string'  => 'Kolom :attribute harus berisi minimal :min karakter.',
    ],
    'required_if' => 'Kolom :attribute harus diisi jika :other adalah :value.',

];