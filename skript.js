//window.onload = spusti;

var fyzSila = 0;
var magSila = 0;
var viera = 0;
var stamina = 0;
var vitalita = 0;
var stastie = 0;
var obtiaznost = 0;
var maxZivoty = 0;
var zivot = 0;
var zivotNepriatela = 0;
var maxZivotNepriatela = 0;
var randomSiliUtokuNepriatela = 0;
var randomPercentoNepriatela = 0;

function spusti(_obtiaznost,_fyzickaSila,_magickaSila,_viera,_stamina,_vitalita,_stastie) {
    obtiaznost = _obtiaznost;
    fyzSila = _fyzickaSila;
    magSila = _magickaSila;
    viera = _viera;
    stamina = _stamina;
    vitalita = _vitalita;
    stastie = _stastie;
    if (obtiaznost > 0 && obtiaznost < 5) {
        gid('oknoBoj').style.background = "url('img/adventuraWinter.png')";
    } else if (obtiaznost > 4 && obtiaznost < 9) {
        gid('oknoBoj').style.background = "url('img/adventuraForest.png')";
    } else if (obtiaznost > 8 && obtiaznost < 13) {
        gid('oknoBoj').style.background = "url('img/prostredie.png')";
    } else {
        gid('oknoBoj').style.background = "url('img/adventuraLava.png')";
    }
    gid('oknoBoj').style.backgroundRepeat = "no-repeat";
    gid('oknoBoj').style.backgroundSize = "cover";
    gid('oknoBoj').style.display = "block";
    gid('stredny').style.display = "none";
    gid("health").value = vitalita ;
    gid("health").max = vitalita ;
    gid("healthNepriatel").value = obtiaznost * 10;
    gid("healthNepriatel").max = obtiaznost * 10;
    zivot = gid("health");
    maxZivoty = zivot.value;
    zivotNepriatela = gid("healthNepriatel");
    maxZivotNepriatela = zivotNepriatela.value;
    randomSiliUtokuNepriatela = (Math.floor(Math.random() * 12) + 8) * obtiaznost;
    randomPercentoNepriatela = (Math.random() * 1) + 0.5;
    vypisZivoty();
}

function gid(_elementId) {
    return document.getElementById(_elementId);
}

function setPopis(_gid,_popis) {
    _gid.innerHTML = _popis;
}

function getMaxZivoty() {
    return maxZivoty;
}

function getZivoty() {
    return zivot.value;
}

function getZivotyNepriatela() {
    return zivotNepriatela.value;
}

function getMaxZivotyNepriatela() {
    return maxZivotNepriatela;
}

function vypisZivoty() {
    setPopis(gid("p1"),getZivoty()  + "/" + getMaxZivoty());
    setPopis(gid("p2"),getZivotyNepriatela()  + "/" + getMaxZivotyNepriatela());
}

function minusZivoty(_minus,_kto) {
    if (_kto == 1)
    {
        if (zivot.value - (_minus - _minus % 1) <= 0) {
            zivot.value = 0;
        } else {
            zivot.value = zivot.value - (_minus - _minus % 1);
        }
    } else {
        if (zivotNepriatela.value - (_minus - _minus % 1) <= 0) {
            zivotNepriatela.value = 0;
        } else {
            zivotNepriatela.value = zivotNepriatela.value - (_minus - _minus % 1);
        }
    }
}

function plusZivoty(_plus) {
    zivot.value += _plus;
}

function flyingkick() {
    let nazovUtok = "flyingkick";
    let percento = 0.8;
    let percentoSili = 0.9;
    let fyz = percentoSili*fyzSila;
    utok(fyz,0,0,percento,nazovUtok);

}

function bodyslam() {
    let nazovUtok = "bodyslam";
    let percento = 0.2;
    let percentoSili = 1.4;
    let fyz = percentoSili*fyzSila;
    utok(fyz,0,0,percento,nazovUtok);

}

function punchgataling() {
    let nazovUtok = "punchingGataling";
    let percento = 0.8;
    let percentoSili = 0.6;
    let fyz = percentoSili*fyzSila;
    utok(fyz,0,0,percento,nazovUtok);

}

