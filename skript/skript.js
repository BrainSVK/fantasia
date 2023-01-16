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
var celkovyDMG = 0;
var razSkoncil = 0;
var volneStaty = 0;

function spusti(_obtiaznost,_fyzickaSila,_magickaSila,_viera,_stamina,_vitalita,_stastie,_volneStaty) {
    razSkoncil = 0;
    celkovyDMG = 0;
    obtiaznost = _obtiaznost;
    fyzSila = _fyzickaSila;
    magSila = _magickaSila;
    viera = _viera;
    stamina = _stamina;
    vitalita = _vitalita;
    stastie = _stastie;
    volneStaty = _volneStaty;
    if (obtiaznost > 0 && obtiaznost < 5) {
        gid('oknoBoj').style.background = "url('../img/adventuraWinter.png')";
        gid("obrazokNepriatel").style.background = "url('../img/iceMonster.png')";
    } else if (obtiaznost > 4 && obtiaznost < 9) {
        gid('oknoBoj').style.background = "url('../img/adventuraForest.png')";
        gid("obrazokNepriatel").style.background = "url('../img/sandMonster.png')";
    } else if (obtiaznost > 8 && obtiaznost < 13) {
        gid('oknoBoj').style.background = "url('../img/prostredie.png')";
        gid("obrazokNepriatel").style.background = "url('../img/forestMonster.png')";
    } else {
        gid('oknoBoj').style.background = "url('../img/adventuraLava.png')";
        gid("obrazokNepriatel").style.background = "url('../img/fireMonster.png')";
    }
    gid("popis1").innerText = "";
    gid('oknoBoj').style.backgroundRepeat = "no-repeat";
    gid('oknoBoj').style.backgroundSize = "cover";
    gid('oknoBoj').style.display = "block";
    gid('stredny').style.display = "none";
    gid("health").value = vitalita * 10;
    gid("health").max = vitalita * 10;
    gid("healthNepriatel").value = obtiaznost * 100;
    gid("healthNepriatel").max = obtiaznost * 100;
    zivot = gid("health");
    maxZivoty = zivot.value;
    zivotNepriatela = gid("healthNepriatel");
    maxZivotNepriatela = zivotNepriatela.value;
    randomSiliUtokuNepriatela = (Math.floor(Math.random() * (15 - 7)) +  7) * obtiaznost;
    vypisZivoty();
    gid("nav-bar").style.display = "none";
    $.ajax({
        url: "../control/update/updateAdventura.php",
        type: "POST",
        data: {
            "boj": 1,
            "obtiaznost": obtiaznost,
            "maxZ": getMaxZivoty(),
            "aktZ": getZivoty(),
            "maxZNep": getMaxZivotyNepriatela(),
            "aktZNep": getZivotyNepriatela(),
            "randSilaUtok": randomSiliUtokuNepriatela
        }
    });
}

function ahoj() {
    alert("ahoj");
}


