<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\UserServiceInterface as UserService;
use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceRepository;
use App\Http\Requests\StoreUserRequest;
class UserController extends Controller
{
    protected $userService;
    protected $provinceRepository;
    
    public function __construct(UserService $userService, ProvinceRepository $provinceRepository) 
    {
        $this->userService = $userService;
        $this->provinceRepository = $provinceRepository;
    }
    
    public function index()
    {
        $users = $this->userService->paginate();
       
        $config = [
            'js' => [
                'backend/js/plugins/switchery/switchery.js'
            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css'
            ]
        ];;
        $config['seo'] = config('apps.user');
        $template = 'backend.user.index';
        
        return view('backend.dashboard.layout', compact('template', 'config', 'users'));
    }
    
    public function create()
    {
       
        $provinces = $this->provinceRepository->all();
        $config =[
            'css' => [
                'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css'
            ],
            'js' => [
                'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js',
                'backend/library/location.js',
                'backend/plugin/ckfinder/ckfinder.js',
                'backend/library/finder.js',
            ],
        ];
        $config['seo'] = config('apps.user');
        $template = 'backend.user.create';
        return view('backend.dashboard.layout', compact('template', 'config','provinces'));
    }

    public function store(StoreUserRequest $request){
        if($this->userService->create($request)){
            return redirect()->route('user.index')->with('success','Thêm mới thành công !');
        }
        return redirect()->route('user.index')->with('error','Thêm không thành công. hãy thử lại !');
 }
}
