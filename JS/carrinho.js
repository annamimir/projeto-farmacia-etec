function carregarCarrinho() {
    let carrinho = JSON.parse(localStorage.getItem("carrinho")) || [];
    let lista = document.getElementById("lista-carrinho");
    let total = 0;

    lista.innerHTML = "";

    carrinho.forEach((item, index) => {
        total += item.preco * item.quantidade;

        lista.innerHTML += `
            <div class="item-carrinho">
                <img src="${item.imagem}" class="item-imagem">

                <div class="info-item">
                    <p class="nome-item">${item.nome}</p>
                    <p class="preco-item">R$ ${item.preco.toFixed(2)}</p>

                    <div class="quantidade-area">
                        <button class="qtd-botao" onclick="alterarQuantidade(${index}, -1)">–</button>
                        <span class="qtd-valor">${item.quantidade}</span>
                        <button class="qtd-botao" onclick="alterarQuantidade(${index}, 1)">+</button>
                    </div>

                    <p class="btn-remover" onclick="removerItem(${index})">Remover</p>
                </div>
            </div>
        `;
    });

    document.getElementById("total-carrinho").innerText = "R$ " + total.toFixed(2);
}

function alterarQuantidade(i, change) {
    let carrinho = JSON.parse(localStorage.getItem("carrinho")) || [];

    carrinho[i].quantidade += change;

    if (carrinho[i].quantidade <= 0) carrinho.splice(i, 1);

    localStorage.setItem("carrinho", JSON.stringify(carrinho));
    carregarCarrinho();
}

function removerItem(i) {
    let carrinho = JSON.parse(localStorage.getItem("carrinho")) || [];
    carrinho.splice(i, 1);
    localStorage.setItem("carrinho", JSON.stringify(carrinho));
    carregarCarrinho();
}

document.getElementById("btn-finalizar").addEventListener("click", () => {
    alert("Compra finalizada!");
});

carregarCarrinho();