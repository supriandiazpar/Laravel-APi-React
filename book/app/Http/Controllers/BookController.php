<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Book;
use App\Http\Resources\BookResource;
use Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Book::all(); // = select * From book
        $bookresource = BookResource::collection($book);

       return $this-> sendResponse($bookresource, "Succesfull get book"); //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

       $validator =  Validator::make($input, [
            "name" => "required|min:4",
            "description" => "required|max:300|min:5",
            "price" => "required"
        ]);

        if($validator -> fails()){
            return $this->sendError("validation error", $validator->errors());
        }

        $book = Book::create($input);
        return $this->sendResponse(new BookResource($book), "Books Create Succes");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        return $this->sendResponse(new BookResource($book), "Books Get Succes");
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
        $input = $request->all();

        $validator =  Validator::make($input, [
             "name" => "required|min:4",
             "description" => "required|max:300|min:5",
             "price" => "required"
         ]);
 
         if($validator -> fails()){
             return $this->sendError("validation error", $validator->errors());
         }

         $book = Book::find($id);

         $book->name = $input["name"];
         $book->description = $input["description"];
         $book->price = $input["price"];
         $book->save();
         return $this->sendResponse(new BookResource($book), "Books Update Succes");
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book-delete();
        return $this->sendResponse([], "Sukses Hapus Produk");

    }
}