function obnovSuboj(_obtiaznost,_fyzickaSila,_magickaSila,_viera,_stamina,_vitalita,_stastie,_volneStaty,_maxZ,_aktZ,_maxZNep,_aktZNep,_randSilaUtok) {
    razSkoncil = 0;
    celkovyDMG = 0;
    obtiaznost = _obtiaznost;
    fyzSila = _fyzickaSila;
    magSila = _magickaSila;
    viera = _viera;
    stamina = _stamina;
    vitalita = _vitalita;
    stastie = _stastie;
    volneStaty = _volneStaty;
    if (obtiaznost > 0 && obtiaznost < 5) {
        gid('oknoBoj').style.background = "url('../img/adventuraWinter.png')";
        gid("obrazokNepriatel").style.background = "url('../img/iceMonster.png')";
    } else if (obtiaznost > 4 && obtiaznost < 9) {
        gid('oknoBoj').style.background = "url('../img/adventuraForest.png')";
        gid("obrazokNepriatel").style.background = "url('../img/sandMonster.png')";
    } else if (obtiaznost > 8 && obtiaznost < 13) {
        gid('oknoBoj').style.background = "url('../img/prostredie.png')";
        gid("obrazokNepriatel").style.background = "url('../img/forestMonster.png')";
    } else {
        gid('oknoBoj').style.background = "url('../img/adventuraLava.png')";
        gid("obrazokNepriatel").style.background = "url('../img/fireMonster.png')";
    }
    gid("popis1").innerText = "";
    gid('oknoBoj').style.backgroundRepeat = "no-repeat";
    gid('oknoBoj').style.backgroundSize = "cover";
    gid('oknoBoj').style.display = "block";
    gid('stredny').style.display = "none";
    gid("health").value = _aktZ ;
    gid("health").max = _maxZ;
    gid("healthNepriatel").value = _aktZNep;
    gid("healthNepriatel").max = _maxZNep;
    zivot = gid("health");
    maxZivoty = _maxZ;
    zivotNepriatela = gid("healthNepriatel");
    maxZivotNepriatela = _maxZNep;
    randomSiliUtokuNepriatela = _randSilaUtok;
    vypisZivoty();
    gid("nav-bar").style.display = "none";
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
        let randKrit = Math.random();
        let krit = 1;
        if (randKrit <= 0.25) {
            krit = 2;
        }
        if (zivot.value - Math.ceil(_minus)*krit  <= 0) {
            zivot.value = 0;
            if (krit == 2) {
                gid("popis1").innerText += "\n Obdržal si: " +  Math.ceil(_minus)*krit + " poškodenia (krit)";
            } else {
                gid("popis1").innerText += "\n Obdržal si: " +  Math.ceil(_minus)*krit + " poškodenia";
            }
        } else {
            if (_minus*krit > 0 ) {
                zivot.value = zivot.value - Math.ceil(_minus)*krit;
                if (krit == 2) {
                    gid("popis1").innerText += "\n Obdržal si: " +  Math.ceil(_minus)*krit + " poškodenia (krit)";
                } else {
                    gid("popis1").innerText += "\n Obdržal si: " +  Math.ceil(_minus)*krit + " poškodenia";
                }
            } else {
                zivot.value--;
                gid("popis1").innerText += "\n Obdržal si: " +  1 + " poškodenia";
            }
        }
    } else {
        if (zivotNepriatela.value - _minus <= 0) {
            zivotNepriatela.value = 0;
        } else {
            if (_minus > 0 ) {
                let random1 = Math.random()
                if (random1 <= stastie/100.0) {
                    gid("popis1").innerText += "\n bonus za kriticky utok: " + Math.ceil(_minus);
                    zivotNepriatela.value = zivotNepriatela.value - Math.ceil(_minus*2);
                } else {
                    zivotNepriatela.value = zivotNepriatela.value - Math.ceil(_minus);
                }
            } else {
                zivotNepriatela.value--;
            }
        }
    }
}

function plusZivoty(_plus) {
    zivot.value += _plus;
}

function flyingkick() {
    let nazovUtok = "flyingkick";
    let percento = 0.5;
    let percentoSili = 1;
    let fyz = percentoSili*fyzSila;
    celkovyDMG = 0;
    utok(Math.ceil(fyz),0,0,percento,nazovUtok);

}

function bodyslam() {
    let nazovUtok = "bodyslam";
    let percento = 0.2;
    let percentoSili = 1.5;
    let fyz = percentoSili*fyzSila;
    celkovyDMG = 0;
    utok(Math.ceil(fyz),0,0,percento,nazovUtok);

}

function punchgataling(utocim) {
    celkovyDMG = utocim;
    let nazovUtok = "punchingGataling";
    let percento = 0.8;
    let percentoSili = 0.4;
    let fyz = percentoSili*fyzSila;
    utok(Math.ceil(fyz),0,0,percento,nazovUtok);

}

