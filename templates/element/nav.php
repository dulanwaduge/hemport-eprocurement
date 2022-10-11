    <ul  class="nav">
        <li><a href="<?= $this->Url->build(['controller' => 'home', 'action'=>'index']); ?>">Home</a></li>
        <li><a href="<?= $this->Url->build(['controller' => 'home', 'action'=>'shop']); ?>" >Shop</a></li>
        <li><a href="<?= $this->Url->build(['controller' => 'home', 'action'=>'sustainability']); ?>">Sustainability</a></li>
        <li><a href="<?= $this->Url->build(['controller' => 'home', 'action'=>'findprofessionals']); ?>">Find Professionals</a></li>
        <li><a href="<?= $this->Url->build(['controller' => 'home', 'action'=>'discoverproject']); ?>">Discover Project</a></li>
        <li><a href="<?= $this->Url->build(['controller' => 'users', 'action'=>'register']); ?>" class="login">Login/Register</a></li>
    </ul>
