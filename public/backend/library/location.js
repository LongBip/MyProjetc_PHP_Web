(function($){
    "use strict";
    var HT = {};

    HT.getLocation = () => {
        $(document).on('change', '.location', function(){
            let _this = $(this);
            let option = {
                'data': {
                     'location_id': _this.val(),
                },
                'target': _this.attr('data-target')
            };
            HT.senDataTogetLocation(option);
        });
    };

    HT.senDataTogetLocation =(option) => {
        $.ajax({
            url: 'ajax/location/getLocation',
            type: 'GET',
            data: option,
            dataType: 'json',
            success: function(res){
                $('.' + option.target).html(res.html);
                // Đảm bảo rằng district_id và ward_id đã được xác định từ trước
                if (district_id !== '' && option.target === 'districts') {
                    $('.districts').val(districtId).trigger('change');
                }
                if (ward_id !== '' && option.target === 'wards') {
                    $('.wards').val(wardId).trigger('change');
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                console.log('Lỗi: ' + textStatus + ' ' + errorThrown);
            }
        });
    };

    HT.loadCity = () => {
        // Đảm bảo rằng province_id đã được xác định từ trước
        if (province_id !== '') {
            $('.province').val(province_id).trigger('change');
        }
    };

    $(document).ready(function(){
        HT.getLocation();
        HT.loadCity();
    });

})(jQuery);
