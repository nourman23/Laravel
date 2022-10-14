<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\UploadedFile;



class BooksController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $books = Books::all();

        return view('index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // protected $fillable = ['book_title', 'book_description', 'book_auther'];

    public function store(Request $request)
    {

        $request->validate(
            [
                'book_title' => 'required',
                'book_description' => 'required',
                'book_auther' => 'required',
                'book_image' => 'required|mimes:png,jpg,jpeg|max:5048'
            ]
        );

        $newImageName = time() . '-' . $request->book_title . '.' . $request->book_image->extension();

        //store the image :

        $request->book_image->move(public_path('images'), $newImageName);

        //new book information
        $book = Books::create([
            'book_title' => $request->input('book_title'),
            'book_description' => $request->input('book_description'),
            'book_auther' => $request->input('book_auther'),
            'book_image' => $newImageName,
        ]);
        // $book = new Books();

        // $book->book_title = $request->book_title;
        // $book->book_description = $request->book_description;
        // $book->book_auther = $request->book_auther;
        // $book->book_image = $newImageName;


        $book->save();
        return redirect('/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $findBook = Books::find($id);
        // dd($findBook);
        return view('update_books', ['request' => $findBook, 'id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Books::find($id);
        $book->delete();
        return redirect('/index');
    }

    public function updateBook(Request $request, $id)
    {
        # code...
        $book = Books::find($id);
        $book->book_title = $request->book_title;
        $book->book_description = $request->book_description;
        $book->book_auther = $request->book_auther;
        $book->book_image = $request->book_image;
        $book->save();
        return redirect('/index');
    }

    public function findBook(Request $request)
    {
        $book = Books::where('book_title', 'like', '%' . $request->search . '%')->get();

        // dd($book);
        return view('viewBook', ['books' => $book]);
    }
}