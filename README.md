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

09 - 3

Ingresando Reembolsos, cambios a el que sera servidor , falta ingresar archivos.