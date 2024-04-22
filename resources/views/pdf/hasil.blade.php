<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    *{
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }

    ul{
        list-style-type: none;
        padding: 0;
        margin: 0;
    }
    li{
        margin-bottom: .6rem;
        font-size: .9rem;
    }
</style>
<body style="position: relative">
    <div id="head" style="width: 100%; height: 5rem; position: relative;">
        <img src="{{ public_path('assets/images/logo.png') }}" alt="" style="width: 100%; opacity: .1; position: absolute;">
        <h1 style="width: fit-content; font-weight: ligthter; font-size: 1.2rem; display:inline; float: left; line-height: 3rem;">HASIL KONSELING</h1>
        <h1 style="width: fit-content; display:inline; margin-left:auto; font-weight: bold; font-size: 1.8rem; color:#5271FF; float: right; line-height: 3rem;">UNNES WELLBEING</h1>
        {{-- <h1 style="width: fit-content; float: right; font-weight: ligthter; font-size: 1rem; position: relative; top: 1.2rem">Senin, 12 Mei 2024</h1> --}}
    </div>
    
    <div style="margin-top: 3rem; position: relative; height: 10rem;">
        <ul style="float: right; text-align:right;">
            <li style="font-weight: bolder">PSIKOLOG</li>
            <li style="">{{ $konseling->psikolog->dataPsikolog->name }} {{ $konseling->psikolog->dataPsikolog->degree }}</li>
            <li style="">Praktik 
                {{ \Carbon\Carbon::parse($konseling->psikolog->dataPsikolog->start)->format('H:i') }} - 
                {{ \Carbon\Carbon::parse($konseling->psikolog->dataPsikolog->end)->format('H:i') }}
            </li>
        </ul>
        <ul style="float: left">
            <li style="font-weight: bolder">PASIEN</li>
            <li style="">
                {{ $konseling->client->name }}
            </li>
            <li style="">
                @if ($konseling->gender == 1)
                Laki-laki
                @else
                Perempuan
                @endif
            </li>
            <li style="">{{ $konseling->client->email }}</li>
            <li style="">{{ $konseling->address }}</li>
        </ul>
    </div>

    <div style="margin-top:2rem; position: relative; height: 7rem;">
        <ul style="float:inline-start">
            <li style="font-weight: bolder">CATATAN PSIKOLOG</li>
            <li style="text-align:justify; width:65%; line-height: 1.5rem">
            {{ $konseling->note }}
            </li>
        </ul>
        <ul style="float: right; text-align:right;">
            <li style="font-weight: bolder">JADWAL</li>
            <li style="">
                @if ($konseling->category == 1)
                Online/Daring
                @else
                Offline/Luring
                @endif
            </li>
            <li style="">{{ \Carbon\Carbon::parse($konseling->date)->formatLocalized('%A, %d %B %Y', 'id') }}</li>
            <li style="">{{ \Carbon\Carbon::parse($konseling->time)->format('H:i') }} - Selesai</li>
        </ul>
    </div>

    <div id="foot" style="width: 100%; height: fit-content; position: absolute; bottom:0; left:0;">
        <hr style="border:none; height: 1px; background-color: gray;">
        <p style="width: fit-content; font-weight: lighter; font-size: .8rem; text-align: center;">
            If you have any complaints, please contact us at <span style="color:#5271FF; font-weight: bold;">wellbeing@gmail.com</span>
        </p>
        
    </div>
</body>
</html>