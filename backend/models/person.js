const { sequelize } = require("../confs/credentials");
const { DataTypes } = require('sequelize');

const Person = sequelize.define(
    'person' , {
        cui:{
            primaryKey: true,
            type: DataTypes.BIGINT,
            allowNull: false
        },
        name:{
            type: DataTypes.TEXT,
            allowNull: false
        },
        last_name:{
            type: DataTypes.TEXT,
            allowNull: false
        },
        address:{
            type: DataTypes.TEXT,
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
            type: DataTypes.TEXT,
            allowNull: false,
            unique: true
        },
        password:{
            type: DataTypes.TEXT,
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