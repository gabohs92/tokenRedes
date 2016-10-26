# Prueba refrescar token

## Controladores propios:
  - FacebookController.- Obtener el usuario que da el proveedor y registrarlo en la base para su login
  - FacebookLogin.- Funciones para las rutas de login y respuesta de facebook.

## asstes/js/Scripts propios:
  - scriptFacebook.- Craga del SDK facebook, función para refrescar el token cada 15 minutos.
  
## Vistas:
  - login.- Inicio de sesión.
  - home.- Invocar a la función que actualice el token
