const{
    GraphQLObjectType, GraphQLSchema, GraphQLString, GraphQLInt,GraphQLList, GraphQLNonNull, GraphQLScalarType, GraphQLFloat,
    GraphQLBoolean

} = require('graphql');


const Pasajero = require('./Pasajero');
const { application } = require('express');

const PasajeroType = new GraphQLObjectType({
    name: 'Pasajero',
    fields:{
        nombres:{
            type:GraphQLString
        },
        apellidos:{
            type:GraphQLString
        },
        celular:{
            type:GraphQLInt
        },
        frecuente:{
            type:GraphQLBoolean
        },
        CI:{
            type:GraphQLInt
        },
    }
});

const RootQuery =new GraphQLObjectType({
    name:'RootQueryType',
    fields:{
        pasajeros:{
            type: new GraphQLList(PasajeroType),
            resolve(parent,args){
                return Pasajero.findAll();
            }
        },

        pasajero:{
            type: PasajeroType,
            args: {
                CI: {
                    type: GraphQLInt
                }
            },
           
            resolve(parent,args){
                
                const pasajero = Pasajero.findOne({
                    where:{
                        CI: args.CI
                    }
                });
                if(pasajero){
                    throw new Error ('"Pasajero no registrado"');
                }
                return pasajero;
            }
        }
    }
})

const Mutation =new GraphQLObjectType({
    name:'Mutation',
    fields:{
        registrarPasajero:{
            type: PasajeroType,
            args: {
                CI: {
                    type: GraphQLInt
                },
                nombres: {
                    type: GraphQLString
                },
                apellidos: {
                    type: GraphQLString
                },
                celular: {
                    type: GraphQLInt
                }
            },
            resolve(parent,args){
                return Pasajero.create({
                    CI: args.CI,
                    nombres: args.nombres,
                    apellidos: args.apellidos,
                    celular: args.celular
                });
            }
        },

        pasajero:{
            type: PasajeroType,
            args: {
                CI: {
                    type: GraphQLInt
                }
            },
           
            resolve(parent,args){
                return Pasajero.findByPk(args.CI);
            }
        }
    }
})

const schema =new GraphQLSchema({
    query:RootQuery,
    mutation: Mutation
});

module.exports = schema