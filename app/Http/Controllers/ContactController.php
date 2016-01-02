<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Laracasts\Flash\Flash;

class ContactController extends Controller
{
	public function store(Request $request)
	{
		$data = $request->only('name', 'email', 'subject');
		$data['messageLines'] = explode("\n", $request->get('message'));

		Mail::send('emails.contact', $data, function ($message) use ($data) {
			$message->subject('Blog Contact Form: '.$data['name'])
				->to(config('blog.contact_email'))
				->replyTo($data['email']);
		});

		Flash::success('Thank you! We will answer you during 24 hours');
		return back();
	}
}
