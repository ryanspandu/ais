<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data = [];

        $data[0]['id'] = 1;
        $data[0]['barcode'] = 1111;
        $data[0]['product_name'] = 'APPLE';
        $data[0]['price'] = 1000;
        $data[0]['status'] = 'READY';

        $data[1]['id'] = 2;
        $data[1]['barcode'] = 1111;
        $data[1]['product_name'] = 'APPLE';
        $data[1]['price'] = 2000;
        $data[1]['status'] = 'DELIVERED';

        $data[2]['id'] = 3;
        $data[2]['barcode'] = 1111;
        $data[2]['product_name'] = 'APPLE';
        $data[2]['price'] = 3000;
        $data[2]['status'] = 'SENT';

        $data[3]['id'] = 4;
        $data[3]['barcode'] = 1111;
        $data[3]['product_name'] = 'APPLE';
        $data[3]['price'] = 1000;
        $data[3]['status'] = 'ONHOLD';

        $data[4]['id'] = 5;
        $data[4]['barcode'] = 1111;
        $data[4]['product_name'] = 'APPLE';
        $data[4]['price'] = 2000;
        $data[4]['status'] = 'PACKING';

        $data[5]['id'] = 6;
        $data[5]['barcode'] = 1111;
        $data[5]['product_name'] = 'APPLE';
        $data[5]['price'] = 4000;
        $data[5]['status'] = 'SENT';

        $data[6]['id'] = 7;
        $data[6]['barcode'] = 1111;
        $data[6]['product_name'] = 'APPLE';
        $data[6]['price'] = 5000;
        $data[6]['status'] = 'SENT';

        $data[7]['id'] = 8;
        $data[7]['barcode'] = 1122;
        $data[7]['product_name'] = 'PINAPPLE';
        $data[7]['price'] = 1000;
        $data[7]['status'] = 'READY';

        $data[8]['id'] = 9;
        $data[8]['barcode'] = 1122;
        $data[8]['product_name'] = 'PINAPPLE';
        $data[8]['price'] = 1000;
        $data[8]['status'] = 'DELIVERED';

        $data[9]['id'] = 10;
        $data[9]['barcode'] = 1122;
        $data[9]['product_name'] = 'PINAPPLE';
        $data[9]['price'] = 1000;
        $data[9]['status'] = 'PACKING';

        $data[10]['id'] = 11;
        $data[10]['barcode'] = 1122;
        $data[10]['product_name'] = 'PINAPPLE';
        $data[10]['price'] = 1000;
        $data[10]['status'] = 'DELIVERED';


        $question2 = [1,-1,3,-4,5,-2,7,4,2];


        // dd($data);

        return view('home')
                ->with('data', $data)
                ->with('data2', $question2);
    }

    public function cv(){
        $filePath = public_path("resume.pdf");
    	$headers = ['Content-Type: application/pdf'];
    	$fileName = 'Resume - Ryan Pandu Prasetya.pdf';

    	return response()->download($filePath, $fileName, $headers);
    }
}
