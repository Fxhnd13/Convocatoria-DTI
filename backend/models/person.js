const { sequelize } = require("../confs/credentials");
const { DataTypes } = require('sequelize');

var Person = sequelize.define(
    'person' , {
        cui:{
            primaryKey: true,
            type: DataTypes.BIGINT,
            allowNull: false
        },
        name:{
            type: DataTypes.STRING(30),
            allowNull: false
        },
        last_name:{
            type: DataTypes.STRING(30),
            allowNull: false
        },
        address:{
            type: DataTypes.STRING(50),
            allowNull: false
        },
        phone_number: {
            type: DataTypes.INTEGER,
            allowNull: false
        },
        birth_day:{
            type: DataTypes.DATEONLY,
            allowNull: true
        },
        username:{
            type: DataTypes.STRING(20),
            allowNull: false,
            unique: true
        },
        password:{
            type: DataTypes.STRING(200),
            allowNull: false
        }
    }, {
        timestamps: false,
        freezeTableName: true // Model tableName will be the same as the model name
    }
);

module.exports = {
    Person
}