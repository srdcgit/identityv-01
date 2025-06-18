<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Page;
use App\Models\Plan;
use App\Models\Service;
use App\Models\Frontend;
use App\Models\Language;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Models\SupportTicket;
use App\Models\GeneralSetting;
use App\Models\SupportMessage;
use App\Models\AdminNotification;
use App\Models\Category;
use App\Models\Clientele;
use App\Models\Event;
use App\Models\EventTitle;
use App\Models\Portfolio;
use App\Models\Subcategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use App\Models\Stream;

class SiteController extends Controller
{
    public function index(){
        $template = @$_GET['template'];
        if ($template) {
            $general = gs();
            $general->active_template = $template;
            Cache::put('GeneralSetting', $general);
        }

        $pageTitle = 'Home';
        $sections = Page::where('tempname',$this->activeTemplate)->where('slug','/')->first();
        return view($this->activeTemplate . 'home', compact('pageTitle','sections'));
    }
    public function pages($slug)
    {
        $page = Page::where('tempname',$this->activeTemplate)->where('slug',$slug)->firstOrFail();
        $pageTitle = $page->name;
        $sections = $page->secs;
        return view($this->activeTemplate . 'pages', compact('pageTitle','sections'));
    }


    public function contact()
    {
        $pageTitle = "Contact Us";
        return view($this->activeTemplate . 'contact',compact('pageTitle'));
    }

