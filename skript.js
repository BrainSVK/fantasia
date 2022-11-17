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

function spusti(_obtiaznost,_fyzickaSila,_magickaSila,_viera,_stamina,_vitalita,_stastie) {
    obtiaznost = _obtiaznost;
    fyzSila = _fyzickaSila;
    magSila = _magickaSila;
    viera = _viera;
    stamina = _stamina;
    vitalita = _vitalita;
    stastie = _stastie;
    // if (obtiaznost > 0 && obtiaznost < 5) {
        gid('oknoBoj').style.background = "url('img/prostredie.png')";
    // }
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
    vypisZivoty();
}

function gid(_elementId) {
    return document.getElementById(_elementId);
}

function createEl(_elementId) {
    return document.createElement()
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

function flyingkick() {
    minusZivoty(fyzSila*0.6,2);
    utokNepriatela();
    vypisZivoty();
}

function utokNepriatela() {
    let randomSiliUtoku = (Math.floor(Math.random() * 10) + 1) * obtiaznost;
    let randomPercento = (Math.random() * 0.5) + 0.1;
    minusZivoty(randomSiliUtoku*randomPercento,1);
}