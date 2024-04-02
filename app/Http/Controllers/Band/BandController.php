<?php

namespace App\Http\Controllers\Band;

use App\Http\Controllers\Controller;
use App\Models\Band;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BandController extends Controller
{
    public function create()
    {

        $genres = Genre::get();

        return view('bands.create', compact('genres'));
    }

    public function store()
    {

        // dd(request('genres'));

        // validasi
        if (request()) {

            request()->validate([
                'name' => 'required',
                'genres' => 'required|array'
            ]);

            $validateImage = request()->validate([
                'thumbnail' => 'nullable|image|mimes:jpeg,png,gif'
            ]);

            if (request()->hasFile('thumbnail') && request()->file('thumbnail')->isValid()) {

                $thumbnailPath = request()->file('thumbnail')->store('images/band');
            } else {

                $thumbnailPath = '';
            }

            $band = Band::create([
                'name' => request('name'),
                'slug' => Str::slug(request('name')),
                'thumbnail' => $thumbnailPath
            ]);

            $band->genres()->sync(request('genres'));

            return back()->with('success','Band was created');
        }
    }
}
