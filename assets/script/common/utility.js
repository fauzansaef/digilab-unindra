var Utility = function () {
    var showConfirm = function (t, m, callback) {
        bootbox.confirm({
            title: t,
            message: m,
            buttons: {
                'confirm': {
                    label: 'Ya'
                },
                'cancel': {
                    label: 'Tidak',
                    className: 'red'
                }
            },
            callback: function (r) {
                callback(r);
            }
        });
    }
    var showMessage = function (mt, t, m) {
        var className;
        if (mt ==="error")
            className = "red";
        bootbox.dialog({
            message: m,
            title: t,
            buttons: {
                success: {
                    label: "Tutup",
                    className: className
                }
            }
        });
    }

    var showMessageCallBack = function (t, m, callback) {
        bootbox.confirm({
            title: t,
            message: m,
            buttons: {
                'confirm': {
                    label: 'Tutup',
                    className: 'blue'
                },
                'cancel': {
                    label: 'Tutup',
                    className: 'hidden'
                }
            },
            callback: function (r) {
                callback(r);
            }
        });
    }

    return {
        init: function () {
        },
        showConfirm: function (t, m, callback) {
            showConfirm(t, m, callback);
        },
        showMessage: function (mt, t, m) {
            showMessage(mt, t, m);
        },
        showMessageCallback: function (t, m, callback) {
            showMessageCallBack(t, m, callback);
        }
    }
}();

jQuery(document).ready(function () {
    Utility.init();
});