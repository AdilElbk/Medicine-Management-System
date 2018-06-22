<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/**
*
*
*
*@return \Illuminate\Http\Response
*/
/**
*
*
*@param \Illuminate\Http\Request $request
*@return \Illuminate\Http\Response
*
*/


class MedicinesController extends Controller
{
    //classe 
    public function create()
    {
        return view('create');
    }


    public function store(Request $request)
    {
    	
    	$medicine = new \App\Medicine;
    	
    	$medicine->nom_m=$request->get('nom_m');
    	$medicine->ppa=$request->get('ppa');
    	$medicine->qte=$request->get('qte');
    	$date=date_create($request->get('dateExp'));
    	$format=date_format($date,"Y-m-d");
    	$medicine->date=strtotime($format);
    	$medicine->dosage=$request->get('dosage');
    	$medicine->save();
    	return redirect('medicines')->with('success','Medicament est ajouté avec succès ! ');
    }
    public function index()
    {
    	$medicines=\App\Medicine::all();
    	return view('index', compact('medicines'));
    }
}

