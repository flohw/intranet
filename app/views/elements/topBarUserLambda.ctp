<div class="topbar">
    <div class="fill">
        <div class="container-fluid">
            <h3><?php echo $this->Html->link("Acceuil", 'home'); ?></h3>
            <ul>
                <li><?php echo $this->Html->link("L'IUT 2", 'iut'); ?></li>
                <li><?php echo $this->Html->link("Infos", 'infos'); ?></li>
                <li><?php echo $this->Html->link("Contact", 'contact'); ?></li>
            </ul>
            <ul class="nav secondary-nav">
            <form action="">
                <input class="input-small" type="text" placeholder="Login">
                <input class="input-small" type="text" placeholder="Password">
                <button class="btn primary" type="submit">Connexion</button>
            </form>
            </ul>
        </div>
    </div>
</div>
