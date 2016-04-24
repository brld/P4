<?php

Route::get('/', function () {
    return view('index');
});

for($i = 0; $i <= 100; $i++) {
    Route::get("/practice/ex".$i, "PracticeController@getEx".$i);
}

//============== [SHOW ITEMS] ==============\\
//**************    BOOKS    **************\\
Route::get('/books', 'BookController@getIndex');
//**************  EQUIPMENT  **************\\
Route::get('/equipment', 'EquipmentController@getIndex');
//============== [SHOW ITEMS] ==============\\


//============== [ADD ITEMS] ==============\\
//**************    BOOKS    **************\\
Route::get('/books/add', 'BookController@getAdd');
Route::post('/books/add', 'BookController@postAdd');
//**************  EQUIPMENT  **************\\
Route::get('/equipment/add', 'EquipmentController@getAdd');
Route::post('/equipment/add', 'EquipmentController@postAdd');
//============== [ADD ITEMS] ==============\\


//============== [EDIT ITEMS] ==============\\
//**************     BOOKS     **************\\
Route::get('/books/edit/{id?}', 'BookController@getedit');
//**************   EQUIPMENT   **************\\
Route::get('/equipment/edit{id?}', 'EquipmentController@getEdit');
//============== [EDIT ITEMS] ==============\\


//============== [BORROW ITEMS] ==============\\
//**************     BOOKS     **************\\
Route::get('/books/borrow', 'BookController@getBorrow');
Route::post('/books/borrow', 'BookController@postBorrow');
//**************   EQUIPMENT   **************\\
Route::get('/equipment/borrow', 'EquipmentController@getBorrow');
Route::post('/equipment/borrow', 'EquipmentController@postBorrow');
//============== [BORROW ITEMS] ==============\\


//============== [REMOVE ITEMS] ==============\\
//**************     BOOKS     **************\\
Route::get('/books/remove', 'BookController@getRemove');
Route::post('/books/remove', 'BookController@postRemove');
//**************   EQUIPMENT   **************\\
Route::get('equipment/remove', 'EquipmentController@getRemove');
Route::post('equipment/remove', 'EquipmentController@postRemove');
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
