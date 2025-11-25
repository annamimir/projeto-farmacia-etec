// ===============================
// CARREGAR ITENS DO CARRINHO
// ===============================
function carregarCarrinho() {
    let carrinho = JSON.parse(localStorage.getItem("carrinho")) || [];
    let lista = document.getElementById("lista-carrinho");
    let total = 0;

    if (carrinho.length === 0) {
        lista.innerHTML = "<p class='vazio'>Seu carrinho está vazio.</p>";
        document.getElementById("total-carrinho").textContent = "R$ 0,00";
        return;
    }

    lista.innerHTML = "";

    carrinho.forEach((item, index) => {
        total += item.subtotal;

        lista.innerHTML += `
            <div class="item-carrinho">

                <img src="${item.imagem}" class="img-produto">

                <div class="info-produto">
                    <h4>${item.nome}</h4>

                    <p>Preço unitário: R$ ${item.preco.toFixed(2)}</p>
                    <p>Quantidade: ${item.quantidade}</p>
                    <p class="preco">Subtotal: R$ ${item.subtotal.toFixed(2)}</p>
                </div>

                <button class="btn-remover" onclick="removerItem(${index})">X</button>
            </div>
        `;
    });

    document.getElementById("total-carrinho").textContent =
        "R$ " + total.toFixed(2);
}



// ===============================
// REMOVER ITEM
// ===============================
function removerItem(index) {
    let carrinho = JSON.parse(localStorage.getItem("carrinho")) || [];

    carrinho.splice(index, 1);

    localStorage.setItem("carrinho", JSON.stringify(carrinho));

    carregarCarrinho();
}



// ===============================
// FINALIZAR COMPRA
// ===============================
document.getElementById("btn-finalizar").addEventListener("click", () => {
    let carrinho = JSON.parse(localStorage.getItem("carrinho")) || [];

    if (carrinho.length === 0) {
        alert("Seu carrinho está vazio!");
        return;
    }

    // Salvar total da compra na sessão via requisição
    let total = carrinho.reduce((soma, item) => soma + item.subtotal, 0);

    // Salvar total na session (via GET simples)
    window.location.href = "salvar_total.php?total=" + total.toFixed(2);
});



// ===============================
// INICIAR
// ===============================
document.addEventListener("DOMContentLoaded", carregarCarrinho);