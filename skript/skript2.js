var fyz = 0;
var mag = 0;
var vie = 0;
var stam = 0;
var vit = 0;
var stas = 0;
var volnyStaty = 0;

function gid(_elementId) {
    return document.getElementById(_elementId);
}

function zvysFyzUtok() {
    fyz = gid("fyz").innerText;
    volnyStaty = gid("volneSt").innerText;
    if (volnyStaty > 0) {
        $.ajax({
            url: "../control/update/updateStaty.php",
            type: "POST",
            data: {
                "volneStaty": volnyStaty,
                "fyzickaSilaPlus": fyz
            },
            success: function () {
                gid("fyz").innerText -= -1;
                gid("volneSt").innerText -= 1;
            }
        });
    }
}

function znizFyzUtok() {
    fyz = gid("fyz").innerText;
    volnyStaty = gid("volneSt").innerText;
    fyz--;
    volnyStaty++;
    if (fyz > 0) {
        $.ajax({
            url: "../control/update/updateStaty.php",
            type: "POST",
            data: {
                "volneStaty": volnyStaty,
                "fyzickaSilaMinus": fyz
            },
            success: function () {
                gid("fyz").innerText -= 1;
                gid("volneSt").innerText -= -1;
            }
        });
    }
}

function zvysMagUtok() {
    mag = gid("mag").innerText;
    volnyStaty = gid("volneSt").innerText;
    if (volnyStaty > 0) {
        $.ajax({
            url: "../control/update/updateStaty.php",
            type: "POST",
            data: {
                "volneStaty": volnyStaty,
                "magickaSilaPlus": mag
            },
            success: function () {
                gid("mag").innerText -= -1;
                gid("volneSt").innerText -= 1;
            }
        });
    }
}

function znizMagUtok() {
    mag = gid("mag").innerText;
    volnyStaty = gid("volneSt").innerText;
    mag--;
    volnyStaty++;
    if (mag > 0) {
        $.ajax({
            url: "../control/update/updateStaty.php",
            type: "POST",
            data: {
                "volneStaty": volnyStaty,
                "magickaSilaMinus": mag
            },
            success: function () {
                gid("mag").innerText -= 1;
                gid("volneSt").innerText -= -1;
            }
        });
    }
}

function zvysVieru() {
    vie = gid("vie").innerText;
    volnyStaty = gid("volneSt").innerText;
    if (volnyStaty > 0) {
        $.ajax({
            url: "../control/update/updateStaty.php",
            type: "POST",
            data: {
                "volneStaty": volnyStaty,
                "vieraPlus": vie
            },
            success: function () {
                gid("vie").innerText -= -1;
                gid("volneSt").innerText -= 1;
            }
        });
    }
}

function znizVieru() {
    vie = gid("vie").innerText;
    volnyStaty = gid("volneSt").innerText;
    vie--;
    volnyStaty++;
    if (vie > 0) {
        $.ajax({
            url: "../control/update/updateStaty.php",
            type: "POST",
            data: {
                "volneStaty": volnyStaty,
                "vieraMinus": vie
            },
            success: function () {
                gid("vie").innerText -= 1;
                gid("volneSt").innerText -= -1;
            }
        });
    }
}

function zvysStaminu() {
    stam = gid("stam").innerText;
    volnyStaty = gid("volneSt").innerText;
    if (volnyStaty > 0) {
        $.ajax({
            url: "../control/update/updateStaty.php",
            type: "POST",
            data: {
                "volneStaty": volnyStaty,
                "staminaPlus": stam
            },
            success: function () {
                gid("stam").innerText -= -1;
                gid("volneSt").innerText -= 1;
            }
        });
    }
}

function znizStaminu() {
    stam = gid("stam").innerText;
    volnyStaty = gid("volneSt").innerText;
    stam--;
    volnyStaty++;
    if (stam > 0) {
        $.ajax({
            url: "../control/update/updateStaty.php",
            type: "POST",
            data: {
                "volneStaty": volnyStaty,
                "staminaMinus": stam
            },
            success: function () {
                gid("stam").innerText -= 1;
                gid("volneSt").innerText -= -1;
            }
        });
    }
}

