/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./select2');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

Vue.component('example', require('./components/Example.vue'));

/**
 * Laravel passport components.
 */
Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);

var app = new Vue({
    el: 'body'
});


$(function() {
    // 选择按钮
    var checkboxClass = 'icheckbox_flat-blue';
    var radioClass = 'iradio_flat-blue';
    $('input[type=checkbox],input[type=radio]').iCheck({
        checkboxClass: checkboxClass,
        radioClass: radioClass
    });
    $("span.icon input:checkbox, th input:checkbox").on('ifChecked || ifUnchecked', function() {
        var checkedStatus = this.checked;
        var checkbox = $(this).parents('.widget-box').find('tr td:first-child input:checkbox');
        checkbox.each(function() {
            this.checked = checkedStatus;
            if (checkedStatus == this.checked) {
                $(this).closest('.' + checkboxClass).removeClass('checked');
            }
            if (this.checked) {
                $(this).closest('.' + checkboxClass).addClass('checked');
            }
        });
    });

    $('[data-delete="delete-form-show"]').click(function() {
        swal({
            title: "您确定要删除吗",
            type: "error",
            showCancelButton: true,
            cancelButtonText: '取消',
            confirmButtonColor: "#f27474",
            confirmButtonText: "确定",
            closeOnConfirm: false
        }, function() {
            $('#delete-form-show').submit();
        });
    });

    // 表单验证
    $.validator.setDefaults({
        highlight: function(e) {
            $(e).closest(".form-group").removeClass("has-success").addClass("has-error");
        },
        success: function(e) {
            e.closest(".form-group").removeClass("has-error").addClass("has-success");
        },
        errorElement: "span",
        errorPlacement: function(e, r) {
            e.appendTo(r.is(":radio") || r.is(":checkbox") ? r.parent().parent().parent() : r.parent());
        },
        errorClass: "help-block m-b-none",
        validClass: "help-block m-b-none"
    });

    $('#form-validate').validate();
});
