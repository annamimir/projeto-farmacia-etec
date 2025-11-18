<?php
// produto_page.php
// Página funcional em PHP + SQLite…

// -------------------- CONFIGURAÇÃO --------------------
$dbFile = __DIR__ . '/data.db';
$productId = 1;
session_start();
$sess = session_id();

function init_db($dbFile) {
    $needCreate = !file_exists($dbFile);
    $pdo = new PDO('sqlite:' . $dbFile);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($needCreate) {
        $pdo->exec("CREATE TABLE reviews (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            product_id INTEGER,
            name TEXT,
            rating INTEGER,
            comment TEXT,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );");
        $pdo->exec("CREATE TABLE saved_products (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            session_id TEXT,
            product_id INTEGER,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );");
    }
    return $pdo;
}

$pdo = init_db($dbFile);

// -------------------- AJAX HANDLERS --------------------
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    header('Content-Type: application/json; charset=utf-8');

    if ($action === 'submit_review') {
        $name = trim(substr($_POST['name'] ?? 'Anônimo', 0, 100));
        $rating = intval($_POST['rating'] ?? 0);
        $comment = trim(substr($_POST['comment'] ?? '', 0, 1000));

        if ($rating < 1 || $rating > 5) {
            echo json_encode(['ok' => false, 'error' => 'Avaliação inválida']);
            exit;
        }

        $stmt = $pdo->prepare('INSERT INTO reviews (product_id, name, rating, comment) VALUES (:pid, :name, :rating, :comment)');
        $stmt->execute([':pid' => $productId, ':name' => $name, ':rating' => $rating, ':comment' => $comment]);

        $avg = $pdo->query("SELECT AVG(rating) as avg, COUNT(*) as cnt FROM reviews WHERE product_id = $productId")->fetch(PDO::FETCH_ASSOC);
        $reviews = $pdo->query("SELECT name, rating, comment, created_at FROM reviews WHERE product_id = $productId ORDER BY created_at DESC LIMIT 50")->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode(['ok' => true, 'avg' => round($avg['avg'],2), 'count' => intval($avg['cnt']), 'reviews' => $reviews]);
        exit;
    }

    elseif ($action === 'toggle_save') {
        $sid = $sess;
        $pid = intval($_POST['product_id'] ?? 0);

        $stmt = $pdo->prepare('SELECT id FROM saved_products WHERE session_id = :sid AND product_id = :pid');
        $stmt->execute([':sid'=>$sid, ':pid'=>$pid]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $del = $pdo->prepare('DELETE FROM saved_products WHERE id = :id');
            $del->execute([':id'=>$row['id']]);
            echo json_encode(['ok'=>true,'saved'=>false]);
        } else {
            $ins = $pdo->prepare('INSERT INTO saved_products (session_id, product_id) VALUES (:sid, :pid)');
            $ins->execute([':sid'=>$sid, ':pid'=>$pid]);
            echo json_encode(['ok'=>true,'saved'=>true]);
        }
        exit;
    }

    echo json_encode(['ok'=>false,'error'=>'Ação não reconhecida']);
    exit;
}

// -------------------- Dados para render --------------------
$avgData = $pdo->query("SELECT AVG(rating) as avg, COUNT(*) as cnt FROM reviews WHERE product_id = $productId")->fetch(PDO::FETCH_ASSOC);
$avgRating = $avgData['avg'] ? round($avgData['avg'],2) : 0;
$reviewsCount = intval($avgData['cnt']);

