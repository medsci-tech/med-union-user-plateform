/**
 * Created by ronaldoooo on 2016/11/10.
 */

require('select2/dist/js/select2');

$(document).ready(function () {
    $('.enterprises-select2').select2({
        placeholder: '请选择该应用所属企业',
        allowClear: true
    });
    $('.applications-select2').select2({
        placeholder: '请选择该项目所属应用',
        allowClear: true
    });
    $('.projects-select2').select2({
        placeholder: '请选择该合同所属项目',
        allowClear: true
    });
});