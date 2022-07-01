var commonPageHandler = function () {

    var defaultPageSetting = function () {
//        $('.date-picker').datepicker({
//            rtl: App.isRTL(),
//            orientation: "left",
//            autoclose: true
//        });
        $(".npwp").inputmask("99.999.999.9-999.999", {
            clearMaskOnLostFocus: true,
            placeholder: "_"
        });

//        $(".timepicker").inputmask("hh:mm", {
//            clearMaskOnLostFocus: true,
//            placeholder: "_"
//        });
    };
    var resetform = function (ele) {
        $(ele + " input[type=text]").val('');
        $(ele + " textarea").val('');
        $(ele + " select").val('').trigger("change");
        $(ele + " input[type=checkbox]").removeProp('checked');
        $(ele + " input[type=radio]").removeProp('checked');
        $(ele + " input[type=file]").val('');
    };
    var cleanDate = function (tgl) {
        return new Date(tgl[2], tgl[1] - 1, tgl[0]);
    };
    var cleanString = function (value) {
        return value.replace(/_/g, '').replace('-', '').replace(/\./gi, '');
    };
    var setMaskNpwp = function () {
        $(".npwp").inputmask("99.999.999.9-999.999", {
            clearMaskOnLostFocus: true,
            placeholder: "_"
        });
    };

    function getValue(elem) {
        return $(elem).autoNumeric('get');
    }
    function setValue(elem, value) {
        return $(elem).autoNumeric('set', value !== null ? value : '0');
    }


    return{
        pageSetting: function () {
            defaultPageSetting();
        }, resetForm: function (elem) {
            resetform(elem);
        }, setTanggal: function (tgl) {
            return cleanDate(tgl);
        }, cleanString: function (val) {
            return cleanString(val);
        }, getVal: function (elem) {
            return getValue(elem);
        }, setVal: function (elem, value) {
            return setValue(elem, value);
        }, setMaskNpwp: function () {
            return setMaskNpwp();
        }
    };

}();


