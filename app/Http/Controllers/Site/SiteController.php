<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SupportCenterRequest;
use App\Models\Article;
use App\Models\FAQ;
use App\Models\PhotoAlbum;
use App\Models\Slider;
use App\Models\SupportCenter;
use App\Models\Testimonial;
use App\Models\Video;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    use GeneralTrait;
    // index
    public function index()
    {
        $title = __('site.home');

        return view('site.index', compact('title'));
    }

    // get sliders
    public function getSliders()
    {
        if (Lang() == 'ar') {
            // Slider
            $sliders = Slider::withoutTrashed()
                ->whereStatus('on')
                ->orderBy('order', 'asc')
                ->where(function ($q) {
                    $q->where('language', 'ar')->orWhere('language', 'ar_en');
                })
                ->get();
        } else {
            //Slider
            $sliders = Slider::withoutTrashed()
                ->whereStatus('on')
                ->orderBy('order', 'asc')
                ->where(function ($q) {
                    $q->where('language', 'en')->orWhere('language', 'ar_en');
                })
                ->get();
        }

        return $sliders;
    }

    // get articles
    public function getArticles()
    {
        if (Lang() == 'ar') {
            // articles
            $articles = Article::withoutTrashed()
                ->whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'ar')->orWhere('language', 'ar_en');
                })
                ->take(4)
                ->get();
        } else {
            //articles
            $articles = Article::withoutTrashed()
                ->whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'en')->orWhere('language', 'ar_en');
                })
                ->take(4)
                ->get();
        }

        return $articles;
    }

    // get testimonials
    public function getTestimonials()
    {
        if (Lang() == 'ar') {
            // Testimonial
            $testimonials = Testimonial::withoutTrashed()
                ->whereStatus('on')
                ->orderByDesc(column: 'created_at')
                ->where(function ($q) {
                    $q->where('language', 'ar')->orWhere('language', 'ar_en');
                })
                ->get();
        } else {
            //Testimonial
            $testimonials = Testimonial::withoutTrashed()
                ->whereStatus('on')
                ->orderByDesc(column: 'created_at')
                ->where(function ($q) {
                    $q->where('language', 'en')->orWhere('language', 'ar_en');
                })
                ->get();
        }

        return $testimonials;
    }

    // videos
    public function videos()
    {
        $title = __('site.videos');

        if (Lang() == 'ar') {
            $videos = Video::withoutTrashed()
                ->orderByDesc('created_at')
                ->where('status', 'on')
                ->where(function ($q) {
                    $q->where('language', 'ar')->orWhere('language', 'ar_en');
                })
                ->paginate(6);
        } else {
            $videos = Video::withoutTrashed()
                ->orderByDesc('created_at')
                ->where('status', 'on')
                ->where(function ($q) {
                    $q->where('language', 'en')->orWhere('language', 'ar_en');
                })
                ->paginate(6);
        }
        return view('site.videos', compact('title', 'videos'));
    }

    //videos Paging
    public function videosPaging(Request $request)
    {
        if ($request->ajax()) {
            if (Lang() == 'ar') {
                $videos = Video::withoutTrashed()
                    ->orderByDesc('created_at')
                    ->where('status', 'on')
                    ->where(function ($q) {
                        $q->where('language', 'ar')->orWhere('language', 'ar_en');
                    })
                    ->paginate(6);
            } else {
                $videos = Video::withoutTrashed()
                    ->orderByDesc('created_at')
                    ->where('status', 'on')
                    ->where(function ($q) {
                        $q->where('language', 'en')->orWhere('language', 'ar_en');
                    })
                    ->paginate(6);
            }
            return view('site.videos-paging', compact('videos'))->render();
        }
    }

    // photo Albums
    public function photoAlbums()
    {
        $title = __('site.photo_albums');

        if (Lang() == 'ar') {
            $photoAlbums = PhotoAlbum::withoutTrashed()
                ->orderByDesc('created_at')
                ->where('status', 'on')
                ->where(function ($q) {
                    $q->where('language', 'ar')->orWhere('language', 'ar_en');
                })
                ->paginate(6);
        } else {
            $photoAlbums = PhotoAlbum::withoutTrashed()
                ->orderByDesc('created_at')
                ->where('status', 'on')
                ->where(function ($q) {
                    $q->where('language', 'en')->orWhere('language', 'ar_en');
                })
                ->paginate(6);
        }
        return view('site.photo-albums', compact('title', 'photoAlbums'));
    }

    //photo Albums Paging
    public function photoAlbumsPaging(Request $request)
    {
        if ($request->ajax()) {
            if (Lang() == 'ar') {
                $photoAlbums = PhotoAlbum::withoutTrashed()
                    ->orderByDesc('created_at')
                    ->where('status', 'on')
                    ->where(function ($q) {
                        $q->where('language', 'ar')->orWhere('language', 'ar_en');
                    })
                    ->paginate(6);
            } else {
                $photoAlbums = PhotoAlbum::withoutTrashed()
                    ->orderByDesc('created_at')
                    ->where('status', 'on')
                    ->where(function ($q) {
                        $q->where('language', 'en')->orWhere('language', 'ar_en');
                    })
                    ->paginate(6);
            }
            return view('site.photo-albums-paging', compact('photoAlbums'))->render();
        }
    }

    // articles
    public function articles()
    {
        $title = __('site.articles');

        if (Lang() == 'ar') {
            $articles = Article::withoutTrashed()
                ->orderByDesc('created_at')
                ->where('status', 'on')
                ->where(function ($q) {
                    $q->where('language', 'ar')->orWhere('language', 'ar_en');
                })
                ->paginate(perPage: 3);
        } else {
            $articles = Article::withoutTrashed()
                ->orderByDesc('created_at')
                ->where('status', 'on')
                ->where(function ($q) {
                    $q->where('language', 'en')->orWhere('language', 'ar_en');
                })
                ->paginate(3);
        }
        return view('site.blog.articles', compact('title', 'articles'));
    }

    //articles Paging
    public function articlesPaging(Request $request)
    {
        if ($request->ajax()) {
            if (Lang() == 'ar') {
                $articles = Article::withoutTrashed()
                    ->orderByDesc('created_at')
                    ->where('status', 'on')
                    ->where(function ($q) {
                        $q->where('language', 'ar')->orWhere('language', 'ar_en');
                    })
                    ->paginate(perPage: 3);
            } else {
                $articles = Article::withoutTrashed()
                    ->orderByDesc('created_at')
                    ->where('status', 'on')
                    ->where(function ($q) {
                        $q->where('language', 'en')->orWhere('language', 'ar_en');
                    })
                    ->paginate(3);
            }
            return view('site.blog.articles-paging', compact('articles'))->render();
        }
    }

    // article
    public function article($val = null)
    {
        if (!$val) {
            return redirect()->route('index');
        }

        if (Lang() == 'ar') {
            $article = Article::withoutTrashed()->where('title_ar_slug', $val)->first();
        } else {
            $article = Article::withoutTrashed()->where('title_en_slug', $val)->first();
        }

        if (!$article) {
            return redirect()->route('index');
        }

        return view('site.blog.article', compact('article'));
    }

    // faqs
    public function faq()
    {
        $title = __('site.faq');

        if (Lang() == 'ar') {
            // faqs
            $faqs = FAQ::withoutTrashed()
                ->whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'ar')->orWhere('language', 'ar_en');
                })
                ->take(6)
                ->get();
        } else {
            //faqs
            $faqs = FAQ::withoutTrashed()
                ->whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'en')->orWhere('language', 'ar_en');
                })
                ->take(6)
                ->get();
        }

        return view('site.faq', compact('title', 'faqs'));
    }

    //send contact
    public function sendContact(SupportCenterRequest $request)
    {
        if (setting()->disabled_forms_button == 'on') {
            $contact = SupportCenter::create([
                'name' => $request->name,
                'mobile' => $request->mobile,
                'email' => $request->email,
                'title' => $request->title,
                'message' => $request->message,
            ]);

            if ($contact) {
                return $this->returnSuccessMessage(__('site.contact_success'));
            } else {
                return $this->returnError(__('site.contact_failed'), 500);
            }
        } else {
            return $this->returnError(__('site.contact_failed'), 500);
        }
    }

    // reload Captcha
    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }
}
