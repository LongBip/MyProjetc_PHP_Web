<?php

namespace App\Services;

use App\Services\Interfaces\UserServiceInterface;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon; // Thêm namespace của Carbon
use Illuminate\Http\Request; // Thêm namespace của Request
use Illuminate\Support\Facades\Hash;
/**
 * Class UserService
 * @package App\Services
 */
class UserService implements UserServiceInterface
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function paginate()
    {
        $users = $this->userRepository->getAllPaginate();
        return $users;
    }

    public function create(Request $request) // Thêm $request vào đây
    {
        // Bắt đầu một giao dịch cơ sở dữ liệu
        DB::beginTransaction();

        try {
            // Thực hiện các thao tác khác trong quá trình tạo mới
            $payload = $request->except('_token', 'send', 're_password');
           $carbonDate = Carbon::createFromFormat('Y-m-d', $payload['birthday']);
           $payload['password'] = Hash::make($payload['password']);
            $payload['birthday'] = $carbonDate->format('Y-m-d H:i:s');
            $user =  $this->userRepository->create($payload);
            //dd($user);
            // Nếu mọi thứ thành công, thì lưu thay đổi và commit giao dịch
            DB::commit();
            return true;
            // Redirect hoặc trả về phản hồi thành công
        } catch (\Exception $e) {
            // Nếu xảy ra lỗi, rollback giao dịch và xử lý lỗi
            DB::rollback();

            // Ví dụ: log lỗi
            //Log::error('Error occurred while creating: '.
            echo $e->getMessage();
            die();
            return false;
            // Redirect hoặc trả về phản hồi về lỗi
        }
    }
}