function zvysVitalitu() {
    vit = gid("vit").innerText;
    volnyStaty = gid("volneSt").innerText;
    if (volnyStaty > 0) {
        $.ajax({
            url: "../control/update/updateStaty.php",
            type: "POST",
            data: {
                "volneStaty": volnyStaty,
                "vitalitaPlus": vit
            },
            success: function () {
                gid("vit").innerText -= -1;
                gid("volneSt").innerText -= 1;
            }
        });
    }
}

function znizVitalitu() {
    vit = gid("vit").innerText;
    volnyStaty = gid("volneSt").innerText;
    vit--;
    volnyStaty++;
    if (vit > 0) {
        $.ajax({
            url: "../control/update/updateStaty.php",
            type: "POST",
            data: {
                "volneStaty": volnyStaty,
                "vitalitaMinus": vit
            },
            success: function () {
                gid("vit").innerText -= 1;
                gid("volneSt").innerText -= -1;
            }
        });
    }
}

function zvysStastie() {
    stas = gid("stas").innerText;
    volnyStaty = gid("volneSt").innerText;
    if (volnyStaty > 0) {
        $.ajax({
            url: "../control/update/updateStaty.php",
            type: "POST",
            data: {
                "volneStaty": volnyStaty,
                "stastiePlus": stas
            },
            success: function () {
                gid("stas").innerText -= -1;
                gid("volneSt").innerText -= 1;
            }
        });
    }
}

function znizStastie() {
    stas = gid("stas").innerText;
    volnyStaty = gid("volneSt").innerText;
    stas--;
    volnyStaty++;
    if (stas > 0) {
        $.ajax({
            url: "../control/update/updateStaty.php",
            type: "POST",
            data: {
                "volneStaty": volnyStaty,
                "stastieMinus": stas
            },
            success: function () {
                gid("stas").innerText -= 1;
                gid("volneSt").innerText -= -1;
            }
        });
    }
}

//--------------------------------------------------------------------------------
    //schopnosti
// --------------------------------------------------------------------------------


function dajFlyingkick() {
    $.ajax({
        url: "../control/update/updateSchopnosti.php",
        type: "POST",
        data: {
            "fyzUtok": 1
        },
        success: function () {
            gid("fyzImg").src ="../img/FlyingKick60.png";
        }
    });
}

function dajBodySlam() {
    $.ajax({
        url: "../control/update/updateSchopnosti.php",
        type: "POST",
        data: {
            "fyzUtok": 2
        },
        success: function () {
            gid("fyzImg").src ="../img/BodySlam60.png";
        }
    });
}

function dajPunchingGataling() {
    $.ajax({
        url: "../control/update/updateSchopnosti.php",
        type: "POST",
        data: {
            "fyzUtok": 3
        },
        success: function () {
            gid("fyzImg").src ="../img/PunchGataling60.png";
        }
    });
}

function dajFireBall() {
    $.ajax({
        url: "../control/update/updateSchopnosti.php",
        type: "POST",
        data: {
            "magUtok": 1
        },
        success: function () {
            gid("magImg").src ="../img/fireBall60.png";
        }
    });
}

function dajFrostNova() {
    $.ajax({
        url: "../control/update/updateSchopnosti.php",
        type: "POST",
        data: {
            "magUtok": 2
        },
        success: function () {
            gid("magImg").src ="../img/frostNova60.png";
        }
    });
}

function dajWindSlash() {
    $.ajax({
        url: "../control/update/updateSchopnosti.php",
        type: "POST",
        data: {
            "magUtok": 3
        },
        success: function () {
            gid("magImg").src ="../img/windSlash60.png";
        }
    });
}

function dajHeal() {
    $.ajax({
        url: "../control/update/updateSchopnosti.php",
        type: "POST",
        data: {
            "vieUtok": 1
        },
        success: function () {
            gid("vieImg").src ="../img/heal60.png";
        }
    });
}

function dajDefBonus() {
    $.ajax({
        url: "../control/update/updateSchopnosti.php",
        type: "POST",
        data: {
            "vieUtok": 2
        },
        success: function () {
            gid("vieImg").src ="../img/defBonus60.png";
        }
    });
}

function dajAttakeBonus() {
    $.ajax({
        url: "../control/update/updateSchopnosti.php",
        type: "POST",
        data: {
            "vieUtok": 3
        },
        success: function () {
            gid("vieImg").src ="../img/AttakeBonus60.png";
        }
    });
}