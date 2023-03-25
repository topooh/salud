### Elaboración de sistema de gestion de empleados ####

06 de febrero inicio de presentacion de proyectos a realizarse, y planteamiento de idea de la primera app a realizar 
la gestion de pedidos de permisos.


7 de febrero
se procede a la creacion de plataforma, creacion de BD, pantallas de formularios(creacion, edicion ty eliminacion de empleados, usuarios y trabajos)


08 febrero

base de datos conectada, formularios operativos de ingreso de usuario y ingreso de tipo de trabajo.
los datos se ingresan.... se procedio a la optimizacion de la bd por que tenia problemas al ingreso del correo en la seccion usuarios.


09 de febrero

crud de empleados listo ingreo eliminacion y edicion de datos.


13 de febrero

JQUERI habilitado , buqueda en las tablas y ordenes automaticas, sweetalet2 a medio funcionar las funciones las tengo que llamar desde el index
cuando las llevo al footer o al header no las toma.


14 febrero BD
Base de dato tablas agregagas

tbl_permisos
tbl_tipo_permiso
tbl_jornada
Login de usuarios funcionando, bloqueo de paginas donde no pueden acceder, el update de empleados esta fallando.

Seccion permisos funcionando con la tablas dinamicas, adémas de mostrar los valores en los combobox, me falta eso si ingresar valores
y verificar que el usarrio con $_session este habilitado y mostrar su nombre.


15 de febrero

Base de Datos modificada, index, primary key entre otros, el ingreso de pedidos de permiso funcionando
se puede verificar puede pedir mas de un permiso, las fecha de solicitud esta bloqueda, y verificando pero no bloqea el ingreso del formulario.


21 de febrerero

Nueva BD con tabla tipo de usuarios creada vinculada con usuarios atraves de indice, ingreso y edicion de usuario editada,
creando un header personalizado para cada tipo de usuario hasta el momento tenemos 4.

TRabajando en el perfil usuario hemos tocado el header general para crear uno para cada 1.

CREACION DE HEADER POR PERFIL DE USUARIO (USUARIO NORMAL- JEFE DIRECTO- JEFE- CESFAM- ADMIN)
ACTUALMENTE CON UN ERROR de llamar 2 veces a la variable secion, deberia ser por los nuevos header, que lo llamaba en el anterior para validar
y en el actual para saber que tipo de usuario es


22 de febrero
nuevos cambios en la base de datos usuarios relacionados con tabla empleados , atraves del rut, perfles creados para cada usuario
permisos ingresandose atraves de perfil usuario.


23 de febrero
tablas vinculadas correctamente se meustra se cambio el inner join para que se muestre correctamente, se siguio con la parte de usuarios.


28 de febrero

permisos de usuarios creacion de super usuario el que permite la edicion de cesfam y jefe directo, paginas re direccionando segun el tipo de usuario
al que peraezca


01 de marzo -02 

Cambio al servidor principal  agregar programas , visual code , work beach xampp entre  otros necesarios.




07 de marzo


Cambios en la Base de datos se agrega el campo tipo de permiso y la tabla tbl_tipo de permiso con el fin de poder separar los pedidos de permisos entre
Pendientes, Aprobados y Rechazados.


Cambios en las vistas 

USUARIO
- El usuario puede revisar sus pedidos de permisos ( filtrando solo el de ellos)

- Jefe Cesfam
- Ve sus permisos pedidos, permisos pendientes por firmar ( si no los a firmado jefe directo no se presentara en la paltalla), y permisos firmados.

Jefe directo

- Nueva vista de sus pedidos realizados, vista de pedidos pendientes y listos.

RRHH



08 marzo


- Se cambio el menu en todas las secciones, a traves de funciones, se agrego  tabla reembolso, se vincula con la tabla tipo de reembolso igualmente creada recientemente

9 de marzo

Ingresando Reembolsos, cambios a el que sera servidor , falta ingresar archivos.


14 de marzo


Usuario 

Mostrando estado permiso deshabilitado la edicion y mostrando 
si fue revisado por los jefes, directo y cesfam 



