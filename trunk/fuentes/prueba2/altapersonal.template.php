<?php $errores = ''; ?>
<h1>Alta de personal</h1>
<!-- voy por POST para que no se vea la clave en la URL -->
<form id='alta-personal' name='alta-personal' method='post'>
	
	<p>DNI: <input type='text' id='dni' name='dni' required placeholder='DNI' /></p>
	<p>CUIL: <input type='text' id='cuil' name='cuil' /></p>
	<p>Nombre: <input type='text' id='nombre' name='nombre' /></p>
	<p>Apellido: <input type='text' id='apellido' name='apellido' /></p>
	<p>Telefono <input type='text' id='nacimiento' name='nacimiento' /></p>
	<p>Mail <input type='text' id='mail' name='mail' /></p>
	<p>Direccion <input type='text' id='direccion' name='direccion' /></p>
	<p><input type='submit' name='alta-personalsubmit' value='Alta de Personal' /></p>
	
	<p class='error'>
		<?php echo $errores; ?>
	</p>
	
</form>