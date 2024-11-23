<?php

use App\Models\Property_type;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\OrganizController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\pages\AccountSettingsAccount;
use App\Http\Controllers\pages\AccountSettingsNotifications;
use App\Http\Controllers\pages\AccountSettingsConnections;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\pages\MiscUnderMaintenance;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\authentications\ForgotPasswordBasic;
use App\Http\Controllers\cards\CardBasic;
use App\Http\Controllers\user_interface\Accordion;
use App\Http\Controllers\user_interface\Alerts;
use App\Http\Controllers\user_interface\Badges;
use App\Http\Controllers\user_interface\Buttons;
use App\Http\Controllers\user_interface\Carousel;
use App\Http\Controllers\user_interface\Collapse;
use App\Http\Controllers\user_interface\Dropdowns;
use App\Http\Controllers\user_interface\Footer;
use App\Http\Controllers\user_interface\ListGroups;
use App\Http\Controllers\user_interface\Modals;
use App\Http\Controllers\user_interface\Navbar;
use App\Http\Controllers\user_interface\Offcanvas;
use App\Http\Controllers\user_interface\PaginationBreadcrumbs;
use App\Http\Controllers\user_interface\Progress;
use App\Http\Controllers\user_interface\Spinners;
use App\Http\Controllers\user_interface\TabsPills;
use App\Http\Controllers\user_interface\Toasts;
use App\Http\Controllers\user_interface\TooltipsPopovers;
use App\Http\Controllers\user_interface\Typography;
use App\Http\Controllers\extended_ui\PerfectScrollbar;
use App\Http\Controllers\extended_ui\TextDivider;
use App\Http\Controllers\icons\Boxicons;
use App\Http\Controllers\form_elements\BasicInput;
use App\Http\Controllers\form_elements\InputGroups;
use App\Http\Controllers\form_layouts\VerticalForm;
use App\Http\Controllers\form_layouts\HorizontalForm;
use App\Http\Controllers\tables\Basic as TablesBasic;
use App\Models\Product;
use App\Models\Blog;
use App\Models\Promotion;
use App\Http\Controllers\CaptchaServiceController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PromotionController;
use App\Models\Location_province;
use App\Models\Property_image;
use App\Models\Property_Listing;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


/*
|--------------------------------------------------------------------------
| Fontend
|--------------------------------------------------------------------------
*/
// Route::get('/welcome', function () {
//     Auth::logout();
//     return view('welcome');
// });


// Landing page
Route::get('/', function (Request $request) {
    $posts = Property_Listing::paginate(12);
    $provinces = Location_province::all();
    $types = Property_type::all();
    return view('landing_page', compact('posts', 'provinces', 'types'));
})->middleware('track.visitors');

Route::get('/filter', function (Request $request) {
    $provinces = Location_province::all();
    $types = Property_type::all();
    $search = $request->search;
    $province = $request->province;
    $amphure = $request->amphure;
    $tumbon = $request->tumbon;
    $type = $request->type;

    // Start with a query builder instead of executing the query immediately
    $query = Property_Listing::query();

    // Add search condition if search parameter exists
    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('listing_id', 'LIKE', '%' . $search . '%')
              ->orWhere('title', 'LIKE', '%' . $search . '%');
        });
    }

    // Add province filter if province parameter exists
    if ($province) {
        $query->where('province', $province);
    }

    // Add province filter if amphure parameter exists
    if ($amphure) {
        $query->where('amphure', $amphure);
    }

    // Add province filter if tumbon parameter exists
    if ($tumbon) {
        $query->where('tumbon', $tumbon);
    }

    // Add province filter if type parameter exists
    if ($type) {
        $query->where('type_id', $type);
    }

    // Execute the query with pagination
    $posts = $query->paginate(12);

    return view('landing_page', compact('posts', 'provinces', 'province', 'amphure', 'tumbon', 'type', 'search', 'types'));
})->middleware('track.visitors')->name('post.filter');

Route::get('/post/detail/{post_id}', function ($post_id) {
    $post = Property_Listing::where('listing_id', $post_id)->firstOrFail();
    return view('post_detail', ['post_id' => $post_id, 'post' => $post]);
})->middleware('track.visitors')->name("post.detail");

// Switch Language
Route::get('/language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('switch-language');

Route::get('/get-amphures/{province_id}', [PostController::class, 'getAmphures']);
Route::get('/get-tumbon/{amphure_id}', [PostController::class, 'getDistricts']);





/*
|--------------------------------------------------------------------------
| Backend
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    Route::view('dashboard', 'dashboard')
        ->middleware('verified') // Specific middleware for this route
        ->name('dashboard');

    Route::get('/info', function () {
        phpinfo();
    });

    // Main Page Route
    Route::get('/admin', function () {
        return redirect()->route('dashboard-analytics');
    });
    Route::get('/admin/main', [Analytics::class, 'index'])->name('dashboard-analytics');
    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('dashboard-analytics');
    });

    // pages
    Route::resource('admin/posts', PostController::class);
    Route::post('/admin/posts/{post}/update', [PostController::class, 'update'])->name('posts.update.each');
    // Route::get('/get-amphures/{province_id}', [PostController::class, 'getAmphures']);
    // Route::get('/get-tumbon/{amphure_id}', [PostController::class, 'getDistricts']);

    // upload file route
    Route::post('/filepond/store',[FileController::class,'filepondUpload']);
    Route::delete('/filepond/delete',[FileController::class,'filepondDelete']);
    Route::delete('/file/delete/{id}',[FileController::class,'fileDelete']);

    // Log out
    Route::get('/admin/logout', function () {
        Auth::logout();
        return redirect('login');
    });


    // authentication
    Route::get('/admin/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
    Route::get('/admin/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');
    Route::get('/admin/forgot-password-basic', [ForgotPasswordBasic::class, 'index'])->name('auth-reset-password-basic');
});

require __DIR__.'/auth.php';
