// ACCEDER AL DOM
const btnSum = document.querySelector('#calcSum');
const btnRes = document.querySelector('#calcRes');
const btnMul = document.querySelector('#calcMul');
const btnDiv = document.querySelector('#calcDiv');
const btnSen = document.querySelector('#calcSen');
const btnCos = document.querySelector('#calcCos');
const btnTan = document.querySelector('#calcTan');

function calcSum(e){
    let num1Sum = parseFloat(document.querySelector('#num1Sum').value);
    let num2Sum = parseFloat(document.querySelector('#num2Sum').value);
    let resultado = num1Sum + num2Sum;
    document.querySelector('#rtaSum').innerHTML = resultado;
    e.preventDefault();
}

function calcRes(e){
    let num1Res = parseFloat(document.querySelector('#num1Res').value);
    let num2Res = parseFloat(document.querySelector('#num2Res').value);
    let resultado = num1Res - num2Res;
    document.querySelector('#rtaRes').innerHTML = resultado;
    e.preventDefault();
}

function calcMul(e){
    let num1Mul = parseFloat(document.querySelector('#num1Mul').value);
    let num2Mul = parseFloat(document.querySelector('#num2Mul').value);
    let resultado = num1Mul * num2Mul;
    document.querySelector('#rtaMul').innerHTML = resultado;
    e.preventDefault();
}

function calcDiv(e){
    let num1Div = parseFloat(document.querySelector('#num1Div').value);
    let num2Div = parseFloat(document.querySelector('#num2Div').value);
    let resultado = num1Div / num2Div;
    document.querySelector('#rtaDiv').innerHTML = resultado;
    e.preventDefault();
}

function calcSen(e){
    let numSen = parseFloat(document.querySelector('#numSen').value);
    let numRad = numSen * 0.0174533; //convertir a radianes
    let resultado = Math.sin(numRad).toFixed(2);
    document.querySelector('#rtaSen').innerHTML = resultado;
    e.preventDefault();
}

function calcCos(e){
    let numCos = parseFloat(document.querySelector('#numCos').value);
    let numRad = numCos * 0.0174533; //convertir a radianes
    let resultado = Math.cos(numRad).toFixed(2);
    document.querySelector('#rtaCos').innerHTML = resultado;
    e.preventDefault();
}

function calcTan(e){
    let numTan = parseFloat(document.querySelector('#numTan').value);
    let numRad = numTan * 0.0174533; //convertir a radianes
    let resultado = Math.tan(numRad).toFixed(2);
    document.querySelector('#rtaTan').innerHTML = resultado;
    e.preventDefault();
}

btnSum.addEventListener('click',calcSum);
btnRes.addEventListener('click',calcRes);
btnMul.addEventListener('click',calcMul);
btnDiv.addEventListener('click',calcDiv);
btnSen.addEventListener('click',calcSen);
btnCos.addEventListener('click',calcCos);
btnTan.addEventListener('click',calcTan);