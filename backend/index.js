const express = require('express'); //Indicamos que usaremos express
const app = express(); //Inicializamos una 'variable'
const cors = require('cors');

app.use(express.json());//middleware -> Como se van a comunicar con este servidor, habilitamos json's
app.use(express.urlencoded({extended: false})); //Indicamos que no se admitiran formularios complejos (imagenes, etc)
app.use(cors());

//Indicamos la ubicacion de las rutas
app.use(require('./routes/person_routes')); //Rutas para el manejo de usuarios
app.use(require('./routes/auth_routes')); //Rutas para el manejo de autenticacion inicial
app.use(require('./routes/academic_achievement_routes'));
app.use(require('./routes/performance_area_routes'));
app.use(require('./routes/institution_routes'));
app.use(require('./routes/db_routes'));

app.listen(process.env.PORT || 3000); //Puerto en el que levantaremos el servidor
console.log('*******************************'); //Se muestra en la terminal en la que montamos el servidor
console.log('*****Servidor iniciado*********');
console.log('*******************************');