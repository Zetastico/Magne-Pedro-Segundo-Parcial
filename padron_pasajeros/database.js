const {Sequelize} = require('sequelize');

const sequelize = new Sequelize('graph', 'root', '', {
    host: 'localhost',
    dialect: 'mysql'
});


sequelize.authenticate().then(()=> console.log('Exito')).catch(error=>console.log('error: ', error));

module.exports= sequelize;