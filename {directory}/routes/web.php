<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('blog.index');
})->name('blog.index');

Route::get('/post/{id}', function ($id) {
    if($id == 1){
        $post = [
            'title'=>'Learning Laravel',
            'content'=>'This is some content to display'

        ];
    }
    else{
        $post = [
            'title'=>'Something else',
            'content'=>'This is some content to display when it is something else'

        ];
    }
    return view('blog.post', ['post'=>$post]);
})->name('blog.post');

Route::get('/about', function () {
    return view('other.about');
})->name('other.about');

Route::group(['prefix'=>'admin'], function() {
    Route::get('', function () {
        return view('admin.index');
    })->name('admin.index');
    
    Route::get('/create', function () {
        return view('admin.create');
    })->name('admin.create');
    
    Route::get('/edit/{id}', function ($id) {
        if($id == 1){
            $post = [
                'title'=>'Learning Laravel',
                'content'=>'This is some content to display'
    
            ];
        }
        else{
            $post = [
                'title'=>'Something else',
                'content'=>'This is some content to display when it is something else'
    
            ];
        }
        return view('admin.edit', ['post'=>$post]);
    })->name('admin.edit');
    
    Route::post('/create', function (Illuminate\Http\Request $request, Validator $validator) {
        $validation = Validator::make($request->all(), [
            'title'=> 'required|min:5',
            'content'=> 'required'
        ]);
        if($validation->fails()){
            return redirect()->back()->withErrors($validation);
        }
        return redirect()->route('admin.index')->with('info', 'Post created with title '.$request->input('title'));
    })->name('admin.create');
    
    Route::post('/edit', function (Illuminate\Http\Request $request, Validator $validator) {
        $validation = Validator::make($request->all(), [
            'title'=> 'required|min:5',
            'content'=> 'required'
        ]);
        if($validation->fails()){
            return redirect()->back()->withErrors($validation);
        }
        return redirect()->route('admin.index')->with('info', 'Post edited to title '.$request->input('title'));
    })->name('admin.update');
});
