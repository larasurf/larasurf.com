<?php

namespace App\Http\Controllers;

use App\Models\CustomProjectSubmission;
use Illuminate\Http\Request;

class CustomProjectsController extends Controller
{
    public function view()
    {
        return view('custom-projects');
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'budget' => 'required|string|in:less-than-5000,5000-10000,10000-25000,25000-50000,50000-100000,more-than-100000',
            'deadline' => 'required|string|date|after:today',
            'description' => 'required|string|min:100|max:10000',
            recaptchaFieldName() => recaptchaRuleName(),
        ], [
            'name.required' => 'Your name is required',
            'email.required' => 'Your email address is required',
            'budget.required' => 'An estimated budget is required',
            'deadline.required' => 'When you need this project completed is required',
            'description.required' => 'A project description is required',
            'description.min' => 'The project description should be at least 100 characters',
        ]);

        $submission = new CustomProjectSubmission($data);
        $submission->saveOrFail();

        if (!app()->isLocal()) {
            \Notification::route('slack', config('app.slack-notification-webhook-url'))
                ->notify(new \App\Notifications\CustomProjectSubmission($submission));
        }

        return view('custom-projects', [
            'is_submitted' => true,
        ]);
    }
}