$reviews = $pdo->query("SELECT name, rating, comment, created_at FROM reviews WHERE product_id = $productId ORDER BY created_at DESC LIMIT 50")->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare('SELECT id FROM saved_products WHERE session_id = :sid AND product_id = :pid');
$stmt->execute([':sid'=>$sess, ':pid'=>$productId]);
$saved = $stmt->fetch(PDO::FETCH_ASSOC) ? true : false;
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Produto — Farmácia Exemplo</title>

    <style>
        /* TUDO BRANCO — sem cartões, sem sombras, sem bordas */

        * { box-sizing:border-box; font-family:Arial, Helvetica, sans-serif; }
        body { margin:0; background:#fff; color:#222; }

        .topbar {
            background:#fff;
            padding:18px 32px;
            display:flex;
            align-items:center;
            gap:20px;
            border-bottom:1px solid #f3f3f3;
        }

        .container {
            max-width:1200px;
            margin:28px auto;
            padding:0 20px;
        }

        .product-row {
            display:grid;
            grid-template-columns:420px 1fr 320px;
            gap:40px;
        }

        /* Remoção de separações */
        .product-card {
            background:none !important;
            border:none !important;
            box-shadow:none !important;
            padding:0 !important;
        }

        .product-images { display:flex; flex-direction:column; gap:12px; }

        .main-img {
            width:100%;
            height:420px;
            object-fit:contain;
            padding:20px;
            border:1px solid #eee;
            border-radius:8px;
            background:#fff;
        }

        .thumb { width:64px; height:64px; cursor:pointer;
            border-radius:8px;
            border:1px solid #eee;
            padding:6px;
            background:#fff;
            object-fit:cover;
        }

        .price {
            font-size:22px;
            color:#c00000;
            font-weight:700;
        }

        .price-old { color:#888; text-decoration:line-through; margin-left:8px; }

        .button {
            background:#c00000;
            color:white;
            padding:12px 18px;
            border:none;
            border-radius:8px;
            cursor:pointer;
        }

        .save-btn {
            background:white;
            border:1px solid #ccc;
            padding:10px 12px;
            border-radius:8px;
            cursor:pointer;
        }

        .review {
            padding:16px 0;
            border-top:1px solid #f3f3f3;
        }

        .review:first-child { border-top:none; }

        .star { font-size:22px; color:#ccc; }
        .star.filled { color:#f6b220; }

        @media(max-width:980px) {
            .product-row { grid-template-columns:1fr; }
            .main-img { height:320px; }
        }
    </style>
</head>

<body>

<header class="topbar">
    <div class="logo">FARMÁCIA EXEMPLO</div>
    <div class="search"><input placeholder="Buscar na farmácia" style="width:100%;padding:10px;border-radius:20px;border:1px solid #ddd"></div>
    <div>Perfil</div>
</header>

<main class="container">

    <div class="product-row">

        <!-- Coluna 1 -->
        <div class="product-images">
            <img id="mainImage" src="https://via.placeholder.com/420x420?text=Produto" class="main-img">

            <div class="thumbs" style="display:flex; gap:8px;">
                <img class="thumb" src="https://via.placeholder.com/420x420?text=Imagem+1" onclick="setMain(this.src)">
                <img class="thumb" src="https://via.placeholder.com/420x420?text=Imagem+2" onclick="setMain(this.src)">
                <img class="thumb" src="https://via.placeholder.com/420x420?text=Imagem+3" onclick="setMain(this.src)">
            </div>
        </div>

        <!-- Coluna 2 -->
        <div>
            <h1>Sérum Facial Anti-Idade — Exemplo 30ml</h1>

            <div style="display:flex; gap:16px; align-items:center;">
                <div class="avg-num" style="font-size:28px; font-weight:700;">
                    <?= $avgRating ?>
                </div>
                <div style="color:#666;"><?= $reviewsCount ?> avaliações</div>
            </div>

            <div id="staticStars" style="margin:8px 0;">
                <?php
                $filled = round($avgRating);
                for ($i=1;$i<=5;$i++){
                    echo '<span class="star'.($i <= $filled ? ' filled' : '').'">★</span>';
                }
                ?>
            </div>

            <div class="price">R$ 360,91 <span class="price-old">R$ 379,90</span></div>

            <ul style="margin-top:16px; padding-left:20px;">
                <li>Sérum facial anti-idade.</li>
                <li>Indicado para todos os tipos de pele.</li>
                <li>Ajuda a reverter sinais de envelhecimento.</li>
            </ul>

            <div style="margin-top:16px; display:flex; gap:8px;">
                <button class="button">Comprar agora</button>
                <button id="saveBtn" class="save-btn" onclick="toggleSave()">
                    <span id="saveText"><?= $saved ? 'Salvo' : 'Salvar para depois' ?></span>
                </button>
            </div>

            <div style="margin-top:18px;">
                <strong>Descrição completa</strong>
                <p style="color:#555">
                    O Hyaluron-Filler Sérum Epigenetic é um sérum facial anti-idade…
                </p>
            </div>

            <div style="margin-top:24px;">
                <h3>Deixe sua avaliação</h3>

                <form id="reviewForm" onsubmit="submitReview(event)">
                    <label>Seu nome</label><br>
                    <input name="name" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:6px;">

                    <br><br>

                    <label>Sua nota</label><br>
                    <div id="ratingStars">
                        <?php for($i=1;$i<=5;$i++): ?>
                            <span class="star" data-value="<?= $i ?>">★</span>
                        <?php endfor; ?>
                    </div>
                    <input type="hidden" id="rating" name="rating" value="0">

                    <br>

                    <label>Comentário</label><br>
                    <textarea name="comment" rows="3" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:6px;"></textarea>

                    <input type="hidden" name="action" value="submit_review">

                    <br><br>

                    <button class="button">Enviar avaliação</button>
                </form>
            </div>
        </div>

        <!-- Coluna 3 (sidebar) -->
        <aside style="margin-top:10px;">
            <div>
                <strong>Desconto do benefício</strong>
                <div style="margin-top:10px">
                    UNIVERS INTERMEDICA
                    <div class="price" style="font-size:18px">R$ 360,91</div>
                </div>
            </div>

            <div style="height:24px"></div>

            <div>
                <strong>Quem comprou, também se interessou</strong>

                <div style="display:flex;flex-direction:column; gap:16px; margin-top:10px;">
                    <div style="display:flex; gap:12px; align-items:center;">
                        <img src="https://via.placeholder.com/64" style="width:64px; height:64px; border-radius:6px; border:1px solid #eee;">
                        <div>
                            <div style="font-weight:700;">Hidratante Facial 50ml</div>
                            <div style="color:#c00000; font-weight:700;">R$ 299,00</div>
                        </div>
                    </div>

                    <div style="display:flex; gap:12px; align-items:center;">
                        <img src="https://via.placeholder.com/64" style="width:64px; height:64px; border-radius:6px; border:1px solid #eee;">
                        <div>
                            <div style="font-weight:700;">Gel Secativo 10ml</div>
                            <div style="color:#222; font-weight:700;">R$ 159,00</div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

    </div>

    <!-- Lista de avaliações -->
    <section style="margin-top:40px;">
        <h3>Avaliações dos clientes</h3>

        <div id="reviewsList">
            <?php if (empty($reviews)): ?>
                <p>Nenhuma avaliação ainda.</p>

            <?php else: foreach($reviews as $rv): ?>
                <div class="review">
                    <div style="display:flex; justify-content:space-between;">
                        <div>
                            <strong><?= htmlspecialchars($rv['name'] ?: 'Anônimo') ?></strong>
                            <div style="color:#666; font-size:13px;"><?= date('d/m/Y H:i', strtotime($rv['created_at'])) ?></div>
                        </div>

                        <div>
                            <?php for($i=1;$i<=5;$i++){ echo '<span class="star'.($i <= $rv['rating'] ? ' filled':'').'">★</span>'; } ?>
                        </div>
                    </div>

                    <?php if ($rv['comment']): ?>
                        <p style="margin-top:8px;"><?= nl2br(htmlspecialchars($rv['comment'])) ?></p>
                    <?php endif; ?>
                </div>
            <?php endforeach; endif; ?>
        </div>
    </section>

</main>

<script>
    function setMain(src){
        document.getElementById('mainImage').src = src;
    }

    const stars = document.querySelectorAll('#ratingStars .star');
    let selectedRating = 0;

    stars.forEach(s=>{
        s.onmouseover = ()=> highlight(s.dataset.value);
        s.onclick = ()=>{ selectedRating=s.dataset.value; document.getElementById('rating').value = selectedRating; };
        s.onmouseout = ()=> highlight(selectedRating);
    });

    function highlight(v){
        stars.forEach(st=>{
            st.classList.toggle("filled", st.dataset.value <= v);
        });
    }

    async function submitReview(e){
        e.preventDefault();
        const form = document.getElementById('reviewForm');
        const fd = new FormData(form);

        if(fd.get("rating") == 0){
            alert("Escolha uma nota de 1 a 5.");
            return;
        }

        const r = await fetch("", {method:"POST", body:fd});
        const data = await r.json();

        if(!data.ok){ alert("Erro ao enviar."); return; }

        document.querySelector(".avg-num").textContent = data.avg.toFixed(2);
        document.getElementById("staticStars").innerHTML = genStaticStars(Math.round(data.avg));

        const box = document.getElementById("reviewsList");
        box.innerHTML = "";

        data.reviews.forEach(rv=>{
            const div = document.createElement("div");
            div.className = "review";
            div.innerHTML = `
                <div style="display:flex; justify-content:space-between;">
                    <div>
                        <strong>${rv.name || "Anônimo"}</strong>
                        <div style="color:#666;font-size:13px;">${rv.created_at}</div>
                    </div>
                    <div>${genStaticStars(rv.rating)}</div>
                </div>
                ${rv.comment ? `<p style="margin-top:8px;">${rv.comment}</p>` : ""}
            `;
            box.appendChild(div);
        });

        form.reset();
        selectedRating = 0;
        highlight(0);
    }

    function genStaticStars(n){
        let s="";
        for(let i=1;i<=5;i++){
            s += `<span class="star${i<=n ? " filled":""}">★</span>`;
        }
        return s;
    }

    async function toggleSave(){
        const fd = new FormData();
        fd.append("action","toggle_save");
        fd.append("product_id", <?= $productId ?>);

        const r = await fetch("", {method:"POST", body:fd});
        const data = await r.json();

        document.getElementById("saveText").textContent = data.saved ? "Salvo" : "Salvar para depois";
    }
</script>

</body>
</html>