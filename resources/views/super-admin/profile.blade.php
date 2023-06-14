//Client Contact Person
Route::get('/master-client-edit-contact-person/{id}',
[\App\Http\Controllers\MasterClientController::class, 'editContactPerson'])
->name('master-client.edit-contact-person');
Route::delete('/master-client-delete-contact-person/{id}',
[\App\Http\Controllers\MasterClientController::class, 'destroyContactPerson'])
->name('master-client.destroy-contact-person');
Route::put('/master-client-update-contact-person/{id}',
[\App\Http\Controllers\MasterClientController::class, 'updateContactPerson'])
->name('master-client.update-contact-person');
Route::post('/master-client-store-contact-person/{id}',
[\App\Http\Controllers\MasterClientController::class, 'storeContactPerson'])
->name('master-client.store-contact-person');


//Software Module
Route::get('/master-software-create-software-module/{id}',
[\App\Http\Controllers\MasterSoftwareController::class, 'createSoftwareModule'])
->name('master-software.create-software-module');
Route::post('/master-software-store-software-module/{id}',
[\App\Http\Controllers\MasterSoftwareController::class, 'storeSoftwareModule'])
->name('master-software.store-software-module');
Route::get('/master-software-edit-software-module/{id}',
[\App\Http\Controllers\MasterSoftwareController::class, 'editSoftwareModule'])
->name('master-software.edit-software-module');
Route::put('/master-software-update-software-module/{id}',
[\App\Http\Controllers\MasterSoftwareController::class, 'updateSoftwareModule'])
->name('master-software.update-software-module');
Route::delete('/master-software-delete-software-module/{id}',
[\App\Http\Controllers\MasterSoftwareController::class, 'destroySoftwareModule'])
->name('master-software.destroy-software-module');



//Software Requirements
Route::get('/master-software-edit-software-requirement/{id}',
[\App\Http\Controllers\MasterSoftwareController::class, 'editSoftwareRequirement'])
->name('master-software.edit-software-requirement');
Route::delete('/master-software-delete-software-requirement/{id}',
[\App\Http\Controllers\MasterSoftwareController::class, 'destroySoftwareRequirement'])
->name('master-software.destroy-software-requirement');
Route::put('/master-software-update-software-requirement/{id}',
[\App\Http\Controllers\MasterSoftwareController::class, 'updateSoftwareRequirement'])
->name('master-software.update-software-requirement');
Route::post('/master-software-store-software-requirement/{id}',
[\App\Http\Controllers\MasterSoftwareController::class, 'storeSoftwareRequirement'])
->name('master-software.store-software-requirement');



//Software Template
Route::get('/master-software-create-software-template/{id}',
[\App\Http\Controllers\MasterSoftwareController::class, 'createSoftwareTemplate'])
->name('master-software.create-software-template');
Route::post('/master-software-store-software-template/{id}',
[\App\Http\Controllers\MasterSoftwareController::class, 'storeSoftwareTemplate'])
->name('master-software.store-software-template');
Route::get('/master-software-edit-software-template/{id}',
[\App\Http\Controllers\MasterSoftwareController::class, 'editSoftwareTemplate'])
->name('master-software.edit-software-template');
Route::put('/master-software-update-software-template/{id}',
[\App\Http\Controllers\MasterSoftwareController::class, 'updateSoftwareTemplate'])
->name('master-software.update-software-template');
Route::delete('/master-software-delete-software-template/{id}',
[\App\Http\Controllers\MasterSoftwareController::class, 'destroySoftwareTemplate'])
->name('master-software.destroy-software-template');
