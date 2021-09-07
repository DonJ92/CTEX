// Coded by H(S
var prevTime;
var checkTime = 3600 * 1000;
var amountDecimals = [];
var priceDecimals = [];
var balanceDecimals = [];
var $primary = '#7367F0',
    $success = '#28C76F',
    $danger = '#EA5455',
    $warning = '#FF9F43',
    $info = '#00cfe8',
    $label_color_light = '#dae1e7';
var $primary_light = '#A9A2F6';
var $success_light = '#55DD92';
var $warning_light = '#ffc085';

function number_format (number, decimals, dec_point = '.', thousands_sep = ',') {
    // Strip all characters but numerical ones.
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}

function _number_format(src, decimals) {
    if (decimals == 0) {
        return number_format(src, 0);
    }
    return removeTrailingZero(number_format(src, decimals));
}

function removeTrailingZero(src) {
    var i = src.length - 1;
    for (; i >= 0; i --) {
        if (src[i] == '.' || src[i] != 0) break;
    }
    if (src[i] == '.') {
        return src.substr(0, i);
    }
    return src.substr(0, i + 1);
}

function copyStringToClipboard (str) {
    var el = document.createElement('textarea');
    el.value = str;
    el.setAttribute('readonly', '');
    el.style = {position: 'absolute', left: '-9999px'};
    document.body.appendChild(el);
    el.select();
    document.execCommand('copy');
    document.body.removeChild(el);
    showToast('コピーが成功されました。', 'お知らせ', 'success');
}

String.prototype.padLeft = function (length, character) {
    return new Array(length - this.length + 1).join(character || '0') + this;
}

function showToast(msg, title, type) {
    if (type == 'warning') {
        toastr.warning(msg, title, {
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            positionClass: 'toast-bottom-center',
            timeOut: 3000
        });
    }
    else if (type == 'success') {
        toastr.success(msg, title, {
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            positionClass: 'toast-bottom-center',
            timeOut: 3000
        });
    } else {
        toastr.danger(msg, title, {
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            positionClass: 'toast-bottom-center',
            timeOut: 3000
        });
    }
}

$(function() {
    /*prevTime = 0;
    getMasterData();
    checkNotifications();
    setTimeout(checkNotifications, checkTime);*/

//    updateBlockchainFee();
//    initRatePanel();
//    setInterval(updateBlockchainFee, 60 * 1000);
});

function getMasterData() {
    $.ajax({
        url: BASE_URL + 'ajax/common/getMasterData',
        type: 'POST',
        success: function(result) {
            amountDecimals = result['amount_decimals'];
            priceDecimals = result['price_decimals'];
            balanceDecimals = result['balance_decimals'];
        },
        error: function(err) {
            //bootbox.alert('Getting master data has failed with error.');
            console.log(err);
        }
    });
}

function checkNotifications() {
    $.ajax({
        url: (PUBLIC_URL ? PUBLIC_URL : '') + 'ajax/common/getNewNotifications',
        type: 'POST',
        data: {
            'prevTime' : prevTime,
            'staffId' : $('#common-staff-id').val(),
        },
        success: function(result) {
            var count = result['count'];
            var nowTime = result['nowTime'];
            var message;

            if (prevTime != 0) {
                setTimeout(checkNotifications, checkTime);
            }
            prevTime = nowTime;

            if (count == 0) {
                return;
            }
            else if (count == 1) {
                message = count + " unread notification remain!";
            }
            else {
                message = count + " unread notifications remain!";
            }

            showToast(message, "Please confirm!", "info");
        },
        error: function(err) {
            console.log('error :', err);
        }
    });
}

function markNotifications(id, url) {
    $.ajax({
        url: (PUBLIC_URL ? PUBLIC_URL : '') + 'ajax/common/markNotification',
        type: 'POST',
        data: {
            'id': id,
        },
        success: function(result) {
            if (url != '') {
                document.location.href = url;
            }
            else {
                document.location.reload();
            }
        },
        error: function(err) {
            console.log('Error : ', err);
        }
    })
}

function g_exportExcel(tableId, strFileName, strSheetName) {
    $(tableId).table2excel({
        name: strSheetName,
        filename: strFileName //do not include extension
    });
}

function goBack() {
    window.history.back();
}

function showOverlay(obj, flag, text = '') {
    if (flag == true) {
        if (obj == null) {
            $.LoadingOverlay('show', {
                text: text
            });
        }
        else {
            obj.LoadingOverlay('show', {
                text: text
            });
        }
    }
    else {
        if (obj == null) {
            $.LoadingOverlay('hide');
        }
        else {
            obj.LoadingOverlay('hide');
        }
    }
}

function __validateValue(value) {
    if(value == undefined || value == 0 ||  isNaN(value) || value == null) return false;

    return value;
}

function __callAjax(url, data, callback, type = 'post') {
    $.ajax({
        url: BASE_URL + url,
        type: type,
        data: data,
        success: function(data) {
            callback(data);
        }
    })
}

function __parseFloat(value) {
    if(value == undefined || isNaN(value) || value == null || value == '' || value == 0)
        return 0;

    return parseFloat(value);
}
