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
        zivot.value = zivot.value - (_minus - _minus % 1);
    } else {
        zivotNepriatela.value = zivotNepriatela.value - (_minus - _minus % 1);
    }
}

function plusZivoty(_plus) {
    zivot.value += _plus;
}

function flyingkick() {
    let percento = 0.4;
    let percentoSili = 0.8
    let fyz = percentoSili*fyzSila;
    utok(fyz,0,0,percento);

}

function utok(_fyz,_mag,_vie,_percento) {
    if (_fyz > 0) {
        minusZivoty(_fyz - (maxZivotNepriatela/2),2);
        let random = Math.random() ;
        if (_percento == 0.4) {
            if (random < _percento) {
                flyingkick();
            }
        }
    } else if (_mag > 0) {
        minusZivoty(maxZivotNepriatela/_mag,2);
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
    if (zivotNepriatela.value <= 0) {
        vypisZivoty();
        sleep(2000).then(() => { vyhralSi(); });
    }
    utokNepriatela();
    if (zivot.value <= 0) {
        vypisZivoty();
        sleep(2000).then(() => { prehralSi(); });
    }
    vypisZivoty();
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
    gid('oknoBoj').style.display = "none";
    gid('stredny').style.display = "block";
}

function prehralSi() {
    gid('oknoBoj').style.display = "none";
    gid('stredny').style.display = "block";
}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}
