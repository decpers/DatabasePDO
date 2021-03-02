# CRUD PDO para USUARIO en PHP
<br>
Este repositorio contiene los archivos necesarios para registrar, modificar, eliminar y reorganizar los registros en la base de datos.
<br>
El archivo Organizer.php permite reorganizar los ids autoincrementables de una base de datos, de forma que si quieres que al eliminar un registro todos se reorganicen para no dejar ids vacios, puedes usar ese archivo.
<br>

## RECUERDA
Dentro del repositorio hay un archivo que enlaza todos los archivos con las clases que se necesitan para que funcionen y se llama:
  
`autoload.php`

Por otro lado, debes cambiar los datos de conexión

```php
private $hostServer = "localhost";
private $user = "root";
private $password = "";
private $dataBase = "test";

```

Recuerda que este CRUD solo es para usuario, por lo que debes cambiar los datos de la consulta SQL en el archivo Usuario.php

<h3>Tecnología usada</h3>

`php`
