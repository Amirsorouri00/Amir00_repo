<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

use App\Task;
use Illuminate\Http\Request;



Route::group(['middleware' => ['web']], function () {
    /**
     * Show Task Dashboard
     */

    Route::get('/usersss',function() {
    return view('userlogin', [
            'tasks' => Task::orderBy('created_at', 'asc')->get()]);
    });

    /*Route::get('/usersss',function() {
    return \View::make('myuser')
    });*/


    Route::get('/', function () {
        return view('tasks', [
            'tasks' => Task::orderBy('created_at', 'asc')->get()]);
    });

    /**
     * Add New Task
     */
    Route::post('/user', function (Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $task = new Task;
        $task->name = $request->name;
        $task->pass = $request->pass;
        $task->save();

        return redirect('/');
    });

    /*Route::post('/login', function(Request $request){

        $users = Task::All();
        $myUser = Task::where('name', '=', $request->Login_name)->get();
        if($myUser->pass == $request->Pass){
            return redirect('/usersss');
        }
        else{
            return "wrong Password";
        }
        //return Task::where('name', '=', $request->Login_name)->get();
    });*/

    Route::post('/login', function(Request $request){

    $myUser = Task::where('name', '=', $request->Login_name)->get();
    if(Task::where('name', '=', $request->Login_name)->where('pass',$request->Pass)->count() == 1){
        //return redirect('/usersss');
        return view('userlogin', [
            'tasks' => Task::orderBy('created_at', 'asc')->get()]);
    }
    else {
        return redirect('/')
                ->withInput([])
                ->withErrors("user or pass is wrong");
    }  
    });


    /**
     * Delete Task
     */
    Route::delete('/task/{id}', function ($id) {
        Task::findOrFail($id)->delete();

        return redirect('/');
    });
});
