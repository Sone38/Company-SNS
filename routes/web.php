<?php

use App\Http\Controllers\ChatsController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DepartmentsController;
use App\Models\Post;
use App\Models\User;
use App\Models\Like;
use App\Models\Contact;
use App\Models\Department;

use App\Events\Message;
use App\Http\Controllers\Post_imgesController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
    return redirect()->route('login');
});


// 社員のアクセス可能ページ
//Route::get('/general', function () {
//    return view('general');
//})->middleware(['auth'])->name('dashboard');

Route::group(['prefix' => 'general'], function() {
    Route::get('', function() {
        return view('general');
    })->name('dashboard');
    Route::get('', [PostsController::class, 'index'])->name('dashboard');

    // いいね機能
    Route::post('', [PostsController::class, 'ajaxlike'])->name('posts.ajaxlike');

    // チャット機能
    Route::get('chat', [ChatsController::class, 'getAllMessageForGeneral'])->name('general-chat');
    Route::post('chat', [ChatsController::class, 'messageSaveForGeneral']);

    // ユーザー情報機能
    Route::get('user', [UsersController::class, 'allDataOfUserForGeneral'])->name('general-user');

    // 問い合わせ機能
    Route::get('form', [DepartmentsController::class, 'GetDepartmentDataForForm'])->name('general-form');
    Route::get('form-confirm', function() {
        return view('general-form-confirm');
    });
    Route::post('form-confirm', [ContactsController::class, 'FormConfirm'])->name('general-form-confirm');
    Route::get('form-complete', [ContactsController::class, 'FormComplete'])->name('general-form-complete');
    Route::post('form-complete', [ContactsController::class, 'FormComplete'])->name('general-form-complete');


    Route::get('test', function() {
        return view('general-test');
    })->name('general-test');
});


require __DIR__.'/auth.php';

// 総管理者のアクセス可能ページ
Route::group(['prefix' => 'top-admin', 'middleware' => ['auth', 'can:top-admin']], function() {
    // メインページ0
    Route::get('top-admin-main', [PostsController::class, 'topIndex'])->name('top-admin-main');

    // チャット機能ページ
    Route::get('top-admin-chat', [ChatsController::class, 'getAllMessage'])->name('top-admin-chat');
    Route::post('top-admin-chat', [ChatsController::class, 'messageSave'])->name('messageSave');

    // ユーザー情報機能ページ
    Route::get('top-admin-user', [UsersController::class, 'allDataOfUser'])->name('top-admin-user');
    Route::get('top-admin-user-edit/{id}', [UsersController::class, 'UserDataFromId'])->name('top-admin-user-edit');
    Route::post('top-admin-user-edit/{id}', [UsersController::class, 'EditUserInformationStore'])->name('top-admin-user-edit-post');
    Route::get('top-admin-user-delete/{id}', [User::class, 'userDelete'])->name('top-admin-user-delete');
    // ユーザー検索機能
    Route::post('top-admin-user', [UsersController::class, 'getUserBySearchName'])->name('searchUser');

    // お問い合わせ機能ページ
    Route::get('top-admin-form', [ContactsController::class, 'GetFormDataFromDatabase'])->name('top-admin-form');
    Route::get('top-admin-form-delete/{id}', [Contact::class, 'formDelete'])->name('top-admin-form-delete');
    Route::get('top-admin-form-detail/{id}', [ContactsController::class, 'GetFormDataFromDatabaseForDetail'])->name('top-admin-form-detail');

    // 投稿機能ページ
    Route::get('top-admin-post', function() {
        return view('/top-admin/top-admin-post');
    })->name('top-admin-post');
    Route::post('top-admin-post', [PostsController::class, 'store']);
    Route::get('top-admin-post-edit/{id}', [PostsController::class, 'edit'])->name('top-admin-post-edit');
    Route::post('top-admin-post-edit/{id}', [PostsController::class, 'editComplete'])->name('top-admin-post-edit');
    Route::get('top-admin-post-delete/{id}', [Post::class, 'postDelete'])->name('top-admin-post-delete');

    // 画像投稿機能の追加
    /*
    Route::get('top-admin-main', [Post_imgesController::class, 'index']);
    Route::get('top-admin-post', [Post_imgesController::class, 'create']);
    Route::post('top-admin-store', [Post_imgesController::class, 'store']);
    */

    // 部署登録等機能ページ
    Route::get('top-admin-department', [DepartmentsController::class, 'GetDepartmentData'])->name('top-admin-department');
    Route::post('top-admin-department-register', [DepartmentsController::class, 'DepartmentStore'])->name('department-register');
    Route::get('top-admin-department-edit/{id}', [DepartmentsController::class, 'departmentEdit'])->name('top-admin-department-edit');
    Route::post('top-admin-department-edit/{id}', [DepartmentsController::class, 'departmentEdited']);
    Route::get('top-admin-department-delete/{id}', [Department::class, 'departmentDelete'])->name('departmentDelete');
});



// 管理者のアクセス可能ページ
Route::group(['prefix' => 'pre-admin', 'middleware' => ['auth', 'can:pre-admin']], function() {
    Route::get('top-admin-main', function() {
        return view('/pre-admin/pre-admin-main');
    })->name('pre-admin-main');
    Route::get('pre-admin-main', [PostsController::class, 'preIndex'])->name('pre-admin-main');

    Route::get('pre-admin-chat', function() {
        return view('/pre-admin/pre-admin-chat');
    })->name('pre-admin-chat');

    Route::get('pre-admin-user', function() {
        return view('/pre-admin/pre-admin-user');
    })->name('pre-admin-user');

    Route::get('pre-admin-form', function() {
        return view('/pre-admin/pre-admin-form');
    })->name('pre-admin-form');

    Route::get('pre-admin-post', function() {
        return view('/pre-admin/pre-admin-post');
    })->name('pre-admin-post');
});

