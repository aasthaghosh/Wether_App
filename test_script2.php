<?php 
require __DIR__.'/vendor/autoload.php'; 
$app = require_once __DIR__.'/bootstrap/app.php'; 
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap(); 
$req = Illuminate\Http\Request::create('/alert/todo', 'POST', ['task'=>'Test from script']); 
$ctrl = new App\Http\Controllers\AlertController(); 
echo $ctrl->storeTodo($req)->getContent(); 
$req2 = Illuminate\Http\Request::create('/alert/profile', 'POST', [
    'location'=>'X',
    'field_size'=>'100',
    'primary_crop'=>'Corn',
    'soil_type'=>'Loam'
]);
echo $ctrl->updateProfile($req2)->getContent();
echo "\nDONE";