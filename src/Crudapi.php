<?php

namespace Jwalbeli\Crudapi;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Crudapi extends Controller
{
    public function index()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');

        return $response;
    }

    public function store(Request $request)
    {
        $title = $request->title?:'Foo';
        $body = $request->body?:'Loren ipsum Loren ipsum Loren ipsum';
        $userId = $request->userId?:1;

        $response = Http::post('https://jsonplaceholder.typicode.com/posts', [
            'title' => $title,
            'body' => $body,
            'userId' => $userId,
        ]);

        return $response;
    }

    public function update(Request $request)
    {
        $id = $request->id?:1;
        $title = $request->title?:'Foo Foo';
        $body = $request->body?:'Loren ipsum test';
        $userId = $request->userId?:1;

        $response = Http::patch('https://jsonplaceholder.typicode.com/posts/'.$id, [
            'title' => $title,
            'body' => $body,
            'userId' => $userId,
        ]);

        return $response;
    }

    public function destroy($id)
    {
        $id = $id?:0;

        $response = Http::delete('https://jsonplaceholder.typicode.com/posts/'.$id);

        if($response->successful())
            return response()->json(['status' => 200, 'message' => 'Data berhasil dihapus']);
        else
            return response()->json(['status' => 400, 'message' => 'Data gagal dihapus']);
    }
}
