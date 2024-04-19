<?php
namespace App\Http\Services\Users;

use App\Jobs\SendMail;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

use function App\Helper\Helper\price_sal;
class UserService 
{    
    public function update($request, $user) {
        try{
            
            $user->role = $request->input('role');
            $user->active = $request->input('active');
            $user->save();

            Session::flash('success', 'Cập nhật thành công');
        }catch(\Exception $err) {

            Session::flash('error', 'Cập nhật lỗi vui lòng thử lại');

            Log::info($err->getMessage());

            return false;
        }
        return true;
    }    
}


