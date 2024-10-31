
# Nube Grafiles

Este proyecto es una aplicación de gestión de archivos y directorios basada en PHP y MongoDB, desplegada utilizando Docker. 

## Requisitos Previos

Asegúrate de tener instalados los siguientes programas en tu sistema:

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/)

## Estructura del Proyecto

La estructura del proyecto es la siguiente:
nube_grafiles/  ├── app/ │ 
                        ├── (código de la aplicación) 
                ├── public/  │ 
                            ├── imagenes/ 
                ├── vendor/ │ 
                            ├── (dependencias) 
                ├── docker-compose.yml 
                └── Dockerfile

## Levantar los Contenedores

Para levantar los contenedores de PHP y MongoDB, sigue estos pasos:

1. Abre una terminal en la raíz de tu proyecto.
2. Ejecuta el siguiente comando para construir y levantar los servicios definidos en `docker-compose.yml`:

   ```bash
   docker-compose up -d

## Accede a la aplicación PHP en tu navegador en la siguiente dirección
http://localhost:8080/app/vista/login/login.html


## Ejecutar el Script de Inicialización
Para ejecutar el script de inicialización en MongoDB, sigue estos pasos:

1. Asegúrate de que los contenedores estén levantados (docker-compose up -d).

2. Abre una terminal y ejecuta el siguiente comando para ingresar al contenedor de MongoDB:
    ```bash
    docker exec -it mongo-nube mongo

3. En la consola de MongoDB, ejecuta el script:
    ```bash
    load('/data/db/cargarEmpleados.js')

4. Verifica que las colecciones se hayan creado correctamente:
    ```bash
    show collections

## Notas
1. El puerto 8080 se utiliza para el servicio de PHP. Puedes cambiarlo en el archivo docker-compose.yml si es necesario.

2. MongoDB está configurado para funcionar en el puerto 27017 por defecto.

3. Las contraseñas de los usuarios son las mismas que el 'usuario'
