<nav class = "navbar navbar-expand-lg bg-body-tertiary">
    <div class = "container-fluid ps-5">
        <a class = "navbar-brand" href = "/Basic-E-Commerce-Application/user_front/index.php">Yigit's Shop</a>
        <button class = "navbar-toggler" type = "button" data-bs-toggle = "collapse" data-bs-target = "#navbarSupportedContent" aria-controls = "navbarSupportedContent" aria-expanded = "false" aria-label = "Toggle navigation">
            <span class = "navbar-toggler-icon"></span>
        </button>
        <div class = "collapse navbar-collapse" id = "navbarSupportedContent">
            <ul class = "navbar-nav me-auto mb-2 mb-lg-0">
                <li class = "nav-item">
                    <a class = "nav-link" aria-current = "page" href = "/Basic-E-Commerce-Application/user_front/index.php">Home</a>
                </li>
                <li class = "nav-item dropdown">
                    <a class = "nav-link dropdown-toggle" href = "/Basic-E-Commerce-Application/user_front/categories.php" role = "button" data-bs-toggle = "dropdown" aria-expanded = "false">
                        Categories
                    </a>
                    <ul class = "dropdown-menu">
                        <?php foreach(query_parser("SELECT * FROM categories") as $category) { ?>
                            <li><a class = "dropdown-item" href = "category.php?id=<?php echo $category["id"]; ?>"><?php echo $category["name"]; ?></a></li>
                        <?php } ?>
                    </ul>
                </li>

                <li class = "nav-item">
                    <a class = "nav-link" href = "/Basic-E-Commerce-Application/user_front/about.php">About</a>
                </li>
                <li class = "nav-item">
                    <a class = "nav-link" href = "/Basic-E-Commerce-Application/user_front/contact.php">Contact</a>
                </li>
                <li class = "nav-item">
                    <a class = "nav-link" href = "/Basic-E-Commerce-Application/user_front/cart.php">Cart (<?php echo count($_SESSION["cart"]); ?>)</a>
                </li>
                <li class = "nav-item">
                    <a class = "nav-link" href = "/Basic-E-Commerce-Application/user_front/previous_orders.php">Previous Orders</a>
                </li>
            </ul>
        </div>
    </div>
</nav>