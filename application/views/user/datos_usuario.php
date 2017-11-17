
<style type="text/css">

  .etiqueta{
    display: inline-block;
		width: 120px;
		text-align: right;
  }
  input[type="text"]{
    width: 200px;
    display: inline;
  }

  section, aside{
    display: inline-table;
	}

  select{
    display: inline-block;
		width: 200px;
		text-align: right;
  }

  section{
				height: 1em;
				text-align: center;
				width: 55%;
				height: 200px;
	}

  aside{
				padding: .7em;
				border-radius: 10px;
				height: 1em;
				text-align: center;
				width: 40%;
				height: 222px;
				vertical-align: top;
	}

  img{
    width: 250px;
    height: 250px;
  }

</style>

<div class="container">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
      <div class = "col-lg-12">
        <section>
          <form>
            <h1 style="display: inline;">Tu información</h1> <a style="height: 20px; text-decoration: none;" class="btn-default" href="<?= base_url()?>Perfil/Actualizar">Editar</a>
            <br>
            <br>
            <label class="etiqueta">Nombre:</label>
            <input type="text" class = "form-control" value="<?=$nombre?>" disabled>
            <br>
            <br>
            <label class="etiqueta">Apellidos:</label>
            <input type="text" class = "form-control" value="<?=$apellidoP?>" disabled>
            <br>
            <br>
            <label class="etiqueta">Sexo:</label>
            <input type="text" class = "form-control" value="<?=$sexo?>" disabled>
            <br>
            <br>
            <label class="etiqueta">Ocupación:</label>
            <input type="text" class = "form-control" value="<?=$ocupacion?>" disabled>
            <br>
            <br>
            <label class="etiqueta">Intéres:</label>
            <input type="text" class = "form-control" value="<?=$preferencias?>" disabled>
          </form>
        </section>
        <aside>
          <label>Imagen de Perfil</label>
          <img src="<?=base_url('recursos/img'). '/' .$imagen?>">
        </aside>
      </div>
    </div>
  </div>
</div>
<hr>
