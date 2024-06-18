<?php 

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>

<div class="contenedor">

    <div class="message">
        <h1>Contactate las 24 hs para poder ayudarte.</h1>
        <h3>Obtené una respuesta inmediata, clara y 100% confidencial.</h3>
        <p>Tu consulta es completamente gratuita. Solo se te cobrarán honorarios en caso de que decidas 
            contratarme como tu abogado para trabajar sobre tu caso. El valor de los mismos se te informarán previamente para que puedas decidir.
        </p>
    </div>
    
    <!-- Display session messages -->
    <?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'Complete'): ?>
        <h2 class="alert alert_green">Gracias por su consulta, nos comunicaremos a la brevedad</h2>
        <?php unset($_SESSION['register']); ?>
    <?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'Failed'): ?>
        <h2 class="alert alert_red">La consulta falló, por favor revise los campos enviados</h2>
        <?php unset($_SESSION['register']); ?>
    <?php endif; ?>

    <div class="contacts">
        <img src="<?=BASE_URL?>/asset/img/fondo2.jpg">
        <div class="title_info">
            <h1>Informacion de contacto</h1>
            <h1>Envianos tu mensaje</h1>
        </div>
        <ul class="info">
            <li><i class='bx bxs-phone-call'></i><h4>Podes llamarnos al +11 57944530</h4></li>
            <li><i class='bx bxl-whatsapp'></i><h4>Envianos un Whatsapp al +11 57944530</h4></li>
            <li><i class='bx bxl-telegram' ></i><h4>Envianos un Telegram al +11 57944530</h4></li>
            <li><i class='bx bx-envelope'></i><h4>gestoria@drsandrocarballo.com.ar</h4></li>
            <li><i class='bx bx-current-location'></i><h4>Lomas de Zamora, Ciudad de Buenos Aires</h4></li>
        </ul>

        <form action="<?=BASE_URL?>home/save" method="POST" class="form" autocomplete="off">
                
                <label for="name" class="form-label">Nombre:</label>
                <input type="text" class="form-input"  name="name" placeholder="Escriba su nombre..."/>
                
                <label for="surname" class="form-label">Apellido:</label>
                <input type="text" class="form-input"  name="surname" placeholder="Escriba su apellido..."/>
    
                <label for="email" class="form-label">Correo Electronico... </label>
                <input type="email" class="form-input" name="email" placeholder="Escriba su Correo"/>
    
                <label for="empresa" class="form-label">Empresa </label>
                <input type="text" class="form-input" name="empresa" placeholder="Escriba la empresa"/>
    
                <label for="message" class="form-label"> Mensaje </label>
                <textarea name="message" class="form-textarea" placeholder="Escriba su mensaje"></textarea>
    
                <input type="submit" class="btn-submit" value="Enviar Consulta"/>      
        </form>  
    </div>
</div>

<?php require_once 'views/layout/clientes.php';?>
