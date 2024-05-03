<div class="row">
    <div class="col-md-3">
        <select name="perpage" class="form-control input-sm perpage filter">
            @for($i=20;$i<=200;$i+=20)
                <option value="{{$i}}">{{$i}} bản ghi</option>
            @endfor
        </select>
    </div>
    <div class="col-md-5">
        <select name="user_catalogue_id" class="form-control">
            <option value="0" selected="selected">Chọn Nhóm Thành Viên</option>
            <option value="1">Quản Trị Viên</option>
        </select>
        <input type="text" name="keyword" class="form-control" placeholder="Nhập từ khóa tìm kiếm...">
    </div>
    <div class="col-md-4">
        <div class="input-group">
            <span class="input-group-btn">
                <button type="submit" name="search" value="search" class="btn btn-primary mb0 btn-sm">Tìm Kiếm</button>
            </span>
            <a  href="{{route('user.create')}}" class="btn btn-danger mb0 btn-sm add-member-btn">Thêm Thành Viên </a>
        </div>
    </div>
</div>