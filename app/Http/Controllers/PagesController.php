<?php

namespace App\Http\Controllers;

use App\Mail\ContactEnquiry;
use App\Mail\FeedBackEnquiry;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    protected $page_slug = "";

    public function home()
    {
        $this->page_slug = "home";
        $student = User::where('role', 'student')->count();
        $centerhead = User::where('role', 'center')->count();

        return view('pages.home')->with([
            'page_slug' => $this->page_slug,
            'student' => $student,
            'centerhead' => $centerhead
        ]);
    }

    public function about()
    {
        $this->page_slug = "about";

        return view('pages.about')->with([
            'page_slug' => $this->page_slug,
        ]);
    }

    public function contact()
    {
        $this->page_slug = "contact_us";
        return view('pages.contact')->with([
            'page_slug' => $this->page_slug,
        ]);
    }

    public function postContact(Request $request)
    {
        Mail::to(env('FROM_MAIL', 'admin@clarity.com'))->send(new ContactEnquiry($request->all()));
        return redirect('/contact_us');
    }

    public function courses()
    {
        $this->page_slug = "courses";

        return view('pages.courses')->with([
            'page_slug' => $this->page_slug,
        ]);
    }

    public function feedback()
    {
        $this->page_slug = "feedback";

        return view('pages.feedback')->with([
            'page_slug' => $this->page_slug,
        ]);
    }

    public function postFeedback(Request $request)
    {
        Mail::to(env('FROM_MAIL', 'admin@clarity.com'))->send(new FeedBackEnquiry($request->all()));
        return redirect('/feedback');
    }

    public function support()
    {
        $this->page_slug = "support";

        return view('pages.support')->with([
            'page_slug' => $this->page_slug,
        ]);
    }

    public function faq()
    {
        $this->page_slug = "faq";

        return view('pages.faq')->with([
            'page_slug' => $this->page_slug,
        ]);
    }

}
