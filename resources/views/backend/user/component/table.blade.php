<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th><input type="checkbox" value="" id="checkAll" class="input-checkbox"></th>
            <th>Họ và Tên</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th class="text-center">Tình trạng</th>
            <th class="text-center">Thao Tác</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($users) && $users->count() > 0)
            @foreach($users as $user)
            <tr>
                <td><input type="checkbox" value="" class="input-checkbox checkBoxItem"></td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->address}}</td>
                <td class="text-center"><input type="checkbox" class="js-switch" checked /></td>
                <td class="text-center">
                    <a href="" class="btn btn-success"><i class="fa fa-edit"></i></a>
                    <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                </td>
            </tr>  
            @endforeach
        @else
            <tr>
                <td colspan="7" class="text-center">Không có dữ liệu</td>
            </tr>
        @endif
    </tbody>
</table>

<!-- Hiển thị phân trang -->
<div class="d-flex justify-content-center">
    {{ $users->links('pagination::bootstrap-4') }}
</div>

<script>
    $(document).ready(function(){
        var elems = document.querySelectorAll('.js-switch:not([data-switchery])');
        elems.forEach(function(elem) {
            new Switchery(elem, { color: '#1AB394' });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.setupSelect2').select2();
    });
</script>