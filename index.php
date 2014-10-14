<?php 
header('Content-Type: text/html;charset=utf-8');
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Plataforma Educativa</title>
        <link rel="shortcut icon" href="img/favicon.png"/>
        <link rel="stylesheet" href="css/estilo.css"/>
    </head>
  <body>
    <header>
      <div class="cabecera">
        <div class="grid todo-1">
          <div class="col-3-12">
            <div class="logo-1"><a href="#"><img src="img/logo_plataforma.png"/></a></div>
          </div>
          <div class="col-6-12">&nbsp;</div>
          <div class="col-3-12">&nbsp;</div>
        </div>
      </div>
      <div class="cuerpo">
        <div class="grid todo-2">
          <div class="logo-2"><a href="#"><img src="img/portada.jpg"/></a>
            <div class="col-4-12">&nbsp;</div>
            <div class="col-4-12 menor">&nbsp;</div>
            <div class="col-4-12">
              <div class="login">
                <form action=""></form>
                <div class="entrar tabla"><span class="texte">Ingresar</span></div>
                <div class="tabla">
                  <h7>Nombre de Usuario</h7>
                  <input type="text" title="usuario" class="input"/>
                  <h7>Contraseña</h7>
                  <input type="password" title="contraseña" class="input"/>
                </div>
                <div class="tabla centro">
                  <input type="submit" value="Entrar" class="boton"/>
                </div>
                <div class="peq1"><a href="#"><span>¿Has Olvidado tu contraseña?</span></a></div>
              </div>
            </div>
          </div>
        </div>
        <div class="grid">
          <div class="col-1-12">
            <div class="red"><a href="#"><img src="img/logo_red.png"/></a></div>
          </div>
          <div class="col-8-12">&nbsp;</div>
          <div class="col-3-12">&nbsp;</div>
        </div>
      </div>
      <div class="ultimasnot">
        <div class="grid todo-3">
          <div class="col-3-12"><span>ultimas noticias</span></div>
          <div class="col-8-12">&nbsp;</div>
          <div class="col-1-12">&nbsp;</div>
        </div>
      </div>
      <div class="noticias">
        <div class="grid todo-4">
            <!-- aqui -->
            <?php
            $basexml = simplexml_load_file("basededatos.xml");
            $ns = $basexml->getNamespaces(true);
            ?>
            <?php 
            for ($i=0; $i < 3; $i++) {     
                foreach ($basexml->channel as $mostrar) {
                    $dc = $mostrar->item[$i]->children($ns['dc']); ?>
                  <div class="col-4-12
                    <?php if ($i==0){ echo "pri"; } else if ($i==1) { echo "sec";} else if ($i==2) {echo "ter"; } ?>
                  ">
                    <div class="col-6-12 img_gran"><a href="#"><img src="img/imagen_G2.jpg" class="img_ultimo_1"/></a></div>
                    <div class="col-6-12 img_peq">
                      <div class="col-4-12 div_1"><a href="#"><img src="img/imagen_P1.jpg" class="img_ultimo_2"/></a></div>
                      <div class="col-8-12 div_2">
                        <div class="textnom"><a href="">
                            <h5><?php echo $dc->creator; ?></h5></a></div>
                      </div>
                      <div class="texttitu">
                        <h3><?=$mostrar->item[$i]->title; ?></h3>
                      </div>
                      <div class="textdesc">
                        <p><?=$mostrar->item[$i]->description; ?></p>
                      </div>
                      <div class="textpeq">
                        <h7><?=$mostrar->item[$i]->pubDate; ?></h7>
                      </div>
                    </div>
                  </div>
          <?php }
            } ?>
          <!-- aqui -->
        </div>
      </div>
    </header>
  </body>
</html>