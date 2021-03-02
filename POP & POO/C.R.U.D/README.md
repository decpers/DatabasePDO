# CRUD PDO para USUARIO en PHP
<br>
Este repositorio contiene los archivos necesarios para registrar, modificar, eliminar y reorganizar los registros en la base de datos.
<br>
El archivo Organizer.php permite reorganizar los ids autoincrementables de una base de datos, de forma que si quieres que al eliminar un registro todos se reorganicen para no dejar ids vacios, puedes usar ese archivo.
<br>

## RECUERDA
Dentro del repositorio hay un archivo que enlaza todos los archivos con las clases que se necesitan para que funcionen y se llama:
  
`autoload.php`

Por otro lado, debes cambiar los datos de conexión en el archivo Connection.php

```php
private $hostServer = "localhost";
private $user = "root";
private $password = "";
private $dataBase = "test";

```

Algo que debes tener presente es que este CRUD solo es para datos de usuario, por lo que si deseas usarlo debes cambiar los datos de la consulta SQL que está en el archivo Usuario.php

```php
$query= "INSERT INTO users(name,lastName,email) VALUES(?,?,?)";	
```
En ese bloque de código debes especificar el nombre de tu tabla y el nombre los campos de tu tabla usuario, aunque debo recordarte que solo son tres campos.

`name`
`lastName`
`email`

<h3>Tecnología usada</h3>

`php`
