/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var common_utils = function () {
    var blockPanel = function (ele) {
        App.blockUI({
            target: ele,
            animate: true,
            boxed: true,
            message: 'Processing...'
        });
    };

    var unblockPanel = function (ele) {
        App.unblockUI(ele);
    };

    var refreshCapca = function (el) {
//        blockpanel(el);
        $(el).hide().attr('src', ctx + '/captcha-image?' + Math.floor(Math.random() * 100)).fadeIn();
//        unblockpanel(el);
    };

    $('#captchaImage').on("click", function () {
        common_utils.refreshCaptcha(this);
    });

    var showPesan = function (judul, pesan) {
        bootbox.dialog({
            message: pesan,
            title: judul,
            buttons: {
                main: {
                    label: "OK",
                    className: "blue"
                }
            }
        });
    };

    var showConfirmation = function (judul, pesan, func, data) {
        bootbox.dialog({
            message: pesan,
            title: judul,
            buttons: {
                yes: {
                    label: "Ya",
                    className: "blue",
                    callback: function () {
                        func(data);
                    }
                },
                no: {
                    label: "Tidak",
                    className: "red",
                    callback: function () {
                        return;
                    }
                }
            }
        });
    };

    var resetform = function (ele) {
        $(ele + " input[type=text]").val('');
        $(ele + " textarea").val('');
        $(ele + " select").val('').trigger("change");
        //$(ele + " input[type=checkbox]").removeAttr('checked').uniform();
        //$(ele + " input[type=radio]").removeAttr('checked').uniform();
    };




    var isExist = function () {
        var tin = $('#txtTaxIdNumber').val();
        var nama = $('#txtNama').val();
        var ddMonthPeriodStart = $('#ddMonthPeriodStart').val();
        var ddYearPeriodStart = $('#ddYearPeriodStart').val();
        var ddMonthPeriodFinish = $('#ddMonthPeriodFinish').val();
        var ddYearPeriodFinish = $('#ddYearPeriodFinish').val();

        $.ajax({
            //  jika blum ada, maka kirim ke server untuk dapet fileId dan token(biar sesuai dgn file yg dikrim/untuk chung2
            type: "POST",
            url: ctx + "/upload/isExist",
            data: "tin=" + tin + "&nama=" + nama + "&ddMonthPeriodStart=" + ddMonthPeriodStart
                    + "&ddYearPeriodStart=" + ddYearPeriodStart + "&ddMonthPeriodFinish="
                    + ddMonthPeriodFinish + "&ddYearPeriodFinish=" + ddYearPeriodFinish,
            success: function (respon) {
                var javSc = JSON.parse(respon);
                console.log("javsc: " + javSc)
                if (javSc.result === "ada") {
                    $("#divButtonSubmitClear").show();
                    //setFileDetailUpload(setFileUpload(fileIdUpload, javSc.fileID, javSc.token));
                } else {
                    alert(javSc.result);
                    //EfUpload.unblockpanel('#formTombol');
                }
            }, error: function (e) {
                alert('Error: ' + e);
            }, complete: function (jqXHR, textStatus) {

            }
        });
    };

    return {
        init: function () {
//            $('.number_desimal_0').autoNumeric('init', {decimalCharacter: ',', digitGroupSeparator: '.', decimalPlacesOverride: '0', maximumValue: '9999999999999999'});
//            $('.number_desimal_2').autoNumeric('init', {decimalCharacter: ',', digitGroupSeparator: '.', decimalPlacesOverride: '2', maximumValue: '9999999999999999999'});
//            $('.number_desimal_3').autoNumeric('init', {decimalCharacter: ',', digitGroupSeparator: '.', decimalPlacesOverride: '3'});
            $('.number_desimal_0').autoNumeric('init', {aDec: ',', aSep: '.', mDec: '0', vMax: '9999999999999999'});
            $('.number_desimal_2').autoNumeric('init', {aDec: ',', aSep: '.', mDec: '2', vMax: '9999999999999999999'});
            $('.number_desimal_3').autoNumeric('init', {aDec: ',', aSep: '.', mDec: '3'});
        }, blockPanel: function (ele) {
            blockPanel(ele);
        },
        unblockPanel: function (ele) {
            unblockPanel(ele);
        }, showPesan: function (judul, pesan) {
            showPesan(judul, pesan);
        }, showConf: function (judul, pesan, func, data) {
            showConfirmation(judul, pesan, func, data);
        }, resetForm: function (ele) {
            resetform(ele);
        }, refreshCaptcha: function (elem) {
            refreshCapca(elem);
        }, isExist: function () {
            isExist();
        }
    };
}();

jQuery(document).ready(function () {
    common_utils.init(); // init metronic core componets
});

