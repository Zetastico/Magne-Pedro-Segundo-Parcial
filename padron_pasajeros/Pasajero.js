const {DataTypes} = require('sequelize');
const sequelize = require('./database');

const Pasajero = sequelize.define('Pasajero',{
    nombres:{
        type: DataTypes.STRING
    },
    apellidos:{
        type: DataTypes.STRING
    },
    celular:{
        type: DataTypes.INTEGER
    },
    frecuente:{
        type: DataTypes.BOOLEAN
    },
    CI:{
        type: DataTypes.INTEGER
    }
}, 
    {
        tableName:'pasajers',
        createdAt: 'created_at',
        updatedAt: 'updated_at'
    }
);

module.exports= Pasajero;