function fireball() {
    let nazovUtok = "fireball";
    let percento = 0.6;
    celkovyDMG = 0;
    let percentoSili = 1.2;
    let mag = percentoSili*magSila;
    utok(0,Math.ceil(mag),0,percento,nazovUtok);

}

function burn() {
    if (zivotNepriatela.value - maxZivotNepriatela*0.1 > 0) {
        zivotNepriatela.value -= maxZivotNepriatela*0.1;
        zivotNepriatela.value = Math.ceil(zivotNepriatela.value);
    } else {
        zivotNepriatela.value = 0;
    }
    gid("popis1").innerText += "\n bonus poškodenie (" + maxZivotNepriatela*0.1 + ") za spálenie"
}

function frostnova() {
    let nazovUtok = "frostnova";
    let percento = 0.8;
    let percentoSili = 0.7;
    let mag = percentoSili*magSila;
    celkovyDMG = 0;
    utok(0,Math.ceil(mag),0,percento,nazovUtok);
}

function frost() {
    if (zivotNepriatela.value - maxZivotNepriatela*0.05 > 0) {
        zivotNepriatela.value -= maxZivotNepriatela*0.05;
        zivotNepriatela.value = Math.ceil(zivotNepriatela.value);
    } else {
        zivotNepriatela.value = 0;
    }
    gid("popis1").innerText += "\n bonus poškodenie (" + maxZivotNepriatela*0.05 + ") za zmrznutie"
}

function windslash() {
    let nazovUtok = "windslash";
    let percento = 0.3;
    let percentoSili = 1;
    let mag = percentoSili*magSila;
    celkovyDMG = 0;
    utok(0,Math.ceil(mag),0,percento,nazovUtok);
}

function wind() {
    if (zivotNepriatela.value - maxZivotNepriatela*0.20 > 0) {
        zivotNepriatela.value -= maxZivotNepriatela*0.20;
        zivotNepriatela.value = Math.ceil(zivotNepriatela.value);
    } else {
        zivotNepriatela.value = 0;
    }
    gid("popis1").innerText += "\n bonus poškodenie (" + maxZivotNepriatela*0.2 + ") za krvácanie"
}

function heal() {
    let nazovUtoku = "heal";
    let percentoSili = 2.5;
    celkovyDMG = 0;
    utok(0,0,1,percentoSili,nazovUtoku);
}

function bonusUtok() {
    let nazovUtoku = "bonusUtok";
    let percentoSili = 0.5;
    celkovyDMG = 0;
    utok(0,0,3,percentoSili,nazovUtoku);
}

function bonusDef() {
    let nazovUtoku = "bonusDef";
    let percentoSili = 0.6;
    celkovyDMG = 0;
    utok(0,0,2,percentoSili,nazovUtoku);
}

