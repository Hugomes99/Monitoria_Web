document.addEventListener("DOMContentLoaded", function () {
    const calcularButton = document.getElementById("calcular");
    calcularButton.addEventListener("click", function () {
        const moedaSelecionada = document.getElementById("moeda").value;
        const valorInput = document.getElementById("valor").value;
        const resultadoDiv = document.getElementById("resultado");
        
        if (moedaSelecionada === "usd") {
            // Converter de dólar para real (USD para BRL)
            const valorEmReais = parseFloat(valorInput) * 4.93;
            resultadoDiv.innerText = `O valor em reais é: R$ ${valorEmReais.toFixed(2)}`;
        } else if (moedaSelecionada === "eur") {
            // Converter de euro para real (EUR para BRL)
            const valorEmReais = parseFloat(valorInput) * 5.26;
            resultadoDiv.innerText = `O valor em reais é: R$ ${valorEmReais.toFixed(2)}`;
        } else {
            resultadoDiv.innerText = "Selecione uma moeda válida.";
        }
    });
});
