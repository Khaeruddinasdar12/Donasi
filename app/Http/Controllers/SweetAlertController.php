<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
class SweetAlertController extends Controller
{
	public function alert($AlertType){
		switch ($AlertType) {
			case 'success':
			Alert::success('this is success alert');
			return redirect('/');
			break;
			case 'info':
			Alert::info('this is info alert');
			return redirect('/');
			break;
			case 'warning':
			Alert::warning('this is warning alert');
			return redirect('/');
			break;
			case 'error':
			Alert::error('this is error alert');
			return redirect('/');
			break;
			case 'message':
			Alert::message('this is message alert');
			return redirect('/');
			break;

			default:
			return redirect('/');
			break;
		}
	}
}
