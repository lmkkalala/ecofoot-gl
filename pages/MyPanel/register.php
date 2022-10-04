<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a class="logo" href="#">
                            <img src="<?=base_url()?>img/Logo ECOFOOOT/Logo ECOFOOT11.png" width="80" alt="" /> <strong class="text-success">ECOFOOT-PL</strong>
                        </a>
                        </div>
                        <div class="login-form">
                            <form action="#" id="sendMessage" method="post">
                                <div class="form-group">
                                    <label>Noms</label>
                                    <input class="au-input au-input--full" type="text" name="name" id="name" placeholder="votre nom" required>
                                </div>
                                <div class="form-group">
                                    <label>Address mail</label>
                                    <input class="au-input au-input--full" type="email" name="email" id="email" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea class="au-input au-input--full" placeholder="Saisisser votre message" name="message" id="message" required></textarea>
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="aggree">Recevoir des emails sur nos actualites
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" onclick="sendForm('sendMessage','visitorMessage',event)">Enregistrer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>