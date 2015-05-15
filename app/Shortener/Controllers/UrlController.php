<?php namespace Shortener\Controllers;

use Shortener\Models\Url;
use App\Http\Requests;
use Shortener\Repository\UrlRepositoryInterface;
use Shortener\Services\BarcodeServiceInterface;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Input;
use Session;
use Validator;
use App;
use Illuminate\Support\Facades\URL as UrlFacade;

class UrlController extends Controller
{

    /**
     * @var \Shortener\Repository\UrlRepositoryInterface
     */
    private $urls;

    /**
     * @var \Shortener\Services\BarcodeServiceInterface
     */
    private $barcode;

    public function __construct(UrlRepositoryInterface $urls, BarcodeServiceInterface $barcode)
    {
        $this->urls = $urls;
        $this->barcode = $barcode;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('urls.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), ['original_url' => 'required|url'],
            $messages = [
                'required' => 'Please Provide a URL to shorten.',
                'url' => 'Please provide a valid URL, e.g. https://www.google.com/',
                'active_url' => 'Please provide an active URL.'
            ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors());
        }

        $url = $this->urls->create($request->all());

        Session::flash('message', 'URL successfully shortened.');

        return redirect()->route('urls.show', [$url->shortened_url]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Url $url
     * @return Response
     */
    public function show(Url $url)
    {
        $full_shortened_url = UrlFacade::to('/') . "/" . $url->shortened_url;
        $url_qr = $this->barcode->generateQrCode($full_shortened_url);
        return view('urls.show', compact('url', 'full_shortened_url', 'url_qr'));
    }

    /**
     * Retrieve stored full url and redirect.
     *
     * @param  string $slug
     * @return Response
     */
    public function get($slug)
    {
        // Find the URL record using the shortened URL slug
        $redirectUrl = $this->urls->findOneBy("shortened_url", $slug);
        if ($redirectUrl) {
            // Record a new visit for analytics
            $this->urls->update($redirectUrl->id, ['visits' => $redirectUrl->visits + 1]);
            return redirect($redirectUrl->original_url, 301);
        }
        App::abort(404);
    }
}