function fireball() {
    let nazovUtok = "fireball";
    let percento = 0.5;
    let percentoSili = 1.2;
    let mag = percentoSili*magSila;
    utok(0,mag,0,percento,nazovUtok);

}

function burn() {
    if (zivotNepriatela.value - maxZivotNepriatela*0.1 > 0) {
        zivotNepriatela.value -= maxZivotNepriatela*0.1;
    } else {
        zivotNepriatela.value = 0;
    }
}

function frostnova() {
    let nazovUtok = "frostnova";
    let percento = 0.7;
    let percentoSili = 1;
    let mag = percentoSili*magSila;
    utok(0,mag,0,percento,nazovUtok);

}

function frost() {
    if (zivotNepriatela.value - maxZivotNepriatela*0.05 > 0) {
        zivotNepriatela.value -= maxZivotNepriatela*0.05;
    } else {
        zivotNepriatela.value = 0;
    }
}

function windslash() {
    let nazovUtok = "windslash";
    let percento = 0.5;
    let percentoSili = 0.8;
    let mag = percentoSili*magSila;
    utok(0,mag,0,percento,nazovUtok);

}

function wind() {
    if (zivotNepriatela.value - maxZivotNepriatela*0.20 > 0) {
        zivotNepriatela.value -= maxZivotNepriatela*0.20;
    } else {
        zivotNepriatela.value = 0;
    }
}

function utok(_fyz,_mag,_vie,_percento,_utok) {
    if (_fyz > 0) {
        minusZivoty(_fyz - (maxZivotNepriatela/2),2);
        let random = Math.random() ;
        if (_utok == "flyingkick") {
            if (zivotNepriatela.value > 0) {
                if (random <= _percento) {
                    vypisZivoty();
                } else {
                    utokNepriatela();
                }
            }
        }
        if (_utok == "bodyslam") {
            if (zivotNepriatela.value > 0) {
                if (random <= _percento) {
                    vypisZivoty();
                } else {
                    utokNepriatela();
                }
            }
        }
        if (_utok == "punchingGataling") {
            if (zivotNepriatela.value > 0) {
                if (random <= _percento) {
                    vypisZivoty();
                    punchgataling();
                } else {
                    utokNepriatela();
                }
            }
        }
    } else if (_mag > 0) {
        minusZivoty(_mag - (maxZivotNepriatela/4),2);
        let random = Math.random() ;
        if (_utok == "fireball") {
            if (zivotNepriatela.value > 0) {
                if (random <= _percento) {
                    vypisZivoty();
                    burn();
                }
                utokNepriatela();
            }
        }
        if (_utok == "frostnova") {
            if (zivotNepriatela.value > 0) {
                if (random <= _percento) {
                    vypisZivoty();
                    frost();
                }
                utokNepriatela();
            }
        }
        if (_utok == "windslash") {
            if (zivotNepriatela.value > 0) {
                if (random <= _percento) {
                    vypisZivoty();
                    wind();
                }
                utokNepriatela();
            }
        }
    } else if (_vie == 1) {
        if ((zivot.value + viera/2) > maxZivoty) {
            zivot.value = maxZivoty;
        } else {
            plusZivoty(viera/2);
        }
    } else if (_vie == 2) {
        stamina += stamina/5;
        vitalita += vitalita/5;
    } else if (_vie == 3) {
        fyzSila += fyzSila/5;
        fyzSila += fyzSila/5;
    }
    skontrolujZivoty();
}

function utokNepriatela() {
    let utok = Math.random();
    if (utok > 0.5) {
        minusZivoty((randomSiliUtokuNepriatela*randomPercentoNepriatela) - (vitalita/2),1);
    } else {
        minusZivoty((randomSiliUtokuNepriatela*randomPercentoNepriatela) - (stamina/2),1);
    }
}

function vyhralSi() {
    setTimeout(koniec, 2000);
}

function prehralSi() {
    setTimeout(koniec, 2000);
}

function koniec() {
    gid('oknoBoj').style.display = "none";
    gid('stredny').style.display = "block";
}

function skontrolujZivoty() {
    if (zivotNepriatela.value == 0) {
        vypisZivoty();
        vyhralSi();
    } else {
        if (zivot.value == 0) {
            vypisZivoty();
            prehralSi();
        } else {
            vypisZivoty();
        }
    }
}