db = connect("mongodb://mongo-nube:27017/nube_grafiles");

db.createCollection("usuarios");
db.createCollection("directorios");


db.usuarios.insertMany([
    {
      "_id": ObjectId('6715d4cda39eae48c6964033'),
      "nombre_usuario": "Juan Perez",
      "email": "juan.perez@gmail.com",
      "usuario": "empleado1",
      "password": "$2y$10$f896F30SJ1untM9JrKMPjebgjb5oXH5er9q15YN01l3QEHEz7SMwG",
      "rol": "empleado", 
      "fecha_creacion": ISODate("2024-10-20T08:00:00Z"),
      "estado": "activo"  
    },
    {
      "_id": ObjectId('6715d4cda39eae48c6964034'),
      "nombre_usuario": "Julio Ramirez",
      "email": "julio.ramirez@gmail.com",
      "usuario": "empleado2",
      "password": "$2y$10$g7nAzywwsXtufBoETRMMHucfOC8y6iI1s4JzZmEayijMudKUki7cS",
      "rol": "empleado", 
      "fecha_creacion": ISODate("2024-10-20T08:00:00Z"),
      "estado": "activo"  
    },
    {
      "_id": ObjectId('6715d4cda39eae48c6964035'),
      "nombre_usuario": "Adriana Rodriguez",
      "email": "adriana.rodriguez@gmail.com",
      "usuario": "empleado3",
      "password": "$2y$10$lHzP1G9mJ.9ZBCQZkLLs5uvMcStr0V4yUx8wnpJ.iVKgkYWLawdEu",
      "rol": "empleado", 
      "fecha_creacion": ISODate("2024-10-20T08:00:00Z"),
      "estado": "activo"  
    },
    {
      "_id": ObjectId('6715d4cda39eae48c6964036'),
      "nombre_usuario": "Rudy Oxlaj",
      "email": "rudy.oxlaj@gmail.com",
      "usuario": "empleado4",
      "password": "$2y$10$WGxOQECj.Sv3SeQ2N6qRV.MQcW20tMtVUI0LbOQX3hoAUQ2U4KLgS",
      "rol": "empleado", 
      "fecha_creacion": ISODate("2024-10-20T08:00:00Z"),
      "estado": "activo"  
    },
    {
      "_id": ObjectId('6715d4cda39eae48c6964037'),
      "nombre_usuario": "Ana Maria",
      "email": "ana.maria@gmail.com",
      "usuario": "empleado5",
      "password": "$2y$10$Ynmf0itJeO.8Bt0PuWm2C.FunnvtwwLXM6RHhcXlCs.r3ZMLxJVJy",
      "rol": "empleado", 
      "fecha_creacion": ISODate("2024-10-20T08:00:00Z"),
      "estado": "activo"  
    },
    {
      "_id": ObjectId('6715d4cda39eae48c6964038'),
      "nombre_usuario": "Alessandro Reyes",
      "email": "alessandro.reyes@gmail.com",
      "usuario": "administrador1",
      "password": "$2y$10$UUHNy5j8iX9ZTviaRpPZQ.K9UQXKmn4ryaTBLShnYaxFB9WmxxHeO",
      "rol": "administrador", 
      "fecha_creacion": ISODate("2024-10-20T08:00:00Z"),
      "estado": "activo"  
    }
    ]);
    
    
    db.directorios.insertMany([
      {
        "nombre": "raiz",
        "carpeta_padre": null, 
        "usuario_propietario": ObjectId('6715d4cda39eae48c6964033'), // ID del propietario
        "fecha_creacion": new Date(), // Insertar la fecha y hora actuales
        "estado": "activo"
      },
      {
        "nombre": "raiz",
        "carpeta_padre": null, 
        "usuario_propietario": ObjectId('6715d4cda39eae48c6964034'), // ID del propietario
        "fecha_creacion": new Date(), // Insertar la fecha y hora actuales
        "estado": "activo"
      },
      {
        "nombre": "raiz",
        "carpeta_padre": null, 
        "usuario_propietario": ObjectId('6715d4cda39eae48c6964035'), // ID del propietario
        "fecha_creacion": new Date(), // Insertar la fecha y hora actuales
        "estado": "activo"
      },
      {
        "nombre": "raiz",
        "carpeta_padre": null, 
        "usuario_propietario": ObjectId('6715d4cda39eae48c6964036'), // ID del propietario
        "fecha_creacion": new Date(), // Insertar la fecha y hora actuales
        "estado": "activo"
      },
      {
        "nombre": "raiz",
        "carpeta_padre": null, 
        "usuario_propietario": ObjectId('6715d4cda39eae48c6964037'), // ID del propietario
        "fecha_creacion": new Date(), // Insertar la fecha y hora actuales
        "estado": "activo"
      },
      {
        "nombre": "raiz",
        "carpeta_padre": null, 
        "usuario_propietario": ObjectId('6715d4cda39eae48c6964038'), // ID del propietario
        "fecha_creacion": new Date(), // Insertar la fecha y hora actuales
        "estado": "activo"
      }
    
    ]);