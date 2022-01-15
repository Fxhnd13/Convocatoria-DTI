const authentication_conf = require("../confs/config"); //Aquí será para usar la llave básica de encriptación
const jwt = require('jsonwebtoken'); //Indicamos que usaremos JsonWebToken
const bcrypt = require("bcrypt");

const { Person } = require('../models/person');

const login = async (req, res) => {
    Person.findOne({where:{username: req.body.username}, raw: true}).then(user =>{
        if(user == null){
            res.status(403).json({status: '403', information_message:"El usuario "+req.body.username+" no se encuentra registrado"});
        }else{
            bcrypt.compare(req.body.password,user.password).then(areEqual =>{
                if(areEqual){
                    const token = jwt.sign({cui: user.cui}, authentication_conf.key);
                    res.status(200).json({username: user.username, token: token, status: '200', cui: user.cui});
                }else{
                    res.status(403).json({status: '403', information_message:"La contraseña proporcionada no es la correcta."});
                }
            });
        }
    });
};

module.exports = {
    login
}