Jefe directo

Listado permisos pendientes
el permiso tiene que estar firmado por el jefe cesfa m pero tambien a la vez en estar en estado pendiente para que aparezca
( con el objetivo de que si el jefe anterior lo rechazo pero no aparezca)

Permisos firmados

para que el permiso aparesca firmado tiene que haberlo revisado el jefe directo y estar en estado pendiente o aceptado.


Permisos Rechazados
Muestra Todos los permisos Rechazados.



Jefe cesfam

Mis permisos
los revisa pero no puede hacer cambios ( si esta rechazado , wsi fue revisado etc)-

Permisos pendientes
 para que aparezca un permiso pendiente tiene k haber sido firmado por el jefedirecto=1( estar firmado) y que 
y el jefe cesfam =0 ( que no ha sido revisado)
Permisos Rechazados

para que el permiso aparesca en rechazado tiene que estar estado_permiso = 2


RRHH

Mis Permisos

Revisa los permisos generados por el usuario

Permisos INDEX

Muestra Los permisos que ya fueron revisados por los jefes anteriores pero falta la revision rrhh, ademas permite cambiar el estado.

15  de marzo

Verificacion de fecha en el pedido de permiso. en todas las secciones funcionando.

Permisoss
secciones general pedir , ingresando nuevo permiso con detalle para, la dani donde entregan la informacion sobre horas etc.
Creacion de pedidos modificados, donde permite ingresar detalles.


Super Jefe

Con ingreso de detalles no requerido, permite mostrar los  detalles ingresados e ingresar detalles.


jefe directo

Agregar detalles en pedir permiso, en mis permisos se muestra a mis detalles.

Jefe Cesfam 

Agregar permisos con detalles, en mis permisos mostrando los detalles.
mostando detalles en todos los lugares.


SAVE DE CESFAM

con seguridad anti consultas sql

mostrando imagenes en el dom pdf tuve que habilitar a la extcion gd en el servidor apache y reiniciarlo par que lo reconozca.
el decreto adnistrativo esta funcionando me flata cambiar el logo


16- de marzo

Se agregan datos a la base de datos para que el certificado de antiguedad tenga todos los datos necesarios
tiene el switch realizado para el cambio de de tipo de categoria a demas de presentar sus horas.tipo de categoria, y nivel.
falta cambiarle el idioma al servidor y cambiar el formato de fecha de dd/mm/aaaa a Dia del Mes Del Año para que sea mejor presentado.
agregar la firma de victor para la solicitud de certificado de antiguedad y achicar el logo.

Se agregaron 2 nuevas tablas a la base de datos y se agregaron campos a la tabla de usuario tales como (cuando ingreso al servicio y cuando termina ( este puede ser null).su funcion dentro del departamente y categorias y niveles de cada uno.)

Falta editar el formulario de ingreso de los usuarios por que faltan demaciados datos para agregar.


21 de marzo

Se edita El check de (RRHH,jefe Directo y cesfam) para que aparezca el nombre de la persona que revisa el permiso, se agregan 3 campos mas a la tabla permisos donde se guardaran los datos de la persona que firma.

22 de marzo

se terminan de editar los ultimos detalles del check realizado, ademas de modificar
la pantalla para la edicion de usuarios, queda completamente listo. se modifica ademas el certificado de antiguedad permitiendo mostrar con formado tia del mes año no 01/12/2022
se cambia la configuracion al servidor en español para que entrege la diferente informacion .

se procede al avance de las prestaciones medicas, se muestra y se almacenan las imagenes, falta la eliminacion de estas mediante el crud, pero todos los datos son bien enviados.


23 de marzo 

Se suben y se bajan los archivos  de las boletas con un maximo de 2 archivos los cuales se almacenan en la carpeta subidas dentro de Reembolsos
con el objetivo de que mantengan el orden dentro del servidor, FALTA VER COMO ORDENARLAS POR MESES DESPUES SINO QUEDARA LA ....
se eliminan atraves del boton eliminar