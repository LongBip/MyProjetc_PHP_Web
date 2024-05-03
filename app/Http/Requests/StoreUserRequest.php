<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|unique:users|max:191',  
            'name' => 'required|string', 
            'user_catalogue_id' => 'required|integer|gt:0', // Thêm quy tắc cho user_catalogue_id
            'password' => 'required|string|min:6',
            're_password' => 'required|string|same:password', // Quy tắc 'same' để kiểm tra xem re_password có giống với password không
        ];
    }
    
    public function messages(): array
{
    return [
        'email.required'=> 'Bạn chưa nhập địa chỉ email!',
        'email.email'=> 'Bạn chưa đúng định dạng email, ví dụ abc@gmail.com!',
        'email.unique'=> 'Địa chỉ email đã được sử dụng!',
        'name.required' => 'Vui lòng nhập họ và tên của bạn!',
        'name.string' => 'Họ tên của bạn phải là dạng ký tự!',
        'user_catalogue_id.gt' => 'Vui lòng chọn nhóm thành viên!',
        'password.required'=>'Vui lòng nhập mật khẩu!',
        'password.string'=>'Mật khẩu phải là một chuỗi ký tự!',
        'password.min'=>'Mật khẩu phải chứa ít nhất 6 ký tự!',
        're_password.required'=>'Vui lòng nhập lại mật khẩu!',
        're_password.same'=>'Mật khẩu nhập lại không khớp với mật khẩu đã nhập!'
    ];
}

    
}
