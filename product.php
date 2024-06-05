<div class="hstack gap-3">
    <button class="btn p-0 text-decoration-underline all-products" type="button">All Products</button>
    <button class="btn p-0 rubiks-cube" type="button">Rubik's Cubes</button>
    <button class="btn p-0 lubes" type="button">Lubes</button>
    <button class="btn p-0 accessories" type="button">Accessories</button>
    <button class="btn btn-outline-dark ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        <i class="bi bi-search"></i>
        Search
    </button>
</div>
<div class="collapse my-1 py-3" id="collapseExample">
    <form class="d-flex">
        <input class="form-control rounded-0 p-2" id="searchProduct" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-dark rounded-0" type="submit">
            <i class="bi bi-search"></i>
        </button>
    </form>
</div>
<div class="d-flex flex-wrap justify-content-between mt-3" id="product-card-container">
    <?php
    include "connection.php";
    if ($limit == TRUE) {
        $sql = "SELECT * FROM PRODUCT_INFORMATION LIMIT 12";
    } else {
        $sql = "SELECT * FROM PRODUCT_INFORMATION";
    }
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
            <div class="card border mb-3 border border-2 shadow-sm" style="width: 16rem;">
                <img class="card-img-top border-bottom" src="res/images/products/<?php echo $row["IMAGE"] ?>" height="160px" alt="">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row["NAME"]; ?></h5>
                    <h6 class="card-text"><?php echo $row["CATEGORY"]; ?></h6>
                    <p class="card-text">PHP <?php echo $row["PRICE"]; ?></p>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-primary btn-sm view-product-details" id="<?php echo $row["PRODUCT_ID"] ?>">
                        <i class="bi bi-eye-fill"></i>
                        VIEW DETAILS
                    </button>
                </div>
            </div>
    <?php
        }
    }
    ?>
</div>
<form action="add-to-cart.php" method="post">
    <div class="modal fade" id="productdetailModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="productdetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content product-details">

            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    $(document).on("click", ".view-product-details", function() {
        var product_id = $(this).attr('id');
        $.ajax({
            url: 'product-details.php',
            method: 'post',
            data: {
                product_id: product_id
            },
            success: function(data) {
                $('.product-details').html(data);
                $('#productdetailModal').modal("show");

            }
        });
    });
</script>
<script type="text/javascript">
    $(".rubiks-cube").on("click", function() {
        var input = "Rubik";
        console.log(input);

        const cardsContainer = document.getElementById('product-card-container');
        console.log(cardsContainer);

        const cards = cardsContainer.getElementsByClassName('card');
        console.log(cards);

        for (let i = 0; i < cards.length; i++) {
            let title = cards[i].querySelector('h6.card-text');
            console.log(title);
            if (title.innerText.indexOf(input) > -1) {
                cards[i].style.display = "";
            } else {
                cards[i].style.display = "none";
            }
        }
    });
</script>
<script type="text/javascript">
    $(".accessories").on("click", function() {
        var input = "Accessories";
        console.log(input);

        const cardsContainer = document.getElementById('product-card-container');
        console.log(cardsContainer);

        const cards = cardsContainer.getElementsByClassName('card');
        console.log(cards);

        for (let i = 0; i < cards.length; i++) {
            let title = cards[i].querySelector('h6.card-text');
            console.log(title);
            if (title.innerText.indexOf(input) > -1) {
                cards[i].style.display = "";
            } else {
                cards[i].style.display = "none";
            }
        }
    });
</script>
<script type="text/javascript">
    $(".lubes").on("click", function() {
        var input = "Lube";
        console.log(input);

        const cardsContainer = document.getElementById('product-card-container');
        console.log(cardsContainer);

        const cards = cardsContainer.getElementsByClassName('card');
        console.log(cards);

        for (let i = 0; i < cards.length; i++) {
            let title = cards[i].querySelector('h6.card-text');
            console.log(title);
            if (title.innerText.indexOf(input) > -1) {
                cards[i].style.display = "";
            } else {
                cards[i].style.display = "none";
            }
        }
    });
</script>
<script type="text/javascript">
    $(".all-products").on("click", function() {
        var input = "";
        console.log(input);

        const cardsContainer = document.getElementById('product-card-container');
        console.log(cardsContainer);

        const cards = cardsContainer.getElementsByClassName('card');
        console.log(cards);

        for (let i = 0; i < cards.length; i++) {
            let title = cards[i].querySelector('h6.card-text');
            console.log(title);
            if (title.innerText.indexOf(input) > -1) {
                cards[i].style.display = "";
            } else {
                cards[i].style.display = "none";
            }
        }
    });
</script>
<script type="text/javascript">
    $("#searchProduct").on("input", function() {
        const input = $(this).val().toUpperCase();
        console.log(input);

        const cardsContainer = document.getElementById('product-card-container');
        console.log(cardsContainer);

        const cards = cardsContainer.getElementsByClassName('card');
        console.log(cards);

        for (let i = 0; i < cards.length; i++) {
            let title = cards[i].querySelector('.card-body h6.card-title');
            console.log(title);
            if (title.innerText.toUpperCase().indexOf(input) > -1) {
                cards[i].style.display = "";
            } else {
                cards[i].style.display = "none";
            }
        }
    });
</script>