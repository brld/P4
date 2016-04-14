<?php

Route::get('/', function () {
    return view('welcome');
});

//============== [ADD ITEMS] ==============\\
//**************    BOOKS    **************\\
Route::get('/books/add', 'BooksController@getAdd');
Route::post('/books/add', 'BooksController@postAdd');
//**************  EQUIPMENT  **************\\
Route::get('/equipment/add', 'EquipmentController@getAdd');
Route::post('/equipment/add', 'EquipmentController@postAdd');
//============== [ADD ITEMS] ==============\\


//============== [EDIT ITEMS] ==============\\
//**************     BOOKS     **************\\
Route::get('/books/edit', 'BooksController@getedit');
Route::post('/books/edit', 'BooksCOntroller@postEdit');
//**************   EQUIPMENT   **************\\
Route::get('/equipment/edit', 'EquipmentController@getEdit');
Route::post('/equipment/edit', 'EquipmentController@postEdit');
//============== [EDIT ITEMS] ==============\\


//============== [BORROW ITEMS] ==============\\
//**************     BOOKS     **************\\
Route::get('/books/borrow', 'BooksController@getBorrow');
Route::post('/books/borrow', 'BooksController@postBorrow');
//**************   EQUIPMENT   **************\\
Route::get('/equipment/borrow', 'EquipmentController@getBorrow');
Route::post('/equipment/borrow', 'EquipmentController@postBorrow');
//============== [BORROW ITEMS] ==============\\


//============== [REMOVE ITEMS] ==============\\
//**************     BOOKS     **************\\
Route::get('/books/remove', 'BooksController@getBorrow');
Route::post('/books/remove', 'BooksController@postBorrow');
//**************   EQUIPMENT   **************\\
Route::get('equipment/remove', 'EquipmentController@getEdit');
Route::post('equipment/remove', 'EquipmentController@postEdit');
//============== [REMOVE ITEMS] ==============\\

Route::get('/debug', function() {
    echo '<pre>';
    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';
    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";
    echo '<h1>Database Config</h1>';

    //print_r(config('database.connections.mysql'));
    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }
    echo '</pre>';
});

if(App::environment('local')) {

    Route::get('/drop', function() {

        DB::statement('DROP database P4');
        DB::statement('CREATE database P4');

        return 'Dropped P4; created P4.';
    });

};
