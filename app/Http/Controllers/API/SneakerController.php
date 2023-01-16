<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Sneaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SneakerController extends Controller
{
    public function index()
    {
        $sneaker = Sneaker::all();
        return response()->json(
            [
                'status' => true,
                'data' => $sneaker,
            ]
        );
    }


    public function show($id)
    {
        $sneaker = Sneaker::find($id);
        if (!$sneaker) {
            return response()->json(
                [
                    'status' => false,
                    'data' => 'data not found'
                ],
                404
            );
        }
        return response()->json(
            [
                'status' => true,
                'data' => $sneaker
            ]
        );
    }


    public function create(Request $request)
    {
        $data = $request->all();
        $rules = [
            'nama' => 'required',
            'brand' => 'required',
            'type' => 'required',
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $validator->errors()
                ],
                400
            );
        }

        $sneaker = Sneaker::create(
            [
                'nama' => $data['nama'],
                'brand' => $data['brand'],
                'type' => $data['type'],
            ]
        );

        return response()->json(
            [
                'status' => true,
                'data' => $sneaker
            ]
        );
    }


    public function update(Request $request, $id)
    {
        $sneaker = Sneaker::find($id);
        if (!$sneaker) {
            return response()->json(
                [
                    'status' => false,
                    'data' => 'data not found'
                ]
            );
        }

        $sneaker->Update($request->only('nama', 'brand', 'type'));
        return response()->json(
            [
                'status' => true,
                'data' => $sneaker
            ]
        );
    }


    public function delete($id)
    {
        $sneaker = Sneaker::find($id);

        if (!$sneaker) {
            return response()->json(
                [
                    'status' => false,
                    'data' => 'data not found'
                ]
            );
        }

        $sneaker->delete();
        return response()->json(
            [
                'status' => false,
                'data' => 'data succcessfully deleted'
            ]
        );
    }
}
