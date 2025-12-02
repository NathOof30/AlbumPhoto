<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\alert;

class Main extends Controller
{

    public function index()
    {












        return view('index');
    }

    public function LesAlbums()
    {
        $lesAlbums = Album::all();







        return view('albums', ['lesAlbums' => $lesAlbums]);
    }

    public function detailAlbum($id, Request $request)
    {
        $album = Album::findOrFail($id);

        // Début
        $query = Photo::where('album_id', $id);

        // selection par tags
        if ($request->filled('tag_id')) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->where('tags.id', $request->input('tag_id'));
            });
        }

        // selection par notes
        if ($request->filled('note')) {
            $query->where('note', $request->input('note'));
        }

        // selection par recherche
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('titre', 'LIKE', "%{$search}%");
        }

        // fin 
        $photos = $query->get();

        // pour afficher dans le form
        $tags = Tag::orderBy('nom')->get();
        $notes = Photo::select('note')->distinct()->orderBy('note')->pluck('note');



        return view('album', [
            'album' => $album,
            'photos' => $photos,
            'tags' => $tags,
            'notes' => $notes,
        ]);
    }

    public function lesPhotos() {
        $photos = Photo::all();

        // selection par notes
        if ($request->filled('note')) {
            $query->where('note', $request->input('note'));
        }

        // selection par recherche
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('titre', 'LIKE', "%{$search}%");
        }

        // fin 
        $photos = $query->get();

        return view('photos', ['photos' => $photos]);
    }

    public function lesTags()
    {
        $tags = DB::SELECT("SELECT * FROM tags ORDER BY id");











        return view('tags', ['tags' => $tags]);
    }


    public function detailTag($id)
    {
        $tag = Tag::with('photos')->find($id);

        return view('tag', ['tag' => $tag]);
    }



    public function ajoutPhoto()
    {












        return view('ajoutPhoto');
    }
    public function traitementFormulaire(Request $request) {
    // --- 1. Validation des données ---
    $request->validate([
        'titre'    => 'required|string|max:255',
        'url'      => 'required|url', // On garde la validation pour 'url'
        'note'     => 'required|integer|min:1|max:5',
        'album_id' => 'required|integer|exists:albums,id',
    ]);
    // on vajuste garder l'url pour l'instant car ça fais trop bugger mon code les images
        return view('photos');
    }
    public function monCompte()
    {
        return view('compte');
    }
}
?>