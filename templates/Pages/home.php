<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

$checkConnection = function (string $name) {
    $error = null;
    $connected = false;
    try {
        $connection = ConnectionManager::get($name);
        $connected = $connection->connect();
    } catch (Exception $connectionError) {
        $error = $connectionError->getMessage();
        if (method_exists($connectionError, 'getAttributes')) {
            $attributes = $connectionError->getAttributes();
            if (isset($attributes['message'])) {
                $error .= '<br />' . $attributes['message'];
            }
        }
        if ($name === 'debug_kit') {
            $error = 'Try adding your current <b>top level domain</b> to the
                <a href="https://book.cakephp.org/debugkit/4/en/index.html#configuration" target="_blank">DebugKit.safeTld</a>
            config and reload.';
            if (!in_array('sqlite', \PDO::getAvailableDrivers())) {
                $error .= '<br />You need to install the PHP extension <code>pdo_sqlite</code> so DebugKit can work properly.';
            }
        }
    }

    return compact('connected', 'error');
};

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        CakePHP: the rapid development PHP framework:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake', 'home']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <header>
        <div class="container text-center">
            <a href="https://cakephp.org/" target="_blank" rel="noopener">
                <img alt="CakePHP" src="https://i.pinimg.com/736x/ea/a7/7b/eaa77b4ad6cd6f1e3aa7bd691bd510a0.jpg" width="350" />
            </a>
            <h1>
                Bienvenido a la Libreria CLIP - Santa cruz
            </h1>
        </div>
    </header>
    <main class="main">
        <div class="container">
            <div class="content">
                <hr>
                <!-- UNA DESCRIPCION DE LA PAGINA PARA VER DE QUE TRATA LA PAGINA -->
                <div class="column">
                        <h4>Librería y Papelería</h4>
                        <ul>
                            <li class="bullet success">¡Bienvenido a nuestra librería y papelería!</li>
                            <li class="bullet success">Contamos con una amplia selección de libros, artículos de papelería y más.</li>
                            <li class="bullet success">Nuestro equipo está aquí para ayudarte a encontrar lo que necesitas.</li>
                            <li class="bullet success">Ofrecemos servicios de encuadernación, fotocopias y laminación.</li>
                            <li class="bullet success">¡Visítanos para descubrir nuestras promociones y ofertas especiales!</li>
                        </ul>
                </div>
                <hr>
                    <div class="column text-center">
                        <div class="row">
                            <!-- 3 BOTONES PARA REGISTARNOS, LOGUEARNOS Y REGISTRAR -->
                            <div class="column links">  
                                <h3 style="text-align: left;">Accede a nuestra pagina</h3>
                                <a href="http://localhost:8765/users/login">
                                    <button>Login</button>
                                </a>
                                <a href="http://localhost:8765/users/logout">
                                    <button>Logout</button>
                                </a>
                                <a href="http://localhost:8765/users/add">
                                    <button>REgistrar</button>
                                </a>
                            </div>
                        </div>
                    </div>
                <hr>
                <div class="column text-center">
                        <div class="row">
                            <!-- LA CONECCION DE LOS BOTONES A LA url DEL MENU -->
                            <div class="column links">
                                <h3 style="text-align: left;">LIBROS</h3>
                                <a href="http://localhost:8765/bookmarks/tagged/">
                                    <button>VER LIBROS</button>
                                </a>
                                <a href="http://localhost:8765/bookmarks/add">
                                    <button>AÑADIR LIBRO</button>
                                </a>

                            </div>
                        </div>
                    </div>
                <div class="row">
                    <!-- SE CARGAN LAS URL A LOS BOTONES PARA EL CONTACT -->
                    <div class="column links">
                        <h3>Contacto</h3>
                        <a target="_blank" rel="noopener" href="https://www.google.com/maps/dir/?api=1&destination=-17.373706129949%2C-66.181301557111&fbclid=IwAR3TFAmj3zt82zgdhO1TObvcl6I6MpfTUzo8JpBs3bb0LqFJ-fr3dmgKO84">Ubicacion</a>
                        <a target="_blank" rel="noopener" href="https://api.whatsapp.com/send?phone=59179969897&text=Mucho%20gusto%2C%20quisiera%20saber%20informaci%C3%B3n%20sobre...">Whatsapp</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="column links">
                        <!-- SE CARGAN LAS URL A LOS BOTONOES DE REDES -->
                        <h3>SIGUENOS EN NUESTRAS REDES</h3>
                        <a target="_blank" rel="noopener" href="https://www.facebook.com/libreriasverbodivino">Facebook</a>
                        <a target="_blank" rel="noopener" href="https://www.youtube.com/@verbodivinoestella">Youtube</a>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </main>
</body>
</html>
