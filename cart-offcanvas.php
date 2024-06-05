<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasCart" style="width: 600px;">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasCart">
            <i class="bi bi-cart"></i>
            Cart
        </h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="border h-75 overflow-auto">
            <table class="table">
                <tbody>
                    <?php
                    $num = 1;
                    while ($num < 10) {
                    ?>
                        <tr>
                            <td style="width: 25%;">
                                <img src="res/images/products/YJ-MGC-2X2-STICKERLESS.png" width="100%" alt="">
                            </td>
                            <td>
                                <h6 class="mb-1">Product Name</h6>
                                <p class="mb-1">Price</p>
                                <div class="mb-1">
                                    <label for="quantity">Quantity: </label>
                                    <input type="number" class="form-control w-25" name="quantity" id="quantity" min="1">
                                </div>
                                <p class="mb-1">Price</p>

                            </td>
                            <td style="width: fit-content-">
                                <button class="btn btn-danger btn-sm">
                                    DELETE
                                </button>
                            </td>
                        </tr>
                    <?php
                        $num++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>