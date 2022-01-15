const { sequelize } = require("../confs/credentials");
const { DataTypes } = require('sequelize');

var Institution = sequelize.define(
    'institution', {
        id_institution: {
            type: DataTypes.INTEGER,
            primaryKey: true,
            allowNull: false,
            autoIncrement: true
        },
        institution:{
            type: DataTypes.STRING(40),
            allowNull: false
        }
    }, {
        timestamps: false,
        freezeTableName: true // Model tableName will be the same as the model name
    }
);

module.exports = {
    Institution
}