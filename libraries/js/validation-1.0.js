/*
 * @name validation
 * @version 1.0
 * @author Nick
 * @copyright 2013 TARGETS
 * @updated 2013-09-23
 *
 * Update Log
 * ----------
 * 2013-11-13
 * Add Function
 * vaiidExtension,validCompanyPhone1,validCompanyPhone2,validCompanyPhone3
 * validServicePhone1,validServicePhone2
 * ----------
 */


//中文姓名
function validChineseName(str) {
    return /^[\u4e00-\u9fa5]{2,4}$/.test(str);
}
//英文姓名
function validEnglishName(str) {
    return /^[a-zA-Z\_\s]+$/.test(str);
}


//家用電話 ***-********
function validHomePhone(str) {
    return /^[0][1-9]{1,2}[-][0-9]{6,8}$/.test(str);
}
//手機
function validCellPhone(str) {
    return /^(0)(9)([0-9]{8})$/.test(str);
}
//公司電話 ***-********#***
function validCompanyPhone1(str) {
    return /^[0][1-9]{1,2}[-][0-9]{6,8}[#]?[0-9]*$/.test(str);
}
//公司電話 (0**)****-****
function validCompanyPhone2(str) {
    return /^[(][0][1-9]{1,2}[)][0-9]{3,4}[-][0-9]{4,4}$/.test(str);
}
//公司電話加分機 (0**)****-****#*******
function validCompanyPhone3(str) {
    return /^[(][0][1-9]{1,2}[)][0-9]{3,4}[-][0-9]{4,4}[#][0-9]+$/.test(str);
}

//電話限制-一般電話 (***)-***-****
function validPhone1(str) {
    return /^[(][0][1-9]{1,2}[)][0-9]{4,4}[-][0-9]{4,4}$/.test(str);
}
//電話限制-客服 ****-****-****
function validServicePhone1(str) {
    return /^[0-9]{4,4}[-][0-9]{4,4}[-][0-9]{4,4}$/.test(str);
}
//電話限制-客服 ****-***-***
function validServicePhone2(str) {
    return /^[0-9]{4,4}[-][0-9]{3,3}[-][0-9]{3,3}$/.test(str) ;
}

//Email
function validEmail(str) {
    return /^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4})*$/.test(str);
}

//身份證字號
function validIdNo(str) {
    return /^[A-Za-z]{1}[1-2]{1}[0-9]{8}$/.test(str);
}

//網址
function validHttp(str) {
    return /^(((http|https|ftp):\/\/)?([[a-zA-Z0-9]\-\.])+(\.)([[a-zA-Z0-9]]){2,4}([[a-zA-Z0-9]\/+=%&amp;_\.~?\-]*))*$/.test(str);
}

//IP
function validIP(str) {
    return /^((?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?))*$/.test(str);
}

//數字
function validInt(str) {
    return /^[0-9]+$/.test(str);
}

 function validIntAndFloat(str) {
	var RE = /^\d*\.?\d*$/;
	if(RE.test(str)){
	   return true;
	}else{
	   return false;
	}
}


//信用卡
function validCreditCard(str) {
    return /^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6011[0-9]{12}|622((12[6-9]|1[3-9][0-9])|([2-8][0-9][0-9])|(9(([0-1][0-9])|(2[0-5]))))[0-9]{10}|64[4-9][0-9]{13}|65[0-9]{14}|3(?:0[0-5]|[68][0-9])[0-9]{11}|3[47][0-9]{13})*$/.test(str);
}

//密碼
function validPassword1(str) {
    return /^[^\s\"\&]{6,20}$/.test(str);//6~20個字元英文、數字、各種符號，不得為空白鍵、「"」及「&」
}

/*
 *檢查副檔名
 *param1:要檢查的檔案名稱
 *param(N):要符合的副檔名名稱 jpg,pdf
 */
function validExtension() {
    var alen = arguments.length;
    if (alen < 2) {
        alert('Parameter not enough.');
        return false;
    }
    else
    {
        var filename = arguments[0];
        if (filename != '' ) {
            var ext = /[^.]+$/.exec(filename);
            ext = ext.toString().toLowerCase();
            for (i = 1 ; i < alen ; i++)
            {
                if (ext == arguments[i]) {
                    return true;
                }
            }   
        }
        return false;
    }
}