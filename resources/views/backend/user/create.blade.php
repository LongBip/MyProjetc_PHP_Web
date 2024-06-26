
@include('backend.user.component.breadcrumb',['title'=>$config['seo']['create']['title']])
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<form action="{{ route('user.store') }}" method="post" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">
                        <p>Nhập thông tin của người dùng</p>
                        <p>Lưu ý: Những trường đánh dấu<span class="text-danger">(*)</span> là bắt buộc</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7"> 
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Email
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text"
                                    name="email"
                                    value="{{old('email')}}" 
                                    class="form-control"
                                    placeholder=""    
                                    autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Họ và Tên
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text"
                                    name="name"
                                    value="{{old('name')}}" 
                                    class="form-control"
                                    placeholder=""    
                                    autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Nhóm Thành Viên
                                        <span class="text-danger">(*)</span>
                                    </label> 
                                    <select name="user_catalogue_id" class="form-control">
                                        <option value="0" {{ old('user_catalogue_id') == 0 ? 'selected' : '' }}>[Chọn nhóm thành viên] </option>
                                        <option value="1" {{ old('user_catalogue_id') == 1 ? 'selected' : '' }}>Quản trị viên </option>
                                        <option value="2" {{ old('user_catalogue_id') == 2 ? 'selected' : '' }}>Cộng tác viên </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Ngày sinh
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="date"
                                    name="birthday"
                                    value="{{old('birthday')}}" 
                                    class="form-control"
                                    placeholder=""    
                                    autocomplete="off">
                                </div>
                            </div>
                        </div>    
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Mật khẩu
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="password"
                                    name="password"
                                    value="" 
                                    class="form-control"
                                    placeholder=""    
                                    autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Nhập lại mật khẩu
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="password"
                                    name="re_password"
                                    value="" 
                                    class="form-control"
                                    placeholder=""    
                                    autocomplete="off">
                                </div>
                            </div>
                        </div>  
                        <div class="row mb15">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Ảnh đại diện</label>
                                    <div class="input-group">
                                        <input type="text" name="image" value="{{old('image')}}" class="form-control" id="imagePath" placeholder="" autocomplete="off">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary input-image" type="button">Chọn ảnh</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div> 
        <hr>
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin liên hệ</div>
                    <div class="panel-description">Nhập thông tin liên hệ của người dùng</div>
                </div>
            </div>
            <div class="col-lg-7"> 
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Thành Phố  
                                    </label>
                                    <select name="province_id" class="form-control setupSelect2 province location"data-target="districts">
                                        <option value="0">[Chọn Thành phố]</option>
                                        @if(@isset($provinces))
                                            @foreach ($provinces as $province)
                                        <option @if(old('province_id')== $province->code) selected @endif
                                            value="{{$province ->code}}">{{$province ->name}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Quận/Huyện 
                                    </label>
                                    <select name="district_id" class="form-control districts setupSelect2 location" data-target="wards">
                                        <option value="0">[Chọn Quận Huyện]</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Phường/Xã
                                    </label>
                                    <select name="ward_id" class="form-control setupSelect2 wards">
                                        <option value="0">[Chọn Phường Xã]</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Địa chỉ
                                    </label>
                                    <input type="text"
                                    name="address"
                                    value="{{old('address')}}" 
                                    class="form-control"
                                    placeholder=""    
                                    autocomplete="off">
                                </div>
                            </div>
                        </div>    
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Số điện thoại
                                    </label>
                                    <input type="text"
                                    name="phone"
                                    value="" 
                                    class="form-control"
                                    placeholder="{{old('phone')}}"    
                                    autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Ghi Chú
                                    </label>
                                    <input type="text"
                                    name="description"
                                    value="{{old('description')}}" 
                                    class="form-control"
                                    placeholder=""    
                                    autocomplete="off">
                                </div>
                            </div>
                        </div>  
                 
                    </div>
                </div>
            </div>
        </div> 
    <div class="text-right">
        <button class="btn btn-primary" type="submit" name="send" value="send">Lưu Lại Nè</button>
    </div>
    </div>
</form>

<script>
var province_id = '{{old('province_id')}}'
var district_id = '{{old('district_id')}}'
var ward_id = '{{old('ward_id')}}'
</script>