function utok(_fyz,_mag,_vie,_percento,_utok) {
    if (_fyz > 0) {
        //minusZivoty(_fyz,2);
        //gid("popis1").innerText = "Urobil si: " + _fyz + " poškodenie";
        let random = Math.random() ;
        if (_utok == "flyingkick") {
            if (zivotNepriatela.value > 0 && zivot.value > 0) {
                gid("popis1").innerText = "Urobil si: " + _fyz + " poškodenie";
                if (random <= _percento) {
                    vypisZivoty();
                } else {
                    utokNepriatela();
                }
            }
        }
        if (_utok == "bodyslam") {
            if (zivotNepriatela.value > 0 && zivot.value > 0) {
                gid("popis1").innerText = "Urobil si: " + _fyz + " poškodenie";
                if (random <= _percento) {
                    vypisZivoty();
                } else {
                    utokNepriatela();
                }
            }
        }
        if (_utok == "punchingGataling") {
            if (zivotNepriatela.value > 0 && zivot.value > 0) {
                if (random <= _percento) {
                    vypisZivoty();
                    celkovyDMG += _fyz;
                    punchgataling(celkovyDMG);
                } else {
                    celkovyDMG += _fyz;
                    gid("popis1").innerText = "Urobil si: " + celkovyDMG + " poškodenie";
                    utokNepriatela();
                }
            }
        }
        minusZivoty(_fyz,2);
    } else if (_mag > 0 && zivotNepriatela.value > 0 && zivot.value > 0) {
        gid("popis1").innerText = "Urobil si: " + _mag + " poškodenie";
        minusZivoty(_mag,2);
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
    } else if (_vie == 1 && zivotNepriatela.value > 0 && zivot.value > 0) {
        plusZivoty(Math.ceil(viera*_percento));
        gid("popis1").innerText = "Vyliecil si si: " + Math.ceil(viera*_percento) + " života";
        utokNepriatela();
    } else if (_vie == 2 && zivotNepriatela.value > 0 && zivot.value > 0) {
        stamina += Math.ceil(viera*_percento);
        vitalita += Math.ceil(viera*_percento);
        gid("popis1").innerText = "Zvýšil si si obranu o " + Math.ceil(viera*_percento);
        utokNepriatela();
    } else if (_vie == 3 && zivotNepriatela.value > 0 && zivot.value > 0) {
        fyzSila += Math.ceil(viera*_percento);
        magSila += Math.ceil(viera*_percento);
        gid("popis1").innerText = "Zvýšil si si silu o " + Math.ceil(viera*_percento);
        utokNepriatela();
    }
    skontrolujZivoty();
}

function utokNepriatela() {
    let utok = Math.random();
    let randKrit = Math.random();
    let randomPercentoNepriatela = (Math.random() * (1.4 - 0.6)) + 0.6;
    if (utok <= 0.25) {
        minusZivoty((randomSiliUtokuNepriatela * randomPercentoNepriatela) - (vitalita*0.1),1);
        //gid("popis1").innerText += "\n Obdržal si: " + Math.ceil((randomSiliUtokuNepriatela) - (vitalita*0.1)) + " poškodenia";
    } else {
        minusZivoty((randomSiliUtokuNepriatela * randomPercentoNepriatela) - (stamina*0.1),1);
        //gid("popis1").innerText += "\n Obdržal si: " + Math.ceil((randomSiliUtokuNepriatela) - (stamina*0.1)) + " poškodenia";
    }
}

function vyhralSi() {
    gid("popis1").innerText += "\nVyhral si gratulujem";
    $.ajax({
        url: "../control/update/updateBoj.php",
        type: "POST",
        data: {
            "volneStaty": obtiaznost
        }
    });
    setTimeout(koniec, 2000);
}

function prehralSi() {
    gid("popis1").innerText += "\nPrehral si nabudúce sa sňaž viacej!";
    $.ajax({
        url: "../control/update/updateBoj.php",
        type: "POST",
        data: {
            "prehra": 10
        }
    });
    setTimeout(koniec, 2000);
}

function vypni() {
    setTimeout(block, 2000);
}

function block() {
    gid("okienko").style.display = "none";
}

function koniec() {
    $.ajax({
        url: "../control/update/updateAdventura.php",
        type: "POST",
        data: {
            "koniec": 1
        }
    });
    gid('oknoBoj').style.display = "none";
    gid('stredny').style.display = "block";
    gid("nav-bar").style.display = "block";

}

function skontrolujZivoty() {
    $.ajax({
        url: "../control/update/updateAdventura.php",
        type: "POST",
        data: {
            "aktualizuj": 1,
            "aktZ": getZivoty(),
            "aktZNep": getZivotyNepriatela(),
            "vrat": 1
        }
    });
    if (zivot.value == 0 && razSkoncil == 0) {
        razSkoncil++;
        vypisZivoty();
        prehralSi();
    } else {
        if (zivotNepriatela.value == 0 && razSkoncil == 0) {
            razSkoncil++;
            vypisZivoty();
            vyhralSi();
        } else {
            vypisZivoty();
        }
    }
}
