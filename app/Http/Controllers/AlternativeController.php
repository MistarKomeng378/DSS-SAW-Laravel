<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\AlternativeScore;
use App\Models\CriteriaWeight;
use App\Models\CriteriaRating;
use Illuminate\Http\Request;

class AlternativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scores = AlternativeScore::select(
            'alternativescores.id as id',
            'alternatives.id as ida',
            'criteriaweights.id as idw',
            'criteriaratings.id as idr',
            'alternatives.name as name',
            'criteriaweights.name as criteria',
            'criteriaratings.rating as rating',
            'criteriaratings.description as description')
        ->leftJoin('alternatives', 'alternatives.id', '=', 'alternativescores.alternative_id')
        ->leftJoin('criteriaweights', 'criteriaweights.id', '=', 'alternativescores.criteria_id')
        ->leftJoin('criteriaratings', 'criteriaratings.id', '=', 'alternativescores.rating_id')
        ->get();

        $alternatives = Alternative::get();

        $criteriaweights = CriteriaWeight::get();
        return view('alternative.index', compact('scores', 'alternatives', 'criteriaweights'))->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $criteriaweights = CriteriaWeight::get();
        $criteriaratings = CriteriaRating::get();
        return view('alternative.create', compact('criteriaweights', 'criteriaratings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nik' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jns_kelamin' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'periode' => 'required',
        ]);

        // Save the alternative
        $alt = new Alternative;
        $alt->name = $request->name;
        $alt->nik = $request->nik;
        $alt->tempat_lahir = $request->tempat_lahir;
        $alt->tgl_lahir = $request->tgl_lahir;
        $alt->jns_kelamin = $request->jns_kelamin;
        $alt->telp = $request->telp;
        $alt->alamat = $request->alamat;
        $alt->rt = $request->rt;
        $alt->rw = $request->rw;
        $alt->periode = $request->periode;
        $alt->save();

        // Save the score
        $criteriaweight = CriteriaWeight::get();
        foreach ($criteriaweight as $cw) {
            $score = new AlternativeScore();
            $score->alternative_id = $alt->id;
            $score->criteria_id = $cw->id;
            $score->rating_id = $request->input('criteria')[$cw->id];
            $score->save();
        }

        return redirect()->route('alternatives.index')
            ->with('success', 'Data Warga Berhasil Disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alternative  $alternative
     * @return \Illuminate\Http\Response
     */
    public function show(Alternative $alternative)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alternative  $alternative
     * @return \Illuminate\Http\Response
     */
    public function edit(Alternative $alternative)
    {
        $criteriaweights = CriteriaWeight::get();
        $criteriaratings = CriteriaRating::get();
        $alternativescores = AlternativeScore::where('alternative_id', $alternative->id)->get();
        return view('alternative.edit', compact('alternative', 'alternativescores', 'criteriaweights', 'criteriaratings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alternative  $alternative
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alternative $alternative)
    {
        $request->validate([
            'name' => 'required',
            // 'nik' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jns_kelamin' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'periode' => 'required',
        ]);

        $alternative->update($request->all());

        // Save the score
        $scores = AlternativeScore::where('alternative_id', $alternative->id)->get();
        $criteriaweight = CriteriaWeight::get();
        foreach ($criteriaweight as $key => $cw) {
            $scores[$key]->rating_id = $request->input('criteria')[$cw->id];
            $scores[$key]->save();
        }

        return redirect()->route('alternatives.index')
            ->with('success', 'Data Warga Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alternative  $alternative
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alternative $alternative)
    {
        $scores = AlternativeScore::where('alternative_id', $alternative->id)->delete();
        $alternative->delete();

        return redirect()->route('alternatives.index')
            ->with('success', 'Data Warga Berhasil dihapus');
    }
}