    public function getLandingPage(){
        $pageTitle = "FinBiz";
        return view('landing', compact('pageTitle'));
    }
    public function contactSubmit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required|string|max:255',
            'message' => 'required',
        ]);

        if(!verifyCaptcha()){
            $notify[] = ['error','Invalid captcha provided'];
            return back()->withNotify($notify);
        }

        $request->session()->regenerateToken();

        $random = getNumber();

        $ticket = new SupportTicket();
        $ticket->user_id = auth()->id() ?? 0;
        $ticket->name = $request->name;
        $ticket->email = $request->email;
        $ticket->priority = 2;


        $ticket->ticket = $random;
        $ticket->subject = $request->subject;
        $ticket->last_reply = Carbon::now();
        $ticket->status = 0;
        $ticket->save();

        $adminNotification = new AdminNotification();
        $adminNotification->user_id = auth()->user() ? auth()->user()->id : 0;
        $adminNotification->title = 'A new support ticket has opened ';
        $adminNotification->click_url = urlPath('admin.ticket.view',$ticket->id);
        $adminNotification->save();

        $message = new SupportMessage();
        $message->support_ticket_id = $ticket->id;
        $message->message = $request->message;
        $message->save();

        $notify[] = ['success', 'Ticket created successfully!'];

        return to_route('ticket.view', [$ticket->ticket])->withNotify($notify);
    }

    public function policyPages($slug,$id)
    {
        $policy = Frontend::where('id',$id)->where('data_keys','policy_pages.element')->firstOrFail();
        $pageTitle = $policy->data_values->title;
        return view($this->activeTemplate.'policy',compact('policy','pageTitle'));
    }

    public function changeLanguage($lang = null)
    {
        $language = Language::where('code', $lang)->first();
        if (!$language) $lang = 'en';
        session()->put('lang', $lang);
        return back();
    }

    public function blog(){
        $pageTitle = 'Blog';
        $sections = Page::where('tempname',$this->activeTemplate)->where('slug','blog')->first();
        $blogs = Frontend::where('data_keys','blog.element')->orderBy('id','desc')->paginate(getPaginate());
        return view($this->activeTemplate.'blog',compact('sections','blogs','pageTitle'));
    }

    public function services(){
        $pageTitle = 'Services';
        $services = Service::where('status',1)->orderBy('created_at','desc')->paginate(getPaginate());
        return view($this->activeTemplate.'services.service',compact('services','pageTitle'));
    }

    public function fetchPortfolio(){
        $pageTitle = 'Portfolios';
        $portfolios = Portfolio::where('status',1)->latest()->paginate(getPaginate());
        return view($this->activeTemplate.'portfolios.portfolio',compact('portfolios','pageTitle'));
    }

    public function serviceDetails($slug,$id){
        $service = Service::where('id',$id)->firstOrFail();
        $pageTitle = "Service Details";
        $latests = Service::inRandomOrder()->limit(5)->get();
        return view($this->activeTemplate.'services.service_details',compact('latests','service','pageTitle'));
    }

    public function portfolioDetails($slug,$id){
        $portfolio = Portfolio::where('id',$id)->firstOrFail();
        $pageTitle = "Portfolio Details";
        $latests = Portfolio::inRandomOrder()->limit(5)->get();
        return view($this->activeTemplate.'portfolios.portfolio_details',compact('latests','portfolio','pageTitle'));
    }

    public function blogDetails($slug,$id){
        $blog = Frontend::where('id',$id)->where('data_keys','blog.element')->firstOrFail();
        $pageTitle = "Blog Details";
        $latests = Frontend::where('data_keys','blog.element')->orderBy('id','desc')->limit(5)->get();
        return view($this->activeTemplate.'blog_details',compact('latests','blog','pageTitle'));
    }

    // plan
    public function plan(){
        $pageTitle = 'Plans';
        $plans = Plan::where('status',1)->orderBy('created_at','desc')->paginate(getPaginate());
        return view($this->activeTemplate.'plan.plan',compact('pageTitle','plans'));
    }

    public function subscribe(Request $request){

        $request->validate([
            'email'=>'required|unique:subscribers',
        ]);

        $subscribe=new Subscriber();
        $subscribe->email=$request->email;
        $subscribe->save();

        $notify[] = ['success','You have successfully subscribed to the Newsletter'];
        return back()->withNotify($notify);

    }


    public function cookieAccept(){
        $general = gs();
        Cookie::queue('gdpr_cookie',$general->site_name , 43200);
        return back();
    }

    public function cookiePolicy(){
        $pageTitle = 'Cookie Policy';
        $cookie = Frontend::where('data_keys','cookie.data')->first();
        return view($this->activeTemplate.'cookie',compact('pageTitle','cookie'));
    }

    public function placeholderImage($size = null){
        $imgWidth = explode('x',$size)[0];
        $imgHeight = explode('x',$size)[1];
        $text = $imgWidth . '×' . $imgHeight;
        $fontFile = realpath('assets/font') . DIRECTORY_SEPARATOR . 'RobotoMono-Regular.ttf';
        $fontSize = round(($imgWidth - 50) / 8);
        if ($fontSize <= 9) {
            $fontSize = 9;
        }
        if($imgHeight < 100 && $fontSize > 30){
            $fontSize = 30;
        }

        $image     = imagecreatetruecolor($imgWidth, $imgHeight);
        $colorFill = imagecolorallocate($image, 255, 255, 255);
        $bgFill    = imagecolorallocate($image, 28, 35, 47);
        imagefill($image, 0, 0, $bgFill);
        $textBox = imagettfbbox($fontSize, 0, $fontFile, $text);
        $textWidth  = abs($textBox[4] - $textBox[0]);
        $textHeight = abs($textBox[5] - $textBox[1]);
        $textX      = ($imgWidth - $textWidth) / 2;
        $textY      = ($imgHeight + $textHeight) / 2;
        header('Content-Type: image/jpeg');
        imagettftext($image, $fontSize, 0, $textX, $textY, $colorFill, $fontFile, $text);
        imagejpeg($image);
        imagedestroy($image);
    }


    public function serviceFilter(Request $request){
        $query = Service::where('status',1);

        if ($request->searchValue) {

            $search  = $request->searchValue;
             $query->where(function ($query) use ($search) {
                $query->where('title', "LIKE", "%$search%");
            });
        }

        $services = $query->latest()->paginate(getPaginate());
        $view = view($this->activeTemplate . 'components.service', compact('services'))->render();
        return response()->json([
            'html' => $view
        ]);

    }
    public function portfolioFilter(Request $request){
        $query = Portfolio::where('status',1);

        if ($request->searchValue) {

            $search  = $request->searchValue;
             $query->where(function ($query) use ($search) {
                $query->where('title', "LIKE", "%$search%")
                      ->orWhere('sub_title', "LIKE", "%$search%");
            });
        }

        $portfolios = $query->latest()->paginate(getPaginate());
        $view = view($this->activeTemplate . 'components.portfolio', compact('portfolios'))->render();
        return response()->json([
            'html' => $view
        ]);


    }
    public function about(){
        $pageTitle = 'About Us';
        return view('web.about', compact('pageTitle'));
    }
    public function carrerLibrary(){
        $pageTitle = 'Carrer Library';
        $carrers = Category::all();
        return view('web.carrer_library', compact('pageTitle','carrers'));
    }
    public function psychometricTest(){
        $pageTitle = 'Psychometric Test';
        return view('web.psychometric', compact('pageTitle'));
    }
    public function events(){
        $pageTitle = 'Our Events';
        $events = EventTitle::with('events')->get();
        return view('web.events', compact('pageTitle', 'events'));
    }
    public function viewEvents($id){
        $pageTitle = 'Our Events';
        $event = Event::where('title_id', $id)->get();
        return view('web.view_event', compact('pageTitle','event'));
    }
    public function service() {
        $pageTitle = 'Services';
        return view('web.services', compact('pageTitle'));
    }
    public function clientele(){
        $pageTitle = 'Clientele';
        $clientele = Clientele::orderBy('created_at', 'desc')->get()->groupBy('title');
        return view('web.clientele', compact('pageTitle','clientele'));
    }
    public function viewCarrerLibrary($id){
        $categories = Category::find($id);
        $pageTitle = $categories->title;
        $view_carrer = Subcategory::where('category_id', $id)->get();
        return view('web.view_carrer_library', compact('pageTitle', 'view_carrer'));
    }
    public function viewdetails($id){
        $view_details = Subcategory::find($id);
        $pageTitle = $view_details->title;
        return view('web.view_carrer_details', compact('pageTitle','view_details'));
    }
    public function csr(){
        $pageTitle = 'CSR';
        return view('web.csr', compact('pageTitle'));
    }
}
