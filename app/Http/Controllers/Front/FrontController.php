<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Testimonial;
use Str;
class FrontController extends Controller
{
    public function index()
    {
       $title = 'Home';
       $tests = Testimonial::limit(5)->get();
       $news = Post::latest()->limit(3)->get();
       return view('front.index',compact('title','tests','news'));
    }

    public function about()
    {
      $title = 'About';
       return view('front.about',compact('title'));
    }

    public function how_it_works()
    {
       $title = 'How it works';
       return view('front.how_it_works' ,compact('title'));
    }

    public function news()
    {
      $title = 'News';
      $news = Post::latest()->paginate(9);
       return view('front.blog',compact('title','news'));
    }

    public function contact()
    {
      $title = 'Contact';
       return view('front.contact',compact('title'));
    }

    public function terms_condition()
    {
      $title = 'Terms';
       return view('front.terms',compact('title'));
    }

    public function privacy_policy()
    {
      $title = 'Privacy policy';
       return view('front.privacy_policy',compact('title'));
    }

    public function faq()
    {
      $title = 'Faq';
      $faqs = Faq::latest()->get();
       return view('front.faq',compact('faqs','title'));
    }
    public function single_news($id)
    {

      $news = Post::latest()->where('id','!=',$id)->limit(5)->get();

      $post = Post::findOrFail($id);
     
      $title = $post->title;

      return view ('front.blog-details',compact('post','title','news'));
    }
}
