 
            <?php include_once '../includes/process.php'; ?>
          


            <body>
                 <div class="nav" id="navbar">
            <nav class="nav__container">
                <div>
                    <a href="#" class="nav__link nav__logo">
                        <i class='bx bxs-disc nav__icon' ></i>
                        <span class="nav__logo-name"><?php echo $nameHolder = $_SESSION['nameHolder'] ?></span>
                    </a>
    
                    <div class="nav__list">
                        <div class="nav__items">
                            <h3 class="nav__subtitle">Profile</h3>
    
                            <a href="#" class="nav__link active">
                                <i class='bx bx-home nav__icon' ></i>
                                <span class="nav__name">DASH BOARD</span>
                            </a>
                            
                            <div class="nav__dropdown">
                                <a href="#" class="nav__link">
                                <i class='bx bxs-shopping-bags nav__icon' ></i>
                                    <span class="nav__name">PRODUCTS</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="./products.php" class="nav__dropdown-item">POST TO SHOP</a>
                                        <a href="#" class="nav__dropdown-item">Mail</a>
                                        <a href="#" class="nav__dropdown-item">Accounts</a>
                                    </div>
                                </div>
                            </div>

                            <a href="./customers.php" class="nav__link">
                                <i class='bx bx-message-rounded nav__icon' ></i>
                                <span class="nav__name">CUSTOMERS</span>
                            </a>
                        </div>
    
                       
                            <a href="../logout.php" class="nav__link">
                                <i class='bx bx-log-out nav__icon' ></i>
                                <span class="nav__name">LOGOUT</span>
                            </a>
                        </div>
                    </div>
                </div>

                
            </nav>
        </div>
            </body>